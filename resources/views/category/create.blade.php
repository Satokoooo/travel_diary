@extends('layouts.app')
@section('title', 'カテゴリ管理')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2 class="mb-5">カテゴリ管理</h2>
                <form action="{{ action('App\Http\Controllers\CategoryController@index') }}" method="POST" enctype="multipart/form-data">
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <label>新規カテゴリ</label>
                    <div class="form-group row mb-5">
                        <div class="col-md-10">
                            <input type="category" class="form-control" name="category" value="{{ old('category') }}">
                        </div>
                        <input type="submit" class="btn btn-primary col-md-2" value="登録">
                    </div>
                    @csrf
                </form>
            </div>
            <div class="list-diary col-md-8 mx-auto">
                <div class="row">
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th width="70%">カテゴリ一覧</th>
                                <th width="15%"></th>
                                <th width="15%"></th>
                            </tr>
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td><a>詳細</a></td>
                                    <td><a>削除</a></td>
                                </tr>
                                
                            </tbody>
                        </thead>
                    </table>
                </div>
        </div>
    </div>
@endsection