@extends('admin.amaster')
@section('title', $user->name)
@section('content')
@if(session('status'))
<div class="alert alert-success">
	{{ session('status') }}
</div>
@endif
<div class="card">
	<div class="card-header">
		<div class="btn-group">
			<a href="{{ url('admin/user/'.$user->id.'/edit') }}" class="btn btn-warning btn-sm">
				<i class="fa fa-edit"></i>
				Edit
			</a>
			<button id="btnDelete" class="btn btn-danger btn-sm">
				<i class="fa fa-trash"></i>
				Hapus
			</button>
		</div>
	</div>
	<div class="card-body">
		<div class="row">
			<div class="col-sm-8">
				<table class="table">
					<tbody>
						<tr>
							<th class="border-top-0">Nama Lengkap</th>
							<td class="border-top-0">{{ $user->name }}</td>
						</tr>
						<tr>
							<th>Email</th>
							<td>{{ $user->email }}</td>
						</tr>
						<tr>
							<th>Role</th>
							<td>
								<span class="{{ $user->getBadge() }}">{{ $user->role->name }}</span>
							</td>
						</tr>
						<tr>
							<th>Alamat</th>
							<td>{{ $user->address }}</td>
						</tr>
						<tr>
							<th>Kota/Kab</th>
							<td>{{ $user->city->name }}</td>
						</tr>
						<tr>
							<th>Provinsi</th>
							<td>{{ $user->province->name }}</td>
						</tr>
						<tr>
							<th>Kode Pos</th>
							<td>{{ $user->postal_code }}</td>
						</tr>
						<tr>
							<th>Telp</th>
							<td>{{ $user->phone }}</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<form id="formDelete" method="post" action="{{ url('admin/user/'.$user->id) }}">
	{{ csrf_field() }}
	{{ method_field('delete') }}
</form>
@endsection
@push('scripts')
<script>
	$(function(){
		$('#btnDelete').on('click', function(){
			var x = confirm('Yakin hapus User?');
			if (x == false) {return false}
			$('#formDelete').submit();
		});
	});
</script>
@endpush