<!DOCTYPE html>
<html lang="ja">
    <head>
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-176714024-1"></script>
        <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-176714024-1');
        </script>
    
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
                <p class="header-text-sub">
                “アウラ”は、たった3分だけで、<br>
                車を綺麗に乗り続けることができる、<br>
                革新的な洗車サービスです。
                </p>
                <img class="header-text-img-logo-sm" src="{{ asset('img/logo.png') }}" >
                <img class="header-text-img-sm" src="{{ asset('img/firstview_title_sm.png') }}">
                <p class="header-text-sub-sm">
                “アウラ”は、たった3分だけで、<br>
                車を綺麗に乗り続けることができる、<br>
                革新的な洗車サービスです。
                </p>
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
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 100 100" preserveAspectRatio="none" id="svg-bg" class="effect-fade-header">        
                <path class="svg-draw" d="M0,0 v80 q10,10 20,0 t20,0 t20,0 t20,0 t20,0 v-80 Z" fill="#fff"></path>
                <path class="svg-draw-sm" d="M0,0 v90 q10,10 30,0 t40,0 t40,0 v-90 Z" fill="#fff"></path>
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
                    時間と手間をかけずに、車をピカピカにする
                </p>
                <p class="concept-text2">
                洗車というと、ガソリンスタンドや、洗車場での洗車を思い浮かべる方が多いのでは無いでしょうか。<br>
                洗車サービスは数多く存在しますが、予約をする、洗車をする、洗車完了を待つ等・・・<br>
                「めんどくさい」と感じる瞬間はありませんか?<br><br>

                アウラは、洗車による時間と手間のロスを、カンタンWeb予約＋出張洗車で解消いたします。
                </p>
                <p class="concept-text2-sm">
                洗車というと、ガソリンスタンドや、<br>
                洗車場での洗車を思い浮かべる方が多いのでは無いでしょうか。<br><br>
                洗車サービスは数多く存在しますが、予約をする、<br>
                洗車をする、洗車完了を待つ等・・・<br>
                「めんどくさい」と感じる瞬間はありませんか?<br><br>

                アウラは、洗車による時間と手間のロスを、<br>
                カンタンWeb予約＋出張洗車で解消いたします。
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


            <!-- WORKS -->
            <section id="works" class="text-center effect-fade">
                <!-- コンテンツタイトル -->
                <img class="work-title" src="{{ asset('img/works.png') }}">
                <!-- ライン -->
                <div class="mb-5" style="position:relative;">
                    <div style="position:absolute; background-color:#a1d4d1; top: 0; left: 50%; transform: translateX(-50%);width:120px; height:2px;"></div>
                </div>
                <!-- コンテンツ -->
                <style>
                    .w9{
                        margin: -20px 0 70px 0;
                        font-family: 'Noto Sans JP', sans-serif;
                        font-size: 24px;
                        font-weight: 300;
                        letter-spacing: 0.5px;
                        line-height: 36px;
                    }
                    .w2{
                        /* background-color: #F2F2F2; */
                        margin: 10px 10px 60px 10px;
                        display: flex;
                        flex-direction: row;
                        justify-content: center;
                    }
                    /* .w2:nth-child(even){
                        flex-direction: row-reverse;
                    } */
                    .w3{
                        width: 700px;
                    }
                    .w5{
                        width: 700px;
                        text-align: left;
                        margin-left: 30px;
                    }
                    .w6{
                        font-family: 'Noto Sans JP', sans-serif;
                        font-size: 20px;
                        font-weight: 400;
                        letter-spacing: 1px;
                        border-bottom: solid #666666 0.5px;
                    }
                    .w7{
                        color:#00718C;
                        font-family: 'Noto Sans JP', sans-serif;
                        font-size: 18px;
                        font-weight: 400;
                        margin: 13px 0 0 0;
                    }
                    .w8{
                        font-family: 'Noto Sans JP', sans-serif;
                        font-size: 16px;
                        font-weight: 300;
                        margin: 10px 0 0 0px;
                        letter-spacing: 0.9px;
                        line-height: 25px;
                    }
                    @media (max-width:991px) {
                        .w9{
                            font-size: 14px;
                            line-height: 20px;
                            margin: -20px 0 40px 0;
                        }
                        .w2{
                            flex-direction: column;
                            align-items: center;
                        }
                        .w3, .w5{
                            max-width: 350px;
                        }
                        .w5{
                            margin-top: 10px;
                        }
                        .w5, .w7, .w8{
                            margin-left: 0;
                        }
                        .w6{
                            font-size: 16px;
                            font-weight: 400;
                        }
                        .w7{
                            font-size: 14px;
                            font-weight: 400;
                        }
                        .w8{
                            font-size: 12px;
                            font-weight: 400;
                        }
                    }
                </style>
                <div class="w1">
                    <div class="w9">
                            <p>    
                            「車をピカピカにする」というコンセプトに則って、<br>
                            下記の内容の施工を実施いたします。
                            </p>
                    </div>
                    <div class="w2">
                        <div class="w3">
                            <img class="w4" src="{{ asset('img/work-1.jpg') }}" style="width: 100%;">
                        </div>
                        <div class="w5">
                            <div class="w6">外装洗車＆コーティング</div>
                            <div class="w7">ドアノブを掴む度、頬が緩んでしまうかもしれません。</div>
                            <div class="w8">アウラが使用している洗車溶剤は、非イオン界面活性剤とポリマー剤が含まれています。この溶剤をボディに吹き付ける事で、ボディから汚れを分離し、水をたっぷり含んだマイクロファイバータオルで優しく拭き、汚れを取り除きます。もう一度ボディを丁寧に拭き上げる事で、ポリマーコーティングが施されます。撥水性を持った、スベスベで光沢あるボディをご堪能ください。</div>
                        </div>
                    </div>
                    <div class="w2">
                        <div class="w3">
                            <img class="w4" src="{{ asset('img/work-2.jpg') }}" style="width: 100%;">
                        </div>
                        <div class="w5">
                            <div class="w6">水垢除去</div>
                            <div class="w7">しつこい黒いヤツと天ぷらの関係</div>
                            <div class="w8">洗車機に入れてもなかなか落ちない黒い水垢、これ実は「油性の水垢」です。水垢には水性と油性の2種類がありますが、油性の水垢はなかなか取れないことが多く厄介です。なぜ取れにくいのか、それは大気中の油分・水滴に含まれるばい煙・ミネラルといった成分が染み付いているからです。使う度「汚れを含んだ油分」がついてしまうという点は、意外にも車とキッチンコンロは似ています。ただし、コンロは油はねカバーで汚れ対策ができますが・・・。油はねカバーをお車に装着する以外の対策をご検討のお客様には、ボディを傷つけない水垢専用の溶剤を使用し、愛車から「黒いヤツだけ」を取り除く、アウラの出張洗車がおすすめです。</div>
                        </div>
                    </div>
                    <div class="w2">
                        <div class="w3">
                            <img class="w4" src="{{ asset('img/work-3.jpg') }}" style="width: 100%;">
                        </div>
                        <div class="w5">
                            <div class="w6">ホイール洗浄&コーティング&タイヤワックス</div>
                            <div class="w7">おしゃれは足元から</div>
                            <div class="w8">茶色っぽい汚れがいつも付いているホイールとタイヤ・・・悪いのはあなたではありません。ホイールの汚れは、ブレーキを踏む度に少しずつ飛散するブレーキダストが原因です。タイヤの汚れは、タイヤに含まれる保護剤が原因で表面が茶色くなる事もあります。つまり原因を断つことは出来ないということです。それでも「綺麗な車に乗りたい!」とおっしゃるのであれば、お任せください。ホイールにはボディと同様の洗浄&コーティングを。タイヤには黒々とした艶と、撥水性を与えるシリコンコーティングを施し、足元を美しくメイクアップいたします。</div>
                        </div>
                    </div>
                    <div class="w2">
                        <div class="w3">
                            <img class="w4" src="{{ asset('img/work-4.jpg') }}" style="width: 100%;">
                        </div>
                        <div class="w5">
                            <div class="w6">虫&鳥の老廃物&ピッチタール除去</div>
                            <div class="w7">ボディにへばりついた虫、鳥の老廃物・・・<br>放置していませんか?</div>
                            <div class="w8">虫は、酸性、鳥の老廃物はアルカリ性の汚れである為、いずれも放置すると、ボディを溶かしてしまいます。もし虫や、鳥の老廃物がボディに付着してしまった場合は、早く取り除くことを強くお勧めします。もし面倒であれば、アウラにお任せください。ボディを削る成分の無い溶剤で、汚れを除去します。</div>
                        </div>
                    </div>
                    <div class="w2">
                        <div class="w3">
                            <img class="w4" src="{{ asset('img/work-5.jpg') }}" style="width: 100%;">
                        </div>
                        <div class="w5">
                            <div class="w6">フロント・リアガラスの超撥水コーティング</div>
                            <div class="w7">雨天時1時間あたりの事故率は、晴天時の4.9倍という事実をご存知でしょうか?</div>
                            <div class="w8">愛知県では年間114日間(2016年)も雨が降り、更に深夜雨天走行時の1時間当たりの事故率は晴天時の約7倍に・・・。アウラでは雨粒による視界不良対策として、前後ガラスに超撥水コーティングを施し、視認性向上及び、雨天時の安全性向上に貢献します。</div>
                        </div>
                    </div>
                    <div class="w2">
                        <div class="w3">
                            <img class="w4" src="{{ asset('img/work-6.jpg') }}" style="width: 100%;">
                        </div>
                        <div class="w5">
                            <div class="w6">バンパー部の未塗装樹脂コーティング</div>
                            <div class="w7">愛車がSUVの皆さん!朗報です。<br>あの白いくすみが嘘のように・・・</div>
                            <div class="w8">最近バンパーやフェンダー周辺の黒い未塗装樹脂が白く、くすんできていませんか??愛車を綺麗にしていても、避けることができない「直射日光」や「温度変化」により、黒々と輝いていたバンパー達は徐々に白くなってしまいます・・・。アウラでは、白くなってしまった樹脂に、新車のような黒さと艶を与えるコーティングを実施し、諦めていた樹脂のくすみを解消いたします。</div>
                        </div>
                    </div>
                </div>

                <div style="margin:50px 0; font-size:16px;">
                    <p>よくある質問は<a href="{{ url('/qa') }}" target="blank_">こちら。</a></p>
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
                        <div>
                            <span class="price-box-text3">Small Size</span>
                        </div>
                        <img src="{{ asset('img/price_illust/s_size.png') }}">
                        <div class="price-box-text">
                            <span class="price-box-text1">1回/</span><span class="price-box-text2">¥8,000</span><span class="price-box-text1"></span>
                        </div>
                    </div>
                    <div class="price-box">
                        <div>
                            <span class="price-box-text3">Medium Size</span>
                        </div>
                        <img src="{{ asset('img/price_illust/m_size.png') }}">
                        <div class="price-box-text">
                            <span class="price-box-text1">1回/</span><span class="price-box-text2">¥10,000</span><span class="price-box-text1"></span> 
                        </div>
                    </div>
                    <div class="price-box">
                        <div>
                            <span class="price-box-text3">Large Size</span>
                        </div>
                        <img src="{{ asset('img/price_illust/l_size.png') }}">
                        <div class="price-box-text">
                            <span class="price-box-text1">1回/</span><span class="price-box-text2">¥12,000</span><span class="price-box-text1"></span>
                        </div>
                    </div>
                </div>
                <a href="{{ url('/simulation') }}"><img class="price-btn" src="{{ asset('img/simulation_button.png') }}"></a>
                <a href="{{ url('/simulation') }}"><img class="price-btn-sm" src="{{ asset('img/simulation_button_sm.png') }}"></a>
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
