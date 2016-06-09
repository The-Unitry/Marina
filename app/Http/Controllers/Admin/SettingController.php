<?php

namespace Navicula\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;
use Intervention\Image\ImageManagerStatic;
use Navicula\Http\Requests;
use Navicula\Http\Controllers\Controller;
use Navicula\Models\Setting;

class SettingController extends AdminController
{
    /**
     * View the settings screen.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
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
        /*
         * Loop over all filled settings...
         */
        foreach ($request->all() as $key => $value) {
            $setting = Setting::getByKey($key);

            if (!empty($setting)) {
                $setting->value = $value;
                $setting->save();
            }
        }

        /*
         * If an image is uploaded...
         *
         * Because some kind of weird bug, $request->get('logo') doesn't work.
         */
        if (isset($request->all()['logo'])) {
            Image::make($request->all()['logo'])->save('img/upload/logo.png');
        }

        return back()->with(
            'message', trans('confirmations.updated.settings')
        );
    }
}
