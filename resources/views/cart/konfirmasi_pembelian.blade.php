@extends('umaster')
@section('title', 'Konfirmasi Pembelian')
@section('breadcrumb')
<a href="#">Konfirmasi Pembelian</a>
@endsection
@section('content')
<div class="row">
	<div class="col-sm-12">
		<div class="card card-default">
			<div class="card-header">
				@include('cart.nav')
			</div>
			<div class="card-body">
				{{--Alamat Pengiriman--}}
				<div class="table-responsive">
					<table class="table table-bordered table-hover">
						<tbody>
							<tr>
								<td>
									<strong>Alamat Pengiriman</strong><br>
									{{ $user->address }}<br>
									{{ $user->city->type }} {{ $user->city->name }}
									{{ $user->province->name }}
									{{ $user->postal_code }}<br>
									Telp. {{ $user->phone }}
								</td>
							</tr>
						</tbody>
					</table>
				</div>
				{{--Keranjang--}}
				<div class="table-responsive">
					<table class="table table-bordered table-hover">
						<tbody>
							<tr>
								<td colspan="2">
									<strong>Keranjang</strong>
								</td>
							</tr>
							@foreach($carts as $cart)
								<tr>
									<td>
										<h5 class="text-primary" style="margin:0">{{ $cart->name }}</h5>
										{{ $cart->qty }} x Rp {{ number_format($cart->price, 0, '', '.') }}<br>
									</td>
									<td class="text-right">
										Rp {{ $cart->subtotal(0, '', '.') }}
									</td>
								</tr>
							@endforeach
							<tr>
								<td colspan="2" class="text-right">
									Subtotal<br>Rp {{ Cart::subtotal(0, '', '.') }}
								</td>
							</tr>
							<tr>
								<td colspan="2" class="text-right">
									Ongkos Kirim<br>Rp {{ number_format($ongkir, 0, '', '.') }}
								</td>
							</tr>
							<tr>
								<td colspan="2" class="text-right font-weight-bold">
									<strong>Total<br>Rp {{ number_format($total, 0, '', '.') }}</strong>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<div class="card-footer">
				<div class="row">
					<div class="col-sm-6">
						<button class="btn btn-warning"
						onclick="window.location='{{ url('alamat-pengiriman') }}'">
							<i class="fa fa-angle-left"></i>
							Alamat Pengiriman
						</button>
					</div>
					<div class="col-sm-6 text-right">
						<button id="btnKonfirmasiPembelian" class="btn btn-danger">
							Pembayaran
							<i class="fa fa-angle-right"></i>
						</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@include('cart.modal_konfirmasi_pembelian')
@endsection
@push('scripts')
<script>
	$(function(){
		$('#btnKonfirmasiPembelian').on('click', function(){
			$('#modalKonfirmasiPembelian').modal('show');
		});
	});
</script>
@endpush