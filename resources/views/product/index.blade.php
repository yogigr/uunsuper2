@extends('umaster')
@section('title', 'Daftar Produk')
@section('breadcrumb')
<a href="#">Daftar Produk</a>
@endsection
@section('content')
@if(session('status'))
<div class="alert alert-success">
	{{ session('status') }}
</div>
@endif
<div class="row">
	<div class="col">
		<div class="card card-body">
			<div class="row">
				<div class="col">
					<a href="{{ url('product/create') }}" class="btn btn-primary">
						<i class="fa fa-plus"></i>
						Produk
					</a>
				</div>
				<div class="col">
					<form method="get" action="{{ url('product') }}">
						<div class="form-group">
							<input type="text" name="query" value="{{ request('query') }}" placeholder="Cari Produk"
							class="form-control">
						</div>
					</form>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<div class="table-responsive">
						<table class="table">
							<thead class="thead-light">
								<tr>
									<th>#</th>
									<th>Nama Product</th>
									<th>Kategori</th>
									<th>Harga</th>
									<th>#</th>
								</tr>
							</thead>
							<tbody>
								@if($products->count() > 0)
									@foreach($products as $product)
										<tr>
											<td>
												<img src="{{ $product->getPhoto() }}" class="img-fluid" style="width: 50px">
											</td>
											<td>{{ $product->name }}</td>
											<td>{{ $product->category->name }}</td>
											<td>{{ $product->priceStringFormatted() }}</td>
											<td>
												<a href="{{ url('product/'.$product->slug) }}" class="btn btn-primary btn-sm">
													<i class="fa fa-eye"></i>
													View
												</a>
											</td>
										</tr>
									@endforeach
								@else
								<tr><td colspan="5">
									@if(request('query'))
										Produk tidak ditemukan
									@else
										Belum ada produk
									@endif
								</td></tr>
								@endif
							</tbody>
						</table>
					</div>
					{{ $products->links('vendor.pagination.shop') }}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection