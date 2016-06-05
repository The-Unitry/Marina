<?php

namespace Navicula\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    /**
     * Return the reservation requester.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function requester()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Return the reservation's boat.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function boat()
    {
        return $this->belongsTo(Boat::class, 'boat_id');
    }
}
