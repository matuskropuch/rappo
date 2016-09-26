@extends('layouts.app')

@section('content')
<h1>Add a Rapper</h1>

<div>
    <form action="{{ route('rappers.store') }}" method="post">
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
            <label for="date_of_birth">Date of birth</label>
            <input type="date" id="date_of_birth" name="date_of_birth" class="form-control">
        </div>

        <div class="form-group">
            <button class="btn btn-primary pull-right">Uložiť</button>
        </div>
    </form>
</div>
@endsection