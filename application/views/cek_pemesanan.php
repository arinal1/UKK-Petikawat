<div class="main-agileinfo">
	<div class="card">
		<div class="card-header">
			<ul class="breadcrumb">
				<li class="breadcrumb-item active">Cek Pemesanan</li>
			</ul>
		</div>
		<div class="card-body min-height-430">
			<table class="table table-striped margin-bottom-40">
				<tbody>
					<tr>
						<td class="vertical-middle">Kode Pemesanan</td>
						<td>
							<input type="text" id="kode" class="form-control">
						</td>
						<td>
							<input type="submit" class="btn btn-primary float-right" value="Cari" onclick="redirect()">
						</td>
					</tr>
					<tr>
						<td colspan="3">
							<?php 
							$up = "";
							echo "<script>$('#kode').val('".$kode."');</script>";
							if ($pemesan->num_rows() < 1 && $kode != '') {
								echo "<b>Kode Pemesanan Tidak Ditemukan!</b>";
							} else if($pemesan->num_rows() > 0){
								switch ($pemesan->result()[0]->status) {
									case 0:
									$status = 'Menunggu Pembayaran';
									$up = 
									form_open_multipart(base_url('home/upload_bukti/'.$kode))."
									<table class='table'>
									<tr>
									<th colspan='2'>
									Upload Bukti Pembayaran	
									</th>
									</tr>
									<tr>
									<td>
									<div class='form-group-material'>
									<img src='".base_url('assets/img/empty.png')."' alt='foto' class='rounded-circle' height='75px' width='90px' id='foto'>
									<input name='img' type='file' onchange='fotoHandler(event)' id='img'>
									</div>
									</td>
									<td class='vertical-middle'>
									<input type='submit' class='btn btn-primary float-right' value='Upload' onclick='uplHandler(event)''>
									</tr>
									</table>
									</form>";
									break;
									case 1:
									$status = 'Menunggu Konfirmasi';
									break;
									case 2:
									$status = 'Terbooking';
									break;
									default:
									$status = 'Dibatalkan';
									break;
								}
								print('
									<table class="table">
									<tr>
									<th>Nama</th>
									<th>No Telepon</th>
									<th>Alamat</th>
									<th>Status</th>
									</tr>
									<tr>
									<td>'.$pemesan->result()[0]->nama.'</td>
									<td>'.$pemesan->result()[0]->telepon.'</td>
									<td>'.$pemesan->result()[0]->alamat.'</td>
									<td>'.$status.'</td>
									</tr>
									</table>
									');
							}
							?>
						</td>
					</tr>
				</tbody>
			</table>
			<?= $up?>
		</div>
	</div>
</div>
<script type="text/javascript">
	$('#kode').focus();
	function redirect(){
		var kode = $('#kode').val();
		if (kode == "") {
			$('#kode').addClass("is-invalid");
			$('#kode').focus();
		}else{
			window.location = '<?=base_url()?>home/cek_pemesanan/'+kode;
		}
	}

	function fotoHandler(e){
		var tgt = e.target || window.event.srcElement;
		var files = tgt.files;
		if (FileReader && files && files.length) {
			var fr = new FileReader();
			fr.onload = function (){
				$('#foto').attr('src', fr.result);
			}
			fr.readAsDataURL(files[0]);
		}
	}

	function uplHandler(e){
		if ($('#img').val() == '') {
			$('#img').addClass('is-invalid');
			e.preventDefault();
		}
	}
</script>