<?php

namespace App\Policies;

use App\Models\BlogPost;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        //
    }

    public function view(User $user, BlogPost $post)
    {
        //
    }

    public function create(User $user)
    {
        //
    }

    public function update(User $user, BlogPost $post)
    {
        if ($user->hasPermissionTo('edit post')) {
            return true;
        }

        return $user->id === $post->user_id;
    }

    public function delete(User $user, BlogPost $post)
    {
        if ($user->hasPermissionTo('delete post')) {
            return true;
        }

        return $user->id === $post->user_id;
    }

    public function destroy(User $user, BlogPost $post)
    {
        if ($user->hasPermissionTo('destroy post')) {
            return true;
        }

        return $user->id === $post->user_id;
    }

    public function restore(User $user, BlogPost $post)
    {
        //
    }

    public function forceDelete(User $user, BlogPost $post)
    {
        //
    }
}
