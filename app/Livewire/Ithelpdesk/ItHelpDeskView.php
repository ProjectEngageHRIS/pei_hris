<?php

namespace App\Livewire\Ithelpdesk;

use Livewire\Component;
use App\Models\Employee;
use App\Models\Ittickets;
use Illuminate\Support\Facades\Log;
use Illuminate\Auth\Access\AuthorizationException;

class ItHelpDeskView extends Component
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


    public function mount($index){
        $loggedInUser = auth()->user();

        try {
            $it_ticket = $this->editForm($index);
            // $this->authorize('update', [$leaverequest]);
            if (is_null($it_ticket)) {
                return redirect()->to(route('LeaveRequestTable'));
            }
        } catch (AuthorizationException $e) {
            return redirect()->to(route('ItHelpDeskTable'));
            abort(404);
        }
        $this->index = $index;

        $employeeRecord = Employee::select('first_name', 'middle_name', 'last_name', 'department',  'employee_email')
                                    ->where('employee_id', $loggedInUser->employee_id)
                                    ->first(); 
        $this->first_name = $employeeRecord->first_name;
        $this->middle_name = $employeeRecord->middle_name;
        $this->last_name = $employeeRecord->last_name;
        $this->department_name = $employeeRecord->department;
        $this->email = $employeeRecord->employee_email;

        $this->form_id = $it_ticket->form_id;

        $this->description = $it_ticket->description;


    }


    public function editForm($index){
        $loggedInUser = auth()->user()->employee_id;
        try {
            $it_ticket =  Ittickets::where('employee_id', auth()->user()->employee_id)->where('uuid', $index)->first();
            if(!$it_ticket){
                throw new \Exception('No Record Found');
            }
            if($it_ticket->employee_id != $loggedInUser){
                throw new \Exception('Unauthorized Access');
            }
            return $it_ticket;
        } catch (\Exception $e) {
            // Log the exception for further investigation
            Log::channel('ittickets')->error('Failed to view IT Ticket: ' . $e->getMessage() . ' | ' . $loggedInUser );
            redirect()->to(route('ItHelpDeskTable'));
        }
    }

    public function render()
    {
        return view('livewire.ithelpdesk.it-help-desk-view');
    }
}
