@extends('layouts.app')
@section('title', 'カテゴリ管理')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2 class="mb-5">カテゴリ管理</h2>
                <form action="{{ route('category.create') }}" method="POST" enctype="multipart/form-data">
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
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                        </div>
                        <input type="submit" class="btn btn-primary col-md-2" value="登録">
                    </div>
                    @csrf
                </form>
            </div>
            <div class="list-diary col-md-8 mx-auto">
                <div id="app">
                    <modal></modal>
                </div>
        </div>
    </div>
    <!--<script src="https://www.promisejs.org/polyfills/promise-7.0.4.min.js"></script>-->
    <!--<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.min.js"></script>
@endsection