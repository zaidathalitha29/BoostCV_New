<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Creator extends Model
{
    protected $fillable = [
        'user_id',
        'display_name',
        'bio',
        'photo',
        'phone',
        'profession',
        'location',
        'website',
        'instagram',
        'linkedin',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function services()
    {
        return $this->hasMany(Service::class);
    }

    public function portofolios()
    {
        return $this->hasMany(Portofolio::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}