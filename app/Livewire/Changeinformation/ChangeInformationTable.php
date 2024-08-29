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
                $query->where('status',  'Completed');
                $this->statusFilterName = "Completed";
                break;
            case '2':
                $query->where('status', 'Ongoing');
                $this->statusFilterName = "Ongoing";
                break;
            case '3':
                $query->where('status', 'Report');
                $this->statusFilterName = "Report";
                break;
            case '4':
                $query->where('status', 'Unassigned');
                $this->statusFilterName = "Unassigned";
                break;
            case '4':
                $query->where('status', 'Cancelled');
                $this->statusFilterName = "Cancelled";
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
