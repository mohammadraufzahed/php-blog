@extends('layouts.admin')

@section('title', 'Admin Dashboard | Users')

@section('content')
<div class="container-fluid text-center">
    <div class="d-flex justify-content-end w-100 mt-3">
        <a href="/admin/users/add">
            <button class="btn btn-success">Add user</button>
        </a>
    </div>
    @if(isset($_GET["deleteStatus"]))
        @php
            $deleteStatus = $_GET["deleteStatus"];
        @endphp
        <div class="pt-3 pb-3 text-center text-white bg-{{ $deleteStatus == 1 ? 'success' : 'danger' }} w-100 h-auto">
            <p>{{ $deleteStatus == 1 ? 'User deleted successfully' : 'Something goes wrong' }}</p>
        </div>
    @endif
    <table class="table">
        <thead>
            <th scope="col">ID</th>
            <th scope="col">Username</th>
            <th scope="col">Email</th>
            <th scope="col">Options</th>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <th scope="row">{{ $user->id }}</th>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <a href="#">
                            <button class="btn btn-success me-3">Edit</button>
                        </a>
                        <form method="POST" action="/admin/users/{{ $user->id }}/delete" style="display: inline;">
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

