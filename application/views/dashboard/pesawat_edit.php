<section class="forms">
  <div class="container-fluid">
    <header> 
    </header>
    <div class="col-lg-12">
      <div class="card">
        <div class="card-header d-flex align-items-center">
          <h2 class="h5 display">Edit Pesawat</h2>
        </div>
        <div class="card-body">
          <div class="container">
            <?= form_open_multipart('dashboard/pesawat_edit/action') ?>
            <?php 
            if ($pesawat->num_rows() < 1) {
              $id = ""; $nama = ""; $kursi = ""; $deskripsi = "";
            }else{
              $p = $pesawat->result()[0]; $id = $p->id; $nama = $p->nama; $kursi = $p->jumlah_kursi; $deskripsi = $p->deskripsi;
            }
            ?>
            <div class="form-group-material">
              <input id="nama" type="text" name="nama" required class="input-material" value="<?=$nama?>">
              <label for="nama" class="label-material">Nama</label>
            </div>
            <div class="form-group-material">
              <input id="kursi" type="text" name="kursi" required class="input-material" value="<?=$kursi?>">
              <label for="kursi" class="label-material">Jumlah Kursi</label>
            </div>
            <div class="form-group-material">
              <textarea name="deskripsi" class=" input-material"> <?=$deskripsi?></textarea>
              <label for="deskripsi" class="material-label">Deskripsi</label>
            </div>
            <div class="form-group border-top-padding width-full">
              <input type="hidden" name="id" value="<?=$id?>">
              <button type="submit" class="btn btn-primary float-right margin-left-10">Simpan</button>
              <a href="<?= base_url("dashboard/pesawat")?>" class="btn btn-secondary float-right">Cancel</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>