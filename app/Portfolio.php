<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    protected $fillable = [
        'creator_id',
        'title',
        'description',
        'image',
        'file_path',
        'project_url',
        'is_published',
    ];

    public function creator()
    {
        return $this->belongsTo(Creator::class);
    }
}