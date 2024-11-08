<?php

namespace App\Livewire\Dashboard;

use App\Models\User;
use Livewire\Component;
use App\Models\Employee;
use App\Mail\CreateEmployee;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Livewire\Features\SupportPagination\WithoutUrlPagination;

class HrDashboardView extends Component
{

    use WithPagination, WithoutUrlPagination;
    public $sss_num;
    public $trainingsSeminars;
    public $index;
    public $active = 1;
    public $employeeRecord;
    public $password;
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

    public $loggedInUser;

    public $role_id;

    public $currentFormId;

    public $employeeTypesFilter = [
        'INDEPENDENT CONTRACTOR' => false,
        'INTERNAL EMPLOYEE' => false,
        'INTERN' => false,
        'PROBISIONARY' => false,
        'PROJECT BASED' => false,
        'REGULAR' => false,
        'RELIVER' => false,
        'OJT' => false,
    ];

    public $insideDepartmentTypesFilter = [
        'HR AND ADMIN' => false,
        'Recruitment' => false,
        'CXS' => false,
        'Overseas Recruitment' => false,
        'PEI/SL Temps DO-174' => false,
        'Corporate Accounting and Finance' => false,
        'ACCOUNTING ' => false,
    ];

    public $departmentTypesFilter = [
        'PEI' => false,
        'SLSEARCH' => false,
        'SLTEMPS' => false,
        'WESEARCH' => false,
        'PEI-UPSKILLS' => false,
    ];

    public $genderTypesFilter = [
        'MALE' => false,
        'FEMALE' => false,
    ];


    public $employeeTypeFilter;
    public $departmentTypeFilter;
    public $companyFilter;
    public $genderFilter;
    public $search;

    public $employee_role_id;

    public function clearAllFilters()
    {
        $this->employeeTypesFilter = [];
        $this->insideDepartmentTypesFilter = [];
        $this->departmentTypesFilter = [];
        $this->genderTypesFilter = [];
    }


    protected $rules = [
        'stepData.1.first_name' => 'required|string|max:255',
        'stepData.1.middle_name' => 'required|string',
        'stepData.1.last_name' => 'required|string|max:255',
        'stepData.1.gender' => 'required|string',
        'stepData.1.birth_date' => 'required|string',
        'stepData.1.birth_place' =>  'required|string',
        'stepData.1.height' =>  'required|string',
        'stepData.2.weight' =>  'required|string',
        'stepData.2.civil_status' =>  'required|string',
        'stepData.2.religion' =>  'required|string',



    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }


    public function placeholder(){
        return view('components.skeletons.hrdashboardskeleton');
    }

