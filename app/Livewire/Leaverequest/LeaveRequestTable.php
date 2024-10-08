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

    public $supervisor_status_filter;
    public $president_status_filter;


    public $dateFilterName = "All";
    public $supervisorFilterName = "All";
    public $presidentFilterName = "All";

    public $dayFilter;

    public $dayFilterName;
    public $monthFilter;
    
    public $monthFilterName;
    public $yearFilter;

    public $yearFilterName;

    public $currentMonth;

    public $currentYear;

    public $currentMonthName;


    public $search = "";

    public $type;

    public $currentFormId;

    // public $president_status_filter =
    // [
    //     'Approved' => Null
    // ]
    
    public function search()
    {
        $this->resetPage();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function mount($type = null){
        $now = Carbon::now();
        $currentYear = $now->year;
        $currentMonth = $now->month;
        $currentMonthName = $now->format('F');
        $this->currentYear = $currentYear;
        $this->currentMonth = $currentMonth;
        $this->currentMonthName = $currentMonthName;
        $this->yearFilter = $currentYear;
        $this->monthFilter = $currentMonth;
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

        // if ($this->dayFilter == "all") {
        //     $this->dayFilterName = "*";
        // } else {
        //     $dateToday = Carbon::now();
        //     $query->whereDay('created_at', $this->dayFilter ?? $dateToday->day);
        //     $this->dayFilterName = $this->dayFilter ?? $dateToday->day;
        // }
    
        // if ($this->monthFilter == null) {
        //     $query->whereMonth('created_at', $this->currentMonth);
        //     $this->monthFilterName = $this->currentMonthName;
        // } else {
        //     $monthNames = [
        //         1 => "January",
        //         2 => "February",
        //         3 => "March",
        //         4 => "April",
        //         5 => "May",
        //         6 => "June",
        //         7 => "July",
        //         8 => "August",
        //         9 => "September",
        //         10 => "October",
        //         11 => "November",
        //         12 => "December"
        //     ];
        //     if (array_key_exists($this->monthFilter, $monthNames)) {
        //         $query->whereMonth('created_at', $this->monthFilter);
        //         $this->monthFilterName = $monthNames[$this->monthFilter];
        //     } else {
        //         $this->monthFilterName = "All";
        //     }
        // }
    
        // $query->whereYear('created_at', $this->yearFilter ?? $dateToday->year);
        // $this->yearFilterName = $this->yearFilter ?? $dateToday->year;

        switch ($this->date_filter) {
            case '1':
                $query->whereDate('application_date',  Carbon::today());
                $this->dateFilterName = "Today";
                break;
            case '2':
                $query->whereBetween('application_date', [Carbon::today()->startOfWeek(), now()]);
                $this->dateFilterName = "This Week";
                break;
            case '3':
                $query->whereBetween('application_date', [Carbon::today()->startOfMonth(), now()]);
                $this->dateFilterName = "This Month";
                break;
            case '4':
                $query->whereBetween('application_date', [Carbon::today()->subMonths(6), now()]);
                // $query->where('application_date', '>=', Carbon::today()->subMonths(6));
                $this->dateFilterName = "Last 6 Months";
                break;
            case '5':
                $query->whereBetween('application_date', [Carbon::today()->subYear(), now()]);
                // $query->where('application_date', '>=', Carbon::today()->subYear());
                $this->dateFilterName = "This Year";
                break;
            default:
                $this->dateFilterName = "All";
                break;
        }

        switch ($this->supervisor_status_filter) {
            case '1':
                $query->where('approved_by_supervisor', 1);
                $this->supervisorFilterName = "Approved";
                break;
            case '2':
                $query->whereNull('approved_by_supervisor');
                $this->supervisorFilterName = "Pending";
                break;
            case '3':
                $query->where('approved_by_supervisor', 0);
                $this->supervisorFilterName = "Declined";
                break;
            default:
                $this->supervisorFilterName = "All";
                break;
        }

        switch ($this->president_status_filter) {
            case '1':
                $query->where('approved_by_president', 1);
                $this->presidentFilterName = "Approved";
                break;
            case '2':
                $query->whereNull('approved_by_president');
                $this->presidentFilterName = "Pending";
                break;
            case '3':
                $query->where('approved_by_president', 0);
                $this->presidentFilterName = "Declined";
                break;
            default:
                $this->presidentFilterName = "All";
                break;
        }


        if(strlen($this->search) >= 1){
            $results = $query->where('application_date', 'like', '%' . $this->search . '%')->orderBy('application_date', 'desc')->paginate(5);
        } else {
            $results = $query->orderBy('application_date', 'desc')->paginate(5);
        }

        if(strlen($this->search) >= 1){
            $searchTerms = explode(' ', $this->search);
            $results = $query->where(function ($q) use ($searchTerms) {
                foreach ($searchTerms as $term) {
                    $q->orWhere('application_date', 'like', '%' . $term . '%')
                      ->orWhere('mode_of_application', 'like', '%' . $term . '%')
                      ->orWhere('inclusive_start_date', 'like', '%' . $term . '%')
                      ->orWhere('inclusive_end_date', 'like', '%' . $term . '%')
                      ->orWhere('reason', 'like', '%' . $term . '%');
                    //   ->orWhere('start_of_employment', 'like', '%' . $term . '%');
                }
            })->orderBy('application_date', 'desc')->paginate(5);
        } else {
            $results = $query->orderBy('application_date', 'desc')->paginate(5);
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
        $employee_id = auth()->user()->employee_id;
        try{
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
            Log::channel('leaverequests')->error('Failed to update Leave Request: ' . $e->getMessage() . ' | ' . $employee_id);

            // Dispatch a failure event with an error message
            $this->dispatch('triggerError');

            // return redirect()->back()->withErrors('Something went wrong. Please contact IT support.');
        }
        
    }
}
