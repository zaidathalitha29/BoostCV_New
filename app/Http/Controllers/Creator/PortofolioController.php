<?php

namespace App\Http\Controllers\Creator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PortofolioController extends Controller
{
    public function index()
    {
        $creator = Auth::user()->creatorProfile;

        if (!$creator) {
            return redirect()->route('creator.create')
                ->with('error', 'Silakan buat profil Creator terlebih dahulu.');
        }

        $portofolios = $creator->portofolios()->latest()->get();

        return view('creator.portofolio.index', compact('portofolios'));
    }

    public function create()
    {
        $creator = Auth::user()->creatorProfile;

        if (!$creator) {
            return redirect()->route('creator.create')
                ->with('error', 'Silakan buat profil Creator terlebih dahulu.');
        }

        return view('creator.portofolio.create');
    }

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
                ->store('portofolios/images', 'public');
        }

        if ($request->hasFile('file_path')) {
            $validated['file_path'] = $request->file('file_path')
                ->store('portofolios/files', 'public');
        }

        $creator->portofolios()->create($validated);

        return redirect()->route('portofolio.index')
            ->with('success', 'Portofolio berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $creator = Auth::user()->creatorProfile;

        if (!$creator) {
            return redirect()->route('creator.create')
                ->with('error', 'Silakan buat profil Creator terlebih dahulu.');
        }

        $portofolio = $creator->portofolios()->findOrFail($id);

        return view('creator.portofolio.edit', compact('portofolio'));
    }

    public function update(Request $request, $id)
    {
        $creator = Auth::user()->creatorProfile;

        if (!$creator) {
            return redirect()->route('creator.create')
                ->with('error', 'Silakan buat profil Creator terlebih dahulu.');
        }

        $portofolio = $creator->portofolios()->findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'file_path' => 'nullable|file|max:10240',
            'project_url' => 'nullable|url|max:255',
        ]);

        if ($request->hasFile('image')) {
            if ($portofolio->image) {
                Storage::disk('public')->delete($portofolio->image);
            }

            $validated['image'] = $request->file('image')
                ->store('portofolios/images', 'public');
        }

        if ($request->hasFile('file_path')) {
            if ($portofolio->file_path) {
                Storage::disk('public')->delete($portofolio->file_path);
            }

            $validated['file_path'] = $request->file('file_path')
                ->store('portofolios/files', 'public');
        }

        $portofolio->update($validated);

        return redirect()->route('portofolio.index')
            ->with('success', 'Portofolio berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $creator = Auth::user()->creatorProfile;

        if (!$creator) {
            return redirect()->route('creator.create')
                ->with('error', 'Silakan buat profil Creator terlebih dahulu.');
        }

        $portofolio = $creator->portofolios()->findOrFail($id);

        if ($portofolio->image) {
            Storage::disk('public')->delete($portofolio->image);
        }

        if ($portofolio->file_path) {
            Storage::disk('public')->delete($portofolio->file_path);
        }

        $portofolio->delete();

        return redirect()->route('portofolio.index')
            ->with('success', 'Portofolio berhasil dihapus!');
    }
}