@extends('print.master')
@section('title', 'User Report')
@section('content')
<div class="card card-body">
	<h3 class="text-center">Laporan User</h3>
	<p class="text-center">Periode <strong>{{ request('from') }}</strong> s/d <strong>{{ request('to') }}</strong></p>
	<div class="table-responsive">
		<table class="table">
			<thead class="thead-light">
				<tr>
					<th>#</th>
					<th>Nama Lengkap</th>
					<th>email</th>
					<th>Role</th>
				</tr>
			</thead>
			<tbody>
				@if($users->count() > 0)
					@foreach($users as $index => $user)
						<tr>
							<td>{{ $loop->iteration }}</td>
							<td>{{ $user->name }}</td>
							<td>{{ $user->email }}</td>
							<td>
								<span class="{{ $user->getBadge() }}">{{ $user->role->name }}</span>
							</td>
						</tr>
					@endforeach
				@else
				<tr><td colspan="4">
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
</div>
@endsection
@push('scripts')
<script>
	$(function(){
		window.print();
	});
</script>
@endpush