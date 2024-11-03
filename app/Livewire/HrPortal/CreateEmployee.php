<?php

namespace App\Livewire\HrPortal;

use ID;
use App\Models\User;
use Livewire\Component;
use App\Models\Employee;
use Livewire\WithFileUploads;
use App\Mail\CreateMailEmployee;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Password;

class CreateEmployee extends Component
{
    public $sss_num;
    public $trainingsSeminars;
    public $index;
    public $active = 1;
    public $employeeRecord;
    public $files;

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
    public $files_link;

    public $religion;
    public $birth_place;
    public $address;
    public $permission;
    public $height;
    public $birth_date;
    public $employee_id;
    public $weight;
    public $civil_status;
    public $children= [];
    public $name_of_mother;
    public $start_of_employment;
    public $name_of_father;
    public $spouse;
    public $showConfirmation = false;
    public $step = 1;

    public $dateNow;

    public $message;

    public function mount(){
        try {
            $this->dateNow = now()->format('Y-m-d');
            $loggedInUser = auth()->user();
            $permissions = json_decode($loggedInUser->permissions, true);

            if (empty(array_intersect($permissions, [4, 61024]))) {
                throw new \Exception('Unauthorized Access');
            }
        } catch (\Exception $e) {
            // Log the exception for further investigation
            Log::channel('employee_info')->error('Failed to Access Create Employee: ' . $e->getMessage() . ' | ' . $loggedInUser->employee_id);
            $this->dispatch('trigger-error');
        }
    }

    public function addEmployee()
    {
        return redirect()->to(route('EmployeesTable'));
    }

    public function addEmployeeHistory()
    {
        $this->employeeHistory[] = ['name_of_company' => '', 'prev_position' => '', 'start_date' => '', 'end_date' => ''];
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
        'middle_name' => 'max:500',
        'last_name' => 'required|min:1|max:500',
        'nickname' => 'max:500',
        'gender' => 'required|in:Male,Female',
        'personal_email' => 'email:rfc,dns',
        'employee_email' => 'required|email:rfc,dns|unique:employees,employee_email',
        'home_address' => 'required|min:5|max:500',
        'provincial_address' => 'required|min:10|max:500',
        'age' => 'required|numeric|min:18|max:100',
        'birth_date' => ['required','date','date_format:Y-m-d','before:today'],
        'religion' => 'required|min:3|max:500',
        'civil_status' => 'required|in:Single,Married,Widowed,Divorced,Separated',
        'phone_number' => ['required','numeric','regex:/^09[0-9]{9}$/' ],
        'birth_place' => 'required|min:1|max:2024',
        'profile_summary' => 'required|min:1|max:500',
        'name_of_father' => 'required|min:1|max:500',
        'name_of_mother' => 'required|min:1|max:500',
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
        'files_link' => 'required|url',
        'files' => 'nullable|array|max:5',
        'files.*.name_of_file' => 'required|string|min:2|max:75',
        'files.*.completed' => 'nullable|boolean',
        'start_of_employment' => 'required|date',
        'current_position' => 'required|min:3|max:500',
        'permission' => ['required'],
        'department' => 'required|in:PEI,SL SEARCH,SL Temps,WESEARCH,PEI-Upskills',
        'inside_department' => 'required|in:HR and Admin,Recruitment,CXS,Overseas Recruitment,PEI/SL Temps DO-174,Corporate Accounting and Finance,Accounting Operations',
        'employee_type' => 'required|in:INTERNAL EMPLOYEE,PROBISIONARY,PROJECT BASED,RELIVER,INTERN,REGULAR,INDEPENDENT CONTRACTOR',
        'sss_num' => ['required', 'numeric',],
        'tin_num' => ['required', 'numeric',],
        'phic_num' => ['required', 'numeric', ],
        'hdmf_num' => ['required', 'numeric', ],
        'employee_id' => ['required',  'unique:employees,employee_id'],
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
        $this->files[] = ['name_of_file' => '', 'completed' =>''];
    }
    
    public function removeFile($index){
        unset($this->files[$index]);
        $this->files = array_values($this->files);
        $this->dispatch('update-files', [json_encode($this->files, true)]);
    }

    // public function updated($keys){
    //     dd($keys);
    // }


