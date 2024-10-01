<?php

namespace App\Livewire\MyApprovals\HrTickets;

use finfo;
use Exception;
use Carbon\Carbon;
use Livewire\Component;
use App\Models\Employee;
use App\Models\Hrticket;
use App\Models\Leaverequest;
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;

class ApproveHrTicketsTable extends Component
{
    use WithPagination, WithoutUrlPagination;

    public $vacationCredits;
    public $sickCredits;

    public $date_filter;

    public $status_filter;
    public $type_filter;

    public $dateFilterName = "All";
    public $statusFilterName = "All";
    public $typeFilterName = "All";

    public $search = "";

    public $status;

    public $currentFormId;

    public $employeeTypesFilter = [
        'INTERNAL EMPLOYEE' => false,
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

    public function mount(){

        // $loggedInUser = auth()->user();

        // if($loggedInUser->role_id != 9){
        //     return redirect()->to(route('home'));
        //     abort(404);
        // }


        // $employeeInformation = Employee::where('status', $loggedInUser)
        //                         ->select('department_id', 'sick_credits', 'vacation_credits')->first();

        // $this->vacationCredits = $employeeInformation->vacation_credits;
        // $this->sickCredits = $employeeInformation->sick_credits;
    }

    public function clearAllFilters(){
        $this->reset(['employeeTypesFilter', 'insideDepartmentTypesFilter', 'departmentTypesFilter', 'genderTypesFilter']);
    }


    public function render()
    {
        $loggedInUser = auth()->user()->role_id;
        $query = Hrticket::with('employee:employee_id,first_name,middle_name,last_name,employee_type,inside_department,department,gender');

        if(in_array($loggedInUser, [11, 12, 13])){
            $query->where('type_of_ticket', 'HR Internal');
        } else if($loggedInUser == 9){
            $query->where('type_of_ticket', 'Internal Control');
        } else if($loggedInUser == 10){
            $query->where('type_of_ticket', 'HR Operations');
        } else if(in_array($loggedInUser, [7, 8, 61024])){

        } else {
            redirect()->to(route('HumanResourceDashboard'));
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
            case '4':
                $query->where('status', 'Cancelled');
                $this->statusFilterName = "Cancelled";
                break;
            default:
                $this->statusFilterName = "All";
                break;
        }

        switch ($this->type_filter) {
            case '1':
                $query->where('type_of_ticket', 'HR Internal');
                $this->typeFilterName = "HR Internal";
                break;
            case '2':
                $query->where('type_of_ticket', 'Internal Control');
                $this->typeFilterName = "Internal Control";
                break;
            case '3':
                $query->where('type_of_ticket', 'HR Operations');
                $this->typeFilterName = "HR Operations";
                break;
            case '4':
                $query->where('type_of_request', 'HR');
                $this->typeFilterName = "HR";
                break;
            case '5':
                $query->where('type_of_request', 'Office Admin');
                $this->typeFilterName = "Office Admin";
                break;
            case '6':
                $query->where('type_of_request', 'Procurement');
                $this->typeFilterName = "Procurement";
                break;
            default:
                $this->typeFilterName = "All";
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
        if (strlen($this->search) >= 1) {
            $searchTerms = explode(' ', $this->search);
        
            // Add conditions to search through relevant fields
            $results = $query->where(function ($q) use ($searchTerms) {
                foreach ($searchTerms as $term) {
                    $q->orWhereHas('employee', function ($query) use ($term) {
                        $query->where('first_name', 'like', '%' . $term . '%')
                              ->orWhere('last_name', 'like', '%' . $term . '%')
                              ->orWhere('department', 'like', '%' . $term . '%')
                              ->orWhere('current_position', 'like', '%' . $term . '%')
                              ->orWhere('employee_type', 'like', '%' . $term . '%');
                    })
                    ->orWhere('application_date', 'like', '%' . $term . '%')
                    ->orWhere('application_date', 'like', '%' . $term . '%')
                    ->orWhere('concerned_employee', 'like', '%' . $term . '%')
                    ->orWhere('type_of_ticket', 'like', '%' . $term . '%')
                    ->orWhere('type_of_request', 'like', '%' . $term . '%')
                    ->orWhere('sub_type_of_request', 'like', '%' . $term . '%')
                    ->orWhere('purpose', 'like', '%' . $term . '%');
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


        return view('livewire.my-approvals.hr-tickets.approve-hr-tickets-table', [
            'HrTicketData' => $results,
        ])->layout('components.layouts.hr-navbar');

    }

    public function download($reference_num){
        $leaveRequestData = Leaverequest::where('reference_num', $reference_num)->first();
        $image = base64_decode($leaveRequestData->leave_form);
        $finfo = new finfo(FILEINFO_MIME_TYPE);
        $contentType = $finfo->buffer($image);
        // dd($contentType);
        switch($contentType){
            case "application/pdf":
                $fileName = "leaverequest.pdf";
                break;
            case "image/jpeg":
                $fileName = "leaverequest.jpg";
                break;
            case "image/png":
                $fileName = "leaverequest.png";
                break;
            default:
                abort(404);
        }
        return Response::make($image, 200, [
            'Content-Type' => $contentType,
            'Content-Disposition' => 'attachment; filename="'.$fileName.'"'
        ]);
    
    }

    public function getEmployeeName($employee_id){
        $name = Employee::where('employee_id', $employee_id)->select('first_name', 'middle_name', 'last_name')->first();
        return $name->first_name . ' ' . $name->middle_name . ' ' . $name->last_name;
    }

    

    public function changeStatus(){
        $loggedInUser = auth()->user();
        try {
            $form = Hrticket::find($this->currentFormId);
            if($form){
                if(in_array($loggedInUser->role_id, [6, 7, 9, 10, 11, 12, 13, 61024])){
                    if($this->status == "Cancelled"){
                        $dataToUpdate = ['status' => 'Cancelled',
                            'cancelled_at' => now()];
                    } else {
                        $dataToUpdate = ['status' => $this->status];
                    }
                    $form->update($dataToUpdate);
                    $this->dispatch('triggerSuccess'); 
                } else {
                    throw new \Exception('Unauthorized Access');
                }
            } else {
                throw new \Exception('No Record Found');
            }
        } catch (\Exception $e) {
            // Log the exception for further investigation
            Log::channel('hrticket')->error('Failed to update HR Ticket: ' . $e->getMessage() . ' | ' . $loggedInUser->employee_id);

            // Log::channel('hrticket')->error('Failed to update Hrticket: ' . $e->getMessage());
            // Dispatch a failure event with an error message
            $this->dispatch('triggerError');
        }

    }

}
