@extends('umaster')
@section('title', $product->name)
@section('breadcrumb')
<a href="{{ url('shop') }}">Shopping Page<i class="fa fa-caret-right" aria-hidden="true"></i></a>
<a href="#">{{ $product->name }}</a>
@endsection
@section('content')
@if(session('status'))
<div class="alert alert-success">
	{{ session('status') }} <a href="{{ url('cart') }}">Lihat Keranjang</a>
</div>
@endif
<div class="product-quick-view">
	<div class="row align-items-center">
		<div class="col-lg-6">
			<img src="{{ $product->getPhoto() }}" class="img-fluid">
		</div>
		<div class="col-lg-6">
			<div class="quick-view-content">
				<div class="top">
					<h3 class="head">{{ $product->name }}</h3>
					<div class="price d-flex align-items-center"><span class="lnr lnr-tag"></span> <span class="ml-10">{{ $product->priceStringFormatted() }}</span></div>
					<div class="category">Category: <span>{{ $product->category->name }}</span></div>
					<div class="available">Availibility: <span>In Stock</span></div>
				</div>
				<div class="middle">
					<p class="content text-justify mb-0">{{ $product->description }}</p>
				</div>
				@if(Auth::check() && Auth::user()->isAdmin())
				@else
				<div>
					<form method="post" action="{{  url('cart/'.$product->slug) }}">
						{{ csrf_field() }}
						<div class="quantity-container d-flex align-items-center mt-15">
							<div class="form-group">
								<label>Quantity</label>
								<input type="number" name="quantity" value="300" class="form-control" min="300">
							</div>
						</div>
						<div class="d-flex mt-20">
							<button type="submit" class="view-btn color-2"><span>Add to Cart</span></a>
						</div>
					</form>
				</div>
				@endif
			</div>
		</div>
	</div>
</div>
@endsection