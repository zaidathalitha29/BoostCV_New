<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    /**
     * Kolom yang boleh diisi.
     */
    protected $fillable = [
        'order_id',
        'method',
        'provider',
        'account_name',
        'amount',
        'proof_file',
        'status',
        'verified_by',
        'verified_at',
        'verification_note',
        'refund_amount',
        'refund_proof',
        'refunded_at',
        'refund_note',
    ];

    /**
     * Konversi tipe data.
     */
    protected $casts = [
        'amount' => 'decimal:2',
        'refund_amount' => 'decimal:2',
        'verified_at' => 'datetime',
        'refunded_at' => 'datetime',
    ];

    /**
     * Pembayaran milik satu pesanan.
     */
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }

    /**
     * User yang memverifikasi pembayaran.
     */
    public function verifier()
    {
        return $this->belongsTo(User::class, 'verified_by');
    }
}
