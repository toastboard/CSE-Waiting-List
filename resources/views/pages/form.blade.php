@extends('layouts.default')

@section('title', "Success")

@section('content')

<h3>This is the form page and will appear if a user is logged in </h3>

<h3>The user's id is {{ Auth::user()->id }} (pulled from database)</h3>

<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
    Logout
</a>

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    {{ csrf_field() }}
</form>

@endsection
