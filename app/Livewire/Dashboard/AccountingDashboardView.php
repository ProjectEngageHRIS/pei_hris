<?php

namespace App\Livewire\Dashboard;

use DateTime;
use Carbon\Carbon;
use App\Models\Payroll;
use Livewire\Component;
use App\Models\Employee;
use Livewire\WithPagination;
use App\Models\PayrollStatus;
use Livewire\WithFileUploads;
use App\Models\Accountingnotes;
use Illuminate\Support\Facades\Log;
use Livewire\Features\SupportPagination\WithoutUrlPagination;

class AccountingDashboardView extends Component
{

    use WithPagination, WithoutUrlPagination;


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
    public $search;

    public $currentMonth;
    public $currentMonthName;
    public $currentYear;

    public $payrollMap;

    public $payroll_status;
    public $start_date;
    public $end_date;
    public $payroll_picture;

    public $halfOfMonthFilter;
    public $monthFilter;
    public $yearFilter;


    # Notes
    public $note;

    public $employeeNames = [];

    public $employeeEmails = [];

    public $selectedEmployeeEmail;

    public $selectedEmployee;

    public $payroll_phase;

    public $payroll_month;

    public $payroll_year;

    public $payrollStatusesMap;


    // public $showWarning = False;

    // public function search()
    // {
    //     $this->resetPage();
    // }

    // public function updatingSearch()
    // {
    //     $this->resetPage();
    // }

    public function mount(){

        $loggedInUser = auth()->user();
        $role_ids = json_decode($loggedInUser->role_id, true); // Decode role IDs if they're in JSON format
        try {
            // Check for authorized roles using array_intersect
            if (empty(array_intersect($role_ids, [3, 61024]))) {
                throw new \Exception('Unauthorized Access');
            }
        } catch (\Exception $e) {
            // Log the exception for further investigation
            Log::channel('accountingerrors')->error('Failed to View/Edit Accounting Table: ' . $e->getMessage() . ' | ' . $loggedInUser->employee_id );
            return redirect()->to(route('EmployeeDashboard'));
        }

        $date = Carbon::now();
        $this->halfOfMonthFilter = "1st Half";
        $this->monthFilter = $date->format('F');
        $this->yearFilter = $date->format('Y');        
        $employees = Employee::select('first_name', 'middle_name', 'last_name', 'employee_id', 'employee_email')->where('employee_id', '!=', $loggedInUser->employee_id)->get();
        foreach($employees as $employee){
            $fullName = $employee->first_name . ' ' .  $employee->middle_name . ' ' . $employee->last_name . ' | ' . $employee->employee_id;
            $this->employeeNames[] = $fullName;
            $this->employeeEmails[$employee->employee_id] = $employee->employee_email;
        }
        $this->selectedEmployee = reset($this->employeeNames);
        $this->selectedEmployeeEmail = reset($this->employeeEmails);
        $this->payroll_phase = $this->halfOfMonthFilter;
        $this->payroll_month = $this->monthFilter;
        $this->payroll_year = $this->yearFilter;
        $this->payrollMap = $this->getPayrollData();
        $this->payrollStatusesMap = $this->getPayrollStatuses();

    }



    public function clearAllFilters()
    {
        $this->employeeTypesFilter = [];
        $this->insideDepartmentTypesFilter = [];
        $this->departmentTypesFilter = [];
        $this->genderTypesFilter = [];
    }

    // public function getPayrollData($id){
    //     $payrolls = Payroll::query()->where('year', $this->currentYear)->where('month', $this->currentMonth)->get();

    // }


    public function updated($keys){
        if($keys == "selectedEmployee"){
            $parts = explode(' | ', $this->selectedEmployee);
            $this->selectedEmployeeEmail = $this->employeeEmails[$parts[1]];
        }
        if(in_array($keys, ['yearFilter', 'monthFilter', 'halfOfMonthFilter'])){
            $this->payroll_phase = $this->halfOfMonthFilter;
            $this->payroll_month = $this->monthFilter;
            $this->payroll_year = $this->yearFilter;
        }
    }


