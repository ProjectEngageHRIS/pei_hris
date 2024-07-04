<?php

namespace App\Livewire\Payroll\Accounting;

use App\Models\Payroll;
use Livewire\Component;
use App\Models\Employee;
use Livewire\WithFileUploads;

class AccountingPayrollForm extends Component
{
    use WithFileUploads;
    
    
    // public $employeeRecord;
    public $date;
    public $first_name;
    public $middle_name;
    public $last_name;
    public $department_name;
    // public $employee_id;


    public $employeeNames = [];
    public $target_employee;

    public $start_date;
    public $end_date;
    public $payroll_picture;

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

        // $employees = Employee::select('first_name', 'middle_name', 'last_name', 'employee_id')->where('employee_id', '!=', $loggedInUser->employee_id)->get();
        $employees = Employee::select('first_name', 'middle_name', 'last_name', 'employee_id')->get();

        foreach($employees as $employee){
            $fullName = $employee->first_name . ' ' .  $employee->middle_name . ' ' . $employee->last_name . ' | ' . $employee->employee_id;
            $this->employeeNames[] = $fullName;
        }

    }

    protected $validationAttributes = [
        'mode_of_application' => 'Mode of Application',
        'type_of_leave_others' => 'Others',
        'type_of_leave_sub_category' => 'Sub Category',
        'type_of_leave_assigned_task' => 'Leave Description',
    ];


    public function submit(){
        // foreach($this->rules as $rule => $validationRule){
        //     $this->validate([$rule => $validationRule]);
        //     $this->resetValidation();
        // }   

        // if (in_array($this->type_of_leave, ['Vacation Leave', 'Mandatory/Forced Leave', 'Sick Leave'])) {
        //     $this->validate(['num_of_days_work_days_applied' => 'required|lte:available_credits',]);
        // }
        
        $loggedInUser = auth()->user();

        $payroll= new Payroll();


        if($this->target_employee){
            $parts = explode(' | ', $this->target_employee);
            $payroll->target_employee = $parts[1];
        } else {
            $payroll->target_employee = "N/A";
        }

        $payroll->employee_id = $loggedInUser->employee_id;
        $payroll->start_date = $this->start_date;
        $payroll->end_date = $this->end_date;
        if(is_string($this->payroll_picture) != True){
            $this->validate(['payroll_picture' => 'required|mimes:jpg,png,pdf|extensions:jpg,png,pdf|max:5120']);
            $payroll->payroll_picture = $this->payroll_picture->store('photos/payroll/' . $payroll->target_employee, 'local');
        }

        $payroll->save();

        $this->js("alert('Payroll Added!')"); 


        return redirect()->to(route('AccountingPayrollTable'));

    }
    
    public function render()
    {
        return view('livewire.payroll.accounting.accounting-payroll-form');
    }
}
