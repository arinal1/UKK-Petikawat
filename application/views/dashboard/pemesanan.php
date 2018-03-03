<section>
  <div class="container-fluid">
    <header> 
    </header>
    <div class="card">
      <div class="card-header">
        <h2 class="h5 display">Pemesanan Petikawat</h2>
      </div>
      <div class="card-body">
        <table class="table table-striped table-hover">
          <thead>
            <tr>
              <th>#</th>
              <th>Kode Pemesanan</th>
              <th>Nama</th>
              <th>Alamat</th>
              <th>Telepon</th>
              <th>Status</th>
              <th>Bukti Pembayaran</th>
              <th colspan="2">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            $jmlPemesanan = $pemesanan->num_rows();
            if ($jmlPemesanan> 0) {
              ?>
              <tr>
                <?php
                $i = 1;
                foreach ($pemesanan->result() as $row) {
                  (($row->bukti == "")?$bukti = "empty.png":$bukti = 'bukti/'.$row->bukti);
                  if ($row->status == 0) {
                    $status = 'Menunggu Pembayaran';
                  } else if($row->status == 1){
                    $status = 'Menunggu Konfirmasi';
                  } else if($row->status == 2){
                    $status = "Dikonfirmasi";
                  }else{
                    $status = "Dibatalkan";
                  }?>
                  <th ><?= $i++ ?></th>
                  <td><?= $row->kode ?></td>
                  <td><?= $row->nama ?></td>
                  <td><?= $row->alamat ?></td>
                  <td><?= $row->telepon ?></td>
                  <td><?= $status ?></td>
                  <td class="align-center">
                    <img src="<?= base_url('assets/img/'. $bukti) ?>" class="btn rounded-circle" data-toggle="modal" data-target="#foto" onclick="buktiHandler('<?=$bukti?>')">
                  </td>
                  <td><a href="<?= base_url("dashboard/detail_pemesanan/"); echo $row->id?>">Detail</a></td>
                  <?php
                  if ($row->status == 1) { 
                    ?>
                    <td>
                      <a href='#' data-toggle="modal" data-target="#modal_aksi" onclick="aksiHandler(1,'<?=$row->id?>')">
                        Konfirmasi
                      </a>
                    </td>
                    <?php
                  } else if($row->status == 2){
                    ?>
                    <td>
                      <a href='#' data-toggle="modal" data-target="#modal_aksi" onclick="aksiHandler(2,'<?=$row->id?>')">
                        Batalkan
                      </a>
                    </td>
                    <?php
                  } else{ 
                    ?>
                    <td></td>
                    <?php
                  }
                  ?>
                </tr>
                <?php
              }
            }?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>
<!-- modal -->
<div class="modal fade" id="foto" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog max-width-700" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Bukti Pembayaran</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body align-center">
        <img src="" id="bukti_pembayaran" class="max-width-600">
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="modal_aksi" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog max-width-700" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="aksi"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body align-center">
        <p>Apakah anda yakin?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Tidak</button>
        <form id="aksi_url" action="#" method="post">
          <input type="hidden" name="id" value="" id='aksi_id'>
          <input type="submit" value="Ya" class="btn btn-primary">
        </form>
      </div>
    </div>
  </div>
</div>
<script>
  function buktiHandler(img){
    var src = '<?=base_url('assets/img/')?>' + img;
    $('#bukti_pembayaran').attr('src', src);
  }

  function aksiHandler(act, id){
    if (act == 1){
      var title = "Konfirmasi Pemesanan";
      var url = 'aksi_pemesanan/2';
    }else{
      var title = "Batalkan Pemesanan";
      var url = 'aksi_pemesanan/3';
    }
    $('#aksi').text(title);
    $('#aksi_url').attr('action', url);
    $('#aksi_id').val(id);
  }
</script>