@extends('layouts.default')

@section('title', 'Form Submission')

@section('content')
    {!! Form::open(['method' => 'post']) !!}
    <div class='form_group'>
        {{Form::label('first_name', 'First Name')}}
        {{Form::text('first_name', '', ['class' => 'form-control'])}}
        
        {{Form::label('last_name', 'Last Name')}}
        {{Form::text('last_name', '', ['class' => 'form-control'])}}

        {{Form::label('student_ID', 'Last Name')}}
        {{Form::text('student_ID', '', ['class' => 'form-control'])}}
        
        {{Form::label('netID', 'Last Name')}}
        {{Form::text('netID', '', ['class' => 'form-control'])}}
        
        {{Form::label('course_num', 'Last Name')}}
        {{Form::text('course_num', '', ['class' => 'form-control'])}}
        
        {{Form::label('section_num', 'Last Name')}}
        {{Form::text('section_num', '', ['class' => 'form-control'])}}
    </div>
    {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection