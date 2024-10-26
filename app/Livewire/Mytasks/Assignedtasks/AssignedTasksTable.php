<?php

namespace App\Livewire\Mytasks\Assignedtasks;

use Carbon\Carbon;
use App\Models\Mytasks;
use Livewire\Component;
use App\Models\Employee;
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;
use Illuminate\Support\Facades\Log;

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
    
    public $status;

    public $currentFormId;

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
            case '1': // Today
                $startOfDay = Carbon::today(); // Start of today (00:00:00)
                $endOfDay = Carbon::today()->endOfDay(); // End of today (23:59:59)
                $query->whereBetween('application_date', [$startOfDay, $endOfDay]);
                $this->dateFilterName = "Today";
                break;
    
            case '2': // Last 7 Days
                $query->whereBetween('application_date', [Carbon::today()->subDays(6), Carbon::today()]);
                $this->dateFilterName = "Last 7 Days";
                break;
    
            case '3': // Last 30 Days
                $query->whereBetween('application_date', [Carbon::today()->subDays(30), Carbon::today()]);
                $this->dateFilterName = "Last 30 Days";
                break;
    
            case '4': // Last 6 Months
                $query->whereBetween('application_date', [Carbon::today()->subMonths(6), Carbon::today()]);
                $this->dateFilterName = "Last 6 Months";
                break;
    
            case '5': // Last Year
                $query->whereBetween('application_date', [Carbon::today()->subYear(), Carbon::today()]);
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
                        $parsedFullDate = Carbon::createFromFormat('F j Y', $term);
                    } elseif (\DateTime::createFromFormat('F d Y', $term) !== false) {
                        $parsedFullDate = Carbon::createFromFormat('F d Y', $term);
                    }
        
                    // Try to parse "2024-10-11" format
                    if (\DateTime::createFromFormat('Y-m-d', $term) !== false) {
                        $parsedYMDDate = Carbon::createFromFormat('Y-m-d', $term);
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

        return view('livewire.mytasks.assignedtasks.assigned-tasks-table', [
            'TasksData' => $results,
        ]);
    }

    public function changeStatus(){
        $loggedInUser = auth()->user();
        try {
            $form = Mytasks::find($this->currentFormId);
            if($form){
                if($form->employee_id == $loggedInUser->employee_id){
                    $dataToUpdate = ['status' => $this->status];
                    $form->update($dataToUpdate);
                    $this->dispatch('triggerSuccess'); 
                } else {
                    throw new \Exception('Unauthorized Access');
                }
            } else {
                throw new \Exception('No Record Found');
            }
        } catch (\Exception $e) {
            // Log the exception for further investigation
            Log::channel('tasks')->error('Failed to update Task: ' . $e->getMessage() . ' | ' . $loggedInUser->employee_id);

            // Log::channel('hrticket')->error('Failed to update Hrticket: ' . $e->getMessage());
            // Dispatch a failure event with an error message
            $this->dispatch('triggerError');
        }

    }

}
