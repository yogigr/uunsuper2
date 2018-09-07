<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Product;
use App\Company;
use Auth;
use Cart;


class CartController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth')->only([
			'alamatPengiriman', 'updateAlamatPengiriman', 'konfirmasiPembelian'
		]);
	}

	public function index()
	{
		$carts = Cart::content();
		return view('cart.index', compact('carts'));
	}

    public function store(Request $request, Product $product)
    {
    	Cart::add($product->id, $product->name, $request->quantity, $product->price);
    	return back()->with('status', 'Keranjang telah ditambahkan.');
    }

    public function edit(Request $request, $rowId)
    {
    	if (!$request->ajax()) {
    		abort(404);
    	}
    	$cart = Cart::get($rowId);
    	return view('cart.edit', compact('cart'));
    }

    public function update(Request $request, $rowId)
    {
    	Cart::update($rowId, $request->quantity);
    	return back();
    }

    public function destroy($rowId)
    {
    	Cart::remove($rowId);
    	return back();
    }

    public function clear()
    {
    	Cart::destroy();
    	return back();
    }

    public function alamatPengiriman()
    {
    	if (Cart::count() < 1) {
    		abort(404);
    	}
    	$user = Auth::user();
        $company_city_id = Company::first()->city_id;
        $ongkir = $user->city_id == $company_city_id ? 250000 : 1800000;
        $total = Cart::subtotal(0, '', '') + $ongkir;
    	return view('cart.alamat_pengiriman', compact('user', 'ongkir', 'total', 'company_city_id'));
    }

    public function updateAlamatPengiriman(Request $request, User $user)
    {
    	$request->validate([
    		'address' => 'required',
    		'city_id' => 'required',
    		'province_id' => 'required',
    		'postal_code' => 'required',
    		'phone' => 'required'
    	]);

    	$user->address = $request->address;
    	$user->city_id = $request->city_id;
    	$user->province_id = $request->province_id;
    	$user->postal_code = $request->postal_code;
    	$user->phone = $request->phone;
    	$user->save();

    	return redirect()->route('cart.konfirmasi.pembelian');
    }

    public function konfirmasiPembelian()
    {
    	if (Cart::count() < 1) {
    		abort(404);
    	}

    	$user = Auth::user();
    	$carts = Cart::content();
        $ongkir = $user->city_id == Company::first()->city_id ? 250000 : 1800000;
        $total = Cart::subtotal(0, '', '') + $ongkir;
    	return view('cart.konfirmasi_pembelian', compact('user', 'carts', 'ongkir', 'total'));
    }
}
