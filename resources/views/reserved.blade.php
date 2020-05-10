@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">洗車予約完了</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    洗車依頼が完了しました。
            
                    <div class="">
                        <a class="btn btn-outline-info" href="{{ url('home') }}" role="button">戻る</a>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>
@endsection
