<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index(Request $request)
    {
        $payments = Payment::with([
            'order.customer',
            'order.creator',
            'order.service',
            'verifier'
        ])
        ->when($request->status, function ($query, $status) {
            $query->where('status', $status);
        })
        ->latest()
        ->paginate(10);

        return view('admin.payments.index', compact('payments'));
    }

    public function show($id)
    {
        $payment = Payment::with([
            'order.customer',
            'order.creator',
            'order.service',
            'verifier'
        ])->findOrFail($id);

        return view('admin.payments.show', compact('payment'));
    }

    public function verify($id)
    {
        $payment = Payment::with('order')->findOrFail($id);

        if ($payment->status != 'pending_verification') {
            return back()->with('error', 'Pembayaran ini tidak menunggu verifikasi.');
        }

        if ($payment->order->status != 'pending_payment') {
            return back()->with('error', 'Status pesanan tidak sesuai untuk verifikasi pembayaran.');
        }

        $payment->update([
            'status' => 'verified',
            'verified_by' => auth()->id(),
            'verified_at' => now(),
            'verification_note' => null,
        ]);

        $payment->order->update([
            'status' => 'in_progress',
            'started_at' => now(),
        ]);

        return back()->with('success', 'Pembayaran berhasil diverifikasi.');
    }

    public function reject(Request $request, $id)
    {
        $request->validate([
            'verification_note' => 'required|string|max:1000',
        ]);

        $payment = Payment::with('order')->findOrFail($id);

        if ($payment->status != 'pending_verification') {
            return back()->with('error', 'Pembayaran ini tidak menunggu verifikasi.');
        }

        if ($payment->order->status != 'pending_payment') {
            return back()->with('error', 'Status pesanan tidak sesuai untuk penolakan pembayaran.');
        }

        $payment->update([
            'status' => 'rejected',
            'verified_by' => auth()->id(),
            'verified_at' => now(),
            'verification_note' => $request->verification_note,
        ]);

        $payment->order->update([
            'status' => 'payment_rejected',
        ]);

        return back()->with(
            'success',
            'Bukti pembayaran ditolak. Customer harus membuat pesanan baru.'
        );
    }
}