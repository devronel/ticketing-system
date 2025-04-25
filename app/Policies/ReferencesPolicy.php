<?php

namespace App\Policies;

use App\Models\User;

class ReferencesPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function view(User $user): bool
    {
        return $user->role['permissions']['references_management']['sections']['reference']['can_view'];
    }
}
