```php
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CreatorController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

// Login dan Logout
Route::get('/login', [AuthController::class, 'showformlogin'])->name('login');
Route::post('/proses', [AuthController::class, 'proseslogin'])->name('login.proses');
Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard')->middleware('auth');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// Halaman berdasarkan role
Route::group(['middleware' => ['auth', 'role:user']], function () {
    Route::get('/user', function () {
        return view('user');
    })->name('user');
});

Route::group(['middleware' => ['auth', 'role:admin']], function () {
    Route::get('/admin', function () {
        return view('admin');
    })->name('admin');
});

Route::group(['middleware' => ['auth', 'role:creator']], function () {
    Route::get('/creator', function () {
        return view('creator');
    })->name('creator');
});

Route::group(['middleware' => ['auth', 'role:customer']], function () {
    Route::get('/customer', function () {
        return view('customer');
    })->name('customer');
});

// Profil Creator
Route::middleware(['auth'])->group(function () {
    Route::get('/creator/profile', [CreatorController::class, 'profile'])
        ->name('creator.profile');

    Route::get('/creator/profile/create', [CreatorController::class, 'create'])
        ->name('creator.create');

    Route::post('/creator/profile', [CreatorController::class, 'store'])
        ->name('creator.store');
});
```