<?php

namespace App\Livewire\Activities;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\Employee;
use App\Models\Activities;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\Dailytimerecord;
use Livewire\Attributes\Locked;
use Illuminate\Support\Facades\DB;
use Livewire\WithoutUrlPagination;
use Illuminate\Support\Facades\Log;

class ActivitiesGallery extends Component
{   
    use WithFileUploads;
    use WithPagination;
    use WithoutUrlPagination;

    public $filter;

    #[Locked]
    public $is_head;


    // Edit
    public $type;
    public $subject;
    public $poster;
    public $removedImage = False;
    public $description;
    public $date;
    public $start;
    public $end;
    public $publisher;
    public $is_featured;
    public $visible_to_list;

    public $currentFormId;

    public function mount(){
        $start = microtime(true);
        $loggedInUser = auth()->user()->role_id;
        $role_ids = json_decode($loggedInUser, true);

        try {
            if(!in_array(4, $role_ids) && !in_array(61024, $role_ids)){
            // if (empty(array_intersect($role_ids, [4, 61024]))) {
                throw new \Exception('Unauthorized Access');
            }
        } catch (\Exception $e) {
            // Log the exception for further investigation
            Log::channel('activities')->error('Failed to view Approve Leave Request Table: ' . $e->getMessage() . ' | ' . $loggedInUser );
            return redirect()->to(route('EmployeeDashboard'));
        }
        $time2 = microtime(true) - $start;
        dd($time2);
    }


    public function getActivityPhoto($index){
        // $imageFile = $this->editLeaveRequest($this->index);
        $imageFile = Activities::where('activity_id', $index)->value('poster');
        return $imageFile;
    }

    public function deleteActivity(){
        try {
            Activities::where('activity_id', $this->currentFormId)->select('activity_id', 'deleted_at')->update(['deleted_at' => now()]);
            $this->dispatch('triggerSuccessDelete');
        } catch (\Exception $e) {
            // Log the exception for further investigation
            Log::channel('activities')->error('Failed to Delete Announcement: ' . $e->getMessage());

            // Dispatch a failure event with an error message
            $this->dispatch('triggerError');
        }

    }

    public function fillData($data){
        if($data){
            $this->type = $data['type'];
        }
    }

    public function updated($key){
        if($key == "poster") {
            $this->removedImage = False;
        }
    }

    public function editAnnouncement($id){
        try {
            $activity = Activities::where('activity_id', $id)->first();
            // Update fields only if the corresponding property is set
            if ($this->type) $activity->type = $this->type;
            if ($this->subject) $activity->subject = $this->subject;
            if ($this->date) $activity->date = $this->date;
            if ($this->start) $activity->start = $this->start;
            if ($this->end) $activity->end = $this->end;
            if ($this->publisher){
                if($this->publisher == "You"){
                    $loggedInUser = auth()->user()->employee_id;
                    $employee = Employee::select('first_name', 'middle_name', 'last_name', 'department')->where('employee_id', $loggedInUser)->first();
                    $activity->publisher = $employee->first_name . ' ' . $employee->middle_name . ' ' . $employee->last_name;
                } else {
                    $activity->publisher = $this->publisher;
                }
            }
            if ($this->is_featured !== null) $activity->is_featured = $this->is_featured; // Check for null explicitly
            if ($this->visible_to_list !== null) $activity->visible_to_list = $this->visible_to_list; // Check for null explicitly

            if ($this->poster){
                if($this->type == "Announcement"){
                    $activity->poster = $this->poster->store('photos/activities/announcement', 'public');
                }
                else if($this->type == "Event"){
                    $activity->poster = $this->poster->store('photos/activities/event', 'public');
                }
                else if($this->type == "Seminar"){
                    $activity->poster = $this->poster->store('photos/activities/seminar', 'public');
                }
                else if($this->type == "Training"){
                    $activity->poster = $this->poster->store('photos/activities/training', 'public');
                }
                else if($this->type == "Others"){
                    $activity->poster = $this->poster->store('photos/activities/others', 'public');
                } else {
                    $activity->poster = $this->poster->store('photos/activities/notype', 'public');
                }
            }
            // Save the updated activity record
            $activity->update();
            return $this->dispatch('triggerSuccessEdit');

        } catch (\Exception $e) {
            // Log the exception for further investigation
            Log::channel('activities')->error('Failed to Edit Announcement: ' . $e->getMessage());

            // Dispatch a failure event with an error message
            $this->dispatch('triggerError');
        }
        // dd($id, $this->type, $this->subject, $this->poster, $this->date, $this->start, $this->end, $this->publisher, $this->is_featured, $this->visible_to_list);
    }

