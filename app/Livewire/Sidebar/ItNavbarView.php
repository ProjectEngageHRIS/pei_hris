<?php

namespace App\Livewire\Sidebar;

use Livewire\Component;
use App\Models\Employee;
use Illuminate\Support\Facades\Storage;

class ItNavbarView extends Component
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

    public $permissions;

    public $employeeImage;

    public $personal_email;

    public $department;


    public function mount(){
        $loggedInUser = auth()->user();
        $permissions = json_decode($loggedInUser->permissions, true);
        $this->permissions = $permissions;
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

        // // $loggedInEmployeeData = Employee::where('employee_id', $loggedInUser->employee_id)->first();
        // // $this->head = explode(',', $employee->is_department_head_or_dean[0] ?? ' ') ?? [];
        // foreach($employee->is_department_head as $department_head){
        //     if($department_head == 1){
        //         $this->departmentHeadId = 1;
        //     }
        // }
        // foreach($employee->is_college_head as $college_head){
        //     if($college_head == 1){
        //         $this->collegeDeanId = 1;
        //     }
        // }

        $this->employee_id = $loggedInUser->employee_id;
        // dd($this->departmentHeadId, $this->collegeDeanId, $this->role);

    }

    public function getImage(){
        $image = Storage::disk('local')->get($this->employeeImage);
        return $image;
    }
    
    public function render()
    {
        return view('livewire.sidebar.it-navbar-view');
    }
}
