<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::get('/admin/register', function () {
    return view('admin.register');
})->name('admin.register');

Route::post('/admin/register', [AdminController::class, 'register']);

Route::get('/admin/login', function () {
    return view('admin.login');
})->name('admin.login');

Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login.submit');

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/users/{userId}', [AdminController::class, 'userDetails'])->name('user.details');
});
