<?php

namespace App\Policies;

use App\Models\History;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class HistoryPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user)
    {
        return $user->isAdmin() || $user->isProjectManager();
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, History $history)
    {
        return $user->isAdmin() || $user->id === $history->user_id;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user)
    {
        return $user->isAdmin() || $user->isProjectManager();
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, History $history)
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, History $history)
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, History $history): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, History $history): bool
    {
        return false;
    }
}
