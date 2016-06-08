<?php

namespace Navicula\Filters;

use Intervention\Image\Image;
use Intervention\Image\Filters\FilterInterface;

class HeaderFilter implements FilterInterface
{
    public function applyFilter(Image $image)
    {
        return $image->fit(1500, 600)->greyscale();
    }
}