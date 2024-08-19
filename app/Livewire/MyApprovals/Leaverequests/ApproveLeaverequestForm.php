<?php

namespace App\Livewire\MyApprovals\Leaverequests;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\Employee;
use App\Models\Leaverequest;
use Livewire\WithFileUploads;
use App\Models\Dailytimerecord;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
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

        try {
            $leaverequest = $this->editLeaveRequest($index);
            if (is_null($leaverequest)) {
                return redirect()->to(route('ApproveLeaveRequestTable'));
            }
        } catch (AuthorizationException $e) {
            abort(404);
        }

        $this->index = $index;
        
        $employeeRecord = Employee::select('first_name', 'middle_name', 'last_name', 'department', 'employee_id', 'current_position',)
                                    ->where('employee_id', $leaverequest->employee_id)
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
        $this->full_half = $leaverequest->full_or_half;
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
        $loggedInUser = auth()->user();
        try {
            if(!in_array($loggedInUser->role_id, [4, 6, 7, 8, 14, 61024])){
                throw new \Exception('Unauthorized Access');
            }
            $loggedInEmail = Employee::where('employee_id', $loggedInUser->employee_id)->value('employee_email');
            $leaverequest = Leaverequest::where('uuid', $index)->where('supervisor_email', $loggedInEmail)->first();
            if (!$leaverequest) {
                throw new \Exception('No Record Found');
            }
            if ($leaverequest->supervisor_email != $loggedInEmail) {
                throw new \Exception('Unauthorized Access');
            }
            return $leaverequest;
        } catch (\Exception $e) {
            // Log the exception for further investigation
            Log::channel('leaverequests')->error('Failed to View/Approve Leave Request: ' . $e->getMessage() . ' | ' . $loggedInUser->employee_id );
            return null;
            
            // Return the redirect to halt further execution
            // redirect()->to(route('ApproveLeaveRequestTable'));
        }
    }
    


    public function changeStatus()
    {
        $loggedInUser = auth()->user();
        try {
            if (!in_array($loggedInUser->role_id, [4, 6, 7, 8, 14, 61024])) {
                throw new \Exception('Unauthorized Access');
            }
            $role = $loggedInUser->role_id;
            DB::transaction(function () use ($role) {
                // Fetch the leave request data
                $leaverequestdata = Leaverequest::where('uuid', $this->index)->first();
                if (!$leaverequestdata) {
                    return;
                }

                if($this->status == "Completed"){
                    if ($role == 4) {
                        $leaverequestdata->approved_by_supervisor = 1;
                        if ($leaverequestdata->approved_by_president == 1) {
                            $leaverequestdata->status = "Approved";
                        }
                    // } else if($leaverequestdata->supervisor_email == "seal.projectengage@gmail.com"){
                    } else if($leaverequestdata->supervisor_email == "spm_2009@wesearch.com.ph"){
                        if($role == 6){ // President Role
                            $leaverequestdata->approved_by_supervisor = 1;
                            $leaverequestdata->approved_by_president = 1;
                            $leaverequestdata->status = "Approved";
                        }
                    } else if ($role == 6) {
                        $leaverequestdata->approved_by_president = 1;
                        if ($leaverequestdata->approved_by_supervisor == 1) {
                            $leaverequestdata->status = "Approved";
                        }
                    } else if($leaverequestdata->supervisor_email == "kcastro@projectengage.com.ph"){
                        if($role == 7){ // Hr Head Role
                            $leaverequestdata->approved_by_supervisor = 1;
                            if ($leaverequestdata->approved_by_president == 1) {
                                $leaverequestdata->status = "Approved";
                            }
                        }
                    } else {
                        throw new \Exception('Unauthorized Access');
                    }

                    if($leaverequestdata->approved_by_supervisor == 1 && $leaverequestdata->approved_by_president == 1){
                        $startDate = Carbon::parse($leaverequestdata->inclusive_start_date)->toDateString();
                        $endDate = Carbon::parse($leaverequestdata->inclusive_end_date)->toDateString();
                        
                        $dailyRecords = Dailytimerecord::whereDate('attendance_date', '>=', $startDate)
                            ->whereDate('attendance_date', '<=', $endDate)
                            ->where('employee_id', $leaverequestdata->employee_id)
                            ->get();
                
                        foreach($dailyRecords as $record) {
                            if($record->type == "Wholeday" || $record->type == "Overtime") {
                                return $this->dispatch('triggerErrorNotification');
                            }
                        }
                
                        if (!in_array($leaverequestdata->mode_of_application, ['Advice Slip', 'Credit Leave'])) {
                            $startDate = Carbon::parse($leaverequestdata->inclusive_start_date);
                            $endDate = Carbon::parse($leaverequestdata->inclusive_end_date);
                            $leaveDayOption = $leaverequestdata->full_or_half;
                
                            $currentDate = $startDate->copy();
                            $dailyLeaveRecords = [];
                
                            while ($currentDate <= $endDate) {
                                $isStartDay = $currentDate->isSameDay($startDate);
                                $isEndDay = $currentDate->isSameDay($endDate);
                                if ($isEndDay) {
                                    if ($leaveDayOption == 'Full Day') {
                                        $dailyLeaveRecords[] = ['date' => $currentDate->format('Y-m-d'), 'type' => $leaverequestdata->mode_of_application . ' Full-Day'];
                                    } elseif ($leaveDayOption == 'Half Day') {
                                        $dailyLeaveRecords[] = ['date' => $currentDate->format('Y-m-d'), 'type' => $leaverequestdata->mode_of_application . ' Half-Day'];
                                    } elseif ($leaveDayOption == 'Undertime') {
                                        $dailyLeaveRecords[] = ['date' => $currentDate->format('Y-m-d'), 'type' => $leaverequestdata->mode_of_application . ' Undertime'];
                                    }
                                } else {
                                    $dailyLeaveRecords[] = ['date' => $currentDate->format('Y-m-d'), 'type' => $leaverequestdata->mode_of_application . ' Full-Day'];
                                }
                
                                $currentDate->addDay();
                            }
                
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
                        }
                    }
                } else {
                    $leaverequestdata->status = $this->status;
                }
                
                // $leaverequestdata->status = $this->status;
        
                $leaverequestdata->update();
        
                $this->dispatch('trigger-success'); 
            });
        
            return redirect()->to(route('ApproveLeaveRequestTable'));
        } catch (\Exception $e) {
            // Log the exception for further investigation
            Log::channel('leaverequests')->error('Failed to update Leave Request: ' . $e->getMessage() . ' | ' . $loggedInUser->employee_id);

            $this->dispatch('trigger-error');
        }
    }
    
    public function render()
    {
        $loggedInUser = auth()->user()->role_id;
        if(in_array($loggedInUser, [4, 6])){
            return view('livewire.my-approvals.leaverequests.approve-leaverequest-form');
        } else {
            return view('livewire.my-approvals.leaverequests.approve-leaverequest-form')->layout('components.layouts.hr-navbar');
        }
    }

}
