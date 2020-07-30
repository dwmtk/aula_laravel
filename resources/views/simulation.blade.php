@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">料金シュミレーション</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <p class="text-center" style="position:relative;">料金シュミレーションする車を入力してください。</p>

                        <div class="form-group row mycar_onoff">
                            <label for="car_maker" class="col-md-4 col-form-label text-md-right">メーカー</label>
                            <div class="col-md-6">
                                <select id="car_maker" name="car_maker" class="form-control @error('car_maker') is-invalid @enderror" value="{{ old('car_maker') }}" autocomplete="car_maker" autofocus>
                                    <option value="" selected="selected" class="default">--選択してください--</option>
                                    @foreach ($car_makers as $car_maker)
                                    @if($car_maker[1] == 0)
                                        <option value="{{ $car_maker[0] }}" class="{{ $car_maker[0] }}" disabled>{{ $car_maker[0] }}</option>
                                    @else($car_maker[1] == 1)
                                        <option value="{{ $car_maker[0] }}" class="{{ $car_maker[0] }}">{{ $car_maker[0] }}</option>
                                    @endif
                                    @endforeach
                                </select>
                                @error('car_maker')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mycar_onoff">
                            <label for="car_name" class="col-md-4 col-form-label text-md-right">車名</label>
                            <div class="col-md-6">
                                <select id="car_name" name="car_name" class="form-control @error('car_name') is-invalid @enderror" value="{{ old('car_name') }}" autocomplete="car_name" autofocus disabled>
                                <option value="" selected="selected" class="default">--選択してください--</option>
                                @foreach ($car_names as $car_name)
                                <option value="{{ $car_name->car_maker }}___{{ $car_name->car_name }}" class="{{ $car_name->car_maker }}">{{ $car_name->car_name }}</option>
                                @endforeach
                                </select>
                                @error('car_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mycar_onoff">
                            <label for="car_age" class="col-md-4 col-form-label text-md-right">年式</label>
                            <div class="col-md-6">
                                <select id="car_age" name="car_age" class="form-control @error('car_age') is-invalid @enderror" value="{{ old('car_age') }}" autocomplete="car_age" autofocus disabled>
                                    <option value="" selected="selected" class="default">--選択してください--</option>
                                    @foreach ($car_ages as $car_age)
                                    <option value="{{ $car_age->car_length }},{{ $car_age->car_height }},{{ $car_age->car_width }},{{ $car_age->car_id }}" class="{{ $car_age->car_maker }}___{{ $car_age->car_name }}">{{ $car_age->car_age }}</option>
                                    @endforeach
                                </select>
                                @error('car_age')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <label id="hidden_area" style="display:none"></label>
                        <label id="hidden_area2" style="display:none"></label>

                        <p class="text-center mycar_onoff small">
                        ※プルダウンに存在しない車種に関しては contact@aula.blue へお問い合わせください。
                        </p>
                        
                        <div class="container mt-5 mb-3" style="font-size:130%;">
                            <div class="row justify-content-center">
                                <span class="col-md-6 text-center"><i class="fas fa-pencil-alt pr-1"></i>洗車金額：<span class="col-md-6 text-md-left text-sm-center price">￥0</span></span>
                                <input type="hidden" name="price" value="0" id="price">
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('/js/hierselect.js') }}"></script>
<script>
    $(function() {
        $('#car_maker').change(function() {
            $(".price").text("￥0");
        });
        $('#car_name').change(function() {
            $(".price").text("￥0");
        });
    });
    $(function() {
        $('#car_age').change(function() {
            var size = $('#car_age option:selected').val();
            var sizes = size.split(",");
            var length = Number(sizes[0]);
            var height = Number(sizes[1]);
            var width = Number(sizes[2]);
            var area = height*width*2 + height*length*2 + length*width;
            if(area <= 26.0){
                //Sサイズのとき 24.82
                price = 8000;
            } else if(area >= 33.5){
                //Lサイズのとき 33.26
                price = 12000;
            } else {
                //それ以外（Mサイズ）
                price = 10000;
            }

            // var price = (height*width*2 + height*length*2 + length*width) *100 *1.5;
            // price = Math.round(price/1000) * 1000;
            // if(price > 6000){
            //     price = 6000;
            // }
            // if(price < 3000){
            //     price = 3000;
            // }
            $(".price").text("￥" + price.toLocaleString());
            $("#price").val(price);
        });
    });
</script>
@endsection
