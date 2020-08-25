@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><a href="#" onClick="history.back()"><i class="fas fa-arrow-left pr-3 text-primary"></i></a>予約内容確認</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ url('/reserve_confirm') }}">
                        @csrf
                        <div class="container pt-5" id="confirm">
                            <table class="table table-sm offset-md-2 col-md-8 offset-md-2">
                                <thead>
                                    <tr>
                                    <th scope="col" colspan="2" class="bg-primary text-white text-center">予約内容確認</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr><th scope="row">予約日</th><td>{{ date('Y/m/d',  strtotime($shows['calendar'])) }}</td></tr>
                                    <tr><th scope="row">時間帯</th><td>@if( $shows['shift'] == 1 )
                                    08:00～11:00
                                    @elseif( $shows['shift'] == 2 )
                                    11:00～14:00
                                    @elseif( $shows['shift'] == 3 )
                                    14:00～17:00
                                    @endif
                                    </td></tr>
                                    <tr><th scope="row">メーカー</th><td>{{ $shows['car_maker'] }}</td></tr>
                                    <tr><th scope="row">車名</th><td>{{ $shows['car_name'] }}</td></tr>
                                    <tr><th scope="row">車両年式</th><td>{{ $shows['car_age_start'] }} ~ {{ $shows['car_age_end'] }}</td></tr>
                                    <tr><th scope="row">ナンバー</th><td>{{ $shows['car_number'] }}</td></tr>
                                    <tr><th scope="row">車色</th><td>{{ $shows['car_color'] }}</td></tr>
                                    <tr><th scope="row">郵便番号</th><td>〒{{ $shows['parking_postcode'] }}</td></tr>
                                    <tr><th scope="row">都道府県</th><td>{{ $shows['parking_prefecture'] }}</td></tr>
                                    <tr><th scope="row">市区町村</th><td>{{ $shows['parking_city'] }}</td></tr>
                                    <tr><th scope="row">番地</th><td>{{ $shows['parking_address'] }}</td></tr>
                                    <tr><th scope="row">建物名</th><td>{{ $shows['parking_building'] }}</td></tr>
                                    <tr><th scope="row">駐車場詳細</th><td>{{ $shows['parking_detail'] }}</td></tr>
                                    <tr><th scope="row">洗車料金</th><td>￥{{ number_format($shows['price']) }}</td></tr>
                                    <tr><th scope="row">所持aulaポイント<br><span style="font-size:10px;">※洗車料金よりポイント分割引<br>※クーポン使用時は利用不可<span></th><td>{{ number_format(Auth::user()->tsuke_pay) }} ポイント</td></tr>
                                    <tr><th scope="row">クーポン</th><td>{{ $shows['coupon'] }}</td></tr>
                                    <tr class="table-info"><th scope="row">お支払い料金</th><td>￥{{ number_format($shows['final_price']) }}</td></tr>
                                </tbody>
                            </table>
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

                        <div class="form-check text-center">
                            <input class="form-check-input" type="checkbox" id="defaultCheck3" required>
                            <label class="form-check-label" for="defaultCheck3"><a href="{{ url('/terms') }}" target="_blank">利用規約</a>に同意する。</label>
                        </div>
                        <div class="form-check text-center my-2">
                            <input name="sns_check" type="hidden" value="false">
                            <input class="form-check-input" type="checkbox" id="sns_check" name="sns_check" value="true" checked="checked">
                            <label class="form-check-label" for="sns_check">
                                SNSへのアップロードに同意する（任意）<br>※ナンバーなどの個人情報は伏せます
                            </label>
                        </div>

                        <input type="hidden" name="final_price" value="{{ $shows['final_price'] }}">
                        
                        <div class="form-group row mb-3 mt-4">
                            <div class="col-md-6 offset-md-3 text-center">
                                @if( $shows['final_price'] <= 0 )
                                <button type="submit" class="btn btn-primary">
                                    依頼実行
                                </button>
                                @else
                                <script
                                src="https://checkout.stripe.com/checkout.js"
                                class="stripe-button"
                                data-key="{{ config('app.stripe_public_key') }}"
                                data-amount="{{ $shows['final_price'] }}"
                                data-name="aula"
                                data-label="カード決済＆依頼実行"
                                data-description="洗車決済"
                                data-image="img\logo_stripe.png"
                                data-locale="auto"
                                data-email="{{ Auth::user()->email }}"
                                data-currency="JPY"
                                data-locale="ja">
                                </script>
                                @endif
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

<script src="{{ asset('/js/hierselect.js') }}"></script>
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
        // var price = (height*width*2 + height*length*2 + length*width) *100 *1.5;
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
        var final_price = price - {{ Auth::user()->tsuke_pay }};
        if(final_price < 0){
            final_price = 0;
        };
        $(".price").text("￥" + price.toLocaleString());
        $(".final_price").text("￥" + final_price.toLocaleString());
        // テストここから※本番は↑をコメント外し、↓をコメント化する。
        // $(".final_price").text("￥" +  (final_price* 0.1).toLocaleString() );
        // テストここまで
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
        // var price = (height*width*2 + height*length*2 + length*width) *100 *1.5;
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
        var final_price = price - {{ Auth::user()->tsuke_pay }};
        if(final_price < 0){
            final_price = 0;
        };
        $(".price").text("￥" + price.toLocaleString());
        $(".final_price").text("￥" + final_price.toLocaleString());
        // テストここから※本番は↑をコメント外し、↓をコメント化する。
        // $(".final_price").text("￥" + (final_price* 0.1).toLocaleString() );
        // テストここまで
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
            var mycar = $('#mycar option:selected').text();
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

<script>
    // クーポン確認
    $(function(){
        $('#coupon_confirm').click(function() {
            // コントローラーのメソッドに渡す値
            var coupon = $('#coupon').val();
            console.log(coupon);
           
            $('#coupon').css('color','blue');
            $.ajax({
                headers: {
                    // POSTのときはトークンの記述がないと"419 (unknown status)"になるので注意
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                // POSTだけではなく、GETのメソッドも呼び出せる
                type:'GET',
                // ルーティングで設定したURL
                url:'reserve/' + coupon, // 引数も渡せる
                dataType: 'json',
            }).done(function (results){
                // 成功したときのコールバック
                if( results == "" ){
                    $('#result').css('color','red');
                } else {
                    $('#result').css('color','blue');
                    $('.final_price').text('￥' + results.discount_fee.toLocaleString());
                    console.log(results.discount_fee);
                    if(results.discount_type == 1){
                        $('.final_price').val(results.discount_fee);
                    } else if(results.discount_type == 2) {

                    }
                }
            }).fail(function(jqXHR, textStatus, errorThrown){
                // 失敗したときのコールバック
                $('#result').css('color','red');
                console.log("XMLHttpRequest : " + XMLHttpRequest.status);
            　　console.log("textStatus     : " + textStatus);
            　　console.log("errorThrown    : " + errorThrown.message);
            }).always(function() {
                // 成否に関わらず実行されるコールバック
            });
        })
    });
</script>
@endsection
