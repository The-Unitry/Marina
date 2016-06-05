<?php

namespace Navicula\Http\ViewComposers;

use Illuminate\Contracts\View\View;
use Request;

class ModuleComposer
{
    /**
     * Bind the current module to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('module', Request::segment(2));
    }
}