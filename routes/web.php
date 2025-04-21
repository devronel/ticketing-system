<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\ResidentController;
use App\Livewire\Admin\Auth\Login as LoginIndex;
use App\Livewire\Admin\BlotterRecords\Index as BlotterRecordIndex;
use App\Livewire\Admin\Certification\Index as CertificationIndex;
use App\Livewire\Admin\Dashboard\Index as DashboardIndex;
use App\Livewire\Admin\Officials\Index as BarangayOfficialsIndex;
use App\Livewire\Admin\Residence\Index as ResidenceIndex;
use App\Livewire\Book;
use Illuminate\Support\Facades\Route;

// Authentication
Route::get('/login', LoginIndex::class)->name('login');
Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');

// Residence route
Route::middleware(['auth'])->prefix('dashboard')->name('dashboard.')->group(function () {
    Route::get('/', DashboardIndex::class)->name('index');
});
