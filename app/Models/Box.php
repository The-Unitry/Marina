<?php

namespace Navicula\Models;

use Illuminate\Database\Eloquent\Model;

class Box extends Model
{
    protected $fillable = ['id','depth','length','width', 'scaffold_id'];

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
        return $this->scaffold->code . $this->id;
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

    public function getTotalPrice($nights)
    {
        return $this->price_per_night * $nights;
    }

    public function totalPrice($nights)
    {
        return '&euro; ' . number_format($this->getTotalPrice($nights) / 100, 2, ',', '.');
    }
}
