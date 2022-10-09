@extends('layouts.app')
@section('title', '旅行記一覧')

@section('content')
    <div class="container">
        <div class="row">
            <h2>旅行記一覧</h2>
        </div>
        <div class="row">
            <div class="col-md-4">
                <a href="{{action('App\Http\Controllers\DiaryController@add')}}" role="button" class="btn btn-primary">新規作成</a>
            </div>
            <div class="col-md-8">
                <form action="{{('App\Http\Controllers\DiaryController@index')}}" method="get">
                    <div class="form-group row">
                        <label class="col-md-2">タイトル</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="cond_title" value="{{$cond_title}}">
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
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th width="20%">タイトル</th>
                                <th width="30%">期間</th>
                            </tr>
                            <tbody>
                                @foreach($posts as $diary)
                                <tr>
                                    <td>{{ Str::limit($diary->title, 100) }}</td>
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