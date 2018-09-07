<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
    	'name', 'slug', 'description', 'price', 'category_id', 'photo'
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
