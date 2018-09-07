<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\OrderTrait;
use App\Order;
use App\OrderDetail;
use Auth;
use Cart;

class OrderController extends Controller
{
	use OrderTrait;

    public function __construct()
    {
    	$this->middleware('auth');
    }

    public function index()
    {
        if (Auth::user()->isAdmin()) {
            $orders = Order::orderBy('order_status_id', 'asc')->paginate(10);
            return view('order.index', compact('orders'));
        }

        $orders = Auth::user()->orders()->orderBy('order_status_id', 'asc')->paginate(10);
        return view('order.index', compact('orders'));
    }

    public function store(Request $request)
    {
    	$order = Order::create([
    		'code' => $this->generateCode('ord', 'orders'),
    		'address' => Auth::user()->address,
    		'city_id' => Auth::user()->city_id,
    		'province_id' => Auth::user()->province_id,
    		'postal_code' => Auth::user()->postal_code,
    		'phone' => Auth::user()->phone,
    		'shipping_cost' => $this->shippingCost(Auth::user()),
    		'subtotal' => Cart::subtotal(0, '', ''),
    		'user_id' => Auth::id()
    	]);

    	// orderdetail
    	foreach (Cart::content() as $cart) {
    		OrderDetail::create([
    			'order_id' => $order->id,
    			'product_id' => $cart->id,
    			'product_price' => $cart->price,
    			'qty' => $cart->qty
    		]);
    	}

    	//destroy carts
    	Cart::destroy();

    	return redirect()->route('order.show', ['order' => $order->code])
    	->with('status', 'Pesanan berhasil dibuat');
    }

    public function show(Order $order)
    {
    	return view('order.show', compact('order'));
    }

    public function delivered(Order $order)
    {
        $order->order_status_id = 4;
        $order->save();
        return redirect()->back()->with('status', 'Anda telah konfirmasi bahwa pesanan sudah diterima.');
    }

    public function process(Order $order)
    {
        $order->order_status_id = 2;
        $order->save();
        return back()->with('status', 'Pembayaran selasai, dan order akan diproses.');
    }

    public function send(Order $order)
    {
        $order->order_status_id = 3;
        $order->save();
        return back()->with('status', 'Pesanan dalam proses pengiriman.');
    }
}
