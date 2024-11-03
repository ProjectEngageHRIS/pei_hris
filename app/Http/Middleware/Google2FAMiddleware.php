<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Employee;
use App\Models\UserDevices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Symfony\Component\HttpFoundation\Response;

class Google2FAMiddleware
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = auth()->user();
        $permissions = json_decode($user->permissions, true); // Decode JSON into an array
        if(in_array(61024, $permissions)){
            if (!Auth::check()) {
                return redirect()->route('login');
            }
    
            // // Skip OTP check for OTP verification route
            // if ($request->routeIs('MFAVerify')) {
            //     $url = URL::temporarySignedRoute('MFAVerify', now()->addMinutes(10));
            //     return redirect()->to($url);
            // }
        
            $deviceGuid = Cookie::get('device_guid_' . $user->employee_id);
        
            // Check if device GUID exists and is valid
            $userDevice = UserDevices::where('user_id', $user->employee_id)
                ->where('device_guid', $deviceGuid)
                ->where('expires_at', '>', now())
                ->first();
        
            if (!$userDevice || $user->twofactor_secret == null || $user->twofactor_approved == null) {
                // Redirect to OTP verification route
                $url = URL::temporarySignedRoute('MFAVerify', now()->addMinutes(10));
                return redirect()->to($url);
                // return $next($request);
            }

    
            // Optionally, update last used time
            $userDevice->last_used_at = now();
            $userDevice->save();
        } else {
            $employee = Employee::where('employee_id', $user->employee_id)->select('employee_id', 'active')->first();
            if($employee->active != 1){
                Auth::logout();
                $request->session()->invalidate();
                return redirect()->route('home');
            }
        }
        
        return $next($request);
    }
}
