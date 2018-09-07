@extends('admin.amaster')
@section('title', $product->name)
@section('content')
@if(session('status'))
<div class="alert alert-success">
	{{ session('status') }}
</div>
@endif
<div class="card">
	<div class="card-header">
		<div class="btn-group">
			<a href="{{ url('admin/product/'.$product->slug.'/edit') }}" class="btn btn-warning btn-sm">
				<i class="fa fa-edit"></i>
				Edit
			</a>
			<button id="btnDelete" class="btn btn-danger btn-sm">
				<i class="fa fa-trash"></i>
				Hapus
			</button>
		</div>
		@if($product->is_in_stock)
			<a href="{{ url('admin/product/'.$product->slug.'/set-kosong') }}" class="btn btn-danger btn-sm btn-status">Set Kosong</a>
		@else
			<a href="{{ url('admin/product/'.$product->slug.'/set-tersedia') }}" class="btn btn-success btn-sm btn-status">Set Tersedia</a>
		@endif
	</div>
	<div class="card-body">
		<div class="row">
			<div class="col-sm-4">
				<img src="{{ $product->getPhoto() }}" class="img-fluid img-thumbnail">
			</div>
			<div class="col-sm-8">
				<table class="table">
					<tbody>
						<tr>
							<th>Nama Produk</th>
							<td>{{ $product->name }}</td>
						</tr>
						<tr>
							<th>Deskripsi</th>
							<td>{{ $product->description }}</td>
						</tr>
						<tr>
							<th>Harga</th>
							<td>{{ $product->priceStringFormatted() }}</td>
						</tr>
						<tr>
							<th>Kategori</th>
							<td>{{ $product->category->name }}</td>
						</tr>
						<tr>
							<th>Status</th>
							<td>
								<span class="{{ $product->getBadge() }}">{{ $product->getStatus() }}</span>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<form id="formDelete" method="post" action="{{ url('admin/product/'.$product->slug) }}">
	{{ csrf_field() }}
	{{ method_field('delete') }}
</form>
<form id="formStatus" method="post" action>
	{{ csrf_field() }}
	{{ method_field('patch') }}
</form>
@endsection
@push('scripts')
<script>
	$(function(){
		$('#btnDelete').on('click', function(){
			var x = confirm('Yakin hapus produk?');
			if (x == false) {return false}
			$('#formDelete').submit();
		});

		$('body').on('click', '.btn-status', function(e){
			e.preventDefault();
			var form = $('#formStatus');
			var x = confirm('Yakin update status produk?');
			if (x == false) {return false} 
			form.attr('action', $(this).attr('href'));
			form.submit();
		});
	});
</script>
@endpush