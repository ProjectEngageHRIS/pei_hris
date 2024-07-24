<?php

namespace App\Livewire\Payroll;

use Carbon\Carbon;
use App\Models\Payroll;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;

class PayrollTable extends Component
{
    use WithPagination;

    public $filterName;

    public $filter;

    public $search = "";

    public $resultsCount;


    public function search()
    {
        $this->resetPage();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function view($start_date){
        return redirect()->to(route('PayrollView', ['date' => $start_date]));
    }



    public function render()
    {
        $loggedInUser = auth()->user();

        $query = Payroll::where('target_employee', $loggedInUser->employee_id)->select('target_employee', 'start_date', 'end_date');
        switch ($this->filter) {
            case '1':
                $query->whereDate('start_date',  Carbon::today());
                $this->filterName = "Today";
                break;
            case '2':
                $query->whereBetween('start_date', [Carbon::today()->startOfWeek(), Carbon::today()]);
                $this->filterName = "Last 7 Days";
                break;
            case '3':
                $query->whereBetween('start_date', [Carbon::today()->subDays(30), Carbon::today()]);
                // $query->whereDate('start_date', '>=', Carbon::today()->subDays(30), '<=', Carbon::today());
                $this->filterName = "Last 30 days";
                break;
            case '4':
                $query->whereBetween('start_date', [Carbon::today()->subMonths(6), Carbon::today()]);
                // $query->whereDate('start_date', '>=', Carbon::today()->subMonths(6), '<=', Carbon::today());
                $this->filterName = "Last 6 Months";
                break;
            case '5':
                $query->whereBetween('start_date', [Carbon::today()->subYear(), Carbon::today()]);
                // $query->whereDate('start_date', '>=', Carbon::today()->subYear(), '<=', Carbon::today());
                $this->filterName = "Last Year";
                break;
            default:
                $this->filterName = "All"; 
                break;
        }

        if (strlen($this->search) >= 1) {
            $query->where('start_date', 'like', '%' . $this->search . '%');
        }
    
        $results = $query->orderBy('start_date', 'desc')->paginate(5);
    
        // Check if $results is not null
        if ($results !== null) {
            $this->resultsCount = $results->count();
            $PayrollData = $results;
        } else {
            // If $results is null, set $PayrollData to an empty collection
            $this->resultsCount = 0;
            $PayrollData = collect([]);
        }

        return view('livewire.payroll.payroll-table', compact('PayrollData'));
        
    }

    public function redirectToPayroll($payroll_id){
        $payroll = Payroll::where('payroll_id', 'target_employee', 'payroll_picture')->first();
        $loggedInUser = auth()->user()->role_id;
        if($payroll->target_employee != $loggedInUser) return redirect()->to(route('PayrollTable'));
        else return redirect()->to($payroll->payroll_picture);


    }

    
}
