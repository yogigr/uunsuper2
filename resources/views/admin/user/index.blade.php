@extends('admin.amaster')
@section('title', 'User')
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
				<a href="{{ url('admin/user/create') }}" class="btn btn-primary">
					<i class="fa fa-plus"></i>
					User
				</a>
			</div>
			<div class="col">
				<form method="get" action="{{ url('admin/user') }}">
					<input type="text" name="query" value="{{ request('query') }}" placeholder="Cari User"
					class="form-control">
				</form>
			</div>
		</div>
	</div>
	<div class="card-body">
		<div class="row">
			<div class="col">
				<div class="table-responsive">
					<table class="table">
						<thead class="thead-light">
							<tr>
								<th>#</th>
								<th>Nama Lengkap</th>
								<th>email</th>
								<th>Role</th>
								<th>#</th>
							</tr>
						</thead>
						<tbody>
							@if($users->count() > 0)
								@foreach($users as $index => $user)
									<tr>
										<td>{{ $index + $users->firstItem() }}</td>
										<td>{{ $user->name }}</td>
										<td>{{ $user->email }}</td>
										<td>
											<span class="{{ $user->getBadge() }}">{{ $user->role->name }}</span>
										</td>
										<td>
											<a href="{{ url('admin/user/'.$user->id) }}" class="btn btn-primary btn-sm">
												<i class="fa fa-eye"></i>
												View
											</a>
										</td>
									</tr>
								@endforeach
							@else
							<tr><td colspan="5">
								@if(request('query'))
									User tidak ditemukan
								@else
									Belum ada user
								@endif
							</td></tr>
							@endif
						</tbody>
					</table>
				</div>
				{{ $users->links() }}
			</div>
		</div>
	</div>
</div>
@endsection