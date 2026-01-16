<?php

namespace App\Policies;

use App\Models\Log;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class LogPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any logs.
     */
    public function viewAny(User $user): bool
    {
        // All authenticated users can access the logs page
        return true;
    }

    /**
     * Determine whether the user can view the log.
     */
    public function view(User $user, Log $log): bool
    {
        // Super Admin can view all logs
        if ($user->hasRole('Super Admin')) {
            return true;
        }

        // User can view their own logs
        if ($log->user_id === $user->id) {
            return true;
        }

        // User can view logs shared with them
        return $log->isSharedWith($user->id);
    }

    /**
     * Determine whether the user can create logs.
     */
    public function create(User $user): bool
    {
        // All authenticated users can create logs
        return true;
    }

    /**
     * Determine whether the user can update the log.
     */
    public function update(User $user, Log $log): bool
    {
        // Super Admin can edit all logs
        if ($user->hasRole('Super Admin')) {
            return true;
        }

        // User can edit their own logs
        if ($log->user_id === $user->id) {
            return true;
        }

        // User can edit if they have edit permission via share
        return $log->canBeEditedBy($user->id);
    }

    /**
     * Determine whether the user can delete the log.
     */
    public function delete(User $user, Log $log): bool
    {
        // Super Admin can delete all logs
        if ($user->hasRole('Super Admin')) {
            return true;
        }

        // Only the owner can delete their own logs
        return $log->user_id === $user->id;
    }

    /**
     * Determine whether the user can share the log.
     */
    public function share(User $user, Log $log): bool
    {
        // Super Admin can share any log
        if ($user->hasRole('Super Admin')) {
            return true;
        }

        // Owner can share their logs
        if ($log->user_id === $user->id) {
            return true;
        }

        // User with reshare permission can share
        $share = $log->getShareFor($user->id);
        return $share && $share->can_reshare;
    }

    /**
     * Determine whether the user can manage attachments.
     */
    public function manageAttachments(User $user, Log $log): bool
    {
        // Super Admin can manage all attachments
        if ($user->hasRole('Super Admin')) {
            return true;
        }

        // Owner can manage their log attachments
        if ($log->user_id === $user->id) {
            return true;
        }

        // Users with edit permission can manage attachments
        return $log->canBeEditedBy($user->id);
    }

    /**
     * Determine whether the user can restore the log.
     */
    public function restore(User $user, Log $log): bool
    {
        // Only Super Admin and owner can restore
        return $user->hasRole('Super Admin') || $log->user_id === $user->id;
    }

    /**
     * Determine whether the user can permanently delete the log.
     */
    public function forceDelete(User $user, Log $log): bool
    {
        // Only Super Admin can force delete
        return $user->hasRole('Super Admin');
    }
}