<?php

namespace Navicula\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'description', 'metatags', 'body'];

    /**
     * Return the post's author.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Return the creation date.
     *
     * @return Carbon
     */
    public function date()
    {
        $date = new Carbon($this->created_at);

        return $date->format('d-m-Y');
    }
}
