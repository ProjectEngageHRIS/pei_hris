<?php

namespace App\Livewire\Mytasks;

use Carbon\Carbon;
use App\Models\Mytasks;
use Livewire\Component;
use App\Models\Employee;
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;

class MyTasksTable extends Component
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

        $query = Mytasks::whereJsonContains('target_employees', $loggedInUser->employee_id);

        switch ($this->date_filter) {
            case '1': // Today
                $startOfDay = Carbon::today(); // Start of today (00:00:00)
                $endOfDay = Carbon::today()->endOfDay(); // End of today (23:59:59)
                $query->whereBetween('application_date', [$startOfDay, $endOfDay]);
                $this->dateFilterName = "Today";
                break;
    
            case '2': // Last 7 Days
                $query->whereBetween('application_date', [Carbon::today()->subDays(7), Carbon::now()]);
                $this->dateFilterName = "Last 7 Days";
                break;
    
            case '3': // Last 30 Days
                $query->whereBetween('application_date', [Carbon::today()->subDays(30), Carbon::now()]);
                $this->dateFilterName = "Last 30 Days";
                break;
    
            case '4': // Last 6 Months
                $query->whereBetween('application_date', [Carbon::today()->subMonths(6), Carbon::now()]);
                $this->dateFilterName = "Last 6 Months";
                break;
    
            case '5': // Last Year
                $query->whereBetween('application_date', [Carbon::today()->subYear(), Carbon::now()]);
                $this->dateFilterName = "Last Year";
                break;
            default: // All
                $this->dateFilterName = "All";
                break;
        }

        switch ($this->status_filter) {
            case '1':
                $query->where('status',  'Completed');
                $this->statusFilterName = "Completed";
                break;
            case '2':
                $query->where('status', 'Pending');
                $this->statusFilterName = "Pending";
                break;
            case '3':
                $query->where('status', 'Cancelled');
                $this->statusFilterName = "Cancelled";
                break;
            default:
                $this->statusFilterName = "All";
                break;
        }


        if (strlen($this->search) >= 1) {
            // Remove commas from the search input and explode into terms
            $searchTerms = explode(' ', preg_replace('/,/', '', $this->search));
            
            $results = $query->where(function ($q) use ($searchTerms) {
                foreach ($searchTerms as $term) {
                    // Handle different formats for full date matching
                    $parsedFullDate = null;
                    $parsedYMDDate = null;
        
                    // Try to parse "October 1 2024" or "October 01 2024" format
                    if (\DateTime::createFromFormat('F j Y', $term) !== false) {
                        $parsedFullDate = \Carbon\Carbon::createFromFormat('F j Y', $term);
                    } elseif (\DateTime::createFromFormat('F d Y', $term) !== false) {
                        $parsedFullDate = \Carbon\Carbon::createFromFormat('F d Y', $term);
                    }
        
                    // Try to parse "2024-10-11" format
                    if (\DateTime::createFromFormat('Y-m-d', $term) !== false) {
                        $parsedYMDDate = \Carbon\Carbon::createFromFormat('Y-m-d', $term);
                    }
        
                    // Add date conditions to the query
                    if ($parsedFullDate) {
                        $q->orWhereDate('application_date', '=', $parsedFullDate->format('Y-m-d'));
                    } elseif ($parsedYMDDate) {
                        $q->orWhereDate('application_date', '=', $parsedYMDDate->format('Y-m-d'));
                    } else {
                        // Fallback to searching other fields
                        $q->orWhere('application_date', 'like', '%' . $term . '%')
                          ->orWhere('task_title', 'like', '%' . $term . '%')
                          ->orWhere('assigned_task', 'like', '%' . $term . '%');
                    }
                }
            })->orderBy('application_date', 'desc')->paginate(5);
        } else {
            $results = $query->orderBy('application_date', 'desc')->paginate(5);
        }

        return view('livewire.mytasks.my-tasks-table', [
            'TasksData' => $results,
        ]);
    }

    public function getEmployeeName($employee_id){
        $name = Employee::where('employee_id', $employee_id)->select('first_name', 'middle_name', 'last_name')->first();
        return $name->first_name . ' ' . $name->middle_name . ' ' . $name->last_name;
    }

    public function cancelForm($index){
        $dataToUpdate = ['status' => 'Cancelled',
                         'cancelled_at' => now()];
        // $this->authorize('delete', $leaveRequestData);
        Mytasks::where('uuid', $index)->update($dataToUpdate);
        return redirect()->route('TasksTable');
    }

}
