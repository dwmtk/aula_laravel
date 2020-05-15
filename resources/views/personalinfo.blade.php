@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">個人情報管理</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (session('change_password_success'))
                        <div class="container mt-2">
                        <div class="alert alert-success">
                            {{session('change_password_success')}}
                        </div>
                        </div>
                    @endif

                    <table class="table">
                    <tbody>
                        <tr><th scope="row">氏名</th><td>{{ Auth::user()->name }}</td></tr>
                        <tr><th scope="row">フリガナ</th><td>{{ Auth::user()->name_furigana }}</td></tr>
                        <tr><th scope="row">メールアドレス</th><td>{{ Auth::user()->email  }}</td></tr>
                        <tr><th scope="row">電話番号</th><td>{{ Auth::user()->phone_number   }}</td></tr>
                        <tr><th scope="row">パスワード</th><td class="text-secondary">セキュリティ保護のため非表示</td></tr>
                        </tbody>
                    </table>
                    <div class="text-center">
                        <a class="btn btn-outline-info" href="{{ url('personalupdate') }}" role="button">個人情報変更</a>
                        <a class="btn btn-outline-info" href="{{ url('personalupdatepassword') }}" role="button">パスワード変更</a>
                    </div>
                </div>
                <div class="card-footer" style="background: #E8F3FF;">
                    @include('layouts.menu')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
