@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><a href="{{ url('/parkinginfo') }}"><i class="fas fa-arrow-left pr-3 text-primary"></a></i>駐車場追加</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ url('/parkinginsert') }}" class="h-adr">
                        @csrf
                        <span class="p-country-name" style="display:none;">Japan</span>

                        <div class="form-group row">
                            <label for="parking_postcode" class="col-md-4 col-form-label text-md-right">郵便番号 <span class="badge badge-danger">必須</span></label>

                            <div class="col-md-6">
                                <input id="parking_postcode" type="text" class="form-control @error('parking_postcode') is-invalid @enderror p-postal-code" name="parking_postcode" value="{{ old('parking_postcode') }}" placeholder="4600031" required autocomplete="parking_postcode" autofocus>

                                @error('parking_postcode')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="parking_prefecture" class="col-md-4 col-form-label text-md-right">都道府県 <span class="badge badge-danger">必須</span></label>

                            <div class="col-md-6">
                                <input id="parking_prefecture" type="text" class="form-control @error('parking_prefecture') is-invalid @enderror p-region" name="parking_prefecture" value="{{ old('parking_prefecture') }}" placeholder="愛知県" required autocomplete="name">

                                @error('parking_prefecture')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="parking_city" class="col-md-4 col-form-label text-md-right">市区町村 <span class="badge badge-danger">必須</span></label>

                            <div class="col-md-6">
                                <input id="parking_city" type="parking_city" class="form-control @error('parking_city') is-invalid @enderror p-locality p-street-address p-extended-address" name="parking_city" value="{{ old('parking_city') }}" placeholder="名古屋市中区本丸" required autocomplete="parking_city">

                                @error('parking_city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="parking_address" class="col-md-4 col-form-label text-md-right">番地 <span class="badge badge-danger">必須</span></label>

                            <div class="col-md-6">
                                <input id="parking_address" type="Phone" class="form-control @error('parking_address') is-invalid @enderror" name="parking_address" value="{{ old('parking_address') }}" placeholder="１−１" required autocomplete="parking_address">

                                @error('parking_address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="parking_building" class="col-md-4 col-form-label text-md-right">建物名 <span class="badge badge-secondary">任意</span></label>

                            <div class="col-md-6">
                                <input id="parking_building" type="Phone" class="form-control @error('parking_building') is-invalid @enderror" name="parking_building" value="{{ old('parking_building') }}" placeholder="名古屋城" autocomplete="parking_building">

                                @error('parking_building')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="parking_detail" class="col-md-4 col-form-label text-md-right">詳細 <span class="badge badge-secondary">任意</span></label>

                            <div class="col-md-6">
                            <textarea id="parking_detail" class="form-control @error('parking_detail') is-invalid @enderror" name="parking_detail" value="{{ old('parking_detail') }}" placeholder="入って左手の2番、屋根あり" autocomplete="parking_detail" rows="3"></textarea>
                            <p class="small pt-1">
                            ※駐車場に屋根がある場合は、詳細欄にその旨ご記入いただければ雨天時も洗車可能です。
                            </p>

                                @error('parking_detail')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0 mt-4">
                            <div class="col-md-6 offset-md-4 text-center">
                                <button type="submit" class="btn btn-primary">
                                駐車場追加
                                </button>
                            </div>
                        </div>
                    </form>                    
                </div>
                <div class="card-footer" style="background: #E8F3FF;">
                    @include('layouts.menu')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
