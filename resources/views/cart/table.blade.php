<table class="table table-bordered table-hover">
	<tbody>
		@foreach($carts as $cart)
			<tr>
				<td>
					<h5 class="text-primary" style="margin:0">{{ $cart->name }}</h5>
					{{ $cart->qty }} x Rp {{ number_format($cart->price, 0, '', '.') }}<br>
					<button class="btn btn-link text-warning btnEditKeranjang"
					url="{{ url('cart/'.$cart->rowId.'/edit') }}">
						<i class="fa fa-edit"></i>
					</button>
				</td>
				<td class="text-right">
					<strong>Rp {{ $cart->subtotal(0, '', '.') }}</strong>
				</td>
				<td style="width: 120px !important">
					<form method="post" action="{{ url('cart/'.$cart->rowId) }}">
						{{ csrf_field() }}
						{{ method_field('delete') }}
						<button type="submit" class="btn btn-link text-danger">
							<i class="fa fa-trash"></i>
						</button>
					</form>
				</td>
			</tr>
		@endforeach
		<tr>
			<td colspan="2" class="text-right">
				<strong>Subtotal<br>Rp {{ Cart::subtotal(0, '', '.') }}</strong>
			</td>
			<td>
				<form method="post" action="{{ url('cart/clear') }}">
					{{ csrf_field() }}
					{{ method_field('delete') }}
					<button type="submit" class="btn btn-link text-danger">
						<i class="fa fa-trash"></i>
						Semua
					</button>
				</form>
			</td>
		</tr>
	</tbody>
</table>