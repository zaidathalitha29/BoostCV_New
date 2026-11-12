<?php

namespace App\Http\Controllers\Creator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Service;
use App\Category;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    // Menampilkan daftar layanan milik Creator
    public function index()
    {
        $creator = Auth::user()->creatorProfile;

        if (!$creator) {
            return redirect()->route('creator.create')
                ->with('error', 'Silakan buat profil Creator terlebih dahulu.');
        }

        $services = $creator->services()
            ->with('category')
            ->latest()
            ->get();

        return view('creator.services.index', compact('services'));
    }

    // Menampilkan form tambah layanan
    public function create()
    {
        $creator = Auth::user()->creatorProfile;

        if (!$creator) {
            return redirect()->route('creator.create')
                ->with('error', 'Silakan buat profil Creator terlebih dahulu.');
        }

        $categories = Category::where('is_active', true)
            ->orderBy('name')
            ->get();

        return view('creator.services.create', compact('categories'));
    }

    // Menyimpan layanan baru
    public function store(Request $request)
    {
        $creator = Auth::user()->creatorProfile;

        if (!$creator) {
            return redirect()->route('creator.create')
                ->with('error', 'Silakan buat profil Creator terlebih dahulu.');
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'estimated_days' => 'required|integer|min:1',
            'revision_limit' => 'required|integer|min:0',
            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $category = Category::where('id', $validated['category_id'])
            ->where('is_active', true)
            ->first();

        if (!$category) {
            return back()->withErrors([
                'category_id' => 'Kategori tidak tersedia.'
            ])->withInput();
        }

        $slug = $this->generateUniqueSlug($validated['title']);

        if ($request->hasFile('thumbnail')) {
            $validated['thumbnail'] = $request->file('thumbnail')
                ->store('services/thumbnails', 'public');
        }

        $creator->services()->create([
            'category_id' => $validated['category_id'],
            'title' => $validated['title'],
            'slug' => $slug,
            'description' => $validated['description'],
            'price' => $validated['price'],
            'estimated_days' => $validated['estimated_days'],
            'revision_limit' => $validated['revision_limit'],
            'thumbnail' => $validated['thumbnail'] ?? null,
            'status' => 'pending',
        ]);

        return redirect()->route('creator.services.index')
            ->with('success', 'Layanan berhasil dikirim dan menunggu persetujuan Admin!');
    }

    // Menampilkan form edit layanan
    public function edit($id)
    {
        $creator = Auth::user()->creatorProfile;

        if (!$creator) {
            return redirect()->route('creator.create')
                ->with('error', 'Silakan buat profil Creator terlebih dahulu.');
        }

        $service = $creator->services()->findOrFail($id);

        $categories = Category::where('is_active', true)
            ->orWhere('id', $service->category_id)
            ->orderBy('name')
            ->get();

        return view('creator.services.edit', compact('service', 'categories'));
    }

    // Memperbarui layanan
    public function update(Request $request, $id)
    {
        $creator = Auth::user()->creatorProfile;

        if (!$creator) {
            return redirect()->route('creator.create')
                ->with('error', 'Silakan buat profil Creator terlebih dahulu.');
        }

        $service = $creator->services()->findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'estimated_days' => 'required|integer|min:1',
            'revision_limit' => 'required|integer|min:0',
            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $category = Category::where('id', $validated['category_id'])
            ->where('is_active', true)
            ->first();

        if (!$category) {
            return back()->withErrors([
                'category_id' => 'Kategori tidak tersedia.'
            ])->withInput();
        }

        $slug = $this->generateUniqueSlug(
            $validated['title'],
            $service->id
        );

        // Mengganti thumbnail lama jika ada thumbnail baru
        if ($request->hasFile('thumbnail')) {
            if ($service->thumbnail) {
                Storage::disk('public')->delete($service->thumbnail);
            }

            $validated['thumbnail'] = $request->file('thumbnail')
                ->store('services/thumbnails', 'public');
        }

        $service->update([
            'category_id' => $validated['category_id'],
            'title' => $validated['title'],
            'slug' => $slug,
            'description' => $validated['description'],
            'price' => $validated['price'],
            'estimated_days' => $validated['estimated_days'],
            'revision_limit' => $validated['revision_limit'],
            'thumbnail' => $validated['thumbnail'] ?? $service->thumbnail,

            // Perubahan layanan harus diperiksa ulang oleh Admin
            'status' => 'pending',
            'admin_note' => null,
            'reviewed_by' => null,
            'reviewed_at' => null,
        ]);

        return redirect()->route('creator.services.index')
            ->with('success', 'Layanan berhasil diperbarui dan menunggu persetujuan Admin!');
    }

    // Menghapus layanan
    public function destroy($id)
    {
        $creator = Auth::user()->creatorProfile;

        if (!$creator) {
            return redirect()->route('creator.create')
                ->with('error', 'Silakan buat profil Creator terlebih dahulu.');
        }

        $service = $creator->services()->findOrFail($id);

        // Menghapus file thumbnail dari penyimpanan
        if ($service->thumbnail) {
            Storage::disk('public')->delete($service->thumbnail);
        }

        $service->delete();

        return redirect()->route('creator.services.index')
            ->with('success', 'Layanan berhasil dihapus.');
    }

    // Membuat slug yang unik
    private function generateUniqueSlug($title, $ignoreId = null)
    {
        $slug = Str::slug($title);

        if ($slug === '') {
            $slug = 'layanan';
        }

        $originalSlug = $slug;
        $counter = 1;

        while (
            Service::where('slug', $slug)
                ->when($ignoreId, function ($query) use ($ignoreId) {
                    $query->where('id', '!=', $ignoreId);
                })
                ->exists()
        ) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }

        return $slug;
    }
}