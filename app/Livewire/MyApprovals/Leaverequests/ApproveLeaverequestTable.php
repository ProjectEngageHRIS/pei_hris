<?php

namespace App\Livewire\MyApprovals\Leaverequests;

use finfo;
use Carbon\Carbon;
use Livewire\Component;
use App\Models\Employee;
use App\Models\Leaverequest;
use Livewire\WithPagination;
use App\Models\Dailytimerecord;
use App\Mail\ApproveLeaveRequest;
use Illuminate\Support\Facades\DB;
use Livewire\WithoutUrlPagination;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Response;

class ApproveLeaverequestTable extends Component
{
    use WithPagination, WithoutUrlPagination;

    public $vacationCredits;
    public $sickCredits;

    public $date_filter;

    public $status_filter;

    public $supervisor_status_filter;
    public $president_status_filter;

    public $dateFilterName = "All";
    public $statusFilterName = "All";
    public $supervisorFilterName = "All";
    public $presidentFilterName = "All";

    public $search = "";

    public $status;

    public $currentFormId;

    public $key;

    public $person;

    public $employeeTypesFilter = [
        'INDEPENDENT CONTRACTOR' => false,
        'INTERNAL EMPLOYEE' => false,
        'INTERN' => false,
        'PROBISIONARY' => false,
        'PROJECT BASED' => false,
        'REGULAR' => false,
        'RELIVER' => false,
        'OJT' => false,
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

    public function mount($type = null){
        $this->key = $type;
        $loggedInUser = auth()->user()->role_id;
        $role_ids = json_decode($loggedInUser->role_id, true); // Decode JSON into an array
        try {
            if (empty(array_intersect($role_ids, [4, 6, 7, 8, 14, 61024]))) {
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

        // Define the base query with the necessary relations
        $query = Leaverequest::with('employee:employee_id,first_name,middle_name,last_name,employee_type,inside_department,department,gender');
        
        if($this->key == "list"){
            // 
        } else{
            // Apply conditions based on the logged-in email
            if ($loggedInEmail === "spm_2009@wesearch.com.ph") {
                // if ($loggedInEmail === "seal.projectengage@gmail.com") {
                    $query->where(function ($query) use ($loggedInEmail) {
                        $query->where('approved_by_supervisor', '1');
                    })->orWhere(function ($query) use ($loggedInEmail) {
                        $query->where('supervisor_email', $loggedInEmail);
                    });
            } else {
                $query->where('supervisor_email', $loggedInEmail);
            }
        }

        switch ($this->date_filter) {
            case '1': // Today
                $startOfDay = Carbon::today(); // Start of today (00:00:00)
                $endOfDay = Carbon::today()->endOfDay(); // End of today (23:59:59)
                $query->whereBetween('application_date', [$startOfDay, $endOfDay]);
                $this->dateFilterName = "Today";
                break;
    
            case '2': // Last 7 Days
                $query->whereBetween('application_date', [Carbon::today()->subDays(7), Carbon::now()]);
                $this->dateFilterName = "Last 7 Days";
                break;
    
            case '3': // Last 30 Days
                $query->whereBetween('application_date', [Carbon::today()->subDays(30), Carbon::now()]);
                $this->dateFilterName = "Last 30 Days";
                break;
    
            case '4': // Last 6 Months
                $query->whereBetween('application_date', [Carbon::today()->subMonths(6), Carbon::now()]);
                $this->dateFilterName = "Last 6 Months";
                break;
    
            case '5': // Last Year
                $query->whereBetween('application_date', [Carbon::today()->subYear(), Carbon::now()]);
                $this->dateFilterName = "Last Year";
                break;
            default: // All
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
            case '4':
                $query->where('status', 'Cancelled');
                $this->statusFilterName = "Cancelled";
                break;
            default:
                $this->statusFilterName = "All";
                break;
        }

        switch ($this->supervisor_status_filter) {
            case '1':
                $query->where('approved_by_supervisor', 1);
                $this->supervisorFilterName = "Approved";
                break;
            case '2':
                $query->whereNull('approved_by_supervisor');
                $this->supervisorFilterName = "Pending";
                break;
            case '3':
                $query->where('approved_by_supervisor', 0);
                $this->supervisorFilterName = "Declined";
                break;
            default:
                $this->supervisorFilterName = "All";
                break;
        }

        switch ($this->president_status_filter) {
            case '1':
                $query->where('approved_by_president', 1);
                $this->presidentFilterName = "Approved";
                break;
            case '2':
                $query->whereNull('approved_by_president');
                $this->presidentFilterName = "Pending";
                break;
            case '3':
                $query->where('approved_by_president', 0);
                $this->presidentFilterName = "Declined";
                break;
            default:
                $this->presidentFilterName = "All";
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

        if (strlen($this->search) >= 1) {
            // Remove commas from the search input
            $searchTerms = preg_replace('/,/', '', $this->search);
            
            // Add conditions to search through relevant fields
            $results = $query->where(function ($q) use ($searchTerms) {
                // Handle different formats for full date matching
                $parsedFullDate = null;
        
                // Try to parse "October 1 2024" or "October 01 2024" format
                if (\DateTime::createFromFormat('F j Y', $searchTerms) !== false) {
                    $parsedFullDate = \Carbon\Carbon::createFromFormat('F j Y', $searchTerms);
                } elseif (\DateTime::createFromFormat('F d Y', $searchTerms) !== false) {
                    $parsedFullDate = \Carbon\Carbon::createFromFormat('F d Y', $searchTerms);
                }
        
                // Check if the term is a full date
                if ($parsedFullDate) {
                    $q->orWhereDate('application_date', '=', $parsedFullDate->format('Y-m-d'));
                } else {
                    // Split searchTerms into individual words for fallback
                    $terms = explode(' ', $searchTerms);
                    foreach ($terms as $term) {
                        $q->orWhereHas('employee', function ($query) use ($term) {
                            $query->where('first_name', 'like', '%' . $term . '%')
                                  ->orWhere('last_name', 'like', '%' . $term . '%')
                                  ->orWhere('department', 'like', '%' . $term . '%')
                                  ->orWhere('current_position', 'like', '%' . $term . '%')
                                  ->orWhere('employee_type', 'like', '%' . $term . '%');
                        })
                        ->orWhere('application_date', 'like', '%' . $term . '%')
                        ->orWhere('mode_of_application', 'like', '%' . $term . '%')
                        ->orWhere('inclusive_start_date', 'like', '%' . $term . '%')
                        ->orWhere('inclusive_end_date', 'like', '%' . $term . '%')
                        ->orWhere('reason', 'like', '%' . $term . '%');
                    }
                }
            })->orderBy('created_at', 'desc');
        } else {
            // If no search term, return all records
            $results = $query->orderBy('created_at', 'desc');
        }
        

        if($this->statusFilterName == "Cancelled"){
            $results = $results->paginate(5);
        } else {
            $results = $results->where('status', '!=', 'Cancelled')->paginate(5);
        }
        
        if($this->key != "list"){
            return view('livewire.my-approvals.leaverequests.approve-leaverequest-table', [
                'LeaveRequestData' => $results,
            ]);
        } else {
            return view('livewire.my-approvals.leaverequests.approve-leaverequest-table', [
                'LeaveRequestData' => $results,
            ])->layout('components.layouts.hr-navbar');
        }
    }

 



    public function getEmployeeName($employee_id){
        $name = Employee::where('employee_id', $employee_id)->select('first_name', 'middle_name', 'last_name')->first();
        return $name->first_name . ' ' . $name->middle_name . ' ' . $name->last_name;
    }
    
    public function changeStatus(){

        if($this->key == "list"){
            if($this->status != "Pending"){
                $this->validate(['person' => 'required|in:President,Supervisor']);
            }
        }

        $loggedInUser = auth()->user();
        $role_ids = json_decode($loggedInUser->role_id, true); // Decode JSON into an array
        try {
            if (empty(array_intersect($role_ids, [4, 6, 7, 8, 14, 61024]))) {
                throw new \Exception('Unauthorized Access');
            }
                // Fetch the leave request data
                $leaverequestdata = Leaverequest::where('form_id', $this->currentFormId)->first();
                if (!$leaverequestdata) {
                    return;
                }

                if($this->status == "Pending" || $this->status == "Approved" || $this->status == "Declined"){
                    if($this->key == "list"){
                        if (!empty(array_intersect($role_ids, [4, 6, 7, 8, 14, 61024]))){
                            if ($this->person == "President"){
                                if($this->status == "Approved"){
                                    $leaverequestdata->approved_by_president = 1;
                                } else if ($this->status == "Declined"){
                                    $leaverequestdata->approved_by_president = 0;
                                }
                            } else if ($this->person == "Supervisor"){
                                if($this->status == "Approved"){
                                    $leaverequestdata->approved_by_supervisor = 1;
                                } else if ($this->status == "Declined"){
                                    $leaverequestdata->approved_by_supervisor = 0;
                                }
                            }

                            if($leaverequestdata->approved_by_president == 1 && $leaverequestdata->approved_by_supervisor == 1){
                                $leaverequestdata->status = "Approved";
                            } else if ($leaverequestdata->approved_by_president == 0 && $leaverequestdata->approved_by_supervisor == 0){
                                $leaverequestdata->status = "Declined";
                            } else{
                                $leaverequestdata->status = "Pending";
                            }

                        } 
                        // else if($leaverequestdata->supervisor_email == "spm_2009@wesearch.com.ph"){
                        //     if($role == 6){ // President Role
                        //         $leaverequestdata->approved_by_supervisor = 1;
                        //         $leaverequestdata->approved_by_president = 1;
                        //         $leaverequestdata->status = "Approved";
                        //     }
                        // } else if ($role == 6) {
                        //     $leaverequestdata->approved_by_president = 1;
                        //     if ($leaverequestdata->approved_by_supervisor == 1) {
                        //         $leaverequestdata->status = "Approved";
                        //     }
                        // } else if($leaverequestdata->supervisor_email == "kcastro@projectengage.com.ph"){
                        //     if($role == 7){ // Hr Head Role
                        //         $leaverequestdata->approved_by_supervisor = 1;
                        //         if ($leaverequestdata->approved_by_president == 1) {
                        //             $leaverequestdata->status = "Approved";
                        //         }
                        //     }
                        // } 
                        else {
                            throw new \Exception('Unauthorized Access');
                        }
                    } else {
                        $verdict = Null;
                        $status = Null;
                        if($this->status == "Approved"){
                            $verdict = 1;
                            $status = "Approved";
                        } else if($this->status == "Pending"){
                            $verdict = Null;
                            $status = "Pending";
                        } else {
                            $verdict = 0;
                            $status = "Declined";
                        }
                        if (empty(array_intersect($role_ids, [4, 61024]))) {
                            $leaverequestdata->approved_by_supervisor = $verdict;
                            if ($leaverequestdata->approved_by_president == 1) {
                                $leaverequestdata->status = $status ;
                            }
                        } 
                        else if($leaverequestdata->supervisor_email == "spm_2009@wesearch.com.ph"){
                            if(in_array(6, $role_ids)){ // President Role
                                $leaverequestdata->approved_by_supervisor = $verdict;
                                $leaverequestdata->approved_by_president = $verdict;
                                $leaverequestdata->status = $status ;
                            }
                        } else if (in_array(6, $role_ids)) {
                            $leaverequestdata->approved_by_president = $verdict;
                            if ($leaverequestdata->approved_by_supervisor == 1) {
                                $leaverequestdata->status = $status ;
                            }
                        } else if($leaverequestdata->supervisor_email == "kcastro@projectengage.com.ph"){
                            if(in_array(7, $role_ids)){ // Hr Head Role
                                $leaverequestdata->approved_by_supervisor = $verdict;
                                if ($leaverequestdata->approved_by_president == 1) {
                                    $leaverequestdata->status = $status ;
                                }
                            }
                        } else {
                            throw new \Exception('Unauthorized Access');
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
                    // if($this->key == "list"){
                    //     if($this->status == "Pending" || $this->status == "Declined"){
                    //         $leaverequestdata->approved_by_supervisor = 0;
                    //         $leaverequestdata->approved_by_president = 0;
                    //     }
                    // }
                }
                
                $leaverequestdata->update();

                Mail::to($leaverequestdata->employee->employee_email)
                ->send(new ApproveLeaveRequest($leaverequestdata, $this->person));
        
                $this->dispatch('triggerSuccess'); 
        } catch (\Exception $e) {
            // Log the exception for further investigation
            Log::channel('leaverequests')->error('Failed to update Leave Request: ' . $e->getMessage() . ' | ' . $loggedInUser->employee_id);

            $this->dispatch('triggerError');    
        }
    }
}
