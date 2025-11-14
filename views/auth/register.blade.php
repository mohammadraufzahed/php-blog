@extends('layouts.app')

@section('title', 'Register')

@section('content')
<div class="container-fluid">
    <div class="row mt-4">
        <div class="col-lg-4 m-auto">
            <div class="card bg-dark text-white text-center w-75 h-auto m-auto">
                <img src="/static/img/login.jpg" alt="Login picture" class="card-img-top img-fluid">
                <div class="card-body">
                    <h5 class="card-title">Register</h5>
                    <div class="card-text">
                        @if(isset($_GET["error"]))
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
                        <form class="text-start" action="/register" method="POST">
                            <div class="mb-1">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" id="username" name="username"
                                       aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>
                            <div class="mb-3">
                                <label for="passwordConfirm" class="form-label">Confirm password</label>
                                <input type="password" class="form-control" id="passwordConfirm" name="passwordConfirm">
                            </div>
                            <div class="text-center pt-1">
                                <button type="submit" class="btn btn-light" name="register">Register</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

