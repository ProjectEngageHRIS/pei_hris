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
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Cookie;
use PragmaRX\Google2FAQRCode\Google2FA;
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

    public $QR_Image;
    
    protected $rules = [
        'email' => 'required|email',
        'otp' => 'required|string|min:6',
        'password' => 'required|string|min:8|confirmed',
    ];

    public $secret;

    public function mount(){
        // $user_id = session()->get('auth_user_id');
        $user = auth()->user();
        $google2fa = new Google2FA();


        if($user->twofactor_approved && $user->twofactor_secret != null){
            $this->secret =  Crypt::decryptString($user->twofactor_secret);
        } else {
            $this->secret = $google2fa->generateSecretKey();
            // Check if the secret key is of valid length
            if (strlen($this->secret) < 16) {
                throw new \Exception('Secret key is too short. Must be at least 16 base32 characters.');
            }
            $this->QR_Image = $google2fa->getQRCodeInline(
                "SL Employee",
                $user->employee_id,
                $this->secret
            );
        }

    }

    // public function sendOtp()
    // {
    //     // $this->validate(['email' => 'required|email']);
    //     $user = User::where('employee_id', $this->user_id)->first();
    //     $user_email = $user->email;
    //     if ($user) {
    //         $otp = mt_rand(100000, 999999);

    //         OtpVerification::updateOrCreate(
    //             ['email' => $user_email],
    //             [
    //                 'email' => $user_email,
    //                 'otp' => bcrypt($otp),
    //                 'expires_at' => now()->addMinutes(5)
    //             ]
    //         );

    //         Mail::to($user_email)->send(new ResetPasswordMail($otp));
    //         $this->otpSent = true;
    //         $this->js("alert('OTP Sent');");
    //         $this->startCountdown();
    //         ResetPasswordSendOtpSuccessful::dispatch($user_email);
    //         // Enable resend button after countdown ends
    //     } else {
    //         $this->addError('email', 'The email address does not match our records.');
    //     }

    //     ResetPasswordSendOtp::dispatch($user_email);

    //     return;
    // }

    // public function startCountdown()
    // {
    //     $this->otpSent = true;
    //     $this->countdown = 30; // Countdown timer in seconds
    //     $this->countdownTimer();

    // }

    // public function countdownTimer()
    // {
    //     $this->resendDisabled = true; // Enable resend button after countdown ends

    //     if ($this->countdown > 0) {
    //         $this->countdown--;
    //         $this->dispatch('countdown', ['count' => $this->countdown]);
    //         // Delay for  handled
    //         $this->resendDisabled = true; // Enable resend button after countdown ends
    //         $this->resendDisabled = false; // Enable resend button after countdown ends


    //     }
    // }

    // public function resendOtp()
    // {
    //     $user = User::where('employee_id', $this->user_id)->first();
    //     $user_email = $user->email;

    //     if ($user) {
    //         $otp = mt_rand(100000, 999999);

    //         OtpVerification::updateOrCreate(
    //             ['email' => $user_email],
    //             [
    //                 'email' => $user_email,
    //                 'otp' => bcrypt($otp),
    //                 'expires_at' => now()->addMinutes(5)
    //             ]
    //         );

    //         Mail::to($user_email)->send(new ResetPasswordMail($otp));
    //         $this->otpSent = true;
    //         $this->js("alert('You can now resend OTP');");
    //         $this->resendDisabled = true; // Disable resend button again
    //         $this->startCountdown();
    //     }
    // }

    public function checkOtp()
    {
        $this->validate(['otp' => 'required|string|min:6|max:6']);
        $user_id = auth()->user();
        $user = User::where('employee_id', $user_id->employee_id)->first();
        $google2fa = new Google2FA();
    
    
        if ($google2fa->verifyKey($this->secret, $this->otp)) {
            $encryptedSecretKey = Crypt::encryptString($this->secret);
            $user->twofactor_secret = $encryptedSecretKey;
            $user->twofactor_approved = True;
            $user->save();
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
        } else {
            // The code is incorrect
            dd('code incorrect');
        }
    }

    public function render()
    {
        return view('livewire.auth.two-factor')->layout('components.layouts.loginlayout');
    }
}
