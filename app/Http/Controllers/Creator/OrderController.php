<?php

namespace App\Http\Controllers\Creator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    // Menampilkan daftar pesanan Creator
    public function index()
    {
        $creator = Auth::user()->creatorProfile;

        if (!$creator) {
            return redirect()->route('creator.create')
                ->with('error', 'Silakan buat profil Creator terlebih dahulu.');
        }

        $orders = $creator->orders()
            ->with(['customer', 'service'])
            ->latest()
            ->get();

        return view('creator.orders.index', compact('orders'));
    }

    // Menampilkan detail pesanan
    public function show($id)
    {
        $creator = Auth::user()->creatorProfile;

        if (!$creator) {
            return redirect()->route('creator.create')
                ->with('error', 'Silakan buat profil Creator terlebih dahulu.');
        }

        $order = $creator->orders()
            ->with(['customer', 'service'])
            ->findOrFail($id);

        return view('creator.orders.show', compact('order'));
    }

    // Menampilkan form perubahan status pesanan
    public function edit($id)
    {
        $creator = Auth::user()->creatorProfile;

        if (!$creator) {
            return redirect()->route('creator.create')
                ->with('error', 'Silakan buat profil Creator terlebih dahulu.');
        }

        $order = $creator->orders()
            ->with(['customer', 'service'])
            ->findOrFail($id);

        return view('creator.orders.edit', compact('order'));
    }

    // Memperbarui status pesanan
    public function update(Request $request, $id)
    {
        $creator = Auth::user()->creatorProfile;

        if (!$creator) {
            return redirect()->route('creator.create')
                ->with('error', 'Silakan buat profil Creator terlebih dahulu.');
        }

        $order = $creator->orders()->findOrFail($id);

        $validated = $request->validate([
            'status' => 'required|in:processing,completed,cancelled',
        ]);

        $order->update([
            'status' => $validated['status'],
        ]);

        return redirect()->route('creator.orders.index')
            ->with('success', 'Status pesanan berhasil diperbarui!');
    }
}
