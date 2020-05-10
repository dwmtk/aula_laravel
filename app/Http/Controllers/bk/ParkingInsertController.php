<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ParkingInsertController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('parkinginsert');
    }

    public function insert()
    {
        
        return view('parkinginfo');
    }
}
