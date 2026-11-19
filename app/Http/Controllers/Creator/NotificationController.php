<?php

namespace App\Http\Controllers\Creator;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    // Menampilkan semua notifikasi Creator
    public function index()
    {
        $user = Auth::user();

        $notifications = $user->notifications()
            ->latest()
            ->get();

        return view('creator.notifications.index', compact('notifications'));
    }

    // Menampilkan detail notifikasi
    public function show($id)
    {
        $user = Auth::user();

        $notification = $user->notifications()
            ->findOrFail($id);

        if (is_null($notification->read_at)) {
            $notification->markAsRead();
        }

        return view('creator.notifications.show', compact('notification'));
    }

    // Menandai notifikasi sudah dibaca
    public function update($id)
    {
        $user = Auth::user();

        $notification = $user->notifications()
            ->findOrFail($id);

        $notification->markAsRead();

        return redirect()->back()
            ->with('success', 'Notifikasi berhasil ditandai sudah dibaca.');
    }

    // Menghapus notifikasi
    public function destroy($id)
    {
        $user = Auth::user();

        $notification = $user->notifications()
            ->findOrFail($id);

        $notification->delete();

        return redirect()->route('creator.notifications.index')
            ->with('success', 'Notifikasi berhasil dihapus.');
    }
}
