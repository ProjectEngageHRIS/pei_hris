<?php

namespace App\Livewire\HrPortal;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\Employee;
use App\Models\Leaverequest;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;
use App\Mail\LeaveRequestSubmitted;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Crypt;
use App\Mail\LeaveRequestConfirmation;

class AddEmployee extends Component
{
    use WithFileUploads;


    public $employeeRecord;
    public $date;
    public $first_name;
    public $middle_name;
    public $last_name;
    public $department_name;
    public $available_credits;
    public $age;
    public $birth_date;
    public $religion;
    public $height;
    public $weight;
    public $nickname;
    public $emergencyContact;

    public $home_address;
    public $provincial_address;
    public $civil_status;
    public $phone_number;
    public $landline_number;
    public $employee_email;
    public $employee_id;

    # Work Related
    public $start_of_employment;
    public $current_position;
    public $company;
    public $department;
    public $employee_history;
    public $employee_type;
    public $sss_num;
    public $tin_num;
    public $phic_num;
    public $hdmf_num;
    public $files;
    public $inside_department;
    public $gender;
    public $profile_summary;
    public $performance;
    public $trainings_seminars;
    public $active;
    public $govt_professional_exam_taken;
    public $personal_email;
    public $birth_place;
    public $spouse;


    # Family Information
    public $name_of_father;
    public $name_of_mother;
    public $name_of_spouse;
    public $names_of_children;
    public $emergency_contact;
    public $employee;

    # School Information
    public $high_school_school;
    public $high_school_date_graduated;
    public $college_school;
    public $college_course;
    public $college_date_graduated;
    public $vocational_school;
    public $vocational_course;
    public $vocational_date_graduated;
    public $employeeHistory;

    public $childrens;
    public $index;
    public $isEditable = false;
    public $showSubmitButton = false;
    // public $employee_id;
    // public $application_date;
    // public $mode_of_application;
    // public $type_of_leave_others;
    // public $type_of_leave_sub_category;
    // public $type_of_leave_description;
    // public $num_of_days_work_days_applied;
    // public $inclusive_start_date;
    // public $inclusive_end_date;
    // public $supervisor_email;
    // public $commutation;
    // public $commutation_signature_of_appli;
    // public $total_earned_vaca;
    // public $less_this_appli_vaca;
    // public $balance_vaca;
    // pub    // public $date_earned;
    // public $earned_description;
    // public $purpose_type;
    // public $type;
    // public $deduct_to;lic $total_earned_sick;
    // public $less_this_appli_sick;
    // public $balance_sick;
    // public $as_of_filling;
    // public $auth_off_sig_a;
    // public $status_description;
    // public $auth_off_sig_b;
    // public $days_with_pay;
    // public $days_without_pay;
    // public $others;
    // public $disapprove_reason;
    // public $auth_off_sig_c_and_d;
    // public $reason;



    // public $company;
    // public $department;




