<?php

namespace App\Livewire\Changeinformation;

use App\Models\ChangeInformation;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;
use Illuminate\Support\Facades\Log;

class ChangeInformationTable extends Component
{
        
    use WithPagination, WithoutUrlPagination;

    public $vacationCredits;
    public $sickCredits;

    public $date_filter;

    public $status_filter;

    public $dateFilterName = "All";
    public $statusFilterName = "All";

    public $search = "";

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

        $query = ChangeInformation::where('employee_id', $loggedInUser->employee_id);

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
            case '4':
                $query->where('status', 'Cancelled');
                $this->statusFilterName = "Cancelled";
                break;
            default:
                $this->statusFilterName = "All";
                break;
        }

        if (strlen($this->search) >= 1) {
            // Remove commas from the search input
            $searchTerms = preg_replace('/,/', '', $this->search);
            $results = $query->where(function ($q) use ($searchTerms) {
                // Handle different formats for full date matching
                $parsedFullDate = null;
        
                // Try to parse "October 1 2024" or "October 01 2024" format
                if (\DateTime::createFromFormat('F j Y', $searchTerms) !== false) {
                    $parsedFullDate = Carbon::createFromFormat('F j Y', $searchTerms);
                } elseif (\DateTime::createFromFormat('F d Y', $searchTerms) !== false) {
                    $parsedFullDate = Carbon::createFromFormat('F d Y', $searchTerms);
                }
        
                // Check if the term is a full date
                if ($parsedFullDate) {
                    $q->orWhereDate('application_date', '=', $parsedFullDate->format('Y-m-d'));
                } else {
                    // Split searchTerms into individual words for fallback
                    $terms = explode(' ', $searchTerms);
                    foreach ($terms as $term) {
                        $q->orWhere('application_date', 'like', '%' . $term . '%')
                          ->orWhere('status', 'like', '%' . $term . '%');
                    }
                }
            })->orderBy('application_date', 'desc')->paginate(5);
        } else {
            $results = $query->orderBy('application_date', 'desc')->paginate(5);
        }
        

        return view('livewire.changeinformation.change-information-table', [
            'ChangeInfoData' => $results,
        ]);
    }

    public function cancelForm(){
        try{
            $employee_id = auth()->user()->employee_id;
            $data = ChangeInformation::where('employee_id', $employee_id)
                            ->where('uuid', $this->currentFormId)
                            ->select('uuid', 'form_id', 'employee_id', 'status', 'cancelled_at') 
                            ->first();
            if($data){
                if($data->employee_id == $employee_id){
                    $data->status = "Cancelled";
                    $data->cancelled_at = now();
                    $data->save();
                    $this->dispatch('triggerSuccess'); 
                }
            }
        } catch (\Exception $e) {
            // Log the exception for further investigation
            Log::channel('failedforms')->error('Failed to update Hrticket: ' . $e->getMessage());

            // Dispatch a failure event with an error message
            $this->dispatch('triggerError');

            // Optionally, you could redirect the user to an error page or show an error message
            return redirect()->back()->withErrors('Something went wrong. Please contact IT support.');
        }
        
    }

}
