<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Navbar extends Component
{
    public function logout()
    {
        Auth::logout(); // Log out the user
        session()->flash('success', 'Logout successful!');
        return redirect()->route('login');
    }
    public function render()
    {
        return view('livewire.navbar');
    }
}
