<?php

namespace App\Policies;

use App\Models\User;

class AdminPolicy
{
    /**
     * Checkt, ob der Benutzer ein Admin ist
     * @param \App\Models\User $user
     * @return bool
     */
    public function isAdmin(User $user)
    {
        return $user->role === 'admin';
    }
}
