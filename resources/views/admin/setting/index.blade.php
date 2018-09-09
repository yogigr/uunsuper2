@extends('admin.amaster')
@section('title', 'Web Setting')
@section('content')
@if(session('status'))
	<div class="alert alert-success">{{ session('status') }}</div>
@endif
<div class="card card-body">
	<form method="post" action="{{ url('admin/web-setting') }}" enctype="multipart/form-data">
		{{ csrf_field() }}
		{{ method_field('patch') }}
		<div class="row">
			<div class="col">
				<div class="form-group">
					<label>Nama Perusahaan</label>
					<input type="text" name="name" value="{{ $company->name }}"
					class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}">
					@if($errors->has('name'))
						<div class="invalid-feedback">{{ $errors->first('name') }}</div>
					@endif
				</div>
				<div class="form-group">
					<label>Deskripsi Perusahaan</label>
					<textarea name="description" rows="8" class="form-control
					{{ $errors->has('description') ? 'is-invalid' : '' }}">{{ $company->description }}</textarea>
					@if($errors->has('description'))
						<div class="invalid-feedback">{{ $errors->first('description') }}</div>
					@endif
				</div>
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
					<textarea name="address" rows="7" class="form-control
					{{ $errors->has('address') ? 'is-invalid' : '' }}">{{ $company->address }}</textarea>
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
					value="{{ $company->postal_code }}">
					@if($errors->has('postal_code'))
						<div class="invalid-feedback">
							{{ $errors->first('postal_code') }}
						</div>
					@endif
				</div>
				<div class="form-group">
					<label>Telpon 1</label>
					<input type="text" name="phone1" class="form-control {{ $errors->has('phone1') ? 'is-invalid' : '' }}"
					value="{{ $company->phone1 }}">
					@if($errors->has('phone1'))
						<div class="invalid-feedback">
							{{ $errors->first('phone1') }}
						</div>
					@endif
				</div>
				<div class="form-group">
					<label>Telpon 2</label>
					<input type="text" name="phone2" class="form-control {{ $errors->has('phone2') ? 'is-invalid' : '' }}"
					value="{{ $company->phone2 }}">
					@if($errors->has('phone2'))
						<div class="invalid-feedback">
							{{ $errors->first('phone2') }}
						</div>
					@endif
				</div>
				<div class="form-group">
					<label>Email</label>
					<input type="text" name="email" value="{{ $company->email }}"
					class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}">
					@if($errors->has('email'))
						<div class="invalid-feedback">{{ $errors->first('email') }}</div>
					@endif
				</div>
				<div class="form-group">
					<label>Instagram</label>
					<input type="text" name="instagram" value="{{ $company->instagram }}"
					class="form-control {{ $errors->has('instagram') ? 'is-invalid' : '' }}">
					@if($errors->has('instagram'))
						<div class="invalid-feedback">{{ $errors->first('instagram') }}</div>
					@endif
				</div>
				<div class="form-group">
					<label>Facebook</label>
					<input type="text" name="facebook" value="{{ $company->facebook }}"
					class="form-control {{ $errors->has('facebook') ? 'is-invalid' : '' }}">
					@if($errors->has('facebook'))
						<div class="invalid-feedback">{{ $errors->first('facebook') }}</div>
					@endif
				</div>
				<div class="form-group">
					<label>Twitter</label>
					<input type="text" name="twitter" value="{{ $company->twitter }}"
					class="form-control {{ $errors->has('twitter') ? 'is-invalid' : '' }}">
					@if($errors->has('twitter'))
						<div class="invalid-feedback">{{ $errors->first('twitter') }}</div>
					@endif
				</div>
				<div class="form-group">
					<label>Google</label>
					<input type="text" name="google" value="{{ $company->google }}"
					class="form-control {{ $errors->has('google') ? 'is-invalid' : '' }}">
					@if($errors->has('google'))
						<div class="invalid-feedback">{{ $errors->first('google') }}</div>
					@endif
				</div>
				<div class="form-group">
					<label>Upload Logo</label>
					<input type="file" name="logo"
					class="form-control {{ $errors->has('logo') ? 'is-invalid' : '' }}">
					@if($errors->has('logo'))
						<div class="invalid-feedback">{{ $errors->first('logo') }}</div>
					@endif
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<button type="submit" class="btn btn-primary">
					<i class="fa fa-save"></i>
					Update Pengaturan
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
				$('#province_id').val('{{ $company->province_id }}');
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
				$('#city_id').val('{{ $company->city_id }}');
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