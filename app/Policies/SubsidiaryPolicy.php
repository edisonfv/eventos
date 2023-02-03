<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Subsidiary;
use Illuminate\Auth\Access\HandlesAuthorization;

class SubsidiaryPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the subsidiary can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list subsidiaries');
    }

    /**
     * Determine whether the subsidiary can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Subsidiary  $model
     * @return mixed
     */
    public function view(User $user, Subsidiary $model)
    {
        return $user->hasPermissionTo('view subsidiaries');
    }

    /**
     * Determine whether the subsidiary can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create subsidiaries');
    }

    /**
     * Determine whether the subsidiary can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Subsidiary  $model
     * @return mixed
     */
    public function update(User $user, Subsidiary $model)
    {
        return $user->hasPermissionTo('update subsidiaries');
    }

    /**
     * Determine whether the subsidiary can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Subsidiary  $model
     * @return mixed
     */
    public function delete(User $user, Subsidiary $model)
    {
        return $user->hasPermissionTo('delete subsidiaries');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Subsidiary  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete subsidiaries');
    }

    /**
     * Determine whether the subsidiary can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Subsidiary  $model
     * @return mixed
     */
    public function restore(User $user, Subsidiary $model)
    {
        return false;
    }

    /**
     * Determine whether the subsidiary can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Subsidiary  $model
     * @return mixed
     */
    public function forceDelete(User $user, Subsidiary $model)
    {
        return false;
    }
}
