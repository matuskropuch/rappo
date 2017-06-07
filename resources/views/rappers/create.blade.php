@extends('layouts.app')
@section('content')

@if($errors->count())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<h1>Add a Rapper</h1>

<div class="panel panel-default">
    <div class="panel-body">
        <form action="{{ route('rappers.store') }}" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="form-group">
                <label for="first_name">First name</label>
                <input type="text" id="first_name" name="first_name" class="form-control">
            </div>

            <div class="form-group">
                <label for="last_name">Last name</label>
                <input type="text" id="last_name" name="last_name" class="form-control">
            </div>

            <div class="form-group">
                <label for="nickname">Nickname</label>
                <input type="text" id="nickname" name="nickname" class="form-control">
            </div>

            <div class="form-group">
                <label for="born_at">Date of birth</label>
                <input type="date" id="born_at" name="born_at" class="form-control">
            </div>

            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" id="image" name="image" class="form-control">
            </div>

            <div class="form-group">
                <label for="bio">Biography</label>
                <textarea id="bio" name="bio" rows="5" class="form-control"></textarea>
            </div>

            <div class="form-group">
                <button class="btn btn-primary pull-right">Save</button>
            </div>
        </form>
    </div>
</div>
@endsection