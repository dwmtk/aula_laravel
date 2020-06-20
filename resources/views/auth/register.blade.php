@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">新規登録</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">氏名 <span class="badge badge-danger">必須</span></label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name_furigana" class="col-md-4 col-form-label text-md-right">フリガナ <span class="badge badge-danger">必須</span></label>

                            <div class="col-md-6">
                                <input id="name_furigana" type="text" class="form-control @error('name_furigana') is-invalid @enderror" name="name_furigana" value="{{ old('name_furigana') }}" required autocomplete="name" autofocus>

                                @error('name_furigana')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">メールアドレス <span class="badge badge-danger">必須</span></label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone_number" class="col-md-4 col-form-label text-md-right">電話番号 <span class="badge badge-danger">必須</span></label>

                            <div class="col-md-6">
                                <input id="phone_number" type="Phone" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number') }}" required autocomplete="phone_number">

                                @error('phone_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">パスワード <span class="badge badge-danger">必須</span></label>

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
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">パスワード <span class="badge badge-danger">必須</span><br>（確認のため再度入力してください）</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="mx-auto overflow-auto bg-light my-5" style="max-width: 600px; max-height: 300px; font-size:90%;">
                        <p class="m-1">
                        <b>サービスご利用前のご確認事項</b><br><br>
                        ・以下のような場合は、洗車ができない事がございますので、サービスご利用前にご確認下さい。<br><br>
                        １. ご予約いただいた洗車日が雨天の時、または降水確率50％以上の場合。<br><br>
                        ２.洗車スタッフ訪問時、ご予約いただいたお車が無い場合。<br>
                        　(すぐに戻られる場合でも、洗車ができないことがありますので、ご注意下さい。)<br><br>
                        ３.窓やサンルーフ等が開いている場合。<br><br>
                        ４.お車、駐車場所の警報ブザーが鳴り、洗車ができない場合。<br><br>
                        ５.洗車するお車の周囲に、60cm以上のスペースが確保されていない場合。<br><br>
                        ６.タワー式駐車場、立体駐車場、コインパーキング、路上等、許可を得ている占有スペース以外での洗車の場合。<br><br>
                        ７.洗車スタッフが敷地内及び、車庫内に入れない場合。<br><br>
                        ８.マンション等の共用駐車場で洗車許可が下りない場合。<br><br>
                        ９.洗車スタッフ訪問時に住所、車種等が、ご予約時に入力された内容と相違がある場合。<br><br>
                        １０.車両全高が2mを超える場合。<br><br>
                        １１.オフロードや、雪道を走行後等、大量の泥汚れや、虫汚れ等がある場合。<br><br>
                        １２.その他、当社で洗車ができないと判断した場合。<br><br>
                        *ご予約のキャンセルが発生した場合、当社が別途定めるキャンセルポリシーに則り、対応いたします。<br><br>
                        ・その他注意事項<br>
                        　　1. オープンカー等で使用される、外装の幌部分は洗う事ができません。<br><br>
                        　　2.ミラーが畳まれている状態では、内側まで洗う事ができない場合があります。<br><br>
                        </p>
                        </div>

                        <div class="form-check text-center my-3">
                            <input class="form-check-input" type="checkbox" id="privacyPolicyCheck" required>
                            <label class="form-check-label" for="privacyPolicyCheck"><a href="{{ url('/privacypolicy') }}" target="_blank">プライバシーポリシー</a>に同意する。</label>
                        </div>

                        <div class="form-group row">
                            <div class="mx-auto">
                                <button type="submit" class="btn btn-primary">
                                    新規登録
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
