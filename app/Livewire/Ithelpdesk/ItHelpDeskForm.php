<?php

namespace App\Livewire\Ithelpdesk;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\Employee;
use App\Models\Ittickets;
use App\Mail\ItTicketRequest;
use Livewire\WithFileUploads;
use App\Mail\ItTicketsConfirmation;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class ItHelpDeskForm extends Component
{
    use WithFileUploads;
    
    // public $employeeRecord;
    public $date;
    public $first_name;
    public $middle_name;
    public $last_name;
    public $department_name;
    // public $employee_id;
    public $description;
    public $email;


    public function mount(){
        $loggedInUser = auth()->user();
        $employeeRecord = Employee::select('first_name', 'middle_name', 'last_name', 'department',  'employee_email')
                                    ->where('employee_id', $loggedInUser->employee_id)
                                    ->first(); 
        $this->first_name = $employeeRecord->first_name;
        $this->middle_name = $employeeRecord->middle_name;
        $this->last_name = $employeeRecord->last_name;
        $this->department_name = $employeeRecord->department;
        $this->email = $employeeRecord->employee_email;

    }

    // public function updated($keys){
    //     if(in_array($keys, ['inclusive_start_date', 'inclusive_end_date'])){
    //         $startDate = Carbon::parse($this->inclusive_start_date);
    //         $endDate = Carbon::parse($this->inclusive_end_date);
    //         $num_of_days_work_days_applied = $startDate->diffInDays($endDate);
    //         // $num_of_hours_work_days_applied = $startDate->diffInHours($endDate);
    //         $num_of_seconds_work_days_applied = $startDate->diffInMinutes($endDate);
    //         // dd($num_of_seconds_work_days_applied);
    //         if ($startDate->startOfDay() == $endDate->startOfDay()){
    //             // $conversionValues = [
    //             //     0.002, 0.004, 0.006, 0.008, 0.010, 0.012, 0.015, 0.017, 0.019, 0.021,
    //             //     0.023, 0.025, 0.027, 0.029, 0.031, 0.033, 0.035, 0.037, 0.040, 0.042,
    //             //     0.044, 0.046, 0.048, 0.050, 0.052, 0.054, 0.056, 0.058, 0.060, 0.062,
    //             //     0.065, 0.067, 0.069, 0.071, 0.073, 0.075, 0.077, 0.079, 0.081, 0.083,
    //             //     0.085, 0.087, 0.090, 0.092, 0.094, 0.096, 0.098, 0.100, 0.102, 0.104,
    //             //     0.106, 0.108, 0.110, 0.112, 0.115, 0.117, 0.119, 0.121, 0.123, 0.125,
    //             // ];
    //             $days = $num_of_seconds_work_days_applied / 60;
    //             if($days > 8){
    //                 $days = 8;
    //             }
    //             // dd($seconds, $num_of_seconds_work_days_applied);
    //             // $decimalPart = ($num_of_seconds_work_days_applied - floor($num_of_seconds_work_days_applied)) * 60;
    //             $hoursLeave = $days * 0.125;
                
    //             // $this->$num_of_days_work_days_applied = number_format($hoursLeave , 3);
    //             $this->num_of_days_work_days_applied = number_format($hoursLeave, 3);
    //         }
    //         else{
    //             $dividedValue = $num_of_seconds_work_days_applied / 1440;
    //             $this->num_of_days_work_days_applied = number_format($dividedValue, 3);
    //         }
    //     }

    // }

    // public function removeImage($item){
    //     $this->$item = null;
    // }

    // private function generateRefNumber(){
    //     $today = date('Ymd');

    //     $randomDigits = '';
    //     for ($i = 0; $i < 5; $i++) {
    //         $randomDigits .= random_int(0, 9); // More secure random number generation
    //     }
    //     // Combine the date and random digits
    //     $referenceNumber = $today . $randomDigits;
    //     return $referenceNumber;
    //  }


    
    protected $rules = [
        'description' => 'required|string|min:10|max:5120'
      ];
  
      protected $validationAttributes = [
          'description' => 'Concern Information'
      ];


    public function submit(){
        // foreach($this->rules as $rule => $validationRule){
        //     $this->validate([$rule => $validationRule]);
        //     $this->resetValidation();
        // }   
        try {
            $this->validate();
        
            $loggedInUser = auth()->user();
    
            $itticket = new Ittickets();
    
            $itticket->employee_id = $loggedInUser->employee_id;
            $itticket->status = "Pending";
            $itticket->description = $this->description;
            $itticket->save();
            
            $employeeRecord = Employee::select('first_name', 'middle_name', 'last_name', 'department',  'employee_email')
                ->where('employee_id', $loggedInUser->employee_id)
                ->first(); 
    
            // Mail::to($employeeRecord->employee_email)->send(new ItTicketsConfirmation($employeeRecord, $itticket));
    
            // $ItEmployee = Employee::where('employee_id', 'SLE0004')->first();
    
            // if ($ItEmployee) {
            //     Mail::to($ItEmployee->employee_email)->send(new ItTicketRequest($employeeRecord, $ItEmployee, $itticket));
            // } else {
            //     Log::error('IT email not found for employee_id SLE0004');
            //     $this->addError('email', 'IT email not found');
            // }
    
            $this->dispatch('trigger-success');
        
            return redirect()->to(route('ItHelpDeskTable'));
        } catch (\Exception $e) {

            $this->dispatch('trigger-error');

            // Log the exception for further investigation
            Log::channel('ittickets')->error('Failed to submit IT Concern: ' . $e->getMessage());

            // Dispatch a failure event with an error message
            $this->dispatch('triggerFailure', ['message' => 'Something went wrong. Please contact IT support.']);

            // Optionally, you could redirect the user to an error page or show an error message
            // return redirect()->back()->withErrors('Something went wrong. Please contact IT support.');
        }

    }

    public function render()
    {
        return view('livewire.ithelpdesk.it-help-desk-form')->extends('components.layouts.app');
    }

}
