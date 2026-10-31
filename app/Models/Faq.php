<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'category',
        'question',
        'answer',
        'order_num'
    ];

    protected $casts = [
        'order_num' => 'integer',
    ];
}
