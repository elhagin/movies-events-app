@extends('layouts.app')

@section('content')
    <h1>Attendees</h1>
    @if(count($attendees))
        <table>
            <thead>
            <tr>
                <th>Name</th>
                <th>Mobile</th>
                <th>Email</th>
                <th>Reservations</th>
            </tr>
            </thead>
            <tbody>
            @foreach($attendees as $attendee)
                <tr>
                    <td>{{$attendee->name}}</td>
                    <td>{{$attendee->mobile}}</td>
                    <td>{{$attendee->email}}</td>
                    <td>
                        @foreach($attendee->reservations as $reservation)
                            {{$reservation}},
                        @endforeach
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
@endsection
