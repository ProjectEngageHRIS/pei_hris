<?php

namespace App\Livewire\HrPortal;

use App\Models\User;
use App\Models\Mytasks;
use Livewire\Component;
use App\Models\Employee;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Encryption\DecryptException;

class EditEmployee extends Component
{
    public $sss_num;
    public $trainingsSeminars;
    public $index;
    public $active = 1;
    public $files_link;

    public $employeeRecord;
    public $files=[];

    public $password;
    public $EmployeeData;
    public $currentStep = 1;
    public $totalSteps = 2; // Number of steps
    public $stepData = [];
    public $add_employee;
    public $new_user;
    public $emergencyContact;
    public $govtProfessionalExamTaken;
    public $employee_history=[];
    public $employeeHistory;
    public $moveToNextStep;
    public $moveToPreviousStep;
    public $employeeDetails;
    public $validatedData;
    public $govt_professional_exam_taken=[];
    public $tin_num;
    public $hdmf_num;
    public $phic_num;
    public $employee_type = [];
    public $inside_department = [];
    public $department = [];
    public $names_of_children=[];
    public $emergency_contact=[];

    public $former_company;
    public $gender = [];

    public $first_name;
    public $middle_name;
    public $last_name;
    public $nickname;
    public $home_address;
    public $provincial_address;
    public $sanitized_start_of_employment;

    public $phone_number;
    public $is_faculty;

    public $landline_number;
    public $employee_email;
    public $current_position;
    public $profile_summary;
    public $salary;
    public $formattedNamesOfChildren = [];


    public $high_school_school;
    public $high_school_course;
    public $high_school_date_graduated;
    public $college_school;
    public $college_course;
    public $college_date_graduated;
    public $vocational_school;
    public $vocational_course;
    public $vocational_date_graduated;
    public $performance;
    public $personal_email;

    public $trainings_seminars=[];
    public $age;

    public $religion;
    public $birth_place;
    public $address;
    public $permission;
    public $birth_date;
    public $employee_id;
    public $civil_status;
    public $old_employee_id;
    public $new_employee_id;
    public $children= [];
    public $name_of_mother;
    public $start_of_employment;
    public $name_of_father;
    public $spouse;
    public $showConfirmation = false;
    public $isEditable = true;
    public $showSubmitButton = true;
    public $existing_user;
    public $original_employee_id;

    public function mount($index)
    {
        $this->old_employee_id = $index;

        // Fetch the employee details
        $employeeRecord  = Employee::where('employee_id', $this->old_employee_id)->first();

        if ($employeeRecord) {
            $loggedInUser = auth()->user();
            $permissions = json_decode($loggedInUser->permissions, true); // Decode if it's stored as a JSON string

            if (empty(array_intersect($permissions, [6, 7, 61024]))) {
                throw new \Exception('Unauthorized Access');
            }
            // Assign each property from the employeeRecord
            try {
                $this->tin_num = Crypt::decryptString($employeeRecord->tin_num);
                $this->phic_num = Crypt::decryptString($employeeRecord->phic_num);
                $this->hdmf_num = Crypt::decryptString($employeeRecord->hdmf_num);
                $this->sss_num = Crypt::decryptString($employeeRecord->sss_num);
            } catch (DecryptException $e) {
                Log::channel('employee_info')->error('Failed to Decrypt Information: ' . $e->getMessage() . ' | ' . $loggedInUser->employee_id);
                $this->dispatch('trigger-error');
            }

            $this->emergency_contact = $employeeRecord->emergency_contact;
            // $this->permission = $employeeRecord->permission;

            $this->employee_id = $employeeRecord->employee_id;
            $this->original_employee_id = $employeeRecord->employee_id;
            $this->first_name = $employeeRecord->first_name;
            $this->middle_name = $employeeRecord->middle_name;
            $this->last_name = $employeeRecord->last_name;
            $this->nickname = $employeeRecord->nickname;
            $this->department = $employeeRecord->department;
            $this->inside_department = $employeeRecord->inside_department;
            $this->employee_type = $employeeRecord->employee_type;
            $this->files = $employeeRecord->files;
            $this->home_address = $employeeRecord->home_address;
            $this->provincial_address = $employeeRecord->provincial_address;
            $this->phone_number = $employeeRecord->phone_number;
            $this->landline_number = $employeeRecord->landline_number;
            $this->employee_email = $employeeRecord->employee_email;
            $this->gender = $employeeRecord->gender;
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
            $this->civil_status = $employeeRecord->civil_status;
            $this->files_link = $employeeRecord->files_link;

            $this->name_of_mother = $employeeRecord->name_of_mother;
            $this->name_of_father = $employeeRecord->name_of_father;
            $this->spouse = $employeeRecord->spouse;

            if ($employeeRecord->names_of_children) {
                // Split the text by new lines and trim each line
                $this->names_of_children = array_map('trim', explode("\n", $employeeRecord->names_of_children));
            }

            if ($employeeRecord->emergency_contact != null) {
                $this->emergency_contact = json_decode($employeeRecord->emergency_contact, true);
            }
            if ($employeeRecord->files != null) {
                $this->files = json_decode($employeeRecord->files, true);
            }
            if ($employeeRecord->employee_history != null) {
                $this->employeeHistory = json_decode($employeeRecord->employee_history, true);
            }
        }

        $existing_user = User::where('employee_id', $this->old_employee_id)->first();

        if ($existing_user) {
            // Set the permission and other properties to the existing user values
            $this->permission = json_decode($existing_user->permissions, true);
            $this->employee_email = $existing_user->email;
        }
    }


