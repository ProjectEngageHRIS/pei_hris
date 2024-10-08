<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Employee;
use App\Models\Changeinformation;
use Illuminate\Auth\Access\Response;

class ChangeInformationPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Changeinformation $changeinformation): bool
    {
        // return True;
        return $user->employee_id == $changeinformation->employee_id || $user->is_admin == True;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Changeinformation $changeinformation, $type = Null): bool
    {
        if($user->employee_id != $changeinformation->employee_id){
            return False;
        }
        return True;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Changeinformation $changeinformation): bool
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Changeinformation $changeinformation): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Changeinformation $changeinformation): bool
    {
        //
    }
}
