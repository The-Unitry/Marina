<?php

namespace Navicula\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
    protected $fillable = ['name', 'brand', 'model', 'type', 'color', 'type', 'height', 'length', 'width', 'depth', 'user_id'];

    /**
     * Get the owner of the boat.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
