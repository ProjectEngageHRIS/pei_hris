<?php

namespace App\Livewire\Mytasks\Assignedtasks;

use Carbon\Carbon;
use App\Models\Mytasks;
use Livewire\Component;
use App\Models\Employee;
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;

class AssignedTasksTable extends Component
{
    use WithPagination, WithoutUrlPagination;

    public $vacationCredits;
    public $sickCredits;

    public $date_filter;

    public $status_filter;

    public $dateFilterName = "All";
    public $statusFilterName = "All";

    public $search = "";
    

    public function search()
    {
        $this->resetPage();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $loggedInUser = auth()->user();

        $query = Mytasks::where('employee_id', $loggedInUser->employee_id);

        switch ($this->date_filter) {
            case '1':
                $query->whereDate('application_date',  Carbon::today());
                $this->dateFilterName = "Today";
                break;
            case '2':
                $query->whereBetween('application_date', [Carbon::today()->startOfWeek(), Carbon::today()]);
                $this->dateFilterName = "Last 7 Days";
                break;
            case '3':
                $query->whereBetween('application_date', [Carbon::today()->subDays(30), Carbon::today()]);
                $this->dateFilterName = "Last 30 days";
                break;
            case '4':
                $query->whereBetween('application_date', [Carbon::today()->subMonths(6), Carbon::today()]);
                // $query->whereDate('application_date', '>=', Carbon::today()->subMonths(6), '<=', Carbon::today());
                $this->dateFilterName = "Last 6 Months";
                break;
            case '5':
                $query->whereBetween('application_date', [Carbon::today()->subYear(), Carbon::today()]);
                $this->dateFilterName = "Last Year";
                break;
            default:
                $this->dateFilterName = "All";
                break;
        }

        switch ($this->status_filter) {
            case '1':
                $query->where('status',  'Approved');
                $this->statusFilterName = "Approved";
                break;
            case '2':
                $query->where('status', 'Pending');
                $this->statusFilterName = "Pending";
                break;
            case '3':
                $query->where('status', 'Declined');
                $this->statusFilterName = "Declined";
                break;
            default:
                $this->statusFilterName = "All";
                break;
        }


        if(strlen($this->search) >= 1){
            $results = $query->where('application_date', 'like', '%' . $this->search . '%')->orderBy('application_date', 'desc')->where('status', '!=', 'Deleted')->paginate(5);
        } else {
            $results = $query->where('status', '!=', 'Deleted')->orderBy('application_date', 'desc')->paginate(5);
        }

        return view('livewire.mytasks.assignedtasks.assigned-tasks-table', [
            'TasksData' => $results,
        ]);
    }

    public function cancelForm($index){

        $employee_id = auth()->user()->employee_id;
        $data = Mytasks::where('employee_id', $employee_id)
                                    ->where('uuid', $index)
                                    ->select('form_id', 'status', 'cancelled_at') 
                                    ->first();
        if ($data) {
            $data->status = "Cancelled";
            $data->cancelled_at = now();
            $data->update();
        }

        return redirect()->route('AssignedTasksTable');
    }

}
