<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;
use App\Models\Employee;
use Illuminate\Support\Facades\DB;

class HrDashboardView extends Component
{
    public $employee_type = [];
    public $inside_department = [];
    public $department = [];
    public $gender = [];

    public function mount(){
        $combinedCounts = Employee::select(
            DB::raw('COUNT(CASE WHEN employee_type = "Internals" THEN 1 END) as Internals'),
            DB::raw('COUNT(CASE WHEN employee_type = "OJT" THEN 1 END) as OJT'),
            DB::raw('COUNT(CASE WHEN employee_type = "PEI-CSS" THEN 1 END) as PEICSS'),
            DB::raw('COUNT(CASE WHEN employee_type = "RAPID" THEN 1 END) as RAPID'),
            DB::raw('COUNT(CASE WHEN employee_type = "RAPID MOBILITY" THEN 1 END) as RAPIDMOBILITY'),
            DB::raw('COUNT(CASE WHEN employee_type = "UPSKILLS" THEN 1 END) as UPSKILLS'),
            DB::raw('COUNT(CASE WHEN inside_department = "HR and Admin" THEN 1 END) as HRandAdmin'),
            DB::raw('COUNT(CASE WHEN inside_department = "Recruitment" THEN 1 END) as Recruitment'),
            DB::raw('COUNT(CASE WHEN inside_department = "CXS" THEN 1 END) as CXS'),
            DB::raw('COUNT(CASE WHEN inside_department = "Overseas Recruitment" THEN 1 END) as OverseasRecruitment'),
            DB::raw('COUNT(CASE WHEN inside_department = "PEI/SL Temps DO-174" THEN 1 END) as PEISLTemps'),
            DB::raw('COUNT(CASE WHEN inside_department = "Corporate Accounting and Finance" THEN 1 END) as CorporateAccounting'),
            DB::raw('COUNT(CASE WHEN inside_department = "Accounting Operations" THEN 1 END) as AccountingOperations'),
            DB::raw('COUNT(CASE WHEN department = "PEI" THEN 1 END) as PEI'),
            DB::raw('COUNT(CASE WHEN department = "SL SEARCH" THEN 1 END) SLSEARCH'),
            DB::raw('COUNT(CASE WHEN department = "SL TEMPS" THEN 1 END) as SLTEMPS'),
            DB::raw('COUNT(CASE WHEN department = "WESEARCH" THEN 1 END) as WESEARCH'),
            DB::raw('COUNT(CASE WHEN department = "PEI-UPSKILLS" THEN 1 END) as PEIUPSKILLS'),
            DB::raw('COUNT(CASE WHEN gender = "Male" THEN 1 END) as MALE'),
            DB::raw('COUNT(CASE WHEN gender = "Female" THEN 1 END) as FEMALE'),
        )->first();
        
        $this->employee_type = [
            $combinedCounts->Internals ?? 0,
            $combinedCounts->OJT ?? 0,
            $combinedCounts->PEICSS ?? 0,
            $combinedCounts->RAPID ?? 0,
            $combinedCounts->RAPIDMOBILITY ?? 0,
            $combinedCounts->UPSKILLS ?? 0
        ];
        
        $this->inside_department = [
            $combinedCounts->HRandAdmin ?? 0,
            $combinedCounts->Recruitment ?? 0,
            $combinedCounts->CXS ?? 0,
            $combinedCounts->OverseasRecruitment ?? 0,
            $combinedCounts->PEISLTemps ?? 0,
            $combinedCounts->CorporateAccounting ?? 0,
            $combinedCounts->AccountingOperations ?? 0
        ];
        
        $this->department = [
            $combinedCounts->PEI ?? 0,
            $combinedCounts->SLSEARCH ?? 0,
            $combinedCounts->SLTEMPS ?? 0,
            $combinedCounts->WESEARCH ?? 0,
            $combinedCounts->PEIUPSKILLS ?? 0,
        ];
        
        $this->gender = [
            $combinedCounts->MALE ?? 0,
            $combinedCounts->FEMALE ?? 0,
        ];




    }
    public function render()
    {
        return view('livewire.dashboard.hr-dashboard-view')->layout('components.layouts.hr-navbar');
    }
}
