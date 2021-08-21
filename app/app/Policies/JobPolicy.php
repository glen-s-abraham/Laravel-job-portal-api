<?php

namespace App\Policies;

use App\Models\JobList;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class JobPolicy
{
    use HandlesAuthorization;
    /**
     * Perform pre-authorization checks.
     *
     * @param  \App\Models\User  $user
     * @param  string  $ability
     * @return void|bool
     */
    public function before(User $user, $ability)
    {
        if ($user->role_id == 1) {
            return true;
        }
    }

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\JobList  $jobList
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, JobList $jobList)
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->role_id == 2;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\JobList  $job
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, JobList $job)
    {
        return $user->id == $job->user_id &&
               $user->role_id == 2;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\JobList  $job
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, JobList $job)
    {
        return $user->id == $job->user_id &&
               $user->role_id == 2;
    }

    
}
