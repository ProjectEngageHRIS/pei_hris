<?php

namespace App\Livewire\HrPortal;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\Employee;
use App\Models\Training;
use App\Models\Activities;
use Livewire\WithPagination;
use App\Exports\UserDtrExport;
use App\Models\Dailytimerecord;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Cache;
use App\Exports\DailyTimeRecordExport;
use Illuminate\Support\Facades\Storage;
use Livewire\Features\SupportPagination\WithoutUrlPagination;

class HrDailyTimeRecord extends Component
{
    use WithPagination;

    public $options = [];
    public $dateChosen = [];

    public $chartFilter;

    public $currentYear;

    public $currentMonth;

    public $currentMonthName;

    public $dayFilter;

    public $dayFilterName;
    public $monthFilter;
    
    public $monthFilterName;
    public $yearFilter;

    public $yearFilterName;

    public $search = "";

    // public $filter;

    public $filterName = "All";


    public $activities;

    public $trainings;
    public $data;
    public $dateData = [];
    public $weeklyCountsArray = [];
    public $monthlyCountsArray = [];
    public $vacationCredits;
    public $sickCredits;

    public $filter = "Weekly";

    public $period;

    public $firstName;

    public $gender;

    public $currentHourMinuteSecond;

    public $start_date;

    public $end_date;

    public $employeeNames = [];

    public $selectedEmployee = "All";

    // Filters 
    public $employeeTypesFilter = [
        'INDEPENDENT CONSULTANT' => false,
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
        'PEI/SLTEMPSDO174' => false,
        'CAF' => false,
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

    public $dtrTypes = [
        'Absent' => null,
        'Late' => null,
        'Wholeday' => null,
        'Overtime' => null,
        'Undertime' => null,
        'No Time Out' => null,
        'Leave' => null
    ];


    public $employeeTypeFilter;
    public $departmentTypeFilter;
    public $companyFilter;
    public $genderFilter;




    protected $queryString = [
        'category',
        'sort',
    ];

    public $selectedDate;
    

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
            if(!in_array($loggedInUser, [7, 8, 61024])){
                throw new \Exception('Unauthorized Access');
            }
        } catch (\Exception $e) {
            // Log the exception for further investigation
            Log::channel('hrextract')->error('Failed to view Approve HR DTR Table: ' . $e->getMessage() . ' | ' . $loggedInUser );
            return redirect()->to(route('EmployeeDashboard'));
        }

        $now = Carbon::now();
        $currentYear = $now->year;
        $currentMonth = $now->month;
        $currentMonthName = $now->format('F');
        $this->currentYear = $currentYear;
        $this->currentMonth = $currentMonth;
        $this->currentMonthName = $currentMonthName;
        $this->yearFilter = $currentYear;
        $this->monthFilter = $currentMonth;
        $years = range($currentYear, 2000, -1);
        $months = [
            '01' => 'January',
            '02' => 'February',
            '03' => 'March',
            '04' => 'April',
            '05' => 'May',
            '06' => 'June',
            '07' => 'July',
            '08' => 'August',
            '09' => 'September',
            '10' => 'October',
            '11' => 'November',
            '12' => 'December'
        ];

        // Add options for the current month and year
        $this->options["{$currentYear}-{$currentMonth}"] = "{$currentYear} - {$months[str_pad($currentMonth, 2, '0', STR_PAD_LEFT)]}";

        // Add options for the previous months of the current year
        for ($i = $currentMonth - 1; $i > 0; $i--) {
            $monthNumber = str_pad($i, 2, '0', STR_PAD_LEFT);
            $this->options["{$currentYear}-{$monthNumber}"] = "{$currentYear} - {$months[$monthNumber]}";
        }

        // Loop through previous years and add options for each month
        foreach (array_slice($years, 1) as $year) {
            foreach ($months as $monthNumber => $monthName) {
                $this->options["{$year}-{$monthNumber}"] = "{$year} - {$monthName}";
            }
        }

        // $this->setGraph();
        $this->chartFilter = "Weekly";

