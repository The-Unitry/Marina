<?php

namespace Navicula\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	protected $fillable = ['invoice_id'];

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
}