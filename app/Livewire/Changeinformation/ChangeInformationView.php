<?php

namespace App\Livewire\Changeinformation;

use Livewire\Component;
use App\Models\Employee;
use Livewire\WithFileUploads;
use App\Models\ChangeInformation;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Auth\Access\AuthorizationException;

class ChangeInformationView extends Component
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
        try {
            $changeInfoData =  ChangeInformation::where('uuid', $this->index)->first();
            
            if($changeInfoData->employee_id != $loggedInUser->employee_id){
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

    public function cancelRequest(){
        try {
            $employee_id = auth()->user()->employee_id;
            $data = ChangeInformation::where('uuid', $this->index)->first();
            if($data){
                if($data->employee_id == $employee_id){
                    $data->status = "Cancelled";
                    $data->cancelled_at = now();
                    $data->save();
                    $this->dispatch('triggerSuccess'); 
                }
            }

            $this->dispatch('trigger-success');
            return redirect()->to(route('LeaveRequestTable'));

        } catch (\Exception $e) {
            // Log the exception for further investigation
            Log::channel('leaverequests')->error('Failed to cancel Leave Request: ' . $e->getMessage());

            // Dispatch a failure event with an error message
            $this->dispatch('trigger-error');
            // Optionally, you could redirect the user to an error page or show an error message
            // return redirect()->back()->withErrors('Something went wrong. Please contact IT support.');
        }
    }

    
    public function render()
    {
        return view('livewire.changeinformation.change-information-view');
    }
}
