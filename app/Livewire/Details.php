<?php
namespace App\Livewire;

use Livewire\Component;
use App\Models\Movie;
use App\Models\MovieSchedule;
use App\Models\Seat;
use App\Models\Booking;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Details extends Component
{
    public $slug;
    public $selectedDate = null;
    public $selectedTime = null;
    public $selectedSeats = [];
    public $theaterId = 1;
    public $selectedSeatInfo = [];
    public $userBookings = [];

    /**
     * Initialize the component with the movie slug.
     */
    public function mount($slug)
    {
        $this->slug = $slug;
        $this->selectedDate = Carbon::today()->format('Y-m-d');
        $this->loadUserBookings();
    }

    /**
     * Update selected seat information when seats change.
     */
    public function updatedSelectedSeats($value)
    {
        $this->selectedSeatInfo = Seat::whereIn('id', $this->selectedSeats)->get()->toArray();
    }

    /**
     * Select a date and reset related properties.
     */
    public function selectDate($date)
    {
        $this->selectedDate = $date;
        $this->selectedTime = null;
        $this->selectedSeats = [];
        $this->loadUserBookings();
    }

    /**
     * Select a time and reset seats.
     */
    public function selectTime($time)
    {
        $this->selectedTime = $time;
        $this->selectedSeats = [];
        $this->loadUserBookings();
    }

    /**
     * Toggle seat selection.
     */
    public function selectSeat($seatId)
    {
        if (in_array($seatId, $this->selectedSeats)) {
            $this->selectedSeats = array_diff($this->selectedSeats, [$seatId]);
        } else {
            $this->selectedSeats[] = $seatId;
        }
        $this->updatedSelectedSeats($seatId);
    }

    /**
     * Process the booking request.
     */
    public function proceed()
    {
        if (!Auth::check()) {
            session()->flash('error', 'Please log in to book seats.');
            return redirect()->route('login');
        }

        if (empty($this->selectedSeats)) {
            session()->flash('error', 'Please select at least one seat.');
            return;
        }

        if (empty($this->selectedDate) || empty($this->selectedTime)) {
            session()->flash('error', 'Please select a date and time.');
            return;
        }

        $details = $this->details;
        $schedule = $details->schedules()
            ->where('theater_id', $this->theaterId)
            ->whereTime('show_time', $this->selectedTime)
            ->first();

        if (!$schedule) {
            session()->flash('error', 'Selected show time is not available.');
            return;
        }

        // Check for already booked seats
        $bookedSeats = Booking::where('movie_schedule_id', $schedule->id)
            ->whereIn('seat_id', $this->selectedSeats)
            ->pluck('seat_id')
            ->toArray();

        if (!empty($bookedSeats)) {
            session()->flash('error', 'Some selected seats are already booked.');
            return;
        }

        // Create bookings within a transaction
        DB::beginTransaction();
        // try {
            foreach ($this->selectedSeats as $seatId) {
                Booking::create([
                    'user_id' => Auth::id(),
                    'movie_schedule_id' => $schedule->id,
                    'seat_id' => $seatId,
                    'status' => 'booked',
                    'selected_date' => $this->selectedDate,
                    'selected_time' => $this->selectedTime,
                    'slug' => now().'-'.Str::random(10),
                ]);
            }
            DB::commit();
            session()->flash('success', 'Booking confirmed successfully!');
            $this->selectedSeats = [];
            $this->selectedSeatInfo = [];
            $this->loadUserBookings();
        // } catch (\Exception $e) {
        //     DB::rollBack();
        //     session()->flash('error', 'Failed to book seats. Please try again.');
        // }
    }

    /**
     * Cancel a booking.
     */
    public function cancelBooking($bookingId)
    {
        if (!Auth::check()) {
            session()->flash('error', 'Please log in to cancel bookings.');
            return;
        }

        $booking = Booking::where('id', $bookingId)
            ->where('user_id', Auth::id())
            ->first();

        if ($booking) {
             $booking->update(['status' => 'cancelled']);
            session()->flash('success', 'Booking cancelled successfully!');
            $this->loadUserBookings();
        } else {
            session()->flash('error', 'Booking not found or you do not have permission to cancel it.');
        }
    }
    public function reserveBooking($bookingId)
    {
        if (!Auth::check()) {
            session()->flash('error', 'Please log in to cancel bookings.');
            return;
        }

        $booking = Booking::where('id', $bookingId)
            ->where('user_id', Auth::id())
            ->first();

        if ($booking) {
             $booking->update(['status' => 'booked']);
            session()->flash('success', 'Booking booked successfully!');
            $this->loadUserBookings();
        } else {
            session()->flash('error', 'Booking not found or you do not have permission to reserve it.');
        }
    }

    /**
     * Load the user's bookings for this movie.
     */
    protected function loadUserBookings()
    {
        if (Auth::check()) {
            $details = $this->details;
            $this->userBookings = Booking::where('user_id', Auth::id())
                ->whereHas('schedule', function ($query) use ($details) {
                    $query->where('movie_id', $details->id);
                })
                ->with(['seat', 'schedule'])
                ->get()
                ->map(function ($booking) {
                    return [
                        'id' => $booking->id,
                        'seat_label' => $booking->seat->label,
                        'date' => Carbon::parse($booking->selected_date)->format('jS M, Y'),
                        'time' => Carbon::parse($booking->selected_time)->format('g:i A'),
                        'status' => $booking->status,
                    ];
                })->toArray();
        } else {
            $this->userBookings = [];
        }
    }

    /**
     * Get the movie details based on the slug.
     */
    public function getDetailsProperty()
    {
        return Movie::where('slug', $this->slug)->firstOrFail();
    }

    /**
     * Render the component view.
     */
   public function render()
{
    $details = $this->details; // The movie being viewed

    // Fetch all schedules for the movie and theater without date filtering
    $schedules = $details->schedules()
        ->where('theater_id', $this->theaterId)
        ->get();

    // Fetch seats for the theater
    $seats = Seat::where('theater_id', $this->theaterId)
        ->orderBy('row')
        ->orderBy('number')
        ->get()
        ->groupBy('row');

    // Determine booked seats based on selected date and time (if chosen)
    $bookedSeats = [];
    if ($this->selectedDate && $this->selectedTime) {
        $schedule = $details->schedules()
            ->where('theater_id', $this->theaterId)
            ->where('show_time', $this->selectedTime)
            ->first();

        if ($schedule) {
            $bookedSeats = Booking::where('movie_schedule_id', $schedule->id)
                ->where('selected_date', $this->selectedDate)
                ->where('status', 'booked')
                ->pluck('seat_id')
                ->toArray();
        }
    }

    // Calculate total price for selected seats
    $totalPrice = Seat::whereIn('id', $this->selectedSeats)->sum('price');

    // Get all unique show times
    $showTimes = $schedules
        ->map(function ($schedule) {
            return Carbon::parse($schedule->show_time)->format('H:i');
        })
        ->unique()
        ->sort()
        ->values()
        ->toArray();

    return view('livewire.details', compact(
        'details',
        'schedules',
        'seats',
        'bookedSeats',
        'totalPrice',
        'showTimes'
    ))->with([
        'selectedSeats' => $this->selectedSeats,
        'selectedDate' => $this->selectedDate,
        'selectedTime' => $this->selectedTime,
        'userBookings' => $this->userBookings,
    ]);
}
}