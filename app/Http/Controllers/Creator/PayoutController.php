<?php

namespace App\Http\Controllers\Creator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PayoutController extends Controller
{
    /**
     * Mengambil profil Creator yang sedang login.
     */
    private function getCreator()
    {
        $creator = Auth::user()->creatorProfile;

        if (!$creator) {
            return null;
        }

        return $creator;
    }

    /**
     * Menampilkan riwayat pencairan dana.
     */
    public function index()
    {
        $creator = $this->getCreator();

        if (!$creator) {
            return redirect()->route('creator.create')
                ->with('error', 'Silakan buat profil Creator terlebih dahulu.');
        }

        return view('creator.payouts.index', compact('creator'));
    }

    /**
     * Menampilkan formulir pengajuan pencairan.
     */
    public function create()
    {
        $creator = $this->getCreator();

        if (!$creator) {
            return redirect()->route('creator.create')
                ->with('error', 'Silakan buat profil Creator terlebih dahulu.');
        }

        return view('creator.payouts.create', compact('creator'));
    }

    /**
     * Menyimpan pengajuan pencairan.
     */
    public function store(Request $request)
    {
        $creator = $this->getCreator();

        if (!$creator) {
            return redirect()->route('creator.create')
                ->with('error', 'Silakan buat profil Creator terlebih dahulu.');
        }

        return redirect()->route('creator.payouts.index')
            ->with('error', 'Fitur pencairan dana belum tersedia. Silakan coba kembali nanti.');
    }

    /**
     * Menampilkan detail pencairan.
     */
    public function show($id)
    {
        $creator = $this->getCreator();

        if (!$creator) {
            return redirect()->route('creator.create')
                ->with('error', 'Silakan buat profil Creator terlebih dahulu.');
        }

        return view('creator.payouts.show', compact('creator'));
    }
}
