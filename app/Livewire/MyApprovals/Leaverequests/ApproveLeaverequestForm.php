<?php

namespace App\Livewire\MyApprovals\Leaverequests;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\Employee;
use App\Models\Leaverequest;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Auth\Access\AuthorizationException;

class ApproveLeaverequestForm extends Component
{
    use WithFileUploads;
    
    // public Leaverequest $leaverequest;

    // public $employeeRecord;
    public $date;
    public $first_name;
    public $middle_name;
    public $last_name;
    public $department_name;
    public $available_credits;
    public $current_position;
    public $salary;

    public $status;


    public $employee_id;
    public $application_date;
    public $mode_of_application;
    public $type_of_leave_others;
    public $type_of_leave_sub_category;
    public $type_of_leave_description;
    public $num_of_days_work_days_applied;
    public $inclusive_start_date;
    public $inclusive_end_date;
    public $commutation;
    public $commutation_signature_of_appli;
    public $total_earned_vaca;
    public $less_this_appli_vaca;
    public $balance_vaca;
    public $total_earned_sick;
    public $less_this_appli_sick;
    public $balance_sick;
    public $as_of_filling;
    public $auth_off_sig_a;
    public $status_description;
    public $auth_off_sig_b;
    public $days_with_pay;
    public $days_without_pay;
    public $others;
    public $disapprove_reason;
    public $auth_off_sig_c_and_d;

    public $is_faculty;

    public $index;

    public $reason;

    public $supervisor_email;

    public $date_earned;
    public $earned_description;
    public $purpose_type;


    public $deduct_to;



    public function mount($index){
        $loggedInUser = auth()->user();

        // if($loggedInUser->role_id != 9){
        //     return redirect()->to(route('home'));
        //     abort(404);
        // }

        try {
            $leaverequest = $this->editLeaveRequest($index);
            $this->authorize('update', [$leaverequest]);
        } catch (AuthorizationException $e) {
            return redirect()->to(route('LeaveRequestTable'));
            abort(404);
        }

        $this->index = $index;
        
        $employeeRecord = Employee::select('first_name', 'middle_name', 'last_name', 'department', 'employee_id', 'current_position', 'salary', 'vacation_credits', 'sick_credits', 'is_faculty')
                                    ->where('employee_id', $loggedInUser->employee_id)
                                    ->first();   

        // $departmentName = DB::table('departments')->where('department_id', $employeeRecord->department_id)->value('department_name');
        
        $this->available_credits = $employeeRecord->vacation_credits + $employeeRecord->sick_credits;
        $this->employee_id = $employeeRecord->employee_id;
        $this->first_name = $employeeRecord->first_name;
        $this->middle_name = $employeeRecord->middle_name;
        $this->last_name = $employeeRecord->last_name;
        $this->department_name = $employeeRecord->department;
        // $this->current_position = $employeeRecord->current_position;
        // $this->salary = $employeeRecord->salary;
        // $this->is_faculty = $employeeRecord->is_faculty;

        $this->application_date = $leaverequest->application_date;
        $this->mode_of_application = $leaverequest->mode_of_application;
        $this->supervisor_email = $leaverequest->supervisor_email;
        $this->num_of_days_work_days_applied = $leaverequest->num_of_days_work_days_applied;
        $this->inclusive_start_date = $leaverequest->inclusive_start_date;
        $this->inclusive_end_date = $leaverequest->inclusive_end_date;
        $this->date_earned = $leaverequest->date_earned;
        $this->earned_description = $leaverequest->earned_description;
        $this->commutation = $leaverequest->commutation;
        $this->purpose_type = $leaverequest->purpose_type;
        $this->reason = $leaverequest->reason;
        $this->deduct_to = $leaverequest->deduct_to;

        if($leaverequest->commutation_signature_of_appli){
            $this->commutation_signature_of_appli = " ";
        }

       
    }

    public function editLeaveRequest($index){
        // $leaverequest =  Leaverequest::find($this->index);
        $loggedInUser = auth()->user()->employee_id;
        $leaverequest =  Leaverequest::where('employee_id', auth()->user()->employee_id)->find($index);
        
        if(!$leaverequest || $leaverequest->employee_id != $loggedInUser){
            return False;
        }
        // $this->leaverequest = $leaverequest;
        return $leaverequest;
    }

    // public function getApplicantSignature(){
    //     $imageFile = $this->editLeaveRequest($this->index);
    //     return $imageFile->commutation_signature_of_appli;
    // }

