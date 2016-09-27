@extends('layouts.app')

@section('content')
<h1>Rappers</h1>
<table class="table table-stripped">
    <thead>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Nickname</th>
        <th>Date of birth</th>
    </thead>
    <tbody>
        @foreach($rappers as $rapper)
        <tr>
            <td><a href="{{ route('rappers.show', $rapper->nickname) }}">{{ $rapper->first_name }}</a></td>
            <td>{{ $rapper->last_name }}</td>
            <td>{{ $rapper->nickname }}</td>
            <td>{{ $rapper->date_of_birth }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

<a href="{{ route('rappers.create') }}" class="btn btn-primary" role="button">Add a Rapper</a>
@endsection