<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Petikawat - Login</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="robots" content="all,follow">
  <!-- Bootstrap CSS-->
  <link rel="stylesheet" href="<?= base_url()?>assets/vendor/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome CSS-->
  <link rel="stylesheet" href="<?= base_url()?>assets/vendor/font-awesome/css/font-awesome.min.css">
  <!-- Fontastic Custom icon font-->
  <link rel="stylesheet" href="<?= base_url()?>assets/css/fontastic.css">
  <!-- Google fonts - Roboto -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700">
  <!-- jQuery Circle-->
  <link rel="stylesheet" href="<?= base_url()?>assets/css/grasp_mobile_progress_circle-1.0.0.min.css">
  <!-- Custom Scrollbar-->
  <link rel="stylesheet" href="<?= base_url()?>assets/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css">
  <!-- theme stylesheet-->
  <link rel="stylesheet" href="<?= base_url()?>assets/css/style.default.css" id="theme-stylesheet">
  <!-- Favicon-->
  <link rel="shortcut icon" href="<?= base_url()?>assets/img/ico.png">
  <!-- Tweaks for older IEs--><!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
<body>
  <div class="page login-page">
    <div class="container">
      <div class="form-outer text-center d-flex align-items-center">
        <div class="form-inner" style="min-width: 600px;">
          <div class="logo text-uppercase"><strong class="text-primary">Petikawat</strong></div>
          <p>Login to Petikawat Dashboard.</p>
          <form action="login/aksi_login" method="post">
            <div class="form-group-material">
              <input id="login-username" type="text" name="username" required class="input-material">
              <label for="login-username" class="label-material">Username</label>
            </div>
            <div class="form-group-material">
              <input id="login-password" type="password" name="password" required class="input-material">
              <label for="login-password" class="label-material">Password</label>
            </div>
            <div class="form-group-material">
              <input type="submit" href="index.html" class="btn btn-primary" value="Login">
            </div>
          </form>
          <div id="alert"></div>
        </div>
        <div class="copyrights text-center">
          <p>Design by <a href="https://bootstrapious.com" class="external">Bootstrapious</a></p>
        </div>
      </div>
    </div>
  </div>
  <!-- Javascript files-->
  <script src="<?= base_url()?>assets/vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url()?>assets/vendor/popper.js/umd/popper.min.js"> </script>
  <script src="<?= base_url()?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="<?= base_url()?>assets/js/grasp_mobile_progress_circle-1.0.0.min.js"></script>
  <script src="<?= base_url()?>assets/vendor/jquery.cookie/jquery.cookie.js"> </script>
  <script src="<?= base_url()?>assets/vendor/chart.js/Chart.min.js"></script>
  <script src="<?= base_url()?>assets/vendor/jquery-validation/jquery.validate.min.js"></script>
  <script src="<?= base_url()?>assets/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
  <!-- Main File-->
  <script src="<?= base_url()?>assets/js/front.js"></script>

  <script>
    var act = "<?=$_GET['action']?>";
    if (act == 'fail') {
      var alert = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>Login Failed.<button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>&times;</span></button></div>";
      $('#alert').append(alert);
    }
  </script>
</body>
</html>