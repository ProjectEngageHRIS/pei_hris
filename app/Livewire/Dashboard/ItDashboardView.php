<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;

class ItDashboardView extends Component
{
    public function render()
    {
        return view('livewire.dashboard.it-dashboard-view')->layout('components.layouts.it-navbar');
    }
}
