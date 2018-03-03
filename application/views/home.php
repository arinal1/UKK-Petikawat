<div class="main-agileinfo">
	<div class="card">
		<div class="card-header">
			<ul class="breadcrumb">
				<li class="breadcrumb-item active">Pesan Tiket</li>
			</ul>
		</div>
		<div class="card-body">
			<form action="<?= base_url('booking')?>" class="booking" method="post" onsubmit="pencarian(event)">
				<div class="row">
					<div class="form-group col col-md-6">
						<label>Berangkat</label>
						<select class="form-control bandara" name="from" required>
							<option selected disabled>Bandara Asal</option>
						</select>	
					</div>
					<div class="form-group col col-md-6">
						<label>Tujuan</label>
						<select class="form-control bandara" name="to" required>
							<option selected disabled>Bandara Tujuan</option>
						</select>
					</div>
					<div class="line"></div>
				</div>
				<div class="row">
					<div class="form-group col col-md-6">
						<label>Keberangkatan</label>
						<input class="form-control" id="datepicker" name="date" type="text" placeholder="Tanggal" readonly>
					</div>
					<div class="form-group col col-md-3">
						<label>Dewasa</label>
						<div class="form-inline">
							<div class="btn btn-primary entry value-minus">-</div>
							<input class="form-control penumpang entry value" readonly value="1" name="kursi-dewasa">
							<div class="btn btn-primary value-plus">+</div>
						</div>
					</div>
					<div class="form-group col col-md-3 float-right">
						<label>Anak-anak</label>
						<div class="form-inline">
							<div class="btn btn-primary entry value-minus">-</div>
							<input class="form-control penumpang entry value" readonly value="0">
							<div class="btn btn-primary value-plus">+</div>
						</div>
					</div>
					<div class="line"></div>
				</div>
				<input type="submit" class="btn btn-primary float-right" value="Search Flights">
				<div class="line"></div>
			</form>
		</div>
	</div>
</div>
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
	$(function() {
		$( "#datepicker" ).datepicker({
			dateFormat: "yy-mm-dd"
		});
	});
</script>
<script type="text/javascript">
	$('.value-plus').on('click', function(){
		var divUpd = $(this).parent().find('.value');
		var newVal = parseInt(divUpd.attr("value"))+ 1;
		if(newVal <= 6) divUpd.attr("value", newVal);
	});

	$('.value-minus').on('click', function(){
		var divUpd = $(this).parent().find('.value');
		var newVal = parseInt(divUpd.attr("value"), 10)-1;
		if(newVal>=0) divUpd.attr("value", newVal);
	});
</script>
<script type="text/javascript">
	<?php 
	foreach ($bandara as $val) {
		print ("$('.bandara').append('<option value=$val[id]>$val[nama] ($val[kode])</option>');");
	}
	?>
</script>
<script type="text/javascript">
	function pencarian(e){
		var val = [];
		for (i = 0; i < 2; i++) {
			val[i] = $(".bandara").eq(i).val();
		}
		if (val[0] == val[1]) {
			$('#modal').modal('show');
			e.preventDefault();
		}
		val[2] = $('.entry.value').eq(0).val();
		if (val[2] < 1) {
			$('.entry.value').eq(0).addClass("is-invalid");
			$('.entry.value').eq(0).focus();
			e.preventDefault();	
		} else {
			$('.entry.value').eq(0).removeClass("is-invalid");
		}
		val[3] = $('#datepicker').val();
		if (val[3] == "") {
			$('#datepicker').addClass("is-invalid");
			$('#datepicker').focus();
			e.preventDefault();		
		}else{
			$('#datepicker').removeClass('is-invalid');
		}
	}
</script>