    public function mount(){

        $loggedInUser = auth()->user()->role_id;
        $this->employee_role_id = $loggedInUser;
        try {
            if(!in_array($loggedInUser, [2, 7, 8, 9, 10, 11, 12, 13, 61024])){
                throw new \Exception('Unauthorized Access');
            } 
            if(in_array($loggedInUser, [7, 8, 61024, 14])){
                $this->loggedInUser = True;
            }
        } catch (\Exception $e) {
            // Log the exception for further investigation
            Log::channel('hrdashboard')->error('Failed to View HR Dashboard Table: ' . $e->getMessage() . ' | ' . $loggedInUser );
            return redirect()->to(route('EmployeeDashboard'));
        }

        $this->active = $this->active == 1 ? true : false;

        $combinedCounts = Employee::select(
            DB::raw('COUNT(CASE WHEN employee_type = "INDEPENDENT CONTRACTOR" THEN 1 END) as IndenpendentContractor'),
            DB::raw('COUNT(CASE WHEN employee_type = "INTERNAL EMPLOYEE" THEN 1 END) as InternalEmployee'),
            DB::raw('COUNT(CASE WHEN employee_type = "INTERN" THEN 1 END) as Intern'),
            DB::raw('COUNT(CASE WHEN employee_type = "PROBISIONARY" THEN 1 END) as Probisionary'),
            DB::raw('COUNT(CASE WHEN employee_type = "PROJECT BASED" THEN 1 END) as ProjectBased'),
            DB::raw('COUNT(CASE WHEN employee_type = "REGULAR" THEN 1 END) as Regular'),
            DB::raw('COUNT(CASE WHEN employee_type = "RELIVER" THEN 1 END) as Reliver'),
            DB::raw('COUNT(CASE WHEN inside_department = "HR and Admin" THEN 1 END) as HRandAdmin'),
            DB::raw('COUNT(CASE WHEN inside_department = "Recruitment" THEN 1 END) as Recruitment'),
            DB::raw('COUNT(CASE WHEN inside_department = "CXS" THEN 1 END) as CXS'),
            DB::raw('COUNT(CASE WHEN inside_department = "Overseas Recruitment" THEN 1 END) as OverseasRecruitment'),
            DB::raw('COUNT(CASE WHEN inside_department = "PEI/SL Temps DO-174" THEN 1 END) as PEISLTemps'),
            DB::raw('COUNT(CASE WHEN inside_department = "Corporate Accounting and Finance" THEN 1 END) as CorporateAccounting'),
            DB::raw('COUNT(CASE WHEN inside_department = "Accounting Operations" THEN 1 END) as AccountingOperations'),
            DB::raw('COUNT(CASE WHEN department = "PEI" THEN 1 END) as PEI'),
            DB::raw('COUNT(CASE WHEN department = "SL SEARCH" THEN 1 END) SLSEARCH'),
            DB::raw('COUNT(CASE WHEN department = "SL TEMPS" THEN 1 END) as SLTEMPS'),
            DB::raw('COUNT(CASE WHEN department = "WESEARCH" THEN 1 END) as WESEARCH'),
            DB::raw('COUNT(CASE WHEN department = "PEI-UPSKILLS" THEN 1 END) as PEIUPSKILLS'),
            DB::raw('COUNT(CASE WHEN gender = "Male" THEN 1 END) as MALE'),
            DB::raw('COUNT(CASE WHEN gender = "Female" THEN 1 END) as FEMALE'),
        )->first();

        $this->employee_type = [
            $combinedCounts->IndenpendentContractor ?? 0,
            $combinedCounts->InternalEmployee ?? 0,
            $combinedCounts->Intern ?? 0,
            $combinedCounts->Probisionary ?? 0,
            $combinedCounts->ProjectBased ?? 0,
            $combinedCounts->InternalEmployee ?? 0,
            $combinedCounts->Regular ?? 0,
        ];

        $this->inside_department = [
            $combinedCounts->HRandAdmin ?? 0,
            $combinedCounts->Recruitment ?? 0,
            $combinedCounts->CXS ?? 0,
            $combinedCounts->OverseasRecruitment ?? 0,
            $combinedCounts->PEISLTemps ?? 0,
            $combinedCounts->CorporateAccounting ?? 0,
            $combinedCounts->AccountingOperations ?? 0
        ];

        $this->department = [
            $combinedCounts->PEI ?? 0,
            $combinedCounts->SLSEARCH ?? 0,
            $combinedCounts->SLTEMPS ?? 0,
            $combinedCounts->WESEARCH ?? 0,
            $combinedCounts->PEIUPSKILLS ?? 0,
        ];

        $this->gender = [
            $combinedCounts->MALE ?? 0,
            $combinedCounts->FEMALE ?? 0,
        ];


    }

    // public function search()
    // {
    //     $this->resetPage();
    // }

    // public function updatingSearch()
    // {
    //     $this->resetPage();
    // }

    public function addEmployee(){
        return redirect()->to(route('EmployeesTable'));
    }
    public function addEmployeeHistory(){
        $this->employeeHistory[] = ['name_of_company' => '', 'prev_position' => '', 'start_date' => '', 'end_date' => ''];
    }
    public function getImage($emp_image){
        if(!$emp_image){
            return null;
        }
        $image = Storage::disk('local')->get($emp_image);
        return $image;
    }

    public function changeStep($step)
    {
        $this->validateCurrentStep();

        if ($step <= $this->totalSteps && $step > 0) {
            $this->currentStep = $step;
        }
    }

    public function validateCurrentStep()
    {
        $stepRules = [];

        foreach ($this->rules as $key => $rule) {
            if (strpos($key, "stepData.{$this->currentStep}.") !== false) {
                $stepRules[$key] = $rule;
            }
        }

        $this->validate($stepRules);
    }

    public function deactivateEmployee(){
        $loggedInUser = auth()->user();
        try {
            if(!in_array($loggedInUser->role_id, [6, 7, 61024])){
                throw new \Exception('Unauthorized Access');
            }

            if(!$this->currentFormId){
                throw new \Exception('No Current Form ID');
            }

            $employee = Employee::where('employee_id', $this->currentFormId)->select('employee_id', 'active')->first();
            $employee->active = 0;
            $user = User::where('employee_id', $this->currentFormId)->select('banned_flag', 'employee_id')->first();
            $user->banned_flag = 1;
    
            $employee->save();
            $user->save();

            $this->dispatch('triggerDeactivateSuccess');

        } catch (\Exception $e) {
            // Log the exception for further investigation
            Log::channel('hrdashboard')->error('Failed to deactivate an Employee: ' . $e->getMessage() . ' | ' . $loggedInUser->employee_id);

            // Dispatch a failure event with an error message
            $this->dispatch('triggerDeactivateError');
        }
    }

