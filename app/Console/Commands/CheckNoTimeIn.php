<?php

namespace App\Console\Commands;

use App\Models\Dailytimerecord;
use Carbon\Carbon;
use App\Models\Employee;
use Illuminate\Console\Command;

class CheckNoTimeIn extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check:no-time-in';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check for employees with no time-in after 10 am and create a record in dtr';

    public function __construct()
    {
        parent::__construct();
    }
    
    /**
     * Execute the console command.
     */
    
    public function handle()
    {
                // Get the current date
        $today = Carbon::today();

        // Get all employees
        $employees = Employee::all();

        foreach ($employees as $employee) {
            // Check if the employee has a time-in record after 10 am
            $timeInRecord = Dailytimerecord::where('employee_id', $employee->id)
                                ->whereDate('attendance_date', $today)
                                ->whereTime('time_in', '>', '6:00:00')
                                ->first();

            // If no time-in record is found, create a new record in dtr
            if (!$timeInRecord) {
                Dailytimerecord::create([
                    'employee_id' => $employee->employee_id,
                    'type' => 'No Time in',
                    'attendance_date' => $today,
                ]);
            }
        }

        $this->info('Checked for no time-in records and updated the dtr table.');
    }
}
