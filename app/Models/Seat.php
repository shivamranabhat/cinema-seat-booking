<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
    protected $fillable = [
        'theater_id',
        'row',
        'number',
        'label',
        'type',
        'price',
        'slug',
    ];

    // Relationships
    public function theater()
    {
        return $this->belongsTo(Theater::class);
    }

    // Example: if you have bookings
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? null, function ($query, $search) {
            $query->where('row', 'like', '%' . $search . '%')
                  ->orWhere('number', 'like', '%' . $search . '%')
                  ->orWhere('label', 'like', '%' . $search . '%');
        });
    }
}
