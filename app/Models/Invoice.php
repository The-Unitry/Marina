<?php

namespace Navicula\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = ['status', 'price', 'tax', 'user_id'];

    private $totalPrice;

    /**
     * Get the user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function number()
    {
        return sprintf('%06d', $this->id);
    }

    /**
     * Return a formatted string with the total price of an invoice.
     *
     * @return string
     */
    public function totalPrice()
    {
        $this->totalPrice = 0;
        foreach ($this->products as $product) {
            $this->totalPrice += $product->price * $product->amount;
        }

        return number_format($this->totalPrice / 100, 2, ',', '.');
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
