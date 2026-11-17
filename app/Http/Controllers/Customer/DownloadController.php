<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Support\Facades\Storage;

class DownloadController extends Controller
{
    public function download($id)
    {
        $order = Order::where('customer_id', auth()->id())
            ->where('id', $id)
            ->where('status', 'completed')
            ->firstOrFail();

        if (!$order->result_file) {
            return redirect()->back()->with(
                'error',
                'File hasil CV belum tersedia.'
            );
        }

        if (!Storage::disk('public')->exists($order->result_file)) {
            return redirect()->back()->with(
                'error',
                'File hasil CV tidak ditemukan.'
            );
        }

        return Storage::disk('public')->download($order->result_file);
    }
}
