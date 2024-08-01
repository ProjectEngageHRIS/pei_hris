<?php

namespace App\Livewire\Dailytimerecord;

use Livewire\Component;

class HrAttendance extends Component
{
    public function render()
    {
        return view('livewire.dailytimerecord.hr-attendance')->layout('components.layouts.hr-navbar');
    }
}
