<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Order;
use App\Service;

class OrderController extends Controller
{
    /**
     * Menampilkan daftar pesanan Customer.
     */
    public function index()
    {
        $orders = Order::with([
            'service',
            'creator.user',
            'payment'
        ])
            ->where('customer_id', Auth::id())
            ->latest()
            ->paginate(10);

        return view('customer.orders.index', compact('orders'));
    }

    /**
     * Menampilkan formulir pemesanan layanan.
     */
    public function create($serviceId)
    {
        $service = Service::with([
            'creator.user',
            'category'
        ])
            ->where('status', 'approved')
            ->findOrFail($serviceId);

        return view('customer.orders.create', compact('service'));
    }

    /**
     * Menyimpan pesanan baru.
     */
    public function store(Request $request, $serviceId)
    {
        $validated = $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_notes' => 'nullable|string|max:1000',
        ], [
            'customer_name.required' => 'Nama pemesan wajib diisi.',
            'customer_name.max' => 'Nama pemesan maksimal 255 karakter.',
            'customer_notes.max' => 'Catatan maksimal 1000 karakter.',
        ]);

        // Pastikan layanan masih tersedia dan sudah disetujui.
        $service = Service::where('status', 'approved')
            ->findOrFail($serviceId);

        // Buat pesanan.
        $order = Order::create([
            'order_number' => 'BCV-' . date('YmdHis') . '-' . Auth::id(),
            'customer_id' => Auth::id(),
            'creator_id' => $service->creator_id,
            'service_id' => $service->id,
            'service_title' => $service->title,
            'customer_name' => $validated['customer_name'],
            'customer_notes' => $validated['customer_notes'] ?? null,
            'price' => $service->price,
            'status' => 'pending_payment',
        ]);

        return redirect()
            ->route('customer.orders.show', $order->id)
            ->with('success', 'Pesanan berhasil dibuat. Silakan lanjutkan pembayaran.');
    }

    /**
     * Menampilkan detail pesanan Customer.
     */
    public function show($id)
    {
        $order = Order::with([
            'service',
            'creator.user',
            'payment',
            'revisions',
            'cancellationRequests'
        ])
            ->where('customer_id', Auth::id())
            ->findOrFail($id);

        return view('customer.orders.show', compact('order'));
    }

    /**
     * Fitur edit belum digunakan.
     */
    public function edit($id)
    {
        abort(404);
    }

    /**
     * Fitur update belum digunakan.
     */
    public function update(Request $request, $id)
    {
        abort(404);
    }

    /**
     * Fitur hapus belum digunakan.
     */
    public function destroy($id)
    {
        abort(404);
    }
}
