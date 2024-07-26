<?php

namespace App\Listeners;

use App\Events;
use App\Events\bannedAccount;
use App\Events\changePassword;
use App\Events\otpInputAttempt;
use App\Events\ResetPasswordSendOtp;
use App\Events\ResetPasswordSendOtpSuccessful;
use Illuminate\Support\Facades\Log;
use Illuminate\Queue\InteractsWithQueue;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Auth\Events as LaravelEvents;

class LoginActivityListener
{
    public function login(LaravelEvents\Login $event)
    {
        $ip = \Request::getClientIp(true);
        $this->info($event, "User {$event->user->employee_id} logged in from {$ip}", $event->user->only( 'employee_id', 'email'));
    }

    public function logout(LaravelEvents\Logout $event)
    {
        $ip = \Request::getClientIp(true);
        $this->info($event, "User {$event->user->employee_id} logged out from {$ip}", $event->user->only('employee_id', 'email'));
    }

    // public function registered(LaravelEvents\Registered $event)
    // {
    //     $ip = \Request::getClientIp(true);
    //     $this->info($event, "User registered: {$event->user->employee_id} from {$ip}");
    // }

    public function failed(LaravelEvents\Failed $event)
    {
        $ip = \Request::getClientIp(true);
        $this->info($event, "User {$event->credentials['employee_id']} login failed from {$ip}", ['employee_id' => $event->credentials['employee_id'], 'email']);
    }

    public function changePasswordOtpFailed(ResetPasswordSendOtp $event){
        $ip = \Request::getClientIp(true);
        Log::channel('failedotpsend')->info(
            "User with the email of {$event->email} login failed from {$ip}");
    }

    public function changePasswordOtpSuccessful(ResetPasswordSendOtpSuccessful $event){
        $ip = \Request::getClientIp(true);
        Log::channel('successfulotpsend')->info(
            "User with the email of {$event->email} attempted to recover password from {$ip}");
    }

    public function otpAttempt(otpInputAttempt $event){
        $ip = \Request::getClientIp(true);
        Log::channel('successfulotpsend')->info(
            "User with the email of {$event->email} attempted to recover password from {$ip} using OTP as {$event->otp}");
    }

    public function changedPassword(changePassword $event){
        $ip = \Request::getClientIp(true);
        Log::channel('passwordchanged')->info(
            "User with the email of {$event->email} and employee ID of {$event->employee_id} changed password from {$ip}");
    }

    public function bannedAccount(bannedAccount $event){
        
        $ip = \Request::getClientIp(true);
        Log::channel('bannedaccount')->info(
            "User with the employee ID of {$event->employee_id} has been banned from {$ip}");
    }

    

    // public function passwordReset(LaravelEvents\PasswordReset $event)
    // {
    //     $ip = \Request::getClientIp(true);
    //     $this->info($event, "User {$event->user->employee_id} password reset from {$ip}", $event->user->only('id', 'employee_id'));
    // }

    protected function info(object $event, string $message, array $context = [])
    {
        //$class = class_basename($event::class);
        $class = get_class($event);

        Log::channel('loginlog')->info("[{$class}] {$message}", $context);
    }

    // /**
    //  * Create the event listener.
    //  */
    // public function __construct()
    // {
    //     //
    // }

    // /**
    //  * Handle the event.
    //  */
    // public function handle(object $event): void
    // {
    //     //
    // }
}
