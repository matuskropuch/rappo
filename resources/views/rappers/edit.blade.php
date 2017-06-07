@extends('layouts.app')

@section('content')

<h1>Editing Rapper</h1>

<div class="panel panel-default">
    <div class="panel-body">
        <form action="{{ route('rappers.update', $rapper->id) }}" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="form-group">
                <label for="first_name">First name</label>
                <input type="text" id="first_name" name="first_name" class="form-control" value="{{ $rapper->first_name }}">
            </div>

            <div class="form-group">
                <label for="last_name">Last name</label>
                <input type="text" id="last_name" name="last_name" class="form-control" value="{{ $rapper->last_name }}">
            </div>

            <div class="form-group">
                <label for="nickname">Nickname</label>
                <input type="text" id="nickname" name="nickname" class="form-control" value="{{ $rapper->nickname }}">
            </div>

            <div class="form-group">
                <label for="born_at">Date of birth</label>
                <input type="date" id="born_at" name="born_at" class="form-control" value="{{ $rapper->born_at }}">
            </div>

            <div class="form-group">
                <button class="btn btn-primary pull-right">Save</button>
            </div>
        </form>
    </div>
</div>

@endsection