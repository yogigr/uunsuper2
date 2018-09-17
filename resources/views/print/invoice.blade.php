@extends('print.master')
@section('title', 'Invoice '.$order->getCode())
@section('content')

	<div class="row">
		<div class="col">
			<address>
				<strong>{{ $company->name }}</strong><br>
				{{ $company->address }}<br>
				{{ $company->city->name }} {{ $company->province->name }} {{ $company->postal_code }}<br>
				<i class="fa fa-mobile"></i> {{ $company->phone1 }} <br>
				<i class="fa fa-envelope"></i> {{ $company->email }}
			</address>
		</div>
		<div class="col text-right">
			<img src="{{ $company->getLogo() }}" class="img-fluid">
		</div>
	</div>
	<hr>
	<div class="row mt-5">
		<div class="col">
			<address>
				<strong>Kepada:</strong><br>
				{{ $order->user->name }}<br>
				{{ $order->user->address }}<br>
				{{ $order->user->city->name }} {{ $order->user->province->name }} {{ $order->user->postal_code }}<br>
				<i class="fa fa-mobile"></i> {{ $order->user->email }} <br>
				<i class="fa fa-envelope"></i> {{ $order->user->phone }}
			</address>
		</div>
		<div class="col text-right">
			<strong>Invoice #{{ $order->getCode() }}</strong><br>
			<strong>Tanggal: {{ $order->getDate() }}</strong>
		</div>
	</div>

	<div class="row mt-5">
		<div class="col">
			<div class="table-responsive-sm">
				<table class="table table-striped table-bordered">
					<thead class="thead-dark">
						<tr>
							<th>Item</th>
							<th class="text-right">Unit Cost</th>
						 	<th class="text-center">Qty</th>
							<th class="text-right">Total</th>
						</tr>
					</thead>
					<tbody>
						@foreach($order->order_details as $detail)
						<tr>
							<td>{{ $detail->product->name }}</td>
							<td class="text-right">{{ $detail->productPriceStringFormatted() }}</td>
							<td class="text-center">{{ $detail->qty }}</td>
							<td class="text-right">{{ $detail->totalPriceStringFormatted() }}</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-4 col-sm-5">

		</div>

		<div class="col-lg-4 col-sm-5 ml-auto">
			<table class="table table-clear">
				<tbody>
					<tr>
						<td class="left">
							<strong>Subtotal</strong>
						</td>
						<td class="text-right">{{ $order->subtotalStringFormatted() }}</td>
					</tr>
					<tr>
						<td class="left">
							<strong>Ongkir</strong>
						</td>
						<td class="text-right">{{ $order->shippingCostStringFormatted() }}</td>
					</tr>
					<tr>
						<td class="left">
							<strong>Total</strong>
						</td>
						<td class="text-right">
							<strong>{{ $order->totalStringFormatted() }}</strong>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
@endsection
@push('scripts')
<script>
	$(function(){
		window.print();
	});
</script>
@endpush