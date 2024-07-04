<?php

namespace App\Livewire\Passwordchange;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\OtpMail;
use Carbon\Carbon;

class PasswordChange extends Component
{
    public $current_password;
    public $new_password;
    public $new_password_confirmation;
    public $otp;
    public $step = 1;
    public $canResend = false;
    public $resendTimer = 60; // 60 seconds countdown timer
    public $resendAt;

    protected $rules = [
        'current_password' => 'required',
        'new_password' => 'required|min:6|confirmed',
    ];

    public function submit()
    {
        $this->validate();

        if (!Auth::check()) {
            session()->flash('error', 'You need to be logged in to change your password.');
            return;
        }

        $user = Auth::user();

        if (!\Hash::check($this->current_password, $user->password)) {
            session()->flash('error', 'The current password is incorrect.');
            return;
        }

        $this->sendOtp($user);
        $this->step = 2;
    }

    public function sendOtp($user)
    {
        $otp = $this->generateOtp();
        session(['otp' => $otp]);

        Mail::to($user->email)->send(new OtpMail($otp));

        $this->resendAt = Carbon::now()->addSeconds($this->resendTimer);
        $this->canResend = false;

        $this->dispatchBrowserEvent('start-countdown');
    }

    public function generateOtp()
    {
        return rand(100000, 999999);
    }

    public function verifyOtp()
    {
        if ($this->otp != session('otp')) {
            session()->flash('error', 'The OTP is incorrect.');
            return;
        }

        $user = Auth::user();
        $user->password = \Hash::make($this->new_password);
        $user->save();

        session()->flash('message', 'Your password has been successfully changed.');

        $this->step = 3;
    }

    public function render()
    {
        return view('livewire.passwordchange.password-change')->layout('components.layouts.FPLayout');
    }
}
