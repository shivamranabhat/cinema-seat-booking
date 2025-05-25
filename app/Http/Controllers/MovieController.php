<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Theater;
use App\Models\Movie;
use App\Models\MovieSchedule;
use Illuminate\Support\Str;


class MovieController extends Controller
{
     public function index()
    {
        $movies = Movie::latest()->filter(request(['name','search']))->paginate(5);
        return view('admin.movie.index',compact('movies'));
    }

    public function create()
    {
        $theaters = Theater::all();
        return view('admin.movie.create',compact('theaters'));
    }

     /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'image'        => 'required|image|mimes:jpeg,png,jpg,gif,webp, avif',
            'alt'          => 'required|string|max:255',
            'release_date' => 'required',
            'duration'     => 'required|string',
            'rating'       => 'required|string',
            'genre'        => 'required|string',
            'director'     => 'required|string',
            'cast'         => 'required|string',
            'show_time'    => 'required|string', // e.g., "10:20, 12:00, 14:30"
            'description'  => 'required|string',
            'theater_id'   => 'required|exists:theaters,id',
        ]);
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('movies', 'public'); 
        }
        $slug = Str::slug($validated['name']);
        $movie = Movie::create([
            'name'        => $validated['name'],
            'image'        => $imagePath,
            'alt'          => $validated['alt'] ?? null,
            'release_date' => $validated['release_date'],
            'duration'     => $validated['duration'],
            'rating'       => $validated['rating'],
            'genre'        => $validated['genre'],
            'director'     => $validated['director'],
            'cast'         => $validated['cast'],
            'description'  => $validated['description'] ?? null,
            'slug'         => $slug,
        ]);
    
       $showTimes = array_map('trim', explode(',', $validated['show_time']));

        foreach ($showTimes as $time) {
            $movie->schedules()->create([
                'theater_id' => $validated['theater_id'],
                'show_time'  => $time,
                'slug'       => $slug,
            ]);
        }
        return redirect()->route('movies')->with('success','Movie added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function edit(string $slug)
    {
        $movie = Movie::where('slug', $slug)->firstOrFail();
        $theaters = Theater::all();
        // Prepare showtimes as a comma-separated string for the input
        $showTimes = $movie->schedules->pluck('show_time')->implode(', ');
        return view('admin.movie.edit', compact('movie', 'theaters', 'showTimes'));
    }


    public function update(Request $request, string $slug)
    {
        $movie = Movie::where('slug', $slug)->firstOrFail();
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'image'        => 'nullable|image|mimes:jpeg,png,jpg,gif,webp,avif',
            'alt'          => 'required|string|max:255',
            'release_date' => 'required',
            'duration'     => 'required|string',
            'rating'       => 'required|string',
            'genre'        => 'required|string',
            'director'     => 'required|string',
            'cast'         => 'required|string',
            'show_time'    => 'required|string',
            'description'  => 'required|string',
            'theater_id'   => 'required|exists:theaters,id',
        ]);

        // Handle image upload
        $imagePath = $movie->image;
        if ($request->hasFile('image')) {
            // Delete old image
            if ($imagePath && file_exists(public_path('storage/' . $imagePath))) {
                unlink(public_path('storage/' . $imagePath));
            }
            // Store new image
            $imagePath = $request->file('image')->store('movies', 'public');
        }

        //Update the movie
        $newSlug = Str::slug($validated['name']);
        $movie->update([
            'name'         => $validated['name'],
            'image'        => $imagePath,
            'alt'          => $validated['alt'],
            'release_date' => $validated['release_date'],
            'duration'     => $validated['duration'],
            'rating'       => $validated['rating'],
            'genre'        => $validated['genre'],
            'director'     => $validated['director'],
            'cast'         => $validated['cast'],
            'description'  => $validated['description'],
            'slug'         => $newSlug,
        ]);

        // Remove old schedules for this movie
        $movie->schedules()->delete();

        // Split show times and create new schedule rows
        $showTimes = array_map('trim', explode(',', $validated['show_time']));
        foreach ($showTimes as $time) {
            $movie->schedules()->create([
                'theater_id' => $validated['theater_id'],
                'show_time'  => $time,
                'slug'       => $newSlug,
            ]);
        }
        return redirect()->route('movies')->with('success', 'Movie updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $slug)
    {
        $movie= Movie::where('slug',$slug)->first();
        $image_path =public_path('storage/'.$movie->image);
        if(file_exists($image_path))
        {
            unlink($image_path);
        }
        $movie->delete();
        $movie->schedules()->delete(); // Delete associated schedules
        return redirect()->route('movies')->with('success','Movie deleted successfully');
    }

}
