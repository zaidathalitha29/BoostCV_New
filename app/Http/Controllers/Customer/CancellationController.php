<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;
use App\CancellationRequest as Cancellation;

class CancellationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cancellations = Cancellation::with('order')
            ->where('requested_by', auth()->id())
            ->latest()
            ->paginate(10);

        return view('customer.cancellations.index', compact('cancellations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $order = Order::where('customer_id', auth()->id())
            ->where('id', $orderId)
            ->firstOrFail();

        if (in_array($order->status, ['completed', 'cancelled'])) {
            return redirect()->back() ->with('error', 'Pesanan ini tidak dapat dibatalkan.');
        }

        return view('customer.cancellations.create', compact('order'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $request->validate([
            'reason' => 'required|string|max:1000'
        ], [
            'reason.required' => 'Alasan pembatalan wajib diisi.',
            'reason.max' => 'Alasan pembatalan maksimal 1000 karakter.'
        ]);

        $order = Order::where('customer_id', auth()->id())
            ->where('id', $orderId)
            ->firstOrFail();

        if (in_array($order->status, ['completed', 'cancelled'])) {
            return redirect()->back()
                ->with('error', 'Pesanan ini tidak dapat dibatalkan.');
        }

        $pendingCancellation = Cancellation::where('order_id', $order->id)
            ->where('requested_by', auth()->id())
            ->where('status', 'pending')
            ->exists();

        if ($pendingCancellation) {
            return redirect()->back()
                ->with('error', 'Pengajuan pembatalan masih menunggu keputusan Admin.');
        }

        Cancellation::create([
            'order_id' => $order->id,
            'requested_by' => auth()->id(),
            'reason' => $request->reason,
            'status' => 'pending'
        ]);

        return redirect()->back()->with('success', 'Pengajuan pembatalan berhasil dikirim.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cancellation = Cancellation::with('order')
            ->where('requested_by', auth()->id())
            ->findOrFail($id);

        return view('customer.cancellations.show', compact(
            'cancellation'
        ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
