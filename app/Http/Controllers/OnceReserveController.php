<?php

namespace App\Http\Controllers;

use App\M_Cartypes;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Customer;
use Stripe\Charge;
use Illuminate\Support\Facades\Auth;
use Mail;
use Carbon\Carbon;
use Spatie\GoogleCalendar\Event;

class OnceReserveController extends Controller
{
    public function __construct()
    {
        //
    }
    
    public function info()
    {
        $types = M_Cartypes::all();
        return view('oncereserve/reserve')
        ->with([
            'types' => $types
        ]);
    }

    public function confirm(Request $request)
    {
        $type = M_Cartypes::where('id', $request->radiobox)->first();
        return view('oncereserve/payment')
        ->with([
            'type' => $type
            ]);
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
                'amount' => $request->price,
                'currency' => 'jpy'
            ));

            return view('oncereserve/complete');

        } catch (\Exception $ex) {
            return view('oncereserve/error');
        }
    }

    public function introductioncode(){
        // 紹介者にポイント付与
        if(Auth::user()->introduction_code != ''){
            $user = Auth::user()->where('email', Auth::user()->introduction_code)->first();
            if(!is_null($user)){
                $user->tsuke_pay = $user->tsuke_pay + 1000;
                $user->save();
            }
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
}
