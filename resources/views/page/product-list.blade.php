<div class="col-xl-9 col-lg-8 col-md-7">
	<section class="lattest-product-area pb-40 category-list">
		<div class="row">
			@if($products->count() > 0)
				@foreach($products as $product)
				<div class="col-xl-4 col-lg-6 col-md-12 col-sm-6 single-product">
				  <div class="content">
				  	<a href="{{ url('shop/'.$product->slug) }}">
				  		<img class="content-image img-fluid d-block mx-auto" src="{{ $product->getPhoto() }}">
				  	</a>
				  </div>
				  <div class="price">
				  		<a href="{{ url('shop/'.$product->slug) }}"><h5>{{ $product->name }}</h5></a>
				  		<h3>{{ $product->priceStringFormatted() }}</h3>
				   </div>
				</div>
				@endforeach
			@else
			<p>No Product</p>
			@endif																								
		</div>
	</section>
	<div class="filter-bar d-flex flex-wrap align-items-center">
		{{ $products->links('vendor.pagination.shop') }}
	</div>
</div>