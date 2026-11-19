<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;
use App\Review;

class ReviewController extends Controller
{
    public function store(Request $request, $id)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:1000',
        ]);

        // Pastikan pesanan milik Customer yang sedang login
        $order = Order::where('customer_id', auth()->id())
            ->findOrFail($id);

        // Review hanya dapat diberikan untuk pesanan selesai
        if ($order->status !== 'completed') {
            return back()->with('error', 'Pesanan belum selesai.');
        }

        // Pastikan pesanan memiliki Creator
        if (!$order->creator_id) {
            return back()->with('error', 'Creator pesanan tidak ditemukan.');
        }

        // Cegah review lebih dari satu kali untuk pesanan yang sama
        if (Review::where('order_id', $order->id)->exists()) {
            return back()->with('error', 'Pesanan ini sudah diberi ulasan.');
        }

        Review::create([
            'order_id' => $order->id,
            'customer_id' => auth()->id(),
            'creator_id' => $order->creator_id,
            'rating' => $request->rating,
            'comment' => $request->comment,
        ]);

        return redirect()
            ->route('customer.history.show', $order->id)
            ->with('success', 'Terima kasih! Ulasan berhasil dikirim.');
    }
}
