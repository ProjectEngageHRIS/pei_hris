<?php

namespace App\Livewire\MyApprovals\HrTickets;

use Exception;
use Livewire\Component;
use App\Models\Employee;
use App\Models\Hrticket;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Auth\Access\AuthorizationException;

class ApproveHrTicketsForm extends Component
{

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


    public $index;

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

    public $employeeNames = [];

    public $status;

    public $supplies_request;

    public $request_others;

    public $form_id;

    public function mount($index){
        $loggedInUser = auth()->user();
        try {
            $hrticketdata = $this->editForm($index);
            // $this->authorize('update', [$hrticket]);
            if(!$hrticketdata){
                return redirect()->to(route('ApproveHrTicketsTable'));
            }
        } catch (AuthorizationException $e) {
            abort(404);
        }

        $this->index = $index;
        $employeeRecord = Employee::select('first_name', 'middle_name', 'last_name', 'employee_email', 'employee_id', 'current_position')
                                    ->where('employee_id', $hrticketdata->employee_id)
                                    ->first();

        $this->available_credits = $employeeRecord->vacation_credits + $employeeRecord->sick_credits;
        $this->employee_id = $employeeRecord->employee_id;
        $this->first_name = $employeeRecord->first_name;
        $this->middle_name = $employeeRecord->middle_name;
        $this->last_name = $employeeRecord->last_name;
        $this->department_name = $employeeRecord->department;
        // $this->current_position = $employeeRecord->current_position;
        // $this->salary = $employeeRecord->salary;
        $this->employee_email = $employeeRecord->employee_email;
        // $this->available_credits = $employeeRecord->sick_credits + $employeeRecord->vacation_credits;
        // $dateToday = Carbon::now()->toDateString();
        // $this->date = $dateToday;
        $this->application_date = $hrticketdata->application_date;
        $this->form_id = $hrticketdata->form_id;

        $this->type_of_ticket = $hrticketdata->type_of_ticket;
        $this->type_of_request = $hrticketdata->type_of_request;
        $this->sub_type_of_request = $hrticketdata->sub_type_of_request;
        $this->concerned_employee = $hrticketdata->concerned_employee;
        $this->status = $hrticketdata->status;

        if($hrticketdata->type_of_ticket == "HR Internal"){
            if($hrticketdata->type_of_request == "HR"){
                if($hrticketdata->sub_type_of_request == "Certificate of Employment" || $hrticketdata->sub_type_of_request == "Request for Consultation" ){
                    $this->purpose = $hrticketdata->purpose;
                    $this->type_of_hrconcern = $hrticketdata->type_of_hrconcern;
                }
                else if($hrticketdata->sub_type_of_request == "HMO-related Concerns" || $hrticketdata->sub_type_of_request == "Leave Concerns"){
                    $this->type_of_hrconcern = $hrticketdata->type_of_hrconcern;
                    $this->purpose = $hrticketdata->purpose;
                    $this->request_link = $hrticketdata->request_link;
                }
                else if($hrticketdata->sub_type_of_request == "Payroll-related Concerns"){
                    $this->request_date = $hrticketdata->request_date;
                    $this->type_of_hrconcern = $hrticketdata->type_of_hrconcern;
                    $this->purpose = $hrticketdata->purpose;
                    $this->request_link = $hrticketdata->request_link;
                }
                else if($this->sub_type_of_request == "Request for a Meeting"){
                    $this->request_date = $hrticketdata->request_date;
                    $this->purpose = $hrticketdata->purpose ;
                    $this->request_requested = $hrticketdata->request_requested;
                    $employees = Employee::select('first_name', 'middle_name', 'last_name', 'employee_id')->get();
                    foreach($employees as $employee){
                        $fullName = $employee->first_name . ' ' .  $employee->middle_name . ' ' . $employee->last_name . ' | ' . $employee->employee_id;
                        $this->employeeNames[] = $fullName;
                    }
                }
            }
            else if($hrticketdata->type_of_request == "Office Admin"){
                if($hrticketdata->sub_type_of_request == "Certificate of Remittances"){
                    if(in_array($hrticketdata->type_of_hrconcern, ["SSS", "PHILHEALTH", "HDMF"]) == False){
                        $this->type_of_hrconcern = "Others";
                        $this->remittance_request_others = $hrticketdata->type_of_hrconcern;
                    } else {
                        $this->type_of_hrconcern = $hrticketdata->type_of_hrconcern;
                    }
                    if(in_array($hrticketdata->request_assigned, ["PEI", "SL TEMPS", "SL SEARCH", "WESEARCH"]) == False){
                        $this->request_assigned = "Others";
                        $this->request_assigned_request_others = $hrticketdata->request_assigned;
                    } else {
                        $this->request_assigned = $hrticketdata->request_assigned;
                    }
                    $this->purpose = $hrticketdata->purpose;
                    $this->request_date = $hrticketdata->request_date;
                }
                else if($hrticketdata->sub_type_of_request == "Government-mandated benefits concern"){
                    $this->type_of_hrconcern = $hrticketdata->type_of_hrconcern;
                    $this->request_link = $hrticketdata->request_link;
                }
                else if($hrticketdata->sub_type_of_request == "Messengerial"){
                    if(in_array($hrticketdata->type_of_hrconcern, ["Send Document", "Pick-Up Document", "Collections"]) == False){
                        $this->type_of_hrconcern = "Others";
                        $this->messengerial_other_type = $hrticketdata->type_of_hrconcern;
                    } else {
                        $this->type_of_hrconcern = $hrticketdata->type_of_hrconcern;
                    }
                    $this->request_requested = $hrticketdata->request_requested;
                    $this->request_assigned = $hrticketdata->request_assigned;
                    $this->request_extra = $hrticketdata->request_extra;
                    $this->request_date = $hrticketdata->request_date;
                }
                else if($hrticketdata->sub_type_of_request == "Repairs/Maintenance"){
                    $this->type_of_hrconcern = $hrticketdata->type_of_hrconcern;
                    $this->purpose = $hrticketdata->purpose;
                }
                else if($this->sub_type_of_request == "Book a Car"){
                    $this->request_date = $hrticketdata->request_date;
                    $this->request_requested = $hrticketdata->request_requested;
                    $this->account_client_hr_ops = $hrticketdata->account_client_hr_ops ;
                    $this->purpose = $hrticketdata->purpose;
                }
                else if($this->sub_type_of_request == "Book a Meeting Room"){
                    $this->request_date = $hrticketdata->request_date ;
                    $this->request_requested = $hrticketdata->request_requested;
                    $this->type_of_hrconcern = $hrticketdata->type_of_hrconcern;
                    $this->purpose = $hrticketdata->purpose;
                }
                else if($this->sub_type_of_request == "Office Supplies"){
                    $this->supplies_request = json_decode($hrticketdata->request_others, true);
                }
            }
            else if($hrticketdata->type_of_request == "Procurement"){
                if($hrticketdata->sub_type_of_request == "Request for Quotation"){
                    $this->type_of_hrconcern = $hrticketdata->type_of_hrconcern;
                    $this->purpose = $hrticketdata->purpose;
                    $this->request_link = $hrticketdata->request_link;
                }
                else if($hrticketdata->sub_type_of_request == "Request to Buy/Book/Avail Service"){
                    $this->type_of_hrconcern = $hrticketdata->type_of_hrconcern;
                    $this->request_link = $hrticketdata->request_link;
                    $this->purpose = $hrticketdata->purpose;
                }
            }

        }

        # Internal Control
        else if($hrticketdata->type_of_ticket == "Internal Control"){
            if($hrticketdata->type_of_request == "Reimbursements"){
                $this->request_date = $hrticketdata->request_date;
                $this->purpose = $hrticketdata->purpose;
                $this->request_link = $hrticketdata->request_link;
            }
            else if($hrticketdata->type_of_request == "Tools and Equipment"){
                $this->type_of_hrconcern = $hrticketdata->type_of_hrconcern;
                $this->condition_availability = $hrticketdata->condition_availability;
            }
            else if($hrticketdata->type_of_request == "Cash Advance"){
                $this->request_date = $hrticketdata->request_date;
                $this->request_link = $hrticketdata->request_link;
            }
            else if($hrticketdata->type_of_request == "Liquidation"){
                $this->purpose = $hrticketdata->purpose;
                $this->request_link = $hrticketdata->request_link;
            }
        }

        # HR Operations

        else if($hrticketdata->type_of_ticket == "HR Operations"){
            if($hrticketdata->type_of_request == "Performance Monitoring Request"){
                $this->type_of_pe_hr_ops = $hrticketdata->type_of_pe_hr_ops;
                $this->account_client_hr_ops = $hrticketdata->account_client_hr_ops;
            }
            else if($hrticketdata->type_of_request == "Incident Report"){
                $this->type_of_hrconcern = $hrticketdata->type_of_hrconcern;
                $this->purpose = $hrticketdata->purpose;
            }
            else if($hrticketdata->type_of_request == "Request for Issuance of Notice/Letter"){
                $this->type_of_hrconcern = $hrticketdata->type_of_hrconcern;
            }
            else if($hrticketdata->type_of_request == "Request for Employee Files"){
                $this->purpose = $hrticketdata->purpose;
                $this->request_requested = $hrticketdata->request_requested;
            }
        }

    }

