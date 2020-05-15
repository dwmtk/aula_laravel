@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Myカー情報管理</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table table-responsive">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">メーカー</th>
                                <th scope="col">車名</th>
                                <th scope="col">車両年式</th>
                                <th scope="col">ナンバー</th>
                                <th scope="col">車色</th>
                                <th scope="col"></th>
                            </tr>
                        </thread>
                        @forelse ($mycars as $mycar)
                        <tbody>
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $mycar->car_maker }}</td>
                            <td>{{ $mycar->car_name }}</td>
                            <td>{{ $mycar->car_age_start }}～{{ $mycar->car_age_end }}</td>
                            <td>{{ $mycar->car_number }}</td>
                            <td>{{ $mycar->car_color }}</td>
                            <td><a class="btn btn-outline-info btn-sm" href="{{ action('MyCarController@delete', $mycar->mycar_id) }}" role="button">削除</a></td>
                        </tr>
                        </tbody>
                        @empty
                        <tbody>
                        <tr>
                            <th>Myカーを登録してください。</th>
                        </tr>
                        </tbody>
                        @endforelse

                    </table>
                    <div class="text-center">
                        <a class="btn btn-outline-info" href="{{ url('mycarinsert') }}" role="button">Myカー追加</a>
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
