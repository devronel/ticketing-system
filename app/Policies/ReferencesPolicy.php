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
        return $user->hasPermission('reference.view');
    }

    public function edit(User $user): bool
    {
        return $user->hasPermission('reference.edit');
    }

    public function create(User $user): bool
    {
        return $user->hasPermission('reference.create');
    }

    public function delete(User $user): bool
    {
        return $user->hasPermission('reference.delete');
    }
}
