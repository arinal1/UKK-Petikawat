<div class="main-agileinfo">
	<div class="card">
		<div class="card-header">
			<ul class="breadcrumb">
				<li class="breadcrumb-item active">Pemesanan Tiket Berhasil!</li>
			</ul>
		</div>
		<div class="card-body">
			<table class="table">
				<tbody>
					<tr>
						<td>Kode Pemesanan</td>
						<td>:</td>
						<td><?=$kode?></td>
					</tr>
					<tr>
						<td>Harga</td>
						<td>:</td>
						<td>Rp. <?=$harga?></td>
					</tr>
					<tr>
						<td colspan="3">
							<span class="span-info">
								Silakan melakukan pembayaran dengan transfer ke Rekening Mandiri 1390016584868 atas nama Petikawat dalam waktu 30 menit.
								Kemudian silakan upload foto bukti pembayaran.
							</span>
						</td>
					</tr>
				</tbody>
			</table>
			<a href="<?=base_url('home/cek_pemesanan/'.$kode)?>" class="btn btn-primary float-right">Cek Pemesanan</a>
		</div>
	</div>
</div>