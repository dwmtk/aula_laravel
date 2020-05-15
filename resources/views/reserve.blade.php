@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><a href="{{ url('/home') }}"><i class="fas fa-arrow-left pr-3 text-primary"></i></a>洗車予約</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                    <form method="POST" action="{{ url('/reserved') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="calendar" class="col-md-4 col-form-label text-md-right"><i class="far fa-calendar-alt pr-1"></i>日付 <span class="badge badge-danger">必須</span></label>
                            <div class="col-md-6">
                                <select id="calendar" name="calendar" class="form-control @error('calendar') is-invalid @enderror"  value="{{ old('calendar') }}"  autocomplete="calendar" autofocus required>
                                    <option selected="selected" value="">--選択してください--</option>
                                    @foreach ($calendars as $calendar)
                                    <option value="{{ $calendar->calendar }}" class="{{ $calendar->calendar }}">{{ date('Y年m月d日',  strtotime($calendar->calendar)) }}</option>
                                    @endforeach
                                </select>
                                @error('calendar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="shift" class="col-md-4 col-form-label text-md-right"><i class="far fa-calendar-alt pr-1"></i>シフト <span class="badge badge-danger">必須</span></label>
                            <div class="col-md-6">
                                <select id="shift" name="shift" class="form-control @error('shift') is-invalid @enderror"  value="{{ old('shift') }}" autocomplete="shift" autofocus required>
                                    <option selected="selected" value="">--選択してください--</option>
                                    <option value="1">08:00～11:00</option>
                                    <option value="2">11:00～14:00</option>
                                    <option value="3">14:00～17:00</option>
                                </select>
                                @error('shift')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="mycar" class="col-md-4 col-form-label text-md-right"><i class="fas fa-user pr-1"></i>マイカー情報 <span class="badge badge-danger mycar_badge_onoff">必須</span></label>
                            <div class="col-md-6">
                                <select id="mycar" name="mycar" class="form-control @error('mycar') is-invalid @enderror"  value="{{ old('mycar') }}" required autocomplete="mycar" autofocus>
                                    <option selected="selected" class="0,0,0" value="">--選択してください--</option>
                                    @foreach ($mycars as $mycar)
                                    <option class="{{ $mycar->car_length }},{{ $mycar->car_height }},{{ $mycar->car_width }}" value="{{ $mycar->mycar_id }}">{{ $mycar->car_maker }},{{ $mycar->car_name }},{{ $mycar->car_age_start }},{{ $mycar->car_age_end }},{{ $mycar->car_number }},{{ $mycar->car_color }}</option>
                                    @endforeach
                                </select>
                                @error('mycar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-check text-center my-3">
                            <input name="mycar_onoff_check" type="hidden" value="false">
                            <input class="form-check-input text-md-right" name="mycar_onoff_check" id="mycar_onoff_check" type="checkbox" value="true">
                            <label class="form-check-label" for="mycar_onoff_check">
                                新しくマイカーを登録する。
                            </label>
                        </div>

                        <div class="form-group row mycar_onoff">
                            <label for="car_maker" class="col-md-4 col-form-label text-md-right">メーカー <span class="badge badge-danger">必須</span></label>
                            <div class="col-md-6">
                                <select id="car_maker" name="car_maker" class="form-control @error('car_maker') is-invalid @enderror" value="{{ old('car_maker') }}" autocomplete="car_maker" autofocus>
                                    <option value="" selected="selected" class="default">--選択してください--</option>
                                    @foreach ($car_makers as $car_maker)
                                    <option value="{{ $car_maker->car_maker }}" class="{{ $car_maker->car_maker }}">{{ $car_maker->car_maker }}</option>
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
                            <label for="car_name" class="col-md-4 col-form-label text-md-right">車名 <span class="badge badge-danger">必須</span></label>
                            <div class="col-md-6">
                                <select id="car_name" name="car_name" class="form-control @error('car_name') is-invalid @enderror" value="{{ old('car_name') }}" autocomplete="car_name" autofocus disabled>
                                <option value="" selected="selected" class="default">--選択してください--</option>
                                @foreach ($car_names as $car_name)
                                <option value="{{ $car_name->car_name }}" class="{{ $car_name->car_maker }}">{{ $car_name->car_name }}</option>
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
                            <label for="car_age" class="col-md-4 col-form-label text-md-right">年式 <span class="badge badge-danger">必須</span></label>
                            <div class="col-md-6">
                                <select id="car_age" name="car_age" class="form-control @error('car_age') is-invalid @enderror" value="{{ old('car_age') }}" autocomplete="car_age" autofocus disabled>
                                    <option value="" selected="selected" class="default">--選択してください--</option>
                                    @foreach ($car_ages as $car_age)
                                    <option value="{{ $car_age->car_length }},{{ $car_age->car_height }},{{ $car_age->car_width }},{{ $car_age->car_id }}" class="{{ $car_age->car_name }}">{{ $car_age->car_age }}</option>
                                    @endforeach
                                </select>
                                @error('car_age')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mycar_onoff">
                            <label for="car_number" class="col-md-4 col-form-label text-md-right">ナンバー <span class="badge badge-danger">必須</span></label>

                            <div class="col-md-6">
                                <input id="car_number" type="text" class="form-control @error('car_number') is-invalid @enderror" name="car_number" value="{{ old('car_number') }}" placeholder="あ1234" autocomplete="car_number" autofocus>

                                @error('car_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mycar_onoff">
                            <label for="car_color" class="col-md-4 col-form-label text-md-right">色 <span class="badge badge-danger">必須</span></label>
                            <div class="col-md-6">
                                <select id="car_color" name="car_color" class="form-control @error('car_color') is-invalid @enderror"  value="{{ old('car_color') }}" autocomplete="car_color" autofocus>
                                    <option selected="selected" value="">--選択してください--</option>
                                    <option>白</option>
                                    <option>黒</option>
                                    <option>灰</option>
                                    <option>銀</option>
                                    <option>赤</option>
                                    <option>青</option>
                                    <option>茶</option>
                                    <option>黄</option>
                                    <option>緑</option>
                                    <option>他</option>
                                </select>
                                @error('car_color')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mt-5">
                            <label for="parking" class="col-md-4 col-form-label text-md-right"><i class="fas fa-car pr-1"></i>駐車場情報 <span class="badge badge-danger parking_badge_onoff">必須</span></label>
                            <div class="col-md-6">
                                <select id="parking" name="parking" class="form-control @error('parking') is-invalid @enderror"  value="{{ old('parking') }}" required autocomplete="parking" autofocus>
                                    <option selected="selected" value="">--選択してください--</option>
                                    @foreach ($parkings as $parking)
                                    <option value="{{ $parking->parking_id }}">〒{{ $parking->parking_postcode }},{{ $parking->parking_prefecture }},{{ $parking->parking_city }},{{ $parking->parking_address }},{{ $parking->parking_building }},{{ $parking->parking_detail }}</option>
                                    @endforeach
                                </select>
                                @error('parking')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-check text-center mr-3 my-3 ">
                            <input name="parking_onoff_check" type="hidden" value="false">
                            <input class="form-check-input text-md-right" name="parking_onoff_check" type="checkbox" value="true" id="parking_onoff_check">
                            <label class="form-check-label" for="parking_onoff_check">
                                新しく駐車場を登録する。
                            </label>
                        </div>

                        <div class="form-group row parking_onoff">
                            <label for="parking_postcode" class="col-md-4 col-form-label text-md-right">郵便番号 <span class="badge badge-danger">必須</span></label>

                            <div class="col-md-6">
                                <input id="parking_postcode" type="text" class="form-control @error('parking_postcode') is-invalid @enderror" name="parking_postcode" value="{{ old('parking_postcode') }}" placeholder="4600031" autocomplete="parking_postcode" autofocus>

                                @error('parking_postcode')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row parking_onoff">
                            <label for="parking_prefecture" class="col-md-4 col-form-label text-md-right">都道府県 <span class="badge badge-danger">必須</span></label>

                            <div class="col-md-6">
                                <input id="parking_prefecture" type="text" class="form-control @error('parking_prefecture') is-invalid @enderror" name="parking_prefecture" value="{{ old('parking_prefecture') }}" placeholder="愛知県" autocomplete="name" autofocus>

                                @error('parking_prefecture')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row parking_onoff">
                            <label for="parking_city" class="col-md-4 col-form-label text-md-right">市区町村 <span class="badge badge-danger">必須</span></label>

                            <div class="col-md-6">
                                <input id="parking_city" type="parking_city" class="form-control @error('parking_city') is-invalid @enderror" name="parking_city" value="{{ old('parking_city') }}" placeholder="名古屋市中区本丸" autocomplete="parking_city">

                                @error('parking_city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row parking_onoff">
                            <label for="parking_address" class="col-md-4 col-form-label text-md-right">番地 <span class="badge badge-secondary">任意</span></label>

                            <div class="col-md-6">
                                <input id="parking_address" type="Phone" class="form-control @error('parking_address') is-invalid @enderror" name="parking_address" value="{{ old('parking_address') }}" placeholder="１−１" autocomplete="parking_address">

                                @error('parking_address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row parking_onoff">
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

                        <div class="form-group row parking_onoff">
                            <label for="parking_detail" class="col-md-4 col-form-label text-md-right">詳細 <span class="badge badge-secondary">任意</span></label>

                            <div class="col-md-6">
                            <textarea id="parking_detail" class="form-control @error('parking_detail') is-invalid @enderror" name="parking_detail" value="{{ old('parking_detail') }}" placeholder="入って左手の2番" autocomplete="parking_detail" rows="3"></textarea>

                                @error('parking_detail')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="container mt-5">
                            <div class="row justify-content-center">
                                <p class="col-md-6 text-md-right text-sm-center"><i class="fas fa-pencil-alt pr-1"></i>洗車金額：</p>
                                <p class="col-md-6 text-md-left text-sm-center price">￥0</p>
                                <input type="hidden" name="price" value="0" id="price">
                            </div>
                            <div class="row justify-content-center">
                                <p class="col-md-6 text-md-right text-sm-center"><i class="fas fa-pencil-alt pr-1"></i>前回キャンセル金額：</p>
                                <p class="col-md-6 text-md-left text-sm-center">￥－{{ Auth::user()->tsuke_pay }}</p>
                            </div>
                            <div class="row justify-content-center">
                                <p class="col-md-6 text-md-right text-sm-center"><i class="fas fa-pencil-alt pr-1"></i>お支払金額：</p>
                                <p class="col-md-6 text-md-left text-sm-center final_price">￥0</p>
                                <input type="hidden" name="final_price" value="0" id="final_price">
                            </div>
                        </div>

                        <div class="text-center pb-5">
                            <button type="button" class="btn btn-primary" onclick="location.href='#confirm'">
                                依頼内容確認
                            </button>
                        </div>

                        <div class="container pt-5">
                            <table class="table table-sm offset-md-2 col-md-8 offset-md-2" id="confirm">
                                <thead>
                                    <tr>
                                    <th scope="col" colspan="2" class="bg-primary text-white text-center">予約内容確認</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr><th scope="row">予約日</th><td id="0">---</td></tr>
                                    <tr><th scope="row">時間帯</th><td id="1">---</td></tr>
                                    <tr><th scope="row">メーカー</th><td id="2">---</td></tr>
                                    <tr><th scope="row">車名</th><td id="3">---</td></tr>
                                    <tr><th scope="row">車両年式</th><td id="4">---</td></tr>
                                    <tr><th scope="row">ナンバー</th><td id="5">---</td></tr>
                                    <tr><th scope="row">車色</th><td id="6">---</td></tr>
                                    <tr><th scope="row">郵便番号</th><td id="7">---</td></tr>
                                    <tr><th scope="row">都道府県</th><td id="8">---</td></tr>
                                    <tr><th scope="row">市区町村</th><td id="9">---</td></tr>
                                    <tr><th scope="row">番地</th><td id="10">---</td></tr>
                                    <tr><th scope="row">建物名</th><td id="11">---</td></tr>
                                    <tr><th scope="row">駐車場詳細</th><td id="12">---</td></tr>
                                    <tr class="table-info"><th scope="row">お支払い料金</th><td id="13" class=" final_price">---</td></tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="form-check text-center">
                            <input class="form-check-input" type="checkbox" id="defaultCheck3" required>
                            <label class="form-check-label" for="defaultCheck3">利用規約に同意します。</label>
                        </div>

                        <div class="form-group row mb-3 mt-4">
                            <div class="col-md-6 offset-md-3 text-center">
                                <button type="submit" class="btn btn-primary">
                                    依頼実行
                                </button>
                            </div>
                        </div>
                    </form>



                    <script>
                        $(function() {
                            // 初期表示を非表示にする
                            $(".parking_onoff").hide();
                            $('#parking_onoff_check').change(function() {
                                if ( $('#parking_onoff_check').prop('checked') ){
                                    // 表示する
                                    $(".parking_onoff").show();
                                    $("#parking").prop('disabled', true);
                                    $('#parking').prop("selectedIndex", 0);
                                    $(".parking_badge_onoff").hide();
                                    $("#parking_postcode").prop('required', true);
                                    $("#parking_prefecture").prop('required', true);
                                    $("#parking_city").prop('required', true);
                                    $("#parking_address").prop('required', true);
                                }
                                else
                                {
                                    // 非表示にする
                                    $(".parking_onoff").hide();
                                    $("#parking").prop('disabled', false);
                                    $(".parking_badge_onoff").show();
                                    $("#parking_postcode").prop('required', false);
                                    $("#parking_prefecture").prop('required', false);
                                    $("#parking_city").prop('required', false);
                                    $("#parking_address").prop('required', false);
                                }
                            });
                        });
                        $(function() {
                            $('#mycar').change(function() {
                                var size = $('#mycar option:selected').attr('class');
                                var sizes = size.split(",");
                                var length = Number(sizes[0]);
                                var height = Number(sizes[1]);
                                var width = Number(sizes[2]);
                                var price = (height*width*2 + height*length*2 + length*width) *100;
                                var final_price = price - {{ Auth::user()->tsuke_pay }};
                                if(final_price < 0){
                                    final_price = 0;
                                };
                                $(".price").text("￥" + price.toLocaleString());
                                $(".final_price").text("￥" + final_price.toLocaleString());
                                $("#price").val(price);
                                $("#final_price").val(final_price);
                            });
                        });
                        $(function() {
                            // 初期表示を非表示にする
                            $(".mycar_onoff").hide();
                            $('#mycar_onoff_check').change(function() {
                                if ( $('#mycar_onoff_check').prop('checked') ){
                                    // 表示する
                                    $(".mycar_onoff").show();
                                    $("#mycar").prop('disabled', true);
                                    $("#car_maker").prop('required', true);
                                    $("#car_name").prop('required', true);
                                    $("#car_age").prop('required', true);
                                    $("#car_number").prop('required', true);
                                    $("#car_color").prop('required', true);
                                    $('#mycar').prop("selectedIndex", 0);
                                    $(".mycar_badge_onoff").hide();
                                    $(".price").text("￥0");
                                    $(".final_price").text("￥0");
                                }
                                else
                                {
                                    // 非表示にする
                                    $(".mycar_onoff").hide();
                                    $("#mycar").prop('disabled', false);
                                    $("#car_maker").prop('required', false);
                                    $("#car_name").prop('required', false);
                                    $("#car_age").prop('required', false);
                                    $("#car_number").prop('required', false);
                                    $("#car_color").prop('required', false);
                                    $(".mycar_badge_onoff").show();
                                    $(".price").text("￥0");
                                    $(".final_price").text("￥0");
                                }
                            });
                        });
                        $(function() {
                            $('#car_maker').change(function() {
                                $(".price").text("￥0");
                                $(".final_price").text("￥0");
                            });
                            $('#car_name').change(function() {
                                $(".price").text("￥0");
                                $(".final_price").text("￥0");
                            });
                        });
                        $(function() {
                            $('#car_age').change(function() {
                                var size = $('#car_age option:selected').val();
                                var sizes = size.split(",");
                                var length = Number(sizes[0]);
                                var height = Number(sizes[1]);
                                var width = Number(sizes[2]);
                                var price = (height*width*2 + height*length*2 + length*width) *100;
                                var final_price = price - {{ Auth::user()->tsuke_pay }};
                                if(final_price < 0){
                                    final_price = 0;
                                };
                                $(".price").text("￥" + price.toLocaleString());
                                $(".final_price").text("￥" + final_price.toLocaleString());
                                $("#price").val(price);
                                $("#final_price").val(final_price);
                            });
                        });
                    </script>

                    <script>
                        $(function() {
                            $('#calendar').change(function() {
                                $('#0').text($('#calendar option:selected').text());
                            });
                            $('#shift').change(function() {
                                $('#1').text($('#shift option:selected').text());
                            });
                            $('#mycar').change(function() {
                                var mycar = $('#mycar option:selected').text()
                                var mycars = mycar.split(",");
                                
                                $('#2').text(mycars[0]);
                                $('#3').text(mycars[1]);
                                $('#4').text(mycars[2]+"～"+mycars[3]);
                                $('#5').text(mycars[4]);
                                $('#6').text(mycars[5]);
                            });
                            $('#car_maker').change(function() {
                                $('#2').text($('#car_maker option:selected').text());
                            });
                            $('#car_name').change(function() {
                                $('#3').text($('#car_name option:selected').text());
                            });
                            $('#car_age').change(function() {
                                $('#4').text($('#car_age option:selected').text());
                            });
                            $('#car_number').change(function() {
                                $('#5').text($('#car_number').val());
                            });
                            $('#car_color').change(function() {
                                $('#6').text($('#car_color option:selected').text());
                            });
                            $('#parking').change(function() {
                                var parking = $('#parking option:selected').text()
                                var parkings = parking.split(",");
                                
                                $('#7').text(parkings[0]);
                                $('#8').text(parkings[1]);
                                $('#9').text(parkings[2]);
                                $('#10').text(parkings[3]);
                                $('#11').text(parkings[4]);
                                $('#12').text(parkings[5]);
                            });
                            $('#parking_postcode').change(function() {
                                $('#7').text($('#parking_postcode').val());
                            });
                            $('#parking_prefecture').change(function() {
                                $('#8').text($('#parking_prefecture').val());
                            });
                            $('#parking_city').change(function() {
                                $('#9').text($('#parking_city').val());
                            });
                            $('#parking_address').change(function() {
                                $('#10').text($('#parking_address').val());
                            });
                            $('#parking_building').change(function() {
                                $('#11').text($('#parking_building').val());
                            });
                            $('#parking_detail').change(function() {
                                $('#12').text($('#parking_detail').val());
                            });
                        });
                    </script>
                    <script src="{{ asset('/js/hierselect.js') }}"></script>
            
                </div>
                <div class="card-footer" style="background: #E8F3FF;">
                    @include('layouts.menu')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