    public $monthMap = [
        'January' => 1,
        'February' => 2,
        'March' => 3,
        'April' => 4,
        'May' => 5,
        'June' => 6,
        'July' => 7,
        'August' => 8,
        'September' => 9,
        'October' => 10,
        'November' => 11,
        'December' => 12,
    ];

    public function getPayrollData()
    {   
        $payrolls = Payroll::where('year', $this->yearFilter)
                                    ->where('month', $this->monthFilter)
                                    ->where('phase', $this->halfOfMonthFilter)
                                    ->whereNull('deleted_at')
                                    ->select('month', 'year', 'phase', 'target_employee', 'payroll_picture')
                                    ->get();

        // $payrolls = Payroll::where('year', $this->yearFilter)
        //                     ->where('month', $this->monthFilter)
        //                     ->get();


        // Create a map of employee_id to payroll
        $payrollMap = $payrolls->keyBy('target_employee');

        // dd($payrollMap->has("SLE0002"));

        return $payrollMap;
    }

    public function getPayrollStatuses(){
        $payroll_statuses = PayrollStatus::where('year', $this->yearFilter)
                                    ->where('month', $this->monthFilter)
                                    ->where('phase', $this->halfOfMonthFilter)
                                    ->whereNull('deleted_at')
                                    ->select('month', 'year', 'phase', 'target_employee', 'status')
                                    ->get();
        $payrollStatusesMap = $payroll_statuses->keyBy('target_employee');
        return $payrollStatusesMap;
    }

    public function halfOfTheMonth($number){

    }

    // public function getMonthName($monthNumber)
    // {
    //     return DateTime::createFromFormat('!m', $monthNumber)->format('F');
    // }

    public function submit($employee_id){
        $loggedInUser = auth()->user();
        // Validate input data
        $this->validate([
            // 'phase' => 'required|in:1st Half,2nd Half',  // Removed the space after comma
            // 'month' => 'required|in:January,February,March,April,May,June,July,August,September,October,November,December',  // Add your actual months or valid values here
            // 'year' => 'required|digits:4|integer',  // Added validation rule for year
            'payroll_status' => 'required|in:Awaiting Approval,Approved,Overdue,Draft',  // Added validation rule for payroll_status
        ]);
        $role_ids = json_decode($loggedInUser->role_id, true); // Decode role IDs if they're in JSON format
        
        try {
            // Check for authorized roles using array_intersect
            if (empty(array_intersect($role_ids, [3, 61024]))) {
                throw new \Exception('Unauthorized Access');
            }

            $payroll_status_data = PayrollStatus::where('target_employee', $employee_id)
                    ->where('phase',  $this->payroll_phase)
                    ->where('month',  $this->payroll_month)
                    ->where('year',   $this->payroll_year)
                    ->whereNull('deleted_at')
                    ->select('month', 'year', 'employee_id', 'status', 'id')->first();
    
            if(!$payroll_status_data){
                $payroll_status = new PayrollStatus();
                $payroll_status->employee_id = $loggedInUser->employee_id;
                $payroll_status->target_employee = $employee_id;
                $payroll_status->phase = $this->payroll_phase;
                $payroll_status->month = $this->payroll_month;
                $payroll_status->year = $this->payroll_year;
                $payroll_status->status = $this->payroll_status;
                $payroll_status->save();
                return $this->dispatch('triggerSuccess', type: 'Status');
            }        
    
            $payroll_status_data->status = $this->payroll_status;
            $payroll_status_data->update();
    
            return $this->dispatch('triggerSuccess',  type: 'Status');
        } catch (\Exception $e) {
            // Log the exception for further investigation
            $this->dispatch('trigger-error');
            Log::channel('accountingerrors')->error('Failed to Update Payslip: ' . $e->getMessage() . ' | ' . $loggedInUser->employee_id );
            return redirect()->to(route('EmployeeDashboard'));
        }
    }

