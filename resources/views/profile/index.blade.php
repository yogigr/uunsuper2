@extends('umaster')
@section('title', 'Profile')
@section('breadcrumb')
<a href="#">Profile</a>
@endsection
@section('content')
@if(session('status'))
<div class="alert alert-success">{{ session('status') }}</div>
@endif
<div class="row">
	<div class="col-md-8">
		<div class="card">
			<div class="card-header">
				Profile
			</div>
			<div class="card-body">
				<form method="post" action="{{ url('profile/update') }}">
					{{ csrf_field() }}
					{{ method_field('patch') }}
					<div class="row">
						<div class="col">
							<div class="form-group">
								<label>Nama Lengkap</label>
								<input type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
								value="{{ $user->name }}">
								@if($errors->has('name'))
									<div class="invalid-feedback">
										{{ $errors->first('name') }}
									</div>
								@endif
							</div>
						</div>
						<div class="col">
							<div class="form-group">
								<label>Email</label>
								<input type="text" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
								value="{{ $user->email }}">
								@if($errors->has('email'))
									<div class="invalid-feedback">
										{{ $errors->first('email') }}
									</div>
								@endif
							</div>
						</div>
						<div class="col">
							<div class="form-group">
								<label>Telpon</label>
								<input type="text" name="phone" class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}"
								value="{{ $user->phone }}">
								@if($errors->has('phone'))
									<div class="invalid-feedback">
										{{ $errors->first('phone') }}
									</div>
								@endif
							</div>
						</div>
					</div>
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
					<div class="row">
						<div class="col">
							<div class="form-group">
								<label>Alamat</label>
								<textarea name="address" class="form-control 
								{{ $errors->has('address') ? 'is-invalid' : '' }}">{{ $user->address }}</textarea>
								@if($errors->has('address'))
									<div class="invalid-feedback">
										{{ $errors->first('address') }}
									</div>
								@endif
							</div>
						</div>
						<div class="col">
							<div class="form-group">
								<label>Kode Pos</label>
								<input type="text" name="postal_code" class="form-control 
								{{ $errors->has('postal_code') ? 'is-invalid' : '' }}"
								value="{{ $user->postal_code }}">
								@if($errors->has('postal_code'))
									<div class="invalid-feedback">
										{{ $errors->first('postal_code') }}
									</div>
								@endif
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<div class="form-group">
								<button type="submit" class="btn btn-primary">Update Profile</button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="card">
			<div class="card-header">Ganti Password</div>
			<div class="card-body">
				<form method="post" action="{{ url('profile/change-password') }}">
					{{ csrf_field() }}
					{{ method_field('patch') }}
					<div class="form-group">
						<label>Password Sekarang</label>
						<input type="password" name="current_pass" class="form-control
						{{ $errors->has('current_pass') ? 'is-invalid' : '' }}" value="{{ old('current_pass') }}">
						@if($errors->has('current_pass'))
							<div class="invalid-feedback">{{ $errors->first('current_pass') }}</div>
						@endif
					</div>
					<div class="form-group">
						<label>Password Baru</label>
						<input type="password" name="new_pass" class="form-control
						{{ $errors->has('new_pass') ? 'is-invalid' : '' }}" value="{{ old('new_pass') }}">
						@if($errors->has('new_pass'))
							<div class="invalid-feedback">{{ $errors->first('new_pass') }}</div>
						@endif
					</div>
					<div class="form-group">
						<label>Konfirmasi Password Baru</label>
						<input type="password" name="new_pass_confirmation" class="form-control">
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-primary">Update Password</button>
					</div>
				</form>
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
</script>
@endpush