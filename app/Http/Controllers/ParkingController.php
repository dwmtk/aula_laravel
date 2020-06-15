<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\T_Parkings;
use Illuminate\Support\Facades\Auth;

class ParkingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function info()
    {
        $parkings = T_Parkings::where('user_id',Auth::id())
        ->orderBy('parking_id')
        ->get();
        return view('parkinginfo',['parkings' => $parkings]);
    }
    public function insertform()
    {
        return view('parkinginsert');
    }
    public function insert(Request $request)
    {
        // 入力チェック
        $this -> Validate($request, [
            'parking_postcode' => ['required', 'string', 'max:7'],
            'parking_prefecture' => ['required', 'string', 'max:4'],
            'parking_city' => ['required', 'string', 'max:50'],
            'parking_address' => ['required', 'string', 'max:50'],
            'parking_building' => ['nullable','string', 'max:255'],
            'parking_detail' => ['nullable','string', 'max:255'],
        ]);

        if( strpos($request->parking_city ,'名古屋') === false){
            return redirect('parkinginfo')
            ->with('message_error', "現在、名古屋市内のみ承っております。順次範囲拡大予定！");
        }

        //登録
        $parking = new T_Parkings();

        $parking->parking_postcode = $request->parking_postcode;
        // $parking->parking_prefecture = $request->parking_prefecture;
        $parking->parking_prefecture = '愛知県';
        $parking->parking_city = $request->parking_city;
        $parking->parking_address = $request->parking_address;
        $parking->parking_building = $request->parking_building;
        $parking->parking_detail = $request->parking_detail;
        $parking->user_id = Auth::id();
   
        $parking->save();
        
        //駐車場情報へ戻る
        return redirect('parkinginfo');
    }
    //web.phpから渡ってきたデータは、引数に設定可能。
    public function updateform($parking_id)
    {

        $parking = T_Parkings::where('parking_id', $parking_id)->first();

        //ログインユーザ以外の駐車場を削除しようとしていないか確認
        if($parking->user_id <> Auth::id()){
            return view('error');
        } 
        
        return view('parkingupdate', ['parking' => $parking]);
    }
    public function update(Request $request)
    {
        //入力チェック
        $this -> Validate($request, [
            'parking_postcode' => ['required', 'string', 'max:7'],
            'parking_prefecture' => ['required', 'string', 'max:4'],
            'parking_city' => ['required', 'string', 'max:50'],
            'parking_address' => ['required', 'string', 'max:50'],
            'parking_building' => ['nullable','string', 'max:255'],
            'parking_detail' => ['nullable','string', 'max:255'],
        ]);

        if( strpos($request->parking_city ,'名古屋') === false){
            return redirect('parkinginfo')
            ->with('message_error', "現在、名古屋市内のみ承っております。順次範囲拡大予定！");
        }

        //更新
        \DB::table('t__parkings')
        ->where('parking_id', $request->parking_id)
        ->update([
            'parking_postcode' => $request->parking_postcode
            // ,'parking_prefecture' => $request->parking_prefecture
            ,'parking_prefecture' => '愛知県'
            ,'parking_city' => $request->parking_city
            ,'parking_address' => $request->parking_address
            ,'parking_building' => $request->parking_building
            ,'parking_detail' => $request->parking_detail
        ]);
        // dd($request);
        return redirect('parkinginfo')
        ->with('message_success', "駐車場の変更が完了しました。");;
    }
    public function delete(Request $request)
    {
        T_Parkings::where('parking_id' ,$request->parking_id)->delete();

        return redirect('parkinginfo')
        ->with('message_success', "駐車場の解除が完了しました。");
    }
}
