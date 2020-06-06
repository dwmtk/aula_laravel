@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><a href="{{ url('/manage') }}"><i class="fas fa-arrow-left pr-3 text-primary"></a></i>カレンダーメンテナンス</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (session('message'))
                        <div class="container mt-2">
                        <div class="alert alert-success">
                            {{session('message')}}
                        </div>
                        </div>
                    @endif
                    <div class="cal_wrapper mb-4">
                    <div class="googlecal">
                    <iframe src="https://calendar.google.com/calendar/b/2/embed?height=600&amp;wkst=1&amp;bgcolor=%23ffffff&amp;ctz=Asia%2FTokyo&amp;src=YXVsYS53bGN3QGdtYWlsLmNvbQ&amp;color=%23039BE5&amp;showTz=0&amp;title=aula%20%E5%96%B6%E6%A5%AD%E3%82%AB%E3%83%AC%E3%83%B3%E3%83%80%E3%83%BC&amp;showNav=1&amp;showDate=1&amp;showPrint=0&amp;showTabs=0&amp;showCalendars=0" style="border-width:0" width="800" height="600" frameborder="0" scrolling="no"></iframe>
                    </div>
                    </div>
                    <h3>休業日設定<a class="btn btn-sm btn-primary btn-lg flex-fill ml-3" href="{{ url('/calendaroffday') }}" role="button" >休業日設定</a></h3>
                    <p><a href="https://calendar.google.com/calendar/b/2/r" target="_blank">Googleカレンダー</a>に、「休業日」という名前の終日予定を作成。作成後、「休業日設定」ボタンを押す。<br>※本日～6ヶ月先（180日後）まで取得する。</p>
                    <h3>シフト反映<a class="btn btn-sm btn-primary btn-lg flex-fill ml-3" href="{{ url('/calendarreflect') }}" role="button">シフト反映</a></h3>
                    <p>「シフト反映」ボタンを押すと、Googleカレンダーに対して、予定の入っていないシフトを反映する。<br>※本日～2ヶ月先（60日後）まで反映する。既にカレンダーに予定が入っている場合は、反映しない。</p>

   
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
