@extends('layouts.app')

@section('content')
    <div>
        <h1>Delete Showtime</h1>
        <form method="post" action="{{ route('showtimes.destroy') }}">
            @csrf
            <label for="showtimes">Showtimes</label>
            <select id="showtimes" name="showtime_id">
                @foreach($showtimes as $showtime)
                    <option value="{{$showtime['id']}}">{{$showtime['toString']}}</option>
                @endforeach
            </select>
            <input type="submit" value="Delete">
        </form>
    </div>
@endsection
