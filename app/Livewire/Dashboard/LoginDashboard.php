<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;

class LoginDashboard extends Component
{
    public $role_id;
    public function mount(){
        $this->role_id = auth()->user()->role_id;
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
