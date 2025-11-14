@extends('layouts.admin')

@section('title', 'Admin Dashboard')

@section('content')
<div class="container-fluid text-center">
    <h1>Dashboard</h1>
    <table class="table table-dark table-striped w-25 m-auto text-start">
        <tr>
            <th>Total Posts:</th>
            <td>{{ $totalPosts }}</td>
        </tr>
        <tr>
            <th>Total Users:</th>
            <td>{{ $totalUsers }}</td>
        </tr>
        <tr>
            <th>Total Views:</th>
            <td>100</td>
        </tr>
    </table>
</div>
@endsection

