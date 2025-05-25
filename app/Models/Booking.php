<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    
    protected $fillable = [
        'user_id',
        'movie_schedule_id',
        'seat_id',
        'group_id',
        'status',
        'selected_date',
        'selected_time',
        'slug',
    ];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function schedule()
    {
        return $this->belongsTo(MovieSchedule::class, 'movie_schedule_id');
    }

    public function seat()
    {
        return $this->belongsTo(Seat::class);
    }

}
