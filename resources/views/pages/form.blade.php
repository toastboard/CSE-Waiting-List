@extends('layouts.default')

@section('title', 'Form Submission')

@section('content')
    {!! Form::open(['method' => 'post']) !!}
    <div class='form_group'>
        {{Form::label('first_name', 'First Name')}}
        {{Form::text('first_name', '', ['class' => 'form-control'])}}
    </div>
    {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection