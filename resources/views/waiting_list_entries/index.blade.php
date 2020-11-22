@extends('layouts.default')

@section('content')
    <h1>Your Entries</h1>
    @if(count($entries) > 0)
        @foreach($entries as $entry)
            <div class="card bg-light p-3">
                <div class="card-body">
                    <h3 class="card-title"><a href="/entries/{{$entry->list}}">{{$entry->type}} override for {{$entry->course_selection}}</a></h3>
                    <small>Created on {{$entry->created_at}}</small>
                </div>
            </div>
        @endforeach
    @else
        <p>No entries were found.</p>
    @endif

    <br>

    <a class="btn btn-primary" href="{{ route('dashboard') }}">
        Return to Dashboard
    </a>

    <form id="dashboard-form" action="{{ route('dashboard') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
    </form>
@endsection