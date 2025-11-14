@extends('layouts.app')

@section('title', $blog->blogTitle)

@section('content')
<!--Body start-->
<div class="container-fluid h-100">
    <div class="row h-100 mt-2">
        <div class="col-lg-8">
            @if(count($publishedPosts) > 0)
                @foreach($publishedPosts as $post)
                    @include('partials.post-card', ['post' => $post])
                @endforeach
            @else
                <p class="text-center">No posts available.</p>
            @endif
        </div>
        <!--Right-->
        <div class="col-lg-4">
            <div class="h-auto w-100">
                <div class="card bg-dark text-white mb-3">
                    <img class="card-img-top" src="/static/img/profile.jpg" alt="Profile Image">
                    <div class="card-body text-center">
                        <h5 class="card-title">{{ $blog->blogAuthor }}</h5>
                        <p class="card-text">{{ $blog->blogAuthorInfo }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Body end-->
@endsection

