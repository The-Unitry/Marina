<?php

namespace Navicula\Http\Controllers;

use Illuminate\Http\Request;

use Navicula\Http\Requests;
use Navicula\Models\Setting;

class SettingController extends Controller
{
    /**
     * Create all standard settings.
     */
    public static function createSettings()
    {
        foreach (config('database_fields.settings') as $setting) {
            if (!Setting::exists($setting['key'])) {
                Setting::create($setting);
            }
        }
    }
}
