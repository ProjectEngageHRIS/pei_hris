<?php

namespace App\Livewire\MyApprovals\Leaverequests;

use finfo;
use Carbon\Carbon;
use Livewire\Component;
use App\Models\Employee;
use App\Models\Leaverequest;
use Livewire\WithPagination;
use App\Models\Dailytimerecord;
use Illuminate\Support\Facades\DB;
use Livewire\WithoutUrlPagination;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;

class ApproveLeaverequestTable extends Component
{
    use WithPagination, WithoutUrlPagination;

    public $vacationCredits;
    public $sickCredits;

    public $date_filter;

    public $status_filter;

    public $dateFilterName = "All";
    public $statusFilterName = "All";

    public $search = "";

    public $status;

    public $currentFormId;

    public $employeeTypesFilter = [
        'INTERNALS' => false,
        'OJT' => false,
        'PEI-CCS' => false,
        'RAPID' => false,
        'RAPIDMOBILITY' => false,
        'UPSKILLS' => false,
    ];

    public $insideDepartmentTypesFilter = [
        'HR AND ADMIN' => false,
        'Recruitment' => false,
        'CXS' => false,
        'Overseas Recruitment' => false,
        'PEI/SL Temps DO-174' => false,
        'Corporate Accounting and Finance' => false,
        'ACCOUNTING ' => false,
    ];

    public $departmentTypesFilter = [
        'PEI' => false,
        'SLSEARCH' => false,
        'SLTEMPS' => false,
        'WESEARCH' => false,
        'PEI-UPSKILLS' => false,
    ];

    public $genderTypesFilter = [
        'MALE' => false,
        'FEMALE' => false,
    ];

