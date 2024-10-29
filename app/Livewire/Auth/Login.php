<?php

namespace App\Livewire\Auth;

use Request;
use App\Models\User;
use Livewire\Component;
use App\Models\Employee;
use App\Models\UserDevices;
use App\Events\bannedAccount;
use Illuminate\Support\Facades\Log;
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

        $throttleKey = strtolower($this->email);
        $maxAttempts = 5; // Maximum number of attempts allowed
        $decayMinutes = 1; // Time period in minutes to limit the attempts
        $ip = Request::getClientIp(true);
        
        // Check if too many attempts have been made
        if (RateLimiter::tooManyAttempts($throttleKey, $maxAttempts)) {
            $retryAfter = RateLimiter::availableIn($throttleKey);
            $attempts = RateLimiter::attempts($throttleKey);
            Log::channel('loginlog')->warning('Too many login attempts for ' . $this->email . '. Please try again in ' . $retryAfter . ' seconds. From IP: ' . $ip . ' | Attempts: ' . $attempts);
            $this->addError('email', 'Too many login attempts. Please try again in ' . $retryAfter . ' seconds.');
            $this->tooManyLoginAttempts = true;
            return;
        }
        
        // Record the attempt
        RateLimiter::hit($throttleKey, $decayMinutes * 60); // Decay time in seconds
        $attempts = RateLimiter::attempts($throttleKey); // Get the number of attempts after hitting
        // Log::channel('loginlog')->info('Login attempt recorded for ' . $this->email . ' at ' . now() . ' From IP: ' . $ip . ' | Attempts: ' . $attempts);
        
        // Check if the credentials are valid
        if (Auth::attempt(['employee_id' => $this->email, 'password' => $this->password], $this->remember)) {
            // For example, you might want to check for a valid device GUID here
            Log::channel('loginlog')->info('Successful login for user ' . $this->email . ' from IP ' . $ip);
            
            $cookieName = 'device_guid_' . $this->email;
            $deviceGuid = Cookie::get($cookieName);
            $user = auth()->user();
            
            if($user->banned_flag == 1) {
                $this->addError('email', trans('auth.failed'));
                Log::channel('loginlog')->info('User with banned account tried to login ' . $this->email . ' from IP ' . $ip);
                Auth::logout();
                session()->invalidate();
                return;
            } 
            else if($user->role_id == 61024) {
                if ($deviceGuid != null && $user->twofactor_secret != null && $user->twofactor_approved != null) {
                    RateLimiter::clear($throttleKey);
                    if ($this->isValidDevice($this->email, $deviceGuid)) {
                        return redirect()->route('LoginDashboard');
                    } else {
                        session(['auth_user_id' => $this->email]);
                        $url = URL::temporarySignedRoute('MFAVerify', now()->addMinutes(10));
                        return redirect()->to($url);
                    }
                } else {
                    session(['auth_user_id' => $this->email]);
                    $url = URL::temporarySignedRoute('MFAVerify', now()->addMinutes(10));
                    return redirect()->to($url);
                }
            } else {
                $employee = Employee::where('employee_id', $user->employee_id)->select('employee_id', 'active')->first();
                if($employee->active != 1){
                    Auth::logout();
                    session()->invalidate();
                    $this->addError('email', trans('auth.failed'));
                    Log::channel('loginlog')->info('User with deactivated account tried to login ' . $this->email . ' from IP ' . $ip);
                    return;
                }
            }
        
            if ($user->role_id == 1) {
                return redirect()->route('EmployeeDashboard');
            }
            return redirect()->route('LoginDashboard');
        } else {
            // Invalid credentials
            Log::channel('loginlog')->error('Failed login attempt for user ' . $this->email . ' from IP ' . $ip);
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
