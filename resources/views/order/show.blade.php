@extends('umaster')
@section('title', 'Pesanan ' . $order->getCode())
@section('breadcrumb')
<a href="{{ url('order') }}">Pesanan <i class="fa fa-caret-right" aria-hidden="true"></i></a>
<a href="#">{{ $order->getCode() }}</a>
@endsection
@section('content')
@if(session('status'))
<div class="alert alert-success">
	{{ session('status') }}
</div>
@endif
<div class="row">
	<div class="col">
		<div class="card card-body">
			<div class="row">
				<div class="col-12 col-sm-3">
					<p>Tanggal: {{  $order->getDate()}}</p>
				</div>
				<div class="col-12 col-sm-3">
					<p>Status: <span class="{{ $order->getBadge() }}">{{ $order->order_status->name }}</span></p>
				</div>
				<div class="col-12 col-sm-3">
					@if($order->order_status_id == 1)
						<a href="{{ url('payment-confirmation/'.$order->code) }}" class="btn btn-warning btn-sm">Konfirmasi Pembayaran</a>
					@elseif($order->order_status_id == 3)
						<form method="post" action="{{ url('order/'.$order->code.'/delivered') }}" onsubmit="return confirm('Yakin?')">
							{{ csrf_field() }}
							{{ method_field('patch') }}
							<button class="btn btn-success btn-sm ">Konfirmasi Telah diterima</button>
						</form>
					@endif
				</div>
				<div class="col-12 col-md-3">
					@if($order->order_status_id != 1)
					<a href="{{ url('order/'.$order->code.'/invoice') }}" target="_blank" class="btn btn-secondary btn-sm">
						<i class="fa fa-print"></i>
						Invoice
					</a>
					@endif
				</div>
			</div>
			<div class="row mb-3">
				<div class="col-12">
					<h4 class="mb-1">Alamat Pengiriman:</h4>
					<div class="card card-body">
						{{ $order->user->name }} <br>
						{{ $order->address }} <br>
						{{ $order->city->type . ' ' . $order->city->name  }} - {{ $order->province->name }} 
						{{ $order->postal_code }} <br>
						{{ $order->phone }}
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<h4 class="mb-1">Detail Pesanan:</h4>
					<table class="table table-bordered">
						<tbody>
							@foreach($order->order_details as $detail)
								<tr>
									<td>
										<h5 class="text-primary" style="margin:0">{{ $detail->product->name }}</h5>
										{{ $detail->qty }} x Rp {{ number_format($detail->product_price, 0, '', '.') }}<br>
									</td>
									<td class="text-right">
										<strong>{{ $detail->totalPriceStringFormatted() }}</strong>
									</td>
								</tr>
							@endforeach
							<tr>
								<td colspan="2" class="text-right">
									<strong>Subtotal<br>{{ $order->subtotalStringFormatted() }}</strong>
								</td>
							</tr>
							<tr>
								<td colspan="2" class="text-right">
									<strong>Shipping Cost<br>{{ $order->shippingCostStringFormatted() }}</strong>
								</td>
							</tr>
							<tr>
								<td colspan="2" class="text-right font-weight-bold">
									<strong>Total<br>{{ $order->totalStringFormatted() }}</strong>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection