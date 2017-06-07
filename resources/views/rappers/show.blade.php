@extends('layouts.app')
@section('content')

<h1>{{ $rapper->nickname }}</h1>
<div class="panel panel-default">
    <div class="panel-heading">Personal info</div>

    <div class="panel-body">
        <p>Full name: {{ $rapper->first_name }} {{ $rapper->last_name }}</p>
        @if(auth()->id == $rapper->created_by)
            <a class="btn btn-warning pull-left" href="{{ route('rappers.edit', $rapper->nickname) }}">Edit</a>
        @endif
        <a class="btn btn-danger pull-right">Delete</a>
    </div>

</div>

@endsection