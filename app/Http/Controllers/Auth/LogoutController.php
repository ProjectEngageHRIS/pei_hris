<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Providers\RouteServiceProvider;

class LogoutController extends Controller
{
    public function __invoke(Request $request): RedirectResponse
    {   
        Auth::logout();

        $request->session()->invalidate();
 
        // $request->session()->regenerateToken();

        return redirect()->to(route('home'));
    }
}
