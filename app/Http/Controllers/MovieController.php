<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $movies = Movie::all();
        return view('movies', compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('createMovie');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
        ]);
        Movie::create($validated);
        return view('success');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        $movies = Movie::all();
        return view('editMovie', compact('movies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $selectedMovie = json_decode($request->get('movie'), true);
        $newName = $request->input('name');
        $movie = Movie::find($selectedMovie['id']);
        $movie->name = $newName;
        $movie->save();
        return view('success');
    }

    /**
     * Show the form for deleting the specified resource.
     */
    public function delete() {
        $movies = Movie::all();
        return view('deleteMovie', compact('movies'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $selectedMovie = json_decode($request->get('movie'), true);
        $movie = Movie::find($selectedMovie['id']);
        $movie->delete();
        return view('success');
    }
}
