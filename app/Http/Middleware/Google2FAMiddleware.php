<?php

namespace App\Http\Middleware;

use Closure;
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
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // // Skip OTP check for OTP verification route
        // if ($request->routeIs('MFAVerify')) {
        //     $url = URL::temporarySignedRoute('MFAVerify', now()->addMinutes(10));
        //     return redirect()->to($url);
        // }
    
        $user = Auth::user();
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

        return $next($request);
    }
}
