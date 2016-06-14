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
        if (!empty($this->start) && !empty($this->end))
        {

            return date('d-m-Y', strtotime($this->start)) . ' - ' . date('d-m-Y', strtotime($this->end));
        }
        else
        {
            return '';
        }
    }

    /**
     * Return a formatted string with the price of a product.
     *
     * @return string
     */
    public function formattedPrice()
    {
        return number_format($this->price / 100, 2, ',', '.');
    }

    /**
     * Return a formatted string with the total price of a product.
     *
     * @return string
     */
    public function formattedTotalPrice()
    {
        return number_format($this->price * $this->amount / 100, 2, ',', '.');
    }
}