<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Creator\CreatorController;
use App\Http\Controllers\Creator\PortfolioController;
use App\Http\Controllers\Creator\CreatorDashboardController;
use App\Http\Controllers\Creator\ServiceController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

// Register
Route::get('/register', [AuthController::class, 'showRegister'])
    ->middleware('guest')
    ->name('register');

Route::post('/register', [AuthController::class, 'registerProses'])
    ->middleware('guest')
    ->name('register.proses');

// Login dan Logout
Route::get('/login', [AuthController::class, 'showformlogin'])->name('login');
Route::post('/login', [AuthController::class, 'proseslogin'])->name('login.proses');
Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard')->middleware('auth');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// Login dan Logout
Route::get('/login', [AuthController::class, 'showformlogin'])
    ->name('login');

Route::post('/login', [AuthController::class, 'proseslogin'])
    ->name('login.proses');

Route::get('/dashboard', [AuthController::class, 'dashboard'])
    ->middleware('auth')
    ->name('dashboard');

Route::get('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

// Halaman User
Route::group(['middleware' => ['auth', 'role:user']], function () {
    Route::get('/user', function () {
        return view('user');
    })->name('user');
});

// Halaman Admin
Route::group(['middleware' => ['auth', 'role:admin']], function () {
    Route::get('/admin', function () {
        return view('admin');
    })->name('admin');
});

// Halaman Creator
Route::group(['middleware' => ['auth', 'role:creator']], function () {

    Route::get('/creator', function () {
        return view('creator');
    })->name('creator');

    // Dashboard Creator
    Route::get('/creator/dashboard', [CreatorDashboardController::class, 'index'])
        ->name('creator.dashboard');

    // Portfolio Creator
    Route::get('/creator/portfolio', [PortfolioController::class, 'index'])
        ->name('portfolio.index');

    Route::get('/creator/portfolio/create', [PortfolioController::class, 'create'])
        ->name('portfolio.create');

    Route::post('/creator/portfolio', [PortfolioController::class, 'store'])
        ->name('portfolio.store');

    Route::get('/creator/portfolio/{id}/edit', [PortfolioController::class, 'edit'])
        ->name('portfolio.edit');

    Route::put('/creator/portfolio/{id}', [PortfolioController::class, 'update'])
        ->name('portfolio.update');

    Route::delete('/creator/portfolio/{id}', [PortfolioController::class, 'destroy'])
        ->name('portfolio.destroy');

    // Layanan Creator
    Route::get('/creator/services', [ServiceController::class, 'index'])
        ->name('creator.services.index');

    Route::get('/creator/services/create', [ServiceController::class, 'create'])
        ->name('creator.services.create');

    Route::post('/creator/services', [ServiceController::class, 'store'])
        ->name('creator.services.store');

    Route::get('/creator/services/{id}/edit', [ServiceController::class, 'edit'])
        ->name('creator.services.edit');

    Route::put('/creator/services/{id}', [ServiceController::class, 'update'])
        ->name('creator.services.update');

    Route::delete('/creator/services/{id}', [ServiceController::class, 'destroy'])
        ->name('creator.services.destroy');
});

// Halaman Customer
Route::group(['middleware' => ['auth', 'role:customer']], function () {
    Route::get('/customer', function () {
        return view('customer');
    })->name('customer');
});

// Profil Creator
// Tetap menggunakan auth karena profil perlu dibuat
// sebelum Creator dapat mengakses dashboard.
Route::middleware(['auth'])->group(function () {

    Route::get('/creator/profile', [CreatorController::class, 'profile'])
        ->name('creator.profile');

    Route::get('/creator/profile/create', [CreatorController::class, 'create'])
        ->name('creator.create');

    Route::post('/creator/profile', [CreatorController::class, 'store'])
        ->name('creator.store');

    Route::get('/creator/profile/edit', [CreatorController::class, 'edit'])
        ->name('creator.edit');

    Route::put('/creator/profile', [CreatorController::class, 'update'])
        ->name('creator.update');
});