    public function submit(){
        $loggedInUser = auth()->user();
        try {
            $form = Hrticket::where('form_id', $this->form_id)->first();
            if($form){
                if($form->type_of_ticket == "HR Internal"){
                    if($form->type_of_request == "HR"){
                        if($loggedInUser->role_id != 11){
                            throw new \Exception('Unauthorized Access');
                        }
                    } else if($form->type_of_request == "Office Admin"){
                        if($loggedInUser->role_id != 12){
                            throw new \Exception('Unauthorized Access');
                        }
                    } else if($form->type_of_request == "Procurement"){
                        if($loggedInUser->role_id != 13){
                            throw new \Exception('Unauthorized Access');
                        }
                    }
                } else if($form->type_of_ticket == "HR Internal Control"){
                    if($loggedInUser->role_id != 9){
                        throw new \Exception('Unauthorized Access');
                    }
                } else if($form->type_of_ticket == "HR Operations"){
                    if($loggedInUser->role_id != 10){
                        throw new \Exception('Unauthorized Access');
                    }
                } else {
                    throw new \Exception('Unknown Ticket Type');
                }
                if($this->status == "Cancelled"){
                    $dataToUpdate = ['status' => 'Cancelled', 'cancelled_at' => now()];
                } else {
                    $dataToUpdate = ['status' => $this->status];
                }
                $form->update($dataToUpdate);
                $this->dispatch('trigger-success'); 
            } else {
                throw new \Exception('No Record Fond');
            }
            dd('test');
            $this->dispatch('trigger-success');
            return redirect()->to(route('ApproveHrTicketsTable'));
        } catch (\Exception $e) {
            // Log the exception for further investigation
            Log::channel('hrticket')->error('Failed to update Hrticket: ' . $e->getMessage() . ' | ' . $loggedInUser->employee_id);

            // Dispatch a failure event with an error message
            $this->dispatch('trigger-error');
            return redirect()->to(route('EmployeeDashboard'));
        }

    }


