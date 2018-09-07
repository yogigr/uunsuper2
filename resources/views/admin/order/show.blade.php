@extends('admin.amaster')
@section('title', 'Order '. $order->getCode())
@section('content')
@if(session('status'))
<div class="alert alert-success">
	{{ session('status') }}
</div>
@endif
<div class="card card-body">
	<div class="row">
		<div class="col-12 col-sm-4">
			<p>Tanggal: {{  $order->getDate()}}</p>
		</div>
		<div class="col-12 col-sm-4">
			<p>Status: <span class="{{ $order->getBadge() }}">{{ $order->order_status->name }}</span></p>
		</div>
		<div class="col-12 col-sm-4">
			@if($order->order_status_id == 1)
				<button class="btn btn-warning btn-sm"
				data-toggle="collapse" data-target="#paymentConfirmation" aria-expanded="false">Lihat Konfirmasi Pembayaran</button>
			@elseif($order->order_status_id == 2)
				<form method="post" action="{{ url('admin/order/'.$order->code.'/send') }}" onsubmit="return confirm('Yakin pesanan akan dikirim?')">
					{{ csrf_field() }}
					{{ method_field('patch') }}
					<button class="btn btn-success btn-sm ">Kirim Pesanan</button>
				</form>
			@endif
		</div>
	</div>
	<div id="paymentConfirmation" class="collapse mb-3">
		<div class="row">
			<div class="col">
				<div class="card card-body">
					<h4 class="mb-3">Konfirmasi Pembayaran</h4>
					@if($order->hasPaymentConfirmation())
						<div class="row">
							<div class="col-md-3">
								<img src="{{ asset('images/payment_confirmation/'.$order->payment_confirmation->image) }}"
								class="img-fluid">
							</div>
							<div class="col-md-9">
								<div class="row">
									<div class="col">
										<div class="form-group">
											<label>Tanggal Transfer</label>
											<input type="text" name="transfer_date" class="form-control" disabled
											value="{{ $order->payment_confirmation->dateFormatted() }}">
										</div>
									</div>
									<div class="col">
										<div class="form-group">
											<label>Bank Tujuan</label>
											<input type="text" name="admin_bank_id" class="form-control" disabled
											value="{{ $order->payment_confirmation->admin_bank->bank_name }} ({{ $order->payment_confirmation->admin_bank->bank_account }})">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col">
										<div class="form-group">
											<label>Nama Bank Pengirim</label>
											<input type="text" name="user_bank_name" class="form-control" disabled
											value="{{ $order->payment_confirmation->user_bank_name }}">
										</div>
									</div>
									<div class="col">
										<div class="form-group">
											<label>Rekening Bank Pengirim</label>
											<input type="text" name="user_bank_account" class="form-control" disabled
											value="{{ $order->payment_confirmation->bank_account }}">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col">
										<div class="form-group">
											<label>Atas Nama Pengirim</label>
											<input type="text" name="under_the_name" class="form-control" disabled
											value="{{ $order->payment_confirmation->under_the_name }}">
										</div>
									</div>
									<div class="col">
										<div class="form-group">
											<label>Jumlah Transfer</label>
											<input type="text" name="amount" class="form-control" disabled
											value="{{ $order->payment_confirmation->amountStringFormatted() }}">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col">
										<div class="form-group">
											<form method="post" action="{{ url('admin/order/'.$order->code.'/process') }}"
											onsubmit="return confirm('Yakin pembayaran selesai?')">
												{{ csrf_field() }}
												{{ method_field('patch') }}
												<button type="submit" class="btn btn-danger btn-sm">Pembayaran Selesai</button>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					@else
						<p class="text-danger">Belum konfirmasi Pembayaran</p>
					@endif
				</div>
			</div>
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
@endsection