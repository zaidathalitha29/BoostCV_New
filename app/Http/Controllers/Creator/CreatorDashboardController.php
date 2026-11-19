<?php

namespace App\Http\Controllers\Creator;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Creator;

class CreatorDashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login');
        }

        $creator = Creator::where('user_id', $user->id)->first();

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

        $totalPortofolios = $creator->portofolios()->count();

        $totalOrders = $creator->orders()->count();

        $activeOrders = $creator->orders()
            ->whereIn('status', ['in_progress', 'revision'])
            ->count();

        $completedOrders = $creator->orders()
            ->where('status', 'completed')
            ->count();

        $totalEarnings = $creator->orders()
            ->where('status', 'completed')
            ->sum('price');

        $services = $creator->services()
            ->latest()
            ->take(3)
            ->get();

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
            'totalPortofolios',
            'totalOrders',
            'activeOrders',
            'completedOrders',
            'totalEarnings',
            'services',
            'recentOrders'
        ));
    }
}
