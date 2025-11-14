@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="container-fluid">
    <div class="row mt-4">
        <div class="col-lg-4 m-auto">
            <div class="card bg-dark text-white text-center h-auto m-auto">
                <img src="/static/img/login.jpg" alt="Login picture" class="card-img-top img-fluid">
                <div class="card-body">
                    <h5 class="card-title">Login</h5>
                    <p class="card-text">
                        <form class="text-start" action="/login" method="POST">
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" id="username" name="username"
                                       aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-light" name="login">Login</button>
                            </div>
                        </form>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

