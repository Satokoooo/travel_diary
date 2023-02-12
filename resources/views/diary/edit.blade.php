@extends('layouts.app')
@section('title', '旅行記編集')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2 class="mb-5">旅行記編集</h2>
                <form action="{{ route('diary.update', ['id'=>$diary->id]) }}" method="POST" enctype="multipart/form-data">
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
                            <input type="text" class="form-control" name="title" value="{{ $diary->title }}">
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-md-2">出発日</label>
                        <div class="col-md-10">
                            <input type="date" class="form-control" name="departure_date" value="{{ $diary->departure_date }}">
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-md-2">宿泊数</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="arrived_date" value="{{ $diary->arrived_date }}">
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-md-2">カテゴリ</label>
                        <div class="col-md-10">
                            <select class="form-select" name="category_id" value="{{ $diary->category_id }}">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-md-2">本文</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="text" rows="20">{{ $diary->text }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-md-2">画像</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="image">
                            <div class="form-text text-info">設定中：{{ $diary->image_path }}</div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="remove" value="true">画像を削除
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-10">
                            <input type="hidden" name="id" value="{{ $diary->id}}">
                            @csrf
                            <input type="submit" class="btn btn-primary" value="更新">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection