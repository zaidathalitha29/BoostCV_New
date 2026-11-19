<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\PaymentController as AdminPaymentController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\ServiceController as AdminServiceController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\CancellationController as AdminCancellationController;

use App\Http\Controllers\Creator\CreatorController;
use App\Http\Controllers\Creator\PortofolioController;
use App\Http\Controllers\Creator\CreatorDashboardController;
use App\Http\Controllers\Creator\ServiceController as CreatorServiceController;
use App\Http\Controllers\Creator\NotificationController;
use App\Http\Controllers\Creator\OrderController as CreatorOrderController;
use App\Http\Controllers\Creator\ReviewController;
use App\Http\Controllers\Creator\EarningsController;
use App\Http\Controllers\Creator\PayoutController;

use App\Http\Controllers\Customer\DashboardController as CustomerDashboardController;
use App\Http\Controllers\Customer\ServiceController as CustomerServiceController;
use App\Http\Controllers\Customer\OrderController as CustomerOrderController;
use App\Http\Controllers\Customer\OrderHistoryController;
use App\Http\Controllers\Customer\CancellationController;
use App\Http\Controllers\Customer\RevisionController;
use App\Http\Controllers\Customer\DownloadController;
use App\Http\Controllers\Customer\PaymentController as CustomerPaymentController;
use App\Http\Controllers\Customer\ReviewController as CustomerReviewController;


Route::get('/', function () {
    return view('welcome');
});


Route::get('/register', [AuthController::class, 'showRegister'])
    ->middleware('guest')
    ->name('register');

Route::post('/register', [AuthController::class, 'registerProses'])
    ->middleware('guest')
    ->name('register.proses');

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


/*
|--------------------------------------------------------------------------
| USER ROUTES
|--------------------------------------------------------------------------
*/

Route::group(['middleware' => ['auth', 'role:user']], function () {

    Route::get('/user', function () {
        return view('user');
    })->name('user');

});


/*
|--------------------------------------------------------------------------
| ADMIN ROUTES
|--------------------------------------------------------------------------
*/

Route::group(['middleware' => ['auth', 'role:admin']], function () {

    Route::get('/admin', [AdminDashboardController::class, 'index'])
        ->name('admin');


    // Payments

    Route::get('/admin/payments', [AdminPaymentController::class, 'index'])
        ->name('admin.payments.index');

    Route::get('/admin/payments/{id}', [AdminPaymentController::class, 'show'])
        ->name('admin.payments.show');

    Route::post('/admin/payments/{id}/verify', [AdminPaymentController::class, 'verify'])
        ->name('admin.payments.verify');

    Route::post('/admin/payments/{id}/reject', [AdminPaymentController::class, 'reject'])
        ->name('admin.payments.reject');


    // Orders

    Route::get('/admin/orders', [AdminOrderController::class, 'index'])
        ->name('admin.orders.index');

    Route::get('/admin/orders/{id}', [AdminOrderController::class, 'show'])
        ->name('admin.orders.show');


    // Users

    Route::get('/admin/users', [AdminUserController::class, 'index'])
        ->name('admin.users.index');

    Route::get('/admin/users/{id}', [AdminUserController::class, 'show'])
        ->name('admin.users.show');

    Route::put('/admin/users/{id}', [AdminUserController::class, 'update'])
        ->name('admin.users.update');

    Route::delete('/admin/users/{id}', [AdminUserController::class, 'destroy'])
        ->name('admin.users.destroy');


    // Services

    Route::get('/admin/services', [AdminServiceController::class, 'index'])
        ->name('admin.services.index');

    Route::get('/admin/services/{id}', [AdminServiceController::class, 'show'])
        ->name('admin.services.show');

    Route::post('/admin/services/{id}/approve', [AdminServiceController::class, 'approve'])
        ->name('admin.services.approve');

    Route::post('/admin/services/{id}/reject', [AdminServiceController::class, 'reject'])
        ->name('admin.services.reject');


    // Categories

    Route::get('/admin/categories', [AdminCategoryController::class, 'index'])
        ->name('admin.categories.index');

    Route::post('/admin/categories', [AdminCategoryController::class, 'store'])
        ->name('admin.categories.store');

    Route::put('/admin/categories/{id}', [AdminCategoryController::class, 'update'])
        ->name('admin.categories.update');

    Route::delete('/admin/categories/{id}', [AdminCategoryController::class, 'destroy'])
        ->name('admin.categories.destroy');

    Route::post('/admin/categories/{id}/toggle-status', [AdminCategoryController::class, 'toggleStatus'])
        ->name('admin.categories.toggle-status');


    // Cancellations

    Route::get('/admin/cancellations', [AdminCancellationController::class, 'index'])
        ->name('admin.cancellations.index');

    Route::get('/admin/cancellations/{id}', [AdminCancellationController::class, 'show'])
        ->name('admin.cancellations.show');

    Route::post('/admin/cancellations/{id}/approve', [AdminCancellationController::class, 'approve'])
        ->name('admin.cancellations.approve');

    Route::post('/admin/cancellations/{id}/reject', [AdminCancellationController::class, 'reject'])
        ->name('admin.cancellations.reject');

});


