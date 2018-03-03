<?php 
if ($rute->num_rows()>0) {
	$r = $rute->result()[0];
	$id = $r->id;
	$brgkt = $r->brgkt;
	$dtg = $r->dtg;
	$harga = $r->harga;
}
?>
<section class="forms">
	<div class="container-fluid">
		<header> 
		</header>
		<div class="col-lg-12">
			<div class="card">
				<div class="card-header d-flex align-items-center">
					<h2 class="h5 display">Edit Rute</h2>
				</div>
				<div class="card-body">
					<div class="container">
						<form action="action" method="post" onsubmit="submitHandler(event)">
							<div class="form-group-material">
								<select class="form-control input-material" name="asal" id="asal" required>
								</select> 
								<label for="username" class="material-label">Bandara Asal</label>
							</div>
							<div class="form-group-material">
								<select class="form-control input-material" name="tujuan" id="tujuan" required>
								</select> 
								<label for="nama" class="material-label">Bandara Tujuan</label>
							</div>
							<div class="form-group-material">
								<input id="brgkt" type="text" name="brgkt" required class="input-material" readonly="" value='<?=$brgkt?>'>
								<label for="brgkt" class="label-material">Berangkat</label>
							</div>
							<div class="form-group-material">
								<input id="dtg" type="text" name="dtg" required class="input-material" readonly="" value="<?=$dtg?>">
								<label for="dtg" class="label-material">Sampai</label>
							</div>
							<div class="form-group-material">
								<input id="harga" type="text" name="harga" required class="input-material" value="<?=$harga?>">
								<label for="harga" class="label-material">Harga</label>
							</div>
							<div class="form-group-material">
								<select class="form-control input-material" name="pesawat" id="pesawat" required>
								</select> 
								<label for="level" class="material-label">Pesawat</label>
							</div>
							<div class="form-group border-top-padding width-full">
								<input type="hidden" name="id" value="<?=$id?>">
								<button type="submit" class="btn btn-primary float-right margin-left-10">Simpan</button>
								<a href="<?= base_url("dashboard/rute")?>" class="btn btn-secondary float-right">Cancel</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- modal -->
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog max-width-700" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Notifikasi</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body min-height-430">
				<p><b>Pilih bandara asal dan bandara tujuan yang berbeda!</b></p>
			</div>
		</div>
	</div>
</div>
<script>
	$( "#brgkt" ).timepicker({
		showPeriodLabels: false,
	});
	$( "#dtg" ).timepicker({
		showPeriodLabels: false,
	});

	<?php 
	foreach ($bandara as $val) {
		(($val->id == $asal)?$sel='selected':$sel='');
		print ("$('#asal').append('<option value=$val->id $sel>$val->nama ($val->kode)</option>');");
		(($val->id == $tujuan)?$sel='selected':$sel='');
		print ("$('#tujuan').append('<option value=$val->id $sel>$val->nama ($val->kode)</option>');");
	}
	foreach ($pesawat as $val) {
		(($val->id == $rute->result()[0]->id_pesawat)?$sel='selected':$sel='');
		print ("$('#pesawat').append('<option value=$val->id $sel>$val->nama</option>');");
	}
	?>

	function submitHandler(e){
		var val = [];
		val[0] = $('#asal').val();
		val[1] = $('#tujuan').val();
		if (val[0] == val[1]) {
			$('#modal').modal('show');
			e.preventDefault();
		}
		val[2] = $('#brgkt').val();
		if (val[2] == "") {
			$('#brgkt').addClass("is-invalid");
			$('#brgkt').focus();
			e.preventDefault();
		}
		val[3] = $('#dtg').val();
		if (val[3] == "") {
			$('#dtg').addClass("is-invalid");
			$('#dtg').focus();
			e.preventDefault(); 
		}
	}
</script>