<section class="forms">
  <div class="container-fluid">
    <header> 
    </header>
    <div class="col-lg-12">
      <div class="card">
        <div class="card-header d-flex align-items-center">
          <h2 class="h5 display">Edit Bandara</h2>
        </div>
        <div class="card-body">
          <div class="container">
            <?= form_open_multipart('dashboard/bandara_edit/action') ?>
            <?php 
            if ($bandara->num_rows() < 1) {
              $id = ""; $kode = ""; $nama = ""; $kota = "";
            }else{
              $b = $bandara->result()[0]; $id = $b->id; $kode = $b->kode; $nama = $b->nama; $kota = $b->kota;
            }
            ?>
            <div class="form-group-material">
              <input id="kode" type="text" name="kode" required class="input-material" value="<?=$kode?>">
              <label for="kode" class="label-material">Kode</label>
            </div>
            <div class="form-group-material">
              <input id="nama" type="text" name="nama" required class="input-material" value="<?=$nama?>">
              <label for="nama" class="label-material">Nama</label>
            </div>
            <div class="form-group-material">
              <input id="kota" type="text" name="kota" required class="input-material" value="<?=$kota?>">
              <label for="kota" class="label-material">Kota</label>
            </div>
            <div class="form-group border-top-padding width-full">
              <input type="hidden" name="id" value="<?=$id?>">
              <button type="submit" class="btn btn-primary float-right margin-left-10">Simpan</button>
              <a href="<?= base_url("dashboard/bandara")?>" class="btn btn-secondary float-right">Cancel</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>