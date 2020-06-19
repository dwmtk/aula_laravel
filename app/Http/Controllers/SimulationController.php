<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\T_Mycars;
use App\M_Cars;
use Illuminate\Support\Facades\Auth;

class SimulationController extends Controller
{
    public function __construct()
    {

    }

    public function info()
    {
        // 車種DBからプルダウン用のデータを取得
        $car_makers = M_Cars::select(\DB::raw('min(CAST(car_id AS SIGNED)) AS car_id_min') , 'car_maker')
        ->groupBy('car_maker')
        ->where('car_height', '<=', config('app.max_height')) // 高さ制限
        ->orderBy('car_id_min')->get();

        $car_names = M_Cars::select(\DB::raw('min(CAST(car_id AS SIGNED)) AS car_id_min'), 'car_maker','car_name')
        ->where('car_height', '<=', config('app.max_height')) // 高さ制限
        ->groupBy('car_maker','car_name')
        ->orderBy('car_name')->get();

        $car_ages = M_Cars::select('car_id', 'car_maker', 'car_name'
        , \DB::raw('ROUND(car_length) AS car_length')
        , \DB::raw('ROUND(car_height) AS car_height')
        , \DB::raw('ROUND(car_width) AS car_width')
        , \DB::raw("CONCAT(car_age_start,'～', COALESCE(car_age_end,'生産中')) AS car_age"))
        ->where('car_height', '<=', config('app.max_height')) // 高さ制限
        ->orderBy('car_id')->get();
        
        return view('simulation')
        ->with([
            'car_makers' => $car_makers,
            'car_names' => $car_names,
            'car_ages' => $car_ages,
        ]);
    }
}