    public $employeeTypeFilter;
    public $departmentTypeFilter;
    public $companyFilter;
    public $genderFilter;
    
    
    public function search()
    {
        $this->resetPage();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function mount(){
        $loggedInUser = auth()->user()->role_id;
        try {
            if(!in_array($loggedInUser, [4, 6, 7, 8, 14, 61024])){
                throw new \Exception('Unauthorized Access');
            }
        } catch (\Exception $e) {
            // Log the exception for further investigation
            Log::channel('hrticket')->error('Failed to view Approve Leave Request Table: ' . $e->getMessage() . ' | ' . $loggedInUser );
            return redirect()->to(route('EmployeeDashboard'));
        }
    }

    public function clearAllFilters(){
        $this->reset(['employeeTypesFilter', 'insideDepartmentTypesFilter', 'departmentTypesFilter', 'genderTypesFilter']);
    }

    public function render()
    {
        $loggedInUser = auth()->user();

        $loggedInEmail = Employee::where('employee_id', $loggedInUser->employee_id)->value('employee_email');   
    
        if($loggedInEmail == "spm_2009@wesearch.com.ph"){
            $query = Leaverequest::with('employee:employee_id,first_name,middle_name,last_name,employee_type,inside_department,department,gender')
                                  ->where('supervisor_email', $loggedInEmail)->where('approved_by_supervisor', '1');
        } else {
            $query = Leaverequest::with('employee:employee_id,first_name,middle_name,last_name,employee_type,inside_department,department,gender')
                                  ->where('supervisor_email', $loggedInEmail);
        }

        switch ($this->date_filter) {
            case '1':
                $query->whereDate('application_date',  Carbon::today());
                $this->dateFilterName = "Today";
                break;
            case '2':
                $query->whereBetween('application_date', [Carbon::today()->startOfWeek(), Carbon::today()]);
                $this->dateFilterName = "Last 7 Days";
                break;
            case '3':
                $query->whereBetween('application_date', [Carbon::today()->subDays(30), Carbon::today()]);
                $this->dateFilterName = "Last 30 days";
                break;
            case '4':
                $query->whereBetween('application_date', [Carbon::today()->subMonths(6), Carbon::today()]);
                // $query->whereDate('application_date', '>=', Carbon::today()->subMonths(6), '<=', Carbon::today());
                $this->dateFilterName = "Last 6 Months";
                break;
            case '5':
                $query->whereBetween('application_date', [Carbon::today()->subYear(), Carbon::today()]);
                $this->dateFilterName = "Last Year";
                break;
            default:
                $this->dateFilterName = "All";
                break;
        }

        switch ($this->status_filter) {
            case '1':
                $query->where('status',  'Approved');
                $this->statusFilterName = "Approved";
                break;
            case '2':
                $query->where('status', 'Pending');
                $this->statusFilterName = "Pending";
                break;
            case '3':
                $query->where('status', 'Declined');
                $this->statusFilterName = "Declined";
                break;
            default:
                $this->statusFilterName = "All";
                break;
        }

        $employeeTypes = array_filter(array_keys($this->employeeTypesFilter), function($key) {
            return $this->employeeTypesFilter[$key];
        });
        
        if (!empty($employeeTypes)) {
            $query->whereHas('employee', function ($query) use ($employeeTypes) {
                $query->whereIn('employee_type', $employeeTypes);
            });
        }
    
        // Inside Department Filter
        $insideDepartmentTypes = array_filter(array_keys($this->insideDepartmentTypesFilter), function($key) {
            return $this->insideDepartmentTypesFilter[$key];
        });
        
        if (!empty($insideDepartmentTypes)) {
            $query->whereHas('employee', function ($query) use ($insideDepartmentTypes) {
                $query->whereIn('inside_department', $insideDepartmentTypes);
            });
        }
    
        // Department Filter
        $departmentTypes = array_filter(array_keys($this->departmentTypesFilter), function($key) {
            return $this->departmentTypesFilter[$key];
        });
        
        if (!empty($departmentTypes)) {
            $query->whereHas('employee', function ($query) use ($departmentTypes) {
                $query->whereIn('department', $departmentTypes);
            });
        }
    
        // Gender Filter
        $genderTypes = array_filter(array_keys($this->genderTypesFilter), function($key) {
            return $this->genderTypesFilter[$key];
        });
        
        if (!empty($genderTypes)) {
            $query->whereHas('employee', function ($query) use ($genderTypes) {
                $query->whereIn('gender', $genderTypes);
            });
        }


        // if(strlen($this->search) >= 1){
        //     $results = $query->where('application_date', 'like', '%' . $this->search . '%')->orderBy('application_date', 'desc')->where('status', '!=', 'Deleted')->paginate(5);
        // } else {
        //     $results = $query->where('status', '!=', 'Deleted')->orderBy('application_date', 'desc')->paginate(5);
        // }

            if(strlen($this->search) >= 1){
                $searchTerms = explode(' ', $this->search);
                $results = $query->where(function ($q) use ($searchTerms) {
                    foreach ($searchTerms as $term) {
                        $q->orWhere('first_name', 'like', '%' . $term . '%')
                        ->orWhere('last_name', 'like', '%' . $term . '%')
                        ->orWhere('department', 'like', '%' . $term . '%')
                        ->orWhere('current_position', 'like', '%' . $term . '%')
                        ->orWhere('employee_type', 'like', '%' . $term . '%')
                        ->orWhere('start_of_employment', 'like', '%' . $term . '%');
                    }
                })->orderBy('created_at', 'desc')->where('status', '!=', 'Deleted')->paginate(6);
            } else {
                $results = $query->orderBy('created_at', 'desc')->where('status', '!=', 'Deleted')->paginate(6);
            }

        
        if(in_array($loggedInUser->role_id, [4, 6])){
            return view('livewire.my-approvals.leaverequests.approve-leaverequest-table', [
                'LeaveRequestData' => $results,
            ]);
        } else {
            return view('livewire.my-approvals.leaverequests.approve-leaverequest-table', [
                'LeaveRequestData' => $results,
            ])->layout('components.layouts.hr-navbar');
        }
       
    }

    // public function download($reference_num){
    //     $leaveRequestData = Leaverequest::where('reference_num', $reference_num)->first();
    //     $image = base64_decode($leaveRequestData->leave_form);
    //     $finfo = new finfo(FILEINFO_MIME_TYPE);
    //     $contentType = $finfo->buffer($image);
    //     // dd($contentType);
    //     switch($contentType){
    //         case "application/pdf":
    //             $fileName = "leaverequest.pdf";
    //             break;
    //         case "image/jpeg":
    //             $fileName = "leaverequest.jpg";
    //             break;
    //         case "image/png":
    //             $fileName = "leaverequest.png";
    //             break;
    //         default:
    //             abort(404);
    //     }
    //     return Response::make($image, 200, [
    //         'Content-Type' => $contentType,
    //         'Content-Disposition' => 'attachment; filename="'.$fileName.'"'
    //     ]);
    
    // }


    public function getEmployeeName($employee_id){
        $name = Employee::where('employee_id', $employee_id)->select('first_name', 'middle_name', 'last_name')->first();
        return $name->first_name . ' ' . $name->middle_name . ' ' . $name->last_name;
    }
    
    public function changeStatus(){
        $loggedInUser = auth()->user();
        try {
            if (!in_array($loggedInUser->role_id, [4, 6, 7, 8, 14, 61024])) {
                throw new \Exception('Unauthorized Access');
            }
            $role = $loggedInUser->role_id;
            DB::transaction(function () use ($role) {
                // Fetch the leave request data
                $leaverequestdata = Leaverequest::where('form_id', $this->currentFormId)->first();
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
                    } else if($leaverequestdata->supervisor_email == "mbaniqued@projectengage.com.ph"){
                        if($role == 14){ // IT Supervisor
                            $leaverequestdata->approved_by_supervisor = 1;
                            if ($leaverequestdata->approved_by_president == 1) {
                                $leaverequestdata->status = "Approved";
                            }
                        }
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
                
                                if ($isStartDay) {
                                    if (in_array($leaveDayOption, ['Start Full', 'Both Full'])) {
                                        $dailyLeaveRecords[] = ['date' => $currentDate->format('Y-m-d'), 'type' => $leaverequestdata->mode_of_application . ' Full-Day'];
                                    } elseif (in_array($leaveDayOption, ['End Full', 'End Half'])) {
                                        $dailyLeaveRecords[] = ['date' => $currentDate->format('Y-m-d'), 'type' => $leaveDayOption == 'End Full' ? $leaverequestdata->mode_of_application . ' Half-Day' : $leaverequestdata->mode_of_application . ' Full-Day'];
                                    } elseif (in_array($leaveDayOption, ['Start Half', 'Both Half'])) {
                                        $dailyLeaveRecords[] = ['date' => $currentDate->format('Y-m-d'), 'type' => $leaverequestdata->mode_of_application . ' Half-Day'];
                                    }
                                } elseif ($isEndDay) {
                                    if (in_array($leaveDayOption, ['End Full', 'Both Full'])) {
                                        $dailyLeaveRecords[] = ['date' => $currentDate->format('Y-m-d'), 'type' => $leaverequestdata->mode_of_application . ' Full-Day'];
                                    } elseif (in_array($leaveDayOption, ['Start Full', 'Start Half'])) {
                                        $dailyLeaveRecords[] = ['date' => $currentDate->format('Y-m-d'), 'type' => $leaveDayOption == 'Start Full' ? $leaverequestdata->mode_of_application . ' Half-Day' : $leaverequestdata->mode_of_application . ' Full-Day'];
                                    } elseif (in_array($leaveDayOption, ['End Half', 'Both Half'])) {
                                        $dailyLeaveRecords[] = ['date' => $currentDate->format('Y-m-d'), 'type' => $leaverequestdata->mode_of_application . ' Half-Day'];
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
        
                $this->dispatch('triggerSuccess'); 
            });
        } catch (\Exception $e) {
            // Log the exception for further investigation
            Log::channel('leaverequests')->error('Failed to update Leave Request: ' . $e->getMessage() . ' | ' . $loggedInUser->employee_id);

            $this->dispatch('triggerError');    
        }
    }
}
