<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Employee;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use App\Models\Employeeinformation as empInformation;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Employeeinformation extends Component
{

    public $employeeRecord;
    public $employeeHistory;
    public $employeeImage;
    public $nickname;

    public $first_name;
    public $middle_name;
    public $last_name;
    public $profile_summary;
    public $gender;
    public $phone;
    public $civil_status;
    public $religion;
    public $birth_date;
    public $age;
    public $employee_email;
    public $address;
    public $department;
    public $employee_type;
    public $current_position;
    public $employee_id;

    public $hs_educational_history = [];
    public $college_educational_history = [];

    public $employee_performance;


    public $empDiploma;
    public $emp_tor;
    public $empCertOfTrainingsSeminars;
    public $empAuthCopyOfCscOrPrc;
    public $empAuthCopyOfPrcBoardRating;
    public $empMedCertif;
    public $empNBIClearance;
    public $empPSABirthCertif;
    public $empPSAMarriageCertif;
    public $empServiceRecordFromOtherGovtAgency;
    public $empApprovedClearancePrevEmployer;
    public $otherDocuments;
    
    public $departmentName;
    
    public $collegeName;

    public $filter = "Summary";
    public function mount(){
        $loggedInUser = auth()->user();
        $employee = Employee::where('employee_id', $loggedInUser->employee_id)->first(); // Replace $employee_id with the actual employee ID\
        
        $this->employeeImage = $employee->emp_image;
        // $departmentName = DB::table('departments')->where('department_id', $employee->department_id[0])->value('department_name');
        // $collegeName = DB::table('colleges')->where('college_id', $employee->college_id[0])->value('college_name');

        // $this->departmentName = $departmentName;
        // $this->collegeName = $collegeName;
        $this->nickname = $employee->nickname;
        // $this->employeeRecord = Employee::where('employee_id', $loggedInUser->employee_id)->first();
        $this->first_name = $employee->first_name;
        $this->middle_name = $employee->middle_name;
        $this->last_name = $employee->last_name;
        $this->profile_summary = $employee->profile_summary;
        $this->gender = $employee->gender;
        $this->phone = $employee->phone;
        $this->civil_status = $employee->civil_status;
        $this->religion = $employee->religion;
        $this->birth_date = $employee->birth_date;
        $this->age = $employee->age;
        $this->employee_email = $employee->employee_email;
        $this->address = $employee->address;
        $this->department = $employee->department;
        $this->employee_type = $employee->employee_type;
        $this->current_position = $employee->current_position;
        $this->employee_id = $employee->employee_id;

        $this->employee_performance = json_decode($employee->performance);
        $this->college_educational_history = ['school' => $employee->college_school  ?? 'N/A' , 'course' => $employee->college_course  ?? 'N/A' , 'year_graduated' => $employee->college_date_graduated  ?? 'N/A' ];

        $this->hs_educational_history = ['school' => $employee->high_school_school ?? 'N/A', 'course' => $employee->high_school_course  ?? 'N/A' , 'year_graduated' => $employee->high_school_date_graduated  ?? 'N/A' ];
        // $this->vocational_educational_history = ['school' => $employee->vocational_school ?? 'N/A', 'course' => $employee->vocational_course  ?? 'N/A' , 'year_graduated' => $employee->vocational_date_graduated  ?? 'N/A' ];


        $this->employeeImage = $employee->emp_image;
        $this->empDiploma = $employee->emp_diploma;
        $this->emp_tor = $employee->emp_tor;
        $this->empCertOfTrainingsSeminars = $employee->emp_cert_of_trainings_seminars;
        $this->empAuthCopyOfCscOrPrc = $employee->emp_auth_copy_of_csc_or_prc;
        $this->empAuthCopyOfPrcBoardRating = $employee->emp_auth_copy_of_prc_board_rating;
        $this->empMedCertif = $employee->emp_med_certif;
        $this->empNBIClearance = $employee->emp_nbi_clearance;
        $this->empPSABirthCertif = $employee->emp_psa_birth_certif;
        $this->empPSAMarriageCertif = $employee->emp_psa_marriage_certif;
        $this->empServiceRecordFromOtherGovtAgency = $employee->emp_service_record_from_other_govt_agency;
        $this->empApprovedClearancePrevEmployer = $employee->emp_approved_clearance_prev_employer;
        $this->otherDocuments = $employee->other_documents;

        if($employee->employee_history != null){
            $this->employeeHistory = json_decode($employee->employee_history);
        }
    }

    public function setTab($action){
        $this->filter = $action;
    }

    public function getImage(){
        $image = Storage::disk('local')->get($this->employeeImage);
        return $image;
    }

    // public function privateStorage(Media $media){
    //     return $media;
    // }

    // public function download($file, $index = 0){
    //     $employee_id = auth()->user()->employee_id;
    //     $employee = Employee::where('employee_id', $employee_id)->first(); // Replace $employee_id with the actual employee ID
    //     if($file == "photo"){
    //         return Storage::disk('public')->download($employee->emp_image);
    //     }
    //     else if ($file == "diploma"){
    //         $file = "emp_diploma";
    //         $imageFile = Employee::where('employee_id', $employee_id)->first();
    //         $imageFile = json_decode($imageFile->$file, true); 
    //         $fileName = "diploma.jpg";
    //         return Response::make(base64_decode($imageFile[$index]), 200, [
    //             'Content-Type' => 'image/jpeg',
    //             'Content-Disposition' => 'attachment; filename="'.$fileName.'"'
    //         ]);
    //     }
    //     else if ($file == "tor"){
    //         $file = "emp_tor";
    //         $imageFile = Employee::where('employee_id', $employee_id)->first();
    //         $imageFile = json_decode($imageFile->$file, true); 
    //         $fileName = "tor.jpg";
    //         return Response::make(base64_decode($imageFile[$index]), 200, [
    //             'Content-Type' => 'image/jpeg',
    //             'Content-Disposition' => 'attachment; filename="'.$fileName.'"'
    //         ]);
    //     }
    //     else if ($file == "certificate"){
    //         $file = "emp_cert_of_trainings_seminars";
    //         $imageFile = Employee::where('employee_id', $employee_id)->first();
    //         $imageFile = json_decode($imageFile->$file, true); 
    //         $fileName = "certificate.jpg";
    //         return Response::make(base64_decode($imageFile[$index]), 200, [
    //             'Content-Type' => 'image/jpeg',
    //             'Content-Disposition' => 'attachment; filename="'.$fileName.'"'
    //         ]);
    //     }
    //     else if ($file == "csc_eligibility"){
    //         $file = "emp_auth_copy_of_csc_or_prc";
    //         $imageFile = Employee::where('employee_id', $employee_id)->first();
    //         $imageFile = json_decode($imageFile->$file, true); 
    //         $fileName = "csc.jpg";
    //         return Response::make(base64_decode($imageFile[$index]), 200, [
    //             'Content-Type' => 'image/jpeg',
    //             'Content-Disposition' => 'attachment; filename="'.$fileName.'"'
    //         ]);
    //     }
    //     else if ($file == "prc_boardrating"){
    //         $file = "emp_auth_copy_of_prc_board_rating";
    //         $imageFile = Employee::where('employee_id', $employee_id)->first();
    //         $imageFile = json_decode($imageFile->$file, true); 
    //         $fileName = "Copy of CSC or PRC.jpg";
    //         return Response::make(base64_decode($imageFile[$index]), 200, [
    //             'Content-Type' => 'image/jpeg',
    //             'Content-Disposition' => 'attachment; filename="'.$fileName.'"'
    //         ]);
    //     }
    //     else if ($file == "med_cert"){
    //         $file = "emp_med_certif";
    //         $imageFile = Employee::where('employee_id', $employee_id)->first();
    //         $imageFile = json_decode($imageFile->$file, true); 
    //         $fileName = "Medical Certificate.jpg";
    //         return Response::make(base64_decode($imageFile[$index]), 200, [
    //             'Content-Type' => 'image/jpeg',
    //             'Content-Disposition' => 'attachment; filename="'.$fileName.'"'
    //         ]);
    //     }
    //     else if ($file == "nbi_clearance"){
    //         $file = "emp_nbi_clearance";
    //         $imageFile = Employee::where('employee_id', $employee_id)->first();
    //         $imageFile = json_decode($imageFile->$file, true); 
    //         $fileName = "Nbi Clearance.jpg";
    //         return Response::make(base64_decode($imageFile[$index]), 200, [
    //             'Content-Type' => 'image/jpeg',
    //             'Content-Disposition' => 'attachment; filename="'.$fileName.'"'
    //         ]);
    //     }
    //     else if ($file == "psa_birthcertificate"){
    //         $file = "emp_psa_birth_certif";
    //         $imageFile = Employee::where('employee_id', $employee_id)->first();
    //         $imageFile = json_decode($imageFile->$file, true); 
    //         $fileName = "PSA Birth Certificate.jpg";
    //         return Response::make(base64_decode($imageFile[$index]), 200, [
    //             'Content-Type' => 'image/jpeg',
    //             'Content-Disposition' => 'attachment; filename="'.$fileName.'"'
    //         ]);
    //     }
    //     else if ($file == "psa_marriagecertificate"){
    //         $file = "emp_psa_marriage_certif";
    //         $imageFile = Employee::where('employee_id', $employee_id)->first();
    //         $imageFile = json_decode($imageFile->$file, true); 
    //         $fileName = "PSA MArriage Certificate.jpg";
    //         return Response::make(base64_decode($imageFile[$index]), 200, [
    //             'Content-Type' => 'image/jpeg',
    //             'Content-Disposition' => 'attachment; filename="'.$fileName.'"'
    //         ]);
    //     }
    //     else if ($file == "service_record"){
    //         $file = "emp_service_record_from_other_govt_agency";
    //         $imageFile = Employee::where('employee_id', $employee_id)->first();
    //         $imageFile = json_decode($imageFile->$file, true); 
    //         $fileName = "Service Record.jpg";
    //         return Response::make(base64_decode($imageFile[$index]), 200, [
    //             'Content-Type' => 'image/jpeg',
    //             'Content-Disposition' => 'attachment; filename="'.$fileName.'"'
    //         ]);
    //     }
    //     else if ($file == "approved_clearance"){
    //         $file = "emp_approved_clearance_prev_employer";
    //         $imageFile = Employee::where('employee_id', $employee_id)->first();
    //         $imageFile = json_decode($imageFile->$file, true); 
    //         $fileName = "Approved Clearance.jpg";
    //         return Response::make(base64_decode($imageFile[$index]), 200, [
    //             'Content-Type' => 'image/jpeg',
    //             'Content-Disposition' => 'attachment; filename="'.$fileName.'"'
    //         ]);
    //     }
    //     else if ($file == 'other_documents'){
    //         $imageFile = Employee::where('employee_id', $employee_id)->first();
    //         $imageFile = json_decode($imageFile->$file, true); 
    //         $fileName = "Additional.jpg";
    //         return Response::make(base64_decode($imageFile[$index]), 200, [
    //             'Content-Type' => 'image/jpeg',
    //             'Content-Disposition' => 'attachment; filename="'.$fileName.'"'
    //         ]);
    //     }

    //     else{
    //         abort(404);
    //     }
    // }
    
    public function render()
    {
        
        // dd($this->records);
        return view('livewire.employeeinformation');
    }
}
