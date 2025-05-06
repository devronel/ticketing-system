<?php

namespace App\Policies;

use App\Models\User;

class MyTicketPolicy
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
        return $user->hasPermission('my-ticket.view');
    }

    public function edit(User $user): bool
    {
        return $user->hasPermission('my-ticket.edit');
    }

    public function create(User $user): bool
    {
        return $user->hasPermission('my-ticket.create');
    }

    public function delete(User $user): bool
    {
        return $user->hasPermission('my-ticket.delete');
    }
}
