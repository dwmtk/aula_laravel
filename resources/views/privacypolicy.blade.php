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
                    <div class="text-center py-5">
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
                </div>
                <div class="card-footer" style="background: #E8F3FF;">
                    @include('layouts.menu')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
