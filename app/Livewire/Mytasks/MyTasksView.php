<?php

namespace App\Livewire\Mytasks;

use App\Models\Mytasks;
use Livewire\Component;
use App\Models\Employee;
use Illuminate\Support\Facades\Log;
use Illuminate\Auth\Access\AuthorizationException;

class MyTasksView extends Component
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

    public $owner;
    public $status;

    public $loggedInUser;

    public function mount($index){
        $loggedInUser = auth()->user();
        $this->loggedInUser = $loggedInUser;

        try {
            $task = $this->editForm($index);
            // $this->authorize('update', [$leaverequest]);
            if (is_null( $task)) {
                return redirect()->to(route('TasksTable'));
            }
            $target_employees = json_decode($task->target_employees);
            if(!in_array($loggedInUser, $target_employees) && $task->employee_id != $loggedInUser->employee_id){
                return redirect()->to(route('TasksTable'));
            }
        } catch (AuthorizationException $e) {
            return redirect()->to(route('TasksTable'));
            abort(404);
        }

        $this->index = $index;


        $employeeRecord = Employee::select('first_name', 'middle_name', 'last_name', 'department',  'employee_email')
                                    ->where('employee_id', $loggedInUser->employee_id)
                                    ->first(); 
        $this->owner = $task->employee_id == $loggedInUser->employee_id ? True : False;
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
        $this->status = $task->status;
        
        $this->task_title = $task->task_title;
        $this->assigned_task = $task->assigned_task;
        $this->start_time = $task->start_time;
        $this->end_time = $task->end_time;
    }


    public function editForm($index){
        $loggedInUser = auth()->user()->employee_id;
        $task = Mytasks::whereJsonContains('target_employees', auth()->user()->employee_id)->where('uuid', $index)->first();

        if(!$task){
            return ;
        }
        return $task ;
    }

    public function changeStatus(){
        $loggedInUser = auth()->user();
        try {
            $form = Mytasks::where('uuid', $this->index)->first();
            if($form){
                if($form->employee_id == $loggedInUser->employee_id){
                    if($this->status == "Cancelled"){
                        $dataToUpdate = ['status' => 'Cancelled',
                            'cancelled_at' => now()];
                    } else {
                        $dataToUpdate = ['status' => $this->status];
                    }
                    $form->update($dataToUpdate);
                    $this->dispatch('trigger-success'); 
                    return redirect()->to(route('TasksTable'));
                }
            } else {
                $this->dispatch('trigger-error'); 
            }
        } catch (\Exception $e) {
            // Log the exception for further investigation
            Log::channel('tasks')->error('Failed to update Task Status: ' . $e->getMessage().' | ' . $loggedInUser->employee_id);
            
            // Dispatch a failure event with an error message
            $this->dispatch('trigger-error');

        }
       
    }

    
    public function render()
    {
        // try {
        //     $task = $this->editForm($this->index);
        //     if (is_null( $task)) {
        //         redirect()->to(route('TasksTable'));
        //     }
        // } catch (AuthorizationException $e) {
        //     redirect()->to(route('TasksTable'));
        //     abort(404);
        // }

        return view('livewire.mytasks.my-tasks-view');
    }
}