    public function resetEditField($var){
        $this->payroll_status = null;
    }

    public function resetPayrollField(){
        $this->payroll_picture = null;
    }

    public function resetAddField(){
        $this->start_date = null;
        $this->end_date = null;
        $this->payroll_picture = null;
    }

    public function resetErrors(){
        $this->resetErrorBag();
    }

    protected $rules = [
        'start_date' => 'required',
        'end_date' => 'required',
        'payroll_picture' => 'required',
    ];

    // public function validatePayrollData(){
    //     foreach($this->rules as $rule => $validationRule){
    //         $this->validate([$rule => $validationRule]);
    //         $this->resetValidation();
    //     }   
    //     $this->showWarning = True;
    // }

    public function addTargetPayroll(){
        $loggedInUser = auth()->user();
        $this->validate([
            'payroll_phase' => 'required|in:1st Half,2nd Half',  // Removed the space after comma
            'payroll_month' => 'required|in:January,February,March,April,May,June,July,August,September,October,November,December',  // Add your actual months or valid values here
            'payroll_year' => 'required|digits:4|integer',  // Added validation rule for year
            'payroll_picture' => 'required|url:https',
        ]);

        $role_ids = json_decode($loggedInUser->role_id, true); // Decode role IDs if they're in JSON format
        
        try {
            // Check for authorized roles using array_intersect
            if (empty(array_intersect($role_ids, [3, 61024]))) {
                throw new \Exception('Unauthorized Access');
            }
                $parts = explode(' | ', $this->selectedEmployee);
                $payroll_exists = Payroll::where('target_employee', $parts[1])
                                                ->whereNull('deleted_at')
                                                ->where('phase',  $this->payroll_phase)
                                                ->where('month',  $this->payroll_month)
                                                ->where('year',   $this->payroll_year)
                                                ->select('month', 'year', 'employee_id', 'target_employee')->first();

                if($payroll_exists){
                    $this->dispatch('trigger-already-exists');
                    return ;
                }

                $payroll = new Payroll();
                $payroll->employee_id = $loggedInUser->employee_id;
                $payroll->target_employee = $parts[1];
                $payroll->phase = $this->payroll_phase;
                $payroll->month = $this->payroll_month;
                $payroll->year = $this->payroll_year;
                $payroll->payroll_picture = $this->payroll_picture;

                $payroll->save();


                $payroll_status_data = PayrollStatus::where('target_employee', $payroll->target_employee)
                                                ->where('phase',  $this->payroll_phase)
                                                ->where('month',  $this->payroll_month)
                                                ->where('year',   $this->payroll_year)
                                                ->whereNull('deleted_at')
                                                ->select('month', 'year', 'employee_id', 'status', 'id')->first();
                if(!$payroll_status_data){
                    $payroll_status = new PayrollStatus();
                    $payroll_status->employee_id = $loggedInUser->employee_id;
                    $payroll_status->target_employee = $payroll->target_employee;
                    $payroll_status->phase = $payroll->phase;
                    $payroll_status->year = $payroll->year;
                    $payroll_status->month = $payroll->month;
                    // if($start_date->day  15) $payroll->month_phase = '1st Half'
                }        

                $payroll_status->status = "Approved";
                $payroll_status->save();

                $this->dispatch('triggerSuccess', type: 'Add');
        } catch (\Exception $e) {
            // Log the exception for further investigation
            $this->dispatch('trigger-error');
            Log::channel('accountingerrors')->error('Failed to Update Payslip: ' . $e->getMessage() . ' | ' . $loggedInUser->employee_id );
            // return redirect()->to(route('EmployeeDashboard'));
        }
    }



