<?php

namespace App\Policies;

use App\Bagian;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BagianPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Bagian  $bagian
     * @return mixed
     */
    public function view(User $user, Bagian $bagian)
    {
        return in_array($user->email, [
            'admin@gmail.com'
        ]);
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->email === 'admin@gmail.com';
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Bagian  $bagian
     * @return mixed
     */
    public function update(User $user, Bagian $bagian)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Bagian  $bagian
     * @return mixed
     */
    public function delete(User $user, Bagian $bagian)
    {
        return in_array($user->email,[
            'admin@gmail.com'
        ]);
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Bagian  $bagian
     * @return mixed
     */
    public function restore(User $user, Bagian $bagian)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Bagian  $bagian
     * @return mixed
     */
    public function forceDelete(User $user, Bagian $bagian)
    {
        //
    }
}
