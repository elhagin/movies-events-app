@extends('layouts.app')

@section('content')
    <div>
        <h1>Create Event Reservation</h1>
    @if(!isset($formData))
        <form method="post" action="{{ route('register.store') }}">
            @csrf
            <label for="event_days">Event Day</label>
            <select id="event_days" name="event_day">
                @foreach($eventDays as $eventDay)
                    <option value="{{$eventDay}}">{{date_create($eventDay->day)->format('D, d M Y')}}</option>
                @endforeach
            </select>
            <label for="movies">Movie</label>
            <select id="movies" name="movie">
                @foreach($movies as $movie)
                    <option value="{{$movie}}">{{$movie->name}}</option>
                @endforeach
            </select>
            <label for="showtimes">Showtime</label>
            <select id="showtimes" name="showtime">
                @foreach($showtimes as $showtime)
                    <option value="{{$showtime}}">
                        {{date_format(date_create($showtime->start_time), 'h:i a')}} to {{date_format(date_create($showtime->end_time), 'h:i a')}}
                    </option>
                @endforeach
            </select>
            <input type="hidden" name="form" value="firstForm">
            <input type="submit" value="Next">
        </form>
    @else
        <form method="post" action="{{ route('register.store') }}">
            @csrf
            <label for="name">Name</label>
            <input type="text" name="name" id="name">
            <label for="mobile">Mobile</label>
            <input type="text" name="mobile" id="mobile">
            <label for="email">Email</label>
            <input type="email" name="email" id="email">
            <input type="hidden" name="formData" value="{{$formData}}">
            <input type="submit" value="Submit">
        </form>
    @endif
    </div>
@endsection
