@extends('layouts.app')
@section('content')

<h1>{{ $rapper->nickname }} <small>{{ $rapper->first_name }} {{ $rapper->last_name }}</small></h1>
<div class="panel panel-default">
    <div class="panel-heading">Personal info</div>

    <div class="panel-body">
        <div class="col-md-8">
            <p>{{ $rapper->bio }}</p>
        </div>
        <div class="col-md-4">
            <img src="{{ $rapper->image }}" class="img-responsive img-thumbnail center-block" alt="Image of {{ $rapper->nickname }}">
        </div>
        @if(auth()->id() == $rapper->created_by)
            <a class="btn btn-warning pull-left" href="{{ route('rappers.edit', $rapper->nickname) }}">Edit</a>
        @endif
    </div>
</div>

@endsection