<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\T_Mycars;
use App\M_Cars;
use App\M_Makers;
use Illuminate\Support\Facades\Auth;

class SimulationController extends Controller
{
    public function __construct()
    {

    }

    public function info()
    {
        return view('welcome');
        // 車種DBからプルダウン用のデータを取得
        // $car_makers = M_Cars::select(\DB::raw('min(CAST(car_id AS SIGNED)) AS car_id_min') , 'car_maker')
        // ->groupBy('car_maker')
        // ->where('car_height', '<=', config('app.max_height')) // 高さ制限
        // ->orderBy('car_id_min')->get();
        $car_makers_db = \DB::select('
            select *
            from 
            (
            select min(CAST(C.car_id AS SIGNED)) AS car_id_min ,C.car_maker
            from m__cars C
            where C.car_height <= ?
            group by C.car_maker
            ) A LEFT JOIN m__makers B
            ON A.car_maker  = B.car_maker
            order by A.car_id_min' , [ config('app.max_height') ]);

        $current_country = $car_makers_db[0]->country;
        $car_makers[] = ['-------------'.$current_country.'-------------','0'];
        $i=1;
        foreach ($car_makers_db as $car_maker_db){
            if($car_maker_db->country != $current_country){
                $i = $i + 1;
                $current_country = $car_maker_db->country;
                $car_makers[] = ['-------------'.$current_country.'-------------', '0'];
            }
            $i = $i + 1;
            $car_makers[] = [ $car_maker_db->car_maker, '1'];
        }
        
        $car_names = M_Cars::select(\DB::raw('min(CAST(car_id AS SIGNED)) AS car_id_min'), 'car_maker','car_name')
        ->where('car_height', '<=', config('app.max_height')) // 高さ制限
        ->groupBy('car_maker','car_name')
        ->orderBy('car_name')->get();

        $car_ages = M_Cars::select('car_id', 'car_maker', 'car_name'
        , \DB::raw('car_length AS car_length')
        , \DB::raw('car_height AS car_height')
        , \DB::raw('car_width AS car_width')
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