    protected $rules = [
        'type' => 'required|in:Announcement,Event,Seminar,Training,Others',
        'subject' => 'required|min:2|max:150',
        'poster' => 'required|mimes:jpg,png|extensions:jpg,png',
        'description' => 'required|min:2|max:10000',
        'start' => 'required|before_or_equal:end',
        'end' => 'required|after_or_equal:start',
        'is_featured' => 'nullable|boolean',
        // 'publisher' => 'required',
        // 'publisher' => 'required|in:College of Information System and Technology Management,College of Engineering,College of Business Administration,College of Liberal Arts,College of Sciences,College of Education,Finance Department,Human Resources Department,Information Technology Department,Legal Department',
        'visible_to_list' => 'required|array|min:1',
        'visible_to_list.*' => 'required'
        
    ];

    public function addAnnouncement(){

        // foreach($this->rules as $rule => $validationRule){
        //     $this->validate([$rule => $validationRule]);
        //     $this->resetValidation();
        // }   

        $dateToday = Carbon::now()->toDateString();;

        $this->validate(['date' => 'required|after_or_equal:'.$dateToday]);

        try {

            $activitydata = new Activities();

            $activitydata->type = $this->type;
            // $activitydata->activity_id = $randomNumber;
            $activitydata->subject = $this->subject;
            $activitydata->description = $this->description;
            $activitydata->status = "Active";

            if($this->type == "Announcement"){
                $activitydata->poster = $this->poster->store('photos/activities/announcement', 'public');
            }
            else if($this->type == "Event"){
                $activitydata->poster = $this->poster->store('photos/activities/event', 'public');
            }
            else if($this->type == "Seminar"){
                $activitydata->poster = $this->poster->store('photos/activities/seminar', 'public');
            }
            else if($this->type == "Training"){
                $activitydata->poster = $this->poster->store('photos/activities/training', 'public');
            }
            else if($this->type == "Others"){
                $activitydata->poster = $this->poster->store('photos/activities/others', 'public');
            }

            // $imageData = file_get_contents($this->poster->getRealPath());
            // $activitydata->poster = $imageData;
            $activitydata->date = $this->date;
            $activitydata->start = $this->start;
            $activitydata->end = $this->end;

            $loggedInUser = auth()->user()->employee_id;

            $employee = Employee::select('first_name', 'middle_name', 'last_name', 'department')->where('employee_id', $loggedInUser)->first();


            if($this->publisher == "You"){
                $activitydata->publisher = $employee->first_name . ' ' . $employee->middle_name . ' ' . $employee->last_name;
            } else {
                $activitydata->publisher = $this->publisher;
            }
   

            // dd($activitydata->publisher);
            $activitydata->is_featured = $this->is_featured ?? 0;
            $activitydata->visible_to_list = $this->visible_to_list;

            $activitydata->save();
            $this->dispatch('triggerSuccess');

        } catch (\Exception $e) {
            // Log the exception for further investigation
            Log::channel('activities')->error('Failed to Create Announcement: ' . $e->getMessage());

            // Dispatch a failure event with an error message
            $this->dispatch('triggerError');
        }
    }

    public function removeImage(){
        $this->removedImage = True;
        $this->poster = null;
    }

