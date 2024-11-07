<?php

namespace App\Livewire\Leaverequest;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\Employee;
use App\Models\Leaverequest;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;
use App\Mail\LeaveRequestSubmitted;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Mail\LeaveRequestConfirmation;
use Exception;
use Illuminate\Support\Facades\Storage;

class LeaveRequestForm extends Component
{
    use WithFileUploads;
    
    public $employeeRecord;
    public $date;
    public $first_name;
    public $middle_name;
    public $last_name;
    public $department_name;
    public $available_credits;
    public $current_position;
    public $salary;

    public $employee_id;
    public $application_date;
    public $mode_of_application;
    public $type_of_leave_others;
    public $type_of_leave_sub_category;
    public $type_of_leave_description;
    public $num_of_days_work_days_applied;
    public $inclusive_start_date;
    public $inclusive_end_date;
    public $supervisor_email;
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
    public $reason;

    public $date_earned;
    public $credit_application;
    public $earned_description;
    public $purpose_type;
    public $type;
    public $deduct_to;

    public $full_half;

    public $leaveRequestTimeFrame;

    public $logout_time;



    public function mount($type = null){
        $this->type = $type;
        $loggedInUser = auth()->user();
        $employeeRecord = Employee::select('first_name', 'middle_name', 'last_name', 'department', 'employee_id', 'current_position', 'vacation_credits', 'sick_credits')
                                    ->where('employee_id', $loggedInUser->employee_id)
                                    ->first(); 
                          

        // $departmentName = DB::table('departments')->where('department_id', $employeeRecord->department_id[0])->value('department_name');
        $this->available_credits = $employeeRecord->vacation_credits + $employeeRecord->sick_credits;
        $this->employee_id = $employeeRecord->employee_id;
        $this->first_name = $employeeRecord->first_name;
        $this->middle_name = $employeeRecord->middle_name;
        $this->last_name = $employeeRecord->last_name;
        $this->department_name = $employeeRecord->department;
        $this->current_position = $employeeRecord->current_position;
        $this->salary = $employeeRecord->salary;
        $this->available_credits = $employeeRecord->sick_credits + $employeeRecord->vacation_credits;
        $dateToday = Carbon::now()->toDateString();
        $this->date = $dateToday;
        $this->application_date = $dateToday;
        if($type = "adviseslip"){
            $this->mode_of_application = "Advise Slip";
        }
        // $this->leaveRequestTimeFrame[] = ['start_date' => '', 'end_date' => '', 'full_half' => ''];
    }

    public function updated($keys){
        if (in_array($keys, ['inclusive_start_date', 'inclusive_end_date', 'full_half']) && !in_array($this->mode_of_application, ['Advise Slip', 'Credit Leave'])) {
            
            $startDate = Carbon::parse($this->inclusive_start_date);
            $endDate = Carbon::parse($this->inclusive_end_date);
            
            // Initialize workday count
            $workdays = 0;
            
            // Loop through each day between start and end date
            for ($date = $startDate; $date->lte($endDate); $date->addDay()) {
                // Check if the day is not a weekend (Saturday=6, Sunday=7)
                if ($date->isWeekday()) {
                    $workdays++;
                }
            }
    
            $leaveDayOption = $this->full_half; // The leave option selected
    
            switch ($leaveDayOption) {
                case 'Half Day':
                    // Half day on Start or End Day
                    $this->num_of_days_work_days_applied = number_format(($workdays - 1) + 0.5, 1); // Full day for remaining days plus half day
                    break;
                default:
                    // Default case if no valid option selected
                    $this->num_of_days_work_days_applied = number_format($workdays, 0);
                    break;
            }
        }
    }
    

    // public function addleaveRequestTimeFrame(){
    //     $this->leaveRequestTimeFrame[] = ['start_date' => '', 'end_date' => '', 'full_half' => ''];
    // }

    // public function removeHistory($index){
    //     unset($this->leaveRequestTimeFrame[$index]);
    //     $this->leaveRequestTimeFrame = array_values($this->leaveRequestTimeFrame);
    //     // $this->dispatch('update-employee-history', [json_encode($this->leaveRequestTimeFrame, true)]);
    // }
    
    public function removeImage($item){
        $this->$item = null;
    }

    private function generateRefNumber(){
        $today = date('Ymd');

        $randomDigits = '';
        for ($i = 0; $i < 5; $i++) {
            $randomDigits .= random_int(0, 9); // More secure random number generation
        }
        // Combine the date and random digits
        $referenceNumber = $today . $randomDigits;
        return $referenceNumber;
     }


     protected $rules = [
        'mode_of_application' => 'required|in:Vacation Leave,Sick Leave,Maternity Leave,Paternity Leave,Single Parent Leave,Bearevement Leave,Credit Leave,Advise Slip,Others',
        // 'num_of_days_work_days_applied' => 'required|lte:available_credits',
        'supervisor_email' => 'required|email',
        'reason' => 'required|string|max:500',
    ];

    protected $validationAttributes = [
        'mode_of_application' => 'Mode of Application',
        'type_of_leave_others' => 'Others',
        'deduct_to'=> 'Deduct to', 
        'inclusive_start_date' => 'Start Date',
        'inclusive_end_date' => 'End Date',
        'num_of_days_work_days_applied' => 'Number of Days Applied',
        'supervisor_email' => 'Supervisor Email',
        'reason' => 'Reason for Leave',
    ];

