@extends('layouts.admin')

@section('title', 'Admin Dashboard | Edit post')

@section('content')
<div class="container-fluid text-center">
    <form class="w-75 m-auto mt-5" action="/admin/posts/{{ $post->id }}/edit" method="POST">
        <div class="mb-3">
            <label for="postName" class="form-label">Post name</label>
            <input type="text" class="form-control" id="postName" placeholder="Post title" name="postName" value="{{ $post->title }}" required>
        </div>
        <div class="mb-3">
            <select class="form-select" aria-label="Default select example" name="publishIt" required>
                <option>Publish it?</option>
                <option value="Y" {{ $post->published == 'Y' ? 'selected' : '' }}>Yes</option>
                <option value="N" {{ $post->published == 'N' ? 'selected' : '' }}>No</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="postBody" class="form-label">Post body</label>
            <textarea class="form-control" id="postBody" rows="3" name="postBody" required>{{ $post->body }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary" name="saveId" value="{{ $post->id }}">Save</button>
    </form>
</div>
@endsection

