<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $primaryKey = 'key_name';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'key_name',
        'key_value'
    ];

    public static function get(string $key, $default = null)
    {
        $setting = static::find($key);
        return $setting ? $setting->key_value : $default;
    }

    public static function set(string $key, $value): void
    {
        static::updateOrCreate(['key_name' => $key], ['key_value' => $value]);
    }
}
