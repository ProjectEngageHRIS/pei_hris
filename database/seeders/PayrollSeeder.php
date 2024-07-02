<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Payroll;
use App\Models\Employee;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PayrollSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $employee = Employee::first();
        $employeeId = "SLE0001"; // Starting employee ID
        $startDate = Carbon::createFromDate(2021, 1, 1); // Start from January 2021

        $currentDate = Carbon::now();
        $i = 0; // Counter for payroll IDs

        while ($startDate->lessThanOrEqualTo($currentDate)) {
            $randomNumber = rand(1000, 10000);

            $payrollId = $employeeId . str_pad($i, 4, '0', STR_PAD_LEFT);

            $zero_balance_probability = 0.7; // Adjust probability as needed

            $random_number = rand(0, 100);
            
            if ($random_number <= $zero_balance_probability * 100) { // Convert probability to percentage for comparison
              $balance = 0;
            } else {
              $balance = rand(1, 1000);
            }
            
            $loan_balance = ($balance === 0) ? rand(1, 1000) : 0;

            // Payroll::create([
            //     'employee_id' => $employeeId,
            //     'payroll_id' => $payrollId,
            //     'start_date' => now(),
            //     'end_date' => now(),

            //     'date' => $startDate->copy(), // Use the current start date for this record
            //     'salary' => rand(1000, 10000),
            //     'balance' => $balance,
            //     'loan_balance' => $loan_balance, 
            //     'lvt_pay' => rand(100, 1000),
            //     'absences' => rand(0, 5), // Random absences in the month
            //     'amount_earned' => rand(100, 1000),
            //     'gsis_deduction' => rand(100, 1000),
            //     'wtax' => rand(100, 1000),
            //     'pera' => rand(100, 1000),
            //     'philhealth' => rand(100, 1000),
            //     'pag_ibig' => rand(100, 1000),
            //     'plmpcci' => rand(100, 1000),
            //     'landbank' => rand(100, 1000),
            //     'maxicare' => rand(100, 1000),
            //     'study_grant' => rand(100, 1000),
            //     'other_deductions' =>rand(100, 1000),
            //     'net_pay' => rand(1000, 10000),
            // ]);

            Payroll::create([
              'employee_id' => $employeeId,
              'payroll_id' => rand(231, 32193023),
              'start_date' => Carbon::now()->subMonth()->startOfMonth(),
              'end_date' => Carbon::now()->subMonth()->endOfMonth(),
              'absences' => rand(1,29),
              'basic_pay' => rand(20000, 50000),
              'tardiness' => rand(0, 500),
              'cell_allowance' => rand(1000, 2000),
              'de_minimis_allowance' => rand(500, 1500),
              'rice_subsidy_allowance' => rand(2000, 3000),
              'laundry_allowance' => rand(500, 1000),
              'clothing_allowance' => rand(1000, 2000),
              'medical_cash_allowance' => rand(1000, 2000),
              'other_allowance' => rand(500, 1000),
              'overtime' => rand(1000, 5000),
              'other_adjustments' => rand(-500, 500),
              'birthday_gift' => rand(500, 1000),
              'sss_premium' => rand(500, 1000),
              'philhealth_premium' => rand(500, 1000),
              'hdmf_premium' => rand(500, 1000),
              'withholding_tax' => rand(1000, 5000),
              'co_loan' => rand(0, 5000),
              'sss_loan' => rand(0, 5000),
              'hdmf_loan' => rand(0, 5000),
              'hdmf_savings' => rand(500, 2000),
              'hmo' => rand(500, 2000),
              'laptop_program' => rand(0, 2000),
              'gross_pay' => rand(30000, 60000),
              'gross_deed' => rand(1000, 5000),
              'net_pay' => rand(25000, 55000),
              'php' => rand(500, 5000),
              'created_at' => now(),
              'updated_at' => now(),
          ]);

            $startDate->addMonth(); // Move to the next month
            $i++; // Increment the counter for payroll IDs
        }
    }
}
