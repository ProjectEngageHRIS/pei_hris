<?php

namespace App\Livewire\MyApprovals\ChangeInformation;

use Livewire\Component;
use App\Models\Employee;
use Livewire\WithFileUploads;
use App\Mail\ApproveChangeInfo;
use App\Models\ChangeInformation;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Auth\Access\AuthorizationException;

class ApproveChangeInformationForm extends Component
{
    use WithFileUploads;

    public $employee_id;
    public $first_name;
    public $middle_name;
    public $last_name;
    // public $age;
    public $gender;
    public $personal_email;
    public $phone;
    // public $birth_date;
    public $address;

    public $placeholder_first_name;
    public $placeholder_middle_name;
    public $placeholder_last_name;
    public $placeholder_age;
    public $placeholder_gender;
    public $placeholder_personal_email;
    public $placeholder_phone;
    public $placeholder_birth_date;
    public $placeholder_address;

    public $civil_status;
    public $religion;
    public $nickname;
    public $profile_summary;



    public $employee_history;
    public $employeeHistory;
    
    public $emp_image;
    public $emp_diploma = [];
    public $emp_tor = [];
    public $emp_cert_of_trainings_seminars = [];
    public $emp_auth_copy_of_csc_or_prc = [];
    public $emp_auth_copy_of_prc_board_rating  = [];
    public $emp_med_certif = [];
    public $emp_nbi_clearance = [];
    public $emp_psa_birth_certif = [];
    public $emp_psa_marriage_certif = [];
    public $emp_service_record_from_other_govt_agency = [];
    public $emp_approved_clearance_prev_employer = [];
    public $other_documents = [];

    public $index;
    public $status;

    public $form_id;

    public function mount($index){
        $this->index = $index;

        try {
            $changeInfoData = $this->editForm($index);
            // $this->authorize('update', [$leaverequest]);
            if(!$changeInfoData ){
                return redirect()->route('ApproveChangeInformationTable');
                // Abort with a 404 error
                abort(404);
            }
        } catch (AuthorizationException $e) {
            return redirect()->to(route('ApproveChangeInformationTable'));
        }

        $this->form_id = $changeInfoData->form_id;
        $this->status = $changeInfoData->status;
        $this->first_name = $changeInfoData->first_name;
        $this->middle_name = $changeInfoData->middle_name;
        $this->last_name = $changeInfoData->last_name;    
        // $this->age = number_format($changeInfoData->age, 0);
        $this->gender = $changeInfoData->gender;
        $this->personal_email = $changeInfoData->personal_email;
        $this->phone = $changeInfoData->phone;
        // $this->birth_date = $changeInfoData->birth_date;
        $this->address = $changeInfoData->address;
        $this->nickname = $changeInfoData->nickname;
        $this->civil_status = $changeInfoData->civil_status;
        $this->profile_summary = $changeInfoData->profile_summary;

    

        if($changeInfoData->employee_history != null){
            $this->employeeHistory = json_decode($changeInfoData->employee_history, true);
        }

        $this->emp_image = $changeInfoData->emp_image;
        $this->religion = $changeInfoData->religion ;



        // $this->placeholder_first_name = $changeInfoData->first_name;
        // $this->placeholder_middle_name = $changeInfoData->middle_name;
        // $this->placeholder_last_name = $changeInfoData->last_name;    
        // $this->placeholder_age = number_format($changeInfoData->age, 0);
        // $this->placeholder_gender = $changeInfoData->gender;
        // $this->placeholder_personal_email = $changeInfoData->personal_email;
        // $this->placeholder_phone = $changeInfoData->phone;
        // $this->placeholder_birth_date = $changeInfoData->birth_date;
        // $this->placeholder_address = $changeInfoData->address;


        // $this->emp_diploma = json_decode($changeInfoData->emp_diploma, true) ?? [];
        // $this->emp_tor = json_decode($changeInfoData->emp_tor, true) ?? [];
        // $this->emp_cert_of_trainings_seminars = json_decode($changeInfoData->emp_cert_of_trainings_seminars, true) ?? [];
        // $this->emp_auth_copy_of_csc_or_prc = json_decode($changeInfoData->emp_auth_copy_of_csc_or_prc, true) ?? [];
        // $this->emp_auth_copy_of_prc_board_rating = json_decode($changeInfoData->emp_auth_copy_of_prc_board_rating, true) ?? [];
        // $this->emp_med_certif = json_decode($changeInfoData->emp_med_certif, true) ?? [];
        // $this->emp_nbi_clearance = json_decode($changeInfoData->emp_nbi_clearance, true) ?? [];
        // $this->emp_psa_birth_certif = json_decode($changeInfoData->emp_psa_birth_certif, true) ?? [];
        // $this->emp_psa_marriage_certif = json_decode($changeInfoData->emp_psa_marriage_certif, true) ?? [];
        // $this->emp_service_record_from_other_govt_agency = json_decode($changeInfoData->emp_service_record_from_other_govt_agency, true) ?? [];
        // $this->emp_approved_clearance_prev_employer = json_decode($changeInfoData->emp_approved_clearance_prev_employer, true) ?? [];
        // $this->other_documents = json_decode($changeInfoData->other_documents, true)?? [];
        // dd($this->other_documents);
       
    }


