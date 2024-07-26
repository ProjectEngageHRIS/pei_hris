<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;

class Login extends Component
{
    /** @var string */
    public $email = '';

    /** @var string */
    public $password = '';

    /** @var bool */
    public $remember = false;

    public $tooManyLoginAttempts = false;

    protected $rules = [
        'email' => ['required'],
        'password' => ['required'],
    ];

    public function authenticate()
    {
        $this->validate();

        $throttleKey = strtolower($this->email) . '|' . request()->ip();
        $attempts = RateLimiter::attempts($throttleKey);
        $limits = [
            60,           // 60 seconds
            300,          // 5 minutes
            900,          // 15 minutes
            3600,         // 1 hour
            86400,        // 1 day
            604800,       // 7 days
            2592000,      // 1 month
            15552000,     // 6 months
            31536000,     // 1 year
        ];
        $index = min($attempts, count($limits) - 1);
        $cooldown = $limits[$index];

        if (RateLimiter::tooManyAttempts($throttleKey, 3)) {
            $this->addError('email', 'Too many login attempts. Please try again in ' . RateLimiter::availableIn($throttleKey) . ' seconds.');
            $this->tooManyLoginAttempts = true;
            return;
        }

        if (!Auth::attempt(['employee_id' => $this->email, 'password' => $this->password], $this->remember)) {
            RateLimiter::hit($throttleKey, $cooldown);
            if ($attempts >= 10) {  // Adjust this number based on your needs
                $user = User::where('employee_id', $this->email)->update(['banned_flag' => 0]);
                if($user){
                    $this->addError('email', 'Your account has been banned. Please contact IT support.');
                } else{
                    $this->addError('email', trans('auth.failed'));
                }
            } else {
                $this->addError('email', trans('auth.failed'));
            }
            return;
        }

        RateLimiter::clear($throttleKey);

        $loggedInUser = auth()->user();

        if($loggedInUser['banned_flag'] != 1){
            $this->addError('email', 'Your account has been banned. Please contact IT support.');
            return;
        }

        if($loggedInUser['role_id'] == 1){
            return redirect()->route('EmployeeDashboard');
        }
        
        return redirect()->route('LoginDashboard');
    }


    public function render()
    {
        return view('livewire.auth.login')->extends('layouts.auth');
    }
}
