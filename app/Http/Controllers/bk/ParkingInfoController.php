<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\T_Parkings;
use Illuminate\Support\Facades\Auth;

class ParkingInfoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $parkings = T_Parkings::where('user_id',Auth::id())->get();
        return view('parkinginfo',['parkings' => $parkings]);
    }
}
