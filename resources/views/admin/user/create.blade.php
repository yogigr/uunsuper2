@extends('admin.amaster')
@section('title', 'Tambah User')
@section('content')
@if(session('status'))
<div class="alert alert-success">{{ session('status') }}</div>
@endif
<div class="card card-body">
	<form method="post" action="{{ url('admin/user') }}">
		{{ csrf_field() }}
		<div class="row">
			<div class="col">
				<div class="form-group">
					<label>Nama Lengkap</label>
					<input type="text" name="name" value="{{ old('name') }}" class="form-control
					{{ $errors->has('name') ? 'is-invalid' : '' }}">
					@if($errors->has('name'))
						<div class="invalid-feedback">{{ $errors->first('name') }}</div>
					@endif
				</div>
				<div class="form-group">
					<label>Email</label>
					<input type="text" name="email" value="{{ old('email') }}" class="form-control
					{{ $errors->has('email') ? 'is-invalid' : '' }}">
					@if($errors->has('email'))
						<div class="invalid-feedback">{{ $errors->first('email') }}</div>
					@endif
				</div>
				<div class="form-group">
					<label>Password</label>
					<input type="password" name="password" class="form-control
					{{ $errors->has('password') ? 'is-invalid' : '' }}">
					@if($errors->has('password'))
						<div class="invalid-feedback">{{ $errors->first('password') }}</div>
					@endif
				</div>
				<div class="form-group">
					<label>Konfirmasi Password</label>
					<input type="text" name="password_confirmation" class="form-control">
				</div>
				<div class="form-group">
					<label>Role</label>
					<select name="role_id" class="form-control
					{{ $errors->has('role_id') ? 'is-invalid' : '' }}">
						<option value="">Pilih Role</option>
						@foreach($roles as $role)
							<option value="{{ $role->id }}"
							{{ old('role_id') == $role->id ? 'selected' : '' }}>{{ $role->name }}</option>
						@endforeach
					</select>
					@if($errors->has('role_id'))
						<div class="invalid-feedback">{{ $errors->first('role_id') }}</div>
					@endif
				</div>	
			</div>
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
				<div class="form-group">
					<label>Alamat</label>
					<textarea name="address" rows="4" class="form-control
					{{ $errors->has('address') ? 'is-invalid' : '' }}">{{ old('address') }}</textarea>
					@if($errors->has('address'))
						<div class="invalid-feedback">
							{{ $errors->first('address') }}
						</div>
					@endif
				</div>
				<div class="row">
					<div class="col">
						<div class="form-group">
							<label>Kode Pos</label>
							<input type="text" name="postal_code" class="form-control 
							{{ $errors->has('postal_code') ? 'is-invalid' : '' }}"
							value="{{ old('postal_code') }}">
							@if($errors->has('postal_code'))
								<div class="invalid-feedback">
									{{ $errors->first('postal_code') }}
								</div>
							@endif
						</div>
					</div>
					<div class="col">
						<div class="form-group">
							<label>Telpon</label>
							<input type="text" name="phone" class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}"
							value="{{ old('phone') }}">
							@if($errors->has('phone'))
								<div class="invalid-feedback">
									{{ $errors->first('phone') }}
								</div>
							@endif
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<button type="submit" class="btn btn-primary">
					<i class="fa fa-save"></i>
					Simpan
				</button>
			</div>
		</div>
	</form>
</div>
@endsection
@push('scripts')
<script>
	$(function(){
		province_init();
		$('#province_id').on('change', function(){
			city_init($(this).val());
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
				$('#province_id').val('{{ old('province_id') }}');
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
				$('#city_id').val('{{ old('city_id') }}');
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
</script>
@endpush