    public function editPayroll($employee_id){
        $this->validate([
            'payroll_phase' => 'required|in:1st Half,2nd Half',  // Removed the space after comma
            'payroll_month' => 'required|in:January,February,March,April,May,June,July,August,September,October,November,December',  // Add your actual months or valid values here
            'payroll_year' => 'required|digits:4|integer',  // Added validation rule for year
            'payroll_picture' => 'required|url:https',
        ]);

        $loggedInUser = auth()->user();
        $role_ids = json_decode($loggedInUser->role_id, true); // Decode role IDs if they're in JSON format
        
        try {
            // Check for authorized roles using array_intersect
            if (empty(array_intersect($role_ids, [3, 61024]))) {
                throw new \Exception('Unauthorized Access');
            }
            $payroll = Payroll::where('target_employee', $employee_id)
                                ->where('phase',  $this->payroll_phase)
                                ->where('month',  $this->payroll_month)
                                ->where('year',   $this->payroll_year)
                                ->whereNull('deleted_at')
                                ->select('month', 'phase', 'year', 'employee_id', 'target_employee','payroll_id', 'payroll_picture')->first();

            if($payroll){
                $payroll->employee_id = $loggedInUser->employee_id;
                $payroll->payroll_picture = $this->payroll_picture;
            } else {
                $this->dispatch('trigger-error');
            }


            $payroll_status_data = PayrollStatus::where('target_employee', $payroll->target_employee)
                                            ->where('phase', $payroll->phase)
                                            ->where('month', $payroll->month)
                                            ->where('year', $payroll->year)
                                            ->whereNull('deleted_at')
                                            ->select('month', 'year', 'phase', 'employee_id', 'status', 'id')->first();
            if(!$payroll_status_data){
                $payroll_status = new PayrollStatus();
                $payroll_status->employee_id = $loggedInUser->employee_id;
                $payroll_status->target_employee = $payroll->target_employee;
                $payroll_status->phase = $payroll->phase;
                $payroll_status->year = $payroll->year;
                $payroll_status->month = $payroll->month;
                $payroll_status->status = "Approved";
                $payroll_status->save();
                $payroll->save();
            } else {
                $payroll_status_data->status = "Approved";
                $payroll_status_data->save();
                $payroll->save();
            }

            $this->dispatch('triggerSuccess');
        } catch (\Exception $e) {
            // Log the exception for further investigation
            $this->dispatch('trigger-error');
            Log::channel('accountingerrors')->error('Failed to Update Payslip: ' . $e->getMessage() . ' | ' . $loggedInUser->employee_id );
        }

    }

