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
     * Get height attribute.
     *
     * @param  string  $value
     * @return string
     */
    public function getHeightAttribute($value)
    {
        return $value / 100;
    }

    /**
     * Get width attribute.
     *
     * @param  string  $value
     * @return string
     */
    public function getWidthAttribute($value)
    {
        return $value / 100;
    }

    /**
     * Get length attribute.
     *
     * @param  string  $value
     * @return string
     */
    public function getLengthAttribute($value)
    {
        return $value / 100;
    }

    /**
     * Get depth attribute.
     *
     * @param  string  $value
     * @return string
     */
    public function getDepthAttribute($value)
    {
        return $value / 100;
    }

    /**
     * Set height attribute.
     *
     * @param  string  $value
     * @return void
     */
    public function setHeightAttribute($value)
    {
        $this->attributes['height'] = $value * 100;
    }

    /**
     * Set width attribute.
     *
     * @param  string  $value
     * @return void
     */
    public function setWidthAttribute($value)
    {
        $this->attributes['width'] = $value * 100;
    }

    /**
     * Set length attribute.
     *
     * @param  string  $value
     * @return void
     */
    public function setLengthAttribute($value)
    {
        $this->attributes['length'] = $value * 100;
    }

    /**
     * Set depth attribute.
     *
     * @param  string  $value
     * @return void
     */
    public function setDepthAttribute($value)
    {
        $this->attributes['depth'] = $value * 100;
    }

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

    /**
     * Return the boat description.
     * 
     * @return string
     */
    public function description()
    {
        return $this->name . ' (' . $this->length . ' m)';
    }
}
