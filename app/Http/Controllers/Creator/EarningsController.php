<?php

namespace App\Http\Controllers\Creator;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class EarningsController extends Controller
{
    // Menampilkan ringkasan pendapatan Creator
    public function index()
    {
        $creator = Auth::user()->creatorProfile;

        if (!$creator) {
            return redirect()->route('creator.create')
                ->with('error', 'Silakan buat profil Creator terlebih dahulu.');
        }

        $orders = $creator->orders()
            ->where('status', 'completed')
            ->latest()
            ->get();

        $totalEarnings = $orders->sum('price');

        $totalCompletedOrders = $orders->count();

        return view('creator.earnings.index', compact(
            'creator',
            'orders',
            'totalEarnings',
            'totalCompletedOrders'
        ));
    }
}
