<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\T_Orders;
use Illuminate\Support\Facades\Auth;
use Mail;
use App\Mail\MailSendWashed;
use App\Mail\MailSendCanceled;

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

        $orders = \DB::select('select * from t__orders A, users B where A.user_id = B.id and A.status in (1,2,9) order by A.order_date, A.schedule');
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
    public function washed($order_id){        
        // 洗車完了
        $order = T_Orders::where('order_id', $order_id)->first();
        $order->status = "2";
        $order->save();
        
        ManageController::send($order, 
        Auth::user()->where('id', $order->user_id)->first());

        return redirect('manage');
    }
    public function send($order, $user){
        $to = [
            [
            'email' => $user->email,
            'name' => $user->name."様",
            ]
        ];

        // $order = T_Orders::where('order_id', '39')->first();
        // $user = Auth::user()->first();
        Mail::to($to)->send(new MailSendWashed($order,$user));
    }
}
