@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">

            
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        @if (session('message_success'))
        <div class="container mt-2">
            <div class="alert alert-success">
            {{session('message_success')}}
            </div>
        </div>
        @endif

        <div class="mb-2">
            <a href="{{ url('/calendarform') }}">＜カレンダーメンテナンス＞</a>
        </div>
        <div class="mb-2 ml-3">
            <a href="{{ url('/usersinfo') }}">＜ユーザ一覧＞</a>
        </div>
        <div class="col-12 text-center">
            <h2>洗車予定一覧</h2>
        </div>
        
        <form method="POST" action="{{ url('/manageselect') }}" style="width:300px;" class="my-2">
            @csrf

            <div class="form-group">
            <input class="form-check-input" type="radio" name="radiobox" id="Radios1" value="email" checked>
            <input id="email" type="text" class="col form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="メールアドレス"  autocomplete="email">

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>

            <div class="form-group">
            <input class="form-check-input" type="radio" name="radiobox" id="Radios2" value="name">
            <input id="name" type="text" class="col form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="氏名"  autocomplete="name">

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div>
            <button type="submit" class="btn btn-primary">
                検索
            </button>

            <a class="btn btn-secondary" href="{{ url('/manage') }}" role="button">リセット</a>
            </div>

        </form>

        <div class="table-responsive mx-1">

        @if(isset($select_result))
        <div class="alert-info text-center p-2 mb-2">
            <h5 class="mb-0">{{ $select_result }}</h5>
        </div>
        @endif

        <table class="table text-nowrap">
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
                " href="{{ action('ManageController@washconfirm', $order->order_id) }}" role="button">詳細</a>
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
</div>
@endsection
