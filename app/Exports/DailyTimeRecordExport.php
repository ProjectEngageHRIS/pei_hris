<?php

namespace App\Exports;

use Carbon\Carbon;
use App\Models\Employee;
use App\Models\Dailytimerecord;
use Illuminate\Support\Collection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;

class DailyTimeRecordExport implements FromView
{
    protected $start_date;
    protected $end_date;

    public function __construct($start_date, $end_date) {
            $this->start_date = $start_date;
            $this->end_date = $end_date;

    }
    
    public function view(): View
    {
        // $start_date = Carbon::parse($this->start_date);
        // $end_date = Carbon::parse($this->end_date);

        $start_date = Carbon::parse('March 22, 2024');
        $end_date = Carbon::parse('September 17, 2024');
        
        // $dtrs = Dailytimerecord::with('employee:employee_id,first_name,last_name')->whereBetween('attendance_date', [$this->start_date, $this->end_date])->get();
        $dtrs = Dailytimerecord::whereBetween('attendance_date', [$start_date, $end_date])->get();
        $employees = Employee::all();
        $dtrsGroupedByEmployee = $dtrs->groupBy('employee_id');

        // Initialize an array to hold the final results
        $results = [];
        
        // Loop through each employee
        foreach ($employees as $employee) {
            // Initialize an array to hold DTRs for each date in the range
            $employeeDtrs = [];
            $currentDate = $start_date->copy();
            
            while ($currentDate->lessThanOrEqualTo($end_date)) {
                // Check if the employee has any DTRs
                $employeeDtrGroup = $dtrsGroupedByEmployee->get($employee->employee_id);
                
                // Check if there is a DTR for the current date
                $dtr = $employeeDtrGroup ? $employeeDtrGroup->firstWhere('attendance_date', $currentDate->toDateString()) : null;
                
                // Add the DTR to the array, or null if not found
                $employeeDtrs[$currentDate->toDateString()] = $dtr ?: null;
                
                // Move to the next date
                $currentDate->addDay();
            }
        
            // Add the employee and their DTRs to the results
            $results[] = [
                'employee' => $employee,
                'dtrs' => $employeeDtrs,
            ];
        }
        
        // Output the results (for debugging purposes)
        // dd($results[1]['dtrs']);
        // dd($results[1]['dtrs']['2024-03-22']->time_in);
          // dd($results[1]['dtrs']['2024-03-22']->time_in);


        // Initialize an empty array to store the results
        $months = [];

        // Calculate for the start month
        $startMonth = $start_date->format('F Y');
        $startDays = $start_date->copy()->endOfMonth()->diffInDays($start_date) + 1;
        $startMonthStartDay = $start_date->day; // Get the day of the month

        $months[] = [
            'month_name' => $startMonth,
            'days_in_month' => $startDays,
            'starting_day' => $startMonthStartDay ,

        ];

        // Calculate for the full months in between
        $currentDate = $start_date->copy()->addMonth()->startOfMonth();
        while ($currentDate->lessThanOrEqualTo($end_date->copy()->subMonth()->endOfMonth())) {
            $fullMonth = $currentDate->format('F Y');
            $daysInMonth = $currentDate->copy()->endOfMonth()->diffInDays($currentDate) + 1;
            $currentMonthStartDay = $currentDate->day; // Get the day of the month
            $months[] = [
                'month_name' => $fullMonth,
                'days_in_month' => $daysInMonth,
                'starting_day' => $currentMonthStartDay,

            ];
            $currentDate->addMonthNoOverflow(); // Move to the next month without overflow
        }

        // Calculate for the end month
        $endMonth = $end_date->format('F Y');
        $endDays = $end_date->diffInDays($end_date->copy()->startOfMonth()) + 1;
        $endMonthStartDay = $end_date->copy()->startOfMonth()->day;

        $months[] = [
            'month_name' => $endMonth,
            'days_in_month' => $endDays,
            'starting_day' => $endMonthStartDay,

        ];

        return view('exports.timekeeping', [
            'dtrs' => $results,
            'employees' => $employees,
            'months' => $months,
        ]);
    }
}
