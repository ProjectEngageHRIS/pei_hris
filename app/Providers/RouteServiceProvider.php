<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     */
    public function boot(): void
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->group(base_path('routes/web.php'));
        });
    }

    /**
     * Configure the rate limiters for the application.
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('login', function (Request $request) {
            $throttleKey = strtolower($request->email) . '|' . $request->ip();
            return $this->getIncrementalLimits($throttleKey);
        });
    }

    protected function getIncrementalLimits($throttleKey)
    {
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
        $limitSeconds = $limits[$index] / 60;

        return Limit::perMinutes($limitSeconds)->by($throttleKey);
    }
}
