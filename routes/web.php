<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\EmployeeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Handles routing for authentication and employee management.
*/

// Default Route: Redirect based on authentication status
Route::get('/', function () {
    return Session::has('user_id')
        ? redirect()->route('employees.index')
        : redirect()->route('login.form');
});

// Authentication Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::post('/logout', function () {
    Session::forget('user_id');
    return redirect('/login')->with('success', 'Logged out successfully.');
})->name('logout');

// Protected Employee Management Routes
Route::middleware('session.auth')->group(function () {
    Route::resource('employees', EmployeeController::class)->except(['show']);
    Route::get('/employees/summary', [EmployeeController::class, 'summary'])->name('employees.summary');
});
