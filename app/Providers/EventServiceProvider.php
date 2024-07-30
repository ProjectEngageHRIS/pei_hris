<?php

namespace App\Providers;

use App\Events\bannedAccount;
use App\Events\changePassword;
use App\Events\HrDtrEvent;
use App\Events\otpInputAttempt;
use App\Events\ResetPasswordSendOtp;
use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use App\Events\ResetPasswordSendOtpSuccessful;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        \Illuminate\Auth\Events\Login::class => [
            \App\Listeners\LoginActivityListener::class.'@login',
        ],
        \Illuminate\Auth\Events\Logout::class => [
            \App\Listeners\LoginActivityListener::class.'@logout',
        ],
        // \Illuminate\Auth\Events\Registered::class => [
        //     \Illuminate\Auth\Listeners\SendEmailVerificationNotification::class,
        //     \App\Listeners\LoginActivityListener::class.'@registered',
        // ],
        \Illuminate\Auth\Events\Failed::class => [
            \App\Listeners\LoginActivityListener::class.'@failed',
        ],
        ResetPasswordSendOtp::class => [
            \App\Listeners\LoginActivityListener::class.'@changePasswordOtpFailed',
        ],
        ResetPasswordSendOtpSuccessful::class => [
            \App\Listeners\LoginActivityListener::class.'@changePasswordOtpSuccessful',
        ],
        otpInputAttempt::class => [
            \App\Listeners\LoginActivityListener::class.'@otpAttempt'
        ],
        changePassword::class => [
            \App\Listeners\LoginActivityListener::class.'@changedPassword'
        ],
        bannedAccount::class => [
            \App\Listeners\LoginActivityListener::class.'@bannedAccount'
        ],
        HrDtrEvent::class => [
            \App\Listeners\LoginActivityListener::class.'@HrDtrListener'
        ],
        // \Illuminate\Auth\Events\PasswordReset::class => [
        //     \App\Listeners\LoginActivityListener::class.'@passwordReset',
        // ],
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
