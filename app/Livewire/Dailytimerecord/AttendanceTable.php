<?php

namespace App\Livewire\Dailytimerecord;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\Employee;
use App\Models\Training;
use App\Models\Activities;
use Livewire\WithPagination;
use App\Exports\UserDtrExport;
use App\Models\Dailytimerecord;
use Illuminate\Support\Facades\DB;
use Livewire\WithoutUrlPagination;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\DailyTimeRecordExport;

class AttendanceTable extends Component
{
    use WithPagination;
    public $options = [];
    public $dateChosen = [];

    public $chartFilter;

    public $currentYear;

    public $currentMonth;

    public $currentMonthName;
    public $search = "";
    public $dayFilter;

    public $dayFilterName;
    public $monthFilter;
    
    public $monthFilterName;
    public $yearFilter;

    public $yearFilterName;


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

    public $currentDate;


    protected $queryString = [
        'category',
        'sort',
    ];
    

    public function search()
    {
        $this->resetPage();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function mount(){
        $now = Carbon::now();
        $currentYear = $now->year;
        $currentMonth = $now->month;
        $currentDay = $now->day;
        $currentMonthName = $now->format('F');
        $this->dayFilter = "all";
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

        $this->setGraph();
        $this->chartFilter = "Weekly";

        // $employeeInformation = Employee::where('employee_id', $loggedInUser)
        //                         ->select( 'sick_credits', 'vacation_credits', 'first_name', 'gender')->first();
        // $this->firstName = $employeeInformation->first_name;
        // $this->vacationCredits = $employeeInformation->vacation_credits;
        // $this->sickCredits = $employeeInformation->sick_credits;
        // $this->gender = $employeeInformation->gender;
        // $this->activities = Activities::where(function ($query) use ($collegeIds) {
        //         foreach ($collegeIds  as $college) {
        //         $college_name = DB::table('colleges')->where('college_id', $college)->value('college_name');
        //             $query->orWhereJsonContains('visible_to_list', $college_name);
        //         }
        //     })->get();
        // $this->trainings = Training::where(function ($query) use ($collegeIds) {
        //     foreach ($collegeIds  as $college) {
        //     $college_name = DB::table('colleges')->where('college_id', $college)->value('college_name');
        //         $query->orWhereJsonContains('visible_to_list', $college_name);
        //     }
        // })->get();

        // $attendanceCount = Dailytimerecord::where('employee_id', $loggedInUser)->count();
        // $currentTime = Carbon::now();
        // // Set the start and end times for each period
        // $morningStart = Carbon::createFromTime(6, 0, 0); // 6:00 AM
        // $afternoonStart = Carbon::createFromTime(12, 0, 0); // 12:00 PM (noon)
        // $eveningStart = Carbon::createFromTime(18, 0, 0); // 6:00 PM

        // // Compare the current time with the defined periods
        // if ($currentTime->between($morningStart, $afternoonStart)) {
        //     // Current time is in the morning
        //     $this->period = 'Morning';
        // } elseif ($currentTime->between($afternoonStart, $eveningStart)) {
        //     // Current time is in the afternoon
        //     $this->period = 'Afternoon';
        // } else {
        //     // Current time is in the evening
        //     $this->period = 'Evening';
        // }
        // $currentYear = Carbon::now()->year;
        // $currentMonth = Carbon::now()->month;
        // $currentDay = Carbon::now()->day;

        // // Query to get the attendance count for each month in the current year
        // $monthlyCounts = Dailytimerecord::select(
        //         DB::raw('MONTH(attendance_date) as month'),
        //         DB::raw('COUNT(*) as count')
        //     )
        //     ->where('employee_id', $loggedInUser)
        //     ->whereYear('attendance_date', $currentYear)
        //     ->groupBy(DB::raw('MONTH(attendance_date)'))
        //     ->get();


        // $weeklyCounts = Dailytimerecord::select(
        //     DB::raw('WEEK(attendance_date, 0) as week'), // Start the week on Sunday (0)
        //     DB::raw('COUNT(*) as count')
        // )
        // ->where('employee_id', $loggedInUser)
        // ->whereYear('attendance_date', $currentYear)
        // ->whereMonth('attendance_date', $currentMonth)
        // ->groupBy(DB::raw('WEEK(attendance_date, 0)'))
        // ->get();

        // // Initialize arrays to hold the counts for each month and week
        // $monthlyCountsArray = [];
        // $weeklyCountsArray = [];

        // // Process monthly counts
        // for ($i = 1; $i <= 12; $i++) {
        //     $found = false;
        //     foreach ($monthlyCounts as $count) {
        //         if ($count->month == $i) {
        //             $this->monthlyCountsArray[$i] = $count->count;
        //             $found = true;
        //             break;
        //         }
        //     }
        //     if (!$found) {
        //         $this->monthlyCountsArray[$i] = 0;
        //     }
        // }

        // foreach ($weeklyCounts as $count) {
        //     if($count->count != 0){
        //         $this->weeklyCountsArray[] = $count->count;
        //     }else {
        //         $this->weeklyCountsArray[] = 0;
        //     }
        // }
        // while (count($this->weeklyCountsArray) < 5) {
        //     $this->weeklyCountsArray[] = 0;
        // }

        // $this->setFilter("weekly");

        // $this->data = array_values($this->weeklyCountsArray);
    
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

    public function generateRecord(){

        $this->dispatch('triggerClose');
        $loggedInUser = auth()->user()->employee_id;

        return Excel::download(new UserDtrExport($this->start_date, $this->end_date, $loggedInUser), $loggedInUser . ' Attendance.xlsx');

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

        $loggedInUser = auth()->user();
        $query = Dailytimerecord::where('employee_id', $loggedInUser->employee_id)
                                ->select('attendance_date',
                                         'type',
                                         'time_in',
                                         'time_out',
                                         'overtime',
                                         'undertime',
                                         'late',
                                         'time_in_location',
                                         'time_out_location',
                                         );

        
        [$yearly, $monthly] = $this->setGraph();
        // dd($monthly, $yearly);
        if($this->filter == "Weekly"){
            $this->filter = "Weekly";
            $this->dispatch('refresh-weekly-chart', data: array_values($monthly));
        }
        else{
            $this->filter = "Monthly";
            $this->dispatch('refresh-monthly-chart', data: array_values($yearly));
        }


        if($this->dayFilter == "all" ){
            $this->dayFilterName = "*";
        } else {
            $dateToday = Carbon::now();
            $query->whereDay('attendance_date', $this->dayFilter ?? $dateToday->day);
            $this->dayFilterName = $this->dayFilter ?? $dateToday->day;
        }



        if($this->monthFilter == null){
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

        if (strlen($this->search) >= 1) {
            // Remove commas from the search input
            $searchTerms = preg_replace('/,/', '', $this->search);
        
            // Handle different formats for full date matching
            $parsedFullDate = null;
            $parsedYMDDate = null;
        
            // Try to parse "October 1 2024" or "October 01 2024" format
            if (\DateTime::createFromFormat('F j Y', $searchTerms) !== false) {
                $parsedFullDate = Carbon::createFromFormat('F j Y', $searchTerms);
            } elseif (\DateTime::createFromFormat('F d Y', $searchTerms) !== false) {
                $parsedFullDate = Carbon::createFromFormat('F d Y', $searchTerms);
            }
        
            // Try to parse "2024-10-11" format
            if (\DateTime::createFromFormat('Y-m-d', $searchTerms) !== false) {
                $parsedYMDDate = Carbon::createFromFormat('Y-m-d', $searchTerms);
            }
        
            $results = $query->where(function ($q) use ($parsedFullDate, $parsedYMDDate, $searchTerms) {
                if ($parsedFullDate) {
                    // If the search is an exact full date (e.g., "October 1 2024" or "October 01 2024")
                    $q->whereDate('attendance_date', '=', $parsedFullDate->format('Y-m-d'));
                } elseif ($parsedYMDDate) {
                    // If the search is in the Y-m-d format (e.g., "2024-10-11")
                    $q->whereDate('attendance_date', '=', $parsedYMDDate->format('Y-m-d'));
                } else {
                    // Fallback to more general searches (e.g., month or day)
                    $q->orWhereRaw("DATE_FORMAT(attendance_date, '%M') = ?", [$searchTerms]) // Exact match for October
                      ->orWhereRaw("DATE_FORMAT(attendance_date, '%M %c') = ?", [$searchTerms]) // Match for October 1 (ignoring leading zero)
                      ->orWhereRaw("DATE_FORMAT(attendance_date, '%M %e') = ?", [$searchTerms]) // Match for October 1 without leading zero
                      ->orWhere('type', 'like', '%' . $searchTerms . '%'); // For searching by 'type'
                }
            })->orderBy('attendance_date', 'desc')->paginate(5);
        } else {
            $results = $query->orderBy('attendance_date', 'desc')->paginate(5);
        }
        

        
        

    
    
        return view('livewire.dailytimerecord.attendance-table', [
            'DtrData' => $results,
            'Monthly' => $monthly,
            'Yearly' => $yearly,
            // 'data' => $this->filter($this->filter),
        ]);

      
    }


}
