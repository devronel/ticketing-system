<?php

namespace App\Policies;

use App\Models\User;

class DepartmentPolicy
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
        return $user->hasPermission('department.view');
    }

    public function edit(User $user): bool
    {
        return $user->hasPermission('department.edit');
    }

    public function create(User $user): bool
    {
        return $user->hasPermission('department.create');
    }

    public function delete(User $user): bool
    {
        return $user->hasPermission('department.delete');
    }
}
