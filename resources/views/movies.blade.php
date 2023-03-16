@extends('layouts.app')

@section('content')
    <h1>Movies</h1>
    @if(count($movies))
        @foreach($movies as $movie)
            <li>{{$movie->name}}</li>
        @endforeach
    @endif
@endsection
