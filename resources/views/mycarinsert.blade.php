@extends('layouts.app')

@section('content')
<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><a href="{{ url('/mycarinfo') }}"><i class="fas fa-arrow-left pr-3 text-primary"></a></i>マイカー追加</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif



                    <form method="POST" action="{{ url('/mycarinsert') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="car_maker" class="col-md-4 col-form-label text-md-right">メーカー <span class="badge badge-danger">必須</span></label>
                     
                                <select id="car_maker" name="car_maker" class="col-md-6 form-control @error('car_maker') is-invalid @enderror" value="{{ old('car_maker') }}" required autocomplete="car_maker" autofocus>
                                    <option value="" selected="selected" class="default">--選択してください--</option>
                                    @foreach ($car_makers as $car_maker)
                                    <option value="{{ $car_maker->car_maker }}" class="{{ $car_maker->car_maker }}">{{ $car_maker->car_maker }}</option>
                                    @endforeach
                                </select>
                                @error('car_maker')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
             
                        </div>

                        <div class="form-group row">
                            <label for="car_name" class="col-md-4 col-form-label text-md-right">車名 <span class="badge badge-danger">必須</span></label>

                                <select id="car_name" name="car_name" class="col-md-6 form-control @error('car_name') is-invalid @enderror" value="{{ old('car_name') }}" required autocomplete="car_name" autofocus disabled>
                                <option value="" selected="selected" class="default">--選択してください--</option>
                                @foreach ($car_names as $car_name)
                                <option value="{{ $car_name->car_name }}" class="{{ $car_name->car_maker }}">{{ $car_name->car_name }}</option>
                                @endforeach
                                </select>
                                @error('car_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <label id="hidden_area" style="display:none"></label>

                        <div class="form-group row">
                            <label for="car_age" class="col-md-4 col-form-label text-md-right">年式 <span class="badge badge-danger">必須</span></label>

                                <select id="car_age" name="car_age" class="col-md-6 form-control @error('car_age') is-invalid @enderror" value="{{ old('car_age') }}" required autocomplete="car_age" autofocus disabled>
                                <option value="" selected="selected" class="default">--選択してください--</option>
                                    @foreach ($car_ages as $car_age)
                                    <option value="{{ $car_age->car_age }}" class="{{ $car_age->car_name }}">{{ $car_age->car_age }}</option>
                                    @endforeach
                                </select>
                                @error('car_age')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                        </div>
                        <label id="hidden_area2" style="display:none"></label>

                        <div class="form-group row">
                            <label for="car_number" class="col-md-4 col-form-label text-md-right">ナンバー <span class="badge badge-danger">必須</span></label>


                                <input id="car_number" type="text" class="col-md-6 form-control @error('car_number') is-invalid @enderror" name="car_number" value="{{ old('car_number') }}" placeholder="あ1234" required autocomplete="car_number" autofocus>

                                @error('car_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                        </div>

                        <div class="form-group row">
                            <label for="car_color" class="col-md-4 col-form-label text-md-right">色 <span class="badge badge-danger">必須</span></label>


                                <select id="car_color" name="car_color" class="col-md-6 form-control @error('car_color') is-invalid @enderror"  value="{{ old('car_color') }}" required autocomplete="car_color" autofocus>
                                    <option selected="selected">--選択してください--</option>
                                    <option>白</option>
                                    <option>黒</option>
                                    <option>灰</option>
                                    <option>銀</option>
                                    <option>赤</option>
                                    <option>青</option>
                                    <option>茶</option>
                                    <option>黄</option>
                                    <option>緑</option>
                                    <option>他</option>
                                </select>

                                @error('car_color')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                        </div>

                        <div class="form-group row mb-0 mt-4">
                            <div class="col-md-6 offset-md-4 text-center">
                                <button type="submit" class="btn btn-primary">
                                    マイカー追加
                                </button>
                            </div>
                        </div>
                    </form>      
                </div>
                <div class="card-footer" style="background: #E8F3FF;">
                    @include('layouts.menu')
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<script src="{{ asset('/js/hierselect.js') }}"></script>

<script>
searchWord = function(){
  var searchResult,
      searchText = $(this).val(), // 検索ボックスに入力された値
      targetText,
      hitNum;
 
  // 検索結果を格納するための配列を用意
  searchResult = [];
 
  // 検索結果エリアの表示を空にする
  $('#search-result__list').empty();
  $('.search-result__hit-num').empty();
 
  // 検索ボックスに値が入ってる場合
  if (searchText != '') {
    $('.target-area li').each(function() {
      targetText = $(this).text();
 
      // 検索対象となるリストに入力された文字列が存在するかどうかを判断
      if (targetText.indexOf(searchText) != -1) {
        // 存在する場合はそのリストのテキストを用意した配列に格納
        searchResult.push(targetText);
      }
    });
 
    // 検索結果をページに出力
    for (var i = 0; i < searchResult.length; i ++) {
      $('<span>').text(searchResult[i]).appendTo('#search-result__list');
    }
 
    // ヒットの件数をページに出力
    hitNum = '<span>検索結果</span>：' + searchResult.length + '件見つかりました。';
    $('.search-result__hit-num').append(hitNum);
  }
};
 
// searchWordの実行
$('#search-text').on('input', searchWord);
</script>
@endsection
