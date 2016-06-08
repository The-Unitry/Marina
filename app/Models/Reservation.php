<?php

namespace Navicula\Models;

use Carbon\Carbon;
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

    /**
     * Return the reservation's boat.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function box()
    {
        return $this->belongsTo(Box::class, 'box_id');
    }

    /**
     * Return the amount of days between the start and end date.
     *
     * @return int
     */
    public function totalNights()
    {
        $start = Carbon::parse($this->start);
        $end = Carbon::parse($this->end);

        return $end->diffInDays($start);
    }

    /**
     * Check if a reservation is planned for the given day.
     *
     * @param Carbon $day
     * @return bool
     */
    public function hasReservationForDay(Carbon $day)
    {
        $start = new Carbon($this->start);
        $end = new Carbon($this->end);

        if (!$this->approved)
        {
            return false;
        }

        return $day->between($start, $end);
    }

    /**
     * Get start attribute.
     *
     * @param $value
     * @return string
     */
    public function getStartAttribute($value)
    {
        $start = new Carbon($value);
        return $start->format('Y-m-d');
    }

    /**
     * Get end attribute.
     *
     * @param $value
     * @return string
     */
    public function getEndAttribute($value)
    {
        $end = new Carbon($value);
        return $end->format('Y-m-d');
    }
}
