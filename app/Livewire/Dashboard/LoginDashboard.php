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



    public function mount(){
        $role_id = auth()->user()->role_id;
        if(in_array($role_id, [2,7,8,9,10,11,12,13])){
            $this->is_hr = True;
            // return redirect()->to(route('HumanResourceDashboard'));
        }
        if(in_array($role_id, [4, 5])){
            $this->is_supervisor = True;
        }
        if(in_array($role_id, [3])){
            $this->is_accounting = True;
            // return redirect()->to(route('AccountingDashboard'));
        }
        if(in_array($role_id, [14])){
            $this->is_it = True;
        }
        if(in_array($role_id, [6])){
            $this->is_president = True;
            // return redirect()->to(route('EmployeeDashboard'));
        }
        if(in_array($role_id, [61024])){
            $this->is_superadmin = True;
        }
        // return redirect()->to(route('LoginDashboard'));
    }

    public function employeePortal(){
        $loggedInUser = auth()->user();
        if(!$loggedInUser){
            if($loggedInUser->role_id != 1){
                return redirect()->to(route('LoginDashboard'));
            }
        }

        return redirect()->to(route('EmployeeDashboard'));
    }

    public function humanResourcePortal(){
        $loggedInUser = auth()->user();
        if(!$loggedInUser){
            if($loggedInUser->role_id != 1){
                return redirect()->to(route('LoginDashboard'));
            }
        }

        return redirect()->to(route('HumanResourceDashboard'));
    }

    public function accountingPortal(){
        $loggedInUser = auth()->user();
        if(!$loggedInUser){
            if($loggedInUser->role_id != 1){
                return redirect()->to(route('AccountingDashboard'));
            }
        }

        return redirect()->to(route('AccountingDashboard'));
    }
    public function render()
    {
        return view('livewire.dashboard.login-dashboard')->layout('components.layouts.loginlayout');
    }
}
