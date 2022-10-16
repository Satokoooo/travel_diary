@extends('layouts.app')
@section('title', '旅行記新規登録')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2 class="mb-5">旅行記登録</h2>
                <form action="{{ action('App\Http\Controllers\DiaryController@create') }}" method="POST" enctype="multipart/form-data">
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row mb-4">
                        <label class="col-md-2">タイトル</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-md-2">出発日</label>
                        <div class="col-md-10">
                            <input type="date" class="form-control" name="departure_date" value="{{ old('departure_date') }}">
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-md-2">帰宅日</label>
                        <div class="col-md-10">
                            <input type="date" class="form-control" name="arrived_date" value="{{ old('arrived_date') }}">
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-md-2">カテゴリ</label>
                        <div class="col-md-10">
                            <select class="form-select" name="category" value="{{ old('category') }}">
                                <option value="category1">カテゴリ１</option>
                                <option value="category2">カテゴリ２</option>
                                <option value="category3">カテゴリ３</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-md-2">本文</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="text" rows="20">{{ old('text') }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-md-2">画像</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="image">
                        </div>
                    </div>
                    @csrf
                    <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                        <button type="button" class="btn btn-outline-secondary btn-lg me-3">キャンセル</button>
                        <input type="submit" class="btn btn-primary btn-lg" value="新規登録">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection