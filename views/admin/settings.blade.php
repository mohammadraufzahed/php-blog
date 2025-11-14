@extends('layouts.admin')

@section('title', 'Admin Dashboard | Settings')

@section('content')
<div class="container-fluid text-center">
    <form class="w-50 m-auto mt-5" action="/admin/settings" method="POST">
        @if(isset($_GET["updateStatus"]))
            @php
                $updateStatus = $_GET["updateStatus"];
            @endphp
            <div class="pt-3 pb-3 text-center text-white bg-{{ $updateStatus == 1 ? 'success' : 'danger' }} w-100 h-auto">
                <p>{{ $updateStatus == 1 ? 'Settings updated successfully' : 'Something goes wrong' }}</p>
            </div>
        @endif
        <div class="mb-3">
            <label for="blogName" class="form-label">Blog name</label>
            <input type="text" class="form-control" id="blogName" value="{{ $settings->blogTitle }}" name="blogName" required>
        </div>
        <div class="mb-3">
            <label for="authorName" class="form-label">Author name</label>
            <input type="text" class="form-control" id="authorName" value="{{ $settings->blogAuthor }}" name="authorName" required>
        </div>
        <div class="mb-3">
            <label for="authorInfo" class="form-label">Author info</label>
            <textarea class="form-control" id="authorInfo" rows="3" name="authorInfo" required>{{ $settings->blogAuthorInfo }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary" name="update">Save</button>
    </form>
</div>
@endsection

