<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $table = 'gallery';
    public $timestamps = false;

    protected $fillable = [
        'gallery_slug',
        'title',
        'category',
        'category_name',
        'image',
        'desc',
        'tech',
        'icon',
        'order_num'
    ];

    protected $casts = [
        'order_num' => 'integer',
    ];
}
