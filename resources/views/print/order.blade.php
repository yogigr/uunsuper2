@extends('print.master')
@section('title', 'Order Report')
@section('content')
	<h3 class="text-center">Laporan Pesanan</h3>
	<p class="text-center">Periode <strong>{{ request('from') }}</strong> s/d <strong>{{ request('to') }}</strong></p>
	<div class="table-responsive">
		<table class="table">
			<thead>
				<tr>
					<th>#</th>
					<th>Kode Pesanan</th>
					<th>Nama Pembeli</th>
					<th class="text-right">Subtotal</th>
					<th class="text-right">Ongkir</th>
					<th class="text-right">Jumlah</th>
					<th>Status</th>
					<th class="text-right">Telpon Pembeli</th>
				</tr>
			</thead>
			<tbody>
				@if($orders->count() > 0)
					@foreach($orders as $order)
						<tr>
							<td>{{ $loop->iteration }}</td>
							<td>{{ $order->getCode() }}</td>
							<td>{{ $order->user->name }}</td>
							<td class="text-right">{{ $order->subtotalStringFormatted() }}</td>
							<td class="text-right">{{ $order->shippingCostStringFormatted() }}</td>
							<td class="text-right">{{ $order->totalStringFormatted() }}</td>
							<td><span class="{{ $order->getBadge() }}">{{ $order->order_status->name }}</span></td>
							<td class="text-right">{{ $order->phone }}</td>
						</tr>
					@endforeach
				@else
				<tr><td colspan="8">Tidak ada pesanan</td></tr>
				@endif
			</tbody>
		</table>
	</div>
@endsection
@push('scripts')
<script>
	$(function(){
		window.print();
	});
</script>
@endpush