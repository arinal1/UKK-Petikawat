<section>
  <div class="container-fluid">
    <header> 
    </header>
    <div class="card">
      <div class="card-header">
        <h2 class="h5 display">Detail Pemesanan</h2>
      </div>
      <div class="card-body">
        <?php 
        $jmlPemesanan = $pemesanan->num_rows();
        if ($jmlPemesanan> 0) { 
          ?>
          <table class="table">
            <tr><th>Data Pemesan</th></tr>
            <tr>
              <td>
                <table class="table">
                  <thead>
                    <tr>
                      <th>Kode Pemesanan</th>
                      <th>Nama</th>
                      <th>Alamat</th>
                      <th>Telepon</th>
                      <th>Harga</th>
                      <th>Status</th>
                      <th>Bukti Pembayaran</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    foreach ($pemesan->result() as $row) {
                      (($row->bukti == "")?$bukti = "empty.png":$bukti = 'bukti/'.$row->bukti);
                      $tanggal = $row->tanggal;
                      if ($row->status == 0) {
                        $status = 'Menunggu Pembayaran';
                      } else if($row->status == 1){
                        $status = 'Menunggu Konfirmasi';
                      } else if($row->status == 2){
                        $status = "Dikonfirmasi";
                      }else{
                        $status = "Dibatalkan";
                      }?>
                      <tr>
                        <td><?= $row->kode ?></td>
                        <td><?= $row->nama ?></td>
                        <td><?= $row->alamat ?></td>
                        <td><?= $row->telepon ?></td>
                        <td><?= $row->harga ?></td>
                        <td><?= $status ?></td>
                        <td>
                          <img src="<?= base_url('assets/img/'. $bukti) ?>" class="btn rounded-circle" data-toggle="modal" data-target="#foto" onclick="buktiHandler('<?=$bukti?>')">
                        </td>
                      </tr>
                      <?php
                    } ?>
                  </tbody>
                </table>
              </td>
            </tr>
            <tr><th>Data Keberangkatan</th></tr>
            <tr>
              <td>
                <table class="table">
                  <tr>
                    <th>Pesawat</th>
                    <th>Asal</th>
                    <th>Tujuan</th>
                    <th>Tanggal</th>
                    <th>Berangkat</th>
                    <th>Sampai</th>
                  </tr>
                  <?php 
                  foreach ($rute->result() as $value) {
                    ?>
                    <tr>
                      <td><?=$value->pesawat?></td>
                      <td><?=$asal?></td>
                      <td><?=$tujuan?></td>
                      <td><?=$tanggal?></td>
                      <td><?=$value->brgkt?></td>
                      <td><?=$value->dtg?></td>
                    </tr>
                    <?php
                  }
                  ?>
                </table>
              </td>
            </tr>
            <tr><th>Data Penumpang</th></tr>
            <tr>
              <td>
                <table class="table">
                  <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>No Identitas</th>
                    <th>No Kursi</th>
                  </tr>
                  <?php 
                  $i = 1;
                  foreach ($pemesanan->result() as $value) {
                    ?>
                    <tr>
                      <td><?=$i++?></td>
                      <td><?=$value->nama?></td>
                      <td><?=$value->no_identitas?></td>
                      <td><?=$value->no_kursi?></td>
                    </tr>
                    <?php
                  }
                  ?>
                </table>
              </td>
            </tr>
          </table>
          <?php 
        } else{
          echo "<b>Data Tidak Ditemukan!</b>";
        }?>
      </div>
    </div>
  </div>
</section>
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
        <img src="" id="bukti_pembayaran">
      </div>
    </div>
  </div>
</div>
<script>
  function buktiHandler(img){
    var src = '<?=base_url('assets/img/')?>' + img;
    $('#bukti_pembayaran').attr('src', src);
  }
</script>