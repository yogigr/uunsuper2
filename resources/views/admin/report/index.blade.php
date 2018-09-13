@extends('admin.amaster')
@section('title', 'Report')
@section('content')
<div class="card card-body">
	<div class="row justify-content-center">
		<div class="col-md-6">
			<form id="formToPrint" method="get" action="{{ url('admin/report/print') }}">
				<div class="form-group">
					<label>Pilih Entitas</label>
					<select name="entity" class="form-control {{ $errors->has('entity') ? 'is-invalid' : '' }}" required>
						<option value="">Pilih Entitas</option>
						<option value="order">Order</option>
						<option value="produk">Produk</option>
						<option value="user">User</option>
					</select>
					@if($errors->has('entity'))
						<div class="invalid-feedback">
							{{ $errors->first('entity') }}
						</div>
					@endif
				</div>
				<div class="form-group">
					<label>Dari Tanggal</label>
					<input type="text" name="from" class="form-control datepicker
					{{ $errors->has('from') ? 'is-invalid' : '' }}" id="from" required autocomplete="off">
					@if($errors->has('from'))
						<div class="invalid-feedback">
							{{ $errors->first('from') }}
						</div>
					@endif
				</div>
				<div class="form-group">
					<label>Sampai Tanggal</label>
					<input type="text" name="to" class="form-control datepicker
					{{ $errors->has('to') ? 'is-invalid' : '' }}" id="to" required autocomplete="off">
					@if($errors->has('to'))
						<div class="invalid-feedback">
							{{ $errors->first('to') }}
						</div>
					@endif
				</div>
				<div class="from-group">
					<button type="submit" class="btn btn-primary">
						<i class="fa fa-print"></i>
						Cetak
					</button>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection
@push('scripts')
<script>
	$(function(){
		$('.datepicker').datepicker({
			autoclose: true,
			format: 'dd/mm/yyyy',
			orientation: 'bottom'
		});

		$('#formToPrint').on('submit', function(e){
			e.preventDefault();
			window.open($(this).attr('action')+'?'+$(this).serialize(), '_blank');
		});
	});
</script>
@endpush