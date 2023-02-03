<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Cashregister;
use Illuminate\Auth\Access\HandlesAuthorization;

class CashregisterPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the cashregister can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list cashregisters');
    }

    /**
     * Determine whether the cashregister can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Cashregister  $model
     * @return mixed
     */
    public function view(User $user, Cashregister $model)
    {
        return $user->hasPermissionTo('view cashregisters');
    }

    /**
     * Determine whether the cashregister can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create cashregisters');
    }

    /**
     * Determine whether the cashregister can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Cashregister  $model
     * @return mixed
     */
    public function update(User $user, Cashregister $model)
    {
        return $user->hasPermissionTo('update cashregisters');
    }

    /**
     * Determine whether the cashregister can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Cashregister  $model
     * @return mixed
     */
    public function delete(User $user, Cashregister $model)
    {
        return $user->hasPermissionTo('delete cashregisters');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Cashregister  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete cashregisters');
    }

    /**
     * Determine whether the cashregister can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Cashregister  $model
     * @return mixed
     */
    public function restore(User $user, Cashregister $model)
    {
        return false;
    }

    /**
     * Determine whether the cashregister can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Cashregister  $model
     * @return mixed
     */
    public function forceDelete(User $user, Cashregister $model)
    {
        return false;
    }
}
