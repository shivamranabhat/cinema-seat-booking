<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;

class PageController extends Controller
{
    public function index()
    {
        return view('index');
    }
    public function details($slug)
    {
        return view('details', compact('slug'));
    }
    public function login()
    {
        return view('login');
    }
    public function movies()
    {
        return view('movies');
    }
    public function signup()
    {
        return view('signup');
    }
    public function showSeats($theaterId, $showtimeId)
    {
        $theater = Theater::findOrFail($theaterId);
        $showtime = Showtime::findOrFail($showtimeId);
        
        // Fetch seats grouped by row, with booking status for the showtime
        $seats = Seat::where('theater_id', $theaterId)
            ->with(['bookings' => function ($query) use ($showtimeId) {
                $query->where('showtime_id', $showtimeId);
            }])
            ->orderBy('row')
            ->orderBy('number')
            ->get()
            ->groupBy('row');

        return view('seats.show', compact('theater', 'showtime', 'seats'));
    }
}
