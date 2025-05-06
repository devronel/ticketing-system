<?php

namespace App\Providers;

use App\Models\User;
use App\Policies\AllTicketPolicy;
use App\Policies\DashboardPolicy;
use App\Policies\DepartmentPolicy;
use App\Policies\MyTicketPolicy;
use App\Policies\ReferencesPolicy;
use App\Policies\RolePermissionPolicy;
use App\Policies\UserPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // User
        Gate::define('user.view', [UserPolicy::class, 'view']);
        Gate::define('user.edit', [UserPolicy::class, 'edit']);
        Gate::define('user.create', [UserPolicy::class, 'create']);
        Gate::define('user.delete', [UserPolicy::class, 'delete']);

        // Role
        Gate::define('role.view', [RolePermissionPolicy::class, 'view']);
        Gate::define('role.edit', [RolePermissionPolicy::class, 'edit']);
        Gate::define('role.create', [RolePermissionPolicy::class, 'create']);
        Gate::define('role.delete', [RolePermissionPolicy::class, 'delete']);

        // Department
        Gate::define('department.view', [DepartmentPolicy::class, 'view']);
        Gate::define('department.edit', [DepartmentPolicy::class, 'edit']);
        Gate::define('department.create', [DepartmentPolicy::class, 'create']);
        Gate::define('department.delete', [DepartmentPolicy::class, 'delete']);

        // Reference
        Gate::define('reference.view', [ReferencesPolicy::class, 'view']);
        Gate::define('reference.edit', [ReferencesPolicy::class, 'edit']);
        Gate::define('reference.create', [ReferencesPolicy::class, 'create']);
        Gate::define('reference.delete', [ReferencesPolicy::class, 'delete']);

        // All Ticket
        Gate::define('all-ticket.view', [AllTicketPolicy::class, 'view']);
        Gate::define('all-ticket.edit', [AllTicketPolicy::class, 'edit']);
        Gate::define('all-ticket.create', [AllTicketPolicy::class, 'create']);
        Gate::define('all-ticket.delete', [AllTicketPolicy::class, 'delete']);

        // My Ticket
        Gate::define('my-ticket.view', [MyTicketPolicy::class, 'view']);
        Gate::define('my-ticket.edit', [MyTicketPolicy::class, 'edit']);
        Gate::define('my-ticket.create', [MyTicketPolicy::class, 'create']);
        Gate::define('my-ticket.delete', [MyTicketPolicy::class, 'delete']);
    }
}
