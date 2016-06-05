<?php

namespace Navicula\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = ['title', 'description', 'metatags', 'body'];
}
