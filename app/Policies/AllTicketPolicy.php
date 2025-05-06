<?php

namespace App\Policies;

use App\Models\User;

class AllTicketPolicy
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
        return $user->hasPermission('all-ticket.view');
    }

    public function edit(User $user): bool
    {
        return $user->hasPermission('all-ticket.edit');
    }

    public function create(User $user): bool
    {
        return $user->hasPermission('all-ticket.create');
    }

    public function delete(User $user): bool
    {
        return $user->hasPermission('all-ticket.delete');
    }
}
