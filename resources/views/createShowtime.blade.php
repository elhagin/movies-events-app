@extends('layouts.app')

@section('content')
    <div>
        <h1>Create Showtime</h1>
        <form method="post" action="{{ route('showtimes.store') }}">
            @csrf
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
