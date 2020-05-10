@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Myカー追加</div>

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

                        <div class="form-group row">
                            <label for="car_number" class="col-md-4 col-form-label text-md-right">ナンバー <span class="badge badge-danger">必須</span></label>


                                <input id="car_number" type="text" class="col-md-6 form-control @error('car_number') is-invalid @enderror" name="car_number" value="{{ old('car_number') }}" placeholder="12-34" required autocomplete="car_number" autofocus>

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
                    <script src="{{ asset('/js/hierselect.js') }}"></script>                    
                    <div class="">
                        <a class="btn btn-outline-info" href="{{ url('mycarinfo') }}" role="button">戻る</a>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>
@endsection
