<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;

class AccountingDashboardView extends Component
{
    public function render()
    {
        return view('livewire.dashboard.accounting-dashboard-view')->layout('components.layouts.accounting-navbar');
    }
}
