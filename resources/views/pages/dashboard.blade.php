@extends('layouts.default')

@section('title', 'Dashboard')

@section('content')

<h2>Dashboard</h2>

    <a class="btn btn-primary" href="{{ route('form') }}">
        Create new request
    </a>
    <form id="form" action="{{ route('form') }}" method="POST">
	    {{ csrf_field() }}
    </form>

    <br>

    <p>Previous requests:</p>

    <br>

	<a class="btn btn-primary" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
	    Logout
	</a>

	<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
	    {{ csrf_field() }}
	</form>
@endsection
