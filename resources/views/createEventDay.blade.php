@extends('layouts.app')

@section('content')
    <div>
        <h1>Create Event Day</h1>
        <form method="post" action="{{ route('eventDays.store') }}">
            @csrf
            <label for="day">Day</label>
            <input type="date" name="day" id="day">
            <label for="showtimes1">Showtime 1</label>
            <select id="showtimes1" name="showtime1_id">
                <option value="none">None</option>
                @foreach($showtimes as $showtime)
                    <option value="{{$showtime['id']}}">{{$showtime['toString']}}</option>
                @endforeach
            </select>
            <label for="showtimes2">Showtime 2</label>
            <select id="showtimes2" name="showtime2_id">
                <option value="none">None</option>
                @foreach($showtimes as $showtime)
                    <option value="{{$showtime['id']}}">{{$showtime['toString']}}</option>
                @endforeach
            </select>
            <label for="showtimes3">Showtime 3</label>
            <select id="showtimes3" name="showtime3_id">
                <option value="none">None</option>
                @foreach($showtimes as $showtime)
                    <option value="{{$showtime['id']}}">{{$showtime['toString']}}</option>
                @endforeach
            </select>
            <input type="submit" value="Submit">
        </form>
    </div>
@endsection
