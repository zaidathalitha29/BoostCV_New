<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Service;
use App\Category;

class ServiceController extends Controller
{
    /**
     * Menampilkan daftar layanan yang sudah disetujui Admin.
     */
    public function index(Request $request)
    {
        $query = Service::query()
            ->with([
                'creator.user',
                'category'
            ])
            ->where('status', 'approved');

        // Pencarian berdasarkan judul, deskripsi, dan nama Creator.
        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', '%' . $search . '%')
                    ->orWhere('description', 'like', '%' . $search . '%')
                    ->orWhereHas('creator', function ($creator) use ($search) {
                        $creator->where('display_name', 'like', '%' . $search . '%')
                            ->orWhereHas('user', function ($user) use ($search) {
                                $user->where('name', 'like', '%' . $search . '%');
                            });
                    });
            });
        }

        // Filter berdasarkan kategori.
        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }

        // Urutkan layanan terbaru dan gunakan pagination.
        $services = $query
            ->latest()
            ->paginate(10)
            ->appends($request->query());

        // Ambil kategori aktif untuk pilihan filter.
        $categories = Category::where('is_active', true)
            ->orderBy('name')
            ->get();

        return view('customer.services.index', compact(
            'services',
            'categories'
        ));
    }

    /**
     * Menampilkan detail layanan.
     */
    public function show($id)
    {
        $service = Service::with([
                'creator.user',
                'category'
            ])
            ->where('status', 'approved')
            ->findOrFail($id);

        return view('customer.services.show', compact('service'));
    }

    /**
     * Method lainnya belum digunakan.
     */
    public function create()
    {
        abort(404);
    }

    public function store(Request $request)
    {
        abort(404);
    }

    public function edit($id)
    {
        abort(404);
    }

    public function update(Request $request, $id)
    {
        abort(404);
    }

    public function destroy($id)
    {
        abort(404);
    }
}
