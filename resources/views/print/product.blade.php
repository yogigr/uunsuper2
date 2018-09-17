@extends('print.master')
@section('title', 'Product Report')
@section('content')
<h3 class="text-center">Laporan Produk</h3>
<p class="text-center">Periode <strong>{{ request('from') }}</strong> s/d <strong>{{ request('to') }}</strong></p>
<div class="table-responsive">
	<table class="table">
		<thead class="thead-light">
			<tr>
				<th>#</th>
				<th>Nama Product</th>
				<th>Kategori</th>
				<th>Harga</th>
				<th>Status</th>
			</tr>
		</thead>
		<tbody>
			@if($products->count() > 0)
				@foreach($products as $product)
					<tr>
						<td>
							<img src="{{ $product->getPhoto() }}" class="img-fluid" style="width: 50px">
						</td>
						<td>{{ $product->name }}</td>
						<td>{{ $product->category->name }}</td>
						<td>{{ $product->priceStringFormatted() }}</td>
						<td>
							<span class="{{ $product->getBadge() }}">{{ $product->getStatus() }}</span>
						</td>
					</tr>
				@endforeach
			@else
			<tr><td colspan="5">
				@if(request('query'))
					Produk tidak ditemukan
				@else
					Belum ada produk
				@endif
			</td></tr>
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