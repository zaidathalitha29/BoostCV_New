<?php

namespace App\Http\Controllers\Creator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Creator;

class CreatorController extends Controller
{
    public function profile()
    {
        $user = Auth::user();
        $creator = $user->creatorProfile;

        if (!$creator) {
            return redirect()->route('creator.create')
                ->with('error', 'Silakan buat profil Creator terlebih dahulu.');
        }

        return view('creator.profile', compact('creator', 'user'));
    }

    public function create()
    {
        $user = Auth::user();

        if ($user->creatorProfile) {
            return redirect()->route('creator.profile')
                ->with('error', 'Profil Creator sudah tersedia.');
        }

        return view('creator.create-profile');
    }

    public function store(Request $request)
    {
        $user = Auth::user();

        if ($user->creatorProfile) {
            return redirect()->route('creator.profile')
                ->with('error', 'Profil Creator sudah tersedia.');
        }

        $validated = $request->validate([
            'display_name' => 'required|string|max:255',
            'bio' => 'nullable|string',
            'profession' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:25',
            'website' => 'nullable|url|max:255',
            'instagram' => 'nullable|string|max:255',
            'linkedin' => 'nullable|string|max:255',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')
                ->store('creators', 'public');
        }

        $validated['user_id'] = $user->id;

        Creator::create($validated);

        return redirect()->route('creator.profile')
            ->with('success', 'Profil berhasil dibuat!');
    }

    public function edit()
    {
        $user = Auth::user();
        $creator = $user->creatorProfile;

        if (!$creator) {
            return redirect()->route('creator.create')
                ->with('error', 'Silakan buat profil Creator terlebih dahulu.');
        }

        return view('creator.edit-profile', compact('creator', 'user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $creator = $user->creatorProfile;

        if (!$creator) {
            return redirect()->route('creator.create')
                ->with('error', 'Profil Creator belum tersedia.');
        }

        $validated = $request->validate([
            'display_name' => 'required|string|max:255',
            'bio' => 'nullable|string',
            'profession' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:25',
            'website' => 'nullable|url|max:255',
            'instagram' => 'nullable|string|max:255',
            'linkedin' => 'nullable|string|max:255',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            if ($creator->photo) {
                Storage::disk('public')->delete($creator->photo);
            }

            $validated['photo'] = $request->file('photo')
                ->store('creators', 'public');
        }

        $creator->update($validated);

        return redirect()->route('creator.profile')
            ->with('success', 'Profil berhasil diperbarui!');
    }
}
