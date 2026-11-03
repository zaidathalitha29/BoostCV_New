<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $orders = Order::with([
            'customer',
            'creator.user',
            'service',
            'payment'
        ])
        ->when($request->status, function ($query, $status) {
            $query->where('status', $status);
        })
        ->when($request->search, function ($query, $search) {
            $query->where('order_number', 'like', "%{$search}%");
        })
        ->latest()
        ->paginate(10);

        return view('admin.orders.index', compact('orders'));
    }

    public function show($id)
    {
        $order = Order::with([
            'customer',
            'creator.user',
            'service',
            'payment',
            'revisions',
            'cancellationRequests'
        ])->findOrFail($id);

        return view('admin.orders.show', compact('order'));
    }
}