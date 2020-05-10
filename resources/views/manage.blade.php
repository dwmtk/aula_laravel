@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">

            
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        
        <h2>洗車予定一覧</h2>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col" colspan="2">日程</th>
                    <th scope="col">お客様</th>
                    <th scope="col">駐車場</th>
                    <th scope="col">車両</th>
                    <th scope="col">状況</th>
                    <th scope="col"></th>
                </tr>
            </thread>
            @forelse ($orders as $order)
            <tbody>
            <tr class="
                    @if( $order->status == 1)
                    @elseif( $order->status == 2)
                    table-primary
                    @elseif( $order->status == 9)
                    table-secondary
                    @endif
            ">
                <td>{{ date('m/d',  strtotime($order->order_date)) }}</td>
                <td>
                    @if ( $order->schedule == 1)
                    08:00～11:00
                    @elseif ( $order->schedule == 2)
                    11:00～14:00
                    @elseif ( $order->schedule == 3)
                    14:00～17:00
                    @elseif ( $order->schedule == 4)
                    @endif
                </td>
                <td>{{ $order->name }}<br>{{ $order->phone_number }}<br>{{ $order->email }}</td>
                <td>{{ $order->parking_city }},{{ $order->parking_address }},{{ $order->parking_building }},{{ $order->parking_detail }}</td>
                <td>{{ $order->car_maker }}, {{ $order->car_name }}, {{ $order->car_number }}, {{ $order->car_color }}</td>
                <td>
                    @if( $order->status == 1)
                    未
                    @elseif( $order->status == 2)
                    済
                    @elseif( $order->status == 9)
                    取消
                    @endif
                </td>
                <td>
                <a class="btn btn-primary btn-sm
                @if( $order->status == 9 || $order->status == 2 )
                    disabled
                @endif
                " href="{{ action('ManageController@washconfirm', $order->order_id) }}" role="button">洗車<br>完了</a>
                </td>
            </tr>
            </tbody>
            @empty
            <tbody>
            <tr>
                <th>現在の予定はありません。</th>
            </tr>
            </tbody>
            @endforelse
        </table>
</div>
@endsection
