<?php

use Illuminate\Http\Request;
use App\Province;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('province', function(){
	return response()->json(Province::all()->toArray());
});

Route::get('province/{province}/city', function(Province $province){
	return response()->json($province->cities()->get());
});
