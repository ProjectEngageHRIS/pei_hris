<?php

namespace App\Livewire\Hrtickets;

use Exception;
use Carbon\Carbon;
use Livewire\Component;
use App\Models\Employee;
use App\Models\Hrticket;
use App\Models\Leaverequest;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class HrTicketsForm extends Component
{
    use WithFileUploads;
    
    public $employeeRecord;
    public $date;
    public $first_name;
    public $middle_name;
    public $last_name;
    public $department_name;
    public $available_credits;
    public $current_position;
    public $salary;
    public $employee_email;

    public $employee_id;
    public $application_date;
    public $mode_of_application;
    public $type_of_leave_others;
    public $type_of_leave_sub_category;
    public $type_of_leave_description;
    public $num_of_days_work_days_applied;
    public $inclusive_start_date;
    public $inclusive_end_date;
    public $supervisor_email;
    public $commutation;
    public $commutation_signature_of_appli;
    public $total_earned_vaca;
    public $less_this_appli_vaca;
    public $balance_vaca;
    public $total_earned_sick;
    public $less_this_appli_sick;
    public $balance_sick;
    public $as_of_filling;
    public $auth_off_sig_a;
    public $status_description;
    public $auth_off_sig_b;
    public $days_with_pay;
    public $days_without_pay;
    public $others;
    public $disapprove_reason;
    public $auth_off_sig_c_and_d;
    public $reason;

    public $date_earned;
    public $earned_description;
    public $concerned_employee;
    public $type_of_ticket ;
    public $type_of_request;
    public $sub_type_of_request;
    public $purpose;
    public $type_of_hrconcern;

    # HMO
    public $request_link;

    #Payrol
    public $request_date;

    # Tools and Equipments
    public $condition_availability;

    # Performance Monitoring Request
    public $type_of_pe_hr_ops;
    public $account_client_hr_ops;

    # Request For Employees
    public $request_requested;

    # Certificate of Remittance
    public $request_assigned_request_others;
    public $request_assigned;
    public $remittance_request_others;

    # Messengerial
    public $messengerial_other_type;


    public $request_extra;

    public $type;

    public $employeeNames = [];

    public $supplies_request;

    public $request_others;

    public function mount($type = null){
        $this->type = $type;
        $loggedInUser = auth()->user();
        $employeeRecord = Employee::select('first_name', 'middle_name', 'last_name','employee_email', 'employee_id')
                                    ->where('employee_id', $loggedInUser->employee_id)
                                    ->first(); 
                          

        // $departmentName = DB::table('departments')->where('department_id', $employeeRecord->department_id[0])->value('department_name');
        $this->available_credits = $employeeRecord->vacation_credits + $employeeRecord->sick_credits;
        $this->employee_id = $employeeRecord->employee_id;
        $this->first_name = $employeeRecord->first_name;
        $this->middle_name = $employeeRecord->middle_name;
        $this->last_name = $employeeRecord->last_name;
        $this->department_name = $employeeRecord->department;
        $this->current_position = $employeeRecord->current_position;
        $this->salary = $employeeRecord->salary;
        $this->employee_email = $employeeRecord->employee_email;
        $this->available_credits = $employeeRecord->sick_credits + $employeeRecord->vacation_credits;
        $dateToday = Carbon::now()->toDateString();
        $this->date = $dateToday;
        $this->application_date = $dateToday;

        $this->supplies_request = ['ballpen_black' => "", 'ballpen_blue' => "", 'ballpen_red' => "", 'pencil' => "", 'highlighter' => "", 'permanent_marker' => "",
                                   'correction_tape' => "", 'l_green_exp_folder' => "", 's_green_exp_folder' => "", 'l_brown_exp_folder' => "", 's_brown_exp_folder' => "",
                                   'calculator' => "", 'binder_two' => "", 'binder_one_fourth' => "", 'binder_three_fourth' => "", 'l_metal_clips' => "",
                                   's_metal_clips' => "", 'stapler' => "", 'stapler_wire' => "", 'scotch_tape' => "", 'l_brown_envelope' => "",
                                   's_brown_envelope' => "", 'scissors' => "", 'post_it' => "", 'white_envelope' => "", 'white_folder' => "" ];

        if($type == "overtime"){
            $this->type_of_ticket = "HR Internal";
            $this->type_of_request = "HR";
            $this->sub_type_of_request = "Payroll-related Concerns";
            $this->type_of_hrconcern = "Overtime Pay";
            $this->request_date = $dateToday;
        } else if($type == "undertime"){
            $this->type_of_ticket = "HR Internal";
            $this->type_of_request = "HR";
            $this->sub_type_of_request = "Payroll-related Concerns";
            $this->type_of_hrconcern = "Deductions";
            $this->request_date = $dateToday;
        } else if($type == "adviceslip"){
            $this->type_of_ticket = "HR Internal";
            $this->type_of_request = "HR";
            $this->sub_type_of_request = "Payroll-related Concerns";
            $this->type_of_hrconcern = "Deductions";
            $this->request_date = $dateToday;
        } else if($type == "coe"){
            $this->type_of_ticket = "HR Internal";
            $this->type_of_request = "HR";
            $this->sub_type_of_request = "Certificate of Employment";
        } else if($type == "procurement"){
            $this->type_of_ticket = "HR Internal";
            $this->type_of_request = "Procurement";
        } else if($type == "internalcontrol"){
            $this->type_of_ticket = "Internal Control";
        }  else if($type == "requestmeeting"){
            $this->type_of_ticket = "HR Internal";
            $this->type_of_request = "HR";
            $this->sub_type_of_request = "Request for a Meeting";
            $employees = Employee::select('first_name', 'middle_name', 'last_name', 'employee_id')->get();
            foreach($employees as $employee){
                $fullName = $employee->first_name . ' ' .  $employee->middle_name . ' ' . $employee->last_name . ' | ' . $employee->employee_id;
                $this->employeeNames[] = $fullName;
            }
        } else if($type == "officeadmin"){
            $this->type_of_ticket = "HR Internal";
            $this->type_of_request = "Office Admin";

        } else{
            $employees = Employee::select('first_name', 'middle_name', 'last_name', 'employee_id')->get();

            foreach($employees as $employee){
                $fullName = $employee->first_name . ' ' .  $employee->middle_name . ' ' . $employee->last_name . ' | ' . $employee->employee_id;
                $this->employeeNames[] = $fullName;
            }
        }
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
    public function updated(){
        $this->resetErrorBag();
    }

    public function resetTypeOfRequest(){
        $this->reset(['type_of_request']);
    }

    public function resetSubTypeOfRequest(){
        $this->reset(['sub_type_of_request']);
    }

    
    public function removeImage($item){
        $this->$item = null;
    }

    private function generateRefNumber(){
        $today = date('Ymd');

        $randomDigits = '';
        for ($i = 0; $i < 5; $i++) {
            $randomDigits .= random_int(0, 9); // More secure random number generation
        }
        // Combine the date and random digits
        $referenceNumber = $today . $randomDigits;
        return $referenceNumber;
     }


    protected $rules = [
        'concerned_employee' => 'required|min:5|string',
        'type_of_ticket' => 'required|in:HR Internal,Internal Control,HR Operations,Overtime Form',
        // 'type_of_request' => 'required|in:HR,Office Admin,Procurement',
    ];

    protected $validationAttributes = [
        'mode_of_application' => 'Mode of Application',
        'type_of_leave_others' => 'Others',
        'type_of_leave_sub_category' => 'Sub Category',
        'type_of_leave_description' => 'Leave Description',
    ];


    public function submit(){
        // foreach($this->rules as $rule => $validationRule){
        //     $this->validate([$rule => $validationRule]);
        //     $this->resetValidation();
        // }   

        // if (in_array($this->type_of_leave, ['Vacation Leave', 'Mandatory/Forced Leave', 'Sick Leave'])) {
        //     $this->validate(['num_of_days_work_days_applied' => 'required|lte:available_credits',]);
        // }

        // dd($this->supplies_request);

        # HR
        // $test = Hrticket::max('purpose');
        if($this->type_of_ticket == "HR Internal"){
            if($this->type_of_request == "HR"){
                if($this->sub_type_of_request == "Certificate of Employment"){
                    $this->validate([
                        'purpose' => 'required|min:1|max:5000|string', 
                        'type_of_hrconcern' => 'required|in:Without Compensation,With Compensation'
                    ], [
                        'purpose.required' => 'The Purpose Field Is Required.',
                        'purpose.max' => 'The Purpose May Not Be Greater Than 5000 Characters.',
                        'purpose.string' => 'The Purpose Must Be A String.',
                        'type_of_hrconcern.required' => 'The Commutation Field Is Required.',
                        'type_of_hrconcern.in' => 'The Selected Commutation Is Invalid.',
                    ]);
                    
                } else if( $this->sub_type_of_request == "Request for Consultation"){
                    $this->validate([
                        'purpose' => 'required|min:1|max:5000|string', 
                        'type_of_hrconcern' => 'required|in:High (Urgent),Medium (Within the day),Low (Can be attended the next day)'
                    ], [
                        'purpose.required' => 'The Purpose Field Is Required.',
                        'purpose.max' => 'The Purpose May Not Exceed 50,000 Characters.',
                        'purpose.string' => 'The Purpose Must Be A Text String.',
                        'type_of_hrconcern.required' => 'The Type of Consultation Request Field Is Required.',
                        'type_of_hrconcern.in' => 'The Selected Type of Consultation Request is Invalid.',
                    ]);
                }
                else if($this->sub_type_of_request == "HMO-related Concerns"){
                    $this->validate([
                        'purpose' => 'required|min:1|max:5000|string', 
                        'type_of_hrconcern' => 'required|in:Availment of Service,Card Replacement,Reimbursement,Request for Enrollment,Request for Deletion',
                        'request_link' => 'required|url:https'
                    ], [
                        'purpose.required' => 'The HMO Concern Description Is Required.',
                        'purpose.max' => 'The HMO Concern Description May Not Exceed 50,000 Characters.',
                        'purpose.string' => 'The HMO Concern Description Must Be Text.',
                        
                        'type_of_hrconcern.required' => 'The Type Of HMO Concern Is Required.',
                        'type_of_hrconcern.in' => 'The Selected Type Of HMO Concern Is Invalid.',
                        
                        'request_link.required' => 'The HMO Concern Link Is Required.',
                        'request_link.url' => 'The HMO Concern Link Must Be A Valid Link.',
                    ]);
                    
                } else if($this->sub_type_of_request == "Leave Concerns"){
                    $this->validate([
                        'purpose' => 'required|min:1|max:5000|string', 
                        'type_of_hrconcern' => 'required|in:Leave Credits,Changes on Filed Leaves,Cancellation of Leaves',
                        'request_link' => 'required|url'
                    ], [
                        'purpose.required' => 'The Leave Concern Description Is Required.',
                        'purpose.max' => 'The Leave Concern Description May Not Exceed 50,000 Characters.',
                        'purpose.string' => 'The Leave Concern Description Must Be Text.',
                    
                        'type_of_hrconcern.required' => 'The Type Of Leave Request Is Required.',
                        'type_of_hrconcern.in' => 'The Selected Type Of Leave Request Is Invalid.',
                    
                        'request_link.required' => 'The Leave Concern Link Is Required.',
                        'request_link.url' => 'The Leave Concern Link Must Be A Valid Link.',
                    ]);
                }
                else if($this->sub_type_of_request == "Payroll-related Concerns"){
                    $this->validate([
                        'request_date' => 'required|date',
                        'purpose' => 'required|min:1|max:5000|string', 
                        'type_of_hrconcern' => 'required|in:Overtime Pay,Holiday Pay,Deductions,Others,Request for Deletion',
                        'request_link' => 'required|url'
                    ], [
                        'request_date.required' => 'The Payroll Date Is Required.',
                        'request_date.date' => 'The Payroll Date Must Be A Valid Date.',
                    
                        'purpose.required' => 'The Payroll Concern Description Is Required.',
                        'purpose.max' => 'The Payroll Concern Description May Not Exceed 50,000 Characters.',
                        'purpose.string' => 'The Payroll Concern Description Must Be Text.',
                    
                        'type_of_hrconcern.required' => 'The Type Of Payroll Concern Is Required.',
                        'type_of_hrconcern.in' => 'The Selected Type Of Payroll Concern Is Invalid.',
                    
                        'request_link.required' => 'The Payroll Concern Link Is Required.',
                        'request_link.url' => 'The Payroll Concern Link Must Be A Valid URL.',
                    ]);
                    
                }   
                else if($this->sub_type_of_request == "Request for a Meeting"){
                    $this->validate([
                        'request_date' => 'required|date',
                        'purpose' => 'required|min:1|max:5000|string', 
                        'request_requested' => 'required'
                    ], [
                        'request_date.required' => 'The Date of Meeting Is Required.',
                        'request_date.date' => 'The Date of Meeting Must Be A Valid Date.',
                    
                        'purpose.required' => 'The Purpose of Meeting Is Required.',
                        'purpose.max' => 'The Purpose of Meeting May Not Exceed 50,000 Characters.',
                        'purpose.string' => 'The Purpose of Meeting Must Be Text.',
                    
                        'request_requested.required' => 'The Target Person Is Required.'
                    ]);
                }
            }
            else if($this->type_of_request == "Office Admin"){
                if($this->sub_type_of_request == "Certificate of Remittances"){
                    if($this->type_of_hrconcern == "Others"){
                        $this->validate([
                            'remittance_request_others' => 'required|string|min:1',
                        ], [
                            'remittance_request_others.required' => 'The Other Type of Remittance Certificate Is Required.',
                            'remittance_request_others.string' => 'The Other Type of Remittance Certificate Must Be a String.',
                            'remittance_request_others.min' => 'The Other Type of Remittance Certificate Must Be At Least 1 Characters.'
                        ]);
                    } else {
                        $this->validate([
                            'type_of_hrconcern' => 'required|in:SSS,PHILHEALTH,HDMF,Others'
                        ], [
                            'type_of_hrconcern.required' => 'The Type of Remittance Certificate Is Required.',
                            'type_of_hrconcern.in' => 'The Selected Type of Remittance Certificate Is Invalid.'
                        ]);
                        
                    }
                    if($this->request_assigned == "Others"){
                        $this->validate([
                            'request_assigned_request_other' => 'required|string|min:1'
                        ], [
                            'request_assigned_request_other.required' => 'The Other Type of Account Assigned field is required.',
                            'request_assigned_request_other.min' => 'The Other Type of Account Assigned must be at least 1 characters.',
                            'request_assigned_request_other.string' => 'The Other Type of Account Assigned must be a valid text.'
                        ]);
                    } else {
                        $this->validate([
                            'request_assigned' => 'required|in:PEI,SL TEMPS,SL SEARCH,WESEARCH,Others'
                        ], [
                            'request_assigned.required' => 'The Account Assigned field is required.',
                            'request_assigned.in' => 'The selected Account Assigned option is invalid.'
                        ]);
                        
                    }
                    $this->validate([
                        'request_date' => 'required|date',
                        'purpose' => 'required|min:1|max:5000|string'
                    ], [
                        'request_date.required' => 'The Date Start field is required.',
                        'request_date.date' => 'The Date Start must be a valid date.',
                        'purpose.required' => 'The Purpose field is required.',
                        'purpose.max' => 'The Purpose may not be greater than 5000 characters.',
                        'purpose.string' => 'The Purpose must be a string.'
                    ]);
                }
                else if($this->sub_type_of_request == "Government-Mandated Benefits Concern"){
                    $this->validate([
                        'type_of_hrconcern' => 'required|in:Send Document,Pick-Up Document,Collections,Others,SSS Salary Loan for Approval,SSS Calamity Loan for Approval,PAG-IBIG Multi-Purpose Loan for Approval,SSS Maternity Notification,SSS Sickness Notification,Issuance of TIN Number,SSS R1A',
                        'request_link' => 'required|url:https'
                    ], [
                        'type_of_hrconcern.required' => 'The Type Of GMR Concern Field Is Required.',
                        'type_of_hrconcern.in' => 'The Selected Type Of GMR Concern Is Invalid.',
                        'request_link.required' => 'The GMR Concern Link Field Is Required.',
                        'request_link.url' => 'The GMR Concern Link Must Be A Valid URL.'
                    ],);
                    
                }
                else if($this->sub_type_of_request == "Messengerial"){
                    if($this->type_of_hrconcern == "Others"){
                        $this->validate([
                            'messengerial_other_type' => 'required|string|min:1'
                        ], [
                            'messengerial_other_type.required' => 'The Other Type Of Messengerial Request Field Is Required.',
                            'messengerial_other_type.min' => 'The Other Type Of Messengerial Request Must Be At Least 1 Characters.'
                        ],);
                    } else {
                        $this->validate([
                            'type_of_hrconcern' => 'required|in:Send Document,Pick-Up Document,Collections,Others'
                        ], [
                            'type_of_hrconcern.required' => 'The Type Of Messengerial Request Field Is Required.',
                            'type_of_hrconcern.in' => 'The Selected Type Of Messengerial Request Is Invalid.'
                        ],);
                        
                    }

                    $this->validate([
                        'request_requested' => 'required|string|min:1',
                        'request_assigned' => 'required|string|min:1',
                        'request_extra' => 'required|string|min:1',
                        'request_date' => 'required|date',
                    ], [
                        'request_requested.required' => 'The Company Field Is Required.',
                        'request_requested.string' => 'The Company Must Be A String.',
                        'request_requested.min' => 'The Company Must Be At Least 1 Characters.',
                        
                        'request_assigned.required' => 'The Contact Person Field Is Required.',
                        'request_assigned.string' => 'The Contact Person Must Be A String.',
                        'request_assigned.min' => 'The Contact Person Must Be At Least 1 Characters.',
                        
                        'request_extra.required' => 'The Address Of Messengerial Destination Field Is Required.',
                        'request_extra.string' => 'The Address Of Messengerial Destination Must Be A String.',
                        'request_extra.min' => 'The Address Of Messengerial Destination Must Be At Least 1 Characters.',
                        
                        'request_date.required' => 'The Date Of Messengerial Pick Up Or Send Off Field Is Required.',
                        'request_date.date' => 'The Date Of Messengerial Pick Up Or Send Off Must Be A Valid Date.'
                    ]);

                }
                else if($this->sub_type_of_request == "Repairs/Maintenance"){
                    $this->validate([
                        'type_of_hrconcern' => 'required|in:Electrical,Plumbing,HVAC,Structural,Safety Concerns,Equipment/Machinery,Environmental,Accessibility,General Maintenance,Security,Others',
                        'purpose' => 'required|max:5000|string',
                    ], [
                        'type_of_hrconcern.required' => 'The Type Of Repairs And Maintenance Request Field Is Required.',
                        'type_of_hrconcern.in' => 'The Selected Type Of Repairs And Maintenance Request Is Invalid.',
                    
                        'purpose.required' => 'The Concerned Area Field Is Required.',
                        'purpose.max' => 'The Concerned Area May Not Be Greater Than 5000 Characters.',
                        'purpose.string' => 'The Concerned Area Must Be A String.',
                    ]);
                    
                }  
                else if($this->sub_type_of_request == "Book a Car"){
                    $this->validate([
                        'request_date' => 'required|date',
                        'request_requested' => 'required|date',
                        'account_client_hr_ops' => 'required|string|min:10',
                        'purpose' => 'required|max:5000|string',
                    ], [
                        'request_date.required' => 'The Date And Time Of Departure Field Is Required.',
                        'request_date.date' => 'The Date And Time Of Departure Must Be A Valid Date.',
                    
                        'request_requested.required' => 'The Date And Time Of Pick-Up Field Is Required.',
                        'request_requested.date' => 'The Date And Time Of Pick-Up Must Be A Valid Date.',
                    
                        'account_client_hr_ops.required' => 'The Passenger/s Name Field Is Required.',
                        'account_client_hr_ops.string' => 'The Passenger/s Name Must Be A String.',
                        'account_client_hr_ops.min' => 'The Passenger/s Name Must Be At Least 10 Characters.',
                    
                        'purpose.required' => 'The Address Of Destination Field Is Required.',
                        'purpose.max' => 'The Address Of Destination May Not Be Greater Than 5000 Characters.',
                        'purpose.string' => 'The Address Of Destination Must Be A String.',
                    ]);
                }
                else if($this->sub_type_of_request == "Book a Meeting Room"){
                    $this->validate([
                        'request_date' => 'required|date',
                        'request_requested' => 'required|date',
                        'type_of_hrconcern' => 'required|in:Training Room,Villa Office',
                        'purpose' => 'required|max:5000|string',
                    ], [
                        'request_date.required' => 'The Start Date Field Is Required.',
                        'request_date.date' => 'The Start Date Must Be A Valid Date.',
                    
                        'request_requested.required' => 'The End Date Field Is Required.',
                        'request_requested.date' => 'The End Date Must Be A Valid Date.',
                    
                        'type_of_hrconcern.required' => 'The Type Of Room Field Is Required.',
                        'type_of_hrconcern.in' => 'The Selected Type Of Room Is Invalid.',
                    
                        'purpose.required' => 'The Purpose Of Booking Field Is Required.',
                        'purpose.max' => 'The Purpose Of Booking May Not Be Greater Than 5000 Characters.',
                        'purpose.string' => 'The Purpose Of Booking Must Be A String.',
                    ]);
                    
                }
                else if($this->sub_type_of_request == "Office Supplies"){
                    $this->validate([
                        'supplies_request' => function ($attribute, $value, $fail) {
                            $hasFilled = false;
                            $hasNegativeAndZero = false;
                            foreach ($this->supplies_request as $supply => $quantity) {
                                if (!empty($quantity) && $quantity > 0) {
                                    $hasFilled = true;
                                    break;
                                } 
                            }
                    
                            if (!$hasFilled) {
                                $fail('At Least One Supply request Must Be Filled and Must be greater than 1');
                            } 
                        },
                    ]);
                }
            }
            else if($this->type_of_request == "Procurement"){
                if($this->sub_type_of_request == "Request for Quotation"){
                    $this->validate([
                        'type_of_hrconcern' => 'required|min:1|string',
                        'purpose' => 'required|max:5000|string',
                        'request_link' => 'required|url:https',
                    ], [
                        'type_of_hrconcern.required' => 'The Quotation Specifications Field Is Required.',
                        'type_of_hrconcern.min' => 'The Quotation Specifications Must Be At Least 1 Character.',
                        'type_of_hrconcern.string' => 'The Quotation Specifications Must Be A String.',
                    
                        'purpose.required' => 'The Purpose Of Request Field Is Required.',
                        'purpose.max' => 'The Purpose Of Request May Not Be Greater Than 50,000 Characters.',
                        'purpose.string' => 'The Purpose Of Request Must Be A String.',
                    
                        'request_link.required' => 'The Quotation Concern Link Field Is Required.',
                        'request_link.url' => 'The Quotation Concern Link Must Be A Valid URL.',
                    ]);
                    
                }
                else if($this->sub_type_of_request == "Request to Buy/Book/Avail Service"){
                    $this->validate([
                        'type_of_hrconcern' => 'required|min:10|string',
                        'purpose' => 'required|max:5000|string',
                        'request_link' => 'required|url:https',
                    ], [
                        'type_of_hrconcern.required' => 'The Product/Service Specifications Field Is Required.',
                        'type_of_hrconcern.min' => 'The Product/Service Specifications Must Be At Least 10 Characters.',
                        'type_of_hrconcern.string' => 'The Product/Service Specifications Must Be A String.',
                    
                        'purpose.required' => 'The Purpose Of Request Field Is Required.',
                        'purpose.max' => 'The Purpose Of Request May Not Be Greater Than 50,000 Characters.',
                        'purpose.string' => 'The Purpose Of Request Must Be A String.',
                    
                        'request_link.required' => 'The Service Concern Link Field Is Required.',
                        'request_link.url' => 'The Service Concern Link Must Be A Valid URL.',
                    ]);
                    
                }
            }
        }

        # Internal Control
        else if($this->type_of_ticket == "Internal Control"){
            if($this->type_of_request == "Reimbursements"){
                $this->validate([
                    'request_date' => 'required|date',
                    'purpose' => 'required|max:5000|string',
                    'request_link' => 'required|url:https',
                ], [
                    'request_date.required' => 'The Cut-Off Date Field Is Required.',
                    'request_date.date' => 'The Cut-Off Date Must Be A Valid Date.',
                
                    'purpose.required' => 'The Reimbursement Description Field Is Required.',
                    'purpose.max' => 'The Reimbursement Description May Not Be Greater Than 50,000 Characters.',
                    'purpose.string' => 'The Reimbursement Description Must Be A String.',
                
                    'request_link.required' => 'The Reimbursement Concern Link Field Is Required.',
                    'request_link.url' => 'The Reimbursement Concern Link Must Be A Valid URL.',
                ]);
                
            }
            else if($this->type_of_request == "Tools and Equipment"){
                $this->validate([
                    'condition_availability' => 'required|in:New,Old/Existing Unit',
                    'type_of_hrconcern' => 'required|in:Laptop,Printer,Monitor,Mouse,Laptop Charger / Adapter,Keyboard,LAN Dangle,HDMI to LAN Converter,Numeric Keypad,Extension Cord,Others',
                ], [
                    'condition_availability.required' => 'The Condition/Availability Field Is Required.',
                    'condition_availability.in' => 'The Selected Condition/Availability Is Invalid.',
                
                    'type_of_hrconcern.required' => 'The Equipment Type Field Is Required.',
                    'type_of_hrconcern.in' => 'The Selected Equipment Type Is Invalid.',
                ]);
                
            }
            else if($this->type_of_request == "Cash Advance"){
                $this->validate([
                    'request_date' => 'required|date',
                    'request_link' => 'required|url',
                ], [
                    'request_date.required' => 'The Date of Cash Advance Request Field Is Required.',
                    'request_date.date' => 'The Date of Cash Advance Request Must Be A Valid Date.',
                
                    'request_link.required' => 'The Cash Advance Concern Link Field Is Required.',
                    'request_link.url' => 'The Cash Advance Concern Link Must Be A Valid URL.',
                ]);
                
            }
            else if($this->type_of_request == "Liquidation"){
                $this->validate([
                    'purpose' => 'required|max:5000|string',
                    'request_link' => 'required|url',
                ], [
                    'purpose.required' => 'The Liquidation Coverage Field Is Required.',
                    'purpose.max' => 'The Liquidation Coverage May Not Be Greater Than 5000 Characters.',
                    'purpose.string' => 'The Liquidation Coverage Must Be A String.',
                
                    'request_link.required' => 'The Liquidation Concern Link Field Is Required.',
                    'request_link.url' => 'The Liquidation Concern Link Must Be A Valid URL.',
                ]);
                
            }
        }

        # HR Operations
        else if($this->type_of_ticket == "HR Operations"){
            if($this->type_of_request == "Performance Monitoring Request"){
                $this->validate([
                    'type_of_pe_hr_ops' => 'required|in:3rd Month,5th Month,Annual,Semi-Annual,Employee Movement',
                    'account_client_hr_ops' => 'required|in:Option 1,Option 2',
                ], [
                    'type_of_pe_hr_ops.required' => 'The Type of Performance Monitoring Request Field Is Required.',
                    'type_of_pe_hr_ops.in' => 'The Selected Type of Performance Monitoring Request Is Invalid.',
                
                    'account_client_hr_ops.required' => 'The Account/Client Field Is Required.',
                    'account_client_hr_ops.in' => 'The Account/Client Account Is Invalid.',
                ]);
                
            }
            else if($this->type_of_request == "Incident Report"){
                $this->validate([
                    'type_of_hrconcern' => 'required|in:High,Medium,Low',
                    'purpose' => 'required|max:5000|string'
                ], [
                    'type_of_hrconcern.required' => 'The Level of Offense Field Is Required.',
                    'type_of_hrconcern.in' => 'The Selected Level of Offense Is Invalid.',
                
                    'purpose.required' => 'The Incident Report Field Is Required.',
                    'purpose.max' => 'The Incident Report May Not Be Greater Than 5000 Characters.',
                    'purpose.string' => 'The Incident Report Must Be A String.',
                ]);
                
            }
            else if($this->type_of_request == "Request for Issuance of Notice/Letter"){
                $this->validate([
                    'type_of_hrconcern' => 'required|in:End of Assignment,Extension of Assignment/Project,End of Project',
                ], [
                    'type_of_hrconcern.required' => 'The Type of Notice Field Is Required.',
                    'type_of_hrconcern.in' => 'The Selected Type of Notice Is Invalid.',
                ]);
                
            }
            else if($this->type_of_request == "Request for Employee Files"){
                $this->validate([
                    'request_requested' => 'required|min:10|string',
                    'purpose' => 'required|max:5000|string'
                ], [
                    'request_requested.required' => 'The Document/s Needed Field Is Required.',
                    'request_requested.min' => 'The Document/s Needed Must Be At Least 10 Characters.',
                    'purpose.required' => 'The Purpose of Employee Files Request Field Is Required.',
                    'purpose.max' => 'The Purpose of Employee Files Request May Not Be Greater Than 5000 Characters.',
                ]);
            }
        } 

        else if($this->type_of_ticket == "Overtime Form"){
            $this->validate([
                'request_link' => 'required|min:2|max:10000',
                'request_requested' => 'required|email',
                'request_date' => 'required|date',
            ], [
                // Custom messages for request_link
                'request_link.required' => 'The Request Link is required.',
                'request_link.string' => 'The Request Link must be a valid string.',
                'request_link.max' => 'The Request Link cannot exceed 10,000 characters.',
                
                // Custom messages for request_others
                'request_others.required' => 'The Email of Supervisor is required.',
                'request_others.email' => 'The Supervisor email must be a valid email address.',
                
                // Custom messages for request_date
                'request_date.required' => 'The Request Date is required.',
                'request_date.date' => 'The Request Date must be a valid date.',
        ]);
        
        } 

        $this->validate();
       


        try {
        
        $loggedInUser = auth()->user();

        $hrticketdata = new Hrticket();

        $hrticketdata->employee_id = $loggedInUser->employee_id;
        $hrticketdata->status = "Pending";
        $hrticketdata->concerned_employee = $this->concerned_employee;
        $hrticketdata->type_of_ticket = $this->type_of_ticket;
        $hrticketdata->type_of_request = $this->type_of_request;
        $hrticketdata->sub_type_of_request = $this->sub_type_of_request;

        // $hrticketdata->supervisor_email = $this->supervisor_email;
        $hrticketdata->application_date = $this->application_date;
        // $hrticketdata->mode_of_application = $this->mode_of_application;
        // dd($this->mode_of_application == "Credit Leave");

        # Hr Internal
        if($this->type_of_ticket == "HR Internal"){
            if($this->type_of_request == "HR"){
                if($this->sub_type_of_request == "Certificate of Employment" || $this->sub_type_of_request == "Request for Consultation" ){
                    $hrticketdata->purpose = $this->purpose;
                    $hrticketdata->type_of_hrconcern = $this->type_of_hrconcern;
                }
                else if($this->sub_type_of_request == "HMO-related Concerns" || $this->sub_type_of_request == "Leave Concerns"){
                    $hrticketdata->type_of_hrconcern = $this->type_of_hrconcern;
                    $hrticketdata->purpose = $this->purpose;
                    $hrticketdata->request_link = $this->request_link;
                }
                else if($this->sub_type_of_request == "Payroll-related Concerns"){
                    $hrticketdata->request_date = $this->request_date;
                    $hrticketdata->type_of_hrconcern = $this->type_of_hrconcern;
                    $hrticketdata->purpose = $this->purpose;
                    $hrticketdata->request_link = $this->request_link;
                }   
                else if($this->sub_type_of_request == "Request for a Meeting"){
                    $hrticketdata->request_date = $this->request_date;
                    $hrticketdata->purpose = $this->purpose;
                    $hrticketdata->request_requested = $this->request_requested;
                }
            }
            else if($this->type_of_request == "Office Admin"){
                if($this->sub_type_of_request == "Certificate of Remittances"){
                    if($this->type_of_hrconcern == "Others"){
                        $hrticketdata->type_of_hrconcern = $this->remittance_request_others;
                    } else {
                        $hrticketdata->type_of_hrconcern = $this->type_of_hrconcern;

                    }
                    if($this->request_assigned == "Others"){
                        $hrticketdata->request_assigned = $this->request_assigned_request_others;
                    } else {
                        $hrticketdata->request_assigned = $this->request_assigned;
                    }
                    $hrticketdata->purpose = $this->purpose;
                    $hrticketdata->request_date = $this->request_date;
                }
                else if($this->sub_type_of_request == "Government-Mandated Benefits Concern"){
                    $hrticketdata->type_of_hrconcern = $this->type_of_hrconcern;
                    $hrticketdata->request_link = $this->request_link;
                }
                else if($this->sub_type_of_request == "Messengerial"){
                    if($this->type_of_hrconcern == "Others"){
                        $hrticketdata->type_of_hrconcern = $this->messengerial_other_type;
                    } else {
                        $hrticketdata->type_of_hrconcern = $this->type_of_hrconcern;
                    }
                    $hrticketdata->request_requested = $this->request_requested;
                    $hrticketdata->request_assigned = $this->request_assigned;
                    $hrticketdata->request_extra = $this->request_extra;
                    $hrticketdata->request_date = $this->request_date;
                }
                else if($this->sub_type_of_request == "Repairs/Maintenance"){
                    $hrticketdata->type_of_hrconcern = $this->type_of_hrconcern;
                    $hrticketdata->purpose = $this->purpose;
                }  
                else if($this->sub_type_of_request == "Book a Car"){
                    $hrticketdata->request_date = $this->request_date;
                    $hrticketdata->request_requested = $this->request_requested;
                    $hrticketdata->account_client_hr_ops = $this->account_client_hr_ops;
                    $hrticketdata->purpose = $this->purpose;
                }
                else if($this->sub_type_of_request == "Book a Meeting Room"){
                    $hrticketdata->request_date = $this->request_date;
                    $hrticketdata->request_requested = $this->request_requested;
                    $hrticketdata->type_of_hrconcern = $this->type_of_hrconcern;
                    $hrticketdata->purpose = $this->purpose;
                }
                else if($this->sub_type_of_request == "Office Supplies"){
                    // $hrticketdata->request_date = $this->request_date;
                    // $hrticketdata->request_requested = $this->request_requested;
                    // $hrticketdata->type_of_hrconcern = $this->type_of_hrconcern;
                    $hrticketdata->request_others = json_encode($this->supplies_request);
                }
            }
            else if($this->type_of_request == "Procurement"){
                if($this->sub_type_of_request == "Request for Quotation"){
                    $hrticketdata->type_of_hrconcern = $this->type_of_hrconcern;
                    $hrticketdata->purpose = $this->purpose;
                    $hrticketdata->request_link = $this->request_link;
                }
                else if($this->sub_type_of_request == "Request to Buy/Book/Avail Service"){
                    $hrticketdata->type_of_hrconcern = $this->type_of_hrconcern;
                    $hrticketdata->request_link = $this->request_link;
                    $hrticketdata->purpose = $this->purpose;
                }
            }
          
            // else if($this->type_of_request == "Book a Meeting Room"){
            //     if($this->sub_type_of_request == "Request for Quotation"){
            //         $hrticketdata->type_of_hrconcern = $this->type_of_hrconcern;
            //         $hrticketdata->purpose = $this->purpose;
            //         $hrticketdata->request_link = $this->request_link;
            //     }
            //     else if($this->sub_type_of_request == "Request to Buy/Book/Avail Service"){
            //         $hrticketdata->type_of_hrconcern = $this->type_of_hrconcern;
            //         $hrticketdata->request_link = $this->request_link;
            //     }
            // }
            // else if($this->type_of_request == "Office Supplies"){
            //     if($this->sub_type_of_request == "Request for Quotation"){
            //         $hrticketdata->type_of_hrconcern = $this->type_of_hrconcern;
            //         $hrticketdata->purpose = $this->purpose;
            //         $hrticketdata->request_link = $this->request_link;
            //     }
            //     else if($this->sub_type_of_request == "Request to Buy/Book/Avail Service"){
            //         $hrticketdata->type_of_hrconcern = $this->type_of_hrconcern;
            //         $hrticketdata->request_link = $this->request_link;
            //     }
            // }

        }

        # Internal Control
        else if($this->type_of_ticket == "Internal Control"){
            if($this->type_of_request == "Reimbursements"){
                $hrticketdata->request_date = $this->request_date;
                $hrticketdata->purpose = $this->purpose;
                $hrticketdata->request_link = $this->request_link;
            }
            else if($this->type_of_request == "Tools and Equipment"){
                $hrticketdata->type_of_hrconcern = $this->type_of_hrconcern;
                $hrticketdata->condition_availability = $this->condition_availability;
            }
            else if($this->type_of_request == "Cash Advance"){
                $hrticketdata->request_date = $this->request_date;
                $hrticketdata->request_link = $this->request_link;
            }
            else if($this->type_of_request == "Liquidation"){
                $hrticketdata->purpose = $this->purpose;
                $hrticketdata->request_link = $this->request_link;
            }
        }

        # HR Operations

        else if($this->type_of_ticket == "HR Operations"){
            if($this->type_of_request == "Performance Monitoring Request"){
                $hrticketdata->type_of_pe_hr_ops = $this->type_of_pe_hr_ops;
                $hrticketdata->account_client_hr_ops = $this->account_client_hr_ops;
            }
            else if($this->type_of_request == "Incident Report"){
                $hrticketdata->type_of_hrconcern = $this->type_of_hrconcern;
                $hrticketdata->purpose = $this->purpose;
            }
            else if($this->type_of_request == "Request for Issuance of Notice/Letter"){
                $hrticketdata->type_of_hrconcern = $this->type_of_hrconcern;
            }
            else if($this->type_of_request == "Request for Employee Files"){
                $hrticketdata->purpose = $this->purpose;
                $hrticketdata->request_requested = $this->request_requested;
            }
        } 
        else if($this->type_of_ticket == "Overtime Form"){
            $hrticketdata->type_of_request = 'null';
            $hrticketdata->request_date = $this->request_date;
            $hrticketdata->request_requested = $this->request_requested;
            $hrticketdata->request_link = $this->request_link;
        }
        else {
            throw new Exception('No Type of Ticket');
        }

        // dd('stop');
        $hrticketdata->save();

        $this->dispatch('trigger-success');

        return redirect()->to(route('HrTicketsTable', ['type' => $this->type]));
        
        } catch (Exception $e) {

            $this->dispatch('trigger-error');

            // Log the exception for further investigation
            Log::channel('hrticket')->error('Failed to save Hrticket: ' . $e->getMessage());

            // Dispatch a failure event with an error message
            $this->dispatch('triggerFailure', ['message' => 'Something went wrong. Please contact IT support.']);

            // Optionally, you could redirect the user to an error page or show an error message
            // return redirect()->back()->withErrors('Something went wrong. Please contact IT support.');
        }

    }

    // public function updateNumOfDays($start_date, $end_date){
    //     dd($start_date);
     
    // }
    public function render()
    {
        return view('livewire.hrtickets.hr-tickets-form')->extends('components.layouts.app');
    }

    // public function render()
    // {
    //     return view('livewire.hrtickets.hr-tickets-form');
    // }
}
