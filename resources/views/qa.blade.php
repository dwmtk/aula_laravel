@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Q&A</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="text-center py-2">
                        <h4 class="py-5">よくある質問</h4>
                        <p class="text-left">
                        Q. どうすれば会員になれますか？<br>
                        A. パソコンやスマホなどのモバイル端末から専用サイトへアクセスして頂き、無料会員登録を行って頂いております。<br><br>

                        Q. 支払方法はどのようなものがありますか？<br>
                        A. クレジットカード決済のみご利用いただけます。<br><br>

                        Q. 車を移動してもらうことは可能ですか？<br>
                        A. いいえ、できません。事故や盗難などのトラブルを避けるために、車の鍵のお預かりはお断りさせて頂いております。<br><br>

                        Q. 洗車の時間指定はできますか？<br>
                        A. 作業の都合上、時間帯の指定のみ承っております。時間帯は午前（8時～11時）、昼（11時～14時）、夕方（14時～17時）の3つの時間帯からお選び頂けます。<br><br>

                        Q. 予約をキャンセルした場合のペナルティなどはありますか？また、予約をキャンセルした場合に返金はしてもらえますか？<br>
                        A. 基本的にペナルティはありませんが、決済後の返金はできません。代わりにお支払い頂いた洗車金額を同額分
                        のポイントとして返還いたしますので、再度ご予約下さい。<br>
                        ただし、度重なるキャンセルに関してはペナルティが発生する可能性がございます。<br><br>

                        Q. 出掛けた先で洗車してもらうことは可能ですか？<br>
                        A. 基本的に当社エリア内であれば可能です。ただし、対応出来ない場合もございます。洗車が行えない場合や場所の詳しくは注意事項をご確認下さい。<br><br>

                        Q. 洗車をしてもらっている時に出かけていても大丈夫ですか？<br>
                        A. はい、大丈夫です。お客様に立ち会って頂く必要は一切ございません。<br><br>
                        
                        Q. 窓やボディに付いているウロコのような白い水垢は取れますか？<br>
                        A. 残念ですが取れません。ウロコ汚れは通常の水垢とは違い、専用の溶剤や用具を使用しないと落とすことができない為、当社では行なっておりません。<br><br>

                        Q. 雨天時の場合、洗車はどのようになりますか？<br>
                        A. 洗車日当日の朝、天気予報を確認し、当社調べにより降水（または降雪）確率が50％以上の場合は洗車サービスを行う事ができません。<br>
                        その場合、一旦洗車予約キャンセルのメールをお送りさせていただきますので、お手数ですが再度、マイページより洗車の予約をお願いします。
                        </p>
                    </div>                 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection