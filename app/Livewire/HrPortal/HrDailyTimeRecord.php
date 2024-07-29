<?php

namespace App\Livewire\HrPortal;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\Employee;
use App\Models\Training;
use App\Models\Activities;
use Livewire\WithPagination;
use App\Models\Dailytimerecord;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\DailyTimeRecordExport;

class HrDailyTimeRecord extends Component
{
    use WithPagination;

    public $options = [];
    public $dateChosen = [];

    public $currentYear;

    public $currentMonth;

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

    // Filters 
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

        $currentYear = Carbon::now()->year;
        $currentMonth = Carbon::now()->month;
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

        $loggedInUser = auth()->user()->employee_id;

        // Query to get the attendance count for each month in the current year
        $monthlyCounts = Dailytimerecord::select(
                DB::raw('MONTH(attendance_date) as month'),
                DB::raw('COUNT(*) as count')
            )
            // ->where('attendance_type', 'time-in')
            ->whereYear('attendance_date', $currentYear)
            ->groupBy(DB::raw('MONTH(attendance_date)'))
            ->get();


        $weeklyCounts = Dailytimerecord::select(
            DB::raw('WEEK(attendance_date, 0) as week'), // Start the week on Sunday (0)
            DB::raw('COUNT(*) as count')
        )
        // ->where('attendance_type', 'time-in')
        ->whereYear('attendance_date', $currentYear)
        ->whereMonth('attendance_date', $currentMonth)
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
                    $this->monthlyCountsArray[$i] = $count->count;
                    $found = true;
                    break;
                }
            }
            if (!$found) {
                $this->monthlyCountsArray[$i] = 0;
            }
        }

        foreach ($weeklyCounts as $count) {
            if($count->count != 0){
                $this->weeklyCountsArray[] = $count->count;
            }else {
                $this->weeklyCountsArray[] = 0;
            }
        }
        while (count($this->weeklyCountsArray) < 5) {
            $this->weeklyCountsArray[] = 0;
        }

        $this->setFilter("weekly");

        // $this->data = array_values($this->weeklyCountsArray);
    
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

        return Excel::download(new DailyTimeRecordExport($this->start_date, $this->end_date), 'timekeeping.xlsx');

    }

    public function filter($filter){
        if($filter == 'weekly'){
            return [332, 321, 54, 32, 32];
            
        }
        else if ($filter == 'monthly'){
            // $this->dateData = $this->monthlyCountsArray;
            return [332, 321, 54, 32, 32];

        }
        $this->dispatch('$refresh');

    }

    public function setFilter($filter){
        if($filter == "weekly"){
            $this->filter = "Weekly";
                $this->dispatch('refresh-weekly-chart', data: array_values($this->weeklyCountsArray));
        }
        else{
            $this->filter = "Monthly";
            // dd($this->monthlyCountsArray );
            $this->dispatch('refresh-monthly-chart', data: array_values($this->monthlyCountsArray));
        }
        
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
        $loggedInUser = auth()->user(); 

        $query = Dailytimerecord::with('employee:employee_id,first_name,middle_name,last_name,employee_type,inside_department,department,gender')
                                         ->select('attendance_date',
                                         'employee_id',
                                         'type',
                                         'time_in',
                                         'time_out',
                                         'overtime',
                                         'undertime',
                                         'late',
                                         );

        $employeeTypes = array_filter(array_keys($this->employeeTypesFilter), function($key) {
            return $this->employeeTypesFilter[$key];
        });
        
        if (!empty($employeeTypes)) {
            $query->whereHas('employee', function ($query) use ($employeeTypes) {
                $query->whereIn('employee_type', $employeeTypes);
            });
        }

        // // Inside Department Filter
        $insideDepartmentTypes = array_filter(array_keys($this->insideDepartmentTypesFilter), function($key) {
            return $this->insideDepartmentTypesFilter[$key];
        });
        
        if (!empty($insideDepartmentTypes)) {
            $query->whereHas('employee', function ($query) use ($insideDepartmentTypes) {
                $query->whereIn('inside_department', $insideDepartmentTypes);
            });
        }
        // // dump($insideDepartmentTypes);

        // // Department Filter
        $departmentTypes = array_filter(array_keys($this->departmentTypesFilter), function($key) {
            return $this->departmentTypesFilter[$key];
        });
        
        if (!empty($departmentTypes)) {
            $query->whereHas('employee', function ($query) use ($departmentTypes) {
                $query->whereIn('department', $departmentTypes);
            });
        }

        // // Department Filter
        $genderTypes = array_filter(array_keys($this->genderTypesFilter), function($key) {
            return $this->genderTypesFilter[$key];
        });
        
        if (!empty($genderTypes)) {
            $query->whereHas('employee', function ($query) use ($genderTypes) {
                $query->whereIn('gender', $genderTypes);
            });

        }
      
        if($this->selectedDate != null){
            $query->whereDate('attendance_date',  $this->selectedDate);
        } 

        if(strlen($this->search) >= 1){
            $searchTerms = explode(' ', $this->search);
            $results = $query->whereHas('employee', function ($query) use ($searchTerms) {
                 $query->where(function ($q) use ($searchTerms) {
                    foreach ($searchTerms as $term) {
                        $q->orWhere('first_name', 'like', '%' . $term . '%')
                        ->orWhere('middle_name', 'like', '%' . $term . '%')
                        ->orWhere('last_name', 'like', '%' . $term . '%')
                        ->orWhere('department', 'like', '%' . $term . '%')
                        ->orWhere('current_position', 'like', '%' . $term . '%')
                        ->orWhere('employee_type', 'like', '%' . $term . '%')
                        ->orWhere('start_of_employment', 'like', '%' . $term . '%');
                    }
                });
            })->orderBy('created_at', 'desc')->paginate(5);

        } else {
            $results = $query->orderBy('created_at', 'desc')->paginate(5);

        }



        return view('livewire.hr-portal.hr-daily-time-record', [
            'DtrData' => $results,
            'data' => $this->filter($this->filter),
        ])->layout('components.layouts.hr-navbar');

      
    }

}
