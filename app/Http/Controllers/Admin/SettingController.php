<?php

namespace Navicula\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Navicula\Http\Requests;
use Navicula\Http\Controllers\Controller;
use Navicula\Models\Setting;

class SettingController extends AdminController
{
    public function index()
    {
        return view('admin.settings.index', [
            'method' => 'PATCH'
        ]);
    }

    /**
     * Update the filled fields and redirect back.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        foreach ($request->all() as $key => $value) {
            $setting = Setting::getByKey($key);

            if (!empty($setting)) {
                $setting->value = $value;
                $setting->save();
            }
        }

        return back()->with('message', 'Updated settings.');
    }
}
