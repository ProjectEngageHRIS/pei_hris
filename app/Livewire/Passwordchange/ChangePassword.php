<?php

namespace App\Livewire\Passwordchange;

use App\Models\User;
use Livewire\Component;
use App\Mail\PasswordChanged;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rules\Password;

class ChangePassword extends Component
{
    public $email;
    public $old_password;
    public $password;
    public $password_confirmation;
    public $resendDisabled = true;

    protected $rules = [
        'email' => 'required|email',
        'old_password' => 'required|string',
        'password' => 'required|string|min:8|confirmed',
    ];

    public function changePassword()
    {   
        $this->validate([
            'password' => [
                'required',
                'string',
                Password::min(8)
                    ->mixedCase()
                    ->numbers()
                    ->symbols()
                    ->uncompromised(),
                'confirmed'
            ],
        ]);


        $user = auth()->user();

        try {
            if (Hash::check($this->old_password, $user->password)) {
                $user->password = Hash::make($this->password);
                $user->save();

                Auth::logoutOtherDevices($this->password);
    
                // Send email notification
                Mail::to($user->email)->send(new PasswordChanged($user));
    
                $this->dispatch('trigger-success');
    
                // session()->flash('message', 'Password changed successfully! Check your email for confirmation.');
                Log::channel('employee_change_password')->error('Successfully Updated  Password: ' . ' | ' . $user->employee_id);

                return redirect()->to('/employee');
            } else {
                $this->addError('old_password', 'The current password is incorrect.');
            }
        } catch (\Exception $e) {
            // Log the exception for further investigation
            Log::channel('employee_change_password')->error('Failed to update Password: ' . $e->getMessage() . ' | ' . $user->employee_id);

            // Dispatch a failure event with an error message
            $this->dispatch('trigger-error');
        }
    }

    public function render()
    {
        return view('livewire.passwordchange.change-password');
    }
}
