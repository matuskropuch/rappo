@extends('layouts.app')
@section('content')

<h1>Edit an Album</h1>

<div class="panel panel-default">
    <div class="panel-body">
        <form action="{{ route('albums.update', $album) }}" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="form-group">
                <label for="name">Album name</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ $album->name }}">
            </div>

            <div class="form-group">
                <label for="rapper_id">Artist</label>
                <select id="rapper_id" name="rapper_id" class="form-control">
                    @foreach($rappers as $rapper)
                    <option value="{{ $rapper->id }}">{{ $rapper->nickname }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="released_at">Release date</label>
                <input type="date" id="released_at" name="released_at" class="form-control">
            </div>

            <div class="form-group">
                <label for="info">Information</label>
                <textarea id="info" name="info" rows="5" class="form-control">{{ $album->info }}</textarea>
            </div>

            <div class="form-group">
                <button class="btn btn-primary pull-right">Save</button>
            </div>
        </form>
    </div>
</div>

@endsection
