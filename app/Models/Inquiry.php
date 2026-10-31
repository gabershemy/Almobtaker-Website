<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name',
        'phone',
        'email',
        'service_type',
        'message',
        'is_read',
        'created_at'
    ];

    protected $casts = [
        'is_read' => 'boolean',
        'created_at' => 'datetime',
    ];
}
