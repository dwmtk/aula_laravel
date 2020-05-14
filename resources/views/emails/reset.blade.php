<h3>
    <a href="{{ config('app.url') }}">{{ config('app.name') }}</a>
</h3>
<p>
    下記のリンクをクリックして、パスワードをリセットしてください。<br>
    もしこのメールに心当たりがない場合、メールを破棄してください。
</p>
<p>
    パスワードをリセットする: <a href="{{ $actionUrl }}">{{ $actionUrl }}</a>
</p>