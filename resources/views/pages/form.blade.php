@extends('layouts.default')

@section('title', 'Form Submission')

@section('content')
    {!! Form::open(['method' => 'post']) !!}
    <div class='form_group'>
        {{Form::label('studID', 'MSU ID: ')}}
        {{Form::text('studID', $msuid, ['readonly', 'class' => 'form-control'])}}
    </div>    <div class='form_group'>
        {{Form::label('studemail', 'Student email: ')}}
        {{Form::text('studemail', $email, ['readonly', 'class' => 'form-control'])}}
    </div>
    <div class='form_group'>
        {{Form::label('first_name', 'First Name: ')}}
        {{Form::text('first_name', $first_name, ['class' => 'form-control'])}}
    </div>
    <div class='form_group'>
        {{Form::label('last_name', 'Last Name: ')}}
        {{Form::text('last_name', $last_name, ['class' => 'form-control'])}}
    </div>
    <div class='form_group'>
        {{Form::label('studmajor', 'Major: ')}}
        {{Form::text('studmajor', $major, ['class' => 'form-control'])}}
    </div>
    <div class='form_group'>
        {{Form::label('course_num', 'Course: ')}}
        {{Form::select('course_num', $courses, ['class' => 'form-control'])}}
    </div>
    <div class='form_group'>
        {{Form::label('overtype', 'Override type: ')}}
        {{Form::select('overtype', ['Major' => 'Major', 'Capacity' => 'Capacity', 'Prerequisite' => 'Prerequisite'], ['class' => 'form-control'])}}
    </div>
    <div class='form_group'>
        {{Form::label('campus', 'Campus: ')}}
        {{Form::select('campus', ['Starkville' => 'Starkville', 'Gulf Coast' => 'Gulf Coast', 'Distance' => 'Distance'], ['class' => 'form-control'])}}
    </div>
    <div class='form_group'>
        {{Form::label('currhours', 'Current Hours: ')}}
        {{Form::number('currhours', '', ['class' => 'form-control'])}}
    </div>
    <div class='form_group'>
        {{Form::label('requiredforgrad', 'Required for Graduation: ')}}
        Yes {{Form::radio('requiredforgrad', 'Yes', false, ['class' => 'form-control'])}}
        No  {{Form::radio('requiredforgrad', 'No', false, ['class' => 'form-control'])}}
    </div>
    <div class='form_group'>
        {{Form::label('comments', 'Comments: ')}}
        {{Form::text('comments', '', ['class' => 'form-control'])}}
    </div>
    {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}

	<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
	    Logout
	</a>

	<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
	    {{ csrf_field() }}
	</form>
@endsection