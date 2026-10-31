<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'title',
        'tag',
        'icon',
        'color_class',
        'short_desc',
        'desc',
        'image',
        'points',
        'tech',
        'order_num',
        'service_slug',
        'seo_title',
        'seo_desc',
        'seo_keywords'
    ];

    protected $casts = [
        'order_num' => 'integer',
    ];
}
