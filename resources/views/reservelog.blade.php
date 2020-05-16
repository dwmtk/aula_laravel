@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><a href="{{ url('/home') }}"><i class="fas fa-arrow-left pr-3 text-primary"></a></i>予約履歴</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <p><i class="fas fa-link p-2"></i>過去の予約履歴</p>
                    @forelse ($orders as $order)
                    <div class="card mb-3">
                        <!--<div class="card-header bg-white text-center">No. {{ $loop->iteration }}</div>-->
                        <div class="card-body p-2">
                            <p class="card-title text-center mb-1"><u>@if ( $order->status == 2 )
                            洗車完了
                            @elseif ($order->status == 9 )
                            洗車キャンセル
                            @else
                            @endif</u></p>

                            <div class="d-block pt-3 pb-0" style="
                            @if ( $order->status == 2 )
                            background: #E8F3FF; 
                            @elseif ($order->status == 9 )
                            background: #EDEFF2;
                            @else
                            @endif
                            border-radius: 8px;">
                            <div class="mx-auto" style="max-width:250px;">
                            <table class="table table-sm table-borderless">
                            <tr><td scope="row" style="width:85px;">洗車日：</td><td>{{ date('Y年m月d日',  strtotime($order->order_date)) }}</td></tr>
                            <tr><td scope="row">時間帯：</td>
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
                            <tr><td scope="row">車両：</td><td>{{ $order->car_maker }}, {{ $order->car_number }}</td></tr>
                            <tr><td scope="row">駐車場：</td><td>{{ $order->parking_prefecture }} {{ $order->parking_city }} {{ $order->parking_address }}</td></tr>
                            <tr><td scope="row">洗車料金：</td><td>￥{{ number_format($order->price) }}</td></tr>
                            </table>

                            </div>
                            
                            </div>


                        </div>
                    </div>
                    @empty

                        <p>・予約履歴はありません。</p>

                    @endforelse

                    <!--
                    <p><i class="fas fa-link p-2"></i>過去の予約履歴</p>
                    @forelse ($orders as $order)
                    <div class="card mb-3 border-secondary">
                        <div class="card-header bg-white text-center">
                        @if ( $order->status == 2 )
                        洗車完了
                        @elseif ($order->status == 9 )
                        洗車キャンセル
                        @else
                        @endif
                        </div>
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
                        </div>
                    </div>
                    @empty

                    <p>・現在の予約はありません。</p>

                    @endforelse
                    -->
                </div>
                <div class="card-footer" style="background: #E8F3FF;">
                    @include('layouts.menu')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
