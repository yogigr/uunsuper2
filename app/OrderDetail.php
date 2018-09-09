<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $fillable = [
    	'order_id', 'product_id', 'product_price', 'qty'
    ];

    public function totalPrice()
    {
        return $this->qty * $this->product_price;
    }

    public function totalPriceStringFormatted()
    {
        return 'Rp ' . number_format($this->totalPrice(), 0, '', '.');
    }

    public function productPriceStringFormatted()
    {
        return 'Rp ' . number_format($this->product_price, 0, '', '.');
    }

    //relation
    public function order()
    {
    	return $this->belongsTo('App\Order');
    }

    public function product()
    {
    	return $this->belongsTo('App\Product');
    }

}
