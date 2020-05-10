@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">個人情報変更</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (session('change_password_error'))
                    <div class="container mt-2">
                        <div class="alert alert-danger">
                        {{session('change_password_error')}}
                        </div>
                    </div>
                    @endif
                    <form method="POST" action="{{ url('/personalupdatepassword') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="password_old" class="col-md-4 col-form-label text-md-right">現在のパスワード <span class="badge badge-danger">必須</span></label>

                            <div class="col-md-6">
                                <input id="password_old" type="password" class="form-control @error('password_old') is-invalid @enderror" name="password_old" required autocomplete="new-password">

                                @error('password_old')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">新パスワード <span class="badge badge-danger">必須</span></label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">新パスワード <span class="badge badge-danger">必須</span><br>（確認のため再度入力してください）</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    パスワード変更
                                </button>
                            </div>
                        </div>
                    <div class="">
                        <a class="btn btn-outline-info" href="{{ url('personalinfo') }}" role="button">戻る</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
