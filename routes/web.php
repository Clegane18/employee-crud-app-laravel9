<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\EmployeeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Handles routing for authentication and employee management.
*/

// Authentication Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::post('/logout', function () {
    session()->forget('user_id');
    return redirect('/login')->with('success', 'Logged out successfully.');
})->name('logout');

// Protected routes for Employee Management (CRUD)
Route::middleware('session.auth')->group(function () {
    Route::resource('employees', EmployeeController::class);
});
