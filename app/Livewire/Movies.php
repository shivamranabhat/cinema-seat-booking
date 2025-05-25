<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Movie;
use Livewire\Attributes\Url;

class Movies extends Component
{
    public $search = '';
    public function render()
    {
        $movies = Movie::search($this->search)->get();
        return view('livewire.movies', compact('movies'));
    }
    
}
