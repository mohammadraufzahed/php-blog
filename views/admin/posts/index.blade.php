@extends('layouts.admin')

@section('title', 'Admin Dashboard | Posts')

@section('content')
<div class="container-fluid text-center">
    <div class="d-flex w-100 justify-content-end">
        <a href="/admin/posts/new">
            <button class="btn btn-primary mt-3 mb-3">Add Post</button>
        </a>
    </div>
    @if(isset($_GET["newPostStatus"]))
        @php
            $errorCode = $_GET["newPostStatus"];
            $errorType = "newPost";
        @endphp
        @include('admin.partials.post-message', ['errorType' => $errorType, 'errorCode' => $errorCode])
    @elseif(isset($_GET["deletePostStatus"]))
        @php
            $errorCode = $_GET["deletePostStatus"];
            $errorType = "deletePost";
        @endphp
        @include('admin.partials.post-message', ['errorType' => $errorType, 'errorCode' => $errorCode])
    @elseif(isset($_GET["updatePostStatus"]))
        @php
            $errorCode = $_GET["updatePostStatus"];
            $errorType = "updatePost";
        @endphp
        @include('admin.partials.post-message', ['errorType' => $errorType, 'errorCode' => $errorCode])
    @endif
    <table class="table">
        <thead>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Options</th>
        </thead>
        <tbody>
            @foreach($posts as $post)
                <tr>
                    <th scope="row">{{ $post->id }}</th>
                    <td>{{ $post->title }}</td>
                    <td>
                        <a href="/admin/posts/{{ $post->id }}/edit">
                            <button class="btn btn-success me-3">Edit</button>
                        </a>
                        <a href="/post/{{ $post->id }}" target="_blank">
                            <button class="btn btn-primary me-3">View</button>
                        </a>
                        <form method="POST" action="/admin/posts/{{ $post->id }}/delete" style="display: inline;">
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

