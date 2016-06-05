<?php

namespace Navicula;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'description', 'metatags', 'body'];
}
