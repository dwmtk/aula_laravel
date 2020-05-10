<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\M_Cars;

class MyCarInsertController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $cars = M_Cars::select('car_maker', 'car_name')->get();
        // dd($cars);
        $cars_loop = $cars->pluck('car_name','car_maker');
        // dd($cars_loop);
        return view('mycarinsert', ['cars_loop' => $cars_loop]);
    }
}
