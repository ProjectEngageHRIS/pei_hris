<?php

namespace App\Livewire\Mytasks\Assignedtasks;

use App\Models\Mytasks;
use Livewire\Component;
use App\Models\Employee;
use Illuminate\Auth\Access\AuthorizationException;

class AssignedTasksView extends Component
{
    
    public $date;
    public $first_name;
    public $middle_name;
    public $last_name;
    public $department_name;
    public $description;
    public $email;

    public $index;

    public $employeeNames = [];
    public $target_employees = [];

    public $task_title;
    public $form_id;

    public $assigned_task;
    public $start_time;
    public $end_time;

    public function mount($index){
        $loggedInUser = auth()->user();

        try {
            $task = $this->editForm($index);
            // $this->authorize('update', [$leaverequest]);
        } catch (AuthorizationException $e) {
            return redirect()->to(route('LeaveRequestTable'));
            abort(404);
        }
        $this->index = $index;

        $employeeRecord = Employee::select('first_name', 'middle_name', 'last_name', 'department',  'employee_email')
                                    ->where('employee_id', $loggedInUser->employee_id)
                                    ->first(); 
        $this->first_name = $employeeRecord->first_name;
        $this->middle_name = $employeeRecord->middle_name;
        $this->last_name = $employeeRecord->last_name;
        $this->department_name = $employeeRecord->department;
        $this->email = $employeeRecord->employee_email;

        $this->first_name = $employeeRecord->first_name;
        $this->middle_name = $employeeRecord->middle_name;
        $this->last_name = $employeeRecord->last_name;
        $this->department_name = $employeeRecord->department;
        $this->email = $employeeRecord->employee_email;

        $selectedEmployees = [];
        $task->target_employees = json_decode($task->target_employees, true);

        $employees = Employee::select('first_name', 'middle_name', 'last_name', 'employee_id')->get();
        foreach($employees as $employee){
            $fullName = $employee->first_name . ' ' .  $employee->middle_name . ' ' . $employee->last_name . ' | ' . $employee->employee_id;
            $this->employeeNames[] = $fullName;
        }
        foreach($this->employeeNames as $employee){
            $employee_id = explode('| ', $employee);
            if(in_array($employee_id[1], $task->target_employees)){
                $selectedEmployees[] = $employee;
            }
        }

        $this->target_employees = $selectedEmployees;

        $this->form_id = $task->form_id;
        
        $this->task_title = $task->task_title;
        $this->assigned_task = $task->assigned_task;
        $this->start_time = $task->start_time;
        $this->end_time = $task->end_time;




    }


    public function editForm($index){
        $loggedInUser = auth()->user()->employee_id;
        $task =  Mytasks::where('employee_id', auth()->user()->employee_id)->where('uuid', $index)->first();
        
        if(!$task|| $task->employee_id != $loggedInUser){
            return False;
        }
        return $task ;
    }


    public function render()
    {
        return view('livewire.mytasks.assignedtasks.assigned-tasks-view');
    }
}
