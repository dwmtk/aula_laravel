<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\T_Mycars;
use Illuminate\Support\Facades\Auth;

class MyCarInfoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $mycars = T_Mycars::where('user_id',Auth::id())->get();
        // $mycars = T_Mycars::All();
        // dd($mycars);
        return view('mycarinfo',['mycars' => $mycars]);
    }
}
