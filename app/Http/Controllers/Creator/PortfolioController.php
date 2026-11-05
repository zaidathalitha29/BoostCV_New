<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Portfolio;

class PortfolioController extends Controller
{
    public function index()
    {
        $creator = Auth::user()->creatorProfile;

        if (!$creator) {
            return redirect()->route('creator.create')
                ->with('error', 'Silakan buat profil Creator terlebih dahulu.');
        }

        $portfolios = $creator->portfolios;

        return view('creator.portfolio.index', compact('portfolios'));
    }


    public function create()
    {
        return view('creator.portfolio.create');
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

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')
                ->store('portfolios/images', 'public');
        }

        if ($request->hasFile('file_path')) {
            $validated['file_path'] = $request->file('file_path')
                ->store('portfolios/files', 'public');
        }

        $portfolio->update($validated);

        return redirect()->route('portfolio.index')
            ->with('success', 'Portfolio berhasil diperbarui!');
    }


    public function destroy($id)
    {
        $creator = Auth::user()->creatorProfile;

        if (!$creator) {
            return redirect()->route('creator.create')
                ->with('error', 'Silakan buat profil Creator terlebih dahulu.');
        }

        $portfolio = $creator->portfolios()->findOrFail($id);

        $portfolio->delete();

        return redirect()->route('portfolio.index')
            ->with('success', 'Portfolio berhasil dihapus!');
    }
}