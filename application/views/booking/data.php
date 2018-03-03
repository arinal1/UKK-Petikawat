<div class="main-agileinfo">
	<div class="card">
		<div class="card-header">
			<ul class="breadcrumb">
				<li class="breadcrumb-item"><a href="<?=base_url()?>">Pesan Tiket</a></li>
				<li class="breadcrumb-item"><a href="<?=base_url('booking')?>">Pilih Pesawat</a></li>
				<li class="breadcrumb-item active">Data Pemesanan</li>
			</ul>
		</div>
		<div class="card-body">
			<form action="<?= base_url('booking/seat') ?>" method="post">
				<table class="table table-hover margin-bottom-40">
					<thead>
						<tr>
							<td colspan="3">Data Penumpang</td>
						</tr>
						<tr>
							<th>No</th>
							<th>Nama</th>
							<th>ID</th>
						</tr>
					</thead>
					<tbody>
						<?php
						if ($this->session->userdata('kursi') > 0) {
							for ($i=1; $i <= $this->session->userdata('kursi'); $i++) { 
								print("
									<tr>
									<td>". $i ."</td>
									<td>
									<input type='text' name='nama-penumpang[]' class='form-control form-control-sm' required>
									</td>
									<td>
									<input type='text' name='id[]' class='form-control form-control-sm' required>
									</td>
									</tr>
									");
							}
						}
						?>
					</tbody>
				</table>
				<table class="table table-hover margin-bottom-0">
					<thead>
						<tr>
							<td colspan="2">Data Pemesan</td>
						</tr>
						<tr>
							<th>Nama</th>
							<th>No Telepon</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>
								<input type="text" name="nama-pemesan" class="form-control form-control-sm" required>
							</td>
							<td>
								<input type="text" name="telepon" class="form-control form-control-sm" required>
							</td>
						</tr>
					</tbody>
				</table>
				<table class="table table-hover">
					<thead>
						<tr>
							<th>Alamat</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>
								<textarea name="alamat" class="form-control form-control-sm" required></textarea>
							</td>
						</tr>
					</tbody>
				</table>
				<div class="container">
					<div class="row margin-top-10">
						<div class="col-md-12">
							<input type='submit' class='btn btn-primary float-right' value='Kirim'>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>