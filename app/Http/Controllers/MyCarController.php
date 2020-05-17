<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\T_Mycars;
use App\M_Cars;
use Illuminate\Support\Facades\Auth;

class MyCarController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function info()
    {
        $mycars = T_Mycars::where('user_id',Auth::id())
        ->orderBy('mycar_id')
        ->get();
        // $mycars = T_Mycars::All();
        // dd($mycars);
        return view('mycarinfo',['mycars' => $mycars]);
    }
    public function insertform()
    {
        
        // 車種DBからプルダウン用のデータを取得
        // $car_makers = \DB::select('select MIN( CAST( car_id AS SIGNED ) ) , car_maker from m__cars
        // group by car_maker order by MIN( CAST( car_id AS SIGNED ) )');
        // $car_names = \DB::select('select MIN( CAST( car_id AS SIGNED ) ) , car_maker , car_name from m__cars
        // group by car_maker, car_name order by MIN( CAST( car_id AS SIGNED ) )');
        // $car_ages = \DB::select('select MIN( CAST( car_id AS SIGNED ) ) , car_maker from m__cars
        // group by car_maker order by MIN( CAST( car_id AS SIGNED ) )');

        $car_makers = M_Cars::select(\DB::raw('min(CAST(car_id AS SIGNED)) AS car_id_min') , 'car_maker')
        ->groupBy('car_maker')
        ->orderBy('car_id_min')->get();
        $car_names = M_Cars::select(\DB::raw('min(CAST(car_id AS SIGNED)) AS car_id_min'), 'car_maker','car_name')
        ->groupBy('car_maker','car_name')
        ->orderBy('car_id_min')->get();
        $car_ages = M_Cars::select(\DB::raw('min(CAST(car_id AS SIGNED)) AS car_id_min'), 'car_name', \DB::raw("CONCAT(car_age_start,'～', COALESCE(car_age_end,'生産中')) AS car_age"))
        ->groupBy('car_name',\DB::raw("CONCAT(car_age_start,'～', COALESCE(car_age_end,'生産中'))"))
        ->orderBy('car_id_min')->get();
        // return view('mycarinsert', ['car_makers' => $car_makers], ['car_names' => $car_names], ['car_ages' => $car_ages]);
        return view('mycarinsert')
        ->with([
            'car_makers' => $car_makers,
            'car_names' => $car_names,
            'car_ages' => $car_ages
         ]);
    }
    public function insert(Request $request)
    {

        // 入力チェック
        $this -> Validate($request, [
            'car_maker' => ['required', 'string', 'max:20'],
            'car_name' => ['required', 'string', 'max:25'],
            'car_age' => ['required', 'string', 'max:17'],
            'car_number' => ['required','string', 'max:5'],
            'car_color' => ['required','string', 'max:1'],
        ]);
        $car_age_start = mb_strstr($request->car_age,'～',true);
        $car_age_end = mb_substr(mb_strstr($request->car_age,'～',false),1);
        
        // 車種DBから情報取得
        $car = M_Cars::where('car_maker', $request->car_maker)
        ->where('car_name', $request->car_name)
        ->where('car_age_start', $car_age_start)
        ->first();
        // dd($car);
        // Myカー登録
        $mycar = new T_MyCars();

        $mycar->user_id = Auth::id();
        $mycar->car_id = $car->car_id;
        $mycar->car_maker = $car->car_maker;
        $mycar->car_name = $car->car_name;
        $mycar->car_age_start = $car->car_age_start;
        $mycar->car_age_end = $car->car_age_end;
        $mycar->car_length = $car->car_length;
        $mycar->car_height = $car->car_height;
        $mycar->car_width = $car->car_width;
        $mycar->car_number = $request->car_number;
        $mycar->car_color = $request->car_color;

        $mycar->save();

        //Myカー情報へ戻る
        return redirect('mycarinfo');
    }
    // //web.phpから渡ってきたデータは、引数に設定可能。
    // public function updateform($mycar)
    // {
    //     $mycar = T_MyCars::where('mycar_id', $mycar_id)->first();

    //     //ログインユーザ以外のMyカーを削除しようとしていないか確認
    //     if($mycar->user_id <> Auth::id()){
    //         return view('error');
    //     } 
        
    //     return view('mycarupdate', ['mycar' => $mycar]);
    // }
    // public function update(Request $request)
    // {
    //     //入力チェック
    //     $this -> Validate($request, [
    //         'car_maker' => ['required', 'string', 'max:20'],
    //         'car_name' => ['required', 'string', 'max:25'],
    //         'car_age_start' => ['required', 'string', 'max:8'],
    //         'car_age_end' => ['nullable', 'string', 'max:8'],
    //         'car_number' => ['nullable','string', 'max:5'],
    //         'car_color' => ['nullable','string', 'max:1'],
    //     ]);

    //     //更新
    //     \DB::table('t__mycars')
    //     ->where('mycar_id', $request->mycar_id)
    //     ->update([
    //         'car_maker' => $request->car_maker
    //         ,'car_name' => $request->car_name
    //         ,'car_age_start' => $request->car_age_start
    //         ,'car_age_end' => $request->car_age_end
    //         ,'car_number' => $request->car_number
    //         ,'car_color' => $request->car_color
    //     ]);
    //     // dd($request->parking_id);
    //     return redirect('mycarinfo');
    // }
    public function delete($mycar_id)
    {
        //ログインユーザ以外のMyカーを削除しようとしていないか確認
        $mycar = T_Mycars::where('mycar_id', $mycar_id)->first();
        if($mycar->user_id <> Auth::id()){
            return view('error');
        }
        T_Mycars::where('mycar_id' ,$mycar_id)->delete();

        return redirect('mycarinfo');
    }
}
