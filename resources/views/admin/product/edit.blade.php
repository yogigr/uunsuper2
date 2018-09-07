@extends('admin.amaster')
@section('title', $product->name)
@section('content')
<div class="card card-body">
	<div class="row">
		<div class="col-sm-6">
			<form method="post" action="{{ url('admin/product/'.$product->slug) }}" enctype="multipart/form-data">
				{{ csrf_field() }}
				{{ method_field('patch') }}
				<div class="form-group">
					<label>Nama Produk</label>
					<input type="text" name="product_name" value="{{ $product->name }}"
					class="form-control {{ $errors->has('product_name') ? 'is-invalid' : '' }}">
					@if($errors->has('product_name'))
					<div class="invalid-feedback">
						{{ $errors->first('product_name') }}
					</div>
					@endif
				</div>
				<div class="form-group">
					<label>Deskripsi Produk</label>
					<textarea rows="5" name="product_desc" 
					class="form-control {{ $errors->has('product_desc') ? 'is-invalid' : '' }}">{{ $product->description }}</textarea>
					@if($errors->has('product_desc'))
					<div class="invalid-feedback">
						{{ $errors->first('product_desc') }}
					</div>
					@endif
				</div>
				<div class="form-group">
					<label>Harga Produk (Rp)</label>
					<input type="text" name="product_price" value="{{ $product->price }}"
					class="form-control {{ $errors->has('product_price') ? 'is-invalid' : '' }}">
					@if($errors->has('product_price'))
					<div class="invalid-feedback">
						{{ $errors->first('product_price') }}
					</div>
					@endif
				</div>
				<div class="form-group">
					<label>Kategori</label>
					<select name="category_id" class="form-control {{ $errors->has('category_id') ? 'is-invalid' : '' }}">
						<option value="">Pilih Kategori</option>
						@foreach($categories as $cat)
							<option value="{{ $cat->id }}"
							{{ $product->category_id == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
						@endforeach	
					</select>
					@if($errors->has('category_id'))
					<div class="invalid-feedback">
						{{ $errors->first('category_id') }}
					</div>
					@endif
				</div>
				<div class="form-group">
					<label>Upload Photo Produk</label>
					<input type="file" name="photo"
					class="form-control {{ $errors->has('photo') ? 'is-invalid' : '' }}">
					@if($errors->has('photo'))
					<div class="invalid-feedback">
						{{ $errors->first('photo') }}
					</div>
					@endif
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-primary">Update</button>
				</div>
			</form>
		</div>
		<div class="col-sm-6">
			<img src="{{ $product->getPhoto() }}" class="img-fluid img-thumbnail">
		</div>
	</div>
</div>
@endsection