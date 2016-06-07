<?php

namespace Navicula\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Intervention\Image\Facades\Image;

class Post extends Model
{
    protected $fillable = ['title', 'description', 'metatags', 'body', 'header_path'];

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

    /**
     * Upload a header.
     *
     * @param $image
     * @return mixed
     */
    public function uploadHeader($image)
    {
        $this->header_path = md5(uniqid());
        return Image::make($image)->save('img/upload/' . $this->header_path . '.png');
    }
}