    public function activateEmployee(){
        $loggedInUser = auth()->user();
        try {
            if(!in_array($loggedInUser->role_id, [6, 7, 61024])){
                throw new \Exception('Unauthorized Access');
            }

            if(!$this->currentFormId){
                throw new \Exception('No Current Form ID');
            }

            $employee = Employee::where('employee_id', $this->currentFormId)->select('employee_id', 'active')->first();
            $employee->active = 1;
            $user = User::where('employee_id', $this->currentFormId)->select('banned_flag', 'employee_id')->first();
            $user->banned_flag = 0;
    
            $employee->save();
            $user->save();

            $this->dispatch('triggerActivateSuccess');

        } catch (\Exception $e) {
            // Log the exception for further investigation
            Log::channel('hrdashboard')->error('Failed to activate an Employee: ' . $e->getMessage() . ' | ' . $loggedInUser->employee_id);

            // Dispatch a failure event with an error message
            $this->dispatch('triggerActivateError');
        }
    }

    // public function deleteEmployee(){
    //     $loggedInUser = auth()->user();
    
    //     try {
    //         // Check user authorization
    //         if (!in_array($loggedInUser->role_id, [6, 7, 61024])) {
    //             throw new \Exception('Unauthorized Access');
    //         }
    
    //         // Check if currentFormId is set
    //         if (!$this->currentFormId) {
    //             throw new \Exception('No Current Form ID');
    //         }
    
    //         // Start a database transaction
    //         DB::beginTransaction();
    
    //         // Find and delete the employee record
    //         $employee = Employee::where('employee_id', $this->currentFormId)->firstOrFail();
    //         $user = User::where('employee_id', $this->currentFormId)->firstOrFail();
    
    //         $employee->delete();
    //         $user->delete();
    
    //         // Commit the transaction
    //         DB::commit();
    
    //         // Dispatch success event
    //         $this->dispatch('triggerDeleteSuccess');
    
    //     } catch (ModelNotFoundException $e) {
    //         // Handle case where records are not found
    //         Log::channel('hrdashboard')->error('Employee or User not found: ' . $e->getMessage() . ' | Employee ID: ' . $this->currentFormId);
    //         $this->dispatch('triggerDeleteError');
    
    //     } catch (\Exception $e) {
    //         // Handle other exceptions
    //         Log::channel('hrdashboard')->error('Failed to delete Employee: ' . $e->getMessage() . ' | Employee ID: ' . $this->currentFormId . ' | User ID: ' . $loggedInUser->employee_id);
    //         DB::rollBack();
    //         $this->dispatch('triggerDeleteError');
    //     }
    // }


    public function submit()
    {
        DB::transaction(function () {
            if (is_null($this->employee_id) || empty($this->employee_id)) {
                $this->employee_id = $this->generateNewEmployeeId();
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

            $add_employee->names_of_children = Crypt::encrypt(json_encode($this->names_of_children));            $add_employee->sss_num = $this->sss_num;
            $add_employee->tin_num = $this->tin_num;
            $add_employee->phic_num = $this->phic_num;
            $add_employee->hdmf_num = $this->hdmf_num;



            $add_employee->employee_id = $this->employee_id;
            $add_employee->first_name = $this->first_name;
            $add_employee->middle_name = $this->middle_name;
            $add_employee->last_name = $this->last_name;
            $add_employee->nickname = $this->nickname;
            $add_employee->department = $sanitized_department;
            $add_employee->inside_department = $sanitized_inside_department;
            $add_employee->employee_type = $sanitized_employee_type;
            $this->home_address = "dadsd";
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
            $add_employee->height = $this->height;
            $add_employee->weight = $this->weight;
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
                $existing_user->employee_id = $this->employee_id; // Update employee_id
                $existing_user->save();
            } else {
                // Create a new user if not found
                $new_user = new User();
                $new_user->email = $this->employee_email;
                $new_user->employee_id = $this->employee_id; // Save employee_id
                $new_user->role_id = $this->role_id;
                // Set additional fields as needed, such as name, password, role, etc.
                $new_user->password = bcrypt('defaultpassword'); // Set a default password or prompt to change it later
                $new_user->save();
            }
// Send an email to the existing employee
$new_user = Employee::where('employee_id', '$add_employee->employee_id')->first();
// Assuming $add_employee is an instance of a new employee record or has an 'employee_email' property
if (isset($add_employee->employee_email)) {
  Mail::to($add_employee->employee_email)->send(new CreateEmployee($employeeRecord, $add_employee, $new_user));
}
            // Assuming $add_employee is an instance of your employee model

        });

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

        foreach($this->emergencyContact as $emergenC) {
            $jsonEmergencyContact[] = [
                'contact_person' => $emergenC['contact_person'] ?? '', // Default to empty string if not set
                'relationship' => $emergenC['relationship'] ?? '', // Default to empty string if not set
                'address' => $emergenC['address'] ?? '', // Default to empty string if not set
                'relationship' => $emergenC['cellphone_number'] ?? '', // Default to empty string if not set

            ];
        }

        $this->employeeHistory = $this->employeeHistory ?? [];

        $jsonEmployeeHistory = [];
        foreach($this->employeeHistory as $history){
            $jsonEmployeeHistory[] = [
                'name_of_company' => $history['name_of_company'],
                'prev_position' => $history['prev_position'],
                'start_date' => $history['start_date'],
                'end_date' => $history['end_date'],
            ];
        }
        // Encode the array to JSON

        $jsongovttrainingsSeminars = json_encode($jsongovttrainingsSeminars ?? ' ');
        $jsongovtProfessionalExamTaken = json_encode($jsongovtProfessionalExamTaken ?? ' ');
        $jsonEmployeeHistory = json_encode($jsonEmployeeHistory ?? ' ');
        $jsonEmergencyContact = json_encode($jsonEmergencyContact);



        $this->dispatch('triggerSuccess');
    }

