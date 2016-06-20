<?php

namespace Navicula\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Invoice extends Model
{
    protected $fillable = ['status', 'price', 'tax', 'user_id', 'due_days'];

    private $totalPrice, $subtotalPrice, $totalVat;

    /**
     * Get the user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
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
            $this->totalPrice += $product->totalPrice();
        }

        return euro($this->totalPrice / 100);
    }

    /**
     * Return a formatted string with the total price of an invoice.
     *
     * @return string
     */
    public function totalVat()
    {
        $this->totalVat = 0;
        foreach ($this->products as $product) {
            $this->totalVat += $product->totalVat();
        }

        return euro($this->totalVat / 100);
    }

    /**
     * Return a formatted string with the total price of an invoice.
     *
     * @return string
     */
    public function subtotalPrice()
    {
        $this->subtotalPrice = 0;
        foreach ($this->products as $product) {
            $this->subtotalPrice += ($product->price * $product->amount);
        }

        return euro($this->subtotalPrice / 100);
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

    /**
     * Get the total revenue for a month.
     * 
     * @return float
     */
    public static function getRevenueForMonth($month)
    {
        $total = 0;

        foreach(self::where(DB::raw('MONTH(created_at)'), '=', $month)->get() as $invoice) {
            foreach($invoice->products as $product) {
                $total += $product->totalPrice() / 100;
            }
        }

        return $total;
    }
}
