<div class="col-xl-3 col-lg-4 col-md-5">
	<div class="sidebar-categories">
		<div class="head">Browse Categories</div>
		<ul class="main-categories">
			<li class="main-nav-list">
				<a href="{{ url('shop') }}">
					All <span class="number">({{ \App\Product::all()->count() }})</span>
				</a>
			</li>
			@foreach($categories as $cat)
			<li class="main-nav-list">
				<a href="{{ url('shop/category/'.$cat->slug) }}">{{ $cat->name }}
					<span class="number">({{ $cat->products->count() }})</span>
				</a>
			</li>
			@endforeach
		</ul>
	</div>					
</div>