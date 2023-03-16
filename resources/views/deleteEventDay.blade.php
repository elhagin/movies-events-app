@extends('layouts.app')

@section('content')
    <div>
        <h1>Delete Event Day</h1>
        <form method="post" action="{{ route('eventDays.destroy') }}">
            @csrf
            <label for="event_days">Event Days</label>
            <select id="event_days" name="event_day_id">
                @foreach($eventDays as $eventDay)
                    <option value="{{$eventDay->id}}">{{$eventDay->day}}</option>
                @endforeach
            </select>
            <input type="submit" value="Submit">
        </form>
    </div>
@endsection
