@extends('layouts.app')

@section('content')
<div class="col-sm-12">
    <h2>
        All films by character: {{ $name }}
    </h2>
    <table class="table">
        <thead>
            <tr>
                <th>Film name</th>
                <th>Director</th>
                <th>Release date</th>
                <th>Info</th>
            </tr>
        </thead>
        <tbody>
            @foreach($films as $film)
            <tr>
                <td>{{ $film['title'] }}</td>
                <td>{{ $film['director'] }}</td>
                <td>{{ date("d.m.Y", strtotime($film['release_date'])) }}</td>
                <td><a href="{{ $film['film_url'] }}">Film information</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div> 

@endsection