    public function enableEditing()
    {
        $this->isEditable = false;
        $this->showSubmitButton = false;
    }

    public function addEmployeeHistory()
    {
        // Ensure $this->employeeHistory is an array
        if (!is_array($this->employeeHistory)) {
            $this->employeeHistory = []; // Initialize it as an empty array if not already
        }

        $this->employeeHistory[] = [
            'name_of_company' => '',
            'prev_position' => '',
            'start_date' => '',
            'end_date' => ''
        ];
    }


    public function getImage($emp_image)
    {
        if (!$emp_image) {
            return null;
        }
        $image = Storage::disk('local')->get($emp_image);
        return $image;
    }

    public function updatedActive($value)
    {
        $this->active = $value ? 1 : 0;
    }

    public function addChild()
    {
        $this->names_of_children[] = '';
    }

    public function removeChild($index)
    {
        unset($this->names_of_children[$index]);
        $this->names_of_children = array_values($this->names_of_children);
    }
    public function removeHistory($index){
        unset($this->employeeHistory[$index]);
        $this->employeeHistory = array_values($this->employeeHistory);
        $this->dispatch('update-employee-history', [json_encode($this->employeeHistory, true)]);
    }
    protected $rules = [
        'first_name' => 'required|max:500',
        'middle_name' => 'nullable|max:500',
        'last_name' => 'required|min:1|max:500',
        'nickname' => 'nullable|max:500',
        'gender' => 'required|in:Male,Female',
        'personal_email' => 'nullable|email:rfc,dns',
        'employee_email' => 'required|email:rfc,dns',
        'home_address' => 'required|min:5|max:500',
        'provincial_address' => 'required|min:10|max:500',
        'age' => 'required|numeric|min:18|max:100',
        'birth_date' => 'required|date',
        'religion' => 'required|min:3|max:500',
        'civil_status' => 'required|in:Single,Married,Widowed,Divorced,Separated',
        'phone_number' => ['required','numeric','regex:/^09[0-9]{9}$/' ],
        'birth_place' => 'required|max:500',
        'profile_summary' => 'required|max:500',
        'name_of_father' => 'required|min:5|max:500',
        'name_of_mother' => 'required|min:5|max:500',
        'spouse' => 'nullable|max:500',
        'names_of_children' => 'nullable|array', // Ensure it's an array with at least one entry
        'names_of_children.*' => 'required|string|max:255',
        'emergency_contact.contact_person' => 'required|string|min:2|max:100',
        'emergency_contact.relationship' => 'required|string|min:2|max:75',
        'emergency_contact.address' => 'required|min:5|max:500',
        'emergency_contact.cellphone_number' => ['required','numeric','regex:/^09[0-9]{9}$/' ],

       'employeeHistory' => 'nullable|array|max:5',
        'employeeHistory.*.name_of_company' => 'required|string|min:2|max:75',
        'employeeHistory.*.prev_position' => 'required|string|min:2|max:75',
        'employeeHistory.*.start_date' => 'required|date|before_or_equal:employeeHistory.*.end_date',
        'employeeHistory.*.end_date' => 'required|date|after_or_equal:employeeHistory.*.start_date',

        'high_school_school' => 'required|min:1|max:500',
        'high_school_date_graduated' => 'required|date',
        'college_school' => 'required|min:1|max:500',
        'college_course' => 'required|min:2|max:500',
        'college_date_graduated' => 'required|date',
        'vocational_school' => 'nullable|min:1|max:500',
        'vocational_course' => 'nullable|min:1|max:500',
        'vocational_date_graduated' => 'nullable|date',

        'start_of_employment' => 'required|date',
        'current_position' => 'required|min:3|max:500',
        'permission' => ['required'],
        'department' => 'required|in:PEI,SL SEARCH,SL Temps,WESEARCH,PEI-Upskills',
        'inside_department' => 'required|in:HR and Admin,Recruitment,CXS,Overseas Recruitment,PEI/SL Temps DO-174,Corporate Accounting and Finance,Accounting Operations',
        'employee_type' => 'required|in:INTERNAL EMPLOYEE,PROBATIONARY,PROJECT BASED,RELIEVER,INTERN,REGULAR,INDEPENDENT CONTRACTOR',
        'sss_num' => ['required', 'string',],
        'tin_num' => ['required', 'string',],
        'phic_num' => ['required', 'string', ],
        'hdmf_num' => ['required', 'string', ],
        'files_link' => 'required|url|max:100000',
        'files' => 'nullable|array|max:5',
        'files.*.name_of_file' => 'required|string|min:2|max:75',
        'files.*.completed' => 'nullable|boolean',
    ];

