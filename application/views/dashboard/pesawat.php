<section>
  <div class="container-fluid">
    <header> 
    </header>
    <div class="card">
      <div class="card-header">
        <h2 class="h5 display">Daftar Pesawat Petikawat</h2>
      </div>
      <div class="card-body">
        <table class="table table-striped table-hover">
          <thead>
            <tr>
              <th>#</th>
              <th>Nama</th>
              <th>Jumlah Kursi</th>
              <th>Deskripsi</th>
              <?php if($this->session->userdata('level') == 1){print('<th colspan="2">Aksi</th>');} ?>
            </tr>
          </thead>
          <tbody>
            <tr>
              <?php
              $i = 0;
              foreach ($pesawat as $row) {?>
              <th scope="row"><?= ($i+1) ?></th>
              <td><?= $row->nama?></td>
              <td><?= $row->jumlah_kursi?></td>
              <td><?= $row->deskripsi?></td>
              <?php if($this->session->userdata('level') == 1){print('
                <td><a href='. base_url("dashboard/pesawat_edit/".$row->id).'>Edit</a></td>
                <td><a href="#" data-toggle="modal" data-target="#modal_aksi" onclick="hapusHandler("'.$row->id.'")>Hapus</a></td>
                ');
              } ?>
            </tr>
            <?php $i++;} ?>
          </tbody>
        </table>
        <?php 
        if($this->session->userdata('level') == 1){
          print('
            <span class="border-top-padding width-full"><a href="'.base_url("dashboard/pesawat_tambah").'" class="btn btn-primary float-right">Tambah</a></th>
            </span>'
          );
        } ?>
      </div>
    </div>
  </div>
</section>
<!-- modal -->
<div class="modal fade" id="foto" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog max-width-700" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Hapus Pesawat</h5>
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
<div class="modal fade" id="modal_aksi" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog max-width-700" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="aksi">Hapus Pesawat</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body align-center">
        <p>Apakah anda yakin?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Tidak</button>
        <form action="pesawat_hapus" method="post">
          <input type="hidden" name="id" value="" id='aksi_id'>
          <input type="submit" value="Ya" class="btn btn-primary">
        </form>
      </div>
    </div>
  </div>
</div>
<script>
  function hapusHandler(id){
    $('#aksi_id').val(id);
  }
</script>