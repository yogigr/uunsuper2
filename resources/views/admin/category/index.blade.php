@extends('admin.amaster')
@section('title', 'Kategori')
@section('content')
@if(session('status'))
<div class="alert alert-success">
	{{ session('status') }}
</div>
@endif
<div class="card">
	<div class="card-header">
		<div class="row">
			<div class="col">
				<form method="post" action="{{ url('admin/category') }}">
					{{ csrf_field() }}
					<div class="form-group">
						<input type="text" name="name" value="{{ old('name') }}" class="form-control 
						{{ $errors->has('name') ? 'is-invalid' : '' }}" placeholder="Isi Nama Kategori">
						@if($errors->has('name'))
							<div class="invalid-feedback">
								{{ $errors->first('name') }}
							</div>
						@endif
					</div>
					
					<button class="btn btn-primary">
						<i class="fa fa-plus"></i>
						Kategori
					</button>
				</form>
			</div>
		</div>
	</div>
	<div class="card-body">
		<div class="row mb-3">
			<div class="col">
				<form method="get" action="{{ url('admin/category') }}">
					<input type="text" name="query" value="{{ request('query') }}" placeholder="Cari Kategori"
					class="form-control">
				</form>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<div class="table-responsive">
					<table class="table">
						<thead class="thead-light">
							<tr>
								<th>Nama Kategori</th>
								<th>Jumlah Produk</th>
								<th>#</th>
							</tr>
						</thead>
						<tbody>
							@if($categories->count() > 0)
								@foreach($categories as $cat)
									<tr>
										<td>{{ $cat->name }}</td>
										<td>{{ $cat->products()->count() }}</td>
										<td>
											<form method="post" action="{{ url('admin/category/'.$cat->slug) }}"
											onsubmit="return confirm('Yakin hapus kategori?')">
												{{ csrf_field() }}
												{{ method_field('delete') }}
												<button type="submit" class="btn btn-danger btn-sm">
													<i class="fa fa-trash"></i>
												</button>
											</form>
										</td>
									</tr>
								@endforeach
							@else
							<tr><td colspan="5">
								@if(request('query'))
									Kategori tidak ditemukan
								@else
									Belum ada kategori
								@endif
							</td></tr>
							@endif
						</tbody>
					</table>
				</div>
				{{ $categories->links() }}
			</div>
		</div>
	</div>
</div>
@endsection