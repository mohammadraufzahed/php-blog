@extends('layouts.admin')

@section('title', 'Admin Dashboard | Add new post')

@section('content')
<div class="container-fluid text-center">
    <form class="w-75 m-auto mt-5" action="/admin/posts/new" method="POST">
        <div class="mb-3">
            <label for="postName" class="form-label">Post name</label>
            <input type="text" class="form-control" id="postName" placeholder="Post title" name="postName" required>
        </div>
        <div class="mb-3">
            <select class="form-select" aria-label="Default select example" name="publishIt" required>
                <option selected>Publish it?</option>
                <option value="Y">Yes</option>
                <option value="N">No</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="postBody" class="form-label">Post body</label>
            <textarea class="form-control" id="postBody" rows="3" name="postBody" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary" name="save">Save</button>
    </form>
</div>
@endsection

