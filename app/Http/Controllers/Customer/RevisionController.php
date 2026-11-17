<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;
use App\OrderRevision;

class RevisionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $revisions = OrderRevision::with('order')
            ->where('requested_by', auth()->id())
            ->latest()
            ->paginate(10);

        return view('customer.revisions.index', compact('revisions'));
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
            ->whereIn('status', ['revision', 'completed'])
            ->firstOrFail();

        $revisionCount = OrderRevision::where('order_id', $order->id)
            ->where('requested_by', auth()->id())
            ->count();

        if ($revisionCount >= $order->service->revision_limit) {
            return redirect()->back()
                ->with('error', 'Batas revisi untuk layanan ini sudah tercapai.');
        }

        return view('customer.revisions.create', compact('order'));
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
            'request_description' => 'required|string|max:1000'
        ], [
            'request_description.required' => 'Deskripsi revisi wajib diisi.',
            'request_description.max' => 'Deskripsi revisi maksimal 1000 karakter.'
        ]);

        $order = Order::with('service')
            ->where('customer_id', auth()->id())
            ->where('id', $orderId)
            ->whereIn('status', ['revision', 'completed'])
            ->firstOrFail();

        $revisionCount = OrderRevision::where('order_id', $order->id)
            ->where('requested_by', auth()->id())
            ->count();

        if ($revisionCount >= $order->service->revision_limit) {
            return redirect()->back()
                ->with('error', 'Batas revisi untuk layanan ini sudah tercapai.');
        }

        OrderRevision::create([
            'order_id' => $order->id,
            'requested_by' => auth()->id(),
            'request_description' => $request->request_description,
            'status' => 'requested'
        ]);

        $order->update([
            'status' => 'revision'
        ]);

        return redirect()->route('customer.revisions.index')
            ->with('success', 'Pengajuan revisi berhasil dikirim.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $revision = OrderRevision::with('order')
            ->where('requested_by', auth()->id())
            ->findOrFail($id);

        return view('customer.revisions.show', compact('revision'));
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
