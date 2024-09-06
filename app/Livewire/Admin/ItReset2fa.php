<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use App\Models\Employee;
use App\Mail\PasswordChanged;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rules\Password;

class ItReset2fa extends Component
{
    public $email;
    public $old_password;
    public $password;
    public $password_confirmation;
    public $resendDisabled = true;

    public $employeeNames;
    public $selectedEmployee;


    public function mount(){
        $employees = Employee::select('first_name', 'middle_name', 'last_name', 'employee_id')->get();
        foreach($employees as $employee){
            $fullName = $employee->first_name . ' ' .  $employee->middle_name . ' ' . $employee->last_name . ' | ' . $employee->employee_id;
            $this->employeeNames[] = $fullName;
        }
    }

    // protected $rules = [
    //     'selectedEmployee' => 'required|regex:/^[A-Za-z\s]+ \| SLE[A-Z]?\d{4}$/',   
    // ];
    

    public function reset2FA()
    {
        // $this->validate();

        $user = auth()->user();
        // dd($user->role_id == 061024 && $user->employee_id == 200000000);
        try {
            if(Auth::check() && $user->role_id == 61024 && $user->employee_id == "SLEA9999"){
                $parts = explode(' | ', $this->selectedEmployee);
                $employee_id = trim($parts[1]);
                // $this->validate(['employeeId' => 'required|regex:/^SLE[A-Z]?\d{4}$/']);
                $target_employee = User::where('employee_id', $employee_id)->first();
                $target_employee->twofactor_secret = Null;
                $target_employee->twofactor_approved = False;
                $target_employee->save();
    
                $this->dispatch('trigger-success');
    
                // Send email notification
                // Mail::to($user->email)->send(new PasswordChanged($user));
    
                return redirect()->to(route('ItDashboard'));
            } else {
                throw new \Exception('Unauthorized Access');
            }   
        } catch (\Exception $e) {
            // Log the exception for further investigation
            Log::channel('it_reset_2fa')->error('Failed to Reset OTP: ' . $e->getMessage() . ' | ' . $user->employee_id);

            // Dispatch a failure event with an error message
            $this->dispatch('trigger-error');
        }
    }
    
    public function render()
    {
        return view('livewire.admin.it-reset2fa')->layout('components.layouts.it-navbar');
    }
}