    public function submit()
    {
        foreach($this->rules as $rule => $validationRule){
            $this->validate([$rule => $validationRule]);
            $this->resetValidation();
        }

        $this->validate([
            'password' => [
                'required',
                'string',
                Password::min(8)
                    ->mixedCase()
                    ->numbers()
                    ->symbols()
                    ->uncompromised(),
            ],
        ]);

        $loggedInUser = auth()->user();

        try {
            DB::transaction(function () {
                // Generate a new Employee ID only if it is not set
                if (is_null($this->employee_id) || empty($this->employee_id)) {
                    $this->employee_id = $this->generateNewEmployeeId();
                }
    
                // Check if the Employee ID already exists
                if (Employee::where('employee_id', $this->employee_id)->exists()) {
                    $this->message = "Employee ID Already Created. Please Choose Another.";
                    $this->dispatch('trigger-employeeid-error'); 
                }
                
                $sanitized_department = str_replace('"', '', json_encode($this->department));
                $sanitized_inside_department = str_replace('"', '', json_encode($this->inside_department));
                $sanitized_employee_type = str_replace('"', '', json_encode($this->employee_type));
                $sanitized_gender = str_replace('"', '', json_encode($this->gender));
                $sanitized_performance = str_replace('"', '', json_encode($this->performance));
                $sanitized_start_of_employment = str_replace('"', '', json_encode($this->start_of_employment));
    
    
    
                $add_employee = new Employee();
                $add_employee->emergency_contact = json_encode($this->emergency_contact);
                $add_employee->employee_history = json_encode($this->employee_history);
    
                $add_employee->names_of_children = Crypt::encryptString(json_encode($this->names_of_children));
                $add_employee->sss_num = Crypt::encryptString($this->sss_num);
                $add_employee->tin_num = Crypt::encryptString($this->tin_num);
                $add_employee->phic_num = Crypt::encryptString($this->phic_num);
                $add_employee->hdmf_num = Crypt::encryptString($this->hdmf_num);
                
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
                        $add_employee->employee_history = $jsonEmployeeHistory;
                    } 
                } else {
                    $add_employee->employee_history = Null;
                }

                if($this->files){
                    foreach($this->files ?? [] as $Files){
                        $jsonFiles[] = [
                            'name_of_file' => $Files['name_of_file'],
                            'completed' => $Files['completed'],
        
                        ];
                    }
                    $jsonFiles = json_encode($jsonFiles ?? Null) ;
                    $add_employee->files = $jsonFiles;
                    // if($jsonFiles){
                    //     dd($jsonFiles);
                    // }
                } else {
                    $add_employee->files = Null;
                }



                $add_employee->files_link = $this->files_link;

                $add_employee->employee_id = $this->employee_id;
                $add_employee->first_name = $this->first_name;
                $add_employee->middle_name = $this->middle_name;
                $add_employee->last_name = $this->last_name;
                $add_employee->nickname = $this->nickname;
                $add_employee->department = $sanitized_department;
                $add_employee->inside_department = $sanitized_inside_department;
                $add_employee->employee_type = $sanitized_employee_type;
                $add_employee->home_address = $this->home_address;
                $add_employee->provincial_address = $this->provincial_address;
                $add_employee->phone_number = $this->phone_number;
                $add_employee->landline_number = $this->landline_number;
                $add_employee->employee_email = $this->employee_email;
                $add_employee->gender = $sanitized_gender;
                $add_employee->current_position = $this->current_position;
                $add_employee->profile_summary = $this->profile_summary;
                $add_employee->high_school_school = $this->high_school_school;
                $add_employee->high_school_date_graduated = $this->high_school_date_graduated;
                $add_employee->college_school = $this->college_school;
                $add_employee->college_course = $this->college_course;
                $add_employee->college_date_graduated = $this->college_date_graduated;
                $add_employee->vocational_school = $this->vocational_school;
                $add_employee->vocational_course = $this->vocational_course;
                $add_employee->vocational_date_graduated = $this->vocational_date_graduated;
                $add_employee->performance = json_encode($this->performance);
                $add_employee->trainings_seminars = json_encode($this->trainings_seminars);
                $add_employee->birth_date = $this->birth_date;
                $add_employee->religion = $this->religion;
                $add_employee->age = $this->age;
                $add_employee->start_of_employment =$sanitized_start_of_employment;
                $add_employee->active = $this->active;
                $add_employee->govt_professional_exam_taken = json_encode($this->govt_professional_exam_taken);
    
                $add_employee->personal_email = $this->personal_email;
                $add_employee->phone_number = $this->phone_number;
                $add_employee->birth_place = $this->birth_place;
                $add_employee->civil_status = $this->civil_status;
                $add_employee->name_of_mother = $this->name_of_mother;
                $add_employee->name_of_father = $this->name_of_father;
                $add_employee->spouse = $this->spouse;
                $formattedNamesString = '';
    
                foreach ($this->names_of_children as $name) {
                    $formattedNamesString .= 'Full Name: ' . $name . PHP_EOL;
                }
    
                // Convert the formatted array to a JSON-encoded string
                $formattedNamesString = rtrim($formattedNamesString, PHP_EOL);
    
                $add_employee->names_of_children = $formattedNamesString;

                $this->trainingsSeminars = $this->trainingsSeminars ?? [];
    
                // Prepare JSON array
                $jsongovttrainingsSeminars = [];
        
                foreach($this->trainingsSeminars as $TS) {
                    $jsongovttrainingsSeminars[] = [
                        'exam_name' => $TS['training_name'] ?? '', // Default to empty string if not set
                      // Default to empty string if not set
        
                    ];
                }
        
        
                $this->govtProfessionalExamTaken = $this->govtProfessionalExamTaken ?? [];
        
                // Prepare JSON array
                $jsongovtProfessionalExamTaken = [];
        
                foreach($this->govtProfessionalExamTaken as $GPE) {
                    $jsongovtProfessionalExamTaken[] = [
                        'exam_name' => $GPE['exam_name'] ?? '', // Default to empty string if not set
                        'exam_rating' => $GPE['exam_rating'] ?? '', // Default to empty string if not set
                      // Default to empty string if not set
        
                    ];
                }
        
                $this->emergencyContact = $this->emergencyContact ?? [];
        
                // Prepare JSON array
                $jsonEmergencyContact = [];
        
                foreach($this->emergencyContact ?? [] as $emergenC) {
                    $jsonEmergencyContact[] = [
                        'contact_person' => $emergenC['contact_person'], // Default to empty string if not set
                        'relationship' => $emergenC['relationship'], // Default to empty string if not set
                        'address' => $emergenC['address'], // Default to empty string if not set
                        'relationship' => $emergenC['cellphone_number'], // Default to empty string if not set
        
                    ];
                }
        
        
                // Encode the array to JSON
        
                $jsongovttrainingsSeminars = json_encode($jsongovttrainingsSeminars ?? ' ');
                $jsongovtProfessionalExamTaken = json_encode($jsongovtProfessionalExamTaken ?? ' ');
                $jsonEmergencyContact = json_encode($jsonEmergencyContact);
                // $this->dispatch('trigger-success'); 
    
                $loggedInUser = auth()->user();
    
                // Retrieve the existing employee's record
                $employeeRecord = Employee::select( 'employee_id', 'employee_email')
                ->where('employee_id', $loggedInUser->employee_id)
                ->first();
                $add_employee->save();
                $existing_user = User::where('email', $this->employee_email)->first();
                $existing_user = User::where('email', $this->employee_email)->first();
                if ($existing_user) {
                    // Update the existing user if needed
                    $existing_user->email = $this->employee_email;
                    $existing_user->employee_id = $this->employee_id;
                    $existing_user->password = Hash::make($this->password);
                     // Set a default password or prompt to change it later
                    // Update employee_id
                    $existing_user->save();
    
                } else {
                    // Create a new user if not found
                    $new_user = new User();
                    $new_user->email = $this->employee_email;
                    $new_user->employee_id = $this->employee_id; // Save employee_id
                    // Set additional fields as needed, such as name, password, role, etc.
                    $new_user->password = Hash::make($this->password); // Set a default password or prompt to change it later
                    $roles = json_encode($this->permission, true);
                    $new_user->permissions = $roles;
                    $new_user->save();
    
                }
                // Send an email to the existing employee
                $new_user = Employee::where('employee_id', $add_employee->employee_id)->select('employee_id', 'first_name')->first();

                // Assuming $add_employee is an instance of a new employee record or has an 'employee_email' property
                if (isset($add_employee->employee_email)) {
                Mail::to($add_employee->employee_email)->send(new CreateMailEmployee($new_user, $this->password));
                }
                // Assuming $add_employee is an instance of your employee model
                $this->message = "Employee Created | Employee ID: " . $add_employee->employee_id;
                $this->dispatch('trigger-success'); 
    
            });
    
