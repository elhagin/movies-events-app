<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Movies App</title>
</head>
<body>
<div class="container">
    <h1>Home</h1>
    <div>
        <a href="{{route('home')}}">
            {{ __('Home') }}
        </a>
        <br>
        <a href="{{route('register.index')}}">
            {{ __('Create Event Reservation') }}
        </a>
        <br>
        <a href="{{route('attendees.index')}}">
            {{ __('Attendees') }}
        </a>
        <br>
        <a href="{{route('movies.index')}}">
            {{ __('Movies') }}
        </a>
        <br>
        <a href="{{route('showtimes.index')}}">
            {{ __('Showtimes') }}
        </a>
        <br>
        <a href="{{route('movies.create')}}">
            {{ __('Create Movie') }}
        </a>
        <br>
        <a href="{{route('movies.edit')}}">
            {{ __('Edit Movie') }}
        </a>
        <br>
        <a href="{{route('movies.delete')}}">
            {{ __('Delete Movie') }}
        </a>
        <br>
        <a href="{{route('showtimes.create')}}">
            {{ __('Create Showtime') }}
        </a>
        <br>
        <a href="{{route('showtimes.edit')}}">
            {{ __('Edit Showtime') }}
        </a>
        <br>
        <a href="{{route('showtimes.delete')}}">
            {{ __('Delete Showtime') }}
        </a>
        <br>
        <a href="{{route('eventDays.create')}}">
            {{ __('Create Event Day') }}
        </a>
        <br>
        <a href="{{route('eventDays.edit')}}">
            {{ __('Edit Event Day') }}
        </a>
        <br>
        <a href="{{route('eventDays.delete')}}">
            {{ __('Delete Event Day') }}
        </a>
        <br>
    </div>
</div>
</body>
</html>
