<?php

namespace App\Livewire\HrPortal;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\Employee;
use App\Models\Leaverequest;
use Illuminate\Support\Facades\DB;
use App\Mail\LeaveRequestSubmitted;
use Illuminate\Support\Facades\Mail;
use App\Mail\LeaveRequestConfirmation;
use Livewire\WithFileUploads;

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
    public $home_address;
    public $provincial_address;
    public $civil_status;
    public $phone_number;
    public $landline_number;
    public $employee_email;

    # Work Related
    public $start_of_employment;
    public $current_position;
    public $company;
    public $department;
    public $employee_type;
    public $sss_num;
    public $tin_num;
    public $phic_num;
    public $hdmf_num;
    public $files;

    # Family Information
    public $name_of_father;
    public $name_of_mother;
    public $name_of_spouse;
    public $names_of_children;
    public $emergency_contact;

    # School Information
    public $high_school_school;
    public $high_school_date_graduated;
    public $college_school;
    public $college_course;
    public $college_date_graduated;
    public $vocational_school;
    public $vocational_course;
    public $vocational_date_graduated;

    public $childrens;


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


    public function mount($type = null){
        // $this->type = $type;
        // $loggedInUser = auth()->user();
        // $employeeRecord = Employee::select('first_name', 'middle_name', 'last_name', 'department', 'inside_department', 'employee_id', 'current_position', 'salary', 'vacation_credits', 'sick_credits')
        //                             ->where('employee_id', $loggedInUser->employee_id)
        //                             ->first(); 
        $this->childrens[] = ['name_of_company' => '', 'prev_position' => '', 'start_date' => '', 'end_date' => ''];
        

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
    }

    public function addEmployeeHistory(){
        $this->childrens[] = ['name_of_company' => '', 'prev_position' => '', 'start_date' => '', 'end_date' => ''];
    }

    
    public function removeImage($item){
        $this->$item = null;
    }

    private function generateEmployeeID(){
        $lastEmployee = Employee::orderBy('employee_id', 'desc')->first();

        if (!$lastEmployee) {
            return 'SLE0001';
        }

        $lastId = intval(substr($lastEmployee->employee_id, 3)); // Extract numeric part
        $nextId = $lastId + 1;
        return 'SLE' . str_pad($nextId, 4, '0', STR_PAD_LEFT);
    }

    public function submit(){
        // foreach($this->rules as $rule => $validationRule){
        //     $this->validate([$rule => $validationRule]);
        //     $this->resetValidation();
        // }   

        // if (in_array($this->type_of_leave, ['Vacation Leave', 'Mandatory/Forced Leave', 'Sick Leave'])) {
        //     $this->validate(['num_of_days_work_days_applied' => 'required|lte:available_credits',]);
        // }
        
        $loggedInUser = auth()->user();
        @dd($this->phone_number);

     // Generate employee ID within a transaction
     DB::transaction(function () {
        $employee_data = new Employee();
        $employee_data->employee_id = $this->generateEmployeeID();
        $employee_data->first_name = $this->first_name;
        $employee_data->middle_name = $this->middle_name;
        $employee_data->last_name = $this->last_name;
        $employee_data->phone_number = $this->phone_number;
        $employee_data->landline_number = $this->landline_number;
        $employee_data->employee_email = $this->employee_email;

        $employee_data->age = $this->age;
        $employee_data->birth_date = $this->birth_date;
        $employee_data->religion = $this->religion;
        $employee_data->height = $this->height;
        $employee_data->weight = $this->weight;
        $employee_data->nickname = $this->nickname;
        $employee_data->home_address = $this->home_address;
        $employee_data->provincial_address = $this->provincial_address;
        $employee_data->civil_status = $this->civil_status;

        // Work Related
        $employee_data->start_of_employment = $this->start_of_employment;
        $employee_data->current_position = $this->current_position;
        $employee_data->department = $this->company; // Assuming $this->company represents the department
        $employee_data->inside_department = $this->department; // Assuming $this->department represents the department details
        $employee_data->employee_type = $this->employee_type;
        $employee_data->sss_num = $this->sss_num;
        $employee_data->tin_num = $this->tin_num;
        $employee_data->phic_num = $this->phic_num;
        $employee_data->hdmf_num = $this->hdmf_num;
        $employee_data->files = $this->files;

        // Family Information
        $employee_data->name_of_father = $this->name_of_father;
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

        // Save the employee data
        $employee_data->save();


        $this->js("alert('Employee Created!')"); 


        // Additional operations if needed, like sending emails or notifications
        // Mail::to($this->supervisor_email)->send(new LeaveRequestSubmitted($employeeRecord, $employee_data));
        // Mail::to($employeeRecord->employee_email)->send(new LeaveRequestConfirmation($employeeRecord, $employee_data));
    });
        // // Send email to the supervisor
        // Mail::to($this->supervisor_email)->send(new LeaveRequestSubmitted($employeeRecord, $employee_data));
        // Mail::to($employeeRecord->employee_email)->send(new LeaveRequestConfirmation($employeeRecord, $employee_data));

        return redirect()->to(route('EmployeesTable'));

    }


    public function render()
    {
        return view('livewire.hr-portal.add-employee')->layout('components.layouts.hr-navbar');
    }
}
