<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>aula</title>

        <script src="https://kit.fontawesome.com/5e480eacce.js" crossorigin="anonymous"></script>
        
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@300;400;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
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
                    <div class="pt-3 pb-4">
                        <a href="https://www.instagram.com/aula_waterlesscarwash/" target="_blank"><i class="fab fa-instagram p-1 fa-lg pr-5" style="color:#fff;"></i></a>
                        <a href=""><i class="fab fa-twitter p-1 fa-lg pr-5" style="color:#fff;"></i></a>
                        <a href=""><i class="fab fa-facebook-f p-1 fa-lg" style="color:#fff;"></i></a>
                    </div>
                    <div>
                        <button class="nav-reserve-btn" type="button"onclick="location.href='{{ url('/reserve') }}'">RESERVATION</button>
                    </div>
                </div>
            </div>
            <div>
                <a href="{{ url('/') }}">
                    <img class="logo" src="{{ asset('img/logo.png') }}" >
                </a>
            <div>
            <div>
                <a href="{{ url('/login') }}"><img class="login-btn" src="{{ asset('img/login.png') }}"></a>
            </div>
            <div class="header-text">
                <img class="header-text-img" src="{{ asset('img/firstview_title.png') }}">
                <img class="header-text-img-logo-sm" src="{{ asset('img/logo.png') }}" >
                <img class="header-text-img-sm" src="{{ asset('img/firstview_title_sm.png') }}">
            </div>
        </header>

        <main>
            <!-- CONCEPT -->
            <section id="concept" class="text-center">
                <!-- コンテンツタイトル -->
                <img class="concept-title" src="{{ asset('img/concept.png') }}">
                <!-- ライン -->
                <div style="position:relative;">
                    <div style="position:absolute; background-color:#a1d4d1; top: 0; left: 50%; transform: translateX(-50%);width:120px; height:2px;"></div>
                </div>
                <!-- コンテンツ -->
                <p class="concept-text1">
                    お客様の時間と手間を一挙に解消する<br>名古屋市限定の出張洗車サービス
                </p>
                <p class="concept-text2">
                “アウラ”は「洗車にかかる時間・手間を解消し、お客様にいつもピカピカの車に乗り続けてほしい」<br>
                という思いから生まれた、出張洗車サービスです。「今日も車が綺麗で気持ちいいな」と感じて頂ける事がやりがいです。<br>
                今後は、車がピカピカであり続ける気持ちよさを、日本全国のお客様に感じて頂けるよう、サービス範囲を拡大予定。
                </p>
                <p class="concept-text2-sm">
                “アウラ”は「洗車にかかる時間・手間を解消し、<br>
                お客様にいつもピカピカの車に乗り続けてほしい」<br>
                という思いから生まれた、出張洗車サービスです。<br>
                「今日も車が綺麗で気持ちいいな」と感じて頂ける事がやりがいです。<br>
                今後は、車がピカピカであり続ける気持ちよさを、<br>
                日本全国のお客様に感じて頂けるよう、サービス範囲を拡大予定。
                </p>
                <div class="concept-box-parent">
                    <div class="d-flex justify-content-center flex-nowrap">
                        <div class="concept-box m-1"><img src="{{ asset('img/sample_01.jpg') }}"></div>
                        <div class="concept-box m-1"><img src="{{ asset('img/sample_02.jpg') }}"></div>
                        <div class="concept-box m-1"><img src="{{ asset('img/sample_03.jpg') }}"></div>
                        <div class="concept-box m-1"><img src="{{ asset('img/sample_04.jpg') }}"></div>
                        <div class="concept-box m-1"><img src="{{ asset('img/sample_01.jpg') }}"></div>
                    </div>
                    <div class="d-flex justify-content-center flex-nowrap">
                        <div class="concept-box m-1"><img src="{{ asset('img/sample_02.jpg') }}"></div>
                        <div class="concept-box m-1"><img src="{{ asset('img/sample_03.jpg') }}"></div>
                        <div class="concept-box m-1"><img src="{{ asset('img/sample_04.jpg') }}"></div>
                        <div class="concept-box m-1"><img src="{{ asset('img/sample_01.jpg') }}"></div>
                        <div class="concept-box m-1"><img src="{{ asset('img/sample_02.jpg') }}"></div>
                    </div>
                </div>
                <div class="concept-box-parent-sm">
                    <div class="d-flex justify-content-center flex-nowrap">
                        <div class="concept-box m-1"><img src="{{ asset('img/sample_01.jpg') }}"></div>
                        <div class="concept-box m-1"><img src="{{ asset('img/sample_02.jpg') }}"></div>
                        <div class="concept-box m-1"><img src="{{ asset('img/sample_03.jpg') }}"></div>
                    </div>
                    <div class="d-flex justify-content-center flex-nowrap">
                        <div class="concept-box m-1"><img src="{{ asset('img/sample_04.jpg') }}"></div>
                        <div class="concept-box m-1"><img src="{{ asset('img/sample_01.jpg') }}"></div>
                        <div class="concept-box m-1"><img src="{{ asset('img/sample_02.jpg') }}"></div>
                    </div>
                </div>
            </section>

            <!-- WORKS -->
            <section id="works" class="text-center">
                <!-- コンテンツタイトル -->
                <img class="work-title" src="{{ asset('img/works.png') }}">
                <!-- ライン -->
                <div class="mb-5" style="position:relative;">
                    <div style="position:absolute; background-color:#a1d4d1; top: 0; left: 50%; transform: translateX(-50%);width:120px; height:2px;"></div>
                </div>
                <!-- コンテンツ -->
                <div class="work-box-parent">
                    <div class="d-flex justify-content-center flex-nowrap">
                        <div class="work-box m-1">
                            <div class="work-image"><img src="{{ asset('img/sample_08.jpg') }}"></div>
                            <div>
                                <p class="work-text1">東区 A.A 様</p>
                                <p class="work-text2">aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</p>
                            </div>
                        </div>
                        <div class="work-box m-1">
                            <div class="work-image"><img src="{{ asset('img/sample_09.jpg') }}"></div>
                            <div>
                                <p class="work-text1">東区 A.A 様</p>
                                <p class="work-text2">aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</p>
                            </div>                    
                        </div>
                        <div class="work-box m-1">
                            <div class="work-image"><img src="{{ asset('img/sample_10.jpg') }}"></div>
                            <div>
                                <p class="work-text1">東区 A.A 様</p>
                                <p class="work-text2">aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</p>
                            </div>                
                        </div>
                    </div>
                    <div class="d-flex justify-content-center flex-nowrap">
                        <div class="work-box m-1">
                            <div class="work-image"><img src="{{ asset('img/sample_11.jpg') }}"></div>
                            <div>
                                <p class="work-text1">東区 A.A 様</p>
                                <p class="work-text2">aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</p>
                            </div>
                        </div>
                        <div class="work-box m-1">
                            <div class="work-image"><img src="{{ asset('img/sample_12.jpg') }}"></div>
                            <div>
                                <p class="work-text1">東区 A.A 様</p>
                                <p class="work-text2">aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</p>
                            </div>
                        </div>
                        <div class="work-box m-1"><div class="work-image"><img src="{{ asset('img/sample_08.jpg') }}"></div>
                            <div>
                                <p class="work-text1">東区 A.A 様</p>
                                <p class="work-text2">aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="work-box-parent-sm">
                    <div class="d-flex justify-content-center flex-nowrap">
                        <div class="work-box m-1">
                            <div class="work-image"><img src="{{ asset('img/sample_08.jpg') }}"></div>
                            <div>
                                <p class="work-text1">東区 A.A 様</p>
                                <p class="work-text2">aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</p>
                            </div>
                        </div>
                        <div class="work-box m-1"><div class="work-image"><img src="{{ asset('img/sample_09.jpg') }}"></div>
                            <div>
                                <p class="work-text1">東区 A.A 様</p>
                                <p class="work-text2">aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</p>
                            </div>                    
                        </div>
                    </div>
                    <div class="d-flex justify-content-center flex-nowrap">
                        <div class="work-box m-1"><div class="work-image"><img src="{{ asset('img/sample_10.jpg') }}"></div>
                            <div>
                                <p class="work-text1">東区 A.A 様</p>
                                <p class="work-text2">aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</p>
                            </div>
                        </div>
                        <div class="work-box m-1"><div class="work-image"><img src="{{ asset('img/sample_11.jpg') }}"></div>
                            <div>
                                <p class="work-text1">東区 A.A 様</p>
                                <p class="work-text2">aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Instagram -->
            <section id="instagram" class="text-center">
                <!-- コンテンツタイトル -->
                <img class="instagram-title" src="{{ asset('img/instagram.png') }}">
                <!-- ライン -->
                <div class="mb-5" style="position:relative;">
                    <div style="position:absolute; background-color:#a1d4d1; top: 0; left: 50%; transform: translateX(-50%);width:120px; height:2px;"></div>
                </div>
                <!-- コンテンツ -->
                <!-- SnapWidget -->
                <div class="instagram-box">
                    <script src="https://snapwidget.com/js/snapwidget.js"></script>
                    <iframe src="https://snapwidget.com/embed/839929" class="snapwidget-widget" allowtransparency="true" frameborder="0" scrolling="no" style="border:none; overflow:hidden;  width:100%; "></iframe>
                </div>
                <!-- SnapWidget -->
                <div class="instagram-box-sm">
                    <script src="https://snapwidget.com/js/snapwidget.js"></script>
                    <iframe src="https://snapwidget.com/embed/851825" class="snapwidget-widget" allowtransparency="true" frameborder="0" scrolling="no" style="border:none; overflow:hidden;  width:100%; ">
                    </iframe>
                </div>
            </section>

            <!-- PRICE -->
            <section id="price" class="price-section text-center text-white">
                <!-- コンテンツタイトル -->
                <img class="price-title" src="{{ asset('img/price.png') }}">
                <!-- ライン -->
                <div class="mb-5" style="position:relative;">
                    <div style="position:absolute; background-color:white; top: 0; left: 50%; transform: translateX(-50%);width:120px; height:2px;">
                </div>
                <!-- コンテンツ -->
                <p class="price-text1">
                    一つ一つの車種に合わせた独自の料金設定
                </p>
                <p class="price-text2">
                    アウラでは、お客様のお車の車種によって車体の面積を計算し、細かく値段設定をしています。<br>
                    お車のタイプではなく、各車種によって値段が異なるため、詳細はお問い合わせください。
                </p>
                <p class="price-text2-sm">
                    アウラでは、お客様のお車の車種によって車体の面積を計算し、<br>
                    細かく値段設定をしています。お車のタイプではなく、<br>
                    各車種によって値段が異なるため、詳細はお問い合わせください。
                </p>
                <div class="price-box d-flex justify-content-center flex-wrap">
                    <img src="{{ asset('img/price_illust/compact.png') }}">
                    <img src="{{ asset('img/price_illust/hatchback.png') }}">
                    <img src="{{ asset('img/price_illust/sedan.png') }}">
                    <img src="{{ asset('img/price_illust/suv.png') }}">
                </div>
                <!-- <div>
                    <button class="price-btn" type="button" onclick="window.open('{{ url('/simulation') }}','_blank')">洗車料金詳細はこちら</button>
                </div> -->
                <a href="{{ url('/simulation') }}"><img class="price-btn" src="{{ asset('img/simulation_button.png') }}"></a>
                <a href="{{ url('/simulation') }}"><img class="price-btn-sm" src="{{ asset('img/simulation_button_sm.png') }}"></a>
            </section>

            <!-- FLOW -->
            <section id="flow" class="text-center">
                <!-- コンテンツタイトル -->
                <img class="flow-title" src="{{ asset('img/flow.png') }}">
                <!-- ライン -->
                <div class="mb-5" style="position:relative;">
                    <div style="position:absolute; background-color:#a1d4d1; top: 0; left: 50%; transform: translateX(-50%);width:120px; height:2px;"></div>
                </div>
                <!-- コンテンツ -->
                <div class="flow-box-parent">
                    <div class="d-flex justify-content-center flex-wrap">
                        <div class="flow-box m-1">
                            <img class="flow" src="{{ asset('img/flow/01.png') }}" style="width:260px; position:absolute; top:-15px; left:10px;">
                            <div class="flow-image"><span class="flow-image-text"><span class="flow-image-top">会員登録</span><br><span class="flow-image-sub">REGISTRATION</span></span></div>
                            <div class="flow-text">オンラインで会員登録後、サイトの<br>流れに沿って洗車予約ページまで進<br>みます。</div>
                        </div>
                        <div class="flow-box m-1">
                            <img class="flow" src="{{ asset('img/flow/02.png') }}" style="width:260px; position:absolute; top:-15px; left:10px;">
                            <div class="flow-image"><span class="flow-image-text"><span class="flow-image-top">洗車予約</span><br><span class="flow-image-sub">reservation</span></span></div>
                            <div class="flow-text">洗車日と車種、駐車場を入力し、ク<br>レジットカードで支払い後、即予約<br>完了。事前にマイカー、駐車場を登<br>録しておくことで素早い予約が可能<br>です。</div>
                        </div>
                        <div class="flow-box m-1">
                            <img class="flow" src="{{ asset('img/flow/03.png') }}" style="width:260px; position:absolute; top:-15px; left:10px;">
                            <div class="flow-image"><span class="flow-image-text"><span class="flow-image-top">洗車</span><br><span class="flow-image-sub">Car wash</span></span></div>
                            <div class="flow-text">洗車時間は車種によりますが、1 時<br>間以内が目安です。雨天時やお客様<br>都合のキャンセルの場合、全額を次<br>回洗車予約に使用可能ポイントとし<br>て還元します。※有効期限無し。</div>
                        </div>
                        <div class="flow-box m-1">
                            <img class="flow" src="{{ asset('img/flow/04.png') }}" style="width:260px; position:absolute; top:-15px; left:10px;">
                            <div class="flow-image"><span class="flow-image-text"><span class="flow-image-top">完了</span><br><span class="flow-image-sub">Finish!</span></span></div>
                            <div class="flow-text">洗車完了時、完了メールをお客様の<br>登録したアドレス宛に送信します。</div>
                        </div>
                    </div>
                </div>
                
                <div class="flow-box-parent-sm">
                    <div class="flow-box-sm d-flex justify-content-center flex-nowrap" style="        margin-top:-50px;">
                        <div class="flow-sm">
                            <img src="{{ asset('img/flow/01-sm.png') }}">
                        </div>
                        <div class="flow-image-sm">
                            <span class="flow-image-text-sm"><span class="flow-image-top-sm">会員登録</span><br><span class="flow-image-sub-sm">REGISTRATION</span></span>
                        </div>
                        <div class="flow-text-parent-sm">
                            <div class="flow-text-sm">
                            オンラインで会員登録後、サイトの<br>
                            流れに沿って洗車予約ページまで進<br>
                            みます。
                        </div>
                        </div>
                    </div>
                    <div class="flow-box-sm d-flex justify-content-center flex-nowrap">
                        <div class="flow-sm"><img src="{{ asset('img/flow/02-sm.png') }}"></div>
                        <div class="flow-image-sm"><span class="flow-image-text-sm"><span class="flow-image-top-sm">洗車予約</span><br><span class="flow-image-sub-sm">RESERVATION</span></span></div>
                        <div class="flow-text-parent-sm">
                            <p class="flow-text-sm">洗車日と車種、駐車場を入力し、ク<br>レジットカードで支払い後、即予約<br>完了。事前にマイカー、駐車場を登<br>録しておくことで素早い予約が可能<br>です。
                            </p>
                        </div>
                    </div>
                    <div class="flow-box-sm d-flex justify-content-center flex-nowrap">
                        <div class="flow-sm"><img src="{{ asset('img/flow/03-sm.png') }}"></div>
                        <div class="flow-image-sm"><span class="flow-image-text-sm"><span class="flow-image-top-sm">洗車</span><br><span class="flow-image-sub-sm">CAR WASH</span></span></div>
                        <div class="flow-text-parent-sm">
                            <p class="flow-text-sm">洗車時間は車種によりますが、1 時<br>間以内が目安です。雨天時やお客様<br>都合のキャンセルの場合、全額を次<br>回洗車予約に使用可能ポイントとし<br>て還元します。※有効期限無し。
                            </p>
                        </div>
                    </div>
                    <div class="flow-box-sm d-flex justify-content-center flex-nowrap">
                        <div class="flow-sm"><img src="{{ asset('img/flow/04-sm.png') }}"></div>
                        <div class="flow-image-sm"><span class="flow-image-text-sm"><span class="flow-image-top-sm">完了</span><br><span class="flow-image-sub-sm">FINISH!</span></span></div>
                        <div class="flow-text-parent-sm">
                            <p class="flow-text-sm">
                                洗車完了時、完了メールをお客様の<br>登録したアドレス宛に送信します。
                            </p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- STAFF -->
            <section id="staff" class="text-center staff-section">
                <!-- <div class="staff-background"></div> -->
                <!-- コンテンツタイトル -->
                <img class="staff-title" src="{{ asset('img/staff.png') }}">
                <!-- ライン -->
                <div style="position:relative;">
                    <div style="position:absolute; background-color:#a1d4d1; top: 0; left: 50%; transform: translateX(-50%); width:120px; height:2px;"></div>
                </div>
                <!-- コンテンツ -->
                <div class="staff-box-parent">
                    <div class="d-flex justify-content-center flex-wrap">
                        <div class="staff-box1 m-1">image 1</div>
                        <div class="staff-box2 m-1 ml-4">
                            <p class="staff-text-name">
                                代表 田島 拓弥
                            </p>
                            <p class="staff-text">
                                我々は、洗車にかかる時間・手間を解消し、お客様にいつもピカピカの車に乗り続けて頂けるよう、出張洗車サービスを立ち上げた。お客様が駐車場で、「今日も車が綺麗で気持ちいいな」と感じて頂ける事がやりがい。今後は、車がピカピカであり続ける気持ちよさを、日本全国のお客様に感じて頂けるよう、サービス範囲を拡大予定。
                            </p>
                        </div>
                    </div>
                </div>

                <div class="staff-box-parent-sm">
                    <div class="d-flex align-items-center flex-wrap flex-column" style="        margin-top:-50px;">
                        <img class="staff-box1-sm" src="{{ asset('img/sample_13.jpg') }}">
                        <div class="staff-box2-sm">
                            <p class="staff-text-name-sm">
                                代表 田島 拓弥
                            </p>
                            <p class="staff-text-sm">
                                我々は、洗車にかかる時間・手間を解消し、お客様にいつもピカピカの車に乗り続けて頂けるよう、出張洗車サービスを立ち上げた。お客様が駐車場で、「今日も車が綺麗で気持ちいいな」と感じて頂ける事がやりがい。今後は、車がピカピカであり続ける気持ちよさを、日本全国のお客様に感じて頂けるよう、サービス範囲を拡大予定。
                            </p>
                        </div>
                    </div>
                </div>
            </section>

            <section class="text-center">
                <a href="{{ url('/reserve') }}">
                    <img class="reserve-btn" src="{{ asset('img/reservation_button.png') }}">
                </a>
                <a href="{{ url('/reserve') }}">
                    <img class="reserve-btn-sm" src="{{ asset('img/reservation_button_sm.png') }}">
                </a>
            </section>
        </main>
        <footer>
            <div class="d-flex justify-content-around align-items-center" style="height:100%;">
                <div class="footer-icon">
                    <a href="https://www.instagram.com/aula_waterlesscarwash/" target="_blank"><i class="fab fa-instagram fa-lg"></i></a>
                    <a href=""><i class="fab fa-twitter fa-lg"></i></a>
                    <a href=""><i class="fab fa-facebook-f fa-lg"></i></a>
                </div>
                <div class="footer-logo">
                    <a href="{{ url('/') }}" class="my-auto">
                        <img class="logo-white" style="color:#fff" src="{{ asset('img/logo_white.png') }}" >
                    </a>
                </div>
                <div class="footer-contact">
                    <img class="contact-btn" src="{{ asset('img/contact_button.png') }}">
                    <!-- <div class="content">
                        <a class="js-modal-open" href="">クリックでモーダルを表示</a>
                    </div> -->
                    <div class="modal js-modal">
                        <div class="modal__bg js-modal-close"></div>
                        <div class="modal__content">
                            <p>ここにモーダルウィンドウで表示したいコンテンツを入れます。モーダルウィンドウを閉じる場合は下の「閉じる」をクリックするか、背景の黒い部分をクリックしても閉じることができます。</p>
                            <a class="js-modal-close" href="">閉じる</a>
                        </div><!--modal__inner-->
                    </div><!--modal-->
                </div>
            </div>
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
