<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;
use App\Service;

class OrderController extends Controller
{
    // Menampilkan daftar pesanan Customer
    public function index()
    {
        $orders = Order::with(['service', 'creator.user', 'payment'])
            ->where('customer_id', auth()->id())
            ->latest()
            ->paginate(10);

        return view('customer.orders.index', compact('orders'));
    }

    // Menampilkan formulir pemesanan
    public function create($serviceId)
    {
        $service = Service::with(['creator.user', 'category'])
            ->where('status', 'approved')
            ->findOrFail($serviceId);

        return view('customer.orders.create', compact('service'));
    }

    // Menyimpan pesanan Customer
    public function store(Request $request, $serviceId)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_notes' => 'nullable|string|max:1000'
        ], [
            'customer_name.required' => 'Nama pemesan wajib diisi.',
            'customer_notes.max' => 'Catatan maksimal 1000 karakter.'
        ]);

        $service = Service::where('status', 'approved')
            ->findOrFail($serviceId);

        $order = Order::create([
            'order_number' => 'BCV-' . date('YmdHis') . '-' . auth()->id(),
            'customer_id' => auth()->id(),
            'creator_id' => $service->creator_id,
            'service_id' => $service->id,
            'service_title' => $service->title,
            'customer_name' => $request->customer_name,
            'customer_notes' => $request->customer_notes,
            'price' => $service->price,
            'status' => 'pending_payment'
        ]);

        return redirect()->route('customer.orders.show', $order->id)
            ->with('success', 'Pesanan berhasil dibuat. Silakan lanjutkan pembayaran.');
    }

    // Menampilkan detail pesanan
    public function show($id)
    {
        $order = Order::with([
            'service',
            'creator.user',
            'payment',
            'revisions',
            'cancellationRequests'
        ])
            ->where('customer_id', auth()->id())
            ->findOrFail($id);

        return view('customer.orders.show', compact('order'));
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