    public function editForm($index){
        $loggedInUser = auth()->user();
        try {
            if(!in_array($loggedInUser->role_id, [6, 7, 10, 11, 12, 13, 61024])){
                throw new \Exception('Unauthorized Access');
            }

            $hr_ticket = Hrticket::where('uuid', $index)->first();
            if (!$hr_ticket) {
                throw new \Exception('No Record Found');
            }
            if($hr_ticket->type_of_ticket == "HR Internal"){
                if($hr_ticket->type_of_request == "HR"){
                    if(!in_array($loggedInUser->role_id, [6, 7, 11, 61024])){
                        throw new \Exception('Unauthorized Access');
                    }
                } else if($hr_ticket->type_of_request == "Office Admin"){
                    if(!in_array($loggedInUser->role_id, [6, 7, 12, 61024])){
                        throw new \Exception('Unauthorized Access');
                    }
                } else if($hr_ticket->type_of_request == "Procurement"){
                    if(!in_array($loggedInUser->role_id, [6, 7, 13, 61024])){
                        throw new \Exception('Unauthorized Access');
                    }
                }
            } else if($hr_ticket->type_of_ticket == "Internal Control"){
                if(!in_array($loggedInUser->role_id, [6, 7, 9, 61024])){
                    throw new \Exception('Unauthorized Access');
                }
            } else if($hr_ticket->type_of_ticket == "HR Operations"){
                if(!in_array($loggedInUser->role_id, [6, 7, 10, 61024])){
                    throw new \Exception('Unauthorized Access');
                }
            } else {
                throw new \Exception('Unknown Ticket Type');
            }
            return $hr_ticket;
        } catch (\Exception $e) {
            // Log the exception for further investigation
            Log::channel('hrticket')->error('Failed to view/approve Hrticket: ' . $e->getMessage() . ' | ' . $loggedInUser );
            return null;
        }
    }

    public function removeImage($item){
        $this->$item = null;
    }


    protected $validationAttributes = [
        'mode_of_application' => 'Mode of Application',
        'type_of_leave_others' => 'Others',
        'type_of_leave_sub_category' => 'Sub Category',
        'type_of_leave_description' => 'Leave Description',
    ];



    public function render()
    {
        return view('livewire.my-approvals.hr-tickets.approve-hr-tickets-form')->layout('components.layouts.hr-navbar');
    }


}
