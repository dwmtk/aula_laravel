@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="background: #E8F3FF;"><a href="{{ url('/') }}"><i class="fas fa-arrow-left pr-3 text-primary"></a></i>マイページ</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if (session('cancel_success'))
                        <div class="container mt-2">
                        <div class="alert alert-primary">
                            {{session('cancel_success')}}
                        </div>
                        </div>
                    @endif
                    @if (session('reserved_success'))
                        <div class="container mt-2">
                        <div class="alert alert-success">
                            {{session('reserved_success')}}
                        </div>
                        </div>
                    @endif

                    <p><i class="fas fa-link p-2"></i>現在の予約状況</p>
                    @forelse ($orders as $order)
                    <div class="card mb-3 border-secondary">
                        <div class="card-header bg-white text-center">No. {{ $loop->iteration }}</div>
                        <div class="card-body">
                            <table class="table table-sm table-primary table-borderless">
                            <tr><th scope="row">日付</th><td>{{ date('Y年m月d日',  strtotime($order->order_date)) }}</td></tr>
                            <tr><th scope="row">時間帯</th>
                            <td>
                                @if ( $order->schedule == 1)
                                08:00～11:00
                                @elseif ( $order->schedule == 2)
                                11:00～14:00
                                @elseif ( $order->schedule == 3)
                                14:00～17:00
                                @elseif ( $order->schedule == 4)
                                @endif
                            </td></tr>
                            <tr><th scope="row">洗車車両</th><td>{{ $order->car_maker }}, {{ $order->car_number }}</td></tr>
                            <tr><th scope="row">駐車場</th><td>{{ $order->parking_prefecture }} {{ $order->parking_city }} {{ $order->parking_address }}</td></tr>
                            </table>
                            <div class="text-center">
                            <a class="btn btn-sm btn-primary btn-lg" href="{{ action('ReserveController@cancelform', $order->order_id) }}" role="button">予約キャンセル</a>
                            </div>
                        </div>
                    </div>
                    @empty

                        <p>・現在の予約はありません。</p>

                    @endforelse

                </div>
                <div class="card-footer" style="background: #E8F3FF;">
                    <!--
                    <ul class="menu list-group list-group-horizontal-md list-group-item-primary">
                        <a class="list-group-item list-group-item-action text-primary" href="{{ url('reserve') }}">
                        <i class="fas fa-car pr-2 fa-lg"></i>洗車予約</a>

                        <a class="list-group-item list-group-item-action text-primary" href="{{ url('reservelog') }}">
                        <i class="fas fa-cog pr-2 fa-lg"></i>洗車履歴</a>

                        <a class="list-group-item list-group-item-action text-primary" href="{{ url('personalinfo') }}">
                        <i class="fas fa-user pr-2 fa-lg"></i>個人情報管理</a>
                    </ul>

                    <ul class="menu list-group list-group-horizontal-md">
                        <a class="list-group-item list-group-item-action text-primary" href="{{ url('mycarinfo') }}">
                        <i class="fas fa-key pr-2 fa-lg"></i>Myカー情報管理</a>

                        <a class="list-group-item list-group-item-action text-primary" href="{{ url('parkinginfo') }}">
                        <i class="fas fa-ban pr-2 fa-lg"></i>駐車場情報管理</a>
                    </ul>
                    </div>  
                    -->   
                    <!--
                    <div class="">
                    <table class="table menu table-hover table-responsive">
                        <tr><td width="400"><a href="{{ url('reserve') }}"><i class="fas fa-car pr-5 fa-lg"></i>　　洗車予約</a></td></tr>
                        <tr><td width="400"><a href="{{ url('reservelog') }}"><i class="fas fa-cog pr-5 fa-lg"></i>　　洗車履歴</a></td></tr>
                        <tr><td width="400"><a href="{{ url('personalinfo') }}"><i class="fas fa-user pr-5 fa-lg"></i>　　個人情報管理</a></td></tr>
                        <tr><td width="400"><a href="{{ url('mycarinfo') }}"><i class="fas fa-key pr-5 fa-lg"></i>　　Myカー情報管理</a></td></tr>
                        <tr><td width="400"><a class="menu" href="{{ url('parkinginfo') }}"><i class="fas fa-ban pr-5 fa-lg"></i>　　駐車場情報管理</a></td></tr>
                    </table>
                    </div>
                    -->
                    
                    <div class="d-flex flex-row justify-content-around  align-self-stretch flex-wrap align-content-center">

                        <div class="p-2" style="border-color: #031de2;">
                        <a href="{{ url('reserve') }}">
                        <i class="fas fa-car pr-2 fa-lg"></i>洗車予約</a>
                        </div>

                        <div class="p-2">
                        <a href="{{ url('reservelog') }}">
                        <i class="fas fa-cog pr-2 fa-lg"></i>洗車履歴</a>
                        </div>

                        <div class="p-2">
                        <a href="{{ url('personalinfo') }}">
                        <i class="fas fa-user pr-2 fa-lg"></i>個人情報</a>
                        </div>

                        <div class="p-2">
                        <a href="{{ url('mycarinfo') }}">
                        <i class="fas fa-key pr-2 fa-lg"></i>Myカー情報</a>
                        </div>

                        <div class="p-2">
                        <a href="{{ url('parkinginfo') }}">
                        <i class="fas fa-ban pr-2 fa-lg"></i>駐車場情報</a>
                        </div>
                    </div>
                    
            </div>
        </div>
    </div>
</div>
@endsection
