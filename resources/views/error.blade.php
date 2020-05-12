@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">エラー</div>

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

                    <div class="pt-3">
                        <a class="btn btn-outline-info" href="{{ url('/') }}" role="button">戻る</a>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
