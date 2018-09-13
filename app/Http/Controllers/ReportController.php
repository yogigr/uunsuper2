<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Order;
use App\Product;
use App\User;

class ReportController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }

    public function index()
    {
    	return view('admin.report.index');
    }

    public function print(Request $request)
    {
    	if ($request->get('entity') == 'order') {
    		$from = Carbon::createFromFormat('d/m/Y', $request->get('from'))->toDateString();
    		$to = Carbon::createFromFormat('d/m/Y', $request->get('to'))->toDateString();
    		$orders = Order::whereBetween('created_at', [$from, $to])->orderBy('created_at', 'asc')->get(); 
    		return view('print.order', compact('orders'));
    	} elseif ($request->get('entity') == 'produk') {
    		$from = Carbon::createFromFormat('d/m/Y', $request->get('from'))->toDateString();
    		$to = Carbon::createFromFormat('d/m/Y', $request->get('to'))->toDateString();
    		$products = Product::whereBetween('created_at', [$from, $to])->orderBy('created_at', 'asc')->get();
    		return view('print.product', compact('products')); 
    	} elseif ($request->get('entity') == 'user') {
    		$from = Carbon::createFromFormat('d/m/Y', $request->get('from'))->toDateString();
    		$to = Carbon::createFromFormat('d/m/Y', $request->get('to'))->toDateString();
    		$users = User::whereBetween('created_at', [$from, $to])->orderBy('created_at', 'asc')->get();
    		return view('print.user', compact('users')); 
    	}


    }
}
