@extends('layouts.default')

@section('title', 'Success')

@section('content')

Success, you have created an {{ $overtype }} override request for the course {{ $course_num }} at {{ $campus }}.

<div>
Comments:
{{ $comments }}
</div>

<a href="{{url('/form')}}">Return to Form Page</a>

@endsection