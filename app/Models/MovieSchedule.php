<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MovieSchedule extends Model
{
    protected $fillable = [
        'movie_id',
        'theater_id',
        'show_time',
        'slug',
    ];

    /**
     * Get the theater that owns the MovieSchedule
     */
    public function theater()
    {
        return $this->belongsTo(Theater::class);
    }
    /**
     * Get the movie that owns the MovieSchedule
     */
    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }

}
