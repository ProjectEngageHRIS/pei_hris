<?php

namespace App\Livewire\Dashboard;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\Employee;
use App\Models\Ittickets;
use Livewire\WithPagination;
use App\Mail\ApproveItTicket;
use Illuminate\Support\Facades\DB;
use Livewire\WithoutUrlPagination;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class ItDashboardView extends Component
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

    public $itTicketTypes = [
        'Completed' => 0,
        'Ongoing' => 0,
        'Report' => 0,
        'Unassigned' => 0,
        'Cancelled' => 0,
    ];

    public $employeeTypesFilter = [
        'INDEPENDENT CONTRACTOR' => false,
        'INTERNAL EMPLOYEE' => false,
        'INTERN' => false,
        'PROBI' => false,
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

    public $employeeNames;

    public $report;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function mount(){
        $loggedInUser = auth()->user()->permissions;
        $permissions = json_decode($loggedInUser, true);

        try {
            if (empty(array_intersect($permissions, [17, 61024]))) {
                throw new \Exception('Unauthorized Access');
            }
        } catch (\Exception $e) {
            // Log the exception for further investigation
            Log::channel('ittickets')->error('Failed to View/Edit IT Dashboard Table: ' . $e->getMessage() . ' | ' . $loggedInUser );
            return redirect()->to(route('EmployeeDashboard'));
        }

        $employees = Employee::select('first_name', 'middle_name', 'last_name', 'employee_id')->get();
        foreach($employees as $employee){
            $fullName = $employee->first_name . ' ' .  $employee->middle_name . ' ' . $employee->last_name . ' | ' . $employee->employee_id;
            $this->employeeNames[] = $fullName;
        }
    }

    public function clearAllFilters(){
        $this->reset(['employeeTypesFilter', 'insideDepartmentTypesFilter', 'departmentTypesFilter', 'genderTypesFilter']);
    }


    public function render()
    {
        $loggedInUser = auth()->user();

        $query = Ittickets::with('employee:employee_id,first_name,middle_name,last_name,employee_type,inside_department,department,gender');

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
                        ->orWhere('status', 'like', '%' . $term . '%')
                        ->orWhere('description', 'like', '%' . $term . '%')
                        ->orWhere('report', 'like', '%' . $term . '%');
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

        $counts = Ittickets::select(DB::raw('
            SUM(CASE WHEN status = "Completed" THEN 1 ELSE 0 END) AS `Completed`,
            SUM(CASE WHEN status = "Ongoing" THEN 1 ELSE 0 END) AS `Ongoing`,
            SUM(CASE WHEN status = "Report" THEN 1 ELSE 0 END) AS `Report`,
            SUM(CASE WHEN status = "Unassigned" THEN 1 ELSE 0 END) AS `Unassigned`,
            SUM(CASE WHEN status = "Cancelled" THEN 1 ELSE 0 END) AS `Cancelled`
        '))->first();

        // Map the counts to the dtrTypes
        $this->itTicketTypes = array_merge($this->itTicketTypes, $counts->toArray());

        return view('livewire.dashboard.it-dashboard-view', [
            'ItTicketData' => $results,
        ])->layout('components.layouts.it-navbar');
    }

    
    protected $rules = [
        'description' => 'required|string|min:10|max:5120',
        'selectedEmployee' => 'required',
    ];
  
    protected $validationAttributes = [
        'description' => 'Concern Information'
    ];

    public $selectedEmployee;
    public $description;


    public function addTicket(){
          $this->validate();
       try {
            $itticket = new Ittickets();
            $parts = explode(' | ', $this->selectedEmployee);
            $employee_id = trim($parts[1]);

            $itticket->employee_id = $employee_id;
            $itticket->status = $this->status;
            $itticket->description = $this->description;
            $itticket->save();
            $this->dispatch('triggerSuccess', type : "add"); 
       } catch (\Exception $e) {
            // Log the exception for further investigation
            Log::channel('ittickets')->error('Failed to update ItTicket: ' . $e->getMessage());
            // Dispatch a failure event with an error message
            $this->dispatch('triggerError');
        }
    }

    public function changeStatus(){
        $loggedInUser = auth()->user();
        $permissions = is_array($loggedInUser) ? $loggedInUser : json_decode($loggedInUser->permissions, true);
        try {
            $form = Ittickets::find($this->currentFormId);
            if($form){
                if (empty(array_intersect($permissions, [17, 61024]))) {
                    if($this->status == "Cancelled"){
                        $dataToUpdate = ['status' => 'Cancelled', 'cancelled_at' => now()];
                    } else if($this->status == "Report") {
                        $dataToUpdate = ['status' => 'Report', 'report' => $this->report];                        
                    } else {
                        $dataToUpdate = ['status' => $this->status];
                    }
                    $form->update($dataToUpdate);
                    $employeeEmail = Employee::where('employee_id', $form->employee_id)->value('employee_email');
                    Mail::to($employeeEmail)->send(new ApproveItTicket($form));
                    
                    $this->dispatch('triggerSuccess', type: "edit"); 
                } else {
                    throw new \Exception('Unauthorized Access');
                }
            } else {
                throw new \Exception('No Record Found');
            }
        } catch (\Exception $e) {
            // Log the exception for further investigation
            Log::channel('ittickets')->error('Failed to update ItTicket: ' . $e->getMessage() . ' | ' . $loggedInUser->employee_id);
            // Dispatch a failure event with an error message
            $this->dispatch('triggerError');
        }
    }
}
