<?php

namespace App\Policies;

use App\Models\Plan;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PlanPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the plan can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list plans');
    }

    /**
     * Determine whether the plan can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Plan  $model
     * @return mixed
     */
    public function view(User $user, Plan $model)
    {
        return $user->hasPermissionTo('view plans');
    }

    /**
     * Determine whether the plan can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create plans');
    }

    /**
     * Determine whether the plan can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Plan  $model
     * @return mixed
     */
    public function update(User $user, Plan $model)
    {
        return $user->hasPermissionTo('update plans');
    }

    /**
     * Determine whether the plan can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Plan  $model
     * @return mixed
     */
    public function delete(User $user, Plan $model)
    {
        return $user->hasPermissionTo('delete plans');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Plan  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete plans');
    }

    /**
     * Determine whether the plan can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Plan  $model
     * @return mixed
     */
    public function restore(User $user, Plan $model)
    {
        return false;
    }

    /**
     * Determine whether the plan can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Plan  $model
     * @return mixed
     */
    public function forceDelete(User $user, Plan $model)
    {
        return false;
    }
}
