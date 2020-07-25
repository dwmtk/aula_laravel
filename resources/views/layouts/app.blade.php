<!doctype html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>aula</title>

    <script src="https://yubinbango.github.io/yubinbango/yubinbango.js" charset="UTF-8"></script>

     <!-- Scripts-->
     <script src="https://kit.fontawesome.com/5e480eacce.js" crossorigin="anonymous"></script>
     <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

     <!-- 確認ダイアログ -->
     <script>
        function dialog(message){
            // 「OK」時の処理開始 ＋ 確認ダイアログの表示
            if(window.confirm(message)){
                return true;
            }
            else{ // 「キャンセル」時の処理
                return false; // 送信を中止
            }
        }
    </script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        ::-webkit-input-placeholder { /* WebKit, Blink, Edge */
            color:red;
        }
        :-ms-input-placeholder { /* Internet Explorer 10-11 */
            color:red;
        }
        ::placeholder{ /* Others */
            color:red;
        }

        /* nav {
        border-top: solid 10px #428bca;
        } */
        .navbar-toggler .navbar-toggler-icon {
        background-image: url("data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 32 32' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='rgba(255,255,255,1)' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 8h24M4 16h24M4 24h24'/%3E%3C/svg%3E");
        }
        /* .footer_bar {
        border-bottom: solid 10px #428bca;
        } */

        .badge_notify{
            position:relative;
        }
        .badge-notify_{

            position:relative;
            top: -1px;
            left: -7px;
        }
        /* googleカレンダー */
        .cal_wrapper {
        max-width: 500px;
        min-width: 300px;
        margin: 2.0833% auto;
        }

        .googlecal {
        position: relative;
        padding-bottom: 100%;
        height: 0;
        }

        .googlecal iframe {
        position: absolute;
        top: 0;
        left: 0;
        width: 100% !important;
        height: 100% !important;
        }

        @media only screen and (min-width: 768px) {
        .googlecal { padding-bottom: 75%; }
        }
        /* googleカレンダー終わり */

        /* ナビバー */
        .sp-navbar {
            display:none;
        }
        @media only screen and (max-width: 800px) {
            .pc-navbar {
                display:none;
            }
            .sp-navbar {
                display:inline;
            }
        }
        .logo{
            width:100px;
        }
    </style>

