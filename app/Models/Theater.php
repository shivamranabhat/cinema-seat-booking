<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Theater extends Model
{
    protected $fillable = [
        'name',
        'slug',
    ];

    public function movies()
    {
        return $this->hasMany(Movie::class);
    }
     public function scopeFilter($query, array $filters)
    {
        if ($filters['search'] ?? false) {
            $query->where('name', 'like', '%' . request('search') . '%');
        }
    }
    public function seats()
    {
        return $this->hasMany(Seat::class);
    }
    public function movieSchedules()
    {
        return $this->hasMany(MovieSchedule::class);
    }


}
