<?php

namespace App\Http\Controllers\Creator;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Order;
use App\Service;

class CreatorDashboardController extends Controller
{
    public function index()
    {
        $creator = Auth::user()->creatorProfile;

        if (!$creator) {
            return redirect()->route('creator.create')
                ->with('error', 'Silakan buat profil Creator terlebih dahulu.');
        }

        $totalServices = $creator->services()->count();

        $pendingServices = $creator->services()
            ->where('status', 'pending')
            ->count();

        $approvedServices = $creator->services()
            ->where('status', 'approved')
            ->count();

        $totalPortfolios = $creator->portfolios()->count();

        $totalOrders = $creator->orders()->count();

        $recentOrders = $creator->orders()
            ->with(['customer', 'service'])
            ->latest()
            ->take(5)
            ->get();

        return view('creator.dashboard', compact(
            'creator',
            'totalServices',
            'pendingServices',
            'approvedServices',
            'totalPortfolios',
            'totalOrders',
            'recentOrders'
        ));
    }
}
