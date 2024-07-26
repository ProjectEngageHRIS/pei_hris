<?php

namespace App\Livewire\Passwordchange;

use App\Mail\PasswordChanged;
use App\Models\User;
use Livewire\Component;
use App\Models\Employee;
use App\Mail\ResetPasswordMail;
use App\Models\OtpVerification;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;


class PasswordReset extends Component
{
    public $email;
    public $otp;
    public $password;
    public $password_confirmation;
    public $otpVerified = false;
    public $otpSent = false;
    public $countdown = 30; // Countdown timer in seconds
    public $resendDisabled = true;

    protected $rules = [
        'email' => 'required|email',
        'otp' => 'required|string|min:6|max:6',
        'password' => 'required|string|min:8|confirmed',
    ];

    public function sendOtp()
    {
        $this->validate(['email' => 'required|email']);

        $user = User::where('email', $this->email)->first();

        if ($user) {
            $otp = mt_rand(100000, 999999);

            OtpVerification::updateOrCreate(
                ['email' => $this->email],
                [
                    'email' => $this->email,
                    'otp' => bcrypt($otp),
                    'expires_at' => now()->addMinutes(5)
                ]
            );

            Mail::to($this->email)->send(new ResetPasswordMail($otp));
            $this->otpSent = true;
            $this->js("alert('OTP Sent');");

            $this->startCountdown();
            // Enable resend button after countdown ends
        } else {
            $this->addError('email', 'The email address does not match our records.');
        }
    }

    public function startCountdown()
    {
        $this->otpSent = true;
        $this->countdown = 30; // Countdown timer in seconds
        $this->countdownTimer();

    }

    public function countdownTimer()
    {
        $this->resendDisabled = true; // Enable resend button after countdown ends

        if ($this->countdown > 0) {
            $this->countdown--;
            $this->dispatch('countdown', ['count' => $this->countdown]);
            // Delay for  handled
            $this->resendDisabled = true; // Enable resend button after countdown ends
            $this->resendDisabled = false; // Enable resend button after countdown ends


        }
    }

    public function resendOtp()
    {
        $user = User::where('email', $this->email)->first();

        if ($user) {
            $otp = mt_rand(100000, 999999);

            OtpVerification::updateOrCreate(
                ['email' => $this->email],
                [
                    'email' => $this->email,
                    'otp' => bcrypt($otp),
                    'expires_at' => now()->addMinutes(5)
                ]
            );

            Mail::to($this->email)->send(new ResetPasswordMail($otp));
            $this->otpSent = true;
            $this->js("alert('You can now resend OTP');");
            $this->resendDisabled = true; // Disable resend button again
            $this->startCountdown();
        }
    }

    public function checkOtp()
    {
        $this->validate(['otp' => 'required|string|min:6|max:6']);

        $otpVerification = OtpVerification::where('email', $this->email)->first();

        if (!$otpVerification || !Hash::check($this->otp, $otpVerification->otp)) {
            $this->addError('otp', 'Invalid OTP');
            return;
        }

        if ($otpVerification->expires_at->isPast()) {
            $this->addError('otp', 'OTP has expired');
            return;
        }

        $this->otpVerified = true;
    }

    public function changePassword()
{
    $this->validate([
        'email' => 'required|email',
        'password' => [
        'required',
        'string',
        Password::min(8)
            ->mixedCase()
            ->numbers()
            ->symbols()
            ->uncompromised(),
        'confirmed'
        ],

    ]);

    $user = User::where('email', $this->email)->first();

    if ($user) {
        $user->password = Hash::make($this->password);
        $user->save();

        // Send email notification
        Mail::to($user->email)->send(new PasswordChanged($user));

        // Optionally, you may delete OTP verification if applicable
        // OtpVerification::where('email', $this->email)->delete();

        session()->flash('message', 'Password changed successfully! Check your email for confirmation.');
        return redirect()->to('/login');
    } else {
        $this->addError('email', 'The email address does not match our records.');
    }
}

    public function render()
    {
        return view('livewire.passwordchange.password-reset')->layout('components.layouts.FPLayout');
    }
}