@extends('umaster')
@section('title', 'Konfirmasi Pembayaran')
@section('breadcrumb')
<a href="{{ url('order') }}">Pesanan <i class="fa fa-caret-right" aria-hidden="true"></i></a>
<a href="{{ url('order/'.$order->code) }}">{{ $order->getCode() }} <i class="fa fa-caret-right" aria-hidden="true"></i></a>
<a href="#">Konfirmasi</a>
@endsection
@section('content')
<div class="row">
	<div class="col">
		<div class="card card-body">
			<h5 class="text-center mb-3">
				Sebelum mengisi form konfirmasi pembayaran pastikan anda sudah melakukan pembayaran dengan transfer ke salah satu rekening kami berikut ini.
			</h5>
			<div class="row mb-3 justify-content-center">
				<div class="col-md-4">
					<div class="card card-body text-center">
						<h3>Jumlah Pembayaran</h3>
						<h3 class="text-primary">{{ $order->totalStringFormatted() }}</h3>
					</div>
				</div>
			</div>
			<div class="row mb-3">
				@foreach($adminBanks as $bank)
				<div class="col-sm-4">
					<div class="card">
						<div class="card-body">
							<img src="{{ asset('images/banks/'.$bank->logo) }}" class="img-fluid mx-auto d-block" 
							style="max-height: 92.64px">
						</div>
						<div class="card-footer">
							<p class="text-center">
								Bank {{ $bank->bank_name }} <br>
								{{ $bank->bank_account }} <br>
								a/n {{ $bank->under_the_name }}
							</p>
						</div>
					</div>
				</div>
				@endforeach
			</div>
			<h5 class="text-center mb-3">Setelah Transfer, Segera anda konfirmasi dengan mengisi form dibawah ini.</h5>
			<div class="row justify-content-center">
				<div class="col-md-10">
					<div class="card card-body">
						@include('pconfirmation.form')
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@push('scripts')
<script>
	$(function(){
		$('.datepicker').datepicker({
			autoclose: true,
			format: 'dd/mm/yyyy'
		});
	});
</script>
@endpush