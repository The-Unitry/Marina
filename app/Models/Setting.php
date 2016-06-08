<?php

namespace Navicula\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = ['key', 'value'];

    /**
     * Get the settings value by its key.
     *
     * @param string $key
     * @return mixed
     */
    public static function getValueByKey($key)
    {
        if (self::exists($key)) {
            return self::where('key', $key)->first()->value;
        }

        return $key;
    }

    /**
     * Check if a setting exists.
     *
     * @param string $key
     * @return mixed
     */
    public static function exists($key)
    {
        return self::where('key', $key)->first();
    }

    /**
     * Return a setting by it's key.
     *
     * @param string $key
     * @return mixed
     */
    public static function getByKey($key)
    {
        return Setting::where('key', $key)->first();
    }
}