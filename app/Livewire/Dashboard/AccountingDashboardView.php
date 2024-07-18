<?php

namespace App\Livewire\Dashboard;

use DateTime;
use Carbon\Carbon;
use App\Models\Payroll;
use Livewire\Component;
use App\Models\Employee;
use Livewire\WithFileUploads;
use Livewire\WithoutUrlPagination;

class AccountingDashboardView extends Component
{

    use WithoutUrlPagination, WithFileUploads;


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

    public $showWarning = False;

    // public function search()
    // {
    //     $this->resetPage();
    // }

    // public function updatingSearch()
    // {
    //     $this->resetPage();
    // }


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

    public function getPayrollData()
    {
        // Fetch all payrolls for the current year and month
        $this->currentYear = 2024;
        $this->currentMonth = 7;

        $payrolls = Payroll::where('year', $this->currentYear)
                            ->where('month', $this->currentMonth)
                            ->get();

        // Create a map of employee_id to payroll
        $payrollMap = $payrolls->keyBy('target_employee');

        // dd($payrollMap->has("SLE0002"));

        return $payrollMap;
    }

    public function getMonthName($monthNumber)
    {
        return DateTime::createFromFormat('!m', $monthNumber)->format('F');
    }

    public function submit($employee_id){
        $employee = Employee::where('employee_id', $employee_id)->select('employee_id', 'payroll_status')->first();
        $employee->payroll_status = $this->payroll_status;
        $employee->update();
        $this->dispatch('triggerSuccessCheckIn');
        // return $this->dispatch('triggerSuccessCheckIn');
    }

    protected $rules = [
        'start_date' => 'required',
        'end_date' => 'required',
        'payroll_picture' => 'required',
    ];

    public function validatePayrollData(){
        foreach($this->rules as $rule => $validationRule){
            $this->validate([$rule => $validationRule]);
            $this->resetValidation();
        }   
        $this->showWarning = True;
    }

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
        $payroll->month =  $start_date->month;
        $payroll->year =  $start_date->year;
        $payroll->start_date = $this->start_date;
        $payroll->end_date = $this->end_date;
        $payroll->payroll_picture = $this->payroll_picture;
        $payroll->save();

        $this->showWarning = False;


        $this->dispatch('triggerSuccess');



    }


    public function render()
    {
        $this->payrollMap = $this->getPayrollData();
        $this->currentMonthName = $this->getMonthName($this->currentMonth);

        $query = Employee::select('first_name', 'middle_name', 'last_name', 'employee_id', 'inside_department', 'department', 'employee_type', 'gender', 'payroll_status', 'employee_email');

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
            })->orderBy('created_at', 'desc')->paginate(5);
        } else {
            $results = $query->orderBy('created_at', 'desc')->paginate(5);
        }

        // $results = $query->orderBy('created_at', 'desc')->where('first_name', 'dsjdak')->paginate(5);

        return view('livewire.dashboard.accounting-dashboard-view', [
            'EmployeeData' => $results, 
            // 'Payrolls' => $payrolls,
        ])->layout('components.layouts.accounting-navbar');
    }
}
