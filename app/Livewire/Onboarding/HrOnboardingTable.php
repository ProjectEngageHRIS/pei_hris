<?php

namespace App\Livewire\Onboarding;

use Livewire\Component;

class HrOnboardingTable extends Component
{
    public function render()
    {
        return view('livewire.onboarding.hr-onboarding-table')->layout('components.layouts.onboarding-layout');
    }
}
