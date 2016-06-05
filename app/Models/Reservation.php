<?php

namespace Navicula\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = [
        'user_id',
        'box_id',
        'reservation_type_id',
        'amount_of_persons',
        'start',
        'end',
        'boat_id',
        'approved'
    ];

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
