<form id="formEditKeranjang" method="post" action="{{ url('cart/'.$cart->rowId) }}">
	{{ csrf_field() }}
	{{ method_field('patch') }}
	<input type="hidden" name="price" value="{{ $cart->price }}">
	<div class="form-group">
		<label>Nama Product</label>
		<input type="text" name="nama_product" value="{{ $cart->name }}" class="form-control" readonly>
	</div>
	<div class="form-group">
		<label>Jumlah</label>
		<input type="number" id="quantity" name="quantity" class="form-control" min="300" value="{{ $cart->qty }}">
		<span class="help-blok">
			minimal Pembelian 300 Item
		</span>
	</div>
	<div class="form-group">
		<label>Total Harga</label>
		<input type="text" name="total_harga" value="Rp {{ $cart->subtotal(0, '', '.') }}" class="form-control" readonly>
	</div>
	<div class="form-group">
		<button type="submit" class="btn btn-primary btn-block">
			Update
		</button>
	</div>
</form>