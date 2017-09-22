@extends('layouts.app')
@section('content')

<h1>Albums</h1>

<div class="panel panel-default">
    <table class="table table-stripped">
        <thead>
            <th>Album name</th>
            <th>Artist</th>
            <th>Released date</th>
        </thead>
        <tbody>
            @foreach($albums as $album)
            <tr>
                <td><a href="{{ route('albums.show', $album->id) }}">{{ $album->name }}</a></td>
                <td>{{ $album->artist->nickname }}</td>
                <td>{{ $album->release_date }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<a href="{{ route('albums.create') }}" class="btn btn-primary" role="button">Add an Album</a>

@endsection