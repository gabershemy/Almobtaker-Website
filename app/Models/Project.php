<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'project_slug',
        'title',
        'category',
        'category_name',
        'tech',
        'description',
        'status',
        'image',
        'hero_image',
        'screenshots',
        'full_desc',
        'features',
        'metrics',
        'order_num',
        'seo_title',
        'seo_desc',
        'seo_keywords'
    ];

    protected $casts = [
        'screenshots' => 'array',
        'features' => 'array',
        'metrics' => 'array',
        'order_num' => 'integer',
    ];
}
