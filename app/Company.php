<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
    	'name', 'description', 'address', 'city_id', 'province_id', 'postal_code', 'phone1', 'phone2',
    	'email', 'instagram', 'facebook', 'twitter', 'google', 'logo'
    ];

    public function city()
    {
    	return $this->belongsTo('App\City');
    }

    public function province()
    {
    	return $this->belongsTo('App\Province');
    }
}
