@extends('layouts.app')
@section('title', '旅行記一覧')

@section('content')
    <div class="container">
        <h2 class="mb-3">旅行記一覧</h2>
        <div class="col-md-10 mb-3">
            <form action="{{ route('diary.index') }}" method="get">
                 @csrf
                <div class="form-group col-md-10 mb-2">
                    <input type="text" class="form-control" name="cond_title" value="{{$cond_title}}" placeholder="タイトル検索">
                </div>
                <div class="row mb-5">
                    <div class="col-md-5 mb-2">
                        <select class="form-select" name="category" value="{{ $category }}" data-toggle="select">
                            <option value="">全てのカテゴリ</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-5 mb-2">
                        <input type="date" class="form-control" name="departure_date" value="{{ $departure_date }}" placeholder="出発日">
                    </div>
                    <div class="col-md-2">
                        @csrf
                        <input type="submit" class="btn btn-secondary" value="絞り込み検索">
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-6 mb-2">
            <a href="{{ route('diary.add') }}" role="button" class="btn btn-primary">新規作成</a>
        </div>
        <div class="row">
            <div class="list-diary col-md-12 mx-auto">
                <div class="row">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th width="30%">@sortablelink('title', 'タイトル')</th>
                                <th width="25%">@sortablelink('departure_date', '出発日')</th>
                                <th width="30%">カテゴリ</th>
                                <th width="15%">詳細</th>
                            </tr>
                            <tbody>
                                @foreach($posts as $diary)
                                <tr>
                                    <td>{{ Str::limit($diary->title, 20) }}</td>
                                    <td>{{ ($diary->departure_date)}}</td>
                                    <td>{{ Str::limit($diary->category->name, 10) }}</td>
                                    <td><a href="{{ route('diary.show', ['id'=>$diary->id]) }}" class="btn btn-warning btn-sm">詳細</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection