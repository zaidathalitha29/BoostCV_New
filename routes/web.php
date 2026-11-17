<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Creator\CreatorController;
use App\Http\Controllers\Creator\PortofolioController;
use App\Http\Controllers\Creator\CreatorDashboardController;
use App\Http\Controllers\Creator\ServiceController;

// Controller Customer
use App\Http\Controllers\Customer\DashboardController;
use App\Http\Controllers\Customer\ServiceController as CustomerServiceController;
use App\Http\Controllers\Customer\OrderController;
use App\Http\Controllers\Customer\OrderHistoryController;
use App\Http\Controllers\Customer\CancellationController;
use App\Http\Controllers\Customer\RevisionController;
use App\Http\Controllers\Customer\DownloadController;

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
Route::get('/login', [AuthController::class, 'showformlogin'])
    ->name('login');

Route::post('/login', [AuthController::class, 'proseslogin'])
    ->name('login.proses');

Route::get('/dashboard', [AuthController::class, 'dashboard'])
    ->middleware('auth')
    ->name('dashboard');

Route::post('/logout', [AuthController::class, 'logout'])
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

    // Portofolio Creator
    Route::get('/creator/portofolio', [PortofolioController::class, 'index'])
        ->name('portofolio.index');

    Route::get('/creator/portofolio/create', [PortofolioController::class, 'create'])
        ->name('portofolio.create');

    Route::post('/creator/portofolio', [PortofolioController::class, 'store'])
        ->name('portofolio.store');

    Route::get('/creator/portofolio/{id}/edit', [PortofolioController::class, 'edit'])
        ->name('portofolio.edit');

    Route::put('/creator/portofolio/{id}', [PortofolioController::class, 'update'])
        ->name('portofolio.update');

    Route::delete('/creator/portofolio/{id}', [PortofolioController::class, 'destroy'])
        ->name('portofolio.destroy');

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

    // Dashboard Customer
    Route::get('/customer', [DashboardController::class, 'index'])
        ->name('customer.dashboard');

    // Cari Layanan
    Route::get('/customer/services', [CustomerServiceController::class, 'index'])
        ->name('customer.services');

    Route::get('/customer/services/{id}', [CustomerServiceController::class, 'show'])
        ->name('customer.services.show');

    // Pemesanan
    Route::get('/customer/orders', [OrderController::class, 'index'])
        ->name('customer.orders');

    Route::get('/customer/services/{serviceId}/order', [OrderController::class, 'create'])
        ->name('customer.orders.create');

    Route::post('/customer/services/{serviceId}/order', [OrderController::class, 'store'])
        ->name('customer.orders.store');

    Route::get('/customer/orders/{id}', [OrderController::class, 'show'])
        ->name('customer.orders.show');

    // Riwayat Pesanan
    Route::get('/customer/history', [OrderHistoryController::class, 'index'])
        ->name('customer.history');

    Route::get('/customer/history/{id}', [OrderHistoryController::class, 'show'])
        ->name('customer.history.show');

    // Pembatalan Pesanan
    Route::get('/customer/cancellations', [CancellationController::class, 'index'])
        ->name('customer.cancellations.index');

    Route::get('/customer/orders/{orderId}/cancel', [CancellationController::class, 'create'])
        ->name('customer.cancellations.create');

    Route::post('/customer/orders/{orderId}/cancel', [CancellationController::class, 'store'])
        ->name('customer.cancellations.store');

    Route::get('/customer/cancellations/{id}', [CancellationController::class, 'show'])
        ->name('customer.cancellations.show');

    // Revisi Pesanan
    Route::get('/customer/revisions', [RevisionController::class, 'index'])
        ->name('customer.revisions.index');

    Route::get('/customer/orders/{orderId}/revision', [RevisionController::class, 'create'])
        ->name('customer.revisions.create');

    Route::post('/customer/orders/{orderId}/revision', [RevisionController::class, 'store'])
        ->name('customer.revisions.store');

    Route::get('/customer/revisions/{id}', [RevisionController::class, 'show'])
        ->name('customer.revisions.show');

    // Download Hasil CV
    Route::get('/customer/orders/{id}/download', [DownloadController::class, 'download'])
        ->name('customer.download');
});

// Profil Creator
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