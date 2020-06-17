<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>aula</title>

        
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
       
        <style>
             /* @keyframes fadeIn {
                0% {opacity: 0}
                100% {opacity: 1}
            }

            @-webkit-keyframes fadeIn {
                0% {opacity: 0}
                100% {opacity: 1}
            }
            html, body {
                animation: fadeIn 2s ease 0s 1 normal;
                -webkit-animation: fadeIn 2s ease 0s 1 normal;
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            } */

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }
            /* 
            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            .img-responsive {
                display: block;
                height: auto;
                max-width: 100%;
            }  */
        </style>
        
        <style>
            html{
                word-break: break-all;
            }

            /* ナビバーここから */
            #nav-drawer {
                position: relative;
            }

            /*チェックボックス等は非表示に*/
            .nav-unshown {
                display:none;
            }

            /*アイコンのスペース*/
            /* 
            #nav-open {
                display: inline-block;
                width: 30px;
                height: 22px;
                vertical-align: middle;
            }
            
            #nav-open span, #nav-open span:before, #nav-open span:after {
                position: absolute;
                height: 3px;
                width: 50px;
                border-radius: 3px;
                background: #006f8a;
                display: block;
                content: '';
                cursor: pointer;
            }
            #nav-open span:before {
                bottom: -8px;
            }
            #nav-open span:after {
                bottom: -16px;
            } 
            */
            #nav-open ,
            #nav-open span {
                display: inline-block;
                transition: all .4s;
                box-sizing: border-box;
            }
            #nav-open {
                position: absolute;
                top:20px;
                right:20px;
                width: 50px;
                height: 38px;
            }
            #nav-open span {
                position: absolute;
                left: 0;
                width: 100%;
                height: 2px;
                background-color: #006f8a;
                border-radius: 4px;
            }
            #nav-open span:nth-of-type(1) {
                top: 0;
            }
            #nav-open span:nth-of-type(2) {
                top: 18px;
            }
            #nav-open span:nth-of-type(3) {
                bottom: 0;
            }
            #nav-open.active span:nth-of-type(1) {
                -webkit-transform: translateY(20px) rotate(-45deg);
                transform: translateY(20px) rotate(-45deg);
            }
            #nav-open.active span:nth-of-type(2) {
                opacity: 0;
            }
            #nav-open.active span:nth-of-type(3) {
                -webkit-transform: translateY(-20px) rotate(45deg);
                transform: translateY(-20px) rotate(45deg);
            }
            /* MENUの文字 */
            #nav-open div {
                position:absolute;
                top:42px;
                color: #006f8a;
                left:50%;
                transform: translateX(-50%);
                -webkit-transform: translateX(-50%);
                white-space: nowrap;
            }
            /*閉じる用の薄黒カバー*/
            #nav-close {
                display: none;/*はじめは隠しておく*/
                position: fixed;
                z-index: 99;
                top: 0;/*全体に広がるように*/
                left: 0;
                width: 100%;
                height: 100%;
                background: black;
                opacity: 0;
                transition: .3s ease-in-out;
            }

            /*中身*/
            #nav-content {
                overflow: auto;
                position: fixed;
                top: 0;
                right: 0;
                z-index: 9999;/*最前面に*/
                width: 90%;/*右側に隙間を作る（閉じるカバーを表示）*/
                max-width: 330px;/*最大幅（調整してください）*/
                height: 100%;
                background: #8f8f8f;/*背景色*/
                transition: .3s ease-in-out;/*滑らかに表示*/
                -webkit-transform: translateX(105%);
                transform: translateX(105%);/*左に隠しておく*/
            }

            /*チェックが入ったらもろもろ表示*/
            #nav-input:checked ~ #nav-close {
                display: block;/*カバーを表示*/
                opacity: .5;
            }

            #nav-input:checked ~ #nav-content {
                -webkit-transform: translateX(0%);
                transform: translateX(0%);/*中身を表示（右へスライド）*/
                box-shadow: 6px 0 25px rgba(0,0,0,.15);
            }

            .nav-reserve-btn{
                margin:50px 0 10px 0;
                width:250px;
                text-decoration:none;
                text-align:center;
                padding:8px 0 10px;
                color:#8f8f8f;
                background-color:#fff;
                border: none;
                outline: none;
                border-radius:20px;
            }

            /* バツボタン */
            .nav-close-bar{
                display: block;
                width: 50px;/*枠の大きさ*/
                height: 50px;/*枠の大きさ*/
                position: absolute;
                top:10px;
                right:10px;
            }

            .nav-close-bar::before, .nav-close-bar::after{
                content: "";
                display: block;
                width: 100%;/*バツ線の長さ*/
                height: 2px;/*バツ線の太さ*/
                background: #fff;
                transform: rotate(45deg);
                transform-origin:0% 50%;
                position: absolute;
                top: calc(14% - 5px);
                left: 14%;
            }

            .nav-close-bar::after{
                transform: rotate(-45deg);
                transform-origin:100% 50%;
                left: auto;
                right: 14%;
            }
            /* ナビバーここまで */

            .left-text-parent{
                position:relative;
            }
            .left-text{
                position:absolute;
                left:-50px; 
                transform: rotate(90deg); 
                z-index: 1;
                color:gray;
            }
            header{
                background-color:#a1d4d1;
                height:800px;
                position:relative;
            }
            .header-text1{
                font-size:300%;
            }
            .header-text2{
                font-size:600%;
            }
            .header-text3{
                font-size:200%;
            }

            .logo{
                position:absolute;
                top:20px;
                left:20px;
            }
            .header-text{
                position:absolute;
                top:160px;
                left:130px;
                overflow:hidden;
                /* margin-top:-180px;
                margin-left:-130px; */
            }
            .content-box{
                width:250px;
                height:150px;
                background-color:#c0c0c0;
            }
            .work-box{
                width:300px;
                height:400px;
                background-color:#f5f5f5;
            }
            .work-image{
                position:relative;
                top:10px;
                left:10px;
                width:280px;
                height:190px;
                background-color:#c0c0c0;
            }
            .instagram-box{
                width:250px;
                height:150px;
                background-color:#f5f5f5;
            }
            .price-section{
                background-color:#a1d4d1;
            }
            .price-box{
                width:250px;
                height:250px;
                background-color:#f5f5f5;
            }
            .price-btn{
                margin:50px 0 10px 0;
                width:350px;
                text-decoration:none;
                text-align:center;
                padding:8px 0 10px;
                color:#fff;
                background-color:#006f8a;
                border: none;
                outline: none;
                border-radius:20px;
            }
            .flow-section{
                position:relative;
            }
            .flow-number{
                position:relative;
                top:-30px;
                left:-100px;
                font-size:300%;
                z-index: 1;
                color:#006f8a;
            }
            .flow-box{
                position:relative;
                width:300px;
                height:400px;
            }
            .flow-image{
                position:absolute;
                top:10px;
                left:10px;
                width:280px;
                height:170px;
                border-style:solid;
                border-color:#a1d4d1;
                vertical-align: middle;
                display: table;
            }
            .flow-image-text{
                display: table-cell;
                vertical-align: middle;
            }
            .flow-image-top{
                font-size:230%;
            }
            .flow-image-sub{
                color:#a1d4d1;
            }
            .flow-text{
                position:absolute;
                width:280px;
                top:190px;
                left:10px;
                text-align:left;
            }
            .staff-section{
                position:relative;
            }
            .staff-box-parent{
                position:relative;
            }
            .staff-background{
                position:absolute;
                background-color:#a1d4d1;
                text-align:left;
                top:180px;
                width:90%;
                height:250px;
            }
            .staff-box1{
                width:350px;
                height:250px;
                background-color:#f5f5f5;
            }
            .staff-box2{
                font-size:80%;
                text-align:left;
                width:420px;
                height:250px;
                position:relative;
            }
            .staff-text{
                position:absolute;
                top:120px;
                color:white;
            }
            .reservation-btn{
                margin:50px 0 10px 0;
                min-width:350px;
                text-decoration:none;
                text-align:center;
                padding:8px 0 10px;
                color:#fff;
                background-color:#006f8a;
                border: none;
                outline: none;
                border-radius:40px;
            }
            .reservation-btn-text1{
                font-size:200%;
            }
            .reservation-btn-text2{
                font-size:80%;
            }
            footer{
                background-color:gray;
                height:200px;
            }
        </style>
    </head>
    <body>
        <div class="left-text-parent">
            <div class="left-text" style="top:400px;">©aula-waterlesscarwash</div>
            <div class="left-text" style="top:1000px;">©aula-waterlesscarwash</div>
            <div class="left-text" style="top:1600px;">©aula-waterlesscarwash</div>
            <div class="left-text" style="top:2200px;">©aula-waterlesscarwash</div>
            <div class="left-text" style="top:2800px;">©aula-waterlesscarwash</div>
            <div class="left-text" style="top:3200px;">©aula-waterlesscarwash</div>
            <div class="left-text" style="top:3800px;">©aula-waterlesscarwash</div>
            <div class="left-text" style="top:4200px;">©aula-waterlesscarwash</div>
            <div class="left-text" style="top:4800px;">©aula-waterlesscarwash</div>
        </div>
        <header>
            <div id="nav-drawer">
                <input id="nav-input" type="checkbox" class="nav-unshown">
                <label id="nav-open" for="nav-input"><span></span><span></span><span></span><div>MENU</div></label>
                <label class="nav-unshown" id="nav-close" for="nav-input"></label>
                <div id="nav-content" class="text-white text-center py-2 pb-4">
                    <!-- <div class="nav-close-bar"></div> -->
                    <label class="nav-close-bar" for="nav-input"></label>
                    <div class="py-4"><h3>menu</h3></div>
                    <div>
                    <ul style="list-style: none; padding:0;">
                        <li>
                            <h5><a href="#concept" style="color:#fff;">CONCEPT</a></h5>
                            <p style="font-size:80%;">コンセプト</p>
                        </li>
                        <li>
                            <h5><a href="#works" style="color:#fff;">WORKS</a></h5>
                            <p style="font-size:80%;">施工実績</p>
                        </li>
                        <li>
                            <h5><a href="#price" style="color:#fff;">PRICE</a></h5>
                            <p style="font-size:80%;">料金について</p>
                        </li>
                        <li>
                            <h5><a href="#flow" style="color:#fff;">FLOW</a></h5>
                            <p style="font-size:80%;">洗車までの流れ</p>
                        </li>
                        <li>
                            <h5><a href="#staff" style="color:#fff;">STAFF</a></h5>
                            <p style="font-size:80%;">スタッフ紹介</p>
                        </li>
                    </ul>
                    </div>
                    <div>
                        <button class="nav-reserve-btn" type="button"onclick="location.href='#'">RESERVATION</button>
                    </div>
                </div>
            </div>
            <div>
                <a href="{{ url('/') }}">
                    <img class="logo" src="{{ asset('img/aula-logo-top.png') }}" >
                </a>
            <div>           
            <div class="header-text cover text-white py-5">
                <p class="header-text1">Revolutionary car wash</p>
                <p class="header-text2">WATERLESS<br>CAR WASH</p>
                <div style="position:relative;">
                    <div style="position:absolute; background-color:white; top:-20px; width:120px; height:8px;"></div>
                </div>
                <p class="header-text3">洗車サービス“アウラ”で全く新しい<br>洗車のカタチをお届けします</p>
            </div>
        </header>

        <main>
            <section id="concept" class="text-center py-5">
                <h2>CONCEPT</h2>
                <div style="position:relative;">
                    <div style="position:absolute; background-color:#a1d4d1; top: 0; left: 50%; transform: translateX(-50%);width:120px; height:4px;"></div>
                </div>
                <p class="py-3"><b>時間と手間を一挙に解消する出張洗車サービス</b></p>
                <p>
                “アウラ”は「洗車にかかる時間・手間を解消し、お客様にいつもピカピカの車に乗り続けてほしい」<br>
                という重いから生まれた出張洗車サービスです。「今日も車が綺麗で気持ちいいな」と感じて頂ける事がやりがい。<br>
                今後は、車がピカピカであり続ける気持ちよさを、日本全国のお客様に感じて頂けるよう、サービス範囲を拡大予定。
                </p>
            </section>
            <section>
                <div class="d-flex justify-content-center flex-wrap">
                    <div class="content-box m-1">image 1</div>
                    <div class="content-box m-1">image 2</div>
                    <div class="content-box m-1">image 3</div>
                    <div class="content-box m-1">image 4</div>
                    <div class="content-box m-1">image 5</div>
                    <div class="content-box m-1">image 6</div>
                    <div class="content-box m-1">image 7</div>
                    <div class="content-box m-1">image 8</div>
                    <div class="content-box m-1">image 9</div>
                    <div class="content-box m-1">image 10</div>
                </div>
            </section>
            <section id="works" class="text-center py-5">
                <h2>WORKS</h2>
                <div class="pb-5" style="position:relative;">
                    <div style="position:absolute; background-color:#a1d4d1; top: 0; left: 50%; transform: translateX(-50%);width:120px; height:4px;"></div>
                </div>
                <div class="d-flex justify-content-center flex-wrap">
                    <div class="work-box m-1"><div class="work-image">image 1</div></div>
                    <div class="work-box m-1"><div class="work-image">image 2</div></div>
                    <div class="work-box m-1"><div class="work-image">image 3</div></div>
                </div>
                <div class="d-flex justify-content-center flex-wrap">
                    <div class="work-box m-1"><div class="work-image">image 4</div></div>
                    <div class="work-box m-1"><div class="work-image">image 5</div></div>
                    <div class="work-box m-1"><div class="work-image">image 6</div></div>
                </div>
            </section>
            <section id="instagram" class="text-center py-5">
                <h2>Instagram</h2>
                <div class="pb-5" style="position:relative;">
                    <div style="position:absolute; background-color:#a1d4d1; top: 0; left: 50%; transform: translateX(-50%);width:120px; height:4px;"></div>
                </div>
                <!-- SnapWidget -->
                <script src="https://snapwidget.com/js/snapwidget.js"></script>
                <iframe src="https://snapwidget.com/embed/839929" class="snapwidget-widget" allowtransparency="true" frameborder="0" scrolling="no" style="border:none; overflow:hidden;  width:100%; "></iframe>
                
                <div class="d-flex justify-content-center flex-wrap">
                    <div class="instagram-box m-1">image 1</div>
                    <div class="instagram-box m-1">image 2</div>
                    <div class="instagram-box m-1">image 3</div>
                    <div class="instagram-box m-1">image 4</div>
                    <div class="instagram-box m-1">image 5</div>
                    <div class="instagram-box m-1">image 6</div>
                    <div class="instagram-box m-1">image 7</div>
                    <div class="instagram-box m-1">image 8</div>
                    <div class="instagram-box m-1">image 9</div>
                    <div class="instagram-box m-1">image 10</div>
                </div>
            </section>
            <section id="price" class="price-section text-center py-5 text-white">
                <div>
                    <h2>Price</h2>
                    <div style="position:relative;">
                    <div style="position:absolute; background-color:white; top: 0; left: 50%; transform: translateX(-50%);width:120px; height:4px;"></div>
                </div>
                    <p class="py-2">一つ一つの車種に合わせた独自の料金設定</p>
                    <p class="pb-5">各車種によって値段設定をしています</p>
                </div>
                <div class="d-flex justify-content-center flex-wrap">
                    <div class="price-box m-1">image 1</div>
                    <div class="price-box m-1">image 2</div>
                    <div class="price-box m-1">image 3</div>
                    <div class="price-box m-1">image 4</div>
                </div>
                <div>
                    <button class="price-btn" type="button"onclick="location.href='#'">洗車料金詳細はこちら</button>
                </div>
            </section>
            <section id="flow" class="text-center py-5 flow-section">
                <h2>Flow</h2>
                <div class="pb-5" style="position:relative;">
                    <div style="position:absolute; background-color:#a1d4d1; top: 0; left: 50%; transform: translateX(-50%);width:120px; height:4px;"></div>
                </div>
                <div class="d-flex justify-content-center flex-wrap">
                    <div class="flow-box m-1">
                        <div class="flow-number">1</div>
                        <div class="flow-image"><span class="flow-image-text"><span class="flow-image-top">会員登録</span><br><span class="flow-image-sub">REGISTRATION</span></span></div>
                        <div class="flow-text">立ち合い不要。スキマ時間に 洗車可能。洗車時間は車種によりま すが、30分～1時間。</div>
                    </div>
                    <div class="flow-box m-1">
                        <div class="flow-number">2</div>
                        <div class="flow-image"><span class="flow-image-text"><span class="flow-image-top">洗車予約</span><br><span class="flow-image-sub">reservation</span></span></div>
                        <div class="flow-text">洗車日と車種、駐車場を入力し、<br>クレジットカードで支払い後、即予<br>約完了。(事前にマイカー、駐車場を<br>登録しておくことで素早い予約が可能)<br>雨天時やお客様都合のキャンセルの<br>場合、全額ポイントとして付与する。<br>ポイントは次回洗車予約に使用可能、<br>有効期限無し。</div>
                    </div>
                    <div class="flow-box m-1">
                        <div class="flow-number">3</div>
                        <div class="flow-image"><span class="flow-image-text"><span class="flow-image-top">洗車</span><br><span class="flow-image-sub">Car wash</span></span></div>
                        <div class="flow-text">立ち合い不要。スキマ時間に<br>洗車可能。洗車時間は車種によりま<br>すが、30分～1時間。</div>
                    </div>
                    <div class="flow-box m-1">
                        <div class="flow-number">4</div>
                        <div class="flow-image"><span class="flow-image-text"><span class="flow-image-top">完了</span><br><span class="flow-image-sub">Finish!</span></span></div>
                        <div class="flow-text">洗車完了時、完了メールを<br>ユーザーに送信。</div>
                    </div>
                </div>
            </section>
            <section id="staff" class="text-center py-5 staff-section">
                <div class="staff-background"></div>
                <div class="mb-5">
                    <h2>staff</h2>
                    <div style="position:relative;">
                    <div style="position:absolute; background-color:#a1d4d1; top: 0; left: 50%; transform: translateX(-50%);width:120px; height:4px;"></div>
                </div>
                </div>
                <div class="d-flex justify-content-center flex-wrap staff-box-parent">
                    <div class="staff-box1 m-1">image 1</div>
                    <div class="staff-box2 m-1 ml-3"><span class="staff-text">我々は、洗車にかかる時間・手間を解消し、お客様にいつもピカピカの<br>車に乗り続けて頂けるよう、出張洗車サービスを立ち上げた。<br>お客様が駐車場で、「今日も車が綺麗で気持ちいいな」と感じて頂ける<br>事がやりがい。今後は、車がピカピカであり続ける気持ちよさを、<br>日本全国のお客様に感じて頂けるよう、サービス範囲を拡大予定。</span></div>
                </div>
            </section>
            <section class="text-center py-5">
                <div>
                    <button class="reservation-btn" type="button"onclick="location.href='#'">
                        <span class="reservation-btn-text1">RESERVATION</span><br><soan class="reservation-btn-text2">ご予約はこちら</span>
                    </button>
                </div>
            </section>
        </main>
        <footer>
        </footer>

        <!--
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">マイページ</a>
                    @else
                        <a href="{{ route('login') }}">ログイン</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">新規登録</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    <img class="logo img-responsive" src="{{ asset('img/aula_logo.png') }}" alt="">
                </div>
            </div>      
        </div>
        -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

    </body>
</html>