    public function addPayroll($employee_id){
        $this->validate(
            [
                'payroll_phase' => 'required|in:1st Half,2nd Half',
                'payroll_month' => 'required|in:January,February,March,April,May,June,July,August,September,October,November,December',
                'payroll_year' => 'required|digits:4|integer',
                'payroll_picture' => 'required|url:https',
            ],
            [
                'payroll_phase.required' => 'The Phase field is required.',
                'payroll_phase.in' => 'The selected Phase must be either 1st Half or 2nd Half.',
                
                'payroll_month.required' => 'The Month field is required.',
                'payroll_month.in' => 'The selected Month must be one of the following: January, February, March, April, May, June, July, August, September, October, November, or December.',
                
                'payroll_year.required' => 'The Year field is required.',
                'payroll_year.digits' => 'The Year must be exactly 4 digits.',
                'payroll_year.integer' => 'The Year must be a valid integer.',
                
                'payroll_picture.required' => 'The Payslip Photo Link field is required.',
                'payroll_picture.url' => 'The Payslip Photo Link must be a valid URL',
            ]
        );

        $loggedInUser = auth()->user();

        $role_ids = json_decode($loggedInUser->role_id, true); // Decode role IDs if they're in JSON format
        
        try {
            // Check for authorized roles using array_intersect
            if (empty(array_intersect($role_ids, [3, 61024]))) {
                throw new \Exception('Unauthorized Access');
            }

            $payroll = new Payroll();
            $payroll->employee_id = $loggedInUser->employee_id;
            $payroll->target_employee = $employee_id;
            $payroll->phase = $this->payroll_phase;
            $payroll->month = $this->payroll_month;
            $payroll->year = $this->payroll_year;
            $payroll->payroll_picture = $this->payroll_picture;

            $payroll_status_data = PayrollStatus::where('target_employee', $payroll->target_employee)
                                            ->where('month', $payroll->month)
                                            ->where('phase', $payroll->phase)
                                            ->where('year', $payroll->year)
                                            ->whereNull('deleted_at')
                                            ->select('month', 'year', 'phase', 'employee_id', 'status', 'id',)->first();
            if(!$payroll_status_data){
                $payroll_status = new PayrollStatus();
                $payroll_status->employee_id = $loggedInUser->employee_id;
                $payroll_status->target_employee = $payroll->target_employee;
                $payroll_status->phase = $payroll->phase;
                $payroll_status->year = $payroll->year;
                $payroll_status->month = $payroll->month;
                $payroll_status->status = "Approved";
                $payroll_status->save();
                $payroll->save();
                return $this->dispatch('trigger-success-add');
            }        

            $payroll_status_data->status = "Approved";
            $payroll_status_data->save();
            $payroll->save();

            return $this->dispatch('trigger-success-add');
        } catch (\Exception $e) {
            $this->dispatch('trigger-error');

            // Log the exception for further investigation
            Log::channel('accountingerrors')->error('Failed to Update Payslip: ' . $e->getMessage() . ' | ' . $loggedInUser->employee_id );
            // return redirect()->to(route('EmployeeDashboard'));
        }

    }


    public function deletePayroll($employee_id){
        $loggedInUser = auth()->user();
        $role_ids = json_decode($loggedInUser->role_id, true); // Decode role IDs if they're in JSON format
        
        try {
            // Check for authorized roles using array_intersect
            if (empty(array_intersect($role_ids, [3, 61024]))) {
                throw new \Exception('Unauthorized Access');
            }

            $payroll = Payroll::where('target_employee', $employee_id)
                                ->where('phase',  $this->payroll_phase)
                                ->where('month',  $this->payroll_month)
                                ->where('year',   $this->payroll_year)
                                ->whereNull('deleted_at')
                                ->select('month', 'year', 'phase', 'employee_id', 'target_employee','payroll_id', 'payroll_picture')->first();


            $payroll_status_data = PayrollStatus::where('target_employee', $payroll->target_employee)
                                ->where('phase', $payroll->phase)
                                ->where('month', $payroll->month)
                                ->where('year', $payroll->year)
                                ->whereNull('deleted_at')
                                ->select('month', 'year', 'phase', 'employee_id', 'status', 'id')->first();

            if($payroll_status_data && $payroll){
                $payroll_status_data->employee_id = $loggedInUser->employee_id;
                $payroll_status_data->deleted_at = now();
                $payroll->employee_id = $loggedInUser->employee_id;
                $payroll->deleted_at = now();
                $payroll_status_data->delete();
                $payroll->delete();
            } 
            return $this->dispatch('trigger-success-delete');

        } catch (\Exception $e) {
            $this->dispatch('trigger-error');

            // Log the exception for further investigation
            Log::channel('accountingerrors')->error('Failed to Update Payslip: ' . $e->getMessage() . ' | ' . $loggedInUser->employee_id );
            // return redirect()->to(route('EmployeeDashboard'));
        }
    }

