@extends('main')

@section('title', $post->title)

@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header text-center">{{ $post->title }}</div>
            <img src="{{ $post->thumbnail }}" class="card-img-top" alt="...">
            <div class="card-body">
                <p class="card-text">{{ $post->content }}</p>
            </div>
        </div>
    </div>
@endsection