    public function submit(){
        $this->validate();
        if($this->mode_of_application == "Credit Leave"){
            $this->validate([
                'date_earned' => 'required|date',
                'credit_application' => 'required|date',
                'earned_description' => 'required|string|max:10000',
            ]);
            // dd($leaverequestdata->earned_description , $this->earned_description);
        } else if($this->mode_of_application == "Advise Slip"){
            $this->validate([
                'inclusive_start_date' => 'required|date',
                'inclusive_end_date' => 'required|date',
                'purpose_type' => 'required|in:Interview Candidate,Meeting with a Valued Client,Meeting with Prospect,Job/School/PESO Fair,Travel/Assignment/Airline,Collection,Others',
                'logout_time' => 'required|date|'
            ]);
        } 
        else if($this->mode_of_application == "Vacation Leave"){
            $this->validate([
                'inclusive_start_date' => 'required|after_or_equal:application_date|before_or_equal:inclusive_end_date',
                'inclusive_end_date' => 'required|after_or_equal:inclusive_start_date',
                'deduct_to'=> 'required|string|max:255|in:Bearevement Leave,Salary,Credits,Others',
                'full_half' => 'required|string|in:Full Day,Half Day,Undertime',
            ]);
        }
        else {
            $this->validate([
                'inclusive_start_date' => 'required|after_or_equal:application_date|before_or_equal:inclusive_end_date',
                'inclusive_end_date' => 'required|after_or_equal:inclusive_start_date',
                'deduct_to'=> 'required|string|max:255|in:Bearevement Leave,Salary,Credits,Others',
                'full_half' => 'required|string|in:Full Day,Half Day,Undertime',
                'purpose_type' => 'required|string|min:1'
            ]);
        }
        try {
            $loggedInUser = auth()->user();

            $leaverequestdata = new Leaverequest();

            $leaverequestdata->employee_id = $loggedInUser->employee_id;
            $leaverequestdata->status = "Pending";
            $leaverequestdata->supervisor_email = $this->supervisor_email;
            $leaverequestdata->application_date = $this->application_date;

            $leaverequestdata->mode_of_application = $this->mode_of_application;
            // dd($this->mode_of_application == "Credit Leave");
            if($this->mode_of_application == "Credit Leave"){
                $leaverequestdata->inclusive_start_date = $this->date_earned;
                $leaverequestdata->inclusive_end_date = $this->credit_application;
                $leaverequestdata->earned_description = $this->earned_description;
                $leaverequestdata->full_or_half = $this->full_half;

                // dd($leaverequestdata->earned_description , $this->earned_description);
            } else if($this->mode_of_application == "Advise Slip"){
                $leaverequestdata->inclusive_start_date = $this->inclusive_start_date;
                $leaverequestdata->inclusive_end_date = $this->inclusive_end_date;
                $leaverequestdata->purpose_type = $this->purpose_type;
                $leaverequestdata->full_or_half = $this->logout_time;
            } 
            else if ($this->mode_of_application == "Vacation Leave"){
                $formattedValue = str_replace(',', '', $this->num_of_days_work_days_applied);
                $leaverequestdata->num_of_days_work_days_applied = $formattedValue ;
                $leaverequestdata->inclusive_start_date = $this->inclusive_start_date;
                $leaverequestdata->inclusive_end_date = $this->inclusive_end_date;
                $leaverequestdata->deduct_to = $this->deduct_to;
                $leaverequestdata->full_or_half = $this->full_half;
            }   
            else {
                $formattedValue = str_replace(',', '', $this->num_of_days_work_days_applied);
                $leaverequestdata->num_of_days_work_days_applied = $formattedValue ;
                $leaverequestdata->inclusive_start_date = $this->inclusive_start_date;
                $leaverequestdata->inclusive_end_date = $this->inclusive_end_date;
                $leaverequestdata->deduct_to = $this->deduct_to;
                $leaverequestdata->purpose_type = $this->purpose_type;
                $leaverequestdata->full_or_half = $this->full_half;
            }
            // dd($leaverequestdata->earned_description , $this->earned_description);

            $leaverequestdata->reason = $this->reason;

            $leaverequestdata->save();

            $employeeRecord = Employee::select('first_name', 'middle_name', 'last_name', 'department','employee_email')
                ->where('employee_id', $loggedInUser->employee_id)
                ->first();

            
            // // Send email to the supervisor
            Mail::to($this->supervisor_email)->send(new LeaveRequestSubmitted($employeeRecord, $leaverequestdata));
            Mail::to($employeeRecord->employee_email)->send(new LeaveRequestConfirmation($employeeRecord, $leaverequestdata));

            $this->dispatch('trigger-success');

            return redirect()->to(route('LeaveRequestTable'));
        } catch (\Exception $e) {
            $this->dispatch('trigger-error');

            // Log the exception for further investigation
            Log::channel('leaverequests')->error('Failed to save Hrticket: ' . $e->getMessage());

            // Dispatch a failure event with an error message
            // $this->dispatch('triggerFailure', ['message' => 'Something went wrong. Please contact IT support.']);

            // Optionally, you could redirect the user to an error page or show an error message
            // return redirect()->back()->withErrors('Something went wrong. Please contact IT support.');
        }


    }


    public function render()
    {
        return view('livewire.leaverequest.leave-request-form')->extends('components.layouts.app');
    }
}
