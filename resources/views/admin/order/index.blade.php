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
			<div class="col-sm-8 text-right">
				<form method="post" action="{{ url('admin/order/clear-pending-order') }}">
					{{ csrf_field() }}
					{{ method_field('delete') }}
					<button type="submit" class="btn btn-danger" onclick="return confirm('yakin hapus semua pesanan pending?')">
						<i class="fa fa-trash"></i>
						Hapus semua Pesanan Pending
					</button>
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
									@if($order->order_status_id == 1)
										<form method="post" action="{{ url('admin/order/'.$order->code) }}" class="mt-1">
											{{ csrf_field() }}
											{{ method_field('delete') }}
											<button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('yakin hapus pesanan?')">
												<i class="fa fa-trash"></i>
											</button>
										</form>
									@endif
								</td>
							</tr>
						@endforeach
					@else
						<tr><td colspan="7">
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