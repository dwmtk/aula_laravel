@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><a href="{{ url('/home') }}"><i class="fas fa-arrow-left pr-3 text-primary"></i></a>マイカー情報管理</div>

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

                    <p><i class="fas fa-link p-2"></i>登録済みのマイカー情報</p>
                    @forelse ($mycars as $mycar)
                    <div class="card mb-3">
                        <div class="card-body p-2">
                            <p class="card-title text-center mb-1"><u>No. {{ $loop->iteration }}</u></p>

                            <div class="d-block pt-3 pb-0" style="background: #EDEFF2; border-radius: 8px;">
                            <div class="mx-auto" style="max-width:250px;">
                            <table class="table table-sm table-borderless">
                            <tr><td scope="row" style="width:96px;">メーカー：</td><td>{{ $mycar->car_maker }}</td></tr>
                            <tr><td scope="row">車名：</td><td>{{ $mycar->car_name }}</td></tr>
                            <tr><td scope="row">年式：</td><td>{{ $mycar->car_age_start }}～{{ $mycar->car_age_end }}</td></tr>
                            <tr><td scope="row">ナンバー：</td><td>{{ $mycar->car_number }}</td></tr>
                            <tr><td scope="row">車色：</td><td>{{ $mycar->car_color }}</td></tr>
                            <tr><td scope="row">最終洗車日：</td><td>
                            @if( !is_null( $mycar->order_date ))
                                {{date('Y年m月d日',  strtotime( $mycar->order_date )) }}
                            @else
                                洗車履歴はありません
                            @endif
                            </td></tr>
                            <tr><td colspan="2">

                            <form class="d-flex text-center mx-auto" style="max-width:250px;" method="POST" action="{{ url('/mycardelete') }}" onSubmit="return dialog('マイカーを解除しますか？')">
                            @csrf
                                <input type="hidden" name="mycar_id" value="{{ $mycar->mycar_id }}">
                                <input class="btn btn-sm btn-secondary btn-lg flex-fill p-2" type="submit" value="解除する">
                            </form>
                            </td></tr>
                            </table>
                            </div>
                            </div>
                        </div>
                    </div>
                    @empty

                        <p>・マイカーが登録されていません。</p>

                    @endforelse
                    <div class="text-center pt-2">
                        <a class="btn btn-outline-info" href="{{ url('mycarinsert') }}" role="button"><i class="fas fa-plus pr-2"></i>新しくマイカーを登録する</a>
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
