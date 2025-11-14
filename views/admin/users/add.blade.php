@extends('layouts.admin')

@section('title', 'Admin Dashboard | Add user')

@section('content')
    <div class="container-fluid text-center">
        <form class="w-75 m-auto mt-5" action="/admin/users/add" method="POST">
            @if(isset($_GET["status"]) && $_GET["status"] == 1)
                <div class="pt-3 pb-3 text-center text-white bg-success w-100 h-auto">
                    <b>User created successfully</b>
                </div>
            @elseif(isset($_GET["error"]))
                @php
                    $error = intval($_GET["error"]);
                    $errorMessages = [
                        1 => "Username field is empty",
                        2 => "Username contains forbidden symbols (~!@#$%^&*()_+)",
                        3 => "Passwords field is empty",
                        4 => "Passwords does not match",
                        5 => "User exists"
                    ];
                    $errorMessage = $errorMessages[$error] ?? "Unknown error";
                @endphp
                <div class="pt-3 pb-3 text-center text-white bg-danger w-100 h-auto">
                    <b>{{ $errorMessage }}</b>
                </div>
            @endif
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" placeholder="Username" name="username" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" placeholder="Password" name="password" required>
            </div>
            <div class="mb-3">
                <label for="passwordConfirm" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="passwordConfirm" placeholder="Confirm Password"
                    name="passwordConfirm" required>
            </div>
            <button type="submit" class="btn btn-primary" name="register">Save</button>
        </form>
    </div>
@endsection