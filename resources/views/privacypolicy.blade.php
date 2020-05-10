@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">プライバシーポリシー</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="text-center pt-5">
                        <p>プライバシーポリシー</p>
                        <p>
                        あああああああああああああああああああああああああああ<br>
                        あああああああああああああああああああああああああああ<br>
                        あああああああああああああああああああああああああああ<br>
                        あああああああああああああああああああああああああああ<br>
                        あああああああああああああああああああああああああああ<br>
                        あああああああああああああああああああああああああああ<br>
                        あああああああああああああああああああああああああああ<br>
                        あああああああああああああああああああああああああああ<br>
                        あああああああああああああああああああああああああああ<br>
                        </p>
                    </div>

                    <div class="pt-3">
                        <a class="btn btn-outline-info" href="{{ url('/') }}" role="button">戻る</a>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
