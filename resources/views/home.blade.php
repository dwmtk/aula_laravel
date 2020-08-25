@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">マイページ</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if (session('cancel_success'))
                        <div class="container mt-2">
                        <div class="alert alert-success">
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
                    @if (session('message_error'))
                        <div class="container mt-2">
                        <div class="alert alert-danger">
                            {{session('message_error')}}
                        </div>
                        </div>
                    @endif

                    @if( Auth::user()->tsuke_pay != 0 )
                    <div class="pb-3 text-center">
                    <div class="alert alert-primary" role="alert">
                        <p><u>【お知らせ】前回キャンセル分のポイントが残っています</u></p>
                        <a class="btn btn-primary p-2" href="{{ url('reserve') }}" role="button">
                        <i class="fas fa-car pr-2 fa-lg"></i>
                        洗車予約を行う</a>
                    </div>
                    </div>
                    @endif

                    

                    <p><i class="fas fa-link p-2"></i>現在の予約状況</p>
                    @forelse ($orders as $order)
                    <div class="card mb-3">
                        <!--<div class="card-header bg-white text-center">No. {{ $loop->iteration }}</div>-->
                        <div class="card-body p-2">
                            <p class="card-title text-center mb-1"><u>No. {{ $loop->iteration }}</u></p>

                            <div class="d-block pt-3 pb-0" style="background: #E8F3FF; border-radius: 8px;">
                            <div class="mx-auto" style="max-width:250px;">
                            <table class="table table-sm table-borderless">
                            <tr><td scope="row" style="width:68px;">洗車日：</td><td>{{ date('Y年m月d日',  strtotime($order->order_date)) }}</td></tr>
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
                            <tr><td colspan="2">
                            <div class="d-flex text-center mx-auto" style="max-width:250px;">
                            
                            <a class="btn btn-sm btn-primary btn-lg flex-fill p-2" href="{{ action('ReserveController@cancelform', $order->order_id) }}" role="button" >予約キャンセル</a>
                            
                            </div>
                            </td></tr>
                            </table>

                            </div>
                            </div>
                        </div>
                    </div>
                    @empty

                        <p>・現在の予約はありません。</p>

                    @endforelse
                </div>
                {{-- <a href="{{ action('ReserveController@coupon_confirm', 'Ruk12') }}">test</a> --}}
                <div class="card-footer" style="background: #E8F3FF;">
                    @include('layouts.menu')
            </div>
        </div>
    </div>
</div>
@endsection
