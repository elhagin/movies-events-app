@extends('layouts.app')

@section('content')
    <div>
        <h1>Delete Movie</h1>
        <form method="post" action="{{ route('movies.destroy') }}">
            @csrf
            <label for="movies">Movies</label>
            <select id="movies" name="movie">
                @foreach($movies as $movie)
                    <option value="{{$movie}}">{{$movie->name}}</option>
                @endforeach
            </select>
            <input type="submit" value="Delete">
        </form>
    </div>
@endsection
