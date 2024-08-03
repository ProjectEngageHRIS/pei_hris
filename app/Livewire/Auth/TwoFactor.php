<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Livewire\Component;
use App\Models\UserDevices;
use App\Events\otpInputAttempt;
use App\Mail\ResetPasswordMail;
use App\Models\OtpVerification;
use App\Events\ResetPasswordSendOtp;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Cookie;
use App\Events\ResetPasswordSendOtpSuccessful;

class TwoFactor extends Component
{
    // public User $user;
    public $email;
    public $otp;
    public $password;
    public $password_confirmation;
    public $otpVerified = false;
    public $otpSent = false;
    public $countdown = 30; // Countdown timer in seconds
    public $resendDisabled = true;

    public $user_id;
    
    protected $rules = [
        'email' => 'required|email',
        'otp' => 'required|string|min:6|max:6',
        'password' => 'required|string|min:8|confirmed',
    ];

    public function mount(){
        $user_id = session()->get('auth_user_id');
        // $this->user = User::where('employee_id', $user_id)->select('employee_id', 'email')->first();
        $this->user_id = $user_id;
        $this->sendOtp();
    }

    public function sendOtp()
    {
        // $this->validate(['email' => 'required|email']);
        $user = User::where('employee_id', $this->user_id)->first();
        $user_email = $user->email;
        if ($user) {
            $otp = mt_rand(100000, 999999);

            OtpVerification::updateOrCreate(
                ['email' => $user_email],
                [
                    'email' => $user_email,
                    'otp' => bcrypt($otp),
                    'expires_at' => now()->addMinutes(5)
                ]
            );

            Mail::to($user_email)->send(new ResetPasswordMail($otp));
            $this->otpSent = true;
            $this->js("alert('OTP Sent');");
            $this->startCountdown();
            ResetPasswordSendOtpSuccessful::dispatch($user_email);
            // Enable resend button after countdown ends
        } else {
            $this->addError('email', 'The email address does not match our records.');
        }

        ResetPasswordSendOtp::dispatch($user_email);

        return;
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
        $user = User::where('employee_id', $this->user_id)->first();
        $user_email = $user->email;

        if ($user) {
            $otp = mt_rand(100000, 999999);

            OtpVerification::updateOrCreate(
                ['email' => $user_email],
                [
                    'email' => $user_email,
                    'otp' => bcrypt($otp),
                    'expires_at' => now()->addMinutes(5)
                ]
            );

            Mail::to($user_email)->send(new ResetPasswordMail($otp));
            $this->otpSent = true;
            $this->js("alert('You can now resend OTP');");
            $this->resendDisabled = true; // Disable resend button again
            $this->startCountdown();
        }
    }

    public function checkOtp()
    {
        $this->validate(['otp' => 'required|string|min:6|max:6']);

        if($this->user_id){
            $user = User::where('employee_id', $this->user_id)->select('employee_id', 'email', 'role_id')->first();
            $user_email = $user->email;
    
            if($user){
                $otpVerification = OtpVerification::where('email', $user_email)->first();
    
                if (!$otpVerification || !Hash::check($this->otp, $otpVerification->otp)) {
                    $this->addError('otp', 'Invalid OTP');
                    otpInputAttempt::dispatch($this->otp, $user_email);
                    return;
                }
    
                if ($otpVerification->expires_at->isPast()) {
                    $this->addError('otp', 'OTP has expired');
                    otpInputAttempt::dispatch($this->otp, $user_email);
                    return;
                }
    
                if(Hash::check($this->otp, $otpVerification->otp)){
                    $userDevice = new UserDevices;
                    $userDevice->user_id = $user->employee_id;
                    $userDevice->expires_at = now()->addDays(30);
                    $userDevice->last_used_at = now();
                    $userDevice->save();

                    // Cookie::queue('device_guid', $userDevice->device_guid, 43200);
                    $cookieName = 'device_guid_' . $user->employee_id;
                    Cookie::queue(Cookie::make($cookieName, $userDevice->device_guid, 43200));
                    // Cookie::queue(Cookie::make('device_guid', $userDevice->device_guid, 43200, null, null, true, true));
                    if($user->role_id == 1){
                        return redirect()->to(route('EmployeeDashboard'));
                    }
                    return redirect()->to(route('LoginDashboard'));

                }
                
                otpInputAttempt::dispatch($this->otp, $user_email);
    
                $this->otpVerified = true;
            }
        }
    }

    public function render()
    {
        return view('livewire.auth.two-factor')->layout('components.layouts.FPLayout');
    }
}
