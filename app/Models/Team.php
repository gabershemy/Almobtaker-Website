<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $table = 'team';
    public $timestamps = false;

    protected $fillable = [
        'name',
        'role',
        'icon',
        'image',
        'order_num'
    ];

    protected $casts = [
        'order_num' => 'integer',
    ];
}
