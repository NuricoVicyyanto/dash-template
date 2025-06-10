<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('dashboard.index');
})->middleware('auth'); // Wajib login bro!

// Auth Routes
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// User Management (Wajib login bro, bisa dibatasi admin-only nanti kalau mau)
Route::middleware(['auth'])->group(function () {
    Route::get('/users', [UserController::class, 'index'])->name('users.index'); // list user
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create'); // form create user
    Route::post('/users', [UserController::class, 'store'])->name('users.store'); // simpan user baru
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit'); // form edit user
    Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update'); // update user
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy'); // hapus user
});