        $employees = Employee::select('first_name', 'middle_name', 'last_name', 'employee_id')->get();
        foreach($employees as $employee){
            $fullName = $employee->first_name . ' ' .  $employee->middle_name . ' ' . $employee->last_name . ' | ' . $employee->employee_id;
            $this->employeeNames[] = $fullName;
        }
    }

    public function setGraph(){
        // Query to get the attendance count for each month in the current year
        $loggedInUser = auth()->user()->employee_id;
        $monthlyCounts = Dailytimerecord::select(
                DB::raw('MONTH(attendance_date) as month'),
                DB::raw('COUNT(*) as count')
            )
            ->where('employee_id', $loggedInUser)
            ->whereYear('attendance_date', $this->yearFilter)
            ->groupBy(DB::raw('MONTH(attendance_date)'))
            ->get();

        $weeklyCounts = Dailytimerecord::select(
            DB::raw('WEEK(attendance_date, 0) as week'), // Start the week on Sunday (0)
            DB::raw('COUNT(*) as count')
            )->where('employee_id', $loggedInUser)
            ->whereYear('attendance_date', $this->yearFilter)
            ->whereMonth('attendance_date', $this->monthFilter != "all" ? $this->monthFilter : $this->currentMonth)
            ->groupBy(DB::raw('WEEK(attendance_date, 0)'))
            ->get();

        // Initialize arrays to hold the counts for each month and week
        $monthlyCountsArray = [];
        $weeklyCountsArray = [];

        // Process monthly counts
        for ($i = 1; $i <= 12; $i++) {
            $found = false;
            foreach ($monthlyCounts as $count) {
                if ($count->month == $i) {
                    $monthlyCountsArray[$i] = $count->count;
                    $found = true;
                    break;
                }
            }
            if (!$found) {
                $monthlyCountsArray[$i] = 0;
            }
        }

        foreach ($weeklyCounts as $count) {
            if($count->count != 0){
                $weeklyCountsArray[] = $count->count;
            }else {
                $weeklyCountsArray[] = 0;
            }
        }
        while (count($weeklyCountsArray) < 5) {
            $weeklyCountsArray[] = 0;
        }

        return [$monthlyCountsArray, $weeklyCountsArray];
}

    public function clearAllFilters()
    {
        $this->employeeTypesFilter = [];
        $this->insideDepartmentTypesFilter = [];
        $this->departmentTypesFilter = [];
        $this->genderTypesFilter = [];
    }

    public function generateRecord(){

        // $this->dispatch('triggerClose');
        if($this->selectedEmployee == "All"){
            return Excel::download(new DailyTimeRecordExport($this->start_date, $this->end_date), 'timekeeping.xlsx');
        }
        $parts = explode(' | ', $this->selectedEmployee);
        $employee_id = trim($parts[1]);
        
        return Excel::download(new UserDtrExport($this->start_date, $this->end_date, $employee_id), $employee_id . ' Attendance.xlsx');
    }

    public function setFilter($filter){
        $this->filter = $filter;
        $this->chartFilter = $filter;
    }


    protected $rules = [
        'dateChosen' => 'required|max:3',
    ];

    
    public function submit(){
        $countArray = count($this->dateChosen);
        if($countArray > 12 or $countArray < 1){
            return redirect()->to(route('AttendanceTable'));
        }
        return redirect()->to(route('AttendancePdf', json_encode($this->dateChosen))); 
    }


    public function render()
    {
        $query = Dailytimerecord::with('employee:employee_id,first_name,middle_name,last_name,employee_type,inside_department,department,gender')
                                 ->select('attendance_date', 'employee_id', 'type', 'time_in', 'time_out', 'overtime', 'undertime', 'late');
    
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
    
        [$yearly, $monthly] = $this->setGraph();
        
        if ($this->filter == "Weekly") {
            $this->filter = "Weekly";
            $this->dispatch('refresh-weekly-chart', data: array_values($monthly));
        } else {
            $this->filter = "Monthly";
            $this->dispatch('refresh-monthly-chart', data: array_values($yearly));
        }
    
        if ($this->dayFilter == "all") {
            $this->dayFilterName = "*";
        } else {
            $dateToday = Carbon::now();
            $query->whereDay('attendance_date', $this->dayFilter ?? $dateToday->day);
            $this->dayFilterName = $this->dayFilter ?? $dateToday->day;
        }
    
        if ($this->monthFilter == null) {
            $query->whereMonth('attendance_date', $this->currentMonth);
            $this->monthFilterName = $this->currentMonthName;
        } else {
            $monthNames = [
                1 => "January",
                2 => "February",
                3 => "March",
                4 => "April",
                5 => "May",
                6 => "June",
                7 => "July",
                8 => "August",
                9 => "September",
                10 => "October",
                11 => "November",
                12 => "December"
            ];
            if (array_key_exists($this->monthFilter, $monthNames)) {
                $query->whereMonth('attendance_date', $this->monthFilter);
                $this->monthFilterName = $monthNames[$this->monthFilter];
            } else {
                $this->monthFilterName = "All";
            }
        }
    
        $query->whereYear('attendance_date', $this->yearFilter ?? $dateToday->year);
        $this->yearFilterName = $this->yearFilter ?? $dateToday->year;
    
        // Calculate counts for each type
        $results = $query->orderBy('created_at', 'desc')->paginate(5);
    
        // Aggregate counts
        $counts = Dailytimerecord::select(DB::raw('
            SUM(CASE WHEN type = "No Time In" AND time_in IS NULL THEN 1 ELSE 0 END) AS `Absent`,
            SUM(CASE WHEN type is NULL AND late = 1 THEN 1 ELSE 0 END) AS `Late`,
            SUM(CASE WHEN type = "Whole Day" THEN 1 ELSE 0 END) AS `Wholeday`,
            SUM(CASE WHEN type = "Overtime" THEN 1 ELSE 0 END) AS `Overtime`,
            SUM(CASE WHEN type = "Undertime" THEN 1 ELSE 0 END) AS `Undertime`,
            SUM(CASE WHEN type is NULL AND time_out IS NULL THEN 1 ELSE 0 END) AS `No Time Out`,
            SUM(CASE WHEN type LIKE "%Leave" THEN 1 ELSE 0 END) AS `Leave`
        '))
        ->whereYear('attendance_date', $this->yearFilter ?? Carbon::now()->year)
        ->whereMonth('attendance_date', $this->monthFilter ?? Carbon::now()->month)
        ->whereDay('attendance_date', $this->dayFilter ?? Carbon::now()->day)
        ->first();

        // Map the counts to the dtrTypes
        $this->dtrTypes = array_merge($this->dtrTypes, $counts->toArray());
    
        return view('livewire.hr-portal.hr-daily-time-record', [
            'DtrData' => $results,
            // 'Monthly' => $monthly,
            // 'Yearly' => $yearly,
        ])->layout('components.layouts.hr-navbar');
    }
    
    
}
