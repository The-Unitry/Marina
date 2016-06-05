<?php

namespace Navicula\Models;

use Illuminate\Database\Eloquent\Model;

class Boat extends Model
{
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