    protected function messages()
    {
        return [
            // Names of Children
            'names_of_children.*.required' => 'Each child’s name is required and cannot be empty.',
            'names_of_children.*.string' => 'Each child’s name must be a valid string.',
            'names_of_children.*.max' => 'Each child’s name may not exceed :max characters.',
            
            // Emergency Contact
            'emergency_contact.contact_person.required' => 'The emergency contact person is required.',
            'emergency_contact.contact_person.string' => 'The emergency contact person must be a string.',
            'emergency_contact.contact_person.min' => 'The emergency contact person must be at least :min characters.',
            'emergency_contact.contact_person.max' => 'The emergency contact person may not be greater than :max characters.',
            'emergency_contact.relationship.required' => 'The emergency contact relationship is required.',
            'emergency_contact.relationship.string' => 'The emergency contact relationship must be a string.',
            'emergency_contact.relationship.min' => 'The emergency contact relationship must be at least :min characters.',
            'emergency_contact.relationship.max' => 'The emergency contact relationship may not be greater than :max characters.',
            'emergency_contact.address.required' => 'The emergency contact address is required.',
            'emergency_contact.address.min' => 'The emergency contact address must be at least :min characters.',
            'emergency_contact.address.max' => 'The emergency contact address may not exceed :max characters.',
            'emergency_contact.cellphone_number.required' => 'The emergency contact cellphone number is required.',
            'emergency_contact.cellphone_number.numeric' => 'The emergency contact cellphone number must be numeric.',
            'emergency_contact.cellphone_number.regex' => 'The emergency contact cellphone number format is invalid. It should start with 09 and have 11 digits.',
    
            // Employee History
            'employeeHistory.*.name_of_company.required' => 'The company name for entry #:position is required.',
            'employeeHistory.*.name_of_company.string' => 'The company name for entry #:position must be a valid string.',
            'employeeHistory.*.name_of_company.min' => 'The company name for entry #:position must be at least :min characters.',
            'employeeHistory.*.name_of_company.max' => 'The company name for entry #:position may not exceed :max characters.',
            
            'employeeHistory.*.prev_position.required' => 'The previous position for entry #:position is required.',
            'employeeHistory.*.prev_position.string' => 'The previous position for entry #:position must be a valid string.',
            'employeeHistory.*.prev_position.min' => 'The previous position for entry #:position must be at least :min characters.',
            'employeeHistory.*.prev_position.max' => 'The previous position for entry #:position may not exceed :max characters.',
            
            'employeeHistory.*.start_date.required' => 'The start date for entry #:position is required.',
            'employeeHistory.*.start_date.date' => 'The start date for entry #:position must be a valid date.',
            'employeeHistory.*.start_date.before_or_equal' => 'The start date for entry #:position must be before or equal to the end date.',
    
            'employeeHistory.*.end_date.required' => 'The end date for entry #:position is required.',
            'employeeHistory.*.end_date.date' => 'The end date for entry #:position must be a valid date.',
            'employeeHistory.*.end_date.after_or_equal' => 'The end date for entry #:position must be after or equal to the start date.',
        ];
    }

