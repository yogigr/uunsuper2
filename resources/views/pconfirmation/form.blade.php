<form method="post" action="{{ url('payment-confirmation/'.$order->code) }}"
enctype="multipart/form-data">
	{{ csrf_field() }}
	<div class="row">
		<div class="col-sm-6">
			<div class="form-group">
				<label>Tanggal Transfer</label>
				<input type="text" name="transfer_date" class="form-control datepicker
				{{ $errors->has('transfer_date') ? 'is-invalid' : '' }}"
				value="{{ $order->hasPaymentConfirmation() ? $order->payment_confirmation->dateFormatted() : old('transfer_date') }}">
				@if($errors->has('transfer_date'))
					<div class="invalid-feedback">
						{{ $errors->first('transfer_date') }}
					</div>
				@endif
			</div>
		</div>
		<div class="col-sm-6">
			<div class="form-group">
				<label>Rekening Tujuan</label>
				<select type="text" name="admin_bank_id" class="form-control
				{{ $errors->has('admin_bank_id') ? 'is-invalid' : '' }}">
					<option value="">Pilih Bank</option>
					@foreach($adminBanks as $bank)
						<option value="{{ $bank->id }}"
						{{ $order->hasPaymentConfirmation() ? ($order->payment_confirmation->admin_bank_id == $bank->id ? 'selected' : '') : (old('admin_bank_id') == $bank->id ? 'selected' : '') }}>
							{{ $bank->bank_account }}({{ $bank->bank_name }})
						</option>
					@endforeach
				</select>
				@if($errors->has('admin_bank_id'))
					<div class="invalid-feedback">
						{{ $errors->first('admin_bank_id') }}
					</div>
				@endif
			</div>
		</div>
	</div>
	<div class="row mb-1">
		<div class="col">
			<label>Nama Bank Pengirim</label>
			<input type="text" name="user_bank_name" class="form-control
			{{ $errors->has('user_bank_name') ? 'is-invalid' : '' }}"
			value="{{ $order->hasPaymentConfirmation() ? $order->payment_confirmation->user_bank_name : old('user_bank_name') }}">
			@if($errors->has('user_bank_name'))
				<div class="invalid-feedback">
					{{ $errors->first('user_bank_name') }}
				</div>
			@endif
		</div>
		<div class="col">
			<label>Rekening Bank Pengirim</label>
			<input type="text" name="bank_account" class="form-control
			{{ $errors->has('bank_account') ? 'is-invalid' : '' }}"
			value="{{ $order->hasPaymentConfirmation() ? $order->payment_confirmation->bank_account : old('bank_account') }}">
			@if($errors->has('bank_account'))
				<div class="invalid-feedback">
					{{ $errors->first('bank_account') }}
				</div>
			@endif
		</div>
		<div class="col">
			<label>Atas Nama Pengirim</label>
			<input type="text" name="under_the_name" class="form-control
			{{ $errors->has('under_the_name') ? 'is-invalid' : '' }}"
			value="{{ $order->hasPaymentConfirmation() ? $order->payment_confirmation->under_the_name : old('under_the_name') }}">
			@if($errors->has('under_the_name'))
				<div class="invalid-feedback">
					{{ $errors->first('under_the_name') }}
				</div>
			@endif
		</div>
	</div>
	<div class="row">
		<div class="col">
			<div class="form-group">
				<label>Jumlah Transfer</label>
				<input type="text" name="amount" class="form-control
				{{ $errors->has('amount') ? 'is-invalid' : '' }}"
				value="{{ $order->hasPaymentConfirmation() ? $order->payment_confirmation->amount : old('amount') }}">
				@if($errors->has('amount'))
					<div class="invalid-feedback">
						{{ $errors->first('amount') }}
					</div>
				@endif
			</div>
		</div>
		<div class="col">
			<label>Upload Bukti Transfer</label>
			<input type="file" name="image" class="form-control
			{{ $errors->has('image') ? 'is-invalid' : '' }}">
			@if($errors->has('image'))
				<div class="invalid-feedback">
					{{ $errors->first('image') }}
				</div>
			@endif
		</div>
	</div>
	<div class="row">
		<div class="col">
			<div class="form-group">
				<button type="submit" class="btn btn-primary">
					@if($order->hasPaymentConfirmation())
						Update Konfirmasi Pembayaran
					@else
						Simpan Konfirmasi Pembayaran
					@endif
				</button>
			</div>
		</div>
	</div>
</form>