<?php

if (!function_exists('setting')) {
    /**
     * Return a setting from the setting table.
     *
     * @param $key
     * @return mixed
     */
    function setting($key)
    {
        return Navicula\Models\Setting::getValueByKey($key);
    }
}

if (!function_exists('euro')) {
    /**
     * Return a formatted price.
     *
     * @param $price
     * @return mixed
     */
    function euro($price)
    {
        return number_format($price, 2, ',', '.');
    }
}