    public function editForm($index){
        $loggedInUser = auth()->user();
        $role_ids = json_decode($loggedInUser->role_id, true);
        try {
            $changeInfoData =  ChangeInformation::where('uuid', $this->index)->first();
            
            try {
                if (empty(array_intersect($role_ids, [7, 8,61024]))) {
                    throw new \Exception('Unauthorized Access');
                }

            if(!$changeInfoData){
                return False;
            }
            return $changeInfoData ;
        } catch (\Exception $e) {
            // Log the exception for further investigation
            Log::channel('changeinforequests')->error('Failed to update Change Request: ' . $e->getMessage() . ' | ' . $loggedInUser);

            // Dispatch a failure event with an error message
            $this->dispatch('trigger-error');
        }
    }


    // private function generateRefNumber(){
    //      $characters = '0123456789';
    //      $randomNumber = '';
    //      for ($i = 0; $i < rand(10, 15); $i++) {
    //          $randomNumber .= $characters[rand(0, strlen($characters) - 1)];
    //      }
 
    //      // Get the current year
    //      $currentYear = date('Y');
 
    //      // Concatenate the date and random number
    //      $result = $currentYear . $randomNumber;
 
    //      return $result;
    //  }


    public function removeArrayImage($index, $request, $insideIndex = null){

        $requestName = str_replace(' ', '_', $request);
        $requestName = strtolower($requestName);

        if(isset($this->$requestName[$index]) && is_array($this->$requestName[$index])){
            unset($this->$requestName[$index][$insideIndex]);
            $this->$requestName[$index] = array_values($this->$requestName[$index]);
            if(empty($this->$requestName[$index])){
                unset($this->$requestName[$index]);
            }
        }
        else{
            unset($this->$requestName[$index]);
            $this->$requestName =  array_values($this->$requestName);
            $this->$requestName = array_filter($this->$requestName, function($value) {
                return $value !== null;
            });
            
        }

    }

    public function getImage($item){
        if($item){
            
        }
        $image = Storage::disk('local')->get($this->$item);
        return $image;
    }

    public function removeImage($item){
        $this->$item = null;
        // $this->$item = array_filter($this->$item);
    }
    
    public function getArrayImage($item, $index){
        $employee_id = auth()->user()->employee_id;
        $imageFile = Employee::where('employee_id', $employee_id)->first();
        $imageFile = json_decode($imageFile->$item, true); 
        return $imageFile[$index];
    }

    public function addEmployeeHistory(){
        $this->employeeHistory[] = ['name_of_company' => '', 'prev_position' => '', 'start_date' => '', 'end_date' => ''];
    }

    public function removeHistory($index){
        unset($this->employeeHistory[$index]);
        $this->employeeHistory = array_values($this->employeeHistory);
        $this->dispatch('update-employee-history', [json_encode($this->employeeHistory, true)]);
    }


    protected $rules = [
        'phone' => 'required|numeric',
        // 'age' => 'required|numeric|min:1|max:120',
        'gender' => 'required|in:Male,Female,M,F',
        // 'birth_date' => 'required|date',
        'personal_email' => 'required|email:rfc,dns',
        'address' => 'required|min:10|max:500',
        'employeeHistory' => 'nullable|array|max:5',
        'employeeHistory.*.name_of_company' => 'required|string|min:2|max:75',
        'employeeHistory.*.prev_position' => 'required|string|min:2|max:75',
        'employeeHistory.*.start_date' => 'required|date|before_or_equal:employeeHistory.*.end_date',
        'employeeHistory.*.end_date' => 'required|date|after_or_equal:employeeHistory.*.start_date',

        // 'emp_diploma' => 'nullable|array|min:1|max:3',
        // 'emp_diploma.*' => 'required',
        // 'emp_diploma.*.*' => 'mimes:jpg,png,pdf|extensions:jpg,png,pdf|max:5120',
        // 'emp_tor' => 'nullable|array|min:1|max:3',
        // 'emp_tor.*' => 'required',
        // 'emp_tor.*.*' => 'mimes:jpg,png,pdf|extensions:jpg,png,pdf|max:5120',
        // 'emp_cert_of_trainings_seminars' => 'nullable|array|max:3',
        // 'emp_cert_of_trainings_seminars.*' => 'required',
        // 'emp_cert_of_trainings_seminars.*.*' => 'mimes:jpg,png,pdf|extensions:jpg,png,pdf|max:5120',
        // 'emp_auth_copy_of_csc_or_prc' => 'nullable|array|min:1|max:3',
        // 'emp_auth_copy_of_csc_or_prc.*' => 'required',
        // 'emp_auth_copy_of_csc_or_prc.*.*' => 'mimes:jpg,png,pdf|extensions:jpg,png,pdf|max:5120',
        // 'emp_auth_copy_of_prc_board_rating' => 'nullable|array|min:1|max:3',
        // 'emp_auth_copy_of_prc_board_rating.*' => 'required',
        // 'emp_auth_copy_of_prc_board_rating.*.*' => 'mimes:jpg,png,pdf|extensions:jpg,png,pdf|max:5120',
        // 'emp_med_certif' => 'nullable|array|min:1|max:3',
        // 'emp_med_certif.*' => 'required',
        // 'emp_med_certif.*.*' => 'mimes:jpg,png,pdf|extensions:jpg,png,pdf|max:5120',
        // 'emp_nbi_clearance' => 'nullable|array|min:1|max:3',
        // 'emp_nbi_clearance.*' => 'required',
        // 'emp_nbi_clearance.*.*' => 'mimes:jpg,png,pdf|extensions:jpg,png,pdf|max:5120',
        // 'emp_psa_birth_certif' => 'nullable|array|min:1|max:3',
        // 'emp_psa_birth_certif.*' => 'required',
        // 'emp_psa_birth_certif.*.*' => 'mimes:jpg,png,pdf|extensions:jpg,png,pdf|max:5120',
        // 'emp_psa_marriage_certif' => 'nullable|array|min:1|max:3',
        // 'emp_psa_marriage_certif.*' => 'required',
        // 'emp_psa_marriage_certif.*.*' => 'mimes:jpg,png,pdf|extensions:jpg,png,pdf|max:5120',
        // 'emp_service_record_from_other_govt_agency' => 'nullable|array|min:1|max:3',
        // 'emp_service_record_from_other_govt_agency.*' => 'required',
        // 'emp_service_record_from_other_govt_agency.*.*' => 'mimes:jpg,png,pdf|extensions:jpg,png,pdf|max:5120',
        // 'emp_approved_clearance_prev_employer' => 'nullable|array|min:1|max:3',
        // 'emp_approved_clearance_prev_employer.*' => 'required',
        // 'emp_approved_clearance_prev_employer.*.*' => 'mimes:jpg,png,pdf|extensions:jpg,png,pdf|max:5120',
        // 'other_documents' => 'nullable|array|max:5',
        // 'other_documents.*' => 'required',
        // 'other_documents.*.*' => 'mimes:jpg,png,pdf|extensions:jpg,png,pdf|max:5120',
        
    ];


   
    public function changeStatus(){
        $loggedInUser = auth()->user();
        $role_ids = json_decode($loggedInUser->role_id, true);
        
        try {
            if (empty(array_intersect($role_ids, [7, 8,61024]))) {
                throw new \Exception('Unauthorized Access');
            }
            $changeInformationStatus = ChangeInformation::where('uuid', $this->index)->first();

            if(!$changeInformationStatus){
                throw new \Exception('No Change Request Record Found');
            }

            $employee = Employee::where('employee_id', $changeInformationStatus->employee_id)->first();

            if(!$employee){
                throw new \Exception('No Employee Record Found');
            }
            if($this->status == "Approved"){
                $employee->first_name = $this->first_name;
                $employee->middle_name = $this->middle_name;
                $employee->last_name = $this->last_name;
                $employee->civil_status = $this->civil_status;
                $employee->religion = $this->religion;
                $employee->nickname = $this->nickname;
    
                // $employee->age = $this->age;
                $employee->gender = $this->gender;
                $employee->personal_email = $this->personal_email;
                $employee->phone_number = $this->phone;
                $employee->home_address = $this->address;
    
    
                
                if($this->emp_image){
                    $this->validate(['emp_image' => 'nullable']);
                    $employee->emp_image = $changeInformationStatus->emp_image;
                }
    
                // $fileFields = [
                //     'emp_diploma',
                //     'emp_TOR',
                //     'emp_cert_of_trainings_seminars',
                //     'emp_auth_copy_of_csc_or_prc',
                //     'emp_auth_copy_of_prc_board_rating',
                //     'emp_med_certif',
                //     'emp_nbi_clearance',
                //     'emp_psa_birth_certif',
                //     'emp_psa_marriage_certif',
                //     'emp_service_record_from_other_govt_agency',
                //     'emp_approved_clearance_prev_employer',
                //     'other_documents'
                // ];
                
                
                // foreach ($fileFields as $field) {
                //     $fileNames = [];            
                //     $ctrField = count($this->$field) - 1 ;
                //     $ctr = 0;
                //     foreach($this->$field as $index => $item){
                //         $ctr += 1;
                //         if(is_null($item)){
                //         }
                //         else if(is_string($item)){
                //             // $fileNames[] = $item;
                //         }
                //         else{
                //             $this->resetValidation();
                //             if (!is_array($item) && !is_string($item)) {
                //                 $this->addError($field . '.' . $index, 'The' . $field . 'must be a string or an array.');
                //             }
                //         }
                //     }
                //     if(count($fileNames) > 0){
                //         $employee->$field = json_encode($fileNames, true);        
                //     } else{
    
                //     }
                // }
            
                
                foreach($this->employeeHistory as $history){
                    $jsonEmployeeHistory[] = [
                        'name_of_company' => $history['name_of_company'],
                        'prev_position' => $history['prev_position'],
                        'start_date' => $history['start_date'],
                        'end_date' => $history['end_date'],
                    ];
                }
    
                $jsonEmployeeHistory = json_encode($jsonEmployeeHistory);
    
                $employee->employee_history = $jsonEmployeeHistory;  
                
                // dd(base64_encode($changeInformationStatus->emp_photo));
                $updateData = [
                    'first_name' =>  $employee->first_name  ,
                    'middle_name' => $employee->middle_name,
                    'last_name' => $employee->last_name,
                    // 'age' =>  $employee->age,
                    'gender' => $employee->gender,
                    'civil_status' => $employee->civil_status,
                    'religion' => $employee->religion,
                    'phone_number'  => $employee->phone_number,
                    'birth_date' => $employee->birth_date,
                    'home_address' => $employee->home_address,
                    'nickname' => $employee->nickname,
                    'employee_history' => $employee->employee_history,
                    'emp_image' => $employee->emp_image,
                    // 'other_documents' => json_encode($employee->other_documents, true),
                    'updated_at' => now(),
                ];

                
                // $this->js("alert('Change Information Request Submitted!')"); 
    
                $jsonEmployeeHistory = json_encode($jsonEmployeeHistory ?? ' ') ;
    
                $employee->employee_history = $jsonEmployeeHistory;

                Employee::where('employee_id', $changeInformationStatus->employee_id)
                                    ->update($updateData);
            }
            $changeInformationStatus->update(['status' => $this->status,
                                              'updated_at' => now() ]);

            if ($employee && $employee->employee_email) {
                // Ensure you have a mailable class named StatusChangedMail
                Mail::to($employee->employee_email)->send(new ApproveChangeInfo($changeInformationStatus));
            }
                                                        
            $this->dispatch('trigger-success');

            // $employee->save();
    
            return redirect()->to(route('ApproveChangeInformationTable'));
        } catch (\Exception $e) {
            // Log the exception for further investigation
            Log::channel('changeinforequests')->error('Failed to update Change Request: ' . $e->getMessage() . ' | ' . $loggedInUser->employee_id);

            // Dispatch a failure event with an error message
            $this->dispatch('trigger-error');
        }

    }

    
    public function render()
    {
        return view('livewire.my-approvals.change-information.approve-change-information-form')->layout('components.layouts.hr-navbar');
    }
}
