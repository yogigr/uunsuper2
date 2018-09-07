@extends('umaster')
@section('title', 'Alamat Pengiriman')
@section('breadcrumb')
<a href="#">Alamat Pengiriman</a>
@endsection
@section('content')
	<div class="row">
		<div class="col-sm-12">
			<div class="card card-default">
				<div class="card-header">
					@include('cart.nav')
				</div>
				<div class="card-body">
					<div class="alert alert-info">
						<h4>Info!</h4>
						<p>Ongkos kirim wilayah Kabupaten Majalengka Rp 250.000 <br>
						Diluar Wilayah Rp 1.800.000</p>
					</div>
					<form id="formUpdateAlamatPengiriman" method="post" action="{{ url('alamat-pengiriman/'.$user->id) }}">
						{{ csrf_field() }}
						<div class="row">
							<div class="col-sm-8">
								<div class="row">
									<div class="col">
										<div class="form-group">
											<label>Propinsi</label>
											<select id="province_id" name="province_id" class="form-control 
											{{ $errors->has('province_id') ? 'is-invalid' : '' }}">	
											</select>
											@if($errors->has('province_id'))
												<span class="invalid-feedback">
													{{ $errors->first('province_id') }}
												</span>
											@endif
										</div>
									</div>
									<div class="col">
										<div class="form-group">
											<label>Kota / Kabupaten</label>
											<select id="city_id" name="city_id" class="form-control
											{{ $errors->has('city_id') ? 'is-invalid' : '' }}">
											</select>
											@if($errors->has('city_id'))
												<span class="invalid-feedback">
													{{ $errors->first('city_id') }}
												</span>
											@endif
										</div>
									</div>
								</div>
								
								<div class="form-group">
									<label>Alamat</label>
									<textarea name="address" class="form-control
									{{ $errors->has('address') ? 'is-invalid' : '' }}">{{ $user->address }}</textarea>
									@if($errors->has('address'))
										<span class="invalid-feedback">
											{{ $errors->first('address') }}
										</span>
									@endif
								</div>
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<label>Kode Pos</label>
											<input type="text" name="postal_code" class="form-control
											{{ $errors->has('postal_code') ? 'is-invalid' : '' }}" value="{{ $user->postal_code }}">
											@if($errors->has('postal_code'))
												<span class="invalid-feedback">
													{{ $errors->first('postal_code') }}
												</span>
											@endif
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label>Telpon</label>
											<input type="text" name="phone" class="form-control
											{{ $errors->has('postal_code') ? 'is-invalid' : '' }}" value="{{ $user->phone }}">
											@if($errors->has('phone'))
												<span class="invalid-feedback">
													{{ $errors->first('phone') }}
												</span>
											@endif
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="card card-body">
									<div class="form-group">
										<label>Subtotal</label>
										<input type="text" id="subtotal" name="subtotal" value="{{ Cart::subtotal(0, '', '') }}" 
										class="form-control" readonly>
									</div>
									<div class="form-group">
										<label>Ongkos Kirim</label>
										<input type="text" id="ongkir" name="ongkir" value="{{ $ongkir }}" class="form-control" readonly>
									</div>
									<div class="form-group">
										<label>Total</label>
										<input type="text" id="total" name="total" value="{{ $total }}" class="form-control" readonly>
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>
				<div class="card-footer">
					<div class="row">
						<div class="col">
							<button class="btn btn-warning"
							onclick="window.location='{{ url('cart') }}'">
								<i class="fa fa-angle-left"></i>
								Edit Keranjang
							</button>
						</div>
						<div class="col text-right">
							<button class="btn btn-primary"
							onclick="getElementById('formUpdateAlamatPengiriman').submit()">
								Konfirmasi Pembelian
								<i class="fa fa-angle-right"></i>
							</button>
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
		province_init();

		$('#province_id').on('change', function(){
			city_init($(this).val());
		});

		$('#city_id').on('change', function(){
			if ($(this).val() == '{{ $company_city_id }}') {
				ongkir = 250000;
			} else {
				ongkir = 1800000;
			}

			$('#ongkir').val(ongkir);
			print_total(parseInt($('#subtotal').val()), ongkir);
		});
	});

	function province_init(){
		$.ajax({
			method: 'get',
			url: '{{ url("api/province") }}',  
			error: function(msg){
				console.log(msg.responseJSON)
			},
			success: function(data){
				print_options('#province_id', data);
				$('#province_id').val('{{ $user->province_id }}');
				city_init($('#province_id').val());
			}
		});
	}

	function city_init(provinceid){
		$.ajax({
			method: 'get',
			url: '{{ url("api/province") }}/'+provinceid+'/city',  
			error: function(msg){
				console.log(msg.responseJSON)
			},
			success: function(data){
				print_options('#city_id', data);
				$('#city_id').val('{{ $user->city_id }}');
			}
		});
	}

	function print_options(id, data){
		var el = '<option value="">Pilih</option>';
		$.each(data, function(index, value){
			if (id == '#city_id') {
				el += '<option value="'+value.id+'">'+value.type+' '+value.name+'</option>';
			} else {
				el += '<option value="'+value.id+'">'+value.name+'</option>';
			}
		});
		$(id).html(el);
	}

	function print_total(subtotal, ongkir){
		$('#total').val(subtotal+ongkir);
	}
</script>
@endpush