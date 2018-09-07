<?php

namespace App\Traits;

use Carbon\Carbon;
use App\Company;
use DB;

trait OrderTrait
{
	public function generateCode($char, $table, $digitLength = 3)
    {
        $maxCodeToday = DB::table($table)->whereDate('created_at', today())->max('code');
        $today = Carbon::parse(today())->format('Ymd');
        if (is_null($maxCodeToday)) {
        	return $char . $today . str_pad(1, $digitLength, '0', STR_PAD_LEFT);
        } else {
            $currentNumber = substr($maxCodeToday, strlen($char) + strlen($today), $digitLength);
            $newNumber = str_pad((int)($currentNumber + 1), $digitLength, '0', STR_PAD_LEFT);
            return $char . $today . $newNumber;
        }
    }

    public function shippingCost($user)
    {
        if (Company::first()->city_id == $user->city_id) {
            return 250000;
        } else {
            return 1800000;
        }
    }

}