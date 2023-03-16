@extends('layouts.app')

@section('content')
    <div>
        <h1>Edit Event Day</h1>
        <form method="post" action="{{ route('eventDays.update') }}">
            @csrf
            <label for="event_days">Event Days</label>
            <select id="event_days" name="event_day_id">
                @foreach($eventDays as $eventDay)
                    <option value="{{$eventDay->id}}">{{$eventDay->day}}</option>
                @endforeach
            </select>
            <br>
            <h3>New Values</h3>
            <label for="day">Day</label>
            <input type="date" name="day" id="day">
            <label for="showtimes1">Showtime 1</label>
            <select id="showtimes1" name="showtime1_id">
                <option value="none">No Change</option>
                @foreach($showtimes as $showtime)
                    <option value="{{$showtime['id']}}">{{$showtime['toString']}}</option>
                @endforeach
            </select>
            <label for="showtimes2">Showtime 2</label>
            <select id="showtimes2" name="showtime2_id">
                <option value="none">No Change</option>
                @foreach($showtimes as $showtime)
                    <option value="{{$showtime['id']}}">{{$showtime['toString']}}</option>
                @endforeach
            </select>
            <label for="showtimes3">Showtime 3</label>
            <select id="showtimes3" name="showtime3_id">
                <option value="none">No Change</option>
                @foreach($showtimes as $showtime)
                    <option value="{{$showtime['id']}}">{{$showtime['toString']}}</option>
                @endforeach
            </select>
            <input type="submit" value="Submit">
        </form>
    </div>
@endsection
