<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = [
    	'name', 'province_id', 'type', 'postal_code'
    ];

    //relation
    public function province()
    {
    	return $this->belongsTo('App\Province');
    }

    public function users()
    {
    	return $this->hasMany('App\User');
    }

    public function company()
    {
        return $this->hasOne('App\Company');
    }

    public function city()
    {
        return $this->hasMany('App\Order');
    }
}
