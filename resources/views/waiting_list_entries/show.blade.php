@extends('layouts.default')

@section('content')
    @if(Auth::user()->msuid == $entry->msuid)
        <h1>{{$entry->type}} override for {{$entry->course_selection}}</h1>
        <h4>First Name: {!!$entry->first_name!!}</h4>
        <h4>Last Name: {!!$entry->last_name!!}</h4>
        <h4>Major: {!!$entry->major!!}</h4>
        <h4>Campus: {!!$entry->campus!!}</h4>
        <h4>Required: {!!$entry->is_required!!}</h4>
        <h4>Comments: {!!$entry->comments!!}</h4>
    @else
        <div class='alert alert-danger'>
            You do not have permission to view this entry.
        </div>
    @endif
    
    <a class="btn btn-primary" href="/entries">
	    Return to Entries List
	</a>

	<form id="entries-form" action="/entries" method="POST" style="display: none;">
	    {{ csrf_field() }}
    </form>
@endsection