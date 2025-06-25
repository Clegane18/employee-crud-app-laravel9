<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


use App\Http\Controllers\Auth\LoginController;

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// Dashboard test page (after login)
Route::get('/dashboard', function () {
    return '
        <h2>Welcome, you are logged in!</h2>
        <form method="POST" action="/logout">
            ' . csrf_field() . '
            <button type="submit">Logout</button>
        </form>
    ';
})->middleware('session.auth');

Route::post('/logout', function () {
    Session::forget('user_id');
    return redirect('/login')->with('success', 'Logged out successfully.');
})->name('logout');