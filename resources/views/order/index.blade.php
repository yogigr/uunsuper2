@extends('umaster')
@section('title', 'Daftar Pesanan')
@section('breadcrumb')
<a href="#">Daftar Pesanan</a>
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
			<div class="table-responsive">
				<table class="table table-hover table-bordered">
					<thead class="thead-ligh">
						<tr>
							<th>#</th>
							<th>Tanggal</th>
							<th>Kode Pesanan</th>
							<th>Tagihan</th>
							<th>Status</th>
							<th>#</th>
						</tr>
					</thead>
					<tbody>
						@if($orders->count() > 0)
							@foreach($orders as $index => $order)
								<tr>
									<td class="text-center">{{ $index + $orders->firstItem() }}</td>
									<td>{{ $order->getDate() }}</td>
									<td>{{ $order->getCode() }}</td>
									<td>{{ $order->totalStringFormatted() }}</td>
									<td>
										<span class="{{ $order->getBadge() }}">
											{{ $order->order_status->name }}
										</span>
									</td>
									<td>
										<a href="{{ url('order/'.$order->code) }}" class="btn btn-primary btn-sm">
											<i class="fa fa-eye"></i>
											View
										</a>
									</td>
								</tr>
							@endforeach
						@else
							<tr><td colspan="6">Belum ada Pesanan</td></tr>
						@endif
					</tbody>
				</table>
			</div>
			{{ $orders->links('vendor.pagination.shop') }}
		</div>
	</div>
</div>
@endsection