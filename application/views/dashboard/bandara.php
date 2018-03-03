<section>
  <div class="container-fluid">
    <header> 
    </header>
    <div class="card">
      <div class="card-header">
        <h2 class="h5 display">Daftar Rute Petikawat</h2>
      </div>
      <div class="card-body">
        <table class="table table-striped table-hover">
          <thead>
            <tr>
              <th>#</th>
              <th>Kode</th>
              <th>Nama</th>
              <th>Kota</th>
              <?php if($this->session->userdata('level') == 1){print('<th colspan="2">Aksi</th>');} ?>
            </tr>
          </thead>
          <tbody>
            <tr>
              <?php
              $i = 0;
              foreach ($bandara as $row) {?>
              <th scope="row"><?= ($i+1) ?></th>
              <td><?= $row->kode?></td>
              <td><?= $row->nama?></td>
              <td><?= $row->kota?></td>
              <?php if($this->session->userdata('level') == 1){print('
                <td><a href='. base_url("dashboard/bandara_edit/".$row->id).'>Edit</a></td>
                <td><a href="#" data-toggle="modal" data-target="#modal_aksi" onclick="hapusHandler('.$row->id.')">Hapus</a></td>
                ');
              } ?>
            </tr>
            <?php $i++;} ?>
          </tbody>
        </table>
        <?php 
        if($this->session->userdata('level') == 1){
          print('
            <span class="border-top-padding width-full"><a href="'.base_url("dashboard/bandara_tambah").'" class="btn btn-primary float-right">Tambah</a></th>
            </span>'
          );
        } ?>
    </div>
  </div>
</section>
<!-- modal -->
<div class="modal fade" id="foto" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog max-width-700" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Hapus Bandara</h5>
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
        <h5 class="modal-title" id="aksi">Hapus Bandara</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body align-center">
        <p>Apakah anda yakin?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Tidak</button>
        <form action="bandara_hapus" method="post">
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