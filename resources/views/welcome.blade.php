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
        <link rel="stylesheet" href="https://use.typekit.net/xfr2yel.css">

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
            <div>
                <img class="header-img" src="{{ asset('img/firstview.png') }}">
                <img class="header-img-sm" src="{{ asset('img/firstview_sm.png') }}">
            </div>
            <div class="header-text">
                <img class="header-text-img" src="{{ asset('img/firstview_title.png') }}">
                <img class="header-text-img-logo-sm" src="{{ asset('img/logo.png') }}" >
                <img class="header-text-img-sm" src="{{ asset('img/firstview_title_sm.png') }}">
            </div>
            <div>
                <a href="{{ url('/') }}">
                    <img class="logo" src="{{ asset('img/logo.png') }}" >
                </a>
            <div>
            <div>
                <a href="{{ url('/login') }}"><img class="login-btn" src="{{ asset('img/login.png') }}"></a>
                <a href="{{ url('/login') }}"><img class="login-btn-sm" src="{{ asset('img/login_sm.png') }}"></a>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 100 100" preserveAspectRatio="none" id="svg-bg" class="effect-fade-header" style="">        
                <path class="svg-draw" d="M0,0 v80 q10,10 20,0 t20,0 t20,0 t20,0 t20,0 v-80 Z" fill="#fff"></path>
                <path class="svg-draw-sm" d="M0,0 v90 q10,10 30,0 t40,0 t40,0 v-90 Z" fill="#fff"></path>
                <!-- <path d="M0,0 v80 q10,10 20,0 t20,0 t20,0 t20,0 t20,0 v-80 Z" fill="#fff"></path> -->
            </svg>
            <div id="nav-drawer">
                <input id="nav-input" type="checkbox" class="nav-unshown">
                <label id="nav-open" for="nav-input"><span></span><span></span><span></span><div>MENU</div></label>
                <label class="nav-unshown" id="nav-close" for="nav-input"></label>
                <div id="nav-content" class="text-white text-center py-2 pb-4">
                    <!-- <div class="nav-close-bar"></div> -->
                    <label class="nav-close-bar" for="nav-input"></label>
                    <div class="nav-title"><p>MENU</p></div>
                    <div>

                    <ul style="list-style: none; padding:0;">
                        <li>
                            <a href="#concept" class="nav-li">CONCEPT</a>
                            <p class="nav-li-sub">コンセプト</p>
                        </li>
                        <li>
                            <a href="#works" class="nav-li">WORKS</a>
                            <p class="nav-li-sub">施工実績</p>
                        </li>
                        <li>
                            <a href="#price" class="nav-li">PRICE</a>
                            <p class="nav-li-sub">料金について</p>
                        </li>
                        <li>
                            <a href="#flow" class="nav-li">FLOW</a>
                            <p class="nav-li-sub">洗車までの流れ</p>
                        </li>
                        <li>
                            <a href="#staff" class="nav-li">STAFF</a>
                            <p class="nav-li-sub">スタッフ紹介</p>
                        </li>
                    </ul>
                    </div>
                    <div class="pt-3 pb-4">
                        <a href="https://www.instagram.com/aula_waterlesscarwash/" target="_blank"><i class="fab fa-instagram p-1 fa-lg pr-5" style="color:#fff;"></i></a>
                        <a href=""><i class="fab fa-twitter p-1 fa-lg pr-5" style="color:#fff;"></i></a>
                        <a href=""><i class="fab fa-facebook-f p-1 fa-lg" style="color:#fff;"></i></a>
                    </div>
                    <div>
                        <a href="{{ url('/reserve') }}"><img class="nav-reserve-btn" src="{{ asset('img/nav_reserve.png') }}"></a>
                        <a href="{{ url('/reserve') }}"><img class="nav-reserve-btn-sm" src="{{ asset('img/nav_reserve_sm.png') }}"></a>
                    </div>
                </div>
            </div>
            <!-- <div class="menu-bar" style="position:fixed; height:50px; width:100%; background-color:#a1d4d1; z-index:9998;">
                <div>
                    <a href="{{ url('/') }}">
                        <img class="" src="{{ asset('img/logo.png') }}" style="position:absolute; width:130px; top:12px; left:10px;">
                    </a>
                <div>
                <a href="{{ url('/login') }}"><img class="" src="{{ asset('img/login.png') }}" style="width:150px;"></a>
                <a href="{{ url('/login') }}"><img class="" src="{{ asset('img/login_sm.png') }}" style="position:absolute; width:130px; top:12px; right:60px;"></a>
                <div class="menu-nav" style="position:absolute; top:0px; right:0px;">
                    <input id="nav-input" type="checkbox" class="nav-unshown">
                    <label id="nav-open" for="nav-input"><span></span><span></span><span></span></label>
                    <label class="nav-unshown" id="nav-close" for="nav-input"></label>
                </div>
            </div> -->
        </header>

        <main>
            <!-- CONCEPT -->
            <section id="concept" class="text-center effect-fade">
                <!-- コンテンツタイトル -->
                <img class="concept-title" src="{{ asset('img/concept.png') }}">
                <!-- ライン -->
                <div style="position:relative;">
                    <div style="position:absolute; background-color:#a1d4d1; top: 0; left: 50%; transform: translateX(-50%);width:120px; height:2px;"></div>
                </div>
                <!-- コンテンツ -->
                <p class="concept-text1">
                    お客様の時間と手間を一挙に解消する<br>愛知県限定の出張洗車サービス
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
                「今日も車が綺麗で気持ちいいな」と感じて<br>頂ける事がやりがいです。<br>
                今後は、車がピカピカであり続ける気持ちよさを、<br>
                日本全国のお客様に感じて頂けるよう<br>サービス範囲を拡大予定。
                </p>
                <div class="concept-box-parent">
                    <div class="d-flex justify-content-center flex-nowrap">
                        <div class="concept-box"><img src="{{ asset('img/concept_1.JPG') }}"></div>
                        <div class="concept-box"><img src="{{ asset('img/concept_2.JPG') }}"></div>
                        <div class="concept-box"><img src="{{ asset('img/concept_3.JPG') }}"></div>
                        <div class="concept-box"><img src="{{ asset('img/concept_4.JPG') }}"></div>
                        <div class="concept-box"><img src="{{ asset('img/concept_5.JPG') }}"></div>
                    </div>
                    <div class="d-flex justify-content-center flex-nowrap">
                        <div class="concept-box"><img src="{{ asset('img/concept_6.JPG') }}"></div>
                        <div class="concept-box"><img src="{{ asset('img/concept_7.JPG') }}"></div>
                        <div class="concept-box"><img src="{{ asset('img/concept_8.JPG') }}"></div>
                        <div class="concept-box"><img src="{{ asset('img/concept_9.JPG') }}"></div>
                        <div class="concept-box"><img src="{{ asset('img/concept_10.JPG') }}"></div>
                    </div>
                </div>
                <div class="concept-box-parent-sm">
                    <div class="d-flex justify-content-center flex-nowrap">
                        <div class="concept-box"><img src="{{ asset('img/concept_8.JPG') }}"></div>
                        <div class="concept-box"><img src="{{ asset('img/concept_2.JPG') }}"></div>
                        <div class="concept-box"><img src="{{ asset('img/concept_11.JPG') }}"></div>
                    </div>
                    <div class="d-flex justify-content-center flex-nowrap">
                        <div class="concept-box"><img src="{{ asset('img/concept_3.JPG') }}"></div>
                        <div class="concept-box"><img src="{{ asset('img/concept_7.JPG') }}"></div>
                        <div class="concept-box"><img src="{{ asset('img/concept_12.JPG') }}"></div>
                    </div>
                </div>
            </section>

            <!-- WORKS -->
            <section id="works" class="text-center effect-fade">
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
                            <div class="work-image"><img src="{{ asset('img/work_1.jpg') }}"></div>
                            <div>
                                <p class="work-text1">東区 H.K様</p>
                                <p class="work-text2">これまで洗車機を使っていましたが、もっと時短できないかな・・・と調べていた時、このサービスを発見。正直スマホ予約だけで大丈夫?と不安でしたが、車が勝手にピカピカになっており、仕事に使える時間が増え大満足です!!</p>
                            </div>
                        </div>
                        <div class="work-box m-1">
                            <div class="work-image"><img src="{{ asset('img/work_2.jpg') }}"></div>
                            <div>
                                <p class="work-text1">緑区 A.S様</p>
                                <p class="work-text2">洗車機に入れても、すぐに汚れてしまう事に悩んでいた所、この出張洗車を知りました。勝手にやってくれるならまあいいかと思い予約。洗車後はボディがツヤツヤで、汚れもつきにくくなり、車に乗ること自体が楽しく感じるようになりました。</p>
                            </div>                    
                        </div>
                        <div class="work-box m-1">
                            <div class="work-image"><img src="{{ asset('img/sample_10.jpg') }}"></div>
                            <div>
                                <p class="work-text1">春日井市 D.M様</p>
                                <p class="work-text2">仕事と旅行が多く、車がどんどん汚くなっていましたが、洗車がめんどくさくて放置・・・。そんな時このサービスを知り、すぐに予約。友人から車綺麗になったよねと言われるようになり、車で人に会いに行く度、やってよかったと実感します。</p>
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
                        <div class="work-box-sm m-1">
                            <div class="work-box-inner">
                                <div class="work-image-sm">
                                    <img src="{{ asset('img/work_1.jpg') }}">
                                </div>
                                <div class="work-text">
                                    <p class="work-text1-sm">
                                        東区 A.A 様
                                    </p>
                                    <p class="work-text2-sm">
                                    毎回洗車場に持ってくことが面倒で、今回初めて出張洗車を依頼してみました。正直スマホ予約のみで、本当に来てくれるのか??という不安もありましたが、心配は無用でした。簡単に車がピカピカになり、大満足です!!
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="work-box-sm m-1">
                            <div class="work-box-inner">
                                <div class="work-image-sm">
                                    <img src="{{ asset('img/work_2.jpg') }}">
                                </div>
                                <div class="work-text">
                                    <p class="work-text1-sm">
                                        東区 A.A 様
                                    </p>
                                    <p class="work-text2-sm">
                                    これまで洗車機を使っていましたが、もっと時短できないかな・・・と調べていた時、このサービスを発見。正直スマホ予約だけで大丈夫?と不安でしたが、車が勝手にピカピカになっており、仕事に使える時間が増え大満足です!!
                                    </p>
                                </div>
                            </div>           
                        </div>
                    </div>
                    <div class="d-flex justify-content-center flex-nowrap">
                        <div class="work-box-sm m-1">
                            <div class="work-box-inner">
                                <div class="work-image-sm">
                                    <img src="{{ asset('img/sample_10.jpg') }}">
                                </div>
                                <div class="work-text">
                                    <p class="work-text1-sm">
                                        東区 A.A 様
                                    </p>
                                    <p class="work-text2-sm">
                                        aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="work-box-sm m-1">
                            <div class="work-box-inner">
                                <div class="work-image-sm">
                                    <img src="{{ asset('img/sample_11.jpg') }}">
                                </div>
                                <div class="work-text">
                                    <p class="work-text1-sm">
                                        東区 A.A 様
                                    </p>
                                    <p class="work-text2-sm">
                                        aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Instagram -->
            <section id="instagram" class="text-center effect-fade">
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
            <section id="price" class="price-section text-center text-white effect-fade">
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
                    アウラでは、お客様のお車の車種によって値段設定をしています。<br>
                    (下記の表示価格は参考値となります。)
                </p>
                <p class="price-text2-sm">
                    アウラでは、お客様のお車の車種によって<br>値段設定をしています。<br>
                    (下記の表示価格は参考値となります。)
                </p>
                <div class="price-box-parent d-flex justify-content-center flex-wrap">
                    <div class="price-box">
                        <img src="{{ asset('img/price_illust/compact.png') }}">
                        <div class="price-box-text">
                            <span class="price-box-text1">1回/</span><span class="price-box-text2">¥3,000</span><span class="price-box-text1"></span>
                        </div>
                    </div>
                    <div class="price-box">
                        <img src="{{ asset('img/price_illust/sedan.png') }}">
                        <div class="price-box-text">
                            <span class="price-box-text1">1回/</span><span class="price-box-text2">¥4,000</span><span class="price-box-text1"></span> 
                        </div>
                    </div>
                    <div class="price-box">
                        <img src="{{ asset('img/price_illust/hatchback.png') }}">
                        <div class="price-box-text">
                            <span class="price-box-text1">1回/</span><span class="price-box-text2">¥5,000</span><span class="price-box-text1"></span>
                        </div>
                    </div>
                    <div class="price-box">
                        <img src="{{ asset('img/price_illust/suv.png') }}">
                        <div class="price-box-text">
                            <span class="price-box-text1">1回/</span><span class="price-box-text2">¥6,000</span><span class="price-box-text1"></span>
                        </div>
                    </div>
                </div>
                <!-- <div>
                    <button class="price-btn" type="button" onclick="window.open('{{ url('/simulation') }}','_blank')">洗車料金詳細はこちら</button>
                </div> -->
                <a href="{{ url('/simulation') }}"><img class="price-btn" src="{{ asset('img/simulation_button.png') }}"></a>
                <a href="{{ url('/simulation') }}"><img class="price-btn-sm" src="{{ asset('img/simulation_button_sm.png') }}"></a>
            </section>

            <!-- FLOW -->
            <section id="flow" class="text-center effect-fade">
                <!-- コンテンツタイトル -->
                <img class="flow-title" src="{{ asset('img/flow.png') }}">
                <!-- ライン -->
                <div class="mb-5" style="position:relative;">
                    <div style="position:absolute; background-color:#a1d4d1; top: 0; left: 50%; transform: translateX(-50%);width:120px; height:2px;"></div>
                </div>
                <!-- コンテンツ -->
                <div class="flow-box-parent">
                    <div class="d-flex justify-content-center flex-wrap">
                        <div class="flow-box">
                            <img class="flow" src="{{ asset('img/flow/01.png') }}">
                            <div class="flow-image"><span class="flow-image-text"><span class="flow-image-top">会員登録</span><br><span class="flow-image-sub">REGISTRATION</span></span></div>
                            <div class="flow-text">オンラインで会員登録後、サイトの<br>流れに沿って洗車予約ページまで進<br>みます。</div>
                        </div>
                        <div class="flow-box">
                            <div class="flow-allow"></div>
                            <img class="flow" src="{{ asset('img/flow/02.png') }}">
                            <div class="flow-image"><span class="flow-image-text"><span class="flow-image-top">洗車予約</span><br><span class="flow-image-sub">reservation</span></span></div>
                            <div class="flow-text">洗車日と車種、駐車場を入力し、ク<br>レジットカードで支払い後、即予約<br>完了。事前にマイカー、駐車場を登<br>録しておくことで素早い予約が可能<br>です。</div>
                        </div>
                        <div class="flow-box">
                            <div class="flow-allow"></div>
                            <img class="flow" src="{{ asset('img/flow/03.png') }}">
                            <div class="flow-image"><span class="flow-image-text"><span class="flow-image-top">洗車</span><br><span class="flow-image-sub">Car wash</span></span></div>
                            <div class="flow-text">洗車時間は車種によりますが、1 時<br>間以内が目安です。雨天時やお客様<br>都合のキャンセルの場合、全額を次<br>回洗車予約に使用可能ポイントとし<br>て還元します。※有効期限無し。</div>
                        </div>
                        <div class="flow-box">
                            <div class="flow-allow"></div>
                            <img class="flow" src="{{ asset('img/flow/04.png') }}">
                            <div class="flow-image"><span class="flow-image-text"><span class="flow-image-top">完了</span><br><span class="flow-image-sub">Finish!</span></span></div>
                            <div class="flow-text">洗車完了時、完了メールをお客様の<br>登録したアドレス宛に送信します。</div>
                        </div>
                    </div>
                </div>
                
                <div class="flow-box-parent-sm">
                    <div class="flow-box-sm d-flex justify-content-center flex-nowrap" style="margin-top:-50px;">
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
            <section id="staff" class="text-center staff-section effect-fade" style="z-index:-1;">
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
                        <div class="staff-background"></div>
                        <img class="staff-box1" src="{{ asset('img/staff.jpg') }}">
                        <div class="staff-box2">
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
                    <div class="d-flex align-items-center flex-wrap flex-column" style="margin-top:-50px;">
                        <img class="staff-box1-sm" src="{{ asset('img/staff.jpg') }}">
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

            <section id="reserve" class="text-center effect-fade">
                <a href="{{ url('/reserve') }}">
                    <img class="reserve-btn" src="{{ asset('img/reservation_button.png') }}">
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
                    <a href="mailto:contact@aula.blue"><img class="contact-btn" src="{{ asset('img/contact_button.png') }}"></a>
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

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

        <script>
            $(function() {
                $('#nav-content li a').on('click', function(event) {
                    $('#nav-input').prop('checked', false);
                });
            });
            window.onload = function(){
                $('#svg-bg').addClass('effect-scroll-header');
            }
            $(window).scroll(function(){
                var top_concept = $("#concept").offset().top; // ターゲットの位置取得
                var position_concept = top_concept - $(window).height();  // 発火させたい位置
                if($(window).scrollTop() > position_concept + 300){
                    // 要素が見えたときの動き 
                    $('#concept').addClass('effect-scroll');
                }
                var top_work = $("#works").offset().top; // ターゲットの位置取得
                var position_work = top_work - $(window).height();  // 発火させたい位置
                if($(window).scrollTop() > position_work + 300){
                    // 要素が見えたときの動き 
                    $('#works').addClass('effect-scroll');
                }
                var top_instagram = $("#instagram").offset().top; // ターゲットの位置取得
                var position_instagram = top_instagram - $(window).height();  // 発火させたい位置
                if($(window).scrollTop() > position_instagram + 300){
                    // 要素が見えたときの動き 
                    $('#instagram').addClass('effect-scroll');
                }
                var top_price = $("#price").offset().top; // ターゲットの位置取得
                var position_price = top_price - $(window).height();  // 発火させたい位置
                if($(window).scrollTop() > position_price + 300){
                    // 要素が見えたときの動き 
                    $('#price').addClass('effect-scroll');
                }
                var top_flow = $("#flow").offset().top; // ターゲットの位置取得
                var position_flow = top_flow - $(window).height();  // 発火させたい位置
                if($(window).scrollTop() > position_flow + 300){
                    // 要素が見えたときの動き 
                    $('#flow').addClass('effect-scroll');
                }
                var top_staff = $("#staff").offset().top; // ターゲットの位置取得
                var position_staff = top_staff - $(window).height();  // 発火させたい位置
                if($(window).scrollTop() > position_staff + 300){
                    // 要素が見えたときの動き 
                    $('#staff').addClass('effect-scroll');
                }
                var top_reserve = $("#reserve").offset().top; // ターゲットの位置取得
                var position_reserve = top_reserve - $(window).height();  // 発火させたい位置
                if($(window).scrollTop() > position_reserve -200){
                    // 要素が見えたときの動き 
                    $('#reserve').addClass('effect-scroll');
                }
            })
        </script>
    </body>
</html>
