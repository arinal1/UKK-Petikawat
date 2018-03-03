<section class="forms">
  <div class="container-fluid">
    <header> 
    </header>
    <div class="col-lg-12">
      <div class="card">
        <div class="card-header d-flex align-items-center">
          <h2 class="h5 display">Tambah User</h2>
        </div>
        <div class="card-body">
          <div class="container">
            <div id="alert"></div>
            <form action="http://[::1]/petikawat/dashboard/user_tambah/action" enctype="multipart/form-data" method="post" accept-charset="utf-8" onsubmit="submitHandler(event)">
              <div class="form-group-material">
                <input id="username" type="text" name="username" required class="input-material" onblur="cekUsername()" onfocus="fcs()">
                <label for="username" class="label-material">Username</label>
              </div>
              <div class="form-group-material">
                <input id="nama" type="text" name="nama" required class="input-material">
                <label for="nama" class="label-material">Nama Lengkap</label>
              </div>
              <div class="form-group-material">
                <input id="password" type="password" name="password" required class="input-material">
                <label for="password" class="label-material">Password</label>
              </div>
              <div class="form-group-material">
                <select class="form-control input-material" name="level" id="level" required>
                  <option selected disabled>Level</option>
                  <option value="0" class="option">Admin</option>
                  <option value="1" class="option">Head Admin</option>
                </select> 
                <label for="level" class="material-label">Level</label>
              </div>
              <div class="form-group-material">
                <img src="<?= base_url("assets/img/admin.png")?>" id='foto' alt="foto" class="rounded-circle" height="75px" width='80px'>
                <input type="file" name="img" onchange='fotoHandler(event)'>
              </div>
              <div class="form-group border-top-padding width-full">
                <button type="submit" class="btn btn-primary float-right margin-left-10">Simpan</button>
                <a href="<?= base_url("dashboard/users")?>" class="btn btn-secondary float-right">Cancel</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<script>
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

  function submitHandler(e){
    if ($('#level').val() == null) {
      $('#level').addClass("is-invalid");
      $('#level').focus();
      e.preventDefault();
    }
  }

  function cekUsername(){
    var username = $('#username').val();
    $.ajax({
      url: '<?=base_url("dashboard/cek_user")?>',
      data: {'username': username}, // change this to send js object
      type: "post",
      success: function(count){
        if (count > 0) {
          if ($('#alert').children().length < 1){
            var alert = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>Username tidak tersedia.<button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>&times;</span></button></div>";
            $('#alert').append(alert);
          }
          $('#username').addClass('form-control').addClass('is-invalid');
        }
      }
    });
  }

  function fcs(){
    $('#username').removeClass('form-control').removeClass('is-invalid');
  }
</script>