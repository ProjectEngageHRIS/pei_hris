<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Employee;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    // $employees = Employee::factory()->count(10)->create();

    // foreach ($employees as $employee) {
    //     User::factory()->create([
    //         'employee_id' => $employee->employee_id,
    //         'email' => $employee->employee_email,
    //         'role_id' => rand(1, 10),
    //     ]);
    // }

    // // Modify and create users for specific employees individually
    // $specificEmployees = [
    //     [
    //         'first_name' => 'Maximo',
    //         'middle_name' => 'Pantaleon',
    //         'last_name' => 'Mariano',
    //         'department' => 'SL SEARCH',
    //         'nickname' => 'Sonny',
    //         'current_position' => 'President',
    //         'role_id' => 10 // Specific role ID for this employee
    //     ],
    //     [
    //         'first_name' => 'Kristine',
    //         'middle_name' => 'Duro',
    //         'last_name' => 'Castro',
    //         'nickname' => 'Tin',
    //         'department' => 'PEI',
    //         'current_position' => 'HR Head',

    //         'role_id' => 9 // Specific role ID for this employee
    //     ],
    //     [
    //         'first_name' => 'Marvin',
    //         'middle_name' => 'Chan',
    //         'last_name' => 'Baniqued',
    //         'nickname' => 'Chan',
    //         'current_position' => 'ICT Specialist',
    //         'department' => 'PEI',
    //         'role_id' => 0 // Specific role ID for this employee
    //     ],
    //     [
    //         'first_name' => 'Kris Ria',
    //         'middle_name' => 'Castillo',
    //         'last_name' => 'Dipasupil',
    //         'nickname' => 'Ria',
    //         'current_position' => 'IT Specialist',
    //         'department' => 'PEI',
    //         'role_id' => 11 // Specific role ID for this employee
    //     ],
    // ];

    //     foreach ($specificEmployees as $index => $specificEmployee) {
    //         $employee = $employees[$index];

    //         $employee->update([
    //             'first_name' => $specificEmployee['first_name'],
    //             'middle_name' => $specificEmployee['middle_name'],
    //             'last_name' => $specificEmployee['last_name'],
    //             'nickname' => $specificEmployee['nickname'],
    //             'current_position' => $specificEmployee['current_position'],

    //             'department' => $specificEmployee['department']
    //         ]);

    //         $user = User::where('employee_id', $employee->employee_id)->first();
    //         $user->update([
    //             'role_id' => $specificEmployee['role_id']
    //         ]);
    //     }

        User::create([
            'employee_id' => "SLEA9999",
            'email' => 'itproject@gmail.com',
            'password' => Hash::make('superadminpassword'),
            'role_id' => 61024,
        ]);

        Employee::create([
            'employee_id' => 'SLEA9999',
            'first_name' => 'Super',
            'middle_name' => 'Admin',
            'last_name' => 'User',
            'nickname' => 'Admin',
            'department' => 'Administration',
            'inside_department' => 'Management',
            'employee_type' => 'Admin',
            'home_address' => '123 Admin Street',
            'provincial_address' => 'Not Applicable', // Cannot be null
            'phone_number' => '1234567890',
            'landline_number' => 'None', // Cannot be null
            'employee_email' => 'admin@example.com',
            'gender' => 'Not Specified', // Using the default value
            'current_position' => 'Super Admin',
            'profile_summary' => 'Handles all administrative tasks.',
            'high_school_school' => 'Not Applicable', // Cannot be null
            'high_school_date_graduated' => '2000-01-01', // Cannot be null
            'college_school' => 'Not Applicable', // Cannot be null
            'college_course' => 'Not Applicable', // Cannot be null
            'college_date_graduated' => '2004-01-01', // Cannot be null
            'vocational_school' => 'Not Applicable', // Cannot be null
            'vocational_course' => 'Not Applicable', // Cannot be null
            'vocational_date_graduated' => '2006-01-01', // Cannot be null
            'performance' => json_encode([]), // JSON field cannot be null
            'govt_professional_exam_taken' => 'Not Applicable', // Cannot be null
            'govt_professional_exam_taken_rating' => null, // Nullable field
            'trainings_seminars' => json_encode([]), // JSON field cannot be null
            'age' => 35,
            'birth_date' => '1989-01-01',
            'religion' => 'Not Specified',
            'birth_place' => 'Cityville',
            'civil_status' => 'Single',
            'name_of_mother' => 'Mother Name',
            'name_of_father' => 'Father Name',
            'spouse' => 'Not Applicable', // Nullable field, so can be null
            'names_of_children' => json_encode([]), // Nullable field, so can be null
            'sss_num' => 'Not Applicable', // Nullable field, so can be null
            'tin_num' => 'Not Applicable', // Nullable field, so can be null
            'phic_num' => 'Not Applicable', // Nullable field, so can be null
            'hdmf_num' => 'Not Applicable', // Nullable field, so can be null
            'emergency_contact' => json_encode([]), // Nullable field, so can be null
            'emp_image' => null, // Nullable field, so can be null
            'employee_history' => json_encode([]), // Nullable field, so can be null
            'files' => json_encode([]), // Nullable field, so can be null
            'start_of_employment' => '2024-01-01',
            'end_of_employment' => null, // Nullable field, so can be null
            'vacation_credits' => 0, // Nullable field, so can be null
            'sick_credits' => 0, // Nullable field, so can be null
            'payroll_status' => 'Active', // Nullable field, so can be null
            'active' => true,
            'personal_email' => 'superadmin@example.com'
        ]);
        
        
    }
}
