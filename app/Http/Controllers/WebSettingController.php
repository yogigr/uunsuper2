<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;

class WebSettingController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }

    public function index()
    {
    	$company = Company::firstOrFail();
    	return view('admin.setting.index', compact('company'));
    }

    public function update(Request $request)
    {
    	$company = Company::firstOrFail();

    	$request->validate([
    		'name' => 'required|string',
            'slogan' => 'required|string',
    		'description' => 'required|string',
    		'province_id' => 'required',
    		'city_id' => 'required',
    		'address' => 'required|string',
    		'postal_code' => 'required|numeric',
    		'phone1' => 'required',
    		'email' => 'required',
    		'logo' => 'image|mimes:jpeg,png|max:200'
    	]);

    	if ($request->hasFile('logo')) {
    		if (file_exists(public_path('images/web/'.$company->logo))) {
    			File::delete(public_path('images/web/'.$company->logo));
    		}

    		//upload logo
    		$filename = 'logo.'.$request->logo->getClientOriginalExtension();
    		$request->logo->move(public_path('images/web'), $filename);
    		$company->logo = $filename;
    		$company->save();
    	}

    	//update database
    	$company->name = $request->name;
        $company->slogan = $request->slogan;
    	$company->description = $request->description;
    	$company->email = $request->email;
    	$company->address = $request->address;
    	$company->city_id = $request->city_id;
    	$company->province_id = $request->province_id;
    	$company->postal_code = $request->postal_code;
    	$company->phone1 = $request->phone1;
    	$company->phone2 = $request->phone2;
    	$company->instagram = $request->instagram;
    	$company->facebook = $request->facebook;
    	$company->twitter = $request->twitter;
    	$company->google = $request->google;
    	$company->save();

    	return redirect('admin/web-setting')->with('status', 'Berhasil update data perusahaan');
    }
}
