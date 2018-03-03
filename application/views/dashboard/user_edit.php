<section class="forms">
  <div class="container-fluid">
    <header> 
    </header>
    <div class="col-lg-12">
      <div class="card">
        <div class="card-header d-flex align-items-center">
          <h2 class="h5 display">Edit User</h2>
        </div>
        <div class="card-body">
          <div class="container">
            <div id="alert"></div>
            <form action="http://[::1]/petikawat/dashboard/user_edit/action" enctype="multipart/form-data" method="post" accept-charset="utf-8" onsubmit="submitHandler(event)">
              <?php
              if ($user->num_rows() > 0) {
                $u = $user->result()[0];
                $id = $u->id;
                $username = $u->username;
                $nama = $u->nama_lengkap;
                $pass = $this->encrypt->decode($u->password);
                (($u->foto=='')?$foto='admin.png':$foto = 'users/'.$u->foto);
              }else {
                $id = ''; $username = ''; $nama = ''; $pass = ''; $foto = 'admin.png';
              }
              ?>
              <input id="id" type="text" name="id" value="<?= $id ?>" hidden>
              <div class="form-group-material">
                <input id="username" type="text" name="username" required class="input-material" value="<?= $username?>" onblur="cekUsername()" onfocus="fcs()">
                <label for="username" class="label-material">Username</label>
              </div>
              <div class="form-group-material">
                <input id="nama" type="text" name="nama" required class="input-material" value="<?= $nama ?>">
                <label for="nama" class="label-material">Nama Lengkap</label>
              </div>
              <div class="form-group-material">
                <input id="password" type="password" name="password" required class="input-material" value="<?=$pass?>">
                <label for="password" class="label-material">Password</label>
              </div>
              <div class="form-group-material">
                <select class="form-control input-material" name="level" id="level" required>
                  <option selected disabled>Level</option>
                </select>
                <label for="level" class="material-label">Level</label>
              </div>
              <div class="form-group-material">
                <img src="<?= base_url("assets/img/".$foto)?>" id='foto' alt="foto" class="rounded-circle" height="75px" width='80px'>
                <input type="file" name="img" value="<?= $user->result()[0]->foto ?>" onchange='fotoHandler(event)'>
                <input type="hidden" name="img-ori" value="<?= $user->result()[0]->foto ?>">
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

  var level = "<?= $user->result()[0]->level?>";
  var tx = ["Admin", 'Head Admin'];
  var selected = "";
  for(var i = 0; i < 2; i++){
    ((i == level)?selected = ' selected ':selected='');
    $('#level').append('<option value="'+i+'" class="option"'+selected+'>'+tx[i]+'</option>');
  }

  function cekUsername(){
    var myUsername = '<?=$username?>';
    var username = $('#username').val();
    if (username != myUsername) {
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
  }

  function fcs(){
    $('#username').removeClass('form-control').removeClass('is-invalid');
  }
</script>