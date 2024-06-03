<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\SignupController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\Auth\ForgotPasswordController;



Route::get('/login', function () {return view('loginPage');})->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::delete('/logout', [LogoutController::class, 'logout'])->name('logout');

Route::get('/signup', [SignupController::class, 'showSignupForm'])->name('signup');
Route::post('/signup', [SignupController::class, 'signup']);




Route::middleware(['role:admin'])->name('admin.')->group(function() {
Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('dashboard');
    // Routes pour la gestion des utilisateurs
    Route::get('/admin/users', [AdminUserController::class, 'index'])->name('users.list');
    Route::get('/admin/users/create', [AdminUserController::class, 'create'])->name('users.create');
    Route::post('/admin/users', [AdminUserController::class, 'store'])->name('users.store');
    Route::get('/admin/users/{user}/edit', [AdminUserController::class, 'edit'])->name('users.edit');
    Route::put('/admin/users/{user}', [AdminUserController::class, 'update'])->name('users.update');
    Route::delete('/admin/users/{user}', [AdminUserController::class, 'destroy'])->name('users.destroy');
});


Route::middleware(['role:user'])->name('user.')->group(function() {
Route::get('/user/dashboard', [UserController::class, 'index'])->name('dashboard');
});



Route::get('/task/create', [TaskController::class, 'create'])->name('task-create');
Route::post('/task/store', [TaskController::class, 'store'])->name('tasks.store');
Route::get('/task/{task}', [TaskController::class, 'show'])->name('tasks.show');
Route::get('/tasks/{task}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
Route::put('/tasks/{task}', [TaskController::class, 'update'])->name('tasks.update');
Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');
Route::get('/tasks/filter/{status}', [TaskController::class, 'filterByStatus'])->name('tasks.filter');



Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('forgot-password');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');