    public function mount($index)
    {

        $this->employee_id = $index;


        // Fetch the employee details
        $employeeRecord  = Employee::where('employee_id', $this->employee_id)->first();


        // Check if the record was found
        if ($employeeRecord) {
            // Assign each property from the employeeRecord
            $this->tin_num = $employeeRecord->tin_num;
            $this->phic_num = $employeeRecord->phic_num;
            $this->hdmf_num = $employeeRecord->hdmf_num;
            $this->sss_num = $employeeRecord->sss_num;
            $this->emergency_contact = $employeeRecord->emergency_contact;

            $this->employee_id = $employeeRecord->employee_id;
            $this->first_name = $employeeRecord->first_name;
            $this->middle_name = $employeeRecord->middle_name;
            $this->last_name = $employeeRecord->last_name;
            $this->nickname = $employeeRecord->nickname;
            $this->department = $employeeRecord->department;
            $this->inside_department = $employeeRecord->inside_department;
            $this->employee_type = $employeeRecord->employee_type;
            $this->company = $employeeRecord->company;
            $this->home_address = $employeeRecord->home_address;
            $this->provincial_address = $employeeRecord->provincial_address;
            $this->phone_number = $employeeRecord->phone_number;
            $this->landline_number = $employeeRecord->landline_number;
            $this->employee_email = $employeeRecord->employee_email;
            $this->gender = $employeeRecord->gender;
            $this->names_of_children = $employeeRecord->names_of_children;

            $this->current_position = $employeeRecord->current_position;
            $this->profile_summary = $employeeRecord->profile_summary;
            $this->high_school_school = $employeeRecord->high_school_school;
            $this->high_school_date_graduated = $employeeRecord->high_school_date_graduated;
            $this->college_school = $employeeRecord->college_school;
            $this->college_course = $employeeRecord->college_course;
            $this->college_date_graduated = $employeeRecord->college_date_graduated;
            $this->vocational_school = $employeeRecord->vocational_school;
            $this->vocational_course = $employeeRecord->vocational_course;
            $this->vocational_date_graduated = $employeeRecord->vocational_date_graduated;
            $this->performance = json_decode($employeeRecord->performance);
            $this->trainings_seminars = json_decode($employeeRecord->trainings_seminars);
            $this->birth_date = $employeeRecord->birth_date;
            $this->religion = $employeeRecord->religion;
            $this->age = $employeeRecord->age;
            $this->start_of_employment = $employeeRecord->start_of_employment;
            $this->active = $employeeRecord->active;
            $this->govt_professional_exam_taken = json_decode($employeeRecord->govt_professional_exam_taken);

            $this->personal_email = $employeeRecord->personal_email;
            $this->birth_place = $employeeRecord->birth_place;
            $this->employee_history = $employeeRecord->employeeHistory;

            $this->height = $employeeRecord->height;
            $this->weight = $employeeRecord->weight;
            $this->civil_status = $employeeRecord->civil_status;
            $this->name_of_mother = $employeeRecord->name_of_mother;
            $this->name_of_father = $employeeRecord->name_of_father;
            $this->spouse = $employeeRecord->spouse;
            if($employeeRecord->emergency_contact != null){
                $this->emergency_contact = json_decode($employeeRecord->emergency_contact, true);
            }
            if($employeeRecord->employee_history != null){
                $this->employeeHistory = json_decode($employeeRecord->employee_history, true);
            }
        }
    }



        // $this->leaveRequestTimeFrame[] = ['start_date' => '', 'end_date' => '', 'full_half' => ''];




        // // $departmentName = DB::table('departments')->where('department_id', $employeeRecord->department_id[0])->value('department_name');
        // $this->available_credits = $employeeRecord->vacation_credits + $employeeRecord->sick_credits;
        // $this->employee_id = $employeeRecord->employee_id;
        // $this->first_name = $employeeRecord->first_name;
        // $this->middle_name = $employeeRecord->middle_name;
        // $this->last_name = $employeeRecord->last_name;
        // $this->company = $employeeRecord->department;
        // $this->department = $employeeRecord->inside_department;
        // $this->employee

        // $this->current_position = $employeeRecord->current_position;
        // $this->salary = $employeeRecord->salary;
        // $this->available_credits = $employeeRecord->sick_credits + $employeeRecord->vacation_credits;
        // $dateToday = Carbon::now()->toDateString();
        // $this->date = $dateToday;
        // $this->application_date = $dateToday;
        // if($type = "adviseslip"){
        //     $this->mode_of_application = "Advise Slip";
        // }
        public function enableEditing()
        {
            $this->isEditable = true;
            $this->showSubmitButton = true;
        }

