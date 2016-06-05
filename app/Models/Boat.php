<?php

namespace Navicula\Models;

use Illuminate\Database\Eloquent\Model;

class Boat extends Model
{
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
