<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\CategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', function () {
    return redirect()->route('login');
});
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', [DashboardController::class, 'edit'])->name('profile.edit');
    Route::post('/profile', [DashboardController::class, 'update'])->name('profile.update');
    Route::get('/password/change', [DashboardController::class, 'editpassword'])->name('password.change');
    Route::put('/password/change', [DashboardController::class, 'updatepassword'])->name('password.update');
    Route::resource('tasks', TaskController::class);
    Route::get('completed', [TaskController::class, 'completed'])->name('tasks.completed');
     Route::get('pending', [TaskController::class, 'pending'])->name('tasks.pending');
     Route::get('overdue', [TaskController::class, 'overdue'])->name('tasks.overdue');
    Route::resource('categories', CategoryController::class);
});
