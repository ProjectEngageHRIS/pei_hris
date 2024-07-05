<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Employee;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $employees = Employee::factory()->count(10)->create();

        foreach ($employees as $employee) {
            User::factory()->create([
                'employee_id' => $employee->employee_id,
                'email' => $employee->employee_email,
                'role_id' => rand(1, 10),
            ]);
        }

    // Modify and create users for specific employees individually
    $specificEmployees = [
        [
            'first_name' => 'Maximo',
            'middle_name' => 'Pantaleon',
            'last_name' => 'Mariano',
            'department' => 'SL SEARCH',
            'nickname' => 'Sonny',
            'role_id' => 10 // Specific role ID for this employee
        ],
        [
            'first_name' => 'Kristine',
            'middle_name' => 'Duro',
            'last_name' => 'Castro',
            'nickname' => 'Tin',
            'department' => 'PEI',
            'role_id' => 9 // Specific role ID for this employee
        ],
        [
            'first_name' => 'Marvin',
            'middle_name' => 'Chan',
            'last_name' => 'Baniqued',
            'nickname' => 'Chan',
            'department' => 'PEI',
            'role_id' => 0 // Specific role ID for this employee
        ],
        [
            'first_name' => 'Kris Ria',
            'middle_name' => 'Castillo',
            'last_name' => 'Dipasupil',
            'nickname' => 'Ria',
            'department' => 'PEI',
            'role_id' => 11 // Specific role ID for this employee
        ],
    ];

        foreach ($specificEmployees as $index => $specificEmployee) {
            $employee = $employees[$index];

            $employee->update([
                'first_name' => $specificEmployee['first_name'],
                'middle_name' => $specificEmployee['middle_name'],
                'last_name' => $specificEmployee['last_name'],
                'nickname' => $specificEmployee['nickname'],
                'department' => $specificEmployee['department']
            ]);

            $user = User::where('employee_id', $employee->employee_id)->first();
            $user->update([
                'role_id' => $specificEmployee['role_id']
            ]);
        }

        User::factory()->create([
            'employee_id' => 200000000,
            'email' => 'itproject@gmail.com',
            'role_id' => 0,
        ]);
    }
}
