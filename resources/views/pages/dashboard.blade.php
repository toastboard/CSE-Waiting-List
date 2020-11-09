@extends('layouts.default')

@section('title', 'Dashboard')

@section('content')

    <p>Dashboard</p>

    <a href="{{ route('form') }}">
        Create new request
    </a>
    <form id="form" action="{{ route('form') }}" method="POST">
	    {{ csrf_field() }}
    </form>

    <br><br>

    <p>Previous requests:</p>


    <br><br>
	<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
	    Logout
	</a>

	<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
	    {{ csrf_field() }}
	</form>
@endsection
