<?php

namespace App\Livewire\Dashboard;

use Carbon\Carbon;
use App\Models\Mytasks;
use Livewire\Component;
use App\Models\Employee;
use App\Models\Training;
use App\Models\Activities;
use App\Models\Leaverequest;
use Livewire\WithPagination;
use App\Models\Dailytimerecord;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class DashboardView extends Component
{

    use WithPagination;
    
    // public $activities;

    // public $trainings;
    // public $data;
    // public $dateData = [];
    // public $weeklyCountsArray = [];
    // public $monthlyCountsArray = [];
    // public $vacationCredits;
    // public $sickCredits;

    public $filter = "Weekly";

    public $period;

    public $firstName;

    public $gender;

    public $currentHourMinuteSecond;

    public $currentTimeIn;

    public $timeIn;

    public $timeOut;

    public $timeInFlag;

    public $timeOutFlag;
    public $employee_name;

    public $position;
    protected $listeners = ['timeIn' => 'checkIn', 'timeOut' => 'checkOut', 'checkLocation' => 'updateLocation', 'refresh' => '$refresh'];

    public $department;

    public $employeeImage;

    public $role_id;

    // public $leave_requests;

    // public $tasks;

    public $leaveIndicator = False;

    public $timeDifference;


    public function search()
    {
        $this->resetPage();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function mount(){

        // $this->role_id = auth()->user()->role_id;

        $employee_id = auth()->user()->employee_id;
        $time = Dailytimerecord::where('employee_id', $employee_id)->where('attendance_date', now()->toDateString())->first(); // assuming 'attendance_date' is stored as a date only

        $this->timeInFlag = false;
        $this->timeOutFlag = true;


        if($time && !in_array($time->type, ['Undertime', 'Overtime', 'WholeDay', 'Half-Day', 'No Time in']) ){
            $this->timeInFlag = True;
            if($time->time_out){
                $this->timeOutFlag = true;
            } 
        }
       

        $loggedInUser = auth()->user();
        $employeeInformation = Employee::where('employee_id', $loggedInUser->employee_id)
                                ->select('sick_credits', 'vacation_credits', 'first_name', 'middle_name', 'last_name', 'gender', 'current_position', 'department', 'emp_image')->first();
        $employeeInformation->middle_name = $employeeInformation->middle_name ?? " ";
        $this->employee_name = $employeeInformation->first_name . ' ' ;
        $this->position = $employeeInformation->current_position;
        $this->department = $employeeInformation->department;
        $this->employeeImage = $employeeInformation->emp_image;


        $leaveIndicator = Dailytimerecord::where('attendance_date', now()->toDateString())->select('attendance_date', 'type')->first();
        if($leaveIndicator){
            if(!in_array($leaveIndicator->type, ['Undertime', 'Overtime', 'WholeDay', 'Half-Day', 'No Time in'])){
                $this->leaveIndicator = $leaveIndicator->type;
            }
        }
        // dd($this->leave_requests);



        
        
        
        // $collegeName = DB::table('colleges')->where('college_id', $employeeInformation->college_id)->value('college_name');
        // $collegeIds = $employeeInformation->college_id;
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
        // $this->currentHourMinuteSecond = Carbon::now();
        $currentTime = Carbon::now();
        // Set the start and end times for each period
        $morningStart = Carbon::createFromTime(6, 0, 0); // 6:00 AM
        $afternoonStart = Carbon::createFromTime(12, 0, 0); // 12:00 PM (noon)
        $eveningStart = Carbon::createFromTime(18, 0, 0); // 6:00 PM

        // Compare the current time with the defined periods
        if ($currentTime->between($morningStart, $afternoonStart)) {
            // Current time is in the morning
            $this->period = 'Morning';
        } elseif ($currentTime->between($afternoonStart, $eveningStart)) {
            // Current time is in the afternoon
            $this->period = 'Afternoon';
        } else {
            // Current time is in the evening
            $this->period = 'Evening';
        }
        
    //     // dd($this->period);
    //     $currentYear = Carbon::now()->year;
    //     $currentMonth = Carbon::now()->month;
    //     $currentDay = Carbon::now()->day;
    //     // dd($currentDay);

    // // Query to get the attendance count for each month in the current year
    // $monthlyCounts = Dailytimerecord::select(
    //         DB::raw('MONTH(attendance_date) as month'),
    //         DB::raw('COUNT(*) as count')
    //     )
    //     ->where('employee_id', $loggedInUser)
    //     // ->where('attendance_type', 'time-in')
    //     ->whereYear('attendance_date', $currentYear)
    //     ->groupBy(DB::raw('MONTH(attendance_date)'))
    //     ->get();

    // // Query to get the attendance count for each week in the current month
    // // $weeklyCounts = Dailytimerecord::select(
    // //         DB::raw('WEEK(attendance_date) as week'),
    // //         DB::raw('COUNT(*) as count')
    // //     )
    // //     ->where('employee_id', $loggedInUser)
    // //     ->where('attendance_type', 'time-in')
    // //     ->whereYear('attendance_date', $currentYear)
    // //     ->whereMonth('attendance_date', $currentMonth)
    // //     ->groupBy(DB::raw('WEEK(attendance_date)'))
    // //     ->get();
    // // dd($weeklyCounts[0], $monthlyCounts[0]);

    // $weeklyCounts = Dailytimerecord::select(
    //     DB::raw('WEEK(attendance_date, 0) as week'), // Start the week on Sunday (0)
    //     DB::raw('COUNT(*) as count')
    // )
    // ->where('employee_id', $loggedInUser)
    // // ->where('attendance_type', 'time-in')
    // ->whereYear('attendance_date', $currentYear)
    // ->whereMonth('attendance_date', $currentMonth)
    // ->groupBy(DB::raw('WEEK(attendance_date, 0)'))
    // ->get();

    // // Initialize arrays to hold the counts for each month and week
    // $monthlyCountsArray = [];
    // $weeklyCountsArray = [];

    // // dd($weeklyCounts);

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
    

    // // for ($i = 1; $i <= 5; $i++) {
    // //     $found = false;
    // //     foreach ($weeklyCounts as $count) {
    // //         if ($count->month == $i) {
    // //             $this->weeklyCountsArray[$i] = $count->count;
    // //             $found = true;
    // //             break;
    // //         }
    // //     }
    // //     if (!$found) {
    // //         $this->weeklyCountsArray[$i] = 0;
    // //     }
    // // }


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
    // // dd($this->weeklyCountsArray);

    // $this->data = array_values($this->weeklyCountsArray);
    
    
    }

    public function getImage(){
        $image = Storage::disk('local')->get($this->employeeImage);
        return $image;
    }

    public $location;
    public $accuracy;


    public function updateLocation($address, $action, $accuracy)
    {
        // $address = $data['address'];
        // $actionType = $data['action'];
        $this->location = $address;
        
        $this->accuracy = $accuracy;
        if ($action === 'Check In') {
            $this->checkIn();
        } elseif ($action === 'Check Out') {
            $this->checkOut(); // Assuming you have a checkOut method
        }
    }


    public function checkIn()
    {
        // $this->dispatch('triggerLocation');
        try {
            $employee_id = auth()->user()->employee_id;
            // $time = Dailytimerecord::where('attendance_date', now()->toDateString())->where('employee_id', $employee_id)->first(); // assuming 'attendance_date' is stored as a date only
            // $time = Dailytimerecord::where('emwhere('attendance_date', now()->toDateString())->first(); // assuming 'attendance_date' is stored as a date only
            $startOfCheckInTime = Carbon::today()->setTime(6, 00, 0); // 4:31 PM
            $currentTime = Carbon::now();
    
        if ($currentTime->greaterThanOrEqualTo($startOfCheckInTime)) {
            $time = Dailytimerecord::where('attendance_date', now()->toDateString())->where('employee_id', $employee_id)->first(); // assuming 'attendance_date' is stored as a date only
            if (!$time) {
                $dtr = new Dailytimerecord();
                $dtr->employee_id = auth()->user()->employee_id;
                $dtr->attendance_date = Carbon::today()->toDateString();
                $dtr->time_in = Carbon::now()->toDateTimeString();
                $lateCheckerParse = Carbon::parse($dtr->time_in);
                $endOfCheckInTime = Carbon::today()->setTime(10, 01, 0);
                $dtr->time_in_location = $this->location . '(' . $this->accuracy . 'm)'; 
                if($lateCheckerParse->greaterThanOrEqualTo($endOfCheckInTime)) $dtr->late = 1;
                // $dtr->time_in = "2024-06-21 6:52:59"; // Remove or comment out this line if using the current time
                $dtr->save();
                $this->dispatch('trigger-success-checkin');
                $this->timeInFlag = true;
                $this->timeOutFlag = false;
                $this->dispatch('refreshPage');

            } else if( in_array($time->type, ['Undertime', 'Overtime', 'WholeDay', 'Half-Day', 'No Time in'])){
                $time->time_in = Carbon::now()->toDateTimeString();
                $lateCheckerParse = Carbon::parse($time->time_in);
                $endOfCheckInTime = Carbon::today()->setTime(10, 01, 0);
                $time->time_in_location = $this->location . '(' . $this->accuracy . 'm)'; 
                if($lateCheckerParse->greaterThanOrEqualTo($endOfCheckInTime)) $time->late = 1;
                $time->save();
                $this->dispatch('trigger-success-checkin');
                $this->timeInFlag = true;
                $this->timeOutFlag = false;
                $this->dispatch('refreshPage');
            } else {
                // $this->js("alert('You have already checked in today! Try Again Tomorrow')");
            }
        } else {
            // $this->js("alert('You can only check in at or after 4:40 PM')");
            throw new \Exception('Error');
        }

        } catch (\Exception $e) {
            // Log the exception for further investigation
            Log::channel('time-in-and-out')->error('Failed to time In: ' . $e->getMessage());
            $this->dispatch('end-loading');

            // Dispatch a failure event with an error message
            $this->dispatch('triggerError');
            // return redirect()->back()->withErrors('Something went wrong. Please contact IT support.');
        }
        $this->dispatch('end-loading');

    }


    public function checkOut()
    {
        try {
            $loggedInUser = auth()->user()->employee_id;

            $current_time = Carbon::today();
            $six_am_today = Carbon::today()->setHour(6);
            // $time = Dailytimerecord::whereDate('attendance_date', $current_time)->orderBy('attendance_date', 'desc')->where('employee_id', $loggedInUser)->first(); 
            if (now()->greaterThan($six_am_today)) {
                $time = Dailytimerecord::whereDate('attendance_date', $current_time)->orderBy('attendance_date', 'desc')->where('employee_id', $loggedInUser)->first(); // assuming 'attendance_date' is stored as a date only
            } else {
                $time = Dailytimerecord::where('employee_id', $loggedInUser)->orderBy('attendance_date', 'desc')->first(); // assuming 'attendance_date' is stored as a date only
            }

            
            if($time->type == null){
                if($time->time_out == null){
                        $loggedInUser = auth()->user()->employee_id;
                        $dtr = $time;
                        $dtr->employee_id = $loggedInUser;
                        $dtr->attendance_date = Carbon::today()->toDateString();
                        $dtr->time_out = Carbon::now()->toDateTimeString();
                        $dtr->time_out_location = $this->location . '(' . $this->accuracy . 'm)';
                        $timeIn = Carbon::parse($dtr->time_in);
                        $timeOut = Carbon::parse($dtr->time_out);
                        $differenceInSeconds = $timeIn->diffInSeconds($timeOut);
                        $differenceInMinutes = $timeIn->diffInMinutes($timeOut);

                        $hours = floor($differenceInSeconds / 3600);
                        $minutes = floor(($differenceInSeconds % 3600) / 60);
                        $seconds = $differenceInSeconds % 60;

                        $standardWorkMinutes =  540;
                        $onePM = Carbon::today()->setHour(13)->setMinute(0)->setSecond(0);

                        if($timeIn->greaterThan($onePM)){
                            if ($hours >= 10) {
                                $dtr->type = 'Overtime';
                                $overtime =  $differenceInMinutes - $standardWorkMinutes ;
                                $dtr->overtime = $overtime / 60;
                                $dtr->undertime = 0;
                            } elseif ($hours >= 9) {
                                $dtr->type = 'Wholeday';
                                $overtime =  $differenceInMinutes - $standardWorkMinutes ;
                                $dtr->overtime = $overtime / 60;
                                $dtr->undertime = 0;
                            } elseif ($hours >= 5) {
                                $dtr->type = 'Half-Day';
                                $undertime =  $differenceInMinutes - $standardWorkMinutes ;
                                $dtr->undertime = $undertime / 60;
                                $dtr->overtime = 0;
                            } elseif ($hours <= 5) {
                                $dtr->type = 'Undertime';
                                $undertime =  $differenceInMinutes - $standardWorkMinutes ;
                                $dtr->undertime = $undertime / 60;
                                $dtr->overtime = 0;
                                // dd($dtr->undertime, $dtr->overtime);
                            } else {
                                $dtr->type = 'Undefined';
                            }
                        } else {
                            if ($hours >= 10) {
                                $dtr->type = 'Overtime';
                                $overtime =  $differenceInMinutes - $standardWorkMinutes ;
                                $dtr->overtime = ($overtime - 60) / 60 ;
                                $dtr->undertime = 0;
                            } elseif ($hours >= 9) {
                                $dtr->type = 'Wholeday';
                                $overtime =  $differenceInMinutes - $standardWorkMinutes ;
                                $dtr->overtime = ($overtime - 60) / 60 ;
                                $dtr->undertime = 0;
                            } elseif ($hours >= 5) {
                                $dtr->type = 'Half-Day';
                                $undertime =  $differenceInMinutes - $standardWorkMinutes ;
                                $dtr->undertime = ($undertime- 60) / 60 ;
                                $dtr->overtime = 0;
                            } elseif ($hours <= 5) {
                                $dtr->type = 'Undertime';
                                $undertime =  $differenceInMinutes - $standardWorkMinutes ;
                                $dtr->undertime = ($undertime- 60) / 60;
                                $dtr->overtime = 0;
                                // dd($dtr->undertime, $dtr->overtime);
                            } else {
                                $dtr->type = 'Undefined';
                            }
                        }
                        $dtr->update();
                        // $this->js("alert('You have already checked out!");
                        $this->dispatch('triggerSuccess');
                } else {
                    throw new \Exception('Already Checked out Today!');
                }
            }
            else if (in_array($time->type, ['Undertime', 'Overtime', 'WholeDay', 'Half-Day', 'No Time in'])){
                if($time->time_out == null){
                    $dtr = $time;
                    $dtr->attendance_date = Carbon::today()->toDateString();
                    $dtr->time_out = Carbon::now()->toDateTimeString();
                    $dtr->time_out_location = $this->location . '(' . $this->accuracy . 'm)';
                    $timeIn = Carbon::parse($dtr->time_in);
                    $timeOut = Carbon::parse($dtr->time_out);
                    $differenceInSeconds = $timeIn->diffInSeconds($timeOut);
                    $differenceInMinutes = $timeIn->diffInMinutes($timeOut);

                    $hours = floor($differenceInSeconds / 3600);
                    $minutes = floor(($differenceInSeconds % 3600) / 60);
                    $seconds = $differenceInSeconds % 60;

                    $standardWorkMinutes =  540;
                    $onePM = Carbon::today()->setHour(13)->setMinute(0)->setSecond(0);

                    if($timeIn->greaterThan($onePM)){
                        if ($hours >= 10) {
                            $overtime =  $differenceInMinutes - $standardWorkMinutes ;
                            $dtr->overtime = $overtime / 60;
                            $dtr->undertime = 0;
                        } elseif ($hours >= 9) {
                            $overtime =  $differenceInMinutes - $standardWorkMinutes ;
                            $dtr->overtime = $overtime / 60;
                            $dtr->undertime = 0;
                        } elseif ($hours >= 5) {
                            $undertime =  $differenceInMinutes - $standardWorkMinutes ;
                            $dtr->undertime = $undertime / 60;
                            $dtr->overtime = 0;
                        } elseif ($hours <= 5) {
                            $undertime =  $differenceInMinutes - $standardWorkMinutes ;
                            $dtr->undertime = $undertime / 60;
                            $dtr->overtime = 0;
                            // dd($dtr->undertime, $dtr->overtime);
                        } 
                    } else {
                        if ($hours >= 10) {
                            $overtime =  $differenceInMinutes - $standardWorkMinutes ;
                            $dtr->overtime = ($overtime - 60) / 60 ;
                            $dtr->undertime = 0;
                        } elseif ($hours >= 9) {
                            $overtime =  $differenceInMinutes - $standardWorkMinutes ;
                            $dtr->overtime = ($overtime - 60) / 60 ;
                            $dtr->undertime = 0;
                        } elseif ($hours >= 5) {
                            $undertime =  $differenceInMinutes - $standardWorkMinutes ;
                            $dtr->undertime = ($undertime- 60) / 60 ;
                            $dtr->overtime = 0;
                        } elseif ($hours <= 5) {
                            $undertime =  $differenceInMinutes - $standardWorkMinutes ;
                            $dtr->undertime = ($undertime- 60) / 60;
                            $dtr->overtime = 0;
                            // dd($dtr->undertime, $dtr->overtime);
                        } 
                    }
                    $dtr->update();
                    // $this->js("alert('You have already checked out!");
                    $this->dispatch('triggerSuccess');
                } else {
                    throw new \Exception('Already Checked out Today!');
                }
            }
            
        } catch (\Exception $e) {
            // Log the exception for further investigation
            Log::channel('time-in-and-out')->error('Failed to time out: ' . $e->getMessage());
            $this->dispatch('stopLoading');


            // Dispatch a failure event with an error message
            $this->dispatch('triggerError');

            // return redirect()->back()->withErrors('Something went wrong. Please contact IT support.');
        }
        $this->dispatch('stopLoading');

    }
    public function leaveRequest(){
        $dtr = new Dailytimerecord();

        $dtr->employee_id = auth()->user()->employee_id;
        $dtr->attendance_date = Carbon::today()->toDateString();
        $dtr->time_in = Carbon::now()->toTimeString();

        $dtr->save();

        // Dispatch a browser event to reload the page

        $this->js("alert('You have checked in!')");
        return redirect()->to(route('LeaveRequestTable'));
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

    public function render()
    {
        $loggedInUser = auth()->user()->employee_id;

        $time = Dailytimerecord::where('employee_id', $loggedInUser)->where('attendance_date', now()->toDateString())->select('type','employee_id','time_in', 'time_out')->first();
        if ($time && (in_array($time->type, ['Undertime', 'Overtime', 'WholeDay', 'Half-Day', 'No Time in', Null]) && $time->time_in != Null)) {
            // Calculate the difference based on whether time_out is null or not
            if (is_null($time->time_out)) {
                $this->timeIn = Carbon::parse($time->time_in);
                $differenceInSeconds = now()->diffInSeconds(Carbon::parse($time->time_in));
                $this->timeOutFlag = false; // Time Out button should be enabled
            } else {
                $this->timeIn = Carbon::parse($time->time_in);
                $this->timeOut = Carbon::parse($time->time_out);
                $differenceInSeconds = Carbon::parse($time->time_in)->diffInSeconds(Carbon::parse($time->time_out));
                // Convert the difference to hours, minutes, and seconds
                $differenceInHours = floor($differenceInSeconds / 3600);
                $differenceInMinutes = floor(($differenceInSeconds % 3600) / 60);
                $differenceInSeconds = $differenceInSeconds % 60;

                $this->timeOutFlag = true; // Time Out button should be disabled
                // You can now use these variables as needed
                $this->timeDifference = sprintf('%02d:%02d:%02d', $differenceInHours, $differenceInMinutes, $differenceInSeconds);
            }
    
            // Format seconds into hh:mm:ss
            $hours = floor($differenceInSeconds / 3600);
            $minutes = floor(($differenceInSeconds % 3600) / 60);
            $seconds = $differenceInSeconds % 60;
            $this->currentTimeIn = sprintf('%02d:%02d:%02d', $hours, $minutes, $seconds);
        } else {
            // If there's no record for today, reset values and ensure Time Out button is disabled
            $this->timeIn = null;
            $this->timeOut = null;
            $this->currentTimeIn = '00:00:00';
            $this->timeOutFlag = true;
        }

        
        $leave_requests = Leaverequest::where('employee_id', $loggedInUser)
                ->orderBy('inclusive_start_date', 'asc')
                ->take(5)
                ->select('inclusive_start_date', 'inclusive_end_date', 'uuid')
                ->get(); // Ensure to call get() to execute the query and get the results

        $tasks = Mytasks::whereJsonContains('target_employees', $loggedInUser)
                ->orderBy('application_date', 'asc')
                ->take(5)
                ->select('task_title', 'uuid')
                ->get(); // Ensure to call get() to execute the query and get the results

        $activities = Activities::whereNull('deleted_at')->get(); // Ensure to call get() to execute the query and get the results

        return view('livewire.dashboard.dashboard-view', [
            'leave_requests' => $leave_requests,
            'tasks' => $tasks,
            'activities' => $activities,
        ]);
      
    }
}
