<?php

namespace App\Policies;

use App\Models\Note;
use App\Models\User;

class NotePolicy
{
    /**
     * Determine if user can view any notes
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine if user can view the note
     */
    public function view(User $user, Note $note): bool
    {
        // Super Admin can view all notes
        if ($user->hasRole('Super Admin')) {
            return true;
        }

        // Owner can view
        if ($note->user_id === $user->id) {
            return true;
        }

        // Check if note is shared with user
        return $note->isSharedWith($user->id);
    }

    /**
     * Determine if user can create notes
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine if user can update the note
     */
    public function update(User $user, Note $note): bool
    {
        // Super Admin can update all notes
        if ($user->hasRole('Super Admin')) {
            return true;
        }

        // Owner can update
        if ($note->user_id === $user->id) {
            return true;
        }

        // Check if user has edit permission through sharing
        return $note->canBeEditedBy($user->id);
    }

    /**
     * Determine if user can delete the note
     */
    public function delete(User $user, Note $note): bool
    {
        // Super Admin can delete all notes
        if ($user->hasRole('Super Admin')) {
            return true;
        }

        // Only owner can delete (shared users cannot delete)
        return $note->user_id === $user->id;
    }

    /**
     * Determine if user can manage attachments
     */
    public function manageAttachments(User $user, Note $note): bool
    {
        return $this->update($user, $note);
    }

    /**
     * Determine if user can share the note
     */
    public function share(User $user, Note $note): bool
    {
        // Super Admin can share any note
        if ($user->hasRole('Super Admin')) {
            return true;
        }

        // Owner can share
        if ($note->user_id === $user->id) {
            return true;
        }

        // Check if user has reshare permission
        $share = $note->getShareFor($user->id);

        return $share && $share->can_reshare;
    }
}
