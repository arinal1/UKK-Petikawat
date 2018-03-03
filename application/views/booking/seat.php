<div class="main-agileinfo">
	<div class="card">
		<div class="card-header">
			<ul class="breadcrumb">
				<li class="breadcrumb-item"><a href="<?=base_url()?>">Pesan Tiket</a></li>
				<li class="breadcrumb-item"><a href="<?=base_url('booking')?>">Pilih Pesawat</a></li>
				<li class="breadcrumb-item"><a href="<?=base_url('booking/data')?>">Data Pemesanan</a></li>
				<li class="breadcrumb-item active">Pilih Kursi</li>
			</ul>
		</div>
		<div class="card-body">
			<form action="<?= base_url('booking/konfirmasi') ?>" method="post" onsubmit="submition(event)">
				<table class="table table-striped">
					<tbody>
						<tr>
							<td>
								<button class="btn btn-warning" disabled></button>
								<span class="font-size-12 text-secondary">Tersedia</span>
								<button class="btn btn-secondary" disabled></button>
								<span class="font-size-12 text-secondary">Terpesan</span>
								<button class="btn btn-success" disabled></button>
								<span class="font-size-12 text-secondary">Terpilih</span>
							</td>
						</tr>
						<tr>
							<td>
								<div id="seat"></div>
							</td>
						</tr>
					</tbody>
				</table>
				<div id="input-seat">
				<?php 
				$kursi = $this->session->userdata('kursi');
				for ($i=0; $i < $kursi; $i++) { 
					print("
						<input type='hidden' name='nama_penumpang[]' value='".$nama_penumpang[$i]."'>
						<input type='hidden' name='id[]' value='".$id_penumpang[$i]."'>
					");
				}
				?>
				</div>
				<button class="btn btn-primary float-right">Pesan</button>
			</form>
		</div>
	</div>
</div>
<script src="<?= base_url('assets/js/seat.js')?>"></script>
<script type="text/javascript">
	var maxBook = <?=$this->session->userdata('kursi')?>;
	var book = <?=$this->session->userdata('kursi')?>;
	var booked = [];
	<?php 
	foreach ($booked_seat as $val) {
		echo "booked.push('".$val."');";
	}
	?>
	seat(<?=$jml_seat?>, booked);

	function submition(e){
		if (book != 0) {
			alert('Pilih ' + maxBook + ' kursi!');
			e.preventDefault();
		} else{
			var seat;
			for (var i = 0; i < maxBook; i++) {
				seat = $('.selected').eq(i).attr('id');
				$('#input-seat').append("<input type='hidden' name='seat[]' value='"+seat+"'>")
			}
		}
	}
</script>