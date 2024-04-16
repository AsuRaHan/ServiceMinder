@extends('main')

@section('title', 'Posts')

@section('content')
    <div class="container mt-5">

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            @foreach($posts as $post)
                @include("posts.item", ["post" => $post])
            @endforeach
        </div>
        <div class="card mt-5">
            <div class="card-body">
                {{ $posts->links() }}
            </div>
        </div>


    </div>
@endsection
