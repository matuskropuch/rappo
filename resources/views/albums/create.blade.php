@extends('layouts.app')
@section('content')

<h1>Add an Album for {{ $rapper->nickname }}</h1>

<div class="panel panel-default">
    <div class="panel-body">
        <form action="{{ route('albums.store', $rapper->id) }}" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="form-group">
                <label for="name">Album name</label>
                <input type="text" id="name" name="name" class="form-control">
            </div>

            <div class="form-group">
                <label for="released_at">Release date</label>
                <input type="date" id="released_at" name="released_at" class="form-control">
            </div>

            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" id="image" name="image" class="form-control">
            </div>

            <div class="form-group">
                <label for="info">Information</label>
                <textarea id="info" name="info" rows="5" class="form-control"></textarea>
            </div>

            <div class="form-group">
                <button class="btn btn-primary pull-right">Save</button>
            </div>
        </form>
    </div>
</div>

@endsection
