<?php

namespace App\Http\Controllers;

use App\Models\Attendee;
use App\Models\MovieBooking;
use Illuminate\Http\Request;

class AttendeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $attendees = Attendee::all();
        $attendees->each(function ($attendee) {
            $reservations = MovieBooking::with('showtime')
                ->with('eventDay')->where('attendee_id', $attendee->id)->get();
            $attendeeReservations = [];
            foreach ($reservations as $reservation) {
                $showtime = sprintf('%s to %s',
                    $reservation->showtime->start_time, $reservation->showtime->end_time);
                array_push($attendeeReservations,
                    sprintf('Showtime: (%s) on Event Day (%s)', $showtime, $reservation->eventDay->day));
            }
            $attendee->reservations = $attendeeReservations;
        });
        return view('attendees', compact('attendees'));
    }
}
