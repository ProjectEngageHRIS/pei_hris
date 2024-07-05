<?php

namespace App\Livewire\Leaverequest;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\Employee;
use App\Models\Leaverequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Auth\Access\AuthorizationException;

class LeaveRequestView extends Component
{
    
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
    public $form_id;
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

        try {
            $leaverequest = $this->editLeaveRequest($index);
            // $this->authorize('update', [$leaverequest]);
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

        $this->form_id = $leaverequest->form_id;
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

    public function render()
    {
        return view('livewire.leaverequest.leave-request-view');
    }
}