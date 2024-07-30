<?php

namespace App\Livewire\Activities;

use Livewire\Component;
use App\Models\Employee;
use App\Models\Activities;
use Livewire\WithFileUploads;
use App\Models\Dailytimerecord;
use Livewire\Attributes\Locked;
use Illuminate\Support\Facades\DB;

class ActivitiesGallery extends Component
{   
    use WithFileUploads;

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


    public function getActivityPhoto($index){
        // $imageFile = $this->editLeaveRequest($this->index);
        $imageFile = Activities::where('activity_id', $index)->value('poster');
        return $imageFile;
    }

    public function deleteActivity($id){
        Activities::where('activity_id', $id)->select('activity_id', 'deleted_at')->update(['deleted_at' => now()]);
        return $this->dispatch('triggerSuccess');
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
        $activity = Activities::where('activity_id', $id)->first();
        // Update fields only if the corresponding property is set
        if ($this->type) $activity->type = $this->type;
        if ($this->subject) $activity->subject = $this->subject;
        if ($this->date) $activity->date = $this->date;
        if ($this->start) $activity->start = $this->start;
        if ($this->end) $activity->end = $this->end;
        if ($this->publisher) $activity->publisher = $this->publisher;
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
        return $this->dispatch('triggerSuccess');
        // dd($id, $this->type, $this->subject, $this->poster, $this->date, $this->start, $this->end, $this->publisher, $this->is_featured, $this->visible_to_list);
    }

    public function removeImage(){
        $this->removedImage = True;
        $this->poster = null;
    }

    public function filterListener(){
        $loggedInUser = auth()->user();
        // $collegeName = Employee::where('employee_id', $loggedInUser->employee_id)
        //                         ->value('college_id');
        // if($loggedInUser->role_id == 0){
            $activities =  Activities::paginate(10);
        // }
        // else if($this->filter == "Announcement"){
        //     $activities =  Activities::whereJsonContains('visible_to_list', $collegeName)
        //     ->where('type', 'Announcement') // Add additional conditions if needed
        //     ->orderBy('created_at', 'desc')
        //     ->paginate(10);
        // }
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
        ])->extends('components.layouts.app');
    }
}
