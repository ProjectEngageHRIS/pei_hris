<?php

namespace App\Livewire\Passwordchange;

use App\Models\User;
use Livewire\Component;
use App\Mail\PasswordChanged;
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

        if (Hash::check($this->old_password, $user->password)) {
            $user->password = Hash::make($this->password);
            $user->save();

            // Send email notification
            Mail::to($user->email)->send(new PasswordChanged($user));

            session()->flash('message', 'Password changed successfully! Check your email for confirmation.');
            return redirect()->to('/employee');
        } else {
            $this->addError('old_password', 'The current password is incorrect.');
        }
    }

    public function render()
    {
        return view('livewire.passwordchange.change-password');
    }
}
