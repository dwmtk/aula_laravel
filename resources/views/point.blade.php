@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">サービスご利用前のご確認事項</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="text-center">
                        <h5 class="py-5">サービスご利用前のご確認事項</h5>
                        <p class="text-left">
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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
