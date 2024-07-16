<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    protected $model = Employee::class;

    protected static $employeeCounter = 1;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $employeeHistory = [];
        for ($i = 0; $i < $this->faker->numberBetween(1, 3); $i++) {
            $employeeHistory[] = [
                'name_of_company' => $this->faker->company,
                'prev_position' => $this->faker->jobTitle,
                'start_date' => $this->faker->date('Y-m-d', '-2 years'),
                'end_date' => $this->faker->date('Y-m-d', 'now'),
            ];
        }

        $performance = [];

        for ($i = 0; $i < $this->faker->numberBetween(1, 3); $i++) {
            $performance[] = [
                'third_month' => $this->faker->imageUrl(),
                'third_month_status' => $this->faker->randomElement(['Completed', 'Half-Baked', 'Pending', 'Not Started']),
                'fifth_month' => $this->faker->imageUrl(),
                'fifth_month_status' => $this->faker->randomElement(['Completed', 'Half-Baked', 'Pending', 'Not Started']),
                'annual' => $this->faker->imageUrl(),
                'annual_status' => $this->faker->randomElement(['Completed', 'Half-Baked', 'Pending','Not Started']),
                'improvement_plan' => $this->faker->imageUrl(), // Assuming you have a directory to store fake files
                // 'improvement_plan' => $this->faker->file('/path/to/store/files', false), // Assuming you have a directory to store fake files
            ];
        }

        $namesOfChildren = [];
        for ($i = 0; $i < $this->faker->numberBetween(1, 3); $i++) {
            $namesOfChildren[] = [
                'name' => $this->faker->firstName,
            ];
        }

        $emergencyContact = [];
        for ($i = 0; $i < $this->faker->numberBetween(1, 3); $i++) {
            $emergencyContact[] = [
                'name' => $this->faker->firstName,
                'address' => $this->faker->address,
                'phone_number' => $this->faker->phoneNumber,
            ];
        }

        for ($i = 0; $i < $this->faker->numberBetween(1, 3); $i++) {
            $collegeids[] = $this->faker->numberBetween(1, 17);
        }

        for ($i = 0; $i < $this->faker->numberBetween(1, 3); $i++) {
            $departmentids[] = $this->faker->numberBetween(1, 62);
        }

        $is_college_head = [];
        for ($i = 0; $i < count($collegeids); $i++) {
            if(in_array(1, $is_college_head) == False){
                array_push($is_college_head, $this->faker->numberBetween(0, 1));
            } else {
                array_push($is_college_head, 0);
            }
        }

        $is_department_head = [];
        for ($i = 0; $i < count($departmentids); $i++) {
            if(in_array(1, $is_department_head) == False){
                array_push($is_department_head, $this->faker->numberBetween(0, 1));
            } else {
                array_push($is_department_head, 0);
            }
        }

        $employeeId = 'SLE' . str_pad(static::$employeeCounter++, 4, '0', STR_PAD_LEFT);
        
        $roles = [
            "Regular Employee",
            "Accounting Office Staff",
            "VP of Finance",
            "Senior Computer Op",
            "Budgeting Office Staff",
            "Treasurer's Office Staff",
            "Property and Supply Office Staff",
            "Cash Office Staff",
            "Accounting (same kaya ito as 1)",
            "Head of Accounting View",
            "OVFP View",
            "Purchasing Admin",
            "Purchasing User",
            "Inventory User",
            "Proj Cost Admin",
            "Proj cost user",
            "Section Heads and Canvassers",
            "Head of the Procurement Office",
            "Procurement users",
            "Asset Management user",
            "Supplies Management User",
            "Student Perf Admin",
            "College Chairperson",
            "Registrar",
            "Part-Time Faculty",
            "Full-Time Faculty",
            "College Dean",
            "Faculty Admin",
            "HR Admin",
            "Employee with High Position (Department Head and Dean)",
            "HR Employee",
            "Alumni Admin",
            "Alumni",
            "OPA",
            "OSDS Staff",
            "OSDS Dean",
            "College Dean",
            "USO",
            "OSDS Secretariat",
            "Student Officer",
            "Nurse",
            "Doctor",
            "Library Admin",
            "Counselor",
            "Counselor Head",
            "Legal Admin",
            "L&D Admin",
            "HR Chief",
            "Recruitment Admin",
            "Personnel Management Admin",
            "Compensation and Benefits Admin",
            "Recruitment Staff",
            "Admission Admin"
        ];
        
        return [
            'employee_id' => $employeeId,
            'first_name' => $this->faker->firstName,
            'middle_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'nickname' => $this->faker->firstName,
            'department' => $this->faker->randomElement(['PEI', 'SL SEARCH', 'SL TEMPS', 'WESEARCH', 'PEI-UPSKILLS']),
            'home_address' => $this->faker->address,
            'provincial_address' => $this->faker->address,
            // 'profile_summary' => $this->faker->sentence(5),
            'profile_summary' => $this->faker->paragraph(5),

            'phone_number' => $this->faker->phoneNumber,
            'employee_email' => $this->faker->email,
            'landline_number' => $this->faker->phoneNumber,
            'gender' => $this->faker->randomElement(['Male', 'Female']),
            'high_school_school' => $this->faker->sentence(1), // Generate a random high school name
            // 'high_school_course' => $this->faker->sentence(2), // Generate a random high school course
            'high_school_date_graduated' => $this->faker->date(), // Generate a random date for high school graduation
            'college_school' => $this->faker->sentence(2), // Generate a random college name
            'college_course' => $this->faker->sentence(2), // Generate a random college course
            'college_date_graduated' => $this->faker->date(), // Generate a random date for college graduation
            'vocational_school' => $this->faker->sentence(2), // Generate a random college name
            'vocational_course' => $this->faker->sentence(2), // Generate a random college course
            'vocational_date_graduated' => $this->faker->date(),
            'performance' => json_encode($performance),
            'age' => $this->faker->numberBetween(20, 65),
            'birth_date' => $this->faker->date(),
            'religion' => $this->faker->randomElement(['Christianity', 'Islam', 'Hinduism', 'Buddhism', 'None']),
            'birth_place' => $this->faker->sentence(1),
            'weight' => $this->faker->numberBetween(50, 150), // Generate a random weight between 50 and 150 kg
            'height' => $this->faker->numberBetween(150, 200),
            'civil_status' => $this->faker->randomElement(['Single', 'Married', 'Divorced', 'Widowed']),
            'spouse' => $this->faker->firstName,
            'names_of_children' => json_encode($namesOfChildren),
            'sss_num' => $this->faker->numerify('###########'),
            'tin_num' => $this->faker->numerify('###-###-###-###'), // Adjust format as needed
            'phic_num' => $this->faker->numerify('##-#########-#'), // Adjust format as needed
            'hdmf_num' => $this->faker->numerify('####-####-####'), // Adjust format as needed
            'emergency_contact' => json_encode($emergencyContact),



            // 'job_id' => $this->faker->numberBetween(1, 100),
            'inside_department' => $this->faker->randomElement([
                                                "HR and Admin", 
                                                "Recruitment", 
                                                "CXS", 
                                                "Overseas Recruitment", 
                                                "PEI/SL Temps DO-174", 
                                                "Corporate Accounting and Finance", 
                                                "Accounting Operations"
                                            ]),

            'employee_type' => $this->faker->randomElement(['INTERNALS', 'OJT', 'PEI-CSS', 'RAPID', 'RAPID MOBILITY', 'UPSKILLS']),
            // 'school_email' => $this->faker->unique()->safeEmail,
            
           
            'name_of_mother' => $this->faker->firstName ,
            'name_of_father' => $this->faker->firstName ,
            // 'college_id' => $collegeids,
            // 'department_id' => $departmentids,
            // 'is_department_head' => $is_department_head,
            // 'is_college_head' =>  $is_college_head,
            

            'personal_email' => $this->faker->unique()->safeEmail,
            // 'phone' => $this->faker->phoneNumber,
            // 'address' => $this->faker->address,
            'start_of_employment' => $this->faker->date(),
            'end_of_employment' => $this->faker->optional()->date(),
            'employee_history' => json_encode($employeeHistory),
            'vacation_credits' => $this->faker->optional()->randomFloat(2, 0, 30),
            'sick_credits' => $this->faker->optional()->randomFloat(2, 0, 30),
            // 'study_available_units' => $this->faker->optional()->numberBetween(0, 12),
            // 'teach_available_units' => $this->faker->optional()->numberBetween(0, 12),
            'current_position' => $this->faker->jobTitle,
            // 'is_faculty' => $this->faker->boolean,
            // 'salary' => $this->faker->randomFloat(2, 30000, 200000),
            // 'cto' => $this->faker->randomFloat(2, 0, 100),
            'active' => $this->faker->boolean,
            'payroll_status' => $this->faker->randomElement(['Awaiting Approval', 'Approved', 'Overdue', 'Draft'])
            
            // // Documents
            // // 'emp_image' => $this->faker->optional()->imageUrl(),
            // 'emp_diploma' => $this->faker->boolean ? 1 : 0,
            // 'emp_tor' => $this->faker->boolean ? 1 : 0,
            // 'emp_cert_of_trainings_seminars' => $this->faker->boolean ? 1 : 0,
            // 'emp_auth_copy_of_csc_or_prc' => $this->faker->boolean ? 1 : 0,
            // 'emp_auth_copy_of_prc_board_rating' => $this->faker->boolean ? 1 : 0,
            // 'emp_med_certif' => $this->faker->boolean ? 1 : 0,
            // 'emp_nbi_clearance' => $this->faker->boolean ? 1 : 0,
            // 'emp_psa_birth_certif' => $this->faker->boolean ? 1 : 0,
            // 'emp_psa_marriage_certif' => $this->faker->boolean ? 1 : 0,
            // 'emp_service_record_from_other_govt_agency' => $this->faker->boolean ? 1 : 0,
            // 'emp_approved_clearance_prev_employer' => $this->faker->boolean ? 1 : 0,
            // 'other_documents' => $this->faker->boolean ? 1 : 0,
        ];
    }
}
