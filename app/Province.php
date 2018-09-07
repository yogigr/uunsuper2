<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $fillable = [
    	'name'
    ];

    public function users()
    {
    	return $this->hasMany('App\User');
    }

    public function company()
    {
    	return $this->hasOne('App\Company');
    }

    public function cities()
    {
        return $this->hasMany('App\City');
    }

    public function orders()
    {
        return $this->hasMany('App\Order');
    }
}
