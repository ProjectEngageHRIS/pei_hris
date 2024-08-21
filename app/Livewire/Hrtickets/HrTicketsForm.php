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
            $this->sub_type_of_request = "Payroll-related concerns";
            $this->type_of_hrconcern = "Overtime Pay";
            $this->request_date = $dateToday;
        } else if($type == "undertime"){
            $this->type_of_ticket = "HR Internal";
            $this->type_of_request = "HR";
            $this->sub_type_of_request = "Payroll-related concerns";
            $this->type_of_hrconcern = "Deductions";
            $this->request_date = $dateToday;
        } else if($type == "adviceslip"){
            $this->type_of_ticket = "HR Internal";
            $this->type_of_request = "HR";
            $this->sub_type_of_request = "Payroll-related concerns";
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


    // protected $rules = [
    //     'mode_of_application' => 'required|in:Others,Vacation Leave,Mandatory/Forced Leave,Sick Leave,Maternity Leave,Paternity Leave,Special Privilege Leave,Solo Parent Leave,Study Leave,10-Day VAWC Leave,Rehabilitation Privilege,Special Leave Benefits for Women,Special Emergency Leave,Adoption Leave',
    //     'type_of_leave_others' => 'required_if:mode_of_application,Others|max:100',
    //     'type_of_leave_sub_category' => 'nullable|in:Others,Within the Philippines,Abroad,Out Patient,Special Leave Benefits for Women,Completion of Master\'s degree,BAR/Board Examination Review,Monetization of leave credits,Terminal Leave,In Hospital, Others',
    //     'type_of_leave_description' => 'required_if:type_of_leave_sub_category,Others|min:10|max:500',
    //     'inclusive_start_date' => 'required|after_or_equal:application_date|before_or_equal:inclusive_end_date',
    //     'inclusive_end_date' => 'required|after_or_equal:inclusive_start_date',
    //     // 'num_of_days_work_days_applied' => 'required|lte:available_credits',
    //     'commutation' => 'required|in:not requested,requested',
    //     'commutation_signature_of_appli' => 'required|mimes:jpg,png,pdf|extensions:jpg,png,pdf|max:5120'
    // ];

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
                else if($this->sub_type_of_request == "Payroll-related concerns"){
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

        // dd('stop');
        $hrticketdata->save();

        $this->dispatch('trigger-success');

        return redirect()->to(route('HrTicketsTable', ['type' => $this->type]));
        
        } catch (\Exception $e) {

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
