<?php

namespace Navicula\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Intervention\Image\Facades\Image;

class Boat extends Model
{
    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * Mass assignable fields.
     *
     * @var array
     */
    protected $fillable = ['name', 'brand', 'model', 'type', 'color', 'type', 'height', 'length', 'width', 'depth', 'image_path', 'user_id'];

    /**
     * Get the owner of the boat.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Upload an image.
     *
     * @param $image
     * @return mixed
     */
    public function uploadImage($image)
    {
        $this->image_path = md5(uniqid());
        return Image::make($image)->save('img/upload/' . $this->image_path . '.png');
    }

    /**
     * Check if a boat has an image.
     *
     * @return bool
     */
    public function hasImage()
    {
        if (strlen($this->image_path)) {
            return true;
        }

        return false;
    }
}
