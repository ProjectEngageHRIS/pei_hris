<?php

namespace App\Livewire\Sidebar;

use Livewire\Component;
use App\Models\Employee;
use Illuminate\Support\Facades\Storage;

class LoginNavbar extends Component
{
    public $role;

    public $employeeImage;

    public $employeeName;

    public $employeeEmail;

    public $head;

    public $departmentHeadId ;

    public $collegeDeanId;

    public $is_admin;

    public $employee_id;

    public $permissions;

    public $employee_name;

    public $department;

    public $personal_email;

    public function mount(){
        $loggedInUser = auth()->user();
        $this->permissions = $loggedInUser->permissions;
        $this->is_admin = $loggedInUser->is_admin;
        // $this->role = (int) Employee::where('employee_id', $loggedInUser->employee_id)->value('employee_role');

        $employee = Employee::where('employee_id', $loggedInUser->employee_id)->first(); 
        $this->employee_name = $employee->first_name;
        $this->personal_email = $employee->personal_email;
        $this->department = $employee->department;

        // dd($this->role);
        $this->employeeImage = $employee->emp_image;
        $this->employeeName = $employee->first_name. ' ' . $employee->middle_name . ' ' . $employee->last_name;
        $this->employeeEmail = $loggedInUser->email;


        $this->role = $loggedInUser->permissions;
        $this->employee_id = $loggedInUser->employee_id;

    }

    public function getImage(){
        $image = Storage::disk('local')->get($this->employeeImage);
        return $image;
    }
    
    
    public function render()
    {
        return view('livewire.sidebar.login-navbar');
    }
}
