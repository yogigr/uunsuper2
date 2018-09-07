<ul class="nav nav-pills">
  	<li class="nav-item">
  		<a class="nav-link {{ \Request::segment(1) == 'cart' ? '' : 'disabled'}}" href="javascript:void(0)">
	  		<i class="fa fa-shopping-cart"></i>
	  		Keranjang
  		</a>
 	 </li>
  	<li class="nav-item">
  		<a class="nav-link {{ \Request::segment(1) == 'alamat-pengiriman' ? '' : 'disabled'}}" href="javascript:void(0)">
  			<i class="fa fa-map-marker"></i>
  			Alamat Pengiriman
  		</a>
  	</li>
  	<li class="nav-item">
  		<a class="nav-link {{ \Request::segment(1) == 'konfirmasi-pembelian' ? '' : 'disabled'}}" href="javascript:void(0)">
  			<i class="fa fa-check-circle-o"></i>
  			Konfirmasi Pembelian
  		</a>
  	</li>
</ul>