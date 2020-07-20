@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">確認画面</div>

                <div class="card-body">
                    <div class="text-left mx-auto" style="width:190px;">
                        {{ $type->type }}サイズ: ¥{{ $type->price }} <br>例){{ $type->example }}
                    </div>
                    <div class="text-center my-3">
                        <form action="{{ url('/oncereserve/payment') }}" method="POST">
                        @csrf
                            <script
                            src="https://checkout.stripe.com/checkout.js"
                            class="stripe-button"
                            data-key="{{ config('app.stripe_public_key') }}"
                            data-amount="{{ $type->price }}"
                            data-name="aula"
                            data-label="カードで支払う"
                            data-description="洗車決済"
                            data-image="{{ asset('img\aula_logo.png') }}"
                            data-locale="auto"
                            data-currency="JPY"
                            data-locale="ja">
                            </script>
                            <input type="hidden" name="price" value="{{ $type->price }}">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