    private function generateNewEmployeeId()
    {
        // Get the latest employee_id from the database
        $latestEmployee = Employee::orderByRaw('LENGTH(employee_id) DESC, employee_id DESC')->first();

        // Start with the initial ID if no employees exist
        $initialId = 'SLE00050';

        if ($latestEmployee) {
            // Extract the numeric part of the latest employee ID
            $latestId = $latestEmployee->employee_id;
            $latestIdNumber = intval(substr($latestId, 3));

            // Increment the numeric part by 1
            $newIdNumber = $latestIdNumber + 1;

            // Format the new ID with leading zeros
            $newId = 'SLE' . str_pad($newIdNumber, 5, '0', STR_PAD_LEFT);
        } else {
            // If no employees exist, start with the initial ID
            $newId = $initialId;
        }

        return $newId;
    }


    public function render()
    {

        $loggedInUser = auth()->user()->role_id;
        try {
            if(!in_array($loggedInUser, [2, 7, 8, 9, 10, 11, 12, 13, 61024])){
                throw new \Exception('Unauthorized Access');
            } 
            if(in_array($loggedInUser, [7, 8, 61024, 14,])){
                $this->loggedInUser = True;
            }
        } catch (\Exception $e) {
            // Log the exception for further investigation
            Log::channel('hrdashboard')->error('Failed to View HR Dashboard Table: ' . $e->getMessage() . ' | ' . $loggedInUser );
            return redirect()->to(route('EmployeeDashboard'));
        }

        $query = Employee::query();

        // Employee Type Filter
        $employeeTypes = array_filter(array_keys($this->employeeTypesFilter), function($key) {
            return $this->employeeTypesFilter[$key];
        });

        if (!empty($employeeTypes)) {
            $query->whereIn('employee_type', $employeeTypes);
        }

        // // Inside Department Filter
        $insideDepartmentTypes = array_filter(array_keys($this->insideDepartmentTypesFilter), function($key) {
            return $this->insideDepartmentTypesFilter[$key];
        });

        if (!empty($insideDepartmentTypes)) {
            $query->whereIn('inside_department', $insideDepartmentTypes);
        }
        // // dump($insideDepartmentTypes);

        // // Department Filter
        $departmentTypes = array_filter(array_keys($this->departmentTypesFilter), function($key) {
            return $this->departmentTypesFilter[$key];
        });

        if (!empty($departmentTypes)) {
            $query->whereIn('department', $departmentTypes);
        }

        // // Department Filter
        $genderTypes = array_filter(array_keys($this->genderTypesFilter), function($key) {
            return $this->genderTypesFilter[$key];
        });

        if (!empty($genderTypes)) {
            $query->whereIn('gender', $genderTypes);
        }


        if(strlen($this->search) >= 1){
            $searchTerms = explode(' ', $this->search);
            $results = $query->where(function ($q) use ($searchTerms) {
                foreach ($searchTerms as $term) {
                    $q->orWhere('first_name', 'like', '%' . $term . '%')
                      ->orWhere('last_name', 'like', '%' . $term . '%')
                      ->orWhere('department', 'like', '%' . $term . '%')
                      ->orWhere('current_position', 'like', '%' . $term . '%')
                      ->orWhere('employee_type', 'like', '%' . $term . '%')
                      ->orWhere('start_of_employment', 'like', '%' . $term . '%');
                }
            });
        }

        if($loggedInUser == 61024){
            $results = $query->orderBy('created_at', 'desc')->paginate(5);
        } else{
            $results = $query->orderBy('created_at', 'desc')->where('employee_id', '!=', 'SLEA9999')->paginate(5);
        }

        // $results = $query->orderBy('created_at', 'desc')->paginate(5);

        return view('livewire.dashboard.hr-dashboard-view', [
            'EmployeeData' => $results,
        ])->layout('components.layouts.hr-navbar');

    }
}
