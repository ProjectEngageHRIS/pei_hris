<?php

namespace App\Livewire\Onboarding;

use Livewire\Component;

class EmployeeOnboardingForm extends Component
{
    public function render()
    {
        return view('livewire.onboarding.employee-onboarding-form')->layout('components.layouts.onboarding-layout');
    }
}
