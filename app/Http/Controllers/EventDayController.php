<?php

namespace App\Http\Controllers;

use App\Models\EventDay;
use App\Models\Movie;
use App\Models\Showtime;
use Illuminate\Http\Request;

class EventDayController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $showtimes = Showtime::with('movie')->get();
        return view('showtimes', compact('showtimes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $showtimes = Showtime::with('movie')->get()->all();
        $showtimes = array_map(function ($showtime) {
            return [
                'id' => $showtime->id,
                'toString' => sprintf('%s to %s : %s', $showtime->start_time, $showtime->end_time, $showtime->movie->name)
            ];
        }, $showtimes);
        return view('createEventDay', compact('showtimes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'day' => 'required|string',
        ]);
        $eventDay = EventDay::create($validated);
        $showtimes = [];
        $showtime1 = $request->get('showtime1_id');
        $showtime2 = $request->get('showtime2_id');
        $showtime3 = $request->get('showtime3_id');
        if ($showtime1 !== 'none') {
            array_push($showtimes, Showtime::find($showtime1));
        }
        if ($showtime2 !== 'none') {
            array_push($showtimes, Showtime::find($showtime2));
        }
        if ($showtime3 !== 'none') {
            array_push($showtimes, Showtime::find($showtime3));
        }

        if (!empty($showtimes)) {
            $eventDay->showtimes()->saveMany($showtimes);
        }
        return view('success');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        $showtimes = Showtime::with('movie')->get()->all();
        $showtimes = array_map(function ($showtime) {
            return [
                'id' => $showtime->id,
                'toString' => sprintf('%s to %s : %s', $showtime->start_time, $showtime->end_time, $showtime->movie->name)
            ];
        }, $showtimes);
        $eventDays = EventDay::all();
        return view('editEventDay', compact('eventDays', 'showtimes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $selectedEventDayId = $request->get('event_day_id');
        $newDay = $request->input('day');
        $eventDay = EventDay::with('showtimes')->find($selectedEventDayId);
        if (isset($newDay)) {
            $eventDay->day = $newDay;
        }
        $showtimes = [];
        $showtime1 = $request->get('showtime1_id');
        $showtime2 = $request->get('showtime2_id');
        $showtime3 = $request->get('showtime3_id');
        if ($showtime1 !== 'none') {
            array_push($showtimes, Showtime::find($showtime1));
        } else {
            if (count($eventDay->showtimes)) {
                $eventDay->showtimes()->wherePivot('showtime_id', $eventDay->showtimes[0]->id)->detach();
            }
        }
        if ($showtime2 !== 'none') {
            array_push($showtimes, Showtime::find($showtime2));
        } else {
            if (count($eventDay->showtimes) > 1) {
                $eventDay->showtimes()->wherePivot('showtime_id', $eventDay->showtimes[1]->id)->detach();
            }
        }
        if ($showtime3 !== 'none') {
            array_push($showtimes, Showtime::find($showtime3));
        } else {
            if (count($eventDay->showtimes) > 2) {
                $eventDay->showtimes()->wherePivot('showtime_id', $eventDay->showtimes[2]->id)->detach();
            }
        }

        if (!empty($showtimes)) {
            $eventDay->showtimes()->saveMany($showtimes);
        }
        $eventDay->save();
        return view('success');
    }

    /**
     * Show the form for deleting the specified resource.
     */
    public function delete()
    {
        $eventDays = EventDay::all();
        return view('deleteEventDay', compact('eventDays'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $selectedEventDayId = $request->get('event_day_id');
        $eventDay = EventDay::find($selectedEventDayId);
        $eventDay->delete();
        return view('success');
    }
}