        public function submit()
        {
            // Find the employee record by ID (assuming employee_id is unique)
            $employee_data = Employee::where('employee_id', $this->employee_id)->first();

            if (!$employee_data) {
                // Handle the case where the employee record is not found
                $this->js("alert('Employee record not found!')");
                return;
            }

            // Update the employee record with new data
            $employee_data->first_name = $this->first_name;
            $employee_data->middle_name = $this->middle_name;
            $employee_data->last_name = $this->last_name;
            $employee_data->phone_number = $this->phone_number;
            $employee_data->landline_number = $this->landline_number;
            $employee_data->employee_email = $this->employee_email;
            $employee_data->age = $this->age; // Assign age here correctly
            $employee_data->birth_date = $this->birth_date;
            $employee_data->religion = $this->religion;
            $employee_data->height = $this->height;
            $employee_data->weight = $this->weight;
            $employee_data->gender = $this->gender;

            $employee_data->nickname = $this->nickname;
            $employee_data->home_address = $this->home_address;
            $employee_data->provincial_address = $this->provincial_address;
            $employee_data->civil_status = $this->civil_status;

            // Work Related
            $employee_data->start_of_employment = $this->start_of_employment;
            $employee_data->current_position = $this->current_position;
            $employee_data->department = $this->department; // Assuming $this->company represents the department
            $employee_data->inside_department = $this->inside_department; // Assuming $this->department represents the department details
            $employee_data->employee_type = $this->employee_type;
            $employee_data->sss_num = $this->sss_num;
            $employee_data->tin_num = $this->tin_num;
            $employee_data->phic_num = $this->phic_num;
            $employee_data->hdmf_num = $this->hdmf_num;
            $employee_data->files = $this->files;

            // Family Information
            $employee_data->name_of_father = $this->name_of_father;
            // $employee_data->e = $this->name_of_father;
            $employee_data->emergency_contact = json_encode($this->emergency_contact);

            $employee_data->name_of_mother = $this->name_of_mother;
            $employee_data->spouse = $this->name_of_spouse; // Assuming $this->name_of_spouse represents spouse details
            // $employee_data->names_of_children = $this->names_of_children;
            // $employee_data->emergency_contact = $this->emergency_contact;

            // School Information
            $employee_data->high_school_school = $this->high_school_school;
            $employee_data->high_school_date_graduated = $this->high_school_date_graduated;
            $employee_data->college_school = $this->college_school;
            $employee_data->college_course = $this->college_course;
            $employee_data->college_date_graduated = $this->college_date_graduated;
            $employee_data->vocational_school = $this->vocational_school;
            $employee_data->vocational_course = $this->vocational_course;
            $employee_data->vocational_date_graduated = $this->vocational_date_graduated;
            $employee_data->birth_place = $this->birth_place;



            $this->emergencyContact = $this->emergencyContact ?? [];

            // Prepare JSON array
            $jsonEmergencyContact = [];

            foreach($this->emergencyContact as $emergenC) {
                $jsonEmergencyContact[] = [
                    'contact_person' => $emergenC['contact_person'] ?? '', // Default to empty string if not set
                    'relationship' => $emergenC['relationship'] ?? '', // Default to empty string if not set
                    'address' => $emergenC['address'] ?? '', // Default to empty string if not set
                    'relationship' => $emergenC['cellphone_number'] ?? '', // Default to empty string if not set

                ];
            }


            // foreach($this->employeeHistory as $history){
            //     $jsonEmployeeHistory[] = [
            //         'names' => $history['name_of_company'],
            //         'prev_position' => $history['prev_position'],
            //         'start_date' => $history['start_date'],
            //         'end_date' => $history['end_date'],
            //     ];
            // }

            // $jsonEmployeeHistory = json_encode($jsonEmployeeHistory ?? ' ') ;
            $jsonEmergencyContact = json_encode($jsonEmergencyContact);
            // $employee_data->employee_history = $jsonEmployeeHistory;
            // Save the updated employee data
            $employee_data->save();

            $this->js("alert('Employee Information Updated!')");

            return redirect()->to(route('HumanResourceDashboard'));
        }



        public function render()
        {
            return view('livewire.hr-portal.add-employee', [
                'employeeRecord' => $this->employeeRecord,
            ])->layout('components.layouts.hr-navbar');
        }
}



