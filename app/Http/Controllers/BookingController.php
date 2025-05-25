<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\User;
use App\Models\MovieSchedule;
use App\Models\Seat;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the bookings.
     */
    public function index()
    {
        $bookings = Booking::with(['user', 'schedule.movie', 'seat'])->paginate(10);
        return view('admin.booking.index', compact('bookings'));
    }

    /**
     * Show the form for creating a new booking.
     */
    public function create()
    {
        $users = User::all();
        $schedules = MovieSchedule::with('movie')->get();
        $seats = Seat::all();
        return view('admin.booking.create', compact('users', 'schedules', 'seats'));
    }

    /**
     * Store a newly created booking in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'movie_schedule_id' => 'required|exists:movie_schedules,id',
            'seat_id' => 'required|exists:seats,id',
            'selected_date' => 'required|date',
        ]);

        // Check if the seat is already booked for this schedule on this date
        $existingBooking = Booking::where('movie_schedule_id', $request->movie_schedule_id)
            ->where('seat_id', $request->seat_id)
            ->where('selected_date', $request->selected_date)
            ->where('status', 'confirmed')
            ->exists();

        if ($existingBooking) {
            return back()->withErrors(['seat_id' => 'This seat is already booked for this showtime.']);
        }

        // Get the show_time from the schedule
        $schedule = MovieSchedule::find($request->movie_schedule_id);
        $selected_time = $schedule->show_time;

        Booking::create([
            'user_id' => $request->user_id,
            'movie_schedule_id' => $request->movie_schedule_id,
            'seat_id' => $request->seat_id,
            'status' => 'confirmed',
            'selected_date' => $request->selected_date,
            'selected_time' => $selected_time,
        ]);

        return redirect()->route('bookings')->with('success', 'Booking created successfully.');
    }

  

    /**
     * Show the form for editing the specified booking.
     */
    public function edit($slug)
    {
        $booking = Booking::where('slug', $slug)->firstOrFail();
        $users = User::all();
        $schedules = MovieSchedule::with('movie')->get();
        $seats = Seat::all();
        return view('admin.booking.edit', compact('booking', 'users', 'schedules', 'seats'));
    }

    /**
     * Update the specified booking in storage.
     */
    public function update(Request $request, $slug)
    {
        try {
            $booking = Booking::where('slug', $slug)->firstOrFail();

            $request->validate([
                'user_id' => 'required|exists:users,id',
                'movie_schedule_id' => 'required|exists:movie_schedules,id',
                'seat_id' => 'required|exists:seats,id',
                'selected_date' => 'required|date',
                'status' => 'required|in:booked,cancelled',
            ]);

            // Check if the seat is already booked, excluding the current booking
            $existingBooking = Booking::where('movie_schedule_id', $request->movie_schedule_id)
                ->where('seat_id', $request->seat_id)
                ->where('selected_date', $request->selected_date)
                ->where('status', 'booked')
                ->where('slug', '!=', $slug)
                ->exists();

            if ($existingBooking) {
                return back()->withErrors(['seat_id' => 'This seat is already booked for this showtime.']);
            }

            $booking->update([
                'user_id' => $request->user_id,
                'movie_schedule_id' => $request->movie_schedule_id,
                'seat_id' => $request->seat_id,
                'selected_date' => $request->selected_date,
                'status' => $request->status,
            ]);

            return redirect()->route('bookings')->with('success', 'Booking updated successfully.');
            } 
            catch (\Exception $e) {
                return redirect()->back()->with('error', 'Seat Already Booked ');
            }
    }

    /**
     * Remove the specified booking from storage.
     */
    public function destroy($slug)
    {
        $booking = Booking::where('slug', $slug)->firstOrFail();
        $booking->delete();
        return redirect()->route('bookings')->with('success', 'Booking deleted successfully.');
    }

    /**
     * Cancel the specified booking by updating its status to 'cancelled'.
     */
    public function cancel($slug)
    {
        $booking = Booking::where('slug', $slug)->firstOrFail();
        $booking->update(['status' => 'cancelled']);
        return redirect()->route('bookings')->with('success', 'Booking cancelled successfully.');
    }
}
