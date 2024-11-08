<?php

namespace App\Livewire\Hrtickets;

use finfo;
use Exception;
use Carbon\Carbon;
use Livewire\Component;
use App\Models\Employee;
use App\Models\Hrticket;
use App\Models\Leaverequest;
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;


class HrTicketsTable extends Component
{
    use WithPagination, WithoutUrlPagination;

    public $vacationCredits;
    public $sickCredits;

    public $date_filter;

    public $status_filter;
    public $type_filter;


    public $dateFilterName = "All";
    public $statusFilterName = "All";
    public $typeFilterName = "All";

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
                                ->select( 'sick_credits', 'vacation_credits')->first();

        $this->vacationCredits = $employeeInformation->vacation_credits;
        $this->sickCredits = $employeeInformation->sick_credits;
    }

    public function render()
    {
        $loggedInUser = auth()->user();
        $request_type = Null;
        if($this->type == "OT"){
            $request_type = "Leave Concerns";
        }

        if($request_type){
            $query = Hrticket::where('employee_id', $loggedInUser->employee_id)->where('sub_type_of_request', $request_type);
        } else {
            $query = Hrticket::where('employee_id', $loggedInUser->employee_id);
        }

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

        switch ($this->type_filter) {
            case '1':
                $query->where('type_of_ticket', 'HR Internal');
                $this->typeFilterName = "HR Internal";
                break;
            case '2':
                $query->where('type_of_ticket', 'Internal Control');
                $this->typeFilterName = "Internal Control";
                break;
            case '3':
                $query->where('type_of_ticket', 'HR Operations');
                $this->typeFilterName = "HR Operations";
                break;
            case '4':
                $query->where('type_of_request', 'HR');
                $this->typeFilterName = "HR";
                break;
            case '5':
                $query->where('type_of_request', 'Office Admin');
                $this->typeFilterName = "Office Admin";
                break;
            case '6':
                $query->where('type_of_request', 'Procurement');
                $this->typeFilterName = "Procurement";
                break;
            default:
                $this->typeFilterName = "All";
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
                          ->orWhere('concerned_employee', 'like', '%' . $term . '%')
                          ->orWhere('type_of_ticket', 'like', '%' . $term . '%')
                          ->orWhere('type_of_request', 'like', '%' . $term . '%')
                          ->orWhere('sub_type_of_request', 'like', '%' . $term . '%')
                          ->orWhere('purpose', 'like', '%' . $term . '%');
                    }
                }
            })->orderBy('created_at', 'desc')->paginate(5);
        } else {
            $results = $query->orderBy('created_at', 'desc')->paginate(5);
        }
        
        

        return view('livewire.hrtickets.hr-tickets-table', [
            'HrTicketData' => $results,
        ]);
    }

    // public function download($reference_num){
    //     $leaveRequestData = Leaverequest::where('reference_num', $reference_num)->first();
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
            $data = Hrticket::where('employee_id', $employee_id)
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
            Log::channel('hrticket')->error('Failed to update Hrticket: ' . $e->getMessage());

            // Dispatch a failure event with an error message
            $this->dispatch('triggerError');

            // Optionally, you could redirect the user to an error page or show an error message
            return redirect()->back()->withErrors('Something went wrong. Please contact IT support.');
        }
        
    }
}
