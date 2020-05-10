@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">予約履歴</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <p>過去の予約履歴</p>
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

                    <div class="">
                        <a class="btn btn-outline-info" href="{{ url('home') }}" role="button">戻る</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
