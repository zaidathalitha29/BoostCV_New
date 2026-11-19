<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use App\Creator;
use App\Service;
use App\Order;
use App\Payment;

class DashboardController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        $totalCreators = Creator::count();
        $totalServices = Service::count();
        $totalOrders = Order::count();

        $totalPayments = Payment::count();

        $pendingPayments = Payment::where(
            'status',
            'pending_verification'
        )->count();

        $verifiedPayments = Payment::where(
            'status',
            'verified'
        )->count();

        $recentPayments = Payment::with([
            'order.customer'
        ])
        ->latest()
        ->take(5)
        ->get();

        return view('admin.dashboard', compact(
            'totalUsers',
            'totalCreators',
            'totalServices',
            'totalOrders',
            'totalPayments',
            'pendingPayments',
            'verifiedPayments',
            'recentPayments'
        ));
    }
}