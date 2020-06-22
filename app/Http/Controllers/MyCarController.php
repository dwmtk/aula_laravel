<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\T_Mycars;
use App\M_Makers;
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

        return view('mycarinfo',['mycars' => $mycars]);
    }
    public function insertform()
    {
        
        // 車種DBからプルダウン用のデータを取得
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

        $car_ages = M_Cars::select('car_id', 'car_maker','car_name', \DB::raw("CONCAT(car_age_start,'～', COALESCE(car_age_end,'生産中')) AS car_age"))
        ->where('car_height', '<=', config('app.max_height')) // 高さ制限
        ->orderBy('car_id')->get();

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

        // 入力データを一部加工
        // $car_name = explode('___', $request->car_name)[1];
        // $car_age_start = mb_strstr($request->car_age,'～',true);
        // $car_age_end = mb_substr(mb_strstr($request->car_age,'～',false),1);
        // dd($request, $car_name);

        // 車種情報よりデータ取得
        $car = M_Cars::where('car_id', $request->car_age)
        ->first();
        
        // $car = M_Cars::where('car_maker', $request->car_maker)
        // ->where('car_name', $car_name)
        // ->where('car_age_start', $car_age_start)
        // ->first();
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
    public function delete(Request $request)
    {
        T_Mycars::where('mycar_id' ,$request->mycar_id)->delete();

        return redirect('mycarinfo')
        ->with('message_success', "マイカーの解除が完了しました。");
    }
}
