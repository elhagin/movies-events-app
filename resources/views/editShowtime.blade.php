@extends('layouts.app')

@section('content')
    <div>
        <h1>Edit Showtime</h1>
        <form method="post" action="{{ route('showtimes.update') }}">
            @csrf
            <label for="showtimes">Showtimes</label>
            <select id="showtimes" name="showtime_id">
                @foreach($showtimes as $showtime)
                    <option value="{{$showtime['id']}}">{{$showtime['toString']}}</option>
                @endforeach
            </select>
            <br>
            <h3>New Values</h3>
            <label for="start_time">Start Time</label>
            <input type="time" name="start_time" id="start_time">
            <label for="end_time">End Time</label>
            <input type="time" name="end_time" id="end_time">
            <label for="movies">Movie</label>
            <select id="movies" name="movie_id">
                @foreach($movies as $movie)
                    <option value="{{$movie->id}}">{{$movie->name}}</option>
                @endforeach
            </select>
            <input type="submit" value="Submit">
        </form>
    </div>
@endsection
