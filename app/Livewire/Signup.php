<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class Signup extends Component
{
    public $name;
    public $email;
    public $password;
    public $password_confirmation;

    // Validation rules
    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:8|confirmed',
        'password_confirmation' => 'required',
    ];

    // Custom validation messages (optional)
    protected $messages = [
        'name.required' => 'The name field is required.',
        'email.required' => 'The email field is required.',
        'email.email' => 'Please enter a valid email address.',
        'email.unique' => 'This email is already registered.',
        'password.required' => 'The password field is required.',
        'password.min' => 'The password must be at least 8 characters.',
        'password.confirmed' => 'The password confirmation does not match.',
        'password_confirmation.required' => 'Please confirm your password.',
    ];

    public function register()
    {
        $this->validate();

        try {
            $user = User::create([
                'name' => $this->name,
                'email' => $this->email,
                'password' => Hash::make($this->password),
            ]);
            return redirect()->route('login')->with('success', 'Registration successful!');
            $this->reset(['email', 'password', 'password_confirmation']);
        } catch (\Exception $e) {
            $this->addError('general', 'An error occurred during registration. Please try again.');
        }
    }

    public function render()
    {
        return view('livewire.signup');
    }
}