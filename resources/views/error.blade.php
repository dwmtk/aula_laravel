@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><a href="{{ url('/home') }}"><i class="fas fa-arrow-left pr-3 text-primary"></a></i>エラー</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (session('reserve_error'))
                    <div class="container mt-2">
                        <div class="alert alert-danger">
                        {{session('reserve_error')}}
                        </div>
                    </div>
                    @endif
                    <div class="text-center">
                        <a class="btn btn-primary p-2" href="{{ url('reserve') }}" role="button">
                            <i class="fas fa-car pr-2 fa-lg"></i>
                            洗車予約画面に戻る
                        </a>
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
