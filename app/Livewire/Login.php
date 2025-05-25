<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Login extends Component
{
    public $email;
    public $password;
    public $remember = false;

    // Validation rules
    protected $rules = [
        'email' => 'required|email',
        'password' => 'required',
    ];

    // Custom validation messages (optional)
    protected $messages = [
        'email.required' => 'The email field is required.',
        'email.email' => 'Please enter a valid email address.',
        'password.required' => 'The password field is required.',
    ];

    public function login()
    {
        // Validate the input
        $this->validate();

        // Attempt to authenticate the user
        if (Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->remember)) {
            // Redirect to dashboard on success
            return redirect()->route('home')->with('success', 'Login successful!');
        }

        // Add error for failed login
        $this->addError('general', 'The provided credentials do not match our records.');
    }

    public function render()
    {
        return view('livewire.login');
    }
}