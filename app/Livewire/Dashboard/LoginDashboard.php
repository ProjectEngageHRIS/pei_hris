<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;

class LoginDashboard extends Component
{
    public $role_id;
    // public $role_useA = "Employee";
    public $is_hr = False;
    public $is_accounting = False;
    public $is_it = False;
    public $is_supervisor = False;
    public $is_president = False;
    public $is_superadmin = False;



    public function mount() {
        $user = auth()->user()->role_id;
        $role_ids = json_decode($user, true);
    
        // Check for HR roles
        if (!empty(array_intersect($role_ids, [2, 7, 8, 9, 10, 11, 12, 13]))) {
            $this->is_hr = true;
            // return redirect()->to(route('HumanResourceDashboard'));
        }
    
        // Check for Supervisor roles
        if (!empty(array_intersect($role_ids, [4, 5]))) {
            $this->is_supervisor = true;
        }
    
        // Check for Accounting roles
        if (!empty(array_intersect($role_ids, [3]))) {
            $this->is_accounting = true;
            // return redirect()->to(route('AccountingDashboard'));
        }
    
        // Check for IT roles
        if (!empty(array_intersect($role_ids, [14, 15]))) {
            $this->is_it = true;
        }
    
        // Check for President roles
        if (!empty(array_intersect($role_ids, [6]))) {
            $this->is_president = true;
            // return redirect()->to(route('EmployeeDashboard'));
        }
    
        // Check for Superadmin roles
        if (!empty(array_intersect($role_ids, [61024]))) {
            $this->is_superadmin = true;
        }
    
        // return redirect()->to(route('LoginDashboard'));
    }
    

    public function employeePortal(){
        $loggedInUser = auth()->user()->role_id;
        $role_ids = json_decode($loggedInUser, true);
        if(!$loggedInUser){
            if(in_array(1, $role_ids)){
                return redirect()->to(route('LoginDashboard'));
            }
        }

        return redirect()->to(route('EmployeeDashboard'));
    }

    public function humanResourcePortal(){
        $loggedInUser = auth()->user()->role_id;
        $role_ids = json_decode($loggedInUser, true);
        if(!$loggedInUser){
            if(in_array(1, $role_ids)){
                return redirect()->to(route('LoginDashboard'));
            }
        }

        return redirect()->to(route('HumanResourceDashboard'));
    }

    public function accountingPortal(){
        $loggedInUser = auth()->user()->role_id;
        $role_ids = json_decode($loggedInUser, true);
        if(!$loggedInUser){
            if(in_array(1, $role_ids)){
                return redirect()->to(route('LoginDashboard'));
            }
        }

        return redirect()->to(route('AccountingDashboard'));
    }
    public function render()
    {
        return view('livewire.dashboard.login-dashboard')->layout('components.layouts.loginlayout');
    }
}
