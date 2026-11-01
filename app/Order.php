<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'order_number',
        'customer_id',
        'creator_id',
        'service_id',
        'service_title',
        'customer_name',
        'customer_notes',
        'price',
        'status',
        'result_file',
        'creator_note',
        'started_at',
        'completed_at',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'started_at' => 'datetime',
        'completed_at' => 'datetime',
    ];

    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }

    public function creator()
    {
        return $this->belongsTo(Creator::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }

    public function revisions()
    {
        return $this->hasMany(OrderRevision::class);
    }

    public function cancellationRequests()
    {
        return $this->hasMany(CancellationRequest::class);
    }
}