/*
|--------------------------------------------------------------------------
| CREATOR ROUTES
|--------------------------------------------------------------------------
*/

Route::group(['middleware' => ['auth', 'role:creator']], function () {

    Route::get('/creator', function () {
        return view('creator');
    })->name('creator');

    Route::get('/creator/dashboard', [CreatorDashboardController::class, 'index'])
        ->name('creator.dashboard');


    // Profile

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


    // Portofolio

    Route::get('/creator/portofolio', [PortofolioController::class, 'index'])
        ->name('creator.portofolio.index');

    Route::get('/creator/portofolio/create', [PortofolioController::class, 'create'])
        ->name('creator.portofolio.create');

    Route::post('/creator/portofolio', [PortofolioController::class, 'store'])
        ->name('creator.portofolio.store');

    Route::get('/creator/portofolio/{id}/edit', [PortofolioController::class, 'edit'])
        ->name('creator.portofolio.edit');

    Route::get('/creator/portofolio/{id}', [PortofolioController::class, 'show'])
        ->name('creator.portofolio.show');

    Route::put('/creator/portofolio/{id}', [PortofolioController::class, 'update'])
        ->name('creator.portofolio.update');

    Route::delete('/creator/portofolio/{id}', [PortofolioController::class, 'destroy'])
        ->name('creator.portofolio.destroy');


    // Services

    Route::get('/creator/services', [CreatorServiceController::class, 'index'])
        ->name('creator.services.index');

    Route::get('/creator/services/create', [CreatorServiceController::class, 'create'])
        ->name('creator.services.create');

    Route::post('/creator/services', [CreatorServiceController::class, 'store'])
        ->name('creator.services.store');

    Route::get('/creator/services/{id}/edit', [CreatorServiceController::class, 'edit'])
        ->name('creator.services.edit');

    Route::put('/creator/services/{id}', [CreatorServiceController::class, 'update'])
        ->name('creator.services.update');

    Route::delete('/creator/services/{id}', [CreatorServiceController::class, 'destroy'])
        ->name('creator.services.destroy');


    // Orders

    Route::get('/creator/orders', [CreatorOrderController::class, 'index'])
        ->name('creator.orders.index');

    Route::get('/creator/orders/{id}/edit', [CreatorOrderController::class, 'edit'])
        ->name('creator.orders.edit');

    Route::get('/creator/orders/{id}', [CreatorOrderController::class, 'show'])
        ->name('creator.orders.show');

    Route::put('/creator/orders/{id}', [CreatorOrderController::class, 'update'])
        ->name('creator.orders.update');


    // Reviews

    Route::get('/creator/reviews', [ReviewController::class, 'index'])
        ->name('creator.reviews.index');

    Route::get('/creator/reviews/{id}', [ReviewController::class, 'show'])
        ->name('creator.reviews.show');


    // Notifications

    Route::get('/creator/notifications', [NotificationController::class, 'index'])
        ->name('creator.notifications.index');

    Route::get('/creator/notifications/{id}', [NotificationController::class, 'show'])
        ->name('creator.notifications.show');


    // Earnings

    Route::get('/creator/earnings', [EarningsController::class, 'index'])
        ->name('creator.earnings.index');

    Route::get('/creator/earnings/{id}', [EarningsController::class, 'show'])
        ->name('creator.earnings.show');


    // Payouts

    Route::get('/creator/payouts', [PayoutController::class, 'index'])
        ->name('creator.payouts.index');

    Route::get('/creator/payouts/create', [PayoutController::class, 'create'])
        ->name('creator.payouts.create');

    Route::post('/creator/payouts', [PayoutController::class, 'store'])
        ->name('creator.payouts.store');

    Route::get('/creator/payouts/{id}', [PayoutController::class, 'show'])
        ->name('creator.payouts.show');

});


