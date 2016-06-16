<?php

namespace Navicula\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Box extends Model
{
    protected $fillable = ['depth', 'length', 'width', 'scaffold_id', 'price_per_night', 'code'];
    protected $hidden = ['created_at', 'updated_at'];

    /**
     * Get the scaffold where the box is located.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function scaffold()
    {
        return $this->belongsTo(Scaffold::class, 'scaffold_id');
    }

    /**
     * Get the full box code, prefixed by the scaffold code.
     *
     * @return string
     */
    public function getFullCode()
    {
        return $this->scaffold->code . $this->code;
    }

    /**
     * Return the formatted string of the price per night.
     *
     * @return string
     */
    public function pricePerNight()
    {
        return '&euro; ' . number_format($this->price_per_night / 100, 2, ',', '.');
    }

    /**
     * Get the total price by the amount of nights.
     *
     * @param $nights
     * @return mixed
     */
    public function getTotalPrice($nights)
    {
        return $this->price_per_night * $nights;
    }

    /**
     * Get the formatted total price.
     *
     * @param $nights
     * @return string
     */
    public function totalPrice($nights)
    {
        return '&euro; ' . number_format($this->getTotalPrice($nights) / 100, 2, ',', '.');
    }

    /**
     * Check if a box is available.
     * 
     * @param Carbon|null $date
     * @return bool
     */
    public function isAvailable(Carbon $date = null)
    {
        if (is_null($date)) {
            $date = Carbon::now();
        }

        $reservations = Reservation::where('box_id', $this->id)->get();

        if (count($reservations) == 0) {
            return true;
        }
        
        foreach ($reservations as $reservation) {
            if (!$reservation->hasReservationForDay($date)) {
                return false;
            }
        }

        return true;
    }

    /**
     * Check if a box is available between two dates.
     * 
     * @param $start
     * @param $end
     * @return boolean
     */
    public function isAvailableBetween($start, $end)
    {
        $start = new Carbon($start);
        $end = new Carbon($end);

        for ($i = 0; $i < $end->diffInDays($start); $i++) {
            $day = $start->addDay();

            if (!$this->isAvailable($day)) {
                return false;
            }

            return true;
        }
    }
}
