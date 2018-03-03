<div class="main-agileinfo">
	<div class="card">
		<div class="card-header">
			<ul class="breadcrumb">
				<li class="breadcrumb-item"><a href="<?=base_url()?>">Pesan Tiket</a></li>
				<li class="breadcrumb-item active">Pilih Pesawat</li>
			</ul>
		</div>
		<div class="card-body">
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>Pesawat</th>
						<th>Berangkat</th>
						<th>Datang</th>
						<th>Harga</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php
					if ($rute->num_rows() > 0) {
						$i = 0;
						foreach ($rute->result() as $val) {
							if(($val->jml_kursi-$reserved[$i]) >= $this->session->userdata('kursi')){
								$input = "<input type='submit' class='btn btn-primary' value='Pesan'>";
							} else {
								$input = "<input type='submit' class='btn btn-secondary' value='Habis' disabled>";
							}
							print ("
								<tr>
								<td>".$val->pesawat."</td>
								<td>".$val->brgkt."</td>
								<td>".$val->dtg."</td>
								<td>".$val->harga."</td>
								<td>
								<form action='".base_url("booking/data")."' method='post'>
								<input type='hidden' name='id-rute' value='".$val->id."'>
								<input type='hidden' name='id-pesawat' value='".$val->id_pesawat."'>
								<input type='hidden' name='harga' value='".$val->harga."'>
								".$input."
								</form>
								</tr>
								");
							$i++;
						}
					} else{
						print("
							<tr>
							<td colspan='5'> Rute Tidak Ditemukan!</td>
							</tr>
							");
					}
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>