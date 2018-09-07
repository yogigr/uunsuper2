{{-- modal konfirmasi pembelian --}}
<div class="modal fade" tabindex="-1" role="dialog" id="modalKonfirmasiPembelian">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Konfirmasi Pembelian</h4>
			</div>
			<div class="modal-body">
				<p>Dengan ini, Anda setuju melakukan pembelian</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
				<button type="button" class="btn btn-primary"
				onclick="getElementById('storeOrderForm').submit()">Ya</button>
				<form id="storeOrderForm" method="post" action="{{ url('order') }}">
					{{ csrf_field() }}
				</form>
			</div>
		</div>
	</div>
</div>