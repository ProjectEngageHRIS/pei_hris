<?php

namespace App\Livewire\Mytasks;

use Carbon\Carbon;
use App\Models\Mytasks;
use Livewire\Component;
use App\Models\Employee;
use App\Mail\TaskRequestSubmitted;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class MyTasksForm extends Component
{
    public $assignee;
    public $date;
    public $my_task;
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

    protected function rules()
    {
        return [
            'target_employees' => [
                'required', 
                'array', 
                'min:1', 
                function ($attribute, $value, $fail) {
                    foreach ($value as $employee) {
                        if (!in_array($employee, $this->employeeNames)) {
                            $fail('The selected ' . $attribute . ' is invalid.');
                        }
                        if (!is_string($employee) || strlen($employee) < 3) {
                            $fail('Each ' . $attribute . ' must be an array and at least 1 array.');
                        }
                    }
                }
            ],
            'task_title' => [
                'required', 
                'string', 
                'min:4'
            ],
            'assigned_task' => [
                'required', 
                'string', 
                'min:5',
                'max:20000'
            ],
            'start_time' => [
                'required', 
                'date',
                function ($attribute, $value, $fail) {
                    if (isset($this->end_time) && strtotime($value) >= strtotime($this->end_time)) {
                        $fail('The ' . $attribute . ' must be before the end time.');
                    }
                }
            ],
            'end_time' => [
                'required', 
                'date',
                function ($attribute, $value, $fail) {
                    if (isset($this->start_time) && strtotime($value) <= strtotime($this->start_time)) {
                        $fail('The ' . $attribute . ' must be after the start time.');
                    }
                }
            ],
        ];
    }

    protected $validationAttributes = [
        'target_employees' => 'Target Employees',
    ];


    public function submit(){
        // foreach($this->rules as $rule => $validationRule){
        //     $this->validate([$rule => $validationRule]);
        //     $this->resetValidation();
        // }   

        // if (in_array($this->type_of_leave, ['Vacation Leave', 'Mandatory/Forced Leave', 'Sick Leave'])) {
        //     $this->validate(['num_of_days_work_days_applied' => 'required|lte:available_credits',]);
        // }

        $this->validate();
        $loggedInUser = auth()->user();
        try {
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

            $assignee = Employee::select('first_name', 'middle_name', 'last_name', 'department','employee_email')
            ->where('employee_id', $loggedInUser->employee_id)
            ->first();


            $targetEmployees = Employee::whereIn('employee_id', $employeeIds)->get();

            // foreach ($targetEmployees as $targetEmployee) {
            //     Mail::to($targetEmployee->employee_email)->send(new TaskRequestSubmitted($assignee, $targetEmployee, $task));
            // }

            $this->dispatch('trigger-success');

            return redirect()->to(route('TasksTable'));
        } catch (\Exception $e) {
            $this->dispatch('trigger-error');

            // Log the exception for further investigation
            Log::channel('tasks')->error('Failed to assign Task: ' . $e->getMessage().' | ' . $loggedInUser->employee_id);
        }

    }

    public function render()
    {
        return view('livewire.mytasks.my-tasks-form')->extends('components.layouts.app');
    }
}
