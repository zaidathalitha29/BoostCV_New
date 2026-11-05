<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Creator;

class CreatorController extends Controller
{
    public function profile()
    {
        $creator = Auth::check()
            ? Auth::user()->creatorProfile
            : null;

        return view('creator.profile', compact('creator'));
    }

        
    public function create()
    {
        return view('creator.create-profile');
    }


        public function store(Request $request)
    {
        // Pastikan pengguna sudah login
        if (!Auth::check()) {
            abort(403, 'Silakan login terlebih dahulu.');
        }

        $user = Auth::user();

        // Periksa apakah akun sudah memiliki profil
        if ($user->creatorProfile) {
            return redirect()->route('creator.profile')
                ->with('error', 'Profil Creator sudah tersedia.');
        }
        // Validasi data form
        $validated = $request->validate([
            'display_name' => 'required|string|max:255',
            'bio' => 'nullable|string',
            'profession' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:25',
            'website' => 'nullable|url|max:255',
            'instagram' => 'nullable|string|max:255',
            'linkedin' => 'nullable|string|max:255',
        ]);

        // Simpan profil melalui relasi User
        Creator::create(array_merge($validated, [
            'user_id' => $user->id,
        ]));
        
        return redirect()->route('creator.profile')
            ->with('success', 'Profil berhasil dibuat!');
    }

}
