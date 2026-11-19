<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;

class OrderHistoryController extends Controller
{
    public function index()
    {
        $orders = Order::with([
            'service',
            'creator.user',
            'payment'
        ])
            ->where('customer_id', auth()->id())
            ->latest()
            ->paginate(10);

        return view('customer.history.index', compact('orders'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        $order = Order::with([
            'service',
            'creator.user',
            'payment',
            'revisions',
            'cancellationRequests',
            'review'
        ])
            ->where('customer_id', auth()->id())
            ->findOrFail($id);

        return view('customer.history.show', compact('order'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
