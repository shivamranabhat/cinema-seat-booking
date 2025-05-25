<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    
    protected $fillable = [
        'name',
        'image',
        'alt',
        'release_date',
        'duration',
        'rating',
        'genre',
        'director',
        'cast',
        'description',
        'slug',
    ];

    public function schedules()
    {
        return $this->hasMany(MovieSchedule::class);
    }
    
    public function scopeSearch($query, $search)
    {
        if (!empty($search)) {
            return $query->where('name', 'like', "%{$search}%");
            // Add more conditions as needed
        }
        return $query;
    }
    public function scopeFilter($query, array $filters)
    {
        if ($filters['search'] ?? false) {
            $query->where('name', 'like', '%' . request('search') . '%');
        }
    }
}
