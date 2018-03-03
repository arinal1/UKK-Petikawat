<section class="forms">
  <div class="container-fluid">
    <header> 
    </header>
    <div class="col-lg-12">
      <div class="card">
        <div class="card-header d-flex align-items-center">
          <h2 class="h5 display">Tambah Pesawat</h2>
        </div>
        <div class="card-body">
          <div class="container">
            <?= form_open_multipart('dashboard/pesawat_tambah/action') ?>
            <div class="form-group-material">
              <input id="nama" type="text" name="nama" required class="input-material">
              <label for="nama" class="label-material">Nama</label>
            </div>
            <div class="form-group-material">
              <input id="kursi" type="text" name="kursi" required class="input-material">
              <label for="kursi" class="label-material">Jumlah Kursi</label>
            </div>
            <div class="form-group-material">
              <textarea name="deskripsi" class=" input-material"></textarea>
              <label for="deskripsi" class="material-label">Deskripsi</label>
            </div>
            <div class="form-group border-top-padding width-full">
              <button type="submit" class="btn btn-primary float-right margin-left-10">Simpan</button>
              <a href="<?= base_url("dashboard/pesawat")?>" class="btn btn-secondary float-right">Cancel</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>