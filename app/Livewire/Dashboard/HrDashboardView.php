<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;

class HrDashboardView extends Component
{
    public function render()
    {
        return view('livewire.dashboard.hr-dashboard-view')->layout('components.layouts.hr-navbar');
    }
}