    public function filterListener(){
        // $loggedInUser = auth()->user();
        // $collegeName = Employee::where('employee_id', $loggedInUser->employee_id)
        //                         ->value('college_id');
        // if($loggedInUser->role_id == 0){
            // $activities =  Activities::paginate(1);
        // }
        $activities =  Activities::whereNull('deleted_at');

        
        if($this->filter == "Announcement"){
            $activities =  Activities::where('type', 'Announcement') // Add additional conditions if needed
                                    ->orderBy('created_at', 'desc');
        } else if($this->filter == "Event"){
            $activities =  Activities::where('type', 'Event') // Add additional conditions if needed
                                    ->orderBy('created_at', 'desc');
        } else if($this->filter == "Seminar"){
            $activities =  Activities::where('type', 'Seminar') // Add additional conditions if needed
                                    ->orderBy('created_at', 'desc');
        } else if($this->filter == "Training"){
            $activities =  Activities::where('type', 'Training') // Add additional conditions if needed
                                    ->orderBy('created_at', 'desc');
        } else if($this->filter == "Others"){
            $activities =  Activities::where('type', 'Others') // Add additional conditions if needed
                                    ->orderBy('created_at', 'desc');
        }

        $activities = $activities->paginate(6);

        // else if($this->filter == "Event"){
        //     $activities =  Activities::where(function ($query) use ($collegeName) {
        //                 foreach ($collegeName as $college) {
        //                 $college_name = DB::table('colleges')->where('college_id', $college)->value('college_name');
        //                     $query->orWhereJsonContains('visible_to_list', $college_name);
        //                 }
        //                 })
        //                 ->where('type', 'Event')
        //                 ->where('status', '!=', 'Deleted')
        //                 ->orderBy('created_at', 'desc')
        //                 ->paginate(10);
        // }
        // else if($this->filter == "Seminar"){
        //     $activities =  Activities::where(function ($query) use ($collegeName) {
        //                 foreach ($collegeName as $college) {
        //                 $college_name = DB::table('colleges')->where('college_id', $college)->value('college_name');
        //                     $query->orWhereJsonContains('visible_to_list', $college_name);
        //                 }
        //                 })
        //                 ->where('type', 'Seminar')
        //                 ->where('status', '!=', 'Deleted')
        //                 ->orderBy('created_at', 'desc')
        //                 ->paginate(10);
        // }
        // else if($this->filter == "Training"){
        //     $activities =  Activities::where(function ($query) use ($collegeName) {
        //             foreach ($collegeName as $college) {
        //             $college_name = DB::table('colleges')->where('college_id', $college)->value('college_name');
        //                 $query->orWhereJsonContains('visible_to_list', $college_name);
        //             }
        //             })
        //             ->where('type', 'Training')
        //             ->where('status', '!=', 'Deleted')
        //             ->orderBy('created_at', 'desc')
        //             ->paginate(10);
        // }
        // else if($this->filter == "Others"){
        //     $activities = Activities::where(function ($query) use ($collegeName) {
        //             foreach ($collegeName as $college) {
        //             $college_name = DB::table('colleges')->where('college_id', $college)->value('college_name');
        //                 $query->orWhereJsonContains('visible_to_list', $college_name);
        //             }
        //             })
        //             ->where('type', 'Others')
        //             ->where('status', '!=', 'Deleted')
        //             ->orderBy('created_at', 'desc')
        //             ->paginate(10);
        // }
        // else{
        //     $activities =  Activities::where(function ($query) use ($collegeName) {
        //         foreach ($collegeName as $college) {
        //         $college_name = DB::table('colleges')->where('college_id', $college)->value('college_name');
        //             $query->orWhereJsonContains('visible_to_list', $college_name);
        //         }
        //     })->where('status', '!=', 'Deleted')
        //     ->orderBy('created_at', 'desc')
        //     ->paginate(10);
        // }
        return $activities;
    }

    public function fillerSetter($type){
       return $this->filter = $type;
    }
    
    public function render()
    {
        return view('livewire.activities.activities-gallery', [
            'ActivitiesData' => $this->filterListener(),
        ])->layout('components.layouts.hr-navbar');
    }
}
