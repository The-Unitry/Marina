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