<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;
use App\Models\Employee;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class HrDashboardView extends Component
{
    public $employee_type = [];
    public $inside_department = [];
    public $department = [];
    public $gender = [];

    public $employeeTypesFilter = [
        'INTERNALS' => false,
        'OJT' => false,
        'PEI-CCS' => false,
        'RAPID' => false,
        'RAPIDMOBILITY' => false,
        'UPSKILLS' => false,
    ];

    public $employeeTypeFilter;
    public $departmentTypeFilter;
    public $companyFilter;
    public $genderFilter;

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

    public function addEmployee(){
        return redirect()->to(route('EmployeesTable'));
    }

    public function getImage($emp_image){
        if(!$emp_image){
            return null;
        }
        $image = Storage::disk('local')->get($emp_image);
        return $image;
    }
    
    public function render()
    {
        // dump($this->employeeTypesFilter);
        $query = Employee::take(5);

        $employeeTypes = array_filter(array_keys($this->employeeTypesFilter), function($key) {
            return $this->employeeTypesFilter[$key];
        });
        
        // Apply the whereIn filter if there are any types to filter
        if (!empty($employeeTypes)) {
            $query->whereIn('employee_type', $employeeTypes);
        }
        

        // switch ($this->employeeTypeFilter) {
        //     case '1':
        //         $query->whereDate('application_date',  Carbon::today());
        //         break;
        //     case '2':
        //         $query->whereBetween('application_date', [Carbon::today()->startOfWeek(), Carbon::today()]);
        //         $this->dateFilterName = "Last 7 Days";
        //         break;
        //     case '3':
        //         $query->whereBetween('application_date', [Carbon::today()->subDays(30), Carbon::today()]);
        //         $this->dateFilterName = "Last 30 days";
        //         break;
        //     case '4':
        //         $query->whereBetween('application_date', [Carbon::today()->subMonths(6), Carbon::today()]);
        //         // $query->whereDate('application_date', '>=', Carbon::today()->subMonths(6), '<=', Carbon::today());
        //         $this->dateFilterName = "Last 6 Months";
        //         break;
        //     case '5':
        //         $query->whereBetween('application_date', [Carbon::today()->subYear(), Carbon::today()]);
        //         $this->dateFilterName = "Last Year";
        //         break;
        //     default:
        //         $this->dateFilterName = "All";
        //         break;
        // }

        // switch ($this->status_filter) {
        //     case '1':
        //         $query->where('status',  'Approved');
        //         $this->statusFilterName = "Approved";
        //         break;
        //     case '2':
        //         $query->where('status', 'Pending');
        //         $this->statusFilterName = "Pending";
        //         break;
        //     case '3':
        //         $query->where('status', 'Declined');
        //         $this->statusFilterName = "Declined";
        //         break;
        //     default:
        //         $this->statusFilterName = "All";
        //         break;
        // }


        // if(strlen($this->search) >= 1){
        $results = $query->orderBy('created_at', 'desc')->paginate(5);
        // } else {
        //     $results = $query->orderBy('created_at', 'desc')->paginate(5);
        // }


        return view('livewire.dashboard.hr-dashboard-view', [
            'EmployeeData' => $results,
        ])->layout('components.layouts.hr-navbar');

    }
}
