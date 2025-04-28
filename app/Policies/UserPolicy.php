<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Support\Facades\Log;

class UserPolicy
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
        return $user->hasPermission('user.view');
    }

    public function edit(User $user): bool
    {
        return $user->hasPermission('user.edit');
    }

    public function create(User $user): bool
    {
        return $user->hasPermission('user.create');
    }

    public function delete(User $user): bool
    {
        return $user->hasPermission('user.delete');
    }
}
