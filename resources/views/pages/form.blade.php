@extends('layouts.default')

@section('title', 'Form Submission')

@section('content')
    {!! Form::open(['method' => 'post']) !!}
    <div class='form_group'>
        {{Form::label('first_name', 'First Name')}}
        {{Form::text('first_name', '', ['class' => 'form-control'])}}
    </div>
    <div class='form_group'>
        {{Form::label('last_name', 'Last Name')}}
        {{Form::text('last_name', '', ['class' => 'form-control'])}}
    </div>
    <div class='form_group'>
        {{Form::label('student_ID', 'MSU ID')}}
        {{Form::text('student_ID', '', ['class' => 'form-control'])}}
    </div>
    <div class='form_group'>
        {{Form::label('course_num', 'Course')}}
        {{Form::text('course_num', '', ['class' => 'form-control'])}}
    </div>
    <div class='form_group'>
        {{Form::label('section_num', 'Section')}}
        {{Form::text('section_num', '', ['class' => 'form-control'])}}
    </div>
    {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection