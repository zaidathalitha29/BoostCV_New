<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'creator_id',
        'category_id',
        'title',
        'slug',
        'description',
        'price',
        'estimated_days',
        'revision_limit',
        'thumbnail',
        'status',
        'admin_note',
        'reviewed_by',
        'reviewed_at',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'reviewed_at' => 'datetime',
    ];

    // Relasi ke Creator
    public function creator()
    {
        return $this->belongsTo(Creator::class);
    }

    // Relasi ke Kategori
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Relasi ke Admin yang meninjau layanan
    public function reviewer()
    {
        return $this->belongsTo(User::class, 'reviewed_by');
    }

    // Relasi ke Pesanan
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
