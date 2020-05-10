<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class PersonalController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('personalinfo');
    }
        /*
    * MEMO MOTOKI 2020/05/02
    * formのデータは、Request型で渡ってくるらしい。
    * formのname属性が入っている
    * 頭でuse App\UserとIlluminate\Support\Facades\Authを宣言しておく
    */

    public function personalupdateform()
    {
        return view('personalupdate');
    }
    public function personalupdate(Request $request)
    {
        // $user = User::where('id', Auth::id())->first();
        // $user->name = $request->name;
        // $user->name_furigana = $request->name_furigana;
        // $user->email = $request->email;
        // $user->phone_number = $request->phone_number;
        // $user->save();
        $this -> Validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'phone_number' => ['required', 'string', 'max:11'],
            'name_furigana' => ['required', 'string', 'max:255'],
        ]);

        \DB::table('users')
        ->where('id', Auth::id())
        ->update([
            'name' => $request->name
            ,'name_furigana' => $request->name_furigana
            ,'email' => $request->email
            ,'phone_number' => $request->phone_number
        ]);
        return redirect('personalinfo');
    }
    public function personalupdatepasswordform()
    {
        return view('personalupdatepassword');
    }
    public function personalupdatepassword(Request $request)
    {
        $this -> Validate($request, [
            'password_old' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        //現在のパスワードが正しいかを調べる
        if(!(Hash::check($request->password_old, Auth::user()->password))) {
            return redirect()->back()->with('change_password_error', '現在のパスワードが間違っています。');
        }
        //現在のパスワードと新しいパスワードが違っているかを調べる
        if(strcmp($request->password_old, $request->password) == 0) {
            return redirect()->back()->with('change_password_error', '新しいパスワードが現在のパスワードと同じです。違うパスワードを設定してください。');
        }
        //パスワードを変更
        $user = Auth::user();
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect('personalinfo')->with('change_password_success', 'パスワードを変更しました。');
    }
}
