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
            <img src="{{ URL::to('/storage') }}/{{ $rapper->image }}" class="img-responsive img-thumbnail center-block" alt="Image of {{ $rapper->nickname }}">
        </div>
        @if(auth()->id() == $rapper->created_by)
        <div class="col-md-12">
            <a class="btn btn-warning pull-left" href="{{ route('rappers.edit', $rapper->nickname) }}">Edit</a>
        </div>
        @endif
    </div>
</div>

@if($rapper->albums->count())
<div class="panel panel-default">
    <div class="panel-heading">Albums</div>

    <div class="panel-body">
        <table class="table table-stripped">
        <thead>
            <th>Album name</th>
            <th>Artist</th>
            <th>Released date</th>
        </thead>
        <tbody>
            @foreach($rapper->albums as $album)
            <tr>
                <td><a href="{{ route('albums.show', $album->id) }}">{{ $album->name }}</a></td>
                <td>{{ $album->artist_name->nickname }}</td>
                <td>{{ $album->release_date }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
</div>
@endif

<a class="btn btn-default pull-left" href="{{ route('albums.create', $rapper->id) }}">Add an album</a>

@endsection