    protected $validationAttributes = [
        'employeeHistory' => 'Employee History',

        'employeeHistory.*.name_of_company' => 'Name of Company/Organization',
        'employeeHistory.*.prev_position' => 'Position',
        'employeeHistory.*.end_date' => 'Finished Date',
        'employeeHistory.*.start_date' => 'Start Date',
        'emp_image' => 'Employee Image',
        'age' => 'Age',
        'permission' => 'Roles',
        'department' => 'Company Name',
        'inside_department' => 'Department Name',
        'employee_type' => 'Employee Type',
        'employee_id' => 'Employee ID',
        'files' => '201 Files',


        'emergencyContact' => 'Emergency Contact',
        'emergency_contact.contact_person' => 'Emergency Contact Person',
        'emergency_contact.relationship' => 'Relationship',
        'emergency_contact.address' => 'Address',
        'emergency_contact.cellphone_number' => 'CP number',


        'civil_status' => 'Civil Status',
        'birth_date' => 'Birth Date',
        'first_name' => 'First Name',
        'middle_name' => 'Middle Name',
        'last_name' => 'Last Name',
        'nickname' => 'nickname',
        'personal_email' => 'Personal Email',
        'home_address' => 'Home Address',
        'names_of_children' => 'Children\'s Names',
        'names_of_children.*' => 'Child\'s Name',
    ];
    public function addFile()
    {
        // Ensure $this->employeeHistory is an array
        if (!is_array($this->files)) {
            $this->files = []; // Initialize it as an empty array if not already
        }

        $this->files[] = [
            'name_of_file' => '',
            'completed' => '',

        ];
    }


    public function removeFile($index){
        unset($this->files[$index]);
        $this->files = array_values($this->files);
        $this->dispatch('update-files', [json_encode($this->files, true)]);
    }


