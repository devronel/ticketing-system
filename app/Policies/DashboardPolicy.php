<?php

namespace App\Policies;

use App\Models\User;

class DashboardPolicy
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
        return $user->hasPermission('admin-dashboard.view');
    }

    public function edit(User $user): bool
    {
        return $user->hasPermission('admin-dashboard.edit');
    }

    public function create(User $user): bool
    {
        return $user->hasPermission('admin-dashboard.create');
    }

    public function delete(User $user): bool
    {
        return $user->hasPermission('admin-dashboard.delete');
    }
}
