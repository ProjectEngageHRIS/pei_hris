<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Livewire\Component;
use App\Models\UserDevices;
use App\Events\otpInputAttempt;
use App\Mail\ResetPasswordMail;
use App\Models\OtpVerification;
use Illuminate\Support\Facades\Log;
use App\Events\ResetPasswordSendOtp;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Cookie;
use PragmaRX\Google2FAQRCode\Google2FA;
use Illuminate\Support\Facades\RateLimiter;
use App\Events\ResetPasswordSendOtpSuccessful;
use Illuminate\Contracts\Encryption\DecryptException;

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
            try {
                $this->secret =  Crypt::decryptString($user->twofactor_secret);
            } catch (DecryptException $e) {
                $this->addError('otp', 'Something went Wrong. Please Contact IT Support');
                Log::channel('loginlog')->error('Failed to Decrypt the Secret Key: ' . $e->getMessage() . ' | ' . $user->employee_id);
            }
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

    public $tooManyLoginAttempts;

    public function checkOtp()
    {

        $this->validate(['otp' => 'required|string']);
        $user_id = auth()->user();

        $throttleKey = strtolower($user_id->employee_id);
        $maxAttempts = 10; // Maximum number of attempts allowed
        $decayMinutes = 1; // Time period in minutes to limit the attempts
        $ip = \Request::getClientIp(true);
        
        // Check if too many attempts have been made
        if (RateLimiter::tooManyAttempts($throttleKey, $maxAttempts)) {
            $this->addError('otp', 'Too many Wrong Attemps. Please try again in ' . RateLimiter::availableIn($throttleKey) . ' seconds.');
            $this->tooManyLoginAttempts = true;
            $attempts = RateLimiter::attempts($throttleKey);
            Log::channel('loginlog')->warning('Too many OTP attempts for ' . $user_id->employee_id .  ' seconds. From IP: ' . $ip . ' | Attempts: ' . $attempts);

            return;
        }
        
        // Otherwise, record the attempt
        RateLimiter::hit($throttleKey, $decayMinutes * 60); // Decay time in seconds
        $attempts = RateLimiter::attempts($throttleKey); // Get the number of attempts after hitting

        
        $user = User::where('employee_id', $user_id->employee_id)->first();
        $role_ids = json_decode($user->role_id, true);

        $google2fa = new Google2FA();
    
    
        if ($google2fa->verifyKey($this->secret, $this->otp)) {
            $encryptedSecretKey = Crypt::encryptString($this->secret);
            $user->twofactor_secret = $encryptedSecretKey;
            $user->twofactor_approved = True;
            $user->save();
            $userDevice = new UserDevices;
            $userDevice->user_id = $user->employee_id;
            $userDevice->expires_at = now()->addMonths(2);
            $userDevice->last_used_at = now();
            $userDevice->save();

            // Cookie::queue('device_guid', $userDevice->device_guid, 43200);
            $cookieName = 'device_guid_' . $user->employee_id;
            Cookie::queue(Cookie::make($cookieName, $userDevice->device_guid, 43200));
            RateLimiter::clear($throttleKey);
            // Cookie::queue(Cookie::make('device_guid', $userDevice->device_guid, 43200, null, null, true, true));
            if(in_array($role_ids, 1)){
                return redirect()->to(route('EmployeeDashboard'));
            }
            return redirect()->to(route('LoginDashboard'));
        } else {
            $this->addError('otp', 'Wrong OTP.');
        }
    }

    public function render()
    {
        return view('livewire.auth.two-factor')->layout('components.layouts.loginlayout');
    }
}
