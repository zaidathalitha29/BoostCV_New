<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderRevision extends Model
{
    protected $fillable = [
        'order_id',
        'requested_by',
        'request_description',
        'result_file',
        'creator_response',
        'status',
        'completed_at',
    ];

    protected $casts = [
        'completed_at' => 'datetime',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function requester()
    {
        return $this->belongsTo(User::class, 'requested_by');
    }
}