</head>
<body>
    <!-- <div id="app"> -->
    <div>
        <nav class="navbar navbar-expand-md navbar-light bg-dark shadow-sm sticky-top">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img class="logo" src="{{ asset('img/logo_ white.png') }}" alt="">
                </a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">


                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link text-white" href="{{ route('login') }}">ログイン</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="{{ route('register') }}">新規登録</a>
                                </li>
                            @endif
                        @else
                            <!--
                            @if(Auth::user()->user_type == "1" || Auth::user()->user_type == "2")
                            <a class="navbar-brand text-white pr-2" href="{{ url('/manage') }}">
                                <font size="4">管理者ページ</font>
                            </a>   
                            @else
                            <a class="navbar-brand text-white pr-2" href="{{ url('/home') }}">
                                <font size="4">マイページ</font>
                            </a>
                            @endif -->

                            <div class="pc-navbar">
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}  様 <span class="caret"></span>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right bg-dark" aria-labelledby="navbarDropdown">
                                        @if(Auth::user()->user_type == "1" || Auth::user()->user_type == "2")
                                        <a class="dropdown-item text-white" href="{{ url('/manage') }}"><i class="fas fa-users pr-2 fa-xs"></i>
                                            管理者ページ
                                        </a>   
                                        @endif
                                        <a class="dropdown-item text-white" href="{{ url('/home') }}"><i class="fas fa-user pr-2 fa-xs"></i>
                                            マイページ
                                        </a>
                                        <a class="dropdown-item text-white" href="{{ url('reserve') }}"><i class="fas fa-car pr-2 fa-xs"></i> 
                                        洗車予約
                                        </a>
                                        <a class="dropdown-item text-white" href="{{ url('reservelog') }}"><i class="fas fa-history pr-2 fa-xs"></i>
                                            洗車履歴
                                        </a>
                                        <a class="dropdown-item text-white" href="{{ url('personalinfo') }}"><i class="fas fa-user-cog pr-2 fa-xs"></i>
                                            個人情報
                                        </a>
                                        <a class="dropdown-item text-white" href="{{ url('mycarinfo') }}"><i class="fas fa-key pr-2 fa-xs"></i>
                                            マイカー情報
                                        </a>
                                        <a class="dropdown-item text-white" href="{{ url('parkinginfo') }}"><i class="fas fa-parking pr-2 fa-xs"></i>
                                            駐車場情報
                                        </a>
                                        <a class="dropdown-item text-white" href="{{ url('terms') }}" target="_blank"><i class="fas fa-file pr-2 fa-xs"></i>
                                        利用規約
                                        </a>
                                        <a class="dropdown-item text-white" href="{{ url('point') }}" target="_blank"><i class="fas fa-file pr-2 fa-xs"></i>
                                        利用前確認事項
                                        </a>
                                        
                                        <a class="dropdown-item text-white" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                        <i class="fas fa-sign-out-alt pr-2 fa-xs"></i>
                                            ログアウト
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            </div>
                            <div class="sp-navbar">
                                <li class="nav-item dropdown">
                                    <p class="text-white my-2">{{ Auth::user()->name }}  様</p>
                                    @if(Auth::user()->user_type == "1" || Auth::user()->user_type == "2")
                                    <a class="dropdown-item text-white" href="{{ url('/manage') }}"><i class="fas fa-users pr-2 fa-xs"></i>
                                        管理者ページ
                                    </a>
                                    @endif
                                    <a class="dropdown-item text-white" href="{{ url('/home') }}"><i class="fas fa-user pr-2 fa-xs"></i>
                                        マイページ
                                    </a>
                                    <a class="dropdown-item text-white" href="{{ url('reserve') }}"><i class="fas fa-car pr-2 fa-xs"></i> 
                                        洗車予約
                                    </a>

                                    <a class="dropdown-item text-white" href="{{ url('reservelog') }}"><i class="fas fa-history pr-2 fa-xs"></i>
                                        洗車履歴
                                    </a>

                                    <a class="dropdown-item text-white" href="{{ url('personalinfo') }}"><i class="fas fa-user-cog pr-2 fa-xs"></i>
                                        個人情報
                                    </a>

                                    <a class="dropdown-item text-white" href="{{ url('mycarinfo') }}"><i class="fas fa-key pr-2 fa-xs"></i>
                                        マイカー情報
                                    </a>

                                    <a class="dropdown-item text-white" href="{{ url('parkinginfo') }}"><i class="fas fa-parking pr-2 fa-xs"></i>
                                        駐車場情報
                                    </a>
                                    <a class="dropdown-item text-white" href="{{ url('terms') }}" target="_blank"><i class="fas fa-file pr-2 fa-xs"></i>
                                        利用規約
                                    </a>
                                    <a class="dropdown-item text-white" href="{{ url('point') }}" target="_blank"><i class="fas fa-file pr-2 fa-xs"></i>
                                        利用前確認事項
                                    </a>
                                    <a class="dropdown-item text-white" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt pr-2 fa-xs"></i>
                                        ログアウト
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            </div>
                            
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <footer class="text-center text-muted pt-5 
    @guest
    @else
    pb-5
    @endguest
    ">
    <div class="d-flex flex-row justify-content-center">
        <i class="fab fa-twitter-square p-1 fa-2x"></i>
        <i class="fab fa-youtube p-1 fa-2x"></i>
        <a href="https://www.instagram.com/aula_waterlesscarwash/" target="_blank" style="color:gray;"><i class="fab fa-instagram-square p-1 fa-2x"></i></a>
        <i class="fab fa-facebook-square p-1 fa-2x"></i>
        <i class="fab fa-line p-1 fa-2x"></i>
        <!--
        <i class="fab fa-twitter-square p-1 fa-2x" style="color:#1DA1F2;"></i>
        <i class="fab fa-youtube p-1 fa-2x" style="color:#DA1725;"></i>
        <i class="fab fa-instagram-square p-1 fa-2x" style="color:#CF2E92;"></i>
        <i class="fab fa-facebook-square p-1 fa-2x" style="color:#3C5A99;"></i>
        -->
    </div>
    <p class="pt-2">Copyright 2020 aula</p>
    @guest
    @else

    <div class="footer_bar fixed-bottom bg-dark badge-notify">
        <span>
        <a class="btn btn-dark p-2" href="{{ url('reserve') }}" role="button">
        <i class="fas fa-car pr-2 fa-lg"></i>
        今すぐ洗車予約を行う</a>
        </span>

        @if(Auth::user()->tsuke_pay != 0)
        <span class="badge badge-pill badge-light badge-notify_">P ¥{{ Auth::user()->tsuke_pay }}</span>
        @endif
    </div>
    <!--
    <div class="footer_bar fixed-bottom badge-notify text-right">
        
        @if(Auth::user()->tsuke_pay == 0)
        <span class="bg-danger">
        <a class="btn p-2" href="{{ url('reserve') }}" role="button">
        <i class="fas fa-car pr-2 fa-lg"></i>
        今すぐ洗車予約を行う</a>
        </span>
        @else
        <span>
        <a class="btn p-2" href="{{ url('reserve') }}" role="button">
            次回{{ Auth::user()->tsuke_pay }}円引き<br>今すぐ予約</a>
        </span>
        @endif
    </div>
    -->

    @endguest
    </footer>
    

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>
</html>
