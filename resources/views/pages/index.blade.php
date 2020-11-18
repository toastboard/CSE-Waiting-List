@extends('layouts.default')

@section('content')

    <div class="jumbotron text-center">
        <h1>{{$title}}</h1>
        <p>Choose to login or register</p>
        <p><a class="btn btn-primary btn-lg" href="/login" role="button">Login</a><p><a class="btn btn-primary btn-lg" href="/register" role="button">Register</a>
@endsection
