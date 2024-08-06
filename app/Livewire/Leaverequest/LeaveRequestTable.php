<?php

namespace App\Livewire\Leaverequest;

use finfo;
use Carbon\Carbon;
use Livewire\Component;
use App\Models\Employee;
use App\Models\Leaverequest;
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;

class LeaveRequestTable extends Component
{
    use WithPagination, WithoutUrlPagination;

    public $vacationCredits;
    public $sickCredits;

    public $date_filter;

    public $status_filter;

    public $dateFilterName = "All";
    public $statusFilterName = "All";

    public $search = "";

    public $type;

    public $currentFormId;
    
    public function search()
    {
        $this->resetPage();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function mount($type = null){
        $this->type = $type;
        $loggedInUser = auth()->user()->employee_id;
        $employeeInformation = Employee::where('employee_id', $loggedInUser)
                                ->select('sick_credits', 'vacation_credits')->first();

        $this->vacationCredits = $employeeInformation->vacation_credits;
        $this->sickCredits = $employeeInformation->sick_credits;
    }

    public function render()
    {
        $loggedInUser = auth()->user();

        $query = Leaverequest::where('employee_id', $loggedInUser->employee_id);

        switch ($this->date_filter) {
            case '1':
                $query->whereDate('application_date',  Carbon::today());
                $this->dateFilterName = "Today";
                break;
            case '2':
                $query->where('application_date', '>=', Carbon::today()->startOfWeek());
                $this->dateFilterName = "This Week";
                break;
            case '3':
                $query->where('application_date', '>=', Carbon::today()->subMonth());
                $this->dateFilterName = "This Month";
                break;
            case '4':
                $query->where('application_date', '>=', Carbon::today()->subMonths(6));
                $this->dateFilterName = "Last 6 Months";
                break;
            case '5':
                $query->where('application_date', '>=', Carbon::today()->subYear());
                $this->dateFilterName = "This Year";
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

        return view('livewire.leaverequest.leave-request-table', [
            'LeaveRequestData' => $results,
        ]);
    }

    // public function download($reference_num){
    //     $leaveRequestData = Leaverequest::where('form_id', $reference_num)->first();
    //     $image = base64_decode($leaveRequestData->leave_form);
    //     $finfo = new finfo(FILEINFO_MIME_TYPE);
    //     $contentType = $finfo->buffer($image);
    //     // dd($contentType);
    //     switch($contentType){
    //         case "application/pdf":
    //             $fileName = "leaverequest.pdf";
    //             break;
    //         case "image/jpeg":
    //             $fileName = "leaverequest.jpg";
    //             break;
    //         case "image/png":
    //             $fileName = "leaverequest.png";
    //             break;
    //         default:
    //             abort(404);
    //     }
    //     return Response::make($image, 200, [
    //         'Content-Type' => $contentType,
    //         'Content-Disposition' => 'attachment; filename="'.$fileName.'"'
    //     ]);
    
    // }

    public function cancelForm(){
        try{
            $employee_id = auth()->user()->employee_id;
            $data = Leaverequest::where('employee_id', $employee_id)
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
            Log::channel('leaverequests')->error('Failed to update Hrticket: ' . $e->getMessage());

            // Dispatch a failure event with an error message
            $this->dispatch('triggerError');

            // return redirect()->back()->withErrors('Something went wrong. Please contact IT support.');
        }
        
    }
}
