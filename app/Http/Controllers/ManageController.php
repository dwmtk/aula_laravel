<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\T_Orders;
use App\T_Mycars;
use Illuminate\Support\Facades\Auth;
use Mail;
use App\Mail\MailSendWashed;
use App\Mail\MailSendRainCanceled;
use Carbon\Carbon;
use Spatie\GoogleCalendar\Event;
use App\M_Calendars;

class ManageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function info(){
        
        if(Auth::user()->user_type == "0"){
            return redirect('home');
        }

        $orders = \DB::select('
            select * 
            from t__orders A, users B 
            where A.user_id = B.id 
            and A.status in (1,2,9)
            and A.order_date >= ?
            order by A.order_date, A.schedule
            ', [date("Ymd")]);

        return view('manage')->with('orders', $orders);
    }
    public function washconfirm($order_id){
        // 洗車完了の確認
        $order = T_Orders::where('order_id', $order_id)->first();
        $user = Auth::user()->where('id', $order->user_id)->first();
        return view('washconfirm')
        ->with([
            'order'=> $order,
            'user'=>$user
            ]);
    }
    public function washed(Request $request){        
        // 洗車完了
        $order = T_Orders::where('order_id', $request->order_id)->first();
        $order->status = "2";
        $order->save();
        
        // マイカーの場合洗車日を挿入
        if(!is_null($order->mycar_id)){
            $mycar_db = T_Mycars::where('mycar_id', $order->mycar_id)
            ->first();
            $mycar_db->latest_wash = $order->order_date;
            $mycar_db->save();
        }


        ManageController::send($order, 
        Auth::user()->where('id', $order->user_id)->first());

        return redirect('manage')
        ->with('message_success', "洗車完了処理が完了しました。");
    }
    public function raincancel(Request $request){
        //　雨天時キャンセル
        $order = T_Orders::where('order_id', $request->order_id)->first();
        $order->status = "9";
        $order->save();
        $user = Auth::user()->where('id', $order->user_id)->first();
        $user->tsuke_pay = $user->tsuke_pay + $order->price;
        $user->save();
        
        ManageController::send_rain_cancel($order, 
        Auth::user()->where('id', $order->user_id)->first());

        return redirect('manage')
        ->with('message_success', "雨天時キャンセル処理が完了しました。");
    }
    public function selected(Request $request){        
        $this -> Validate($request, [
            'email' => ['required', 'string', 'max:255'],
        ]);
        // 検索機能
        $users = Auth::user()->where('email', 'LIKE', "%{$request->email}%")->get();
        $user_ids = array();
        foreach ($users as $user){
            $user_ids[] = $user->id;
        }
        $orders = \DB::table('t__orders')->join('users', 't__orders.user_id', '=', 'users.id')
        ->whereIn('status',[1,2,9])
        ->whereIn('user_id',$user_ids)
        ->orderBy('order_date')
        ->orderBy('schedule')->get();

        return view('manage')->with('orders', $orders);
    }
    public function calendarform(){
        // // カレンダーDBからプルダウン用のデータを取得
        // $fromdate = date("Ymd");
        // $todate = date("Ymd",strtotime($fromdate . "+6 month"));
        // $calendars = M_Calendars::whereBetween('calendar', [$fromdate, $todate])->get();
        // カレンダー設定画面
        return view("calendarform");
    }
    public function calendaroffday(Request $request){
        // カレンダーに休業日を入れる。
        $this->google_calendar_offday();
        return redirect('calendarform')
        ->with("message", "休業日登録完了");
    }
    public function calendarreflect(){
        // カレンダーを反映させる。
        $this->google_calendar_reflect();
        return redirect('calendarform')
        ->with("message", "シフト反映完了");
    }

    public function send($order, $user){
        $to = [
            [
            'email' => $user->email,
            'name' => $user->name."様",
            ]
        ];
        Mail::to($to)->send(new MailSendWashed($order,$user));
    }
    public function send_rain_cancel($order, $user){
        $to = [
            [
            'email' => $user->email,
            'name' => $user->name."様",
            ]
        ];
        Mail::to($to)->send(new MailSendRainCanceled($order,$user));
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

    public function google_calendar_reflect() {
        $dt = Carbon::today(); // 日時形式に変更
        $dt2 = Carbon::today(); // 日時形式に変更
        $dt2->addDay();
        // $dt2->addHours(23)->addMinute(59)->addSecond(59);

        for($i = 1; $i <= 10; $i++){

            $events = Event::get($dt, $dt2); // イベントを取得する

            if(count($events) == 0){
                // イベントが存在しない場合
                $event_description = $this->create_calendar_description($dt->format('Ymd'));
                $event_summary = $this->create_calendar_summary($dt->format('Ymd'));

                $event = new Event;
                $event->summary = $event_summary;
                $event->startDate = $dt; // 終日
                $event->endDate = $dt2; // 終日
                $event->description = $event_description;
                $event->save();
            }
            $dt->addDay();
            $dt2->addDay();
        }
    }

    public function google_calendar_offday() {

        $dt = Carbon::today(); // 日時形式に変更
        $dt2 = new Carbon('+6 months'); // 日時形式に変更
        $events = Event::get($dt, $dt2); // 6か月後までのイベントを取得する

        foreach ($events as $event) {
            if($event->summary == "休業日"){
                $date = $event->startDate->format("Ymd");
                $calendar = M_Calendars::where('calendar', $date)->first();

                $calendar->working_day = "1";
                $calendar->save();
            }
        }
    }
}
