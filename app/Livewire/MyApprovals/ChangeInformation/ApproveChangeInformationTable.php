<?php

namespace App\Livewire\MyApprovals\ChangeInformation;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\Employee;
use App\Models\Ittickets;
use Livewire\WithPagination;
use App\Models\ChangeInformation;
use Livewire\WithoutUrlPagination;
use Illuminate\Support\Facades\Log;

class ApproveChangeInformationTable extends Component
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

    // public $changeInfoTypes = [
    //     'Completed' => null,
    //     'Ongoing' => null,
    //     'Unassigned' => null,
    //     'Cancelled' => null,
    // ];

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

    public function clearAllFilters(){
        $this->reset(['employeeTypesFilter', 'insideDepartmentTypesFilter', 'departmentTypesFilter', 'genderTypesFilter']);
    }

    public function render()
    {
        $query = ChangeInformation::with('employee:employee_id,first_name,middle_name,last_name,employee_type,inside_department,department,gender');

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
            })->orderBy('created_at', 'desc')->paginate(6);
        } else {
            $results = $query->orderBy('created_at', 'desc')->paginate(6);
        }

        return view('livewire.my-approvals.change-information.approve-change-information-table', [
            'ChangeInfoData' => $results,
        ])->layout('components.layouts.hr-navbar');
    }

    public function removeForm($index){
        $leaveRequestData = ChangeInformation::where('form_id', $index)->first();
        $dataToUpdate = ['status' => 'Cancelled',
                         'cancelled_at' => now()];
        // $this->authorize('delete', $leaveRequestData);
        ChangeInformation::where('form_id', $index)->update($dataToUpdate);
        return redirect()->route('ApproveChangeInformationTable');
    }

    public function changeStatus(){
        $loggedInUser = auth()->user();
        try {
            if ($loggedInUser->role_id != 9 && $loggedInUser->role_id != 10){
                throw new \Exception('Unauthorized Access');
            } 
            if($this->status == "Approved"){
                $changeInformationStatus = ChangeInformation::where('form_id', $this->currentFormId)->first();

                if(!$changeInformationStatus){
                    throw new \Exception('No Record Found');
                }
                $employee = Employee::where('employee_id', $changeInformationStatus->employee_id)->first();
                $employee->first_name = $changeInformationStatus->first_name;
                $employee->middle_name = $changeInformationStatus->middle_name;
                $employee->last_name = $changeInformationStatus->last_name;
                $employee->civil_status = $changeInformationStatus->civil_status;
                $employee->religion = $changeInformationStatus->religion;
                $employee->nickname = $changeInformationStatus->nickname;
    
                // $employee->age = $changeInformationStatus->age;
                $employee->gender = $changeInformationStatus->gender;
                $employee->personal_email = $changeInformationStatus->personal_email;
                $employee->phone_number = $changeInformationStatus->phone;
                $employee->home_address = $changeInformationStatus->address;
    
    
                
                if($changeInformationStatus->emp_image){
                    // $this->validate(['emp_image' => 'nullable']);
                    $employee->emp_image = $changeInformationStatus->emp_image;
                }
    
                // $fileFields = [
                //     'emp_diploma',
                //     'emp_TOR',
                //     'emp_cert_of_trainings_seminars',
                //     'emp_auth_copy_of_csc_or_prc',
                //     'emp_auth_copy_of_prc_board_rating',
                //     'emp_med_certif',
                //     'emp_nbi_clearance',
                //     'emp_psa_birth_certif',
                //     'emp_psa_marriage_certif',
                //     'emp_service_record_from_other_govt_agency',
                //     'emp_approved_clearance_prev_employer',
                //     'other_documents'
                // ];
                
                
                // foreach ($fileFields as $field) {
                //     $fileNames = [];            
                //     $ctrField = count($this->$field) - 1 ;
                //     $ctr = 0;
                //     foreach($this->$field as $this->currentFormId => $item){
                //         $ctr += 1;
                //         if(is_null($item)){
                //         }
                //         else if(is_string($item)){
                //             // $fileNames[] = $item;
                //         }
                //         else{
                //             $this->resetValidation();
                //             if (!is_array($item) && !is_string($item)) {
                //                 $this->addError($field . '.' . $this->currentFormId, 'The' . $field . 'must be a string or an array.');
                //             }
                //         }
                //     }
                //     if(count($fileNames) > 0){
                //         $employee->$field = json_encode($fileNames, true);        
                //     } else{
    
                //     }
                // }
            
                
                // foreach($this->employeeHistory as $history){
                //     $jsonEmployeeHistory[] = [
                //         'name_of_company' => $history['name_of_company'],
                //         'prev_position' => $history['prev_position'],
                //         'start_date' => $history['start_date'],
                //         'end_date' => $history['end_date'],
                //     ];
                // }
    
                // $jsonEmployeeHistory = json_encode($jsonEmployeeHistory);
    
                $employee->employee_history = $changeInformationStatus->employee_history ;  
                
                // dd(base64_encode($changeInformationStatus->emp_photo));
                $updateData = [
                    'first_name' =>  $employee->first_name  ,
                    'middle_name' => $employee->middle_name,
                    'last_name' => $employee->last_name,
                    // 'age' =>  $employee->age,
                    'gender' => $employee->gender,
                    'civil_status' => $employee->civil_status,
                    'religion' => $employee->religion,
                    'phone_number'  => $employee->phone_number,
                    'birth_date' => $employee->birth_date,
                    'home_address' => $employee->home_address,
                    'nickname' => $employee->nickname,
                    'employee_history' => $employee->employee_history,
                    'emp_image' => $employee->emp_image,
                    // 'other_documents' => json_encode($employee->other_documents, true),
                    'updated_at' => now(),
                ];
    
                
                Employee::where('employee_id', $changeInformationStatus->employee_id)
                                    ->update($updateData);
                
                // $this->js("alert('Change Information Request Submitted!')"); 
    
                $jsonEmployeeHistory = json_encode($jsonEmployeeHistory ?? ' ') ;
    
                $employee->employee_history = $jsonEmployeeHistory;
    
                
            }
            
            $changeInformationStatus = ChangeInformation::where('form_id', $this->currentFormId)
                                                            ->update(['Status' => $this->status,
                                                                    'updated_at' => now() ]);
    
            $this->dispatch('triggerSuccess');

            return redirect()->to(route('ApproveChangeInformationTable'));
        } catch (\Exception $e) {
            // Log the exception for further investigation
            Log::channel('changeinforequests')->error('Failed to update Change Request: ' . $e->getMessage() . ' | ' . $loggedInUser->employee_id);

            // Dispatch a failure event with an error message
            $this->dispatch('triggerError');

            // Optionally, you could redirect the user to an error page or show an error message
            // return redirect()->back()->withErrors('Something went wrong. Please contact IT support.');
        }

    }
 
}
