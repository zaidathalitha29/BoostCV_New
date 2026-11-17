<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;
use App\Service;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();

        // Menghitung pesanan yang masih aktif
        $activeOrders = Order::where('customer_id', $user->id)
            ->whereIn('status', [
                'pending_payment',
                'payment_rejected',
                'in_progress',
                'revision'
            ])
            ->count();

        // Menghitung pesanan selesai
        $completedOrders = Order::where('customer_id', $user->id)
            ->where('status', 'completed')
            ->count();

        // Menghitung seluruh pesanan Customer
        $totalOrders = Order::where('customer_id', $user->id)
            ->count();

        // Menghitung layanan yang sudah disetujui Admin
        $availableServices = Service::where('status', 'approved')
            ->count();

        // Mengambil 5 pesanan terbaru
        $latestOrders = Order::with([
            'service',
            'creator.user',
            'payment'
        ])
            ->where('customer_id', $user->id)
            ->latest()
            ->take(5)
            ->get();

        return view('customer.dashboard', compact(
            'user',
            'activeOrders',
            'completedOrders',
            'totalOrders',
            'availableServices',
            'latestOrders'
        ));
    }

}