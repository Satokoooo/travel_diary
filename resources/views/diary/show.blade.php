@extends('layouts.app')
@section('title', '旅行記新規登録')

@section('content')
    <div class="container">
        <div>
            <div class="col-md-8 mx-auto">
                <h2 class="mb-2">{{ $diary->title }}<span class="badge bg-warning text-dark">{{ $diary->category }}</span></h2>
                <p class="mb-4">{{ $diary->departure_date }}～{{ $diary->arrived_date }}</p>
                <div class="mb-3 fs-5">{{ $diary->text }}</div>
                <div class="mb-5">{{ $diary->image_path }}</div>
                <img src="{{ asset('storage/image/' . $diary->image_path) }}">
            </div>
            <div class="col-md-8 mx-auto">
                <a href="{{ route('diary.edit',['id'=>$diary->id]) }}" class="btn btn-primary">日記を編集</a>
            </div>
        </div>
    </div>
@endsection