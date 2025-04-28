<?php

namespace App\Policies;

use App\Models\User;

class RolePermissionPolicy
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
        return $user->hasPermission('role.view');
    }

    public function edit(User $user): bool
    {
        return $user->hasPermission('role.edit');
    }

    public function create(User $user): bool
    {
        return $user->hasPermission('role.create');
    }

    public function delete(User $user): bool
    {
        return $user->hasPermission('role.delete');
    }
}
