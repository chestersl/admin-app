<?php

use App\Http\Controllers\{Dashboard\CompanyController,
    Dashboard\DashboardController,
    Dashboard\EmployeeController,
    Home\HomeController,
    LocalizationController};
use Illuminate\Support\Facades\Route;


Route::get('language/{locale}', [LocalizationController::class, 'set'])->name('locale');

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware(
    [
        'auth:sanctum',
        config('jetstream.auth_session'),
        'verified',
    ]
)
    ->prefix('dashboard')
    ->group(function () {
    Route::get('/', [DashboardController::class, 'show'])->name('dashboard');
    Route::resource('/company', CompanyController::class);
    Route::resource('/employee', EmployeeController::class);
});
