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

class ItChangePassword extends Component
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

    protected $rules = [
        // 'email' => 'required|email',
        // 'old_password' => 'required|string',
        'password' => 'required|string|min:8|confirmed',
        // 'selectedEmployee' => 'required|regex:/^[A-Za-z\s]+ \| SLE[A-Z]?\d{4}$/',   
    ];
    

    public function changePassword()
    {
        // $this->validate();
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
        $role_ids = json_decode($user->role_id, true);
        // dd($user->role_id == 061024 && $user->employee_id == 200000000);
        try {
            
            if(Auth::check() && in_array(61024, $role_ids) && $user->employee_id == "SLEA9999"){
                $parts = explode(' | ', $this->selectedEmployee);
                $employee_id = trim($parts[1]);
                // $this->validate(['employeeId' => 'required|regex:/^SLE[A-Z]?\d{4}$/']);
                $target_employee = User::where('employee_id', $employee_id)->first();
                $target_employee->password = Hash::make($this->password);
                $target_employee->save();
                
                $this->logoutAllDevicesForUser($target_employee);
    
                $this->dispatch('trigger-success');
    
                // Send email notification
                // Mail::to($user->email)->send(new PasswordChanged($user));
    
                return redirect()->to(route('ItDashboard'));
            } else {
                throw new \Exception('Unauthorized Access');
            }   
        } catch (\Exception $e) {
            // Log the exception for further investigation
            Log::channel('it_change_password')->error('Failed to update Password: ' . $e->getMessage() . ' | ' . $user->employee_id);

            // Dispatch a failure event with an error message
            $this->dispatch('trigger-error');
        }
    }

    protected function logoutAllDevicesForUser($target_employee)
    {
        // Get the current session ID
        $currentSessionId = session()->getId();
    
        // Invalidate all sessions for the specified user, excluding the current session
        if (\Schema::hasTable('sessions')) {
            \DB::table('sessions')
                ->where('user_id', $target_employee->employee_id)
                ->where('id', '!=', $currentSessionId) // Exclude the current session
                ->delete();
        }
    }
    

    
    
    public function render()
    {
        return view('livewire.admin.it-change-password')->layout('components.layouts.it-navbar');
    }
}
