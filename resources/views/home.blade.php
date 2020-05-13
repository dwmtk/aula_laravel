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

                    <p>現在の予約状況</p>
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

                    <div class="pt-3 d-flex">
                    <a class="btn btn-outline-info flex-fill" href="{{ url('reserve') }}" role="button">洗車予約</a>
                    <a class="btn btn-outline-info flex-fill" href="{{ url('reservelog') }}" role="button">洗車履歴</a>
                    <a class="btn btn-outline-info flex-fill" href="{{ url('personalinfo') }}" role="button">個人情報管理</a>
                    <a class="btn btn-outline-info flex-fill" href="{{ url('mycarinfo') }}" role="button">Myカー情報管理</a>
                    <a class="btn btn-outline-info flex-fill" href="{{ url('parkinginfo') }}" role="button">駐車場情報管理</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
