@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">お支払い</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <p>まだ予約は完了していません。</p>
                    <div class="card mb-3 border-secondary">
                        <div class="card-header bg-white text-center">お支払情報</div>
                        <div class="card-body mx-auto">

                    <p>お支払金額：￥{{ $final_price }}</p>
                    <p>下記のボタンをクリックして、お支払をお願いいたします。</p>
                    <div class="text-center">
                    <form action="{{ url('/payment') }}" method="POST">
                    @csrf
                        <script
                        src="https://checkout.stripe.com/checkout.js"
                        class="stripe-button"
                        data-key="{{ config('app.stripe_public_key') }}"
                        data-amount="{{ $final_price }}"
                        data-name="aula"
                        data-label="カードで支払う"
                        data-description="洗車決済"
                        data-image="img\aula_logo.png"
                        data-locale="auto"
                        data-email="{{ Auth::user()->email }}"
                        data-currency="JPY"
                        data-locale="ja">
                        </script>
                        <input type="hidden" name="final_price" value="{{ $final_price }}">
                        <input type="hidden" name="order_id" value="{{ $order_id }}">
                    </form>
                    </div>
                    </div>
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
