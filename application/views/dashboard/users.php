
<section>
  <div class="container-fluid">
    <header> 
    </header>
    <div class="card">
      <div class="card-header">
        <h2 class="h5 display">Daftar User Petikawat</h2>
      </div>
      <div class="card-body">
        <table class="table table-striped table-hover">
          <thead>
            <tr>
              <th>#</th>
              <th><span class="margin-left-55">Nama</span></th>
              <th>Username</th>
              <th>Level</th>
              <?php if($this->session->userdata('level') == 1){print('<th colspan="2">Aksi</th>');} ?>
            </tr>
          </thead>
          <tbody>
            <?php 
            $jmlUser = $users->num_rows();
            if ($jmlUser > 0) {
              $i = 1;
              foreach ($users->result() as $row) {
                (($row->level == 1)?$level = 'Head Admin':$level="Admin");
                (($row->foto == '')?$foto = 'admin.png':$foto='users/'.$row->foto); ?>
                <tr>
                  <th scope="row"><?= $i++ ?></th>
                  <td>
                    <img src="<?= base_url("assets/img/".$foto)?>" alt="foto" class="rounded-circle margin-right-10" height="35px" width='40px' style='max-width: 600px;'>
                    <?= $row->nama_lengkap ?>
                  </td>
                  <td><?= $row->username ?></td>
                  <td><?= $level ?></td>
                  <?php
                  if($this->session->userdata('level') == 1){
                    print('
                      <td><a href="'. base_url("dashboard/user_edit/".$row->id).'">Edit</a></td>
                      <td><a href="#" data-toggle="modal" data-target="#modal_aksi" onclick="hapusHandler('.$row->id.')">Hapus</a></td>'
                    );
                  } ?>
                </tr>
                <?php
              } 
            }
            ?>
          </tbody>
        </table>
        <?php 
        if($this->session->userdata('level') == 1){
          print('
            <span class="border-top-padding width-full"><a href="'.base_url("dashboard/user_tambah").'" class="btn btn-primary float-right">Tambah</a></th>
            </span>'
          );
        } ?>
      </div>
    </div>
  </div>
</section>
<div class="modal fade" id="modal_aksi" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog max-width-700" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="aksi">Hapus User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body align-center">
        <p>Apakah anda yakin?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Tidak</button>
        <form action="user_hapus" method="post">
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
    console.log(id);
  }
</script>