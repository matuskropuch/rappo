@extends('layouts.app')
@section('content')

<h1>{{ $album->name }}</h1>
<div class="panel panel-default">
    <div class="panel-heading">Album info</div>

    <div class="panel-body">
        <div class="col-md-8">
            <p>{{ $album->info }}</p>
        </div>
        <div class="col-md-4">
            <img src="{{ URL::to('/storage') }}/{{ $album->image }}" class="img-responsive img-thumbnail center-block" alt="Image of album {{ $album->name }} by {{ $album->rapper->nickname }}">
        </div>
        @if(auth()->id() == $album->created_by)
        <div class="col-md-12">
            <a class="btn btn-warning pull-left" href="{{ route('albums.edit', $album->id) }}">Edit</a>
        </div>
        @endif
    </div>
</div>

@endsection
