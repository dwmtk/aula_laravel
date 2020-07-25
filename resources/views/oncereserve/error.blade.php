@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">洗車決済</div>

                <div class="card-body">

                    <p>エラーが発生しました。</p>
                    <div class="text-center">
                        <a class="btn btn-primary btn-sm" href="{{ url('/oncereserve/reserve') }}" role="button">戻る</a>
                    </div>     
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
