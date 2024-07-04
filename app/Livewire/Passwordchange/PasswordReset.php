<?php

namespace App\Livewire\Passwordchange;

use App\Models\User;
use Livewire\Component;
use App\Models\Employee;
use App\Mail\ResetPasswordMail;
use App\Models\OtpVerification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;


class PasswordReset extends Component
{
    public $email;
    public $otp;
    public $User;
    public $password;

    public $employee_id;
    public $password_confirmation;
    public $otpVerified = false;
    public $otpSent = false;
    public $employeeRecord;

    protected $rules = [
        'email' => 'required|email',
        'otp' => 'required|string|min:6|max:6',
        'password' => 'required|string|min:8|confirmed',
    ];

    public function sendOtp()
    {
        $this->validate(['email' => 'required|email']);
    
        // Retrieve the employee record based on the provided email
        $employeeRecord = User::select('email')
            ->where('email', $this->email)
            ->first();
    
        // Check if the email matches the employee email
        if ($employeeRecord) {
            $otp = mt_rand(100000, 999999);
    
            OtpVerification::updateOrCreate(
                ['email' => $this->email],
                [
                    'email' => $this->email,
                    'otp' => bcrypt($otp),
                    'expires_at' => now()->addMinutes(10)
                ]
            );
    
            Mail::to($this->email)->send(new ResetPasswordMail($otp));
            $this->otpSent = true;
            $this->dispatch('otpSent');
        } else {
            $this->addError('email', 'The email address does not match our records.');
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
        $this->dispatch('otpVerified');
    }

    public function changePassword()
    {
        $this->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Retrieve the user record based on the provided email
        $user = User::where('email', $this->email)->first();

        // Check if the user record exists
        if ($user) {
            // Update the password
            $user->password = Hash::make($this->password);
            $user->save();

            // Delete the OTP verification record
            OtpVerification::where('email', $this->email)->delete();

            session()->flash('success', 'Password changed successfully');
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
