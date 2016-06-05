<?php

namespace Navicula;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = ['title', 'description', 'body', 'metatags'];
}
