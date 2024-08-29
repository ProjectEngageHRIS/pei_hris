<?php

namespace App\Livewire\MyApprovals\ItTickets;

use Livewire\Component;
use App\Models\Employee;
use App\Models\Ittickets;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Log;
use Illuminate\Auth\Access\AuthorizationException;

class ApproveItTicketsForm extends Component
{

    public $date;
    public $first_name;
    public $middle_name;
    public $last_name;
    public $department_name;
    public $description;
    public $email;

    public $index;
    
    public $status; 

    public $form_id;

    public $report;

    public function mount($index){
        $loggedInUser = auth()->user();

        try {
            $it_ticket = $this->editForm($index);
            // $this->authorize('update', [$leaverequest]);
        } catch (AuthorizationException $e) {
            return redirect()->to(route('ApproveItTicketsTable'));
            abort(404);
        }
        $this->index = $index;

        $employeeRecord = Employee::select('first_name', 'middle_name', 'last_name', 'department',  'employee_email')
                                    ->where('employee_id', $it_ticket->employee_id)
                                    ->first(); 
        $this->first_name = $employeeRecord->first_name;
        $this->middle_name = $employeeRecord->middle_name;
        $this->last_name = $employeeRecord->last_name;
        $this->department_name = $employeeRecord->department;
        $this->email = $employeeRecord->employee_email;
        $this->report = $it_ticket->report;
        $this->form_id = $it_ticket->form_id;
        $this->description = $it_ticket->description;


    }


    public function editForm($index){
        $loggedInUser = auth()->user();
        try {
            $it_ticket =  Ittickets::where('uuid', $this->index)->first();
            
            if(!in_array($loggedInUser->role_id, [14, 15, 61024])){
                throw new \Exception('Unauthorized Access');
            }
            if(!$it_ticket){
                return ;
            }
            return $it_ticket ;
        } catch (\Exception $e) {
            // Log the exception for further investigation
            Log::channel('ittickets')->error('Failed to update IT Ticket: ' . $e->getMessage() . ' | '. $loggedInUser->employee_id);
            // Dispatch a failure event with an error message
            $this->dispatch('trigger-error');
        }
    }


    public function changeStatus(){
        $loggedInUser = auth()->user();
        try {
            $form = Ittickets::where('form_id', $this->form_id)->first();
            if($form){
                if(in_array($loggedInUser->role_id, [11, 61024])){
                    if($this->status == "Cancelled"){
                        $dataToUpdate = ['status' => 'Cancelled', 'cancelled_at' => now()];
                    } else if($this->status == "Report") {
                        $dataToUpdate = ['status' => 'Report', 'report' => $this->report];                        
                    } else {
                        $dataToUpdate = ['status' => $this->status];
                    }
                    $form->update($dataToUpdate);
                    $this->dispatch('trigger-success'); 
                } else {
                    throw new \Exception('Unauthorized Access');
                }
            } else {
                throw new \Exception('No Record Fond');
            }
            return redirect()->to(route('ItDashboard'));
        } catch (\Exception $e) {
            // Log the exception for further investigation
            Log::channel('ittickets')->error('Failed to update IT Ticket: ' . $e->getMessage() . ' | '. $loggedInUser->employee_id);
            // Dispatch a failure event with an error message
            $this->dispatch('trigger-error');
        }
    }

    public function render()
    {
        return view('livewire.my-approvals.it-tickets.approve-it-tickets-form')->extends('components.layouts.it-navbar');
    }
   
}
