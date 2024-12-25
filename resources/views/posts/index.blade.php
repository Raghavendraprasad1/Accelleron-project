@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Posts</h1>

    <!-- Display Posts -->
    @foreach ($posts as $post)
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">{{ $post->title }}</h5>
                <p class="card-text">{{ $post->content }}</p>
                <p class="text-muted">By: {{ $post->user->name }} | {{ $post->created_at->format('M d, Y') }}</p>
            </div>
        </div>
    @endforeach

    <!-- Pagination Links -->
    <div class="d-flex justify-content-center mt-4">
        {{ $posts->links() }}
    </div>
</div>
@endsection
