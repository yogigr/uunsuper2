@extends('admin.amaster')
@section('title', 'Order')
@section('content')
@if(session('status'))
<div class="alert alert-success">
	{{ session('status') }}
</div>
@endif
<div class="card">
	<div class="card-header">
		<div class="row">
			<div class="col-sm-4">
				<form method="get" action="{{ url('admin/order') }}">
					<input type="text" name="query" class="form-control" value="{{ request('query') }}"
					placeholder="Cari Order">
				</form>
			</div>
		</div>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-hover table-bordered">
				<thead class="thead-ligh">
					<tr>
						<th>#</th>
						<th>Tanggal</th>
						<th>Kode Pesanan</th>
						<th>Customer</th>
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
								<td>{{ $order->user->name }}</td>
								<td>{{ $order->totalStringFormatted() }}</td>
								<td>
									<span class="{{ $order->getBadge() }}">
										{{ $order->order_status->name }}
									</span>
								</td>
								<td>
									<a href="{{ url('admin/order/'.$order->code) }}" class="btn btn-primary btn-sm">
										<i class="fa fa-eye"></i>
										View
									</a>
								</td>
							</tr>
						@endforeach
					@else
						<tr><td colspan="6">
							@if(request('query'))
								Order tidak ditemukan
							@else
								Belum ada Pesanan
							@endif
						</td></tr>
					@endif
				</tbody>
			</table>
		</div>
		{{ $orders->links() }}
	</div>
</div>
@endsection