    public function updated($keys){
        if(in_array($keys, ['inclusive_start_date', 'inclusive_end_date'])){
            $startDate = Carbon::parse($this->inclusive_start_date);
            $endDate = Carbon::parse($this->inclusive_end_date);
            // $num_of_days_work_days_applied = $startDate->diffInDays($endDate);
            // $num_of_hours_work_days_applied = $startDate->diffInHours($endDate);
            $num_of_seconds_work_days_applied = $startDate->diffInMinutes($endDate);
            // dd($num_of_seconds_work_days_applied);
            if ($startDate->startOfDay() == $endDate->startOfDay()){
                // $conversionValues = [
                //     0.002, 0.004, 0.006, 0.008, 0.010, 0.012, 0.015, 0.017, 0.019, 0.021,
                //     0.023, 0.025, 0.027, 0.029, 0.031, 0.033, 0.035, 0.037, 0.040, 0.042,
                //     0.044, 0.046, 0.048, 0.050, 0.052, 0.054, 0.056, 0.058, 0.060, 0.062,
                //     0.065, 0.067, 0.069, 0.071, 0.073, 0.075, 0.077, 0.079, 0.081, 0.083,
                //     0.085, 0.087, 0.090, 0.092, 0.094, 0.096, 0.098, 0.100, 0.102, 0.104,
                //     0.106, 0.108, 0.110, 0.112, 0.115, 0.117, 0.119, 0.121, 0.123, 0.125,
                // ];
                $days = $num_of_seconds_work_days_applied / 60;
                if($days > 8){
                    $days = 8;
                }
                $hoursLeave = $days * 0.125;
                $this->num_of_days_work_days_applied = number_format($hoursLeave, 3);
            }
            else{
                $dividedValue = $num_of_seconds_work_days_applied / 1440;
                $this->num_of_days_work_days_applied = number_format($dividedValue, 3);
            }
        }

    }
    
    protected $rules = [
        'mode_of_application' => 'required|in:Others,Vacation Leave,Mandatory/Forced Leave,Sick Leave,Maternity Leave,Paternity Leave,Special Privilege Leave,Solo Parent Leave,Study Leave,10-Day VAWC Leave,Rehabilitation Privilege,Special Leave Benefits for Women,Special Emergency Leave,Adoption Leave',
        'type_of_leave_others' => 'required_if:mode_of_application,Others|max:100',
        'type_of_leave_sub_category' => 'nullable|in:Others,Within the Philippines,Abroad,Out Patient,Special Leave Benefits for Women,Completion of Master\'s degree,BAR/Board Examination Review,Monetization of leave credits,Terminal Leave,In Hospital',
        'type_of_leave_description' => 'required_if:type_of_leave_sub_category,Others|min:10|max:500',
        'inclusive_start_date' => 'required|after_or_equal:application_date|before_or_equal:inclusive_end_date',
        'inclusive_end_date' => 'required|after_or_equal:inclusive_start_date',
        'commutation' => 'required|in:not requested,requested',
        
    ];

    protected $validationAttributes = [
        'mode_of_application' => 'Type of Leave',
        'type_of_leave_others' => 'Others',
        'type_of_leave_sub_category' => 'Sub Category',
        'type_of_leave_description' => 'Leave Description',
    ];

    public function submit(){
        $leaverequesdata = Leaverequest::where('form_id', $this->index)->first();

        $leaverequesdata->status = $this->status;
        // $this->js("alert('Leave Request Updated!')"); 

        $this->dispatch('triggerNotification');

        $leaverequesdata->update();

        return redirect()->to(route('ApproveLeaveRequestTable'));
    }

    // public function submit(){
    //     // foreach($this->rules as $rule => $validationRule){
    //     //     $this->validate([$rule => $validationRule]);
    //     //     $this->resetValidation();
    //     // }   

    //     // $leaverequestdata = Leaverequest::where('reference_num', $this->index)->first();
    //     // if(!$leaverequestdata){
    //     //     abort(404);
    //     // }

    //     // if(is_string($this->commutation_signature_of_appli)){
    //     //     $commutation_signature_of_appli = $leaverequestdata->commutation_signature_of_appli;
    //     // } else{
    //     //     $this->validate(['commutation_signature_of_appli' => 'required|mimes:jpg,png,pdf|extensions:jpg,png,pdf|max:5120']);
    //     //     $commutation_signature_of_appli = file_get_contents($this->commutation_signature_of_appli->getRealPath());
    //     //     $commutation_signature_of_appli  = base64_encode($commutation_signature_of_appli);
    //     // }


    //     $leaverequestdata = Leaverequest::findOrFail($this->index);

    //     $leaverequestdata->employee_id = auth()->user()->employee_id;
    //     $leaverequestdata->status = "Pending";
    //     $leaverequestdata->supervisor_email = $this->supervisor_email;
    //     $leaverequestdata->application_date = $this->application_date;
    //     $leaverequestdata->mode_of_application = $this->mode_of_application;
    //     // dd($this->mode_of_application == "Credit Leave");
    //     if($this->mode_of_application == "Credit Leave"){
    //         $leaverequestdata->date_earned = $this->date_earned;
    //         $leaverequestdata->earned_description = $this->earned_description;
    //     }else if($this->mode_of_application == "Advise Slip"){
    //         $leaverequestdata->inclusive_start_date = $this->inclusive_start_date;
    //         $leaverequestdata->inclusive_end_date = $this->inclusive_end_date;
    //         $leaverequestdata->purpose_type = $this->purpose_type;
    //     }  
    //     else{
    //         $leaverequestdata->num_of_days_work_days_applied = $this->num_of_days_work_days_applied;
    //         $leaverequestdata->inclusive_start_date = $this->inclusive_start_date;
    //         $leaverequestdata->inclusive_end_date = $this->inclusive_end_date;
    //     }

    //     $leaverequestdata->reason = $this->reason;

    //     $leaverequestdata->update();
        
    //     $this->js("alert('Leave Request Updated!')"); 




    //     return redirect()->to(route('LeaveRequestTable'));

    // }
    
    public function render()
    {
        return view('livewire.my-approvals.leaverequests.approve-leaverequest-form')->extends('components.layouts.app');
    }

}
