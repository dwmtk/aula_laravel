@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">駐車場管理</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">郵便番号</th>
                                <th scope="col">都道府県</th>
                                <th scope="col">市区町村</th>
                                <th scope="col">番地</th>
                                <th scope="col">建物名</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                        </thread>
                        @forelse ($parkings as $parking)
                        <tbody>
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $parking->parking_postcode }}</td>
                                <td>{{ $parking->parking_prefecture }}</td>
                                <td>{{ $parking->parking_city }}</td>
                                <td>{{ $parking->parking_address }}</td>
                                <td>{{ $parking->parking_building }}</td>
                                <td><a class="btn btn-outline-info btn-sm" href="{{ action('ParkingController@updateform', $parking->parking_id) }}" role="button">編集</a></td>
                                <td><a class="btn btn-outline-info btn-sm" href="{{ action('ParkingController@delete', $parking->parking_id) }}" role="button">削除</a></td>
                            </tr>
                        </tbody>
                        @empty
                        <tbody>
                        <tr>
                            <td colspan="6">駐車場を登録してください。</td>
                        </tr>
                        </tbody>
                        @endforelse

                    </table>
                    <div class="text-center">
                        <a class="btn btn-outline-info" href="{{ url('parkinginsert') }}" role="button">駐車場追加</a>
                    </div>
                    <div class="">
                        <a class="btn btn-outline-info" href="{{ url('home') }}" role="button">戻る</a>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
