@extends('layouts.app')

@section('title', $post->title ?? 'Post')

@section('content')
<div class="container-fluid">
    <div class="row h-100">
        <div class="col-lg-8 m-auto mt-4 mb-4">
            <div class="posts bg-dark text-white text-center h-auto mb-3">
                <img class="img-fluid post-image-page" src="/static/img/post.jpg" alt="Post image">
                <h3 class="post-title pt-3">{{ $post->title }}</h3>
                <p class="pt-3 pb-3 post-text-page text-start m-auto">{{ $post->body }}</p>
            </div>
        </div>
    </div>
</div>
@endsection

