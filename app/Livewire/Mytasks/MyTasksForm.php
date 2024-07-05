<?php

namespace App\Livewire\Mytasks;

use Carbon\Carbon;
use App\Models\Mytasks;
use Livewire\Component;
use App\Models\Employee;

class MyTasksForm extends Component
{
    
    public $date;
    public $first_name;
    public $middle_name;
    public $last_name;
    public $department_name;
    public $task_title;
    public $assigned_task;
    public $target_employee_id;
    public $email;


    public $employeeNames = [];
    public $target_employees = [];

    public $start_time;
    public $end_time;

    public function mount(){
        $loggedInUser = auth()->user();
        $employeeRecord = Employee::select('first_name', 'middle_name', 'last_name', 'department',  'employee_email')
                                    ->where('employee_id', $loggedInUser->employee_id)
                                    ->first(); 
        $this->first_name = $employeeRecord->first_name;
        $this->middle_name = $employeeRecord->middle_name;
        $this->last_name = $employeeRecord->last_name;
        $this->department_name = $employeeRecord->department;
        $this->email = $employeeRecord->employee_email;

        $employees = Employee::select('first_name', 'middle_name', 'last_name', 'employee_id')->where('employee_id', '!=', $loggedInUser->employee_id)->get();
        foreach($employees as $employee){
            $fullName = $employee->first_name . ' ' .  $employee->middle_name . ' ' . $employee->last_name . ' | ' . $employee->employee_id;
            $this->employeeNames[] = $fullName;
        }

    }

    // protected $rules = [
    //     'mode_of_application' => 'required|in:Others,Vacation Leave,Mandatory/Forced Leave,Sick Leave,Maternity Leave,Paternity Leave,Special Privilege Leave,Solo Parent Leave,Study Leave,10-Day VAWC Leave,Rehabilitation Privilege,Special Leave Benefits for Women,Special Emergency Leave,Adoption Leave',
    //     'type_of_leave_others' => 'required_if:mode_of_application,Others|max:100',
    //     'type_of_leave_sub_category' => 'nullable|in:Others,Within the Philippines,Abroad,Out Patient,Special Leave Benefits for Women,Completion of Master\'s degree,BAR/Board Examination Review,Monetization of leave credits,Terminal Leave,In Hospital, Others',
    //     'type_of_leave_assigned_task' => 'required_if:type_of_leave_sub_category,Others|min:10|max:500',
    //     'inclusive_start_date' => 'required|after_or_equal:application_date|before_or_equal:inclusive_end_date',
    //     'inclusive_end_date' => 'required|after_or_equal:inclusive_start_date',
    //     // 'num_of_days_work_days_applied' => 'required|lte:available_credits',
    //     'commutation' => 'required|in:not requested,requested',
    //     'commutation_signature_of_appli' => 'required|mimes:jpg,png,pdf|extensions:jpg,png,pdf|max:5120'
    // ];

    protected $validationAttributes = [
        'mode_of_application' => 'Mode of Application',
        'type_of_leave_others' => 'Others',
        'type_of_leave_sub_category' => 'Sub Category',
        'type_of_leave_assigned_task' => 'Leave Description',
    ];


    public function submit(){
        // foreach($this->rules as $rule => $validationRule){
        //     $this->validate([$rule => $validationRule]);
        //     $this->resetValidation();
        // }   

        // if (in_array($this->type_of_leave, ['Vacation Leave', 'Mandatory/Forced Leave', 'Sick Leave'])) {
        //     $this->validate(['num_of_days_work_days_applied' => 'required|lte:available_credits',]);
        // }
        
        $loggedInUser = auth()->user();

        $task = new Mytasks();

        $employeeIds = array_map(function($employee) {
            $parts = explode(' | ', $employee);
            return trim($parts[1]);
        }, $this->target_employees);

        $task->employee_id = $loggedInUser->employee_id;
        $task->status = "Pending";
        $task->application_date = now();
        $task->task_title = $this->task_title;
        $task->target_employees = json_encode($employeeIds);
        $task->assigned_task = $this->assigned_task;
        $task->start_time = $this->start_time;
        $task->end_time = $this->end_time;

        $task->save();

        $this->js("alert('Task Assigned!')"); 


        return redirect()->to(route('TasksTable'));

    }

    public function render()
    {
        return view('livewire.mytasks.my-tasks-form')->extends('components.layouts.app');
    }
}
