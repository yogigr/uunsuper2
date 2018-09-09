@extends('print.master')
@section('title', 'Invoice '.$order->getCode())
@section('content')
<div class="card">
	<div class="card-header">
		Invoice
		<strong>#{{ $order->getCode() }}</strong> 
		<span class="float-right"> <strong>Tanggal:</strong> {{ $order->getDate() }}</span>
	</div>
	<div class="card-body">
		<div class="row mb-4">
			<div class="col-sm-6">
				<h6 class="mb-3">Dari:</h6>
				<div>
					<strong>{{ $company->name }}</strong>
				</div>
				<div>{{ $company->address }}</div>
				<div>{{ $company->city->name }} {{ $company->province->name }} {{ $company->postal_code }}</div>
				<div>Email: {{ $company->email }}</div>
				<div>Phone: {{ $company->phone1 }}</div>
			</div>

			<div class="col-sm-6">
				<h6 class="mb-3">Kepada:</h6>
				<div>
					<strong>{{ $order->user->name }}</strong>
				</div>
				<div>{{ $order->user->address }}</div>
				<div>{{ $order->user->city->name }} {{ $order->user->province->name }} {{ $order->user->postal_code }}</div>
				<div>Email: {{ $order->user->email }}</div>
				<div>Phone: {{ $order->user->phone }}</div>
			</div>



		</div>

		<div class="table-responsive-sm">
			<table class="table table-striped">
				<thead>
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