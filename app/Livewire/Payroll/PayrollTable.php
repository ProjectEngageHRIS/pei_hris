<?php

namespace App\Livewire\Payroll;

use Carbon\Carbon;
use App\Models\Payroll;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class PayrollTable extends Component
{
    use WithPagination;

    public $filterName;

    public $filter;

    public $search = "";

    public $resultsCount;

    public $phaseFilter;

    public $phaseFilterName;
    public $monthFilter;
    
    public $monthFilterName;
    public $yearFilter;

    public $yearFilterName;


    public function search()
    {
        $this->resetPage();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    // public function view($start_date){
    //     return redirect()->to(route('PayrollView', ['date' => $start_date]));
    // }

    public function mount(){
        $date = Carbon::now();
        $this->monthFilter = $date->format('F');
        $this->yearFilter = $date->format('Y');
    }



    public function render()
    {
        $loggedInUser = auth()->user();

        $query = Payroll::where('target_employee', $loggedInUser->employee_id)->select('target_employee', 'month', 'phase', 'year', 'payroll_id');
        
        
        switch ($this->phaseFilter) {
            case '1':
                $query->where('phase', '1st Half');
                $this->phaseFilterName = "1st Half";
                break;
            case '2':
                $query->where('phase', '2nd Half');
                $this->phaseFilterName = "2nd Half";
                break;
            default:
                $this->phaseFilterName = "All";
                break;
        }

        switch ($this->monthFilter) {
            case 'January':
                $query->where('month', 'January');
                $this->monthFilterName = "January";
                break;
            case 'February':
                $query->where('month', 'February');
                $this->monthFilterName = "February";
                break;
            case 'March':
                $query->where('month', 'March');
                $this->monthFilterName = "March";
                break;
            case 'April':
                $query->where('month', 'April');
                $this->monthFilterName = "April";
                break;
            case 'May':
                $query->where('month', 'May');
                $this->monthFilterName = "May";
                break;
            case 'June':
                $query->where('month', 'June');
                $this->monthFilterName = "June";
                break;
            case 'July':
                $query->where('month', 'July');
                $this->monthFilterName = "July";
                break;
            case 'August':
                $query->where('month', 'August');
                $this->monthFilterName = "August";
                break;
            case 'September':
                $query->where('month', 'September');
                $this->monthFilterName = "September";
                break;
            case 'October':
                $query->where('month', 'October');
                $this->monthFilterName = "October";
                break;
            case 'November':
                $query->where('month', 'November');
                $this->monthFilterName = "November";
                break;
            case 'December':
                $query->where('month', 'December');
                $this->monthFilterName = "December";
                break;
            default:
                $this->monthFilterName = "All";
                break;
        }

        switch ($this->yearFilter) {
            case '2024':
                $query->where('year', 2024);
                $this->yearFilterName = "2024";
                break;
            case '2023':
                $query->where('year', 2023);
                $this->yearFilterName = "2023";
                break;
            case '2022':
                $query->where('year', 2022);
                $this->yearFilterName = "2022";
                break;
            case '2021':
                $query->where('year', 2021);
                $this->yearFilterName = "2021";
                break;
            case '2020':
                $query->where('year', 2020);
                $this->yearFilterName = "2020";
                break;
            case '2019':
                $query->where('year', 2019);
                $this->yearFilterName = "2019";
                break;
            case '2018':
                $query->where('year', 2018);
                $this->yearFilterName = "2018";
                break;
            case '2017':
                $query->where('year', 2017);
                $this->yearFilterName = "2017";
                break;
            case '2016':
                $query->where('year', 2016);
                $this->yearFilterName = "2016";
                break;
            case '2015':
                $query->where('year', 2015);
                $this->yearFilterName = "2015";
                break;
            case '2014':
                $query->where('year', 2014);
                $this->yearFilterName = "2014";
                break;
            case '2013':
                $query->where('year', 2013);
                $this->yearFilterName = "2013";
                break;
            case '2012':
                $query->where('year', 2012);
                $this->yearFilterName = "2012";
                break;
            case '2011':
                $query->where('year', 2011);
                $this->yearFilterName = "2011";
                break;
            case '2010':
                $query->where('year', 2010);
                $this->yearFilterName = "2010";
                break;
            case '2009':
                $query->where('year', 2009);
                $this->yearFilterName = "2009";
                break;
            case '2008':
                $query->where('year', 2008);
                $this->yearFilterName = "2008";
                break;
            case '2007':
                $query->where('year', 2007);
                $this->yearFilterName = "2007";
                break;
            case '2006':
                $query->where('year', 2006);
                $this->yearFilterName = "2006";
                break;
            case '2005':
                $query->where('year', 2005);
                $this->yearFilterName = "2005";
                break;
            case '2004':
                $query->where('year', 2004);
                $this->yearFilterName = "2004";
                break;
            case '2003':
                $query->where('year', 2003);
                $this->yearFilterName = "2003";
                break;
            case '2002':
                $query->where('year', 2002);
                $this->yearFilterName = "2002";
                break;
            case '2001':
                $query->where('year', 2001);
                $this->yearFilterName = "2001";
                break;
            case '2000':
                $query->where('year', 2000);
                $this->yearFilterName = "2000";
                break;
            case '1999':
                $query->where('year', 1999);
                $this->yearFilterName = "1999";
                break;
            default:
                $this->yearFilterName = "All";
                break;
        }
        
        

        if (strlen($this->search) >= 1) {
            $query->where('month', 'like', '%' . $this->search . '%');
        }
    
        $results = $query->orderBy('created_at', 'desc')->paginate(5);
    
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

    public function redirectToPayroll($payroll_id) {
        $loggedInUser = auth()->user()->employee_id;

        try {
            $payroll = Payroll::where('payroll_id', $payroll_id)->select('payroll_id', 'target_employee', 'payroll_picture')->first();

            if(!$payroll){
                throw new \Exception('No Payroll Can be Found');
            }
            if(!$payroll->payroll_picture){
                throw new \Exception('No Link Exists');
            }
        
            if ($payroll->target_employee != $loggedInUser) {
                return route('PayrollTable');
            } else {
                return $payroll->payroll_picture;
            }

        } catch (\Exception $e) {
            // Log the exception for further investigation
            Log::channel('accountingerrors')->error('Failed to View Payslip: ' . $e->getMessage() . ' | ' . $loggedInUser);
            $this->dispatch('trigger-error');            
        }
    }

}
