<?php

namespace Navicula\Filters;

use Intervention\Image\Image;
use Intervention\Image\Filters\FilterInterface;

class FaviconFilter implements FilterInterface
{
    public function applyFilter(Image $image)
    {
        return $image->fit(32, 32);
    }
}