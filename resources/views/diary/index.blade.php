@extends('layouts.app')
@section('title', '旅行記一覧')

@section('content')
    <div class="container">
        <div class="row">
            <h2>旅行記一覧</h2>
        </div>
        <div class="row">
            <div class="col-md-6">
                <a href="{{ action('App\Http\Controllers\DiaryController@add') }}" role="button" class="btn btn-primary">新規作成</a>
            </div>
            <div class="col-md-6">
                <form action="{{ action('App\Http\Controllers\DiaryController@index') }}" method="get">
                    <div class="form-group row">
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="cond_title" value="{{$cond_title}}" placeholder="タイトル検索">
                        </div>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="cond_title" value="{{$cond_title}}" placeholder="カテゴリ">
                        </div>
                        <div class="col-md-10">
                            <input type="date" class="form-control" name="cond_title" value="{{$cond_title}}" placeholder="出発日">
                        </div>
                        <div class="col-md-2">
                            @csrf
                            <input type="submit" class="btn btn-primary" value="検索">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="list-diary col-md-12 mx-auto">
                <div class="row">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th width="30%">タイトル</th>
                                <th width="25%">出発日</th>
                                <th width="30%">カテゴリ</th>
                                <th width="15%">詳細</th>
                            </tr>
                            <tbody>
                                @foreach($posts as $diary)
                                <tr>
                                    <td>{{ Str::limit($diary->title, 100) }}</td>
                                    <td>{{ ($diary->departure_date)}}</td>
                                    <td>{{ Str::limit($diary->category, 100) }}</td>
                                    <td><a href="{{ route('diary.show', ['id'=>$diary->id]) }}" class="btn btn-primary">詳細</a></td>
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