@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><a href="{{ url('/home') }}"><i class="fas fa-arrow-left pr-3 text-primary"></a></i>予約キャンセル</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <p><i class="fas fa-link p-2"></i>キャンセルする予約内容</p>
                    
                    <table class="table table-sm table-borderless mx-auto" style="width:400px;">
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
                    <tr><th scope="row">洗車車両</th><td>{{ $order->car_name }}, {{ $order->car_number }}</td></tr>
                    <tr><th scope="row">駐車場</th><td>{{ $order->parking_prefecture }} {{ $order->parking_city }} {{ $order->parking_address }}</td></tr>
                    </table>

                    <form method="POST" action="{{ action('ReserveController@cancelform', $order->order_id) }}">
                        @csrf
    
                        <div class="mx-auto overflow-auto bg-light my-3" style="max-width: 400px; max-height: 300px; font-size:80%;">
                        <p class="mx-1">
                        【キャンセルポリシー】<br><br>
                        本キャンセルポリシーは、当社と、本サイトの利用者との間に成立するものとします。<br>
                        ご予約、キャンセルにつきまして、以下をご確認頂きますようお願いいたします。<br><br>
                        ・キャンセル料について<br>
                        　現状、キャンセル料は発生致しませんが、キャンセルが度重なる場合、ペナルティを儲ける可能性がございます。<br><br>
                        ・キャンセル時の対応<br>
                        　ご予約時にお支払いしていただいた全額を、同等のポイントとして返還いたします。<br>
                        　このポイントは次回以降、洗車予約をする際、優先して使用されます。<br>
                        　このポイントは原則、利用者がアカウントを削除しない限り、消滅することはありません。<br>
                        </p>

                        </div>

                        <div class="form-check text-center">
                            <input class="form-check-input" type="checkbox" id="defaultCheck3" required>
                            <label class="form-check-label" for="defaultCheck3">上記のキャンセルポリシーに同意します。</label>
                        </div>

                        <div class="form-group row mb-3 mt-4">
                            <div class="col-md-6 offset-md-3 text-center">
                                <button type="submit" class="btn btn-primary">
                                    予約キャンセル
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-footer" style="background: #E8F3FF;">
                    @include('layouts.menu')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
