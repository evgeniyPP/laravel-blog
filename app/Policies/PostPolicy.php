<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can add posts.
     *
     * @param  \App\User  $user
     * @return bool
     */
    public function add(User $user)
    {
        return $user->role->can_add_post == 1;
    }

    /**
     * Determine whether the user can edit posts.
     *
     * @param  \App\User  $user
     * @return bool
     */
    public function edit(User $user)
    {
        return $user->role->can_edit_post == 1;
    }

    /**
     * Determine whether the user can delete posts.
     *
     * @param  \App\User  $user
     * @param  \App\User  $model
     * @return bool
     */
    public function delete(User $user)
    {
        return $user->role->can_delete_post == 1;
    }
}
