<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;

class UserController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }

    public function index()
    {
    	if (request('query')) {
    		$users = User::where('name', 'like', '%'.request('query').'%')->orWhere('email', 'like', '%'.request('query').'%')
    		->paginate(10)->appends(request()->except('page'));
    	} else {
    		$users = User::orderBy('role_id', 'asc')->paginate(10);
    	}

    	return view('admin.user.index', compact('users'));
    }

    public function create()
    {
    	$roles = Role::all();
    	return view('admin.user.create', compact('roles'));
    }

    public function store(Request $request)
    {
    	$request->validate([
    		'name' => 'required|string',
    		'email' => 'required|string|unique:users,email',
    		'password' => 'required|string|min:6|confirmed',
    		'role_id' => 'required',
    		'province_id' => 'required',
    		'city_id' => 'required',
    		'address' => 'required',
    		'postal_code' => 'required|numeric',
    		'phone' => 'required|numeric'
    	]);

    	$user = User::create([
    		'name' => $request->name,
    		'email' => $request->email,
    		'password' => $request->password,
    		'role_id' => $request->role_id,
    		'province_id' => $request->province_id,
    		'city_id' => $request->city_id,
    		'address' => $request->address,
    		'postal_code' => $request->postal_code,
    		'phone' => $request->phone
    	]);

    	return redirect('admin/user/'.$user->id)->with('status', 'Berhasil membuat user baru');
    }

    public function update(User $user, Request $request)
    {
    	$request->validate([
    		'name' => 'required|string',
    		'email' => 'required|string|unique:users,email,'.$user->id,
    		'role_id' => 'required',
    		'province_id' => 'required',
    		'city_id' => 'required',
    		'address' => 'required',
    		'postal_code' => 'required|numeric',
    		'phone' => 'required|numeric'
    	]);

		$user->name = $request->name;
		$user->email = $request->email;
		$user->role_id = $request->role_id;
		$user->province_id = $request->province_id;
		$user->city_id = $request->city_id;
		$user->address = $request->address;
		$user->postal_code = $request->postal_code;
		$user->phone = $request->phone;
    	$user->save();

    	return redirect('admin/user/'.$user->id)->with('status', 'Berhasil update data user');
    }

    public function edit(User $user)
    {
    	$roles = Role::all();
    	return view('admin.user.edit', compact('user', 'roles'));
    }

    public function show(User $user)
    {
    	return view('admin.user.show', compact('user'));
    }

    public function destroy(User $user)
    {
    	$user->delete();
    	return redirect('admin/user')->with('status', 'Berhasil hapus user');
    }
}