    public function submit()
    {
        foreach($this->rules as $rule => $validationRule){
            $this->validate([$rule => $validationRule]);
            $this->resetValidation();
        }

        $loggedInUser = auth()->user();
        $permissions = json_decode($loggedInUser->permissions, true); // Decode if it's stored as a JSON string
        
        if (empty(array_intersect($permissions, [6, 7, 61024]))) {
            throw new \Exception('Unauthorized Access');
        }

        // Find the employee record by ID (assuming employee_id is unique)
        $old_employee_id = $this->old_employee_id;  // this is the existing employee_id in the database
        $new_employee_id = $this->employee_id;  // this is the new employee_id that user wants to update

        // Find the employee using the old employee_id
        $employee_data = Employee::where('employee_id', $old_employee_id)->first();

        if (!$employee_data) {
            // Handle the case where the employee record is not found
            $this->js("alert('Employee record not found!')");
            return;
        }


        if($this->employeeHistory){
            foreach($this->employeeHistory as $history){
                $jsonEmployeeHistory[] = [
                    'name_of_company' => $history['name_of_company'],
                    'prev_position' => $history['prev_position'],
                    'start_date' => $history['start_date'],
                    'end_date' => $history['end_date'],
                ];
            }
            if($jsonEmployeeHistory){
                $jsonEmployeeHistory = json_encode($jsonEmployeeHistory) ;
                $employee_data->employee_history = $jsonEmployeeHistory;
            } 
        } else {
            $employee_data->employee_history = Null;
        }

        if($this->files){
            foreach($this->files ?? [] as $Files){
                $jsonFiles[] = [
                    'name_of_file' => $Files['name_of_file'],
                    'completed' => $Files['completed'],

                ];
            }
            $jsonFiles = json_encode($jsonFiles ?? Null) ;
            $employee_data->files = $jsonFiles;
            // if($jsonFiles){
            //     dd($jsonFiles);
            // }
        } else {
            $employee_data->files = Null;
        }

        $employee_data->files_link = $this->files_link;

        // Update the employee record with new data
        $employee_data->first_name = $this->first_name;
        $employee_data->middle_name = $this->middle_name;
        $employee_data->last_name = $this->last_name;
        $employee_data->employee_id = $new_employee_id;
        $employee_data->phone_number = $this->phone_number;
        $employee_data->landline_number = $this->landline_number;
        $employee_data->employee_email = $this->employee_email;
        $employee_data->age = $this->age; // Assign age here correctly
        $employee_data->birth_date = $this->birth_date;
        $employee_data->religion = $this->religion;
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
        $employee_data->sss_num = Crypt::encryptString($this->sss_num);
        $employee_data->tin_num = Crypt::encryptString($this->tin_num);
        $employee_data->phic_num = Crypt::encryptString($this->phic_num);
        $employee_data->hdmf_num = Crypt::encryptString($this->hdmf_num);
        $employee_data->files = $this->files;
        $employee_data->names_of_children = Crypt::encryptString(json_encode($this->names_of_children));

        // Family Information
        $employee_data->name_of_father = $this->name_of_father;
        $employee_data->emergency_contact = json_encode($this->emergency_contact);
        $employee_data->name_of_mother = $this->name_of_mother;
        $employee_data->spouse = $this->spouse; // Assuming $this->name_of_spouse represents spouse details

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

        $formattedNamesString = '';

        foreach ($this->names_of_children as $name) {
            $formattedNamesString .= $name . PHP_EOL;
        }

        // Convert the formatted array to a JSON-encoded string
        $formattedNamesString = rtrim($formattedNamesString, PHP_EOL);

        $employee_data->names_of_children = $formattedNamesString;

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


        $existing_user = User::where('employee_id', $this->old_employee_id)->first();
        if ($existing_user) {
            $existing_user->email = $this->employee_email; // Update email
            $existing_user->employee_id = $new_employee_id; // Update employee_id
            $roles = json_encode($this->permission, true); // Convert roles to JSON
            $existing_user->permissions = $roles; // Update roles
        
            // Use the update method to save changes
            $existing_user->save();
        }

        $jsonEmergencyContact = json_encode($jsonEmergencyContact);

        if($old_employee_id != $new_employee_id){
            $tasks = Mytasks::whereJsonContains('target_employees', $old_employee_id)->get();
        
            foreach ($tasks as $task) {
                $targetEmployees = json_decode($task->target_employees); // Decode the JSON column
                
                // If the old employee ID exists in the array, replace it with the new one
                if (($key = array_search($old_employee_id, $targetEmployees)) !== false) {
                    $targetEmployees[$key] = $new_employee_id; // Replace the old ID with the new one
                }
                // Save the updated task
                Mytasks::where('form_id', $task->form_id)->update(['target_employees' => json_encode($targetEmployees)]);
            }
        }
        
        $employee_data->save();

        $this->dispatch('trigger-success');

        return $this->dispatch('trigger-reroute');


    }
    public function render()
    {
        return view('livewire.hr-portal.edit-employee')->layout('components.layouts.hr-navbar');
    }
}

