@extends('layouts.app')
@section('title', '記事詳細')

@section('content')
    <div class="container">
        <div>
            <div class="col-md-8 mx-auto mb-5">
                <h2 class="mb-2">{{ $diary->title }} <span class="badge bg-warning text-dark ml-2">{{ $diary->category->name }}</span></h2>
                <p class="mb-4">{{ $diary->departure_date }}～{{ $diary->arrived_date }}</p>
                <div class="mb-3 fs-5">{{ $diary->text }}</div>
                <!--<div class="mb-5">{{ $diary->image_path }}</div>-->
                <img src="{{ asset('image/' . $diary->image_path) }}">
            </div>
            <div class="col-md-8 mx-auto d-md-flex">
                <div class="mb-3 me-md-2">
                    <a href="{{ route('diary.edit',['id'=>$diary->id]) }}" class="btn btn-primary">日記を編集</a>
                </div>
                <form onsubmit="return confirm('本当に削除してよろしいですか？')" action="{{ route('diary.delete', ['id' =>$diary->id]) }}" method="POST">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-outline-secondary">日記を削除</button>
                </form>
            </div>
        </div>
    </div>
@endsection