<?php

namespace App\Livewire\HrPortal;

use Livewire\Component;

class EmployeesTable extends Component
{
    public function render()
    {
        return view('livewire.hr-portal.employees-table')->layout('components.layouts.hr-navbar');
    }
}
