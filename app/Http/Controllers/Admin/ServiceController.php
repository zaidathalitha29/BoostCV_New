<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index(Request $request)
    {
        $services = Service::with([
            'creator.user',
            'category',
            'reviewer'
        ])
        ->when($request->status, function ($query, $status) {
            $query->where('status', $status);
        })
        ->when($request->search, function ($query, $search) {
            $query->where('title', 'like', "%{$search}%");
        })
        ->latest()
        ->paginate(10);

        return view('admin.services.index', compact('services'));
    }

    public function show($id)
    {
        $service = Service::with([
            'creator.user',
            'category',
            'reviewer'
        ])->findOrFail($id);

        return view('admin.services.show', compact('service'));
    }

    public function approve($id)
    {
        $service = Service::findOrFail($id);

        if ($service->status != 'pending') {
            return back()->with('error', 'Layanan ini tidak sedang menunggu persetujuan.');
        }

        $service->update([
            'status' => 'approved',
            'admin_note' => null,
            'reviewed_by' => auth()->id(),
            'reviewed_at' => now(),
        ]);

        return back()->with('success', 'Layanan berhasil disetujui.');
    }

    public function reject(Request $request, $id)
    {
        $request->validate([
            'admin_note' => 'required|string|max:1000',
        ]);

        $service = Service::findOrFail($id);

        if ($service->status != 'pending') {
            return back()->with('error', 'Layanan ini tidak sedang menunggu persetujuan.');
        }

        $service->update([
            'status' => 'rejected',
            'admin_note' => $request->admin_note,
            'reviewed_by' => auth()->id(),
            'reviewed_at' => now(),
        ]);

        return back()->with('success', 'Layanan berhasil ditolak.');
    }
}