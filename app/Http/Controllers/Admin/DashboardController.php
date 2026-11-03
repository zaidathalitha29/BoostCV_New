<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use App\Order;
use App\Service;
use App\Payment;

class DashboardController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        $totalCreators = User::where('role', 'creator')->count();
        $totalCustomers = User::where('role', 'customer')->count();

        $totalServices = Service::count();
        $pendingServices = Service::where('status', 'pending')->count();

        $totalOrders = Order::count();
        $pendingPayments = Payment::where(
            'status',
            'pending_verification'
        )->count();

        $recentOrders = Order::with([
            'customer',
            'creator',
            'service'
        ])->latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'totalUsers',
            'totalCreators',
            'totalCustomers',
            'totalServices',
            'pendingServices',
            'totalOrders',
            'pendingPayments',
            'recentOrders'
        ));
    }
}