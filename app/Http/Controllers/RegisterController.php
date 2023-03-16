<?php

namespace App\Http\Controllers;

use App\Models\Attendee;
use App\Models\EventDay;
use App\Models\Movie;
use App\Models\MovieBooking;
use App\Models\Showtime;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $showtimes = Showtime::all()->sortBy('start_time');
        $eventDays = EventDay::all()->sortBy('day');
        $movies = Movie::all();
        return view('register', compact('eventDays', 'showtimes', 'movies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->input('form') === 'firstForm') {
            $eventDay = $request->get('event_day');
            $showtime = $request->get('showtime');
            $movie = $request->get('movie');
            $formData = ['eventDay' => $eventDay, 'showtime' => $showtime, 'movie' => $movie];
            $formData = json_encode($formData);
            return view('register', compact('formData'));
        } else {
            $attendeeName = $request->input('name');
            $attendeeMobile = $request->input('mobile');
            $attendeeEmail = $request->input('email');
            $formData = json_decode($request->input('formData'));
            $attendee = Attendee::where('email', $attendeeEmail)->first();
            if (!isset($attendee)) {
                $attendee = Attendee::create(['name' => $attendeeName, 'mobile' => $attendeeMobile, 'email' => $attendeeEmail]);
            }
            $showtime = json_decode($formData->showtime, true);
            $eventDay = json_decode($formData->eventDay, true);
            $movieBooking = new MovieBooking();
            $movieBooking->attendee()->associate($attendee);
            $movieBooking->eventDay()->associate($eventDay['id']);
            $movieBooking->showtime()->associate($showtime['id']);
            $movieBooking->save();
            return view('success');
        }
    }
}
