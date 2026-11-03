<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\CancellationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CancellationController extends Controller
{
    public function index(Request $request)
    {
        $cancellations = CancellationRequest::with([
            'order.customer',
            'order.payment',
            'requester',
            'reviewer'
        ])
        ->when($request->status, function ($query, $status) {
            $query->where('status', $status);
        })
        ->latest()
        ->paginate(10);

        return view(
            'admin.cancellations.index',
            compact('cancellations')
        );
    }

    public function show($id)
    {
        $cancellation = CancellationRequest::with([
            'order.customer',
            'order.payment',
            'requester',
            'reviewer'
        ])->findOrFail($id);

        return view(
            'admin.cancellations.show',
            compact('cancellation')
        );
    }

    public function approve(Request $request, $id)
    {
        $request->validate([
            'admin_note' => 'nullable|string|max:1000',
        ]);

        DB::transaction(function () use ($request, $id) {
            $cancellation = CancellationRequest::with('order.payment')
                ->lockForUpdate()
                ->findOrFail($id);

            if ($cancellation->status != 'pending') {
                abort(422, 'Permintaan pembatalan sudah diproses.');
            }

            $order = $cancellation->order;

            if (in_array($order->status, ['completed', 'cancelled', 'payment_rejected'])) {
                abort(422, 'Pesanan tidak dapat dibatalkan pada status ini.');
            }

            $payment = $order->payment;

            // Jika pembayaran sudah diterima, proses refund perlu dilakukan.
            if ($payment && $payment->status == 'verified') {
                $payment->update([
                    'status' => 'refund_pending',
                ]);
            }

            $order->update([
                'status' => 'cancelled',
            ]);

            $cancellation->update([
                'status' => 'approved',
                'reviewed_by' => auth()->id(),
                'admin_note' => $request->admin_note,
                'reviewed_at' => now(),
            ]);
        });

        return redirect()
            ->route('admin.cancellations.index')
            ->with('success', 'Permintaan pembatalan berhasil disetujui.');
    }

    public function reject(Request $request, $id)
    {
        $request->validate([
            'admin_note' => 'required|string|max:1000',
        ]);

        $cancellation = CancellationRequest::findOrFail($id);

        if ($cancellation->status != 'pending') {
            return back()->with(
                'error',
                'Permintaan pembatalan sudah diproses.'
            );
        }

        $cancellation->update([
            'status' => 'rejected',
            'reviewed_by' => auth()->id(),
            'admin_note' => $request->admin_note,
            'reviewed_at' => now(),
        ]);

        return back()->with(
            'success',
            'Permintaan pembatalan ditolak.'
        );
    }
}