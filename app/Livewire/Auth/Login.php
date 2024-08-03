<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Livewire\Component;
use App\Models\UserDevices;
use App\Events\bannedAccount;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
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

        // Check if the credentials are valid
        // $credentials = ['employee_id' => $this->email, 'password' => $this->password];
        
        if (Auth::attempt(['employee_id' => $this->email, 'password' => $this->password], $this->remember)) {
            // For example, you might want to check for a valid device GUID here
            $cookieName = 'device_guid_' . $this->email;
            $deviceGuid = Cookie::get($cookieName);
            if ($deviceGuid != null) {
                if ($this->isValidDevice($this->email, $deviceGuid)) {
                    return redirect()->route('LoginDashboard');

                } else {
                    session(['auth_user_id' => $this->email]);
                    $url = URL::temporarySignedRoute('MFAVerify', now()->addMinutes(10));
                    return redirect()->to($url);
                    // return redirect()->route('MFAVerify');
                }
            } else {
                // Handle case where device GUID is not found
                session(['auth_user_id' => $this->email]);
                $url = URL::temporarySignedRoute('MFAVerify', now()->addMinutes(10));
                return redirect()->to($url);
            }
        } else {
            // Invalid credentials
            $this->addError('email', trans('auth.failed'));
        }

        // $deviceGuid = Cookie::get('device_guid');

        // // Check if the email and password are correct
        // if (Auth::attempt(['employee_id' => $this->email, 'password' => $this->password], $this->remember)) {
        //     // Authentication was successful
    
        //     // If device GUID is present, validate it
        //     if ($deviceGuid != null) {
        //         if ($this->isValidDevice($this->email, $deviceGuid)) {
        //             // Device is valid; proceed with login
        //             RateLimiter::clear($throttleKey);
        //             $loggedInUser = auth()->user();
    
        //             if ($loggedInUser->banned_flag != 1) {
        //                 $this->addError('email', 'Your account has been banned. Please contact IT support.');
        //                 return;
        //             }
    
        //             // Redirect based on user role
        //             return $loggedInUser->role_id == 1 
        //                 ? redirect()->route('EmployeeDashboard') 
        //                 : redirect()->route('LoginDashboard');
        //         } else {
        //             // Handle invalid device GUID
        //             $this->addError('email', 'Invalid device.');
        //             return;
        //         }
        //     } else {
        //         // No device GUID; redirect to MFA verification
        //         session(['auth_user_id' => $this->email]);
        //         return redirect()->route('MFAVerify');
        //     }
        // } else {
        //     // Authentication failed
        //     RateLimiter::hit($throttleKey, $cooldown);
        //     if ($attempts >= 1) {
        //         $user = User::where('employee_id', $this->email)->select('employee_id', 'banned_flag')->update(['banned_flag' => 0]);
        //         if ($user) {
        //             $this->addError('email', 'Your account has been banned. Please contact IT support.');
        //             bannedAccount::dispatch($this->email);
        //         } else {
        //             $this->addError('email', trans('auth.failed'));
        //         }
        //     } else {
        //         $this->addError('email', trans('auth.failed'));
        //     }
        //     return;
        // }

        // $deviceGuid = Cookie::get('device_guid');
        // if ($deviceGuid != null) {
        //     dd($deviceGuid);
        //     if($this->isValidDevice($this->email, $deviceGuid)){
        //         if (!Auth::attempt(['employee_id' => $this->email, 'password' => $this->password], $this->remember)) {
        //             RateLimiter::hit($throttleKey, $cooldown);
        //             if ($attempts >= 1) {  // Adjust this number based on your needs
        //                 $user = User::where('employee_id', $this->email)->select('employee_id', 'banned_flag')->update(['banned_flag' => 0]);
        //                 if($user){
        //                     $this->addError('email', 'Your account has been banned. Please contact IT support.');
        //                     bannedAccount::dispatch($this->email);
        //                 } else{
        //                     $this->addError('email', trans('auth.failed'));
        //                 }
        //             } else {
        //                 $this->addError('email', trans('auth.failed'));
        //             }
        //             return;
        //         }
        //         RateLimiter::clear($throttleKey);

        //         $loggedInUser = auth()->user();
        
        //         if($loggedInUser['banned_flag'] != 1){
        //             $this->addError('email', 'Your account has been banned. Please contact IT support.');
        //             return;
        //         }
        //     }
        // }

        // Check if the device is registered and valid
        

        //     if ($loggedInUser['role_id'] == 1) {
        //         return redirect()->route('EmployeeDashboard');
        //     }
        //     return redirect()->route('LoginDashboard');
        // }
    


    }

    private function isValidDevice($userId, $deviceGuid)
    {
        $exists =  UserDevices::where('user_id', $userId)
                            ->where('device_guid', $deviceGuid)
                            ->where('expires_at', '>', now())
                            ->exists();
        return $exists;
    }

    public function render()
    {
        return view('livewire.auth.login')->extends('layouts.auth');
    }
}
