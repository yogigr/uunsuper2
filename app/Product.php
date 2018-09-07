<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
    	'name', 'slug', 'description', 'price', 'category_id', 'photo', 'is_in_stock'
    ];

    public function priceFormatted()
    {
    	return 'Rp ' . number_format($this->price, 0, '', '.');
    }

    public function getPhoto()
    {
        if (is_null($this->photo)) {
            return asset('images/product/null.jpg');
        } else {
            return asset('images/product/'.$this->photo);
        }
    }

    public function getBadge()
    {
        if ($this->is_in_stock) {
            return 'badge badge-success';
        } else {
            return 'badge badge-danger';
        }
    }

    public function getStatus()
    {
        if ($this->is_in_stock) {
            return 'Tersedia';
        } else {
            return 'Kosong';
        }
    }

    public function priceStringFormatted()
    {
        return 'Rp ' . number_format($this->price, 0, '', '.');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    //relation
    public function category()
    {
    	return $this->belongsTo('App\Category');
    }
}
