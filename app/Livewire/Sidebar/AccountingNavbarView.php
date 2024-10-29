<?php

namespace App\Livewire\Sidebar;

use Livewire\Component;
use App\Models\Employee;
use Illuminate\Support\Facades\Storage;

class AccountingNavbarView extends Component
{
    #[Locked]
    public $role;

    public $employeeName;

    public $employeeEmail;

    public $head;

    public $departmentHeadId ;

    public $collegeDeanId;

    public $is_admin;

    public $employee_id;

    public $employee_name;

    public $role_ids;

    public $employeeImage;

    public $personal_email;

    public $department;


    public function mount(){
        $loggedInUser = auth()->user();
        $role_ids = json_decode($loggedInUser->role_id, true);
        $this->role_ids = $role_ids;
        $this->is_admin = $loggedInUser->is_admin;
        // $this->role = (int) Employee::where('employee_id', $loggedInUser->employee_id)->value('employee_role');
        $employee = Employee::where('employee_id', $loggedInUser->employee_id)->first(); 
        $this->employee_name = $employee->first_name;
        $this->personal_email = $employee->personal_email;
        $this->department = $employee->department;

        // dd($employee);
        // dd($this->role);
        $this->employeeImage = $employee->emp_image;
        $this->employeeName = $employee->first_name. ' ' . $employee->middle_name . ' ' . $employee->last_name;
        $this->employeeEmail = $loggedInUser->email;


        $this->role = $loggedInUser->role_id;
        $this->employee_id = $loggedInUser->employee_id;
        // dd($this->departmentHeadId, $this->collegeDeanId, $this->role);

    }

    public function getImage(){
        $image = Storage::disk('local')->get($this->employeeImage);
        return $image;
    }

    public function hrtickets(){
        return redirect()->to(route('HrTicketsTable'));
    }

    public function render()
    {
        return view('livewire.sidebar.accounting-navbar-view');
    }
}
