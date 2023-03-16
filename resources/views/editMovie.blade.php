@extends('layouts.app')

@section('content')
    <div>
        <h1>Edit Movie</h1>
        <form method="post" action="{{ route('movies.update') }}">
            @csrf
            <label for="movies">Movies</label>
            <select id="movies" name="movie">
                @foreach($movies as $movie)
                    <option value="{{$movie}}">{{$movie->name}}</option>
                @endforeach
            </select>
            <label for="name">New Name</label>
            <input type="text" name="name" id="name">
            <input type="submit" value="Submit">
        </form>
    </div>
@endsection