    public function addNote(){
        $this->validate([
            'note' => 'required|string|min:5',
        ]);
        try {
            $note = new Accountingnotes();
            $note->employee_id = auth()->user()->employee_id;
            $note->note = $this->note;
            $note->save();
            $this->dispatch('triggerSuccess', type: 'Notes');
        }  catch (\Exception $e) {

            // Log the exception for further investigation
            Log::channel('accountingerrors')->error('Failed to add Note: ' . $e->getMessage());

            // Dispatch a failure event with an error message
            $this->dispatch('trigger-error');
            // return redirect()->back()->withErrors('Something went wrong. Please contact IT support.');
        }
    }

    public function deleteNote($id){
        try {
            $note = Accountingnotes::where('id', $id)->first();
            if($note){
                $note->deleted_at = now();
                $note->update();
                $this->dispatch('trigger-success-delete-note');
            }
        } catch (\Exception $e) {
            // Log the exception for further investigation
            Log::channel('accountingerrors')->error('Failed to delete Note: ' . $e->getMessage());

            // Dispatch a failure event with an error message
            $this->dispatch('trigger-error');
            // return redirect()->back()->withErrors('Something went wrong. Please contact IT support.');
        }
    }

    public function render()
    {
        $this->payrollMap = $this->getPayrollData();
        $this->payrollStatusesMap = $this->getPayrollStatuses();
        // $this->currentMonthName = $this->getMonthName($this->currentMonth);

        $query = Employee::select('first_name', 'middle_name', 'last_name', 'employee_id', 'inside_department', 'department', 'employee_type', 'gender', 'employee_email');
        $payroll_statuses = PayrollStatus::whereNotNull('deleted_at')->get();
        $notes = Accountingnotes::select('note', 'id')->whereNull('deleted_at')->simplePaginate(10, ['*'], 'commentsPage');

        // Employee Type Filter
        $employeeTypes = array_filter(array_keys($this->employeeTypesFilter), function($key) {
            return $this->employeeTypesFilter[$key];
        });
        
        if (!empty($employeeTypes)) {
            $query->whereIn('employee_type', $employeeTypes);
        }

        // // Inside Department Filter
        $insideDepartmentTypes = array_filter(array_keys($this->insideDepartmentTypesFilter), function($key) {
            return $this->insideDepartmentTypesFilter[$key];
        });
        
        if (!empty($insideDepartmentTypes)) {
            $query->whereIn('inside_department', $insideDepartmentTypes);
        } 
        // // dump($insideDepartmentTypes);

        // // Department Filter
        $departmentTypes = array_filter(array_keys($this->departmentTypesFilter), function($key) {
            return $this->departmentTypesFilter[$key];
        });
        
        if (!empty($departmentTypes)) {
            $query->whereIn('department', $departmentTypes);
        }

        // // Department Filter
        $genderTypes = array_filter(array_keys($this->genderTypesFilter), function($key) {
            return $this->genderTypesFilter[$key];
        });
        
        if (!empty($genderTypes)) {
            $query->whereIn('gender', $genderTypes);
        }
        

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
            });
        } 

        $loggedInUser = auth()->user()->role_id; // Assuming this returns a single role ID or a JSON-encoded string

        // Decode the role IDs if they are in JSON format
        $role_ids = is_array($loggedInUser) ? $loggedInUser : json_decode($loggedInUser, true);
        
        if (in_array(61024, $role_ids)) {
            // If the user has the superadmin role (61024)
            $results = $query->orderBy('created_at', 'desc')->paginate(5);
        } else {
            // For other users, exclude a specific employee
            $results = $query->orderBy('created_at', 'desc')
                             ->where('employee_id', '!=', 'SLEA9999')
                             ->paginate(6);
        }

        // $results = $query->orderBy('created_at', 'desc')->where('first_name', 'dsjdak')->paginate(5);

        return view('livewire.dashboard.accounting-dashboard-view', [
            'EmployeeData' => $results, 
            'NotesData' => $notes,
            'PayrollStatus' => $payroll_statuses,
            'payrollMap' => $this->payrollMap,
            // 'Payrolls' => $payrolls,
        ])->layout('components.layouts.accounting-navbar');
    }
}
