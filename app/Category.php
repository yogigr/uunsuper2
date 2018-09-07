<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
    	'name', 'slug'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    //relation
    public function products()
    {
    	return $this->hasMany('App\Product');
    }
}
