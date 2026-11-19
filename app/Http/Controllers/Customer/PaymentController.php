<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Order;
use App\Payment;

class PaymentController extends Controller
{
    /**
     * Menampilkan form pembayaran.
     */
    public function create($orderId)
    {
        $order = Order::with('payment')
            ->where('customer_id', Auth::id())
            ->findOrFail($orderId);

        if ($order->payment && in_array($order->payment->status, [
            'pending_verification',
            'verified'
        ])) {
            return redirect()
                ->route('customer.orders.show', $order->id)
                ->with('error', 'Pembayaran sudah dikirim atau diverifikasi.');
        }

        return view('customer.payments.create', compact('order'));
    }

    /**
     * Menyimpan bukti pembayaran.
     */
    public function store(Request $request, $orderId)
    {
        $order = Order::with('payment')
            ->where('customer_id', Auth::id())
            ->findOrFail($orderId);

        if ($order->payment && in_array($order->payment->status, [
            'pending_verification',
            'verified'
        ])) {
            return redirect()
                ->route('customer.orders.show', $order->id)
                ->with('error', 'Pembayaran sudah dikirim atau diverifikasi.');
        }

        $validated = $request->validate([
            'method' => 'required|in:bank_transfer,e_wallet',
            'provider' => 'nullable|string|max:255',
            'account_name' => 'nullable|string|max:255',
            'proof_file' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $proofPath = $request->file('proof_file')
            ->store('payments', 'public');

        Payment::updateOrCreate(
            ['order_id' => $order->id],
            [
                'method' => $validated['method'],
                'provider' => $validated['provider'] ?? null,
                'account_name' => $validated['account_name'] ?? null,
                'amount' => $order->price,
                'proof_file' => $proofPath,
                'status' => 'pending_verification',
                'verified_by' => null,
                'verified_at' => null,
                'verification_note' => null,
            ]
        );

        return redirect()
            ->route('customer.orders.show', $order->id)
            ->with('success', 'Bukti pembayaran berhasil dikirim. Silakan tunggu verifikasi Admin.');
    }
}
