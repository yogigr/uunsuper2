<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Hash;

class ProfileController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

    public function index()
    {
    	$user = Auth::user();
    	return view('profile.index', compact('user'));
    }

    public function update(Request $request)
    {
    	$user = Auth::user();
    	$request->validate([
    		'name' => 'required|string',
    		'email' => 'required|string|unique:users,email,'.$user->id,
    		'phone' => 'required',
    		'province_id' => 'required',
    		'city_id' => 'required',
    		'address' => 'required',
    		'postal_code' => 'required'
    	]);

    	$user->name = $request->name;
    	$user->email = $request->email;
    	$user->phone = $request->phone;
    	$user->province_id = $request->province_id;
    	$user->city_id = $request->city_id;
    	$user->address = $request->address;
    	$user->postal_code = $request->postal_code;
    	$user->save();

    	return back()->with('status', 'Berhasil update profile'); 
    }

    public function changePassword(Request $request)
    {
    	$user = Auth::user();
    	$request->validate([
    		'current_pass' => [
				'required',
				function($attribute, $value, $fail) use ($user) {
					if (!Hash::check($value, $user->password)) {
						return $fail($attribute.' is invalid');
					}
				},
			],
			'new_pass' => 'required|string|min:6|confirmed'
    	]);
    	$user->password = bcrypt($request->new_pass);
    	$user->save();
    	return back()->with('status', 'Berhasil mengganti password');
    }
}