            return $this->dispatch('trigger-reroute');


        } catch (\Exception $e) {
            // Log the exception for further investigation
            Log::channel('employee_info')->error('Failed to Create Employee: ' . $e->getMessage() . ' | ' . $loggedInUser->employee_id);
            $this->dispatch('trigger-error');
        }

    }


    // private function generateNewEmployeeId()
    // {
    //     // Get the latest employee_id from the database
    //     $latestEmployee = Employee::orderByRaw('LENGTH(employee_id) DESC, employee_id DESC')->first();

    //     // Start with the initial ID if no employees exist
    //     $initialId = 'SL-E-0001';

    //     if ($latestEmployee) {
    //         // Extract the numeric part of the latest employee ID
    //         $latestId = $latestEmployee->employee_id;
    //         $latestIdNumber = intval(substr($latestId, 3));

    //         // Increment the numeric part by 1
    //         $newIdNumber = $latestIdNumber + 1;

    //         // Format the new ID with leading zeros
    //         $newId = 'SLE' . str_pad($newIdNumber, 4, '0', STR_PAD_LEFT);
    //     } else {
    //         // If no employees exist, start with the initial ID
    //         $newId = $initialId;
    //     }

    //     return $newId;
    // }

    public function render()
    {
        try {
            $loggedInUser = auth()->user();
            $permissions = json_decode($loggedInUser->permissions, true);

            if (empty(array_intersect($permissions, [4, 61024]))) {
                throw new \Exception('Unauthorized Access');
            }
        } catch (\Exception $e) {
            // Log the exception for further investigation
            Log::channel('employee_info')->error('Failed to Access Create Employee: ' . $e->getMessage() . ' | ' . $loggedInUser->employee_id);
            $this->dispatch('trigger-error');
        }
        

        return view('livewire.hr-portal.create-employee')->layout('components.layouts.hr-navbar');
    }
}