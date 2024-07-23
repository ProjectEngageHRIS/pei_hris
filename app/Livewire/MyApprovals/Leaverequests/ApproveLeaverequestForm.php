<?php

namespace App\Livewire\MyApprovals\Leaverequests;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\Employee;
use App\Models\Leaverequest;
use Livewire\WithFileUploads;
use App\Models\Dailytimerecord;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Auth\Access\AuthorizationException;

class ApproveLeaverequestForm extends Component
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
    public $form_id;

    public $full_half;

    public function mount($index){
        $loggedInUser = auth()->user();

        // if($loggedInUser->role_id != 9){
        //     return redirect()->to(route('home'));
        //     abort(404);
        // }

        try {
            $leaverequest = $this->editLeaveRequest($index);
            // $this->authorize('update', [$leaverequest]);
        } catch (AuthorizationException $e) {
            return redirect()->to(route('ApproveLeaveRequestTable'));
            abort(404);
        }

        $this->index = $index;
        
        $employeeRecord = Employee::select('first_name', 'middle_name', 'last_name', 'department', 'employee_id', 'current_position',)
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
        $this->status = $leaverequest->status;

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
        $leaverequest =  Leaverequest::where('uuid', $index)->first();
        
        if(!$leaverequest){
            return False;
        }
        // $this->leaverequest = $leaverequest;
        return $leaverequest;
    }



    public function submit(){
        $loggedInUser = auth()->user()->role_id;
        // if($loggedInUser != 9 && $loggedInUser != 10){
        //     return;
        // }

        $leaverequestdata = Leaverequest::where('uuid', $this->index)->first();
        if (!$leaverequestdata) {
            // Handle case where leave request is not found
            return;
        }
        
        $startDate = Carbon::parse($leaverequestdata->inclusive_start_date)->toDateString();
        $endDate = Carbon::parse($leaverequestdata->inclusive_end_date)->toDateString();
        
        $dailyRecords = Dailytimerecord::whereDate('attendance_date', '>=', $startDate)
            ->whereDate('attendance_date', '<=', $endDate)
            ->where('employee_id', $leaverequestdata->employee_id)
            ->get();

        foreach($dailyRecords as $record){
            if($record->type  == "Wholeday" || $record->type == "Overtime"){
                return $this->dispatch('triggerErrorNotification');
            }
        }

        $leaveDayOption = $leaverequestdata->full_or_half;
        
        if ($leaverequestdata) {
            $startDate = Carbon::parse($leaverequestdata->inclusive_start_date);
            $endDate = Carbon::parse($leaverequestdata->inclusive_end_date);
        
            // Clone the start date to use for iteration
            $currentDate = $startDate->copy();
            $dailyLeaveRecords = [];
        
            while ($currentDate <= $endDate) {
                $isStartDay = $currentDate->isSameDay($startDate);
                $isEndDay = $currentDate->isSameDay($endDate);
        
                // Determine the type for the start day
                if ($isStartDay) {
                    if (in_array($leaveDayOption, ['Start Full', 'Both Full'])) {
                        $dailyLeaveRecords[] = ['date' => $currentDate->format('Y-m-d'), 'type' => $leaverequestdata->mode_of_application . ' Full-Day'];
                    } elseif (in_array($leaveDayOption, ['End Full', 'End Half'])) {
                        if ($leaveDayOption == 'End Full') {
                            $dailyLeaveRecords[] = ['date' => $currentDate->format('Y-m-d'), 'type' => $leaverequestdata->mode_of_application . ' Half-Day'];
                        } else {
                            $dailyLeaveRecords[] = ['date' => $currentDate->format('Y-m-d'), 'type' => $leaverequestdata->mode_of_application . ' Full-Day'];
                        }
                    } elseif (in_array($leaveDayOption, ['Start Half', 'Both Half'])) {
                        $dailyLeaveRecords[] = ['date' => $currentDate->format('Y-m-d'), 'type' => $leaverequestdata->mode_of_application . ' Half-Day'];
                    }
                } elseif ($isEndDay) {
                    if (in_array($leaveDayOption, ['End Full', 'Both Full'])) {
                        $dailyLeaveRecords[] = ['date' => $currentDate->format('Y-m-d'), 'type' => $leaverequestdata->mode_of_application . ' Full-Day'];
                    } elseif (in_array($leaveDayOption, ['Start Full', 'Start Half'])) {
                        if ($leaveDayOption == 'Start Full') {
                            $dailyLeaveRecords[] = ['date' => $currentDate->format('Y-m-d'), 'type' => $leaverequestdata->mode_of_application . ' Half-Day'];
                        } else {
                            $dailyLeaveRecords[] = ['date' => $currentDate->format('Y-m-d'), 'type' => $leaverequestdata->mode_of_application . ' Full-Day'];
                        }
                    } elseif (in_array($leaveDayOption, ['End Half', 'Both Half'])) {
                        $dailyLeaveRecords[] = ['date' => $currentDate->format('Y-m-d'), 'type' => $leaverequestdata->mode_of_application . ' Half-Day'];
                    }
                } else {
                    // Full leave day for dates in between start and end
                    $dailyLeaveRecords[] = ['date' => $currentDate->format('Y-m-d'), 'type' => $leaverequestdata->mode_of_application . ' Full-Day'];
                }
        
                // Debugging output
                // dump($currentDate->format('Y-m-d'), $isStartDay, $isEndDay, $startDate->format('Y-m-d'), $endDate->format('Y-m-d'));
        
                // Move to the next day
                $currentDate->addDay();
            }
        
            // Final debugging output
            foreach ($dailyLeaveRecords as $record) {
                $dailyRecord = Dailytimerecord::where('attendance_date', $record['date'])
                    ->where('employee_id', $leaverequestdata->employee_id)
                    ->first();
        
                if ($dailyRecord) {
                    $dailyRecord->type = $record['type'];
                    $dailyRecord->update();
                } else {
                    $newDailyRecord = new Dailytimerecord();
                    $newDailyRecord->employee_id = $leaverequestdata->employee_id;
                    $newDailyRecord->attendance_date = $record['date'];
                    $newDailyRecord->type = $record['type'];
                    $newDailyRecord->save();
                }
            }
        } else {
            return $this->dispatch('triggerErrorNotification');
        }
        
        $leaverequestdata->status = $this->status;
        
        if($loggedInUser == 9 || $loggedInUser == 10){
            if($loggedInUser == 9) {
                if($this->status == "Completed"){
                    $leaverequestdata->approved_by_hr = 1;
                }
            }
            if($loggedInUser == 10) {
                if($this->status == "Completed"){
                    $leaverequestdata->approved_by_president = 1;
                }
            }
            $leaverequestdata->update();
            return $this->dispatch('triggerNotification');
        }

        else {
            return $this->dispatch('triggerErrorNotification');
        }

        return redirect()->to(route('ApproveLeaveRequestTable'));
    }
    
    public function render()
    {
        return view('livewire.my-approvals.leaverequests.approve-leaverequest-form')->layout('components.layouts.hr-navbar');
    }

}
