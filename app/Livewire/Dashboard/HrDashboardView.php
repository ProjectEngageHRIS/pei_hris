<?php

namespace App\Livewire\Dashboard;
use Illuminate\Support\Facades\Crypt;
use Livewire\Component;
use App\Models\Employee;
use App\Models\User;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Livewire\Features\SupportPagination\WithoutUrlPagination;

class HrDashboardView extends Component
{

    use WithPagination, WithoutUrlPagination;
    public $sss_num;
    public $trainingsSeminars;
    public $index;
    public $password;
    public $currentStep = 1;
    public $totalSteps = 2; // Number of steps
    public $stepData = [];
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
    public $active;

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

    public $employeeTypesFilter = [
        'INTERNALS' => false,
        'OJT' => false,
        'PEI-CCS' => false,
        'RAPID' => false,
        'RAPIDMOBILITY' => false,
        'UPSKILLS' => false,
    ];

    public $insideDepartmentTypesFilter = [
        'HR AND ADMIN' => false,
        'Recruitment' => false,
        'CXS' => false,
        'Overseas Recruitment' => false,
        'PEI/SLTEMPSDO174' => false,
        'CAF' => false,
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



        $combinedCounts = Employee::select(
            DB::raw('COUNT(CASE WHEN employee_type = "Internals" THEN 1 END) as Internals'),
            DB::raw('COUNT(CASE WHEN employee_type = "OJT" THEN 1 END) as OJT'),
            DB::raw('COUNT(CASE WHEN employee_type = "PEI-CSS" THEN 1 END) as PEICSS'),
            DB::raw('COUNT(CASE WHEN employee_type = "RAPID" THEN 1 END) as RAPID'),
            DB::raw('COUNT(CASE WHEN employee_type = "RAPID MOBILITY" THEN 1 END) as RAPIDMOBILITY'),
            DB::raw('COUNT(CASE WHEN employee_type = "UPSKILLS" THEN 1 END) as UPSKILLS'),
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
            $combinedCounts->Internals ?? 0,
            $combinedCounts->OJT ?? 0,
            $combinedCounts->PEICSS ?? 0,
            $combinedCounts->RAPID ?? 0,
            $combinedCounts->RAPIDMOBILITY ?? 0,
            $combinedCounts->UPSKILLS ?? 0
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


            $loggedInUser = auth()->user();

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
            // $add_employee->active = $this->active;
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


            // Assuming $add_employee is an instance of your employee model
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
                // Set additional fields as needed, such as name, password, role, etc.
                $new_user->password = bcrypt('defaultpassword'); // Set a default password or prompt to change it later
                $new_user->save();
            }
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
        $this->js("alert('Employee Created!')");
        $this->showConfirmation = true;
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
        // dump($this->employeeTypesFilter);
        // sleep(3);

    // // Cache combined counts to avoid recalculating on every request
    // $combinedCounts = Cache::remember('employee_combined_counts', 60, function () {
    //     return Employee::select(
    //         DB::raw('COUNT(CASE WHEN employee_type = "Internals" THEN 1 END) as Internals'),
    //         DB::raw('COUNT(CASE WHEN employee_type = "OJT" THEN 1 END) as OJT'),
    //         DB::raw('COUNT(CASE WHEN employee_type = "PEI-CSS" THEN 1 END) as PEICSS'),
    //         DB::raw('COUNT(CASE WHEN employee_type = "RAPID" THEN 1 END) as RAPID'),
    //         DB::raw('COUNT(CASE WHEN employee_type = "RAPID MOBILITY" THEN 1 END) as RAPIDMOBILITY'),
    //         DB::raw('COUNT(CASE WHEN employee_type = "UPSKILLS" THEN 1 END) as UPSKILLS'),
    //         DB::raw('COUNT(CASE WHEN inside_department = "HR and Admin" THEN 1 END) as HRandAdmin'),
    //         DB::raw('COUNT(CASE WHEN inside_department = "Recruitment" THEN 1 END) as Recruitment'),
    //         DB::raw('COUNT(CASE WHEN inside_department = "CXS" THEN 1 END) as CXS'),
    //         DB::raw('COUNT(CASE WHEN inside_department = "Overseas Recruitment" THEN 1 END) as OverseasRecruitment'),
    //         DB::raw('COUNT(CASE WHEN inside_department = "PEI/SL Temps DO-174" THEN 1 END) as PEISLTemps'),
    //         DB::raw('COUNT(CASE WHEN inside_department = "Corporate Accounting and Finance" THEN 1 END) as CorporateAccounting'),
    //         DB::raw('COUNT(CASE WHEN inside_department = "Accounting Operations" THEN 1 END) as AccountingOperations'),
    //         DB::raw('COUNT(CASE WHEN department = "PEI" THEN 1 END) as PEI'),
    //         DB::raw('COUNT(CASE WHEN department = "SL SEARCH" THEN 1 END) SLSEARCH'),
    //         DB::raw('COUNT(CASE WHEN department = "SL TEMPS" THEN 1 END) as SLTEMPS'),
    //         DB::raw('COUNT(CASE WHEN department = "WESEARCH" THEN 1 END) as WESEARCH'),
    //         DB::raw('COUNT(CASE WHEN department = "PEI-UPSKILLS" THEN 1 END) as PEIUPSKILLS'),
    //         DB::raw('COUNT(CASE WHEN gender = "Male" THEN 1 END) as MALE'),
    //         DB::raw('COUNT(CASE WHEN gender = "Female" THEN 1 END) as FEMALE')
    //     )->first();
    // });

    // $this->employee_type = [
    //     $combinedCounts->Internals ?? 0,
    //     $combinedCounts->OJT ?? 0,
    //     $combinedCounts->PEICSS ?? 0,
    //     $combinedCounts->RAPID ?? 0,
    //     $combinedCounts->RAPIDMOBILITY ?? 0,
    //     $combinedCounts->UPSKILLS ?? 0,
    // ];

    // $this->inside_department = [
    //     $combinedCounts->HRandAdmin ?? 0,
    //     $combinedCounts->Recruitment ?? 0,
    //     $combinedCounts->CXS ?? 0,
    //     $combinedCounts->OverseasRecruitment ?? 0,
    //     $combinedCounts->PEISLTemps ?? 0,
    //     $combinedCounts->CorporateAccounting ?? 0,
    //     $combinedCounts->AccountingOperations ?? 0,
    // ];

    // $this->department = [
    //     $combinedCounts->PEI ?? 0,
    //     $combinedCounts->SLSEARCH ?? 0,
    //     $combinedCounts->SLTEMPS ?? 0,
    //     $combinedCounts->WESEARCH ?? 0,
    //     $combinedCounts->PEIUPSKILLS ?? 0,
    // ];

    // $this->gender = [
    //     $combinedCounts->MALE ?? 0,
    //     $combinedCounts->FEMALE ?? 0,
    // ];

        // $query = Employee::query()->select('employee_id',
        //                                     'first_name',
        //                                     'middle_name',
        //                                     'last_name',
        //                                     'department',
        //                                     'inside_department',
        //                                     'start_of_employment',
        //                                     'current_position',
        //                                     'employee_type');

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
            })->orderBy('created_at', 'desc')->paginate(5);
        } else {
            $results = $query->orderBy('created_at', 'desc')->paginate(5);
        }

        $results = $query->orderBy('created_at', 'desc')->paginate(5);

        return view('livewire.dashboard.hr-dashboard-view', [
            'EmployeeData' => $results,
        ])->layout('components.layouts.hr-navbar');

    }
}
