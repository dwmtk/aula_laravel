<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\T_Mycars;
use App\M_Cars;
use App\T_Parkings;
use App\M_Calendars;
use App\T_Orders;
use Stripe\Stripe;
use Stripe\Customer;
use Stripe\Charge;
use Illuminate\Support\Facades\Auth;
use Mail;
use App\Mail\SendMail;
use App\Mail\MailSendCanceled;
use Carbon\Carbon;
use Spatie\GoogleCalendar\Event;

class ReserveController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function reserveform()
    {
        // 車種DBからプルダウン用のデータを取得
        $car_makers = M_Cars::select(\DB::raw('min(CAST(car_id AS SIGNED)) AS car_id_min') , 'car_maker')
        ->groupBy('car_maker')
        ->where('car_height', '<=', config('app.max_height')) // 高さ制限
        ->orderBy('car_id_min')->get();

        $car_names = M_Cars::select(\DB::raw('min(CAST(car_id AS SIGNED)) AS car_id_min'), 'car_maker','car_name')
        ->where('car_height', '<=', config('app.max_height')) // 高さ制限
        ->groupBy('car_maker','car_name')
        ->orderBy('car_id_min')->get();

        $car_ages = M_Cars::select('car_id', 'car_maker', 'car_name'
        , \DB::raw('ROUND(car_length) AS car_length')
        , \DB::raw('ROUND(car_height) AS car_height')
        , \DB::raw('ROUND(car_width) AS car_width')
        , \DB::raw("CONCAT(car_age_start,'～', COALESCE(car_age_end,'生産中')) AS car_age"))
        ->where('car_height', '<=', config('app.max_height')) // 高さ制限
        ->orderBy('car_id')->get();
        
        // マイカーDBからプルダウン用のデータを取得
        // $mycars = T_MyCars::where('user_id', Auth::id())->get();
        $mycars = T_MyCars::select('mycar_id', 'car_id', 'car_maker', 'car_name' , 'car_age_start', 'car_age_end'
        , \DB::raw('ROUND(car_length) AS car_length')
        , \DB::raw('ROUND(car_height) AS car_height')
        , \DB::raw('ROUND(car_width) AS car_width')
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

        $todate = date("Ymd",strtotime($fromdate . "+1 month"));
        $calendars = M_Calendars::whereBetween('calendar', [$fromdate, $todate])->
        where('working_day', '0')->get();

        // $this->google_calendar('20200523');

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
        // $secretKey = config('app.stripe_secret_key');
        // $publicKey = config('app.stripe_public_key');
        // \Stripe\Stripe::setApiKey($secretKey);

        
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

        //データベースへの登録
        $order = new T_Orders();
        // 金額計算用の変数
        $length = 0;
        $height = 0;
        $width = 0;

        // 予約が空いているかを確認
        $calendar_db = M_Calendars::where("calendar", $request->calendar)
        ->first();

        if($request->shift == "1"){
            if($calendar_db->schedule1 >= $calendar_db->schedule1_max){
                return redirect('error')
                ->with('reserve_error', "この時間帯の予約上限を超えました。時間帯を変更するか日時を変更してください。");
            } else {
                $order->schedule = "1";
            };
        } elseif($request->shift == "2") {
            if($calendar_db->schedule2 >= $calendar_db->schedule2_max){
                return redirect('error')
                ->with('reserve_error', "この時間帯の予約上限を超えました。時間帯を変更するか日時を変更してください。");
            } else {
                $order->schedule = "2";
            };
        } elseif($request->shift == "3") {
            if($calendar_db->schedule3 >= $calendar_db->schedule3_max){
                return redirect('error')
                ->with('reserve_error', "この時間帯の予約上限を超えました。時間帯を変更するか日時を変更してください。");
            } else {
                $order->schedule = "3";
            };
        } elseif($request->shift == "4") {
            if($calendar_db->schedule3 >= $calendar_db->schedule4_max){
                return redirect('error')
                ->with('reserve_error', "この時間帯の予約上限を超えました。時間帯を変更するか日時を変更してください。");
            } else {
                $order->schedule = "4";
            };
        };

        // マイカーのチェックを確認
        if(strcmp($request->mycar_onoff_check, "false") == 0){
            // マイカー情報に登録済みの場合
 
            // マイカー情報よりデータ取得
            // $mycar_db = T_MyCars::where('mycar_id', $request->mycar)
            // ->first();
            $mycar_db = T_MyCars::select('mycar_id', 'car_id', 'car_maker', 'car_name' , 'car_age_start', 'car_age_end'
            , \DB::raw('ROUND(car_length) AS car_length')
            , \DB::raw('ROUND(car_height) AS car_height')
            , \DB::raw('ROUND(car_width) AS car_width')
            , 'car_number', 'car_color')
            ->where('mycar_id', $request->mycar)
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
            // $car_db = M_Cars::where('car_id', explode(',',$request->car_age)[3])
            // ->first();
            $car_db = M_Cars::select('car_id', 'car_maker', 'car_name' , 'car_age_start', 'car_age_end'
            , \DB::raw('ROUND(car_length) AS car_length')
            , \DB::raw('ROUND(car_height) AS car_height')
            , \DB::raw('ROUND(car_width) AS car_width'))
            ->where('car_id', explode(',',$request->car_age)[3])
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
            $order->car_number = $request->car_number;
            $order->car_color = $request->car_color;

            $length = $car_db->car_length;
            $height = $car_db->car_height;
            $width = $car_db->car_width;
        }

        // 金額チェック
        // フォームからきた金額と、もう一度コントロール側で計算した値を比較する。
        $price_confirm =  ($height*$width*2 + $height*$length*2 + $length*$width) *100 *1.5;
        $final_price = 0;
        $tsuke_pay = Auth::user()->tsuke_pay;

        if( ($price_confirm <> $request->price) ){
            // NGの場合
            return redirect('error')
            ->with('reserve_error', "エラーが発生しました。お手数ですが最初からやり直してください。");

        } else {
            // OKの場合
            
            // つけ払いを差し引き支払い金額を産出
            $final_price = $price_confirm - $tsuke_pay;
 
            if($final_price < 0){
                // 支払い金額がマイナスの場合
                
                // 余ったつけ払いを保存する。
                \DB::table('users')
                ->where('id', Auth::id())
                ->update(['tsuke_pay' => ($tsuke_pay - $price_confirm)]);

                // 支払金額を0円にする。
                $final_price = 0;
            } else {

                \DB::table('users')
                ->where('id', Auth::id())
                ->update(['tsuke_pay' => 0]);
            };
        };

        // ユーザIDを変数に格納
        $order->user_id = Auth::id();
        // 金額情報を変数に格納
        $order->price = $price_confirm;
        $order->tsuke_pay = $tsuke_pay;
        $order->final_price = $final_price;
        // 日付とシフトを変数に格納
        $order->order_date = $request->calendar;
        $order->schedule = $request->shift;

        // 駐車場のチェックを確認
        if($request->parking_onoff_check == "false"){
            // 登録データの場合

            // 駐車場情報よりデータ取得
            $parking_db = T_Parkings::where('parking_id', $request->parking)
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
            $order->parking_postcode = $request->parking_postcode;
            $order->parking_prefecture = $request->parking_prefecture;
            $order->parking_city = $request->parking_city;
            $order->parking_address = $request->parking_address;
            $order->parking_building = $request->parking_building;
            $order->parking_detail = $request->parking_detail;
        }



        if($order->final_price == 0){
            // 支払い金額が0円の場合
            // ステータスを支払い済に選択
            $order->status = "1";
            $order->save();

            // カレンダーマスタの予約数を１増やす。
            if($request->shift == "1"){
                $calendar_db->schedule1 = $calendar_db->schedule1 + 1;
            } elseif($request->shift == "2") {
                $calendar_db->schedule2 = $calendar_db->schedule2 + 1;
            } elseif($request->shift == "3") {
                $calendar_db->schedule3 = $calendar_db->schedule3 + 1;
            } elseif($request->shift == "4") {
                $calendar_db->schedule4 = $calendar_db->schedule4 + 1;
            };
            $calendar_db->save();
            ReserveController::send($order, Auth::user()->where('id', Auth::id())->first());
            $this->google_calendar($order->order_date);
            return redirect('home')
            ->with('reserved_success','洗車予約が完了しました。');

        } else {
            // 一時的に9割引き↓↓
            $order->final_price = $order->final_price * 0.1;
            // ここまで↑↑

            // ステータスを支払い前に選択
            $order->status = "0";
            $order->save();
            
            // $secretKey = config('app.stripe_secret_key');
            // $publicKey = config('app.stripe_public_key');
            // \Stripe\Stripe::setApiKey($secretKey);
            
            return view('payment')
            ->with([
                'order_id' => $order->order_id,
                'final_price' => $order->final_price
                ]);
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

            $order = T_Orders::where('order_id', $request->order_id)->first();
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

            ReserveController::send($order, Auth::user()->where('id', Auth::id())->first());
            $this->google_calendar($order->order_date);

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
        })->orderBy('order_id')->get();
        
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
}
