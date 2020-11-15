@extends('layouts.default')

@section('title', 'Form Submission')

@section('content')
    {!! Form::open(['method' => 'post']) !!}
    <div class='form-group'>
        {{Form::label('studID', 'MSU ID: ')}}
        {{Form::text('studID', $msuid, ['readonly', 'class' => 'form-control'])}}
    </div>    <div class='form-group'>
        {{Form::label('studemail', 'Student email: ')}}
        {{Form::text('studemail', $email, ['readonly', 'class' => 'form-control'])}}
    </div>
    <div class='form-group'>
        {{Form::label('first_name', 'First Name: ')}}
        {{Form::text('first_name', $first_name, ['class' => 'form-control'])}}
        @error('first_name')
        <div class="alert-danger">{{$message}}</div>
        @enderror
    </div>
    <div class='form-group'>
        {{Form::label('last_name', 'Last Name: ')}}
        {{Form::text('last_name', $last_name, ['class' => 'form-control'])}}
        @error('last_name')
        <div class="alert-danger">{{$message}}</div>
        @enderror
    </div>
    <div class='form-group'>
        {{Form::label('studmajor', 'Major: ')}}
        {{Form::text('studmajor', $major, ['class' => 'form-control'])}}
        @error('studmajor')
        <div class="alert-danger">{{$message}}</div>
        @enderror
    </div>
    <div class='form-group'>
        {{Form::label('course_num', 'Course: ')}}
        {{Form::select('course_num', $courses, ['class' => 'form-control'])}}
    </div>
    <div class='form-group'>
        {{Form::label('overtype', 'Override type: ')}}
        {{Form::select('overtype', ['Major' => 'Major', 'Capacity' => 'Capacity', 'Prerequisite' => 'Prerequisite', 'Classification' => 'Classification', 'Repeat Limit' => 'Repeat Limit', 'College' => 'College'], ['class' => 'form-control'])}}
        @error('overtype')
        <div class="alert-danger">{{$message}}</div>
        @enderror
    </div>
    <div class='form-group'>
        {{Form::label('campus', 'Campus: ')}}
        {{Form::select('campus', ['Starkville' => 'Starkville', 'Gulf Coast' => 'Gulf Coast', 'Distance' => 'Distance'], ['class' => 'form-control'])}}
        @error('campus')
        <div class="alert-danger">{{$message}}</div>
        @enderror
    </div>
    <div class="form-group  ">
        {{Form::label('graddate[]', 'Expected Graduation Date:')}}
        {{Form::select('graddate[0]', ['Spring' => 'Spring', 'Fall' => 'Fall', 'Summer' => 'Summer'], ['class' => 'form-control'])}}
        {{Form::text('graddate[1]', $curryear, ['class' => 'form-control'])}}
        @error('graddate.1')
        <div class="alert-danger">{{$message}}</div>
        @enderror
    </div>
    <div class='form-group'>
        {{Form::label('currhours', 'Current Hours: ')}}
        {{Form::text('currhours', '', ['class' => 'form-control'])}}
        @error('currhours')
        <div class="alert-danger">{{$message}}</div>
        @enderror
    </div>
    <div class='form-group'>
        {{Form::label('requiredforgrad', 'Required for Graduation: ')}}
        <br>Yes{{Form::radio('requiredforgrad', 'Yes', false, ['class' => 'form-control'])}}
        No{{Form::radio('requiredforgrad', 'No', false, ['class' => 'form-control'])}}
        @error('requiredforgrad')
        <div class="alert-danger">{{$message}}</div>
        @enderror
    </div>
    <div class='form-group'>
        {{Form::label('comments', 'Comments: ')}}
        {{Form::text('comments', '', ['class' => 'form-control'])}}
        @error('comments')
        <div class="alert-danger">{{$message}}</div>
        @enderror
    </div>
    {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}

    <br>

    <a class="btn btn-primary" href="{{ route('dashboard') }}">
	    Return to Dashboard
	</a>

	<form id="dashboard-form" action="{{ route('dashboard') }}" method="POST" style="display: none;">
	    {{ csrf_field() }}
    </form>

    <br>

	<a class="btn btn-primary" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
	    Logout
	</a>

	<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
	    {{ csrf_field() }}
	</form>
@endsection
