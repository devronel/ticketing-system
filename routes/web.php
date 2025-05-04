<?php

use App\Http\Controllers\AuthController;
use App\Livewire\Admin\Auth\Login as LoginIndex;
use App\Livewire\Admin\Dashboard\Index as DashboardIndex;
use App\Livewire\Admin\Department\Index as DepartmentIndex;
use App\Livewire\Admin\PriorityReference\Index as PriorityReferenceIndex;
use App\Livewire\Admin\Roles\Index as RolesIndex;
use App\Livewire\Admin\StatusReference\Index as StatusReferenceIndex;
use App\Livewire\Admin\Ticket\Index as TicketManagementIndex;
use App\Livewire\Admin\UserManagement\Index as UserManagementIndex;
use App\Livewire\Customer\Dashboard\Index as CustomerDashboardIndex;
use App\Livewire\Customer\Ticket\Create as CustomerTicketCreate;
use App\Livewire\Customer\Ticket\Index as CustomerTicketIndex;
use Illuminate\Support\Facades\Route;

// Authentication
Route::get('/login', LoginIndex::class)->name('login');
Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');


Route::middleware(['auth'])->group(function () {
    Route::middleware(['is_admin'])->group(function () {
        // Dashboard Route
        Route::prefix('dashboard')->name('dashboard.')->group(function () {
            Route::get('/', DashboardIndex::class)->name('index');
        });

        // References Route
        Route::middleware('can:reference.view')->prefix('reference')->name('reference.')->group(function () {
            Route::get('/status', StatusReferenceIndex::class)->name('status');
            Route::get('/priority', PriorityReferenceIndex::class)->name('priority');
        });

        // User Management Route
        Route::prefix('user-management')->name('user-management.')->group(function () {
            Route::get('/', UserManagementIndex::class)->name('index')->middleware('can:user.view');
            Route::get('/roles', RolesIndex::class)->name('role.index')->middleware('can:role.view');
            Route::get('/department', DepartmentIndex::class)->name('department.index')->middleware('can:department.view');
        });

        Route::prefix('ticket-management')->name('ticket-management.')->group(function () {
            Route::get('/', TicketManagementIndex::class)->name('index');
        });
    });

    Route::prefix('customer')->name('customer.')->group(function () {
        Route::get('/', CustomerDashboardIndex::class)->name('dashboard.index');
        Route::get('/my-ticket', CustomerTicketIndex::class)->name('ticket.index');
        Route::get('/my-ticket/create', CustomerTicketCreate::class)->name('ticket.create');
    });
});
