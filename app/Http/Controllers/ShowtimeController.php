<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Showtime;
use Illuminate\Http\Request;

class ShowtimeController extends Controller
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
        $movies = Movie::all();
        return view('createShowtime', compact('movies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'start_time' => 'required|string',
            'end_time' => 'required|string',
            'movie_id' => 'required|string',
        ]);
        Showtime::create($validated);
        return view('success');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        $movies = Movie::all();
        $showtimes = Showtime::with('movie')->get()->all();
        $showtimes = array_map(function ($showtime) {
            return [
                'id' => $showtime->id,
                'toString' => sprintf('%s to %s : %s', $showtime->start_time, $showtime->end_time, $showtime->movie->name)
            ];
        }, $showtimes);
        return view('editShowtime', compact('showtimes', 'movies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $selectedShowtimeId = $request->get('showtime_id');
        $newStartTime = $request->input('start_time');
        $newEndTime = $request->input('end_time');
        $newMovieId = $request->get('movie_id');
        $showtime = Showtime::find($selectedShowtimeId);
        if (isset($newStartTime)) {
            $showtime->start_time = $newStartTime;
        }
        if (isset($newEndTime)) {
            $showtime->end_time = $newEndTime;
        }
        $showtime->movie_id = $newMovieId;
        $showtime->save();
        return view('success');
    }

    /**
     * Show the form for deleting the specified resource.
     */
    public function delete()
    {
        $movies = Movie::all();
        $showtimes = Showtime::with('movie')->get()->all();
        $showtimes = array_map(function ($showtime) {
            return [
                'id' => $showtime->id,
                'toString' => sprintf('%s to %s : %s', $showtime->start_time, $showtime->end_time, $showtime->movie->name)
            ];
        }, $showtimes);
        return view('deleteShowtime', compact('showtimes', 'movies'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $selectedShowtimeId = $request->get('showtime_id');
        $showtime = Showtime::find($selectedShowtimeId);
        $showtime->delete();
        return view('success');
    }
}
