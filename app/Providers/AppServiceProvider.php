<?php

namespace App\Providers;

use App\Models\User;
use App\Policies\DashboardPolicy;
use App\Policies\ReferencesPolicy;
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
        Gate::define('view-user', [UserPolicy::class, 'view']);

        // Dashboard
        Gate::define('view-dashboard', [DashboardPolicy::class, 'view']);

        // References
        Gate::define('view-reference', [ReferencesPolicy::class, 'view']);
    }
}
