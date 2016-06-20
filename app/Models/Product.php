<?php

namespace Navicula\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	protected $fillable = ['invoice_id', 'amount', 'description', 'price', 'start', 'end', 'vat'];

    /**
     * Return the period if isset
     *
     * @return string
     */
    public function period()
    {
        if (!empty($this->start) && !empty($this->end)) {
            return date('d-m-Y', strtotime($this->start)) . ' - ' . date('d-m-Y', strtotime($this->end));
        }
        
        return '';
    }

    /**
     * Return the total VAT.
     *
     * @return float
     */
    public function totalVat()
    {
        return ($this->price * $this->amount) * ($this->vat / 100);
    }

    /**
     * Return the total price.
     *
     * @return float
     */
    public function totalPrice()
    {
        return ($this->price * $this->amount) + $this->totalVat();
    }

    /**
     * Return a formatted string with the price of a product.
     *
     * @return string
     */
    public function formattedPrice()
    {
        return euro($this->price / 100);
    }

    /**
     * Return a formatted string with the total price of a product.
     *
     * @return string
     */
    public function formattedTotalPrice()
    {
        return euro($this->price * $this->amount / 100);
    }
}
