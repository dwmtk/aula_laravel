<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\T_Orders;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // 注文情報を取得
        $orders = T_Orders::where('user_id', Auth::id())
        ->where('status', '1')
        ->orderBy('order_id')->get();
        
        return view('home')
        ->with('orders', $orders);
    }
}
