@extends('layouts.app')

@section('content')

<h1>Rappers</h1>

<div class="panel panel-default">
    <div class="panel-body">
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
                    <td>{{ $rapper->born_at }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<a href="{{ route('rappers.create') }}" class="btn btn-primary" role="button">Add a Rapper</a>

@endsection