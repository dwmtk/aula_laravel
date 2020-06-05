@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><a href="{{ url('/home') }}"><i class="fas fa-arrow-left pr-3 text-primary"></a></i>駐車場管理</div>

                <div class="card-body">
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
                    <p><i class="fas fa-link p-2"></i>登録済みの駐車場情報</p>
                    @forelse ($parkings as $parking)
                    <div class="card mb-3">
                        <div class="card-body p-2">
                            <p class="card-title text-center mb-1"><u>No. {{ $loop->iteration }}</u></p>

                            <div class="d-block pt-3 pb-0" style="background: #EDEFF2; border-radius: 8px;">
                            <div class="mx-auto" style="max-width:250px;">
                            <table class="table table-sm table-borderless">
                            <tr><td scope="row" style="width:85px;">郵便番号：</td><td>{{ $parking->parking_postcode }}</td></tr>
                            <tr><td scope="row">都道府県：</td><td>{{ $parking->parking_prefecture }}</td></tr>
                            <tr><td scope="row">市区町村：</td><td>{{ $parking->parking_city }}</td></tr>
                            <tr><td scope="row">番地：</td><td>{{ $parking->parking_address }}</td></tr>
                            <tr><td scope="row">建物名：</td><td>{{ $parking->parking_building }}</td></tr>
                            <tr><td scope="row">詳細：</td><td>{{ $parking->parking_detail }}</td></tr>

                            <tr><td colspan="2">

                            <div class="d-flex text-center mx-auto" style="max-width:250px;">
                                <a class="btn btn-sm btn-primary btn-lg flex-fill p-2 mr-1" href="{{ action('ParkingController@updateform', $parking->parking_id) }}" role="button" >編集する</a>
                                <!--
                                <a class="btn btn-sm btn-primary btn-lg flex-fill p-2" href="{{ action('ParkingController@delete', $parking->parking_id) }}" role="button" >解除する</a>
                                -->
                                <form class="flex-fill" method="POST" action="{{ url('/parkingdelete') }}" onSubmit="return dialog('駐車場を解除しますか？')">
                                @csrf
                                    <input type="hidden" name="parking_id" value="{{ $parking->parking_id }}">
                                    <input class="btn btn-sm btn-secondary btn-lg p-2" type="submit" value="解除する" style="width:100%;">
                                </form>
                            </div>
                            </td></tr>

                            </table>

                            </div>
                            
                            </div>


                        </div>
                    </div>
                    @empty

                        <p>・駐車場が登録されていません。</p>

                    @endforelse

                    <!--
                    <p><i class="fas fa-link p-2"></i>登録済みの駐車場情報</p>
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
                    -->
                    <div class="text-center pt-2">
                        <a class="btn btn-outline-info" href="{{ url('parkinginsert') }}" role="button"><i class="fas fa-plus pr-2"></i>新しく駐車場を登録する</a>
                    </div>

                    
                </div>
                <div class="card-footer" style="background: #E8F3FF;">
                    @include('layouts.menu')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
