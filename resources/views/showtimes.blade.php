@extends('layouts.app')

@section('content')
    <h1>Showtimes</h1>
    @if(count($showtimes))
    <table>
        <thead>
            <tr>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Movie</th>
            </tr>
        </thead>
        <tbody>
            @foreach($showtimes as $showtime)
                <tr>
                    <td>{{$showtime->start_time}}</td>
                    <td>{{$showtime->end_time}}</td>
                    <td>{{$showtime->movie->name}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @endif
@endsection
