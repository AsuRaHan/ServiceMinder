<div class="col">
    <div class="card shadow-sm">
        <img src="{{ $post->thumbnail }}" class="card-img-top" alt="{{ $post->title }}">
        <div class="card-body">
            <p class="card-text">{!! $post->content !!}</p>
            <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                    <a href="{{ route("posts.show", $post->id) }}" type="button" class="btn btn-sm btn-outline-secondary">View</a>
                    <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                </div>
                <small class="text-body-secondary">{{ $post->created_at }}</small>
            </div>
        </div>
    </div>
</div>
