<?php

use App\Http\Controllers\AuthController;
use App\Livewire\Admin\Auth\Login as LoginIndex;
use App\Livewire\Admin\Dashboard\Index as DashboardIndex;
use App\Livewire\Admin\Department\Index as DepartmentIndex;
use App\Livewire\Admin\PriorityReference\Index as PriorityReferenceIndex;
use App\Livewire\Admin\Roles\Index as RolesIndex;
use App\Livewire\Admin\StatusReference\Index as StatusReferenceIndex;
use Illuminate\Support\Facades\Route;

// Authentication
Route::get('/login', LoginIndex::class)->name('login');
Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');

// Dashboard route
Route::middleware(['auth'])->prefix('dashboard')->name('dashboard.')->group(function () {
    Route::get('/', DashboardIndex::class)->name('index');
});


// Status references route
Route::middleware(['auth'])->prefix('status-reference')->name('status-reference.')->group(function () {
    Route::get('/', StatusReferenceIndex::class)->name('index');
});

// Priority references route
Route::middleware(['auth'])->prefix('priority-reference')->name('priority-reference.')->group(function () {
    Route::get('/', PriorityReferenceIndex::class)->name('index');
});

// Department route
Route::middleware(['auth'])->prefix('department')->name('department.')->group(function () {
    Route::get('/', DepartmentIndex::class)->name('index');
});

// Roles route
Route::middleware(['auth'])->prefix('roles')->name('roles.')->group(function () {
    Route::get('/', RolesIndex::class)->name('index');
});
