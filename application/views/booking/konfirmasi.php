<div class="main-agileinfo">
	<div class="card">
		<div class="card-header">
			<ul class="breadcrumb">
				<li class="breadcrumb-item active">Konfirmasi Pemesanan Tiket</li>
			</ul>
		</div>
		<div class="card-body">
			<form action="<?= base_url('booking/sukses') ?>" method="post">
				<table class="table table-striped">
					<tbody>
						<tr>
							<th>
								Data Keberangkatan
							</th>
						</tr>
						<tr>
							<td>
								<table class="table">
									<tr>
										<th>Pesawat</th>
										<th>Asal</th>
										<th>Tujuan</th>
									</tr>
									<tr>
										<td><?=$pesawat[0]->nama?></td>
										<td><?=$asal[0]->nama;?></td>
										<td><?=$tujuan[0]->nama?></td>
									</tr>
									<tr>
										<th>Tanggal</th>
										<th>Berangkat</th>
										<th>Datang</th>
									</tr>
									<tr>
										<td><?=$this->session->userdata('tanggal')?></td>
										<td><?=$rute[0]->brgkt;?></td>
										<td><?=$rute[0]->dtg;?></td>
									</tr>
								</table>
							</td>
						</tr>
						<tr>
							<th>Data Pemesan</th>
						</tr>
						<tr>
							<td>
								<table class="table">
									<tr>
										<th>Nama</th>
										<th>No Telepon</th>
										<th>Alamat</th>
									</tr>
									<tr>
										<td><?= $this->session->userdata('nama_pemesan') ?></td>
										<td><?= $this->session->userdata('telepon_pemesan') ?></td>
										<td><?= $this->session->userdata('alamat_pemesan') ?></td>
									</tr>
								</table>
							</td>
						</tr>
						<tr>
							<th>Data Penumpang</th>
						</tr>
						<tr>
							<td>
								<table class="table">
									<tr>
										<th>No</th>
										<th>Nama</th>
										<th>ID</th>
									</tr>
									<?php 
									for ($i=0; $i < $this->session->userdata('kursi'); $i++) { 
										print("
											<tr>
											<td>".($i+1)."</td>
											<td>".$nama_penumpang[$i]."</td>
											<td>".$id_penumpang[$i]."</td>
											<input type='hidden' name='nama_penumpang[]' value='".$nama_penumpang[$i]."'>
											<input type='hidden' name='id_penumpang[]' value='".$id_penumpang[$i]."'>
											<input type='hidden' name='seat_penumpang[]' value='".$id_seat[$i]."'>	
											</tr>
											");
									}
									?>
								</table>
							</td>
						</tr>
					</tbody>
				</table>
				<button class="btn btn-primary float-right">Konfirmasi</button>
				<a href="<?=base_url()?>" class="btn btn-danger">Batal</a>
			</form>
		</div>
	</div>
</div>