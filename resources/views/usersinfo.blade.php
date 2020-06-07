@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <a href="{{ url('/manage') }}"><i class="fas fa-arrow-left pr-3 text-primary"></a></i>ユーザ一覧
        </div>
        <div class="table-responsive mx-1">
            <table class="table text-nowrap">
                <thead>
                    <tr>
                    <th scope="row">氏名</th>
                    <th scope="row">フリガナ</th>
                    <th scope="row">メール</th>
                    <th scope="row">電話番号</th>
                    <th scope="row">ポイント</th>
                    <th scope="row">種別</th>
                    <th scope="row">登録日</th>
                    </tr>
                </thead>
                @forelse ($users as $user)
                <tbody>
                    <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->name_furigana }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->phone_number }}</td>
                    <td>{{ $user->tsuke_pay }}</td>
                    <td>@if( $user->user_type == 0 )
                        一般
                    @elseif( $user->user_type == 1 )
                        スタッフ
                    @elseif( $user->user_type == 2 )
                        管理者
                    @endif
                    </td>
                    <td>{{ $user->created_at }}</td>
                    </tr>
                </tbody>
                @empty
                <tbody>
                    <tr>
                        <th>ユーザ不在</th>
                    </tr>
                </tbody>
                @endforelse
            </table>
        </div>
    </div>
</div>
@endsection
