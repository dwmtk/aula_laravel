<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\T_Mycars;
use App\M_Cars;
use App\T_Parkings;
use App\M_Calendars;
use App\T_Orders;
use App\M_Makers;
use Stripe\Stripe;
use Stripe\Customer;
use Stripe\Charge;
use Illuminate\Support\Facades\Auth;
use Mail;
use App\Mail\SendMail;
use App\Mail\MailSendCanceled;
use Carbon\Carbon;
use Spatie\GoogleCalendar\Event;
use App\M_Coupons;
use App\T_Coupons_used;

class ReserveController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function reserveform()
    {
        // 車種DBからプルダウン用のデータを取得
        // $car_makers = M_Cars::select(\DB::raw('min(CAST(car_id AS SIGNED)) AS car_id_min') , 'car_maker')
        // ->groupBy('car_maker')
        // ->where('car_height', '<=', config('app.max_height')) // 高さ制限
        // ->orderBy('car_id_min')->get();
        $car_makers_db = \DB::select('
            select *
            from 
            (
            select min(CAST(C.car_id AS SIGNED)) AS car_id_min ,C.car_maker
            from m__cars C
            where C.car_height <= ?
            group by C.car_maker
            ) A LEFT JOIN m__makers B
            ON A.car_maker  = B.car_maker
            order by A.car_id_min' , [ config('app.max_height') ]);

        $current_country = $car_makers_db[0]->country;
        $car_makers[] = ['-------------'.$current_country.'-------------','0'];
        $i=1;
        foreach ($car_makers_db as $car_maker_db){
            if($car_maker_db->country != $current_country){
                $i = $i + 1;
                $current_country = $car_maker_db->country;
                $car_makers[] = ['-------------'.$current_country.'-------------', '0'];
            }
            $i = $i + 1;
            $car_makers[] = [ $car_maker_db->car_maker, '1'];
        }

        $car_names = M_Cars::select(\DB::raw('min(CAST(car_id AS SIGNED)) AS car_id_min'), 'car_maker','car_name')
        ->where('car_height', '<=', config('app.max_height')) // 高さ制限
        ->groupBy('car_maker','car_name')
        ->orderBy('car_name')->get();

        $car_ages = M_Cars::select('car_id', 'car_maker', 'car_name'
        , \DB::raw('car_length AS car_length')
        , \DB::raw('car_height AS car_height')
        , \DB::raw('car_width AS car_width')
        , \DB::raw("CONCAT(car_age_start,'～', COALESCE(car_age_end,'生産中')) AS car_age"))
        ->where('car_height', '<=', config('app.max_height')) // 高さ制限
        ->orderBy('car_id')->get();
        
        // マイカーDBからプルダウン用のデータを取得
        // $mycars = T_MyCars::where('user_id', Auth::id())->get();
        $mycars = T_MyCars::select('mycar_id', 'car_id', 'car_maker', 'car_name' , 'car_age_start', 'car_age_end'
        , \DB::raw('car_length AS car_length')
        , \DB::raw('car_height AS car_height')
        , \DB::raw('car_width AS car_width')
        , 'car_number', 'car_color')
        ->where('user_id', Auth::id())->get();

        // 駐車場DBからプルダウン用のデータを取得
        $parkings = T_Parkings::where('user_id', Auth::id())->get();

        // カレンダーDBからプルダウン用のデータを取得
        if( date("H") < "21" ){
            // 21時前の場合
            $fromdate = date("Ymd",strtotime("1 day"));
        } else {
            // 21時以降の場合
            $fromdate = date("Ymd",strtotime("2 day"));
        }

        // ２週間後までをプルダウンに表示する
        $todate = date("Ymd",strtotime("+2 week"));

        $calendars = M_Calendars::whereBetween('calendar', [$fromdate, $todate])
        ->where('working_day', '0')->get();

        return view('reserve')
        ->with([
            'car_makers' => $car_makers,
            'car_names' => $car_names,
            'car_ages' => $car_ages,
            'mycars' => $mycars,
            'parkings' => $parkings,
            'calendars' => $calendars
        ]);
    }

    public function reserved(Request $request)
    {
        // 入力チェック
        $this -> Validate($request, [
            'calendar' => ['required', 'string'],
            'shift' => ['required', 'string'],
            'mycar' => ['nullable','string'],
            'car_maker' => ['nullable','string'],
            'car_name' => ['nullable','string'],
            'car_age' => ['nullable','string'],
            'car_number' => ['nullable','string', 'max:5'],
            'car_color' => ['nullable','string'],
            'parking' => ['nullable','string'],
            'parking_postcode' => ['nullable','string', 'max:8'],
            'parking_prefecture' => ['nullable','string', 'max:4'],
            'parking_city' => ['nullable','string', 'max:50'],
            'parking_address' => ['nullable','string', 'max:50'],
            'parking_building' => ['nullable','string', 'max:255'],
            'parking_detail' => ['nullable','string', 'max:255'],
        ]);
        
        // 確認画面表示用の関数
        $shows = array();

        $shows['calendar'] = $request->calendar;
        $shows['shift'] = $request->shift;
        
        if($request->mycar_onoff_check == "false") {
            // マイカー情報に登録済みの場合
 
            // マイカー情報よりデータ取得
            $mycar_db = T_MyCars::select('mycar_id', 'car_id', 'car_maker', 'car_name' , 'car_age_start', 'car_age_end'
            , \DB::raw('car_length AS car_length')
            , \DB::raw('car_height AS car_height')
            , \DB::raw('car_width AS car_width')
            , 'car_number', 'car_color')
            ->where('mycar_id', $request->mycar)
            ->first();

            // 車種情報を変数に格納
            $shows['car_maker'] = $mycar_db->car_maker;
            $shows['car_name'] = $mycar_db->car_name;
            $shows['car_age_start'] = $mycar_db->car_age_start;
            $shows['car_age_end'] = $mycar_db->car_age_end;
            $shows['car_length'] = $mycar_db->car_length;
            $shows['car_height'] = $mycar_db->car_height;
            $shows['car_width'] = $mycar_db->car_width; 
            $shows['car_number'] = $mycar_db->car_number;
            $shows['car_color'] = $mycar_db->car_color;
            $length = $mycar_db->car_length;
            $height = $mycar_db->car_height;
            $width = $mycar_db->car_width;

        } else {
            // マイカー情報に未登録の場合

            // 車種情報よりデータ取得
            $car_db = M_Cars::select('car_id', 'car_maker', 'car_name' , 'car_age_start', 'car_age_end'
            , \DB::raw('car_length AS car_length')
            , \DB::raw('car_height AS car_height')
            , \DB::raw('car_width AS car_width'))
            ->where('car_id', explode(',',$request->car_age)[3])
            ->first();

            // 車種情報を変数に格納
            $shows['car_maker'] = $car_db->car_maker;
            $shows['car_name'] = $car_db->car_name;
            $shows['car_age_start'] = $car_db->car_age_start;
            $shows['car_age_end'] = $car_db->car_age_end;
            $shows['car_length'] = $car_db->car_length;
            $shows['car_height'] = $car_db->car_height;
            $shows['car_width'] = $car_db->car_width; 
            $shows['car_number'] = $request->car_number;
            $shows['car_color'] = $request->car_color;
            $length = $car_db->car_length;
            $height = $car_db->car_height;
            $width = $car_db->car_width;
        }

        // 駐車場のチェックを確認
        if($request->parking_onoff_check == "false"){
            // 登録データの場合

            // 駐車場情報よりデータ取得
            $parking_db = T_Parkings::where('parking_id', $request->parking)
            ->first();

            // 駐車場情報を変数に格納
            $shows['parking_postcode'] = $parking_db->parking_postcode;
            $shows['parking_prefecture'] = $parking_db->parking_prefecture;
            $shows['parking_city'] = $parking_db->parking_city;
            $shows['parking_address'] = $parking_db->parking_address;
            $shows['parking_building'] = $parking_db->parking_building;
            $shows['parking_detail'] = $parking_db->parking_detail;

        } else {                
            // それぞれの値を変数に格納
            $shows['parking_postcode'] = $request->parking_postcode;
            $shows['parking_prefecture'] = $request->parking_prefecture;
            $shows['parking_city'] = $request->parking_city;
            $shows['parking_address'] = $request->parking_address;
            $shows['parking_building'] = $request->parking_building;
            $shows['parking_detail'] = $request->parking_detail;
        }

        // 料金計算
        $area = $height*$width*2 + $height*$length*2 + $length*$width;
        
        if($area <= 26.0){
            //Sサイズのとき 24.82
            $price = 8000;
        } else if($area >= 33.5){
            //Lサイズのとき 33.26
            $price = 12000;
        } else {
            //それ以外（Mサイズ）
            $price = 10000;
        }
        
        $final_price = $price - Auth::user()->tsuke_pay;
        if( $final_price < 0 ){
            $final_price = 0;
        }

        // クーポンコード
        if($request->coupon != ''){
            
            $coupon = M_Coupons::where('coupon_code', $request->coupon)->first();
            if(!is_null($coupon) && $coupon->expiration_date >= date("Ymd") ){
                // クーポンが存在する、かつ、利用期限内の場合

                // クーポンの利用履歴を確認
                $coupon_used = T_Coupons_used::where('coupon_code', $request->coupon)
                ->where('user_id', Auth::id())->first();

                if(is_null($coupon_used)){
                    // 利用履歴が存在しない場合
                    
                    if($coupon->discount_type == "1") {
                        // 定額
                        $final_price = $coupon->discount_fee;
                    } elseif($coupon->discount_type == "2") {
                        // パーセント
                        $final_price = $price * $coupon->discount_fee * 0.01;
                    }            
                    $shows['coupon'] = $coupon->describe_coupon;
                } else {
                    // エラーコード返すようにする。  
                    return redirect('reserve')
                    ->with('message_error', 'すでに利用済みのクーポンです。');           
                }
            } else {
                // エラーコード返すようにする。
                return redirect('reserve')
                ->with('message_error', '存在しないクーポンです。');
            }
        } else {
            $shows['coupon'] = '';
        }


        $shows['price'] = $price;
        $shows['final_price'] = $final_price;

        // セッションにインプット情報を保管
        $inputs = $request->all();
        $request->session()->put("form_input", $inputs);

        return view('reserve_confirm')
        ->with([
            'shows' => $shows
        ]);
    }

    public function reserve_confirm(Request $request)
    {
        /* セッション取り出し */
        $inputs = $request->session()->get("form_input");
        //セッションに値が無い時はフォームに戻る
		if(!$inputs){
			return redirect()->action("ReserveController@reserveform");
        }
        
        /* データベース用の関数宣言 */
        $order = new T_Orders();
        // 金額計算用の変数
        $length = 0;
        $height = 0;
        $width = 0;

        /* 予約が空いているかを確認 */
        $calendar_db = M_Calendars::where("calendar", $inputs['calendar'])
        ->first();

        if($inputs['shift'] == "1"){
            if($calendar_db->schedule1 >= $calendar_db->schedule1_max){
                return redirect('error')
                ->with('reserve_error', "この時間帯の予約上限を超えました。時間帯を変更するか日時を変更してください。");
            } else {
                $order->schedule = "1";
            };
        } elseif($inputs['shift'] == "2") {
            if($calendar_db->schedule2 >= $calendar_db->schedule2_max){
                return redirect('error')
                ->with('reserve_error', "この時間帯の予約上限を超えました。時間帯を変更するか日時を変更してください。");
            } else {
                $order->schedule = "2";
            };
        } elseif($inputs['shift'] == "3") {
            if($calendar_db->schedule3 >= $calendar_db->schedule3_max){
                return redirect('error')
                ->with('reserve_error', "この時間帯の予約上限を超えました。時間帯を変更するか日時を変更してください。");
            } else {
                $order->schedule = "3";
            };
        } elseif($inputs['shift'] == "4") {
            if($calendar_db->schedule3 >= $calendar_db->schedule4_max){
                return redirect('error')
                ->with('reserve_error', "この時間帯の予約上限を超えました。時間帯を変更するか日時を変更してください。");
            } else {
                $order->schedule = "4";
            };
        };

        /* マイカーのチェックを確認 */
        if($inputs['mycar_onoff_check'] == "false"){
            // マイカー情報に登録済みの場合
 
            // マイカー情報よりデータ取得
            $mycar_db = T_MyCars::select('mycar_id', 'car_id', 'car_maker', 'car_name' , 'car_age_start', 'car_age_end'
            , \DB::raw('car_length AS car_length')
            , \DB::raw('car_height AS car_height')
            , \DB::raw('car_width AS car_width')
            , 'car_number', 'car_color')
            ->where('mycar_id', $inputs['mycar'])
            ->first();

            // 車種情報を変数に格納
            $order->mycar_id = $mycar_db->mycar_id;
            $order->car_id = $mycar_db->car_id;
            $order->car_maker = $mycar_db->car_maker;
            $order->car_name = $mycar_db->car_name;
            $order->car_age_start = $mycar_db->car_age_start;
            $order->car_age_end = $mycar_db->car_age_end;
            $order->car_length = $mycar_db->car_length;
            $order->car_height = $mycar_db->car_height;
            $order->car_width = $mycar_db->car_width; 
            $order->car_number = $mycar_db->car_number;
            $order->car_color = $mycar_db->car_color;

            $length = $mycar_db->car_length;
            $height = $mycar_db->car_height;
            $width = $mycar_db->car_width;
        } else {
            // マイカー情報に未登録の場合

            // 車種情報よりデータ取得
            $car_db = M_Cars::select('car_id', 'car_maker', 'car_name' , 'car_age_start', 'car_age_end'
            , \DB::raw('car_length AS car_length')
            , \DB::raw('car_height AS car_height')
            , \DB::raw('car_width AS car_width'))
            ->where('car_id', explode(',',$inputs['car_age'])[3])
            ->first();

            // それぞれの値を変数に格納
            // $order->$mycar_id　は　NULL
            $order->car_id = $car_db->car_id;
            $order->car_maker = $car_db->car_maker;
            $order->car_name = $car_db->car_name;
            $order->car_age_start = $car_db->car_age_start;
            $order->car_age_end = $car_db->car_age_end;
            $order->car_length = $car_db->car_length;
            $order->car_height = $car_db->car_height;
            $order->car_width = $car_db->car_width; 
            // ナンバーと色は入力フォームから取得
            $order->car_number = $inputs['car_number'];
            $order->car_color = $inputs['car_color'];

            $length = $car_db->car_length;
            $height = $car_db->car_height;
            $width = $car_db->car_width;
        }

        /* 支払い料金の計算 */
        $tsuke_pay = Auth::user()->tsuke_pay;

        // 洗車料金の計算
        $area = $height*$width*2 + $height*$length*2 + $length*$width;
        if($area <= 26.0){
            //Sサイズのとき 24.82
            $price = 8000;
        } else if($area >= 33.5){
            //Lサイズのとき 33.26
            $price = 12000;
        } else {
            //それ以外（Mサイズ）
            $price = 10000;
        }
        
        // クーポンコードの有無によって計算式変更
        if($inputs['coupon'] == ''){
            // クーポンなし
            $final_price = $price - $tsuke_pay;

            if($final_price < 0){
                // 支払い金額がマイナスの場合
                
                // 余ったつけ払いを保存する。
                \DB::table('users')
                ->where('id', Auth::id())
                ->update(['tsuke_pay' => ($tsuke_pay - $price) ]);
    
                // 支払金額を0円にする。
                $final_price = 0;
            } else {
                \DB::table('users')
                ->where('id', Auth::id())
                ->update(['tsuke_pay' => 0]);
            }
            // データベースに洗車料金を保存
            $order->price = $price;
        } else {
            // クーポンあり
            $coupon = M_Coupons::where('coupon_code', $inputs['coupon'])->first();        
            if($coupon->discount_type == "1") {
                // 定額
                $final_price = $coupon->discount_fee;
            } elseif($coupon->discount_type == "2") {
                // パーセント
                $final_price = $price * $coupon->discount_fee * 0.01;
            }
            $order->coupon_code = $inputs['coupon'];
            
            // データベースに支払い料金を保存
            // メモ：データベースの洗車料金に支払い料金を保存する理由は、キャンセル時の仕様のため。
            //       キャンセル時は、洗車料金をポイントでバックする。
            //       クーポンの場合は、洗車料金ではなく支払い料金をバックする必要があるため。
            $order->price = $final_price;
        }
        
        /* 洗車料金チェック */
        if($request->final_price != $final_price){
            return redirect('home')
            ->with('message_error', 'エラーが発生しました。お手数ですが、お問い合わせ先より問い合わせをお願いいたします。');
        }

        /* 各変数をデータベースに格納 */
        // ユーザIDを変数に格納
        $order->user_id = Auth::id();
        // 金額情報を変数に格納
        
        $order->tsuke_pay = $tsuke_pay;
        $order->final_price = $final_price;
        // 日付とシフトを変数に格納
        $order->order_date = $inputs['calendar'];
        $order->schedule = $inputs['shift'];

        /* 駐車場をデータベースに登録 */
        if($inputs['parking_onoff_check'] == "false"){  // 駐車場のチェックを確認
            // 登録データの場合

            // 駐車場情報よりデータ取得
            $parking_db = T_Parkings::where('parking_id', $inputs['parking'])
            ->first();

            // 駐車場情報を変数に格納
            $order->parking_id = $parking_db->parking_id;
            $order->parking_postcode = $parking_db->parking_postcode;
            $order->parking_prefecture = $parking_db->parking_prefecture;
            $order->parking_city = $parking_db->parking_city;
            $order->parking_address = $parking_db->parking_address;
            $order->parking_building = $parking_db->parking_building;
            $order->parking_detail = $parking_db->parking_detail;

        } else {
            // 非登録データの場合
            
            // それぞれの値を変数に格納
            // $order->$parking_id は　NULL
            $order->parking_postcode = $inputs['parking_postcode'];
            $order->parking_prefecture = $inputs['parking_prefecture'];
            $order->parking_city = $inputs['parking_city'];
            $order->parking_address = $inputs['parking_address'];
            $order->parking_building = $inputs['parking_building'];
            $order->parking_detail = $inputs['parking_detail'];
        }

        /* SNS投稿可否 */
        if($request->sns_check == "true"){
            // SNS投稿OKの場合
            $order->sns_check = '1';
        }else{
            // SNS投稿NGの場合
            $order->sns_check = '0';
        }

        /* 支払い分岐 */
        if($order->final_price == 0){
            // 支払い金額が0円の場合
            // ステータスを支払い済に選択
            $order->status = "1";
            $order->save();

            // カレンダーマスタの予約数を１増やす。
            if($inputs['shift'] == "1"){
                $calendar_db->schedule1 = $calendar_db->schedule1 + 1;
            } elseif($inputs['shift'] == "2") {
                $calendar_db->schedule2 = $calendar_db->schedule2 + 1;
            } elseif($inputs['shift'] == "3") {
                $calendar_db->schedule3 = $calendar_db->schedule3 + 1;
            } elseif($inputs['shift'] == "4") {
                $calendar_db->schedule4 = $calendar_db->schedule4 + 1;
            };
            $calendar_db->save();

            // 予約完了メール送信
            ReserveController::send($order, Auth::user()->where('id', Auth::id())->first());
            
            // Googleカレンダー更新
            $this->google_calendar($order->order_date);

            return redirect('home')
            ->with('reserved_success','洗車予約が完了しました。');

        } else {
            // 一時的に9割引き↓↓
            // $order->final_price = $order->final_price * 0.1;
            // ここまで↑↑

            // ステータスを支払い前に選択
            // $order->status = "0";
            // $order->save();
            
            // $secretKey = config('app.stripe_secret_key');
            // $publicKey = config('app.stripe_public_key');
            // \Stripe\Stripe::setApiKey($secretKey);
            
            // return view('payment')
            // ->with([
            //     'order_id' => $order->order_id,
            //     'final_price' => $order->final_price
            //     ]);
        
            // 支払い
            try {
                Stripe::setApiKey(config('app.stripe_secret_key'));

                $customer = Customer::create(array(
                    'email' => $request->stripeEmail,
                    'source' => $request->stripeToken
                ));

                $charge = Charge::create(array(
                    'customer' => $customer->id,
                    'amount' => $request->final_price,
                    'currency' => 'jpy'
                ));

                // ステータスを支払い済に選択
                $order->status = "1";
                $order->save();

                // カレンダーマスタの予約数を１増やす。
                $calendar_db = M_Calendars::where("calendar", $order->order_date)
                ->first();

                if($order->schedule == "1"){
                    $calendar_db->schedule1 = $calendar_db->schedule1 + 1;
                } elseif($order->schedule == "2") {
                    $calendar_db->schedule2 = $calendar_db->schedule2 + 1;
                } elseif($order->schedule == "3") {
                    $calendar_db->schedule3 = $calendar_db->schedule3 + 1;
                } elseif($order->schedule == "4") {
                    $calendar_db->schedule4 = $calendar_db->schedule4 + 1;
                };
                $calendar_db->save();

                // Googleカレンダー更新
                $this->google_calendar($order->order_date);

                // クーポン利用済みの登録
                if($order->coupon_code != ''){
                    $t_coupons_used = new T_Coupons_used();
                    $t_coupons_used->coupon_code = $order->coupon_code;
                    $t_coupons_used->user_id = Auth::id();
                    $t_coupons_used->save();
                }

                // 予約完了メールを送信
                ReserveController::send($order, Auth::user()->where('id', Auth::id())->first());

                return redirect('home')
                ->with('reserved_success','洗車予約が完了しました。');;

            } catch (\Exception $ex) {
                dd($ex);
                return redirect('error')->with('reserve_error', 'エラーが発生しました。お手数ですが、お問い合わせ先より問い合わせをお願いいたします。');
            }
        }
    }

    public function payment(Request $request)
    {
        // 支払い
        try {
            Stripe::setApiKey(config('app.stripe_secret_key'));

            $customer = Customer::create(array(
                'email' => $request->stripeEmail,
                'source' => $request->stripeToken
            ));

            $charge = Charge::create(array(
                'customer' => $customer->id,
                'amount' => $request->final_price,
                'currency' => 'jpy'
            ));

            $order->status = "1";
            $order->save();

            // カレンダーマスタの予約数を１増やす。
            $calendar_db = M_Calendars::where("calendar", $order->order_date)
            ->first();

            if($order->schedule == "1"){
                $calendar_db->schedule1 = $calendar_db->schedule1 + 1;
            } elseif($order->schedule == "2") {
                $calendar_db->schedule2 = $calendar_db->schedule2 + 1;
            } elseif($order->schedule == "3") {
                $calendar_db->schedule3 = $calendar_db->schedule3 + 1;
            } elseif($order->schedule == "4") {
                $calendar_db->schedule4 = $calendar_db->schedule4 + 1;
            };
            $calendar_db->save();

            // Googleカレンダー更新
            $this->google_calendar($order->order_date);

            // クーポン利用済みの登録
            if($order->coupon_code != ''){
                $t_coupons_used = new T_Coupons_used();
                $t_coupons_used->coupon_code = $order->coupon_code;
                $t_coupons_used->user_id = Auth::id();
                $t_coupons_used->save();
            }

            // 予約完了メールを送信
            ReserveController::send($order, Auth::user()->where('id', Auth::id())->first());

            return redirect('home')
            ->with('reserved_success','洗車予約が完了しました。');;

        } catch (\Exception $ex) {
            dd($ex);
            return redirect('error')->with('reserve_error', 'エラーが発生しました。お手数ですが、お問い合わせ先より問い合わせをお願いいたします。');
        }
    }

    public function reservelog(){
        // 注文履歴を取得（洗車完了、キャンセル）
        $user_id = Auth::id();

        $orders = T_Orders::
            where(function($orders) use ($user_id) {
            $orders->where('user_id', $user_id);
        })->where(function($orders) {
            $orders->orWhere('status', '2')
                  ->orWhere('status', '9');
        })->orderBy('order_id', 'desc')->get();
        
        return view('reservelog')
        ->with('orders', $orders);
    }

    public function cancelform($order_id)
    {
        // キャンセル確認
        $order = T_Orders::where('order_id', $order_id)->first();
        
        return view('cancelform')
        ->with('order', $order);
    }

    public function cancel($order_id)
    {
        // キャンセル実行
        $order = T_Orders::where('order_id', $order_id)->first();
        $order->status = "9";
        $order->save();
        $user = Auth::user()->where('id', Auth::id())->first();
        $user->tsuke_pay = $user->tsuke_pay + $order->price;
        $user->save();
        $calendar_db = M_Calendars::where('calendar', $order->order_date)->first();
        if($order->schedule == "1"){
            $calendar_db->schedule1 = $calendar_db->schedule1 - 1;
        } elseif($order->schedule == "2") {
            $calendar_db->schedule2 = $calendar_db->schedule2 - 1;
        } elseif($order->schedule == "3") {
            $calendar_db->schedule3 = $calendar_db->schedule3 - 1;
        } elseif($order->schedule == "4") {
            $calendar_db->schedule4 = $calendar_db->schedule4 - 1;
        };
        $calendar_db->save();
        ReserveController::send2($order, $user);
        $this->google_calendar($order->order_date);
        return redirect('home')
        ->with('cancel_success', 'キャンセルが完了しました。');
    }

    public function send($order, $user){
        // キャンセルメール
        $to = [
            [
            'email' => $user->email,
            'name' => $user->name."様",
            ]
        ];

        Mail::to($to)->send(new SendMail($order,$user));
    }
    public function send2($order, $user){
        // キャンセルメール
        $to = [
            [
            'email' => $user->email,
            'name' => $user->name."様",
            ],
            [
            'email' => "aula.wlcw@gmail.com",
            'name' => "aulaスタッフ",
            ],
        ];

        Mail::to($to)->send(new MailSendCanceled($order,$user));
    }
    public function create_calendar_summary($date){

        $calendar = M_Calendars::where('calendar', $date)->first();

        $s = "○";
        if(($calendar->schedule1_max - $calendar->schedule1 == 0) and ($calendar->schedule2_max - $calendar->schedule2 == 0) and ($calendar->schedule3_max - $calendar->schedule3 == 0) /*and ($calendar->schedule4_max - $calendar->schedule4) */
            ){
            $s = "×";
        } elseif (
            (($calendar->schedule1_max - $calendar->schedule1 == 0) and ($calendar->schedule2_max - $calendar->schedule2 == 0)) 
            or
            (($calendar->schedule1_max - $calendar->schedule1 == 0) and ($calendar->schedule3_max - $calendar->schedule3 == 0))
            or
            (($calendar->schedule2_max - $calendar->schedule2 == 0) and ($calendar->schedule3_max - $calendar->schedule3 == 0))
            /*and ($calendar->schedule4_max - $calendar->schedule4) */
            ){
            $s = "△";
        } else {
            $s = "○";
        }
        return $s;
    }

    public function create_calendar_description($date){

        $calendar = M_Calendars::where('calendar', $date)->first();
        
        $s1 = '○';
        $s2 = '○';
        $s3 = '○';
        // $s4 = '○';

        // シフト1
        if($calendar->schedule1_max - $calendar->schedule1 == 0){
            $s1 = "×";
        } elseif($calendar->schedule1_max - $calendar->schedule1 == 1){
            $s1 = "△";
        } else {
            $s1 = "○";
        }
        // シフト2
        if($calendar->schedule2_max - $calendar->schedule2 == 0){
            $s2 = "×";
        } elseif($calendar->schedule2_max - $calendar->schedule2 == 1){
            $s2 = "△";
        } else {
            $s2 = "○";
        }
        // シフト3
        if($calendar->schedule3_max - $calendar->schedule3 == 0){
            $s3 = "×";
        } elseif($calendar->schedule3_max - $calendar->schedule3 == 1){
            $s3 = "△";
        } else {
            $s3 = "○";
        }
        // シフト4
        // if($calendar->schedule4_max - $calendar->schedule4 == 0){
        //     $s4 = "×";
        // } elseif($calendar->schedule4_max - $calendar->schedule4 == 1){
        //     $s4 = "△";
        // } else {
        //     $s4 = "○";
        // }
        $event_description =
        "08:00～11:00：" . $s1 . "\r\n" .
        "11:00～14:00：" . $s2 . "\r\n" .
        "14:00～17:00：" . $s3;

        return $event_description;
        
    }

    public function google_calendar($date) {

        $event_description = $this->create_calendar_description($date);
        $event_summary = $this->create_calendar_summary($date);

        $dt = new Carbon($date); // 日時形式に変更
        $dt2 = new Carbon($date); // 日時形式に変更
        $dt2->addDay();
        $events = Event::get($dt, $dt2); // 予約日のイベントを取得する

        if(count($events) != 0){
            // イベントが存在する場合
            $event = Event::find($events[0]->id);
            $event->summary = $event_summary; // タイトル
            $event->description = $event_description; // 説明文
            $event->save();
        } else {
            // イベントが存在しない場合
            $event = new Event;
            $event->summary = $event_summary;
            $event->startDate = $dt; // 終日
            $event->endDate = $dt2; // 終日
            $event->description = $event_description;
            $event->save();
        }
    }

    public function coupon_confirm($request_coupon){

        // クーポンコードの存在有無
        $coupon = M_Coupons::where('coupon_code', $request_coupon)->first();

        if(!is_null($coupon) && ( $coupon->expiration_date >= date("Ymd") ) ){
            // クーポンが存在する、かつ、利用期限内の場合

            // クーポンの利用履歴を確認
            $coupon_used = T_Coupons_used::where('coupon_code', $request_coupon)
            ->where('user_id', Auth::id())->first();

            if(is_null($coupon_used)){
                // 利用履歴が存在しない場合
                return response()->json($coupon); // クーポン情報を返却
            }
        }
        // クーポンが存在しない、もしくは利用済みクーポンの場合
        return response()->json(); // 存在しないことを返す
    }
}