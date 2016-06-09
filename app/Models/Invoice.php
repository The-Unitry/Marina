<?php

namespace Navicula\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = ['status', 'price', 'tax'];

    /**
     * Get the reservation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function reservation()
    {
        return $this->belongsTo(Reservation::class, 'reservation_id');
    }

    /**
     * Return a formatted string with the total price of an invoice.
     *
     * @return string
     */
    public function totalPrice()
    {
        $totalPrice = ($this->price + $this->tax) / 100;

        return number_format($totalPrice, 2, ',', '.');
    }

    /**
     * Return all products from this invoice.
     *
     * @return hasMany
     */
    public function products()
    {
        return $this->hasMany(Product::class, 'invoice_id');
    }
}
