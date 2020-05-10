@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">洗車確認</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <table class="table">
                    <tbody>
                        <tr><th scope="row">日付</th><td>{{ date('Y/m/d',  strtotime($order->order_date)) }}<br>
                        @if ( $order->schedule == 1)
                        08:00～11:00
                        @elseif ( $order->schedule == 2)
                        11:00～14:00
                        @elseif ( $order->schedule == 3)
                        14:00～17:00
                        @elseif ( $order->schedule == 4)
                        @endif
                        </td></tr>
                        <tr><th scope="row">お客様</th><td>{{ $user->name }}<br>{{ $user->name_furigana }}<br>{{ $user->phone_number }}<br>{{ $user->email }}</td></tr>
                        <tr><th scope="row">駐車場</th><td>{{ $order->parking_postcode }}<br>{{ $order->parking_prefecture }}<br>{{ $order->parking_city }}<br>{{ $order->parking_address }}<br>{{ $order->parking_detail }}</td></tr>
                        <tr><th scope="row">車両</th><td>{{ $order->car_maker }}<br>{{ $order->car_name }}<br>{{ $order->car_age_start }}～{{ $order->car_age_end}}<br>{{ $order->car_number }}<br>{{ $order->car_color }}</td></tr>
                        </tbody>
                    </table>


                    <div class="text-center">
                        <input type="checkbox" value="1" id="Check1"></input>
                        <label for="Check1">チェック１</label>
                    </div>
                    <div class="text-center">
                    <input type="checkbox" value="1" id="Check2"></input>
                        <label for="Check2">チェック２</label>
                    </div>                    
                    <div class="text-center">
                    <input type="checkbox" value="1" id="Check3"></input>
                        <label for="Check3">チェック３</label>
                    </div>
                    <div class="text-center">
                    <input type="checkbox" value="1" id="Check4"></input>
                        <label for="Check4">チェック４</label>
                    </div>
                    <p class="text-center pt-3">※上記のチェックポイントを確認後、洗車完了すること※</p>
                    <div class="text-center">
                    <a class="btn btn-primary" href="{{ action('ManageController@washed', $order->order_id) }}" role="button">洗車完了</a>
                    </div>
                    <div class="pt-3">
                        <a class="btn btn-outline-info" href="{{ url('/manage') }}" role="button">戻る</a>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
