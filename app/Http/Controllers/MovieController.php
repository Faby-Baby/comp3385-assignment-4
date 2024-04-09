<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index() {
        $movies = Movie::all();
        return response()->json(['movies' => $movies]);
    }

    public function store(Request $request) {
        
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'poster'=>' required|file|image|max:2048',
        ]);

        $file = $request->file('poster');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $path = $file->storeAs('posters', $filename, 'public');

        $movie = new Movie();
        $movie->title = $request->input('title');
        $movie->description = $request->input('description');
        $movie->poster = asset('storage/' . $path);
        $movie->save();

        return response()->json([
            'message' => 'Movie created successfully',
            'movie'  => $movie
        ], 201);
    }
    
}
