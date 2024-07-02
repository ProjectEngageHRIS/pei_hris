<?php

namespace App\Livewire\Mytasks;

use Carbon\Carbon;
use App\Models\Mytasks;
use Livewire\Component;
use App\Models\Employee;
use App\Models\Ittickets;
use Illuminate\Auth\Access\AuthorizationException;

class MyTasksUpdate extends Component
{
    
    // public $employeeRecord;
    public $date;
    public $first_name;
    public $middle_name;
    public $last_name;
    public $department_name;
    // public $employee_id;
    public $description;
    public $email;

    public $index;

    public $employeeNames = [];
    public $target_employees = [];


    public $task_title;
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
        foreach($task->target_employees as $employee){
            $employee_id = explode('| ', $employee);
            $selectedEmployees[] = $employee_id[1];
        }
        $employees = Employee::select('first_name', 'middle_name', 'last_name', 'employee_id')->get();
        foreach($employees as $employee){
            $fullName = $employee->first_name . ' ' .  $employee->middle_name . ' ' . $employee->last_name . ' | ' . $employee->employee_id;
            $this->employeeNames[] = $fullName;
        }

        $this->task_title = $task->task_title;
        $this->target_employees = $task->target_employees;
        $this->assigned_task = $task->assigned_task;
        $this->start_time = $task->start_time;
        $this->end_time = $task->end_time;




    }


    public function editForm($index){
        $loggedInUser = auth()->user()->employee_id;
        $task =  Mytasks::where('employee_id', auth()->user()->employee_id)->find($index);
        
        if(!$task|| $task->employee_id != $loggedInUser){
            return False;
        }
        return $task ;
    }


    // public function updated($keys){
    //     if(in_array($keys, ['inclusive_start_date', 'inclusive_end_date'])){
    //         $startDate = Carbon::parse($this->inclusive_start_date);
    //         $endDate = Carbon::parse($this->inclusive_end_date);
    //         $num_of_days_work_days_applied = $startDate->diffInDays($endDate);
    //         // $num_of_hours_work_days_applied = $startDate->diffInHours($endDate);
    //         $num_of_seconds_work_days_applied = $startDate->diffInMinutes($endDate);
    //         // dd($num_of_seconds_work_days_applied);
    //         if ($startDate->startOfDay() == $endDate->startOfDay()){
    //             // $conversionValues = [
    //             //     0.002, 0.004, 0.006, 0.008, 0.010, 0.012, 0.015, 0.017, 0.019, 0.021,
    //             //     0.023, 0.025, 0.027, 0.029, 0.031, 0.033, 0.035, 0.037, 0.040, 0.042,
    //             //     0.044, 0.046, 0.048, 0.050, 0.052, 0.054, 0.056, 0.058, 0.060, 0.062,
    //             //     0.065, 0.067, 0.069, 0.071, 0.073, 0.075, 0.077, 0.079, 0.081, 0.083,
    //             //     0.085, 0.087, 0.090, 0.092, 0.094, 0.096, 0.098, 0.100, 0.102, 0.104,
    //             //     0.106, 0.108, 0.110, 0.112, 0.115, 0.117, 0.119, 0.121, 0.123, 0.125,
    //             // ];
    //             $days = $num_of_seconds_work_days_applied / 60;
    //             if($days > 8){
    //                 $days = 8;
    //             }
    //             // dd($seconds, $num_of_seconds_work_days_applied);
    //             // $decimalPart = ($num_of_seconds_work_days_applied - floor($num_of_seconds_work_days_applied)) * 60;
    //             $hoursLeave = $days * 0.125;
                
    //             // $this->$num_of_days_work_days_applied = number_format($hoursLeave , 3);
    //             $this->num_of_days_work_days_applied = number_format($hoursLeave, 3);
    //         }
    //         else{
    //             $dividedValue = $num_of_seconds_work_days_applied / 1440;
    //             $this->num_of_days_work_days_applied = number_format($dividedValue, 3);
    //         }
    //     }

    // }

    // public function removeImage($item){
    //     $this->$item = null;
    // }

    // private function generateRefNumber(){
    //     $today = date('Ymd');

    //     $randomDigits = '';
    //     for ($i = 0; $i < 5; $i++) {
    //         $randomDigits .= random_int(0, 9); // More secure random number generation
    //     }
    //     // Combine the date and random digits
    //     $referenceNumber = $today . $randomDigits;
    //     return $referenceNumber;
    //  }


    // protected $rules = [
    //     'mode_of_application' => 'required|in:Others,Vacation Leave,Mandatory/Forced Leave,Sick Leave,Maternity Leave,Paternity Leave,Special Privilege Leave,Solo Parent Leave,Study Leave,10-Day VAWC Leave,Rehabilitation Privilege,Special Leave Benefits for Women,Special Emergency Leave,Adoption Leave',
    //     'type_of_leave_others' => 'required_if:mode_of_application,Others|max:100',
    //     'type_of_leave_sub_category' => 'nullable|in:Others,Within the Philippines,Abroad,Out Patient,Special Leave Benefits for Women,Completion of Master\'s degree,BAR/Board Examination Review,Monetization of leave credits,Terminal Leave,In Hospital, Others',
    //     'type_of_leave_description' => 'required_if:type_of_leave_sub_category,Others|min:10|max:500',
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
        'type_of_leave_description' => 'Leave Description',
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

        $task =  Mytasks::findOrFail($this->index);

        $task->task_title = $this->task_title;
        $task->target_employees = json_encode($this->target_employees);
        $task->assigned_task = $this->assigned_task;
        $task->start_time = $this->start_time;
        $task->end_time = $this->end_time;

        $task->update();

        $this->js("alert('Task Updated!')"); 


        return redirect()->to(route('TasksTable'));

    }
   
    public function render()
    {
        return view('livewire.mytasks.my-tasks-update')->extends('components.layouts.app');
    }
    
}
