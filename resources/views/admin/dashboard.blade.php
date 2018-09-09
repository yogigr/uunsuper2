@extends('admin.amaster')
@section('title', 'Dashboard')
@section('content')
<div class="row">
	<div class="col">
		<div class="card">
			<div class="card-body">
				<div class="row">
					<div class="col-sm-4">
						<i class="fa fa-shopping-cart fa-4x text-danger"></i>
					</div>
					<div class="col-sm-8">
						<h4>
							<span class="badge badge-primary">{{ \App\Order::count() }}</span>
							Pesanan
						</h4>
					</div>
				</div>
			</div>
			<div class="card-footer text-center">
				<a href="{{ url('admin/order') }}">Lihat Order</a>
			</div>
		</div>
	</div>
	<div class="col">
		<div class="card">
			<div class="card-body">
				<div class="row">
					<div class="col-sm-4">
						<i class="fa fa-shopping-bag fa-4x text-danger"></i>
					</div>
					<div class="col-sm-8">
						<h4>
							<span class="badge badge-primary">{{ \App\Product::count() }}</span>
							Produk
						</h4>
					</div>
				</div>
			</div>
			<div class="card-footer text-center">
				<a href="{{ url('admin/product') }}">Lihat Produk</a>
			</div>
		</div>
	</div>
	<div class="col">
		<div class="card">
			<div class="card-body">
				<div class="row">
					<div class="col-sm-4">
						<i class="fa fa-tags fa-4x text-danger"></i>
					</div>
					<div class="col-sm-8">
						<h4>
							<span class="badge badge-primary">{{ \App\Category::count() }}</span>
							Kategori
						</h4>
					</div>
				</div>
			</div>
			<div class="card-footer text-center">
				<a href="{{ url('admin/category') }}">Lihat Kategori</a>
			</div>
		</div>
	</div>
	<div class="col">
		<div class="card">
			<div class="card-body">
				<div class="row">
					<div class="col-sm-4">
						<i class="fa fa-user fa-4x text-danger"></i>
					</div>
					<div class="col-sm-8">
						<h4>
							<span class="badge badge-primary">{{ \App\User::count() }}</span>
							User
						</h4>
					</div>
				</div>
			</div>
			<div class="card-footer text-center">
				<a href="{{ url('admin/user') }}">Lihat User</a>
			</div>
		</div>
	</div>
</div>
@endsection