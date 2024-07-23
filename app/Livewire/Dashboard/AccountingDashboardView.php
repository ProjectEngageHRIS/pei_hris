<?php

namespace App\Livewire\Dashboard;

use App\Models\Accountingnotes;
use DateTime;
use Carbon\Carbon;
use App\Models\Payroll;
use Livewire\Component;
use App\Models\Employee;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Livewire\Features\SupportPagination\WithoutUrlPagination;

class AccountingDashboardView extends Component
{

    use WithPagination, WithoutUrlPagination;


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

        $date = Carbon::now();
        $this->halfOfMonthFilter = "1st Half";
        $this->monthFilter = $date->format('F');
        $this->yearFilter = $date->format('Y');
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
        $monthNumber = $this->monthMap[$this->monthFilter];

        $startOfMonth = Carbon::create($this->yearFilter, $monthNumber, 1);

        if($this->halfOfMonthFilter == "1st Half"){


            $middleOfMonth = $startOfMonth->copy()->day(15);

            $payrolls = Payroll::where('year', $this->yearFilter)
                                        ->where('month', $this->monthFilter)
                                        ->whereBetween('start_date', [$startOfMonth, $middleOfMonth])
                                        ->select('month', 'year','start_date', 'target_employee', 'payroll_picture')
                                        ->get();
        } else {

            $middleOfMonth = $startOfMonth->copy()->day(16);
            $endOfMonth = $startOfMonth->copy()->endOfMonth();

            $payrolls = Payroll::where('year', $this->yearFilter)
                                ->where('month', $this->monthFilter)
                                ->whereBetween('start_date', [$middleOfMonth, $endOfMonth])
                                ->select('month', 'year','start_date', 'target_employee', 'payroll_picture')
                                ->get();
        }
     

        // $payrolls = Payroll::where('year', $this->yearFilter)
        //                     ->where('month', $this->monthFilter)
        //                     ->get();


        // Create a map of employee_id to payroll
        $payrollMap = $payrolls->keyBy('target_employee');

        // dd($payrollMap->has("SLE0002"));

        return $payrollMap;
    }

    public function halfOfTheMonth($number){

    }

    // public function getMonthName($monthNumber)
    // {
    //     return DateTime::createFromFormat('!m', $monthNumber)->format('F');
    // }

    public function submit($employee_id){
        $employee = Employee::where('employee_id', $employee_id)->select('employee_id', 'payroll_status')->first();
        $employee->payroll_status = $this->payroll_status;
        $employee->update();
        $this->dispatch('triggerSuccess', ['message' => 'Payroll Updated!']);
        // return $this->dispatch('triggerSuccessCheckIn');
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

    public function addPayroll($employee_id){
        // dd($this->start_date, $this->end_date, $this->payroll_picture);
        $loggedInUser = auth()->user()->employee_id;
        // foreach($this->rules as $rule => $validationRule){
        //     $this->validate([$rule => $validationRule]);
        //     $this->resetValidation();
        // }   

        $payroll = new Payroll();
        $payroll->employee_id = $loggedInUser;
        $payroll->target_employee = $employee_id;
        $start_date = Carbon::parse($this->start_date);
        $payroll->month =  $start_date->format('F');
        $payroll->year =  $start_date->year;
        $payroll->start_date = $this->start_date;
        $payroll->end_date = $this->end_date;
        $payroll->payroll_picture = $this->payroll_picture;
        $payroll->save();

        $employee = Employee::where('employee_id', $employee_id)->first();
        $employee->payroll_status = "Approved";
        $employee->update();

        $this->dispatch('triggerSuccess', ['message' => 'Payroll Added!']);

    }

    public function addNote(){
        $note = new Accountingnotes();
        $note->employee_id = auth()->user()->employee_id;
        $note->note = $this->note;
        $note->save();
        $this->dispatch('triggerSuccess', ['message' => 'Note Added!']);
    }

    public function deleteNote($id){
        $note = Accountingnotes::where('id', $id)->first();
        if($note){
            $note->deleted_at = now();
            $note->update();
            $this->dispatch('triggerSuccess', ['message' => 'Note Deleted!']);
        }
    }

    
 

    public function render()
    {
        $this->payrollMap = $this->getPayrollData();
        // $this->currentMonthName = $this->getMonthName($this->currentMonth);

        $query = Employee::select('first_name', 'middle_name', 'last_name', 'employee_id', 'inside_department', 'department', 'employee_type', 'gender', 'payroll_status', 'employee_email');
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
            })->orderBy('created_at', 'desc')->paginate(6);
        } else {
            $results = $query->orderBy('created_at', 'desc')->paginate(6);
        }

        // $results = $query->orderBy('created_at', 'desc')->where('first_name', 'dsjdak')->paginate(5);

        return view('livewire.dashboard.accounting-dashboard-view', [
            'EmployeeData' => $results, 
            'NotesData' => $notes,
            // 'Payrolls' => $payrolls,
        ])->layout('components.layouts.accounting-navbar');
    }
}