/*
|--------------------------------------------------------------------------
| CUSTOMER ROUTES
|--------------------------------------------------------------------------
*/

Route::group(['middleware' => ['auth', 'role:customer']], function () {

    Route::get('/customer', [CustomerDashboardController::class, 'index'])
        ->name('customer.dashboard');


    // Services

    Route::get('/customer/services', [CustomerServiceController::class, 'index'])
        ->name('customer.services');

    Route::get('/customer/services/{id}', [CustomerServiceController::class, 'show'])
        ->name('customer.services.show');


    // Orders

    Route::get('/customer/orders', [CustomerOrderController::class, 'index'])
        ->name('customer.orders');

    Route::get('/customer/services/{serviceId}/order', [CustomerOrderController::class, 'create'])
        ->name('customer.orders.create');

    Route::post('/customer/services/{serviceId}/order', [CustomerOrderController::class, 'store'])
        ->name('customer.orders.store');

    Route::get('/customer/orders/{id}', [CustomerOrderController::class, 'show'])
        ->name('customer.orders.show');


    // Payments

    Route::get('/customer/orders/{orderId}/payment', [CustomerPaymentController::class, 'create'])
        ->name('customer.payments.create');

    Route::post('/customer/orders/{orderId}/payment', [CustomerPaymentController::class, 'store'])
        ->name('customer.payments.store');


    // Order History

    Route::get('/customer/history', [OrderHistoryController::class, 'index'])
        ->name('customer.history');

    Route::get('/customer/history/{id}', [OrderHistoryController::class, 'show'])
        ->name('customer.history.show');


    // Reviews

    Route::post('/customer/history/{id}/review', [CustomerReviewController::class, 'store'])
        ->name('customer.history.review.store');


    // Cancellations

    Route::get('/customer/cancellations', [CancellationController::class, 'index'])
        ->name('customer.cancellations.index');

    Route::get('/customer/orders/{orderId}/cancel', [CancellationController::class, 'create'])
        ->name('customer.cancellations.create');

    Route::post('/customer/orders/{orderId}/cancel', [CancellationController::class, 'store'])
        ->name('customer.cancellations.store');

    Route::get('/customer/cancellations/{id}', [CancellationController::class, 'show'])
        ->name('customer.cancellations.show');


    // Revisions

    Route::get('/customer/revisions', [RevisionController::class, 'index'])
        ->name('customer.revisions.index');

    Route::get('/customer/orders/{orderId}/revision', [RevisionController::class, 'create'])
        ->name('customer.revisions.create');

    Route::post('/customer/orders/{orderId}/revision', [RevisionController::class, 'store'])
        ->name('customer.revisions.store');

    Route::get('/customer/revisions/{id}', [RevisionController::class, 'show'])
        ->name('customer.revisions.show');


    // Downloads

    Route::get('/customer/orders/{id}/download', [DownloadController::class, 'download'])
        ->name('customer.download');

});
