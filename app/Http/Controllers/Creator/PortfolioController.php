<?php

namespace App\Http\Controllers\Creator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Portfolio;

class PortfolioController extends Controller
{
    // Menampilkan daftar portfolio
    public function index()
    {
        $creator = Auth::user()->creatorProfile;

        if (!$creator) {
            return redirect()->route('creator.create')
                ->with('error', 'Silakan buat profil Creator terlebih dahulu.');
        }

        $portfolios = $creator->portfolios()->latest()->get();

        return view('creator.portfolio.index', compact('portfolios'));
    }

    // Menampilkan form tambah portfolio
    public function create()
    {
        $creator = Auth::user()->creatorProfile;

        if (!$creator) {
            return redirect()->route('creator.create')
                ->with('error', 'Silakan buat profil Creator terlebih dahulu.');
        }

        return view('creator.portfolio.create');
    }

    // Menyimpan portfolio baru
    public function store(Request $request)
    {
        $creator = Auth::user()->creatorProfile;

        if (!$creator) {
            return redirect()->route('creator.create')
                ->with('error', 'Silakan buat profil Creator terlebih dahulu.');
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'file_path' => 'nullable|file|max:10240',
            'project_url' => 'nullable|url|max:255',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')
                ->store('portfolios/images', 'public');
        }

        if ($request->hasFile('file_path')) {
            $validated['file_path'] = $request->file('file_path')
                ->store('portfolios/files', 'public');
        }

        $creator->portfolios()->create($validated);

        return redirect()->route('portfolio.index')
            ->with('success', 'Portfolio berhasil ditambahkan!');
    }

    // Menampilkan form edit portfolio
    public function edit($id)
    {
        $creator = Auth::user()->creatorProfile;

        if (!$creator) {
            return redirect()->route('creator.create')
                ->with('error', 'Silakan buat profil Creator terlebih dahulu.');
        }

        $portfolio = $creator->portfolios()->findOrFail($id);

        return view('creator.portfolio.edit', compact('portfolio'));
    }

    // Memperbarui portfolio
    public function update(Request $request, $id)
    {
        $creator = Auth::user()->creatorProfile;

        if (!$creator) {
            return redirect()->route('creator.create')
                ->with('error', 'Silakan buat profil Creator terlebih dahulu.');
        }

        $portfolio = $creator->portfolios()->findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'file_path' => 'nullable|file|max:10240',
            'project_url' => 'nullable|url|max:255',
        ]);

        // Mengganti gambar lama jika ada gambar baru
        if ($request->hasFile('image')) {
            if ($portfolio->image) {
                Storage::disk('public')->delete($portfolio->image);
            }

            $validated['image'] = $request->file('image')
                ->store('portfolios/images', 'public');
        }

        // Mengganti file lama jika ada file baru
        if ($request->hasFile('file_path')) {
            if ($portfolio->file_path) {
                Storage::disk('public')->delete($portfolio->file_path);
            }

            $validated['file_path'] = $request->file('file_path')
                ->store('portfolios/files', 'public');
        }

        $portfolio->update($validated);

        return redirect()->route('portfolio.index')
            ->with('success', 'Portfolio berhasil diperbarui!');
    }

    // Menghapus portfolio
    public function destroy($id)
    {
        $creator = Auth::user()->creatorProfile;

        if (!$creator) {
            return redirect()->route('creator.create')
                ->with('error', 'Silakan buat profil Creator terlebih dahulu.');
        }

        $portfolio = $creator->portfolios()->findOrFail($id);

        if ($portfolio->image) {
            Storage::disk('public')->delete($portfolio->image);
        }

        if ($portfolio->file_path) {
            Storage::disk('public')->delete($portfolio->file_path);
        }

        $portfolio->delete();

        return redirect()->route('portfolio.index')
            ->with('success', 'Portfolio berhasil dihapus!');
    }
}
