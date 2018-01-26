<?php 
if (!$this->session->userdata('status')){
  redirect(base_url(),'Please Login');
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Dashboard Petikawat</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="robots" content="all,follow">
  <!-- Bootstrap CSS-->
  <link rel="stylesheet" href="<?= base_url() ?>assets/vendor/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome CSS-->
  <link rel="stylesheet" href="<?= base_url() ?>assets/vendor/font-awesome/css/font-awesome.min.css">
  <!-- Fontastic Custom icon font-->
  <link rel="stylesheet" href="<?= base_url() ?>assets/css/fontastic.css">
  <!-- Google fonts - Roboto -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700">
  <!-- jQuery Circle-->
  <link rel="stylesheet" href="<?= base_url() ?>assets/css/grasp_mobile_progress_circle-1.0.0.min.css">
  <!-- Custom Scrollbar-->
  <link rel="stylesheet" href="<?= base_url() ?>assets/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css">
  <!-- theme stylesheet-->
  <link rel="stylesheet" href="<?= base_url() ?>assets/css/style.default.css" id="theme-stylesheet">
  <!-- Favicon-->
  <link rel="shortcut icon" href="<?= base_url() ?>assets/img/favicon.ico">
<!-- Tweaks for older IEs--><!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
<body>
  <!-- Side Navbar -->
  <nav class="side-navbar">
    <div class="side-navbar-wrapper">
      <!-- Sidebar Header    -->
      <div class="sidenav-header d-flex align-items-center justify-content-center">
        <!-- User Info-->
        <div class="sidenav-header-inner text-center"><img src="<?= base_url("assets/img/users/"); echo $this->session->userdata('foto') ?>" alt="person" class="img-fluid rounded-circle">
          <h2 class="h5"><?=$this->session->userdata('nama')?></h2><span>Web Developer</span>
        </div>
        <!-- Small Brand information, appears on minimized sidebar-->
        <div class="sidenav-header-logo"><a href="<?= base_url() ?>dashboard" class="brand-small text-center"> <strong>B</strong><strong class="text-primary">D</strong></a></div>
      </div>
      <!-- Sidebar Navigation Menus-->
      <div class="main-menu">
        <h5 class="sidenav-heading">Main</h5>
        <ul id="side-main-menu" class="side-menu list-unstyled">                  
          <li>
            <a href="<?= base_url("dashboard") ?>"> 
              <i class="icon-home"></i>
              Home
            </a>
          </li>
          <li>
            <a href="forms.html"> 
              <i class="icon-form"></i>
              Forms
            </a>
          </li>
          <li>
            <a href="charts.html"> 
              <i class="fa fa-bar-chart"></i>
            Charts</a>
          </li>
          <li>
            <a href="<?= base_url("dashboard/users")?>"> <i class="icon-grid"></i>
              Users
            </a>
          </li>
          <li>
            <a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> 
              <i class="icon-interface-windows"></i>
              Example dropdown 
            </a>
            <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
              <li>
                <a href="#">Page</a>
              </li>
              <li>
                <a href="#">Page</a>
              </li>
              <li>
                <a href="#">Page</a>
              </li>
            </ul>
          </li>
          <li>
            <a href="login.html"> 
              <i class="icon-interface-windows"></i>
              Login page
            </a>
          </li>
          <li> 
            <a href="#"> 
              <i class="icon-mail"></i>
              Demo
              <div class="badge badge-warning">6 New</div>
            </a>
          </li>
        </ul>
      </div>
      <div class="admin-menu">
        <h5 class="sidenav-heading">Second menu</h5>
        <ul id="side-admin-menu" class="side-menu list-unstyled"> 
          <li> 
            <a href="#"> 
              <i class="icon-screen"> </i>
              Demo
            </a>
          </li>
          <li> 
            <a href="#"> 
              <i class="icon-flask"> </i>
              Demo
              <div class="badge badge-info">Special</div>
            </a>
          </li>
          <li> 
            <a href=""> 
              <i class="icon-flask"> </i>
              Demo
            </a>
          </li>
          <li> 
            <a href=""> 
              <i class="icon-picture"> </i>
              Demo
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="page">
    <!-- navbar-->
    <header class="header">
      <nav class="navbar">
        <div class="container-fluid">
          <div class="navbar-holder d-flex align-items-center justify-content-between">
            <div class="navbar-header">
              <a id="toggle-btn" href="#" class="menu-btn">
                <i class="icon-bars"> </i>
              </a>
              <a href="<?= base_url() ?>" class="navbar-brand">
                <div class="brand-text d-none d-md-inline-block">
                  <span>Bootstrap </span>
                  <strong class="text-primary">Dashboard</strong>
                </div>
              </a>
            </div>
            <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
              <li class="nav-item dropdown"> 
                <a id="notifications" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link">
                  <i class="fa fa-bell"></i>
                  <span class="badge badge-warning">12</span>
                </a>
                <ul aria-labelledby="notifications" class="dropdown-menu">
                  <li>
                    <a rel="nofollow" href="#" class="dropdown-item"> 
                      <div class="notification d-flex justify-content-between">
                        <div class="notification-content">
                          <i class="fa fa-envelope"></i>
                          You have 6 new messages 
                        </div>
                        <div class="notification-time">
                          <small>4 minutes ago</small>
                        </div>
                      </div>
                    </a>
                  </li>
                  <li>
                    <a rel="nofollow" href="#" class="dropdown-item"> 
                      <div class="notification d-flex justify-content-between">
                        <div class="notification-content">
                          <i class="fa fa-twitter"></i>
                          You have 2 followers
                        </div>
                        <div class="notification-time">
                          <small>4 minutes ago</small>
                        </div>
                      </div>
                    </a>
                  </li>
                  <li>
                    <a rel="nofollow" href="#" class="dropdown-item"> 
                      <div class="notification d-flex justify-content-between">
                        <div class="notification-content">
                          <i class="fa fa-upload"></i>
                          Server Rebooted
                        </div>
                        <div class="notification-time">
                          <small>4 minutes ago</small>
                        </div>
                      </div>
                    </a>
                  </li>
                  <li>
                    <a rel="nofollow" href="#" class="dropdown-item"> 
                      <div class="notification d-flex justify-content-between">
                        <div class="notification-content">
                          <i class="fa fa-twitter"></i>
                          You have 2 followers
                        </div>
                        <div class="notification-time">
                          <small>10 minutes ago</small>
                        </div>
                      </div>
                    </a>
                  </li>
                  <li>
                    <a rel="nofollow" href="#" class="dropdown-item all-notifications text-center"> 
                      <strong> 
                        <i class="fa fa-bell"></i>
                        view all notifications
                      </strong>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item dropdown"> 
                <a id="messages" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link">
                  <i class="fa fa-envelope"></i>
                  <span class="badge badge-info">10</span>
                </a>
                <ul aria-labelledby="notifications" class="dropdown-menu">
                  <li>
                    <a rel="nofollow" href="#" class="dropdown-item d-flex"> 
                      <div class="msg-profile"> 
                        <img src="img/avatar-1.jpg" alt="..." class="img-fluid rounded-circle">
                      </div>
                      <div class="msg-body">
                        <h3 class="h5">Jason Doe</h3>
                        <span>sent you a direct message</span>
                        <small>3 days ago at 7:58 pm - 10.06.2014</small>
                      </div>
                    </a>
                  </li>
                  <li>
                    <a rel="nofollow" href="#" class="dropdown-item d-flex"> 
                      <div class="msg-profile"> 
                        <img src="img/avatar-2.jpg" alt="..." class="img-fluid rounded-circle">
                      </div>
                      <div class="msg-body">
                        <h3 class="h5">Frank Williams</h3>
                        <span>sent you a direct message</span>
                        <small>3 days ago at 7:58 pm - 10.06.2014</small>
                      </div>
                    </a>
                  </li>
                  <li>
                    <a rel="nofollow" href="#" class="dropdown-item d-flex"> 
                      <div class="msg-profile"> 
                        <img src="img/avatar-3.jpg" alt="..." class="img-fluid rounded-circle">
                      </div>
                      <div class="msg-body">
                        <h3 class="h5">Ashley Wood</h3>
                        <span>sent you a direct message</span>
                        <small>3 days ago at 7:58 pm - 10.06.2014</small>
                      </div>
                    </a>
                  </li>
                  <li>
                    <a rel="nofollow" href="#" class="dropdown-item all-notifications text-center"> 
                      <strong> 
                        <i class="fa fa-envelope"></i>
                        Read all messages
                      </strong>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="<?=base_url('login/logout')?>" class="nav-link logout">
                  Logout
                  <i class="fa fa-sign-out"></i>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>
    <!-- Breadcrumb-->
    <div class="breadcrumb-holder">
      <div class="container-fluid">
        <ul class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
          <li class="breadcrumb-item active">Users</li>
        </ul>
      </div>
    </div>
    <section>
      <div class="container-fluid">
        <!-- Page Header-->
        <header> 
          <h1 class="h3 display">Users</h1>
        </header>
        <div class="card">
          <div class="card-header">
            <h2 class="h5 display">Daftar user Petikawat</h2>
          </div>
          <div class="card-body">
            <table class="table table-striped table-hover">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Nama</th>
                  <th>Username</th>
                  <th>Level</th>
                  <th colspan="2">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                $jmlUser = $users->num_rows();
                if ($jmlUser > 0) {?>
                <tr>
                  <?php
                  $i = 1;
                  foreach ($users->result() as $row) { ?>
                  <th scope="row"><?= $i++ ?></th>
                  <td><?= $row->nama_lengkap ?></td>
                  <td><?= $row->username ?></td>
                  <td><?= $row->level ?></td>
                  <td><a href="<?= base_url("dashboard/user_edit/"); echo $row->id?>">Edit</a></td>
                  <td><a href="<?= base_url("dashboard/user_hapus/"); echo $row->id?>">Hapus</a></td>
                </tr>
                <?php } ?>
                <?php } ?>
              </tbody>
            </table>
            <a href="<?= base_url("dashboard/user_tambah/new")?>" class="btn btn-primary">Tambah</a>
          </div>
        </div>
      </div>
    </section>
    <footer class="main-footer">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <p>Petikawat &copy; 2018</p>
          </div>
          <div class="col-sm-6 text-right">
            <p>Design by <a href="https://bootstrapious.com" class="external">Bootstrapious</a></p>
            <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
          </div>
        </div>
      </div>
    </footer>
  </div>
  <!-- Javascript files-->
  <script src="<?= base_url() ?>assets/vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url() ?>assets/vendor/popper.js/umd/popper.min.js"> </script>
  <script src="<?= base_url() ?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="<?= base_url() ?>assets/js/grasp_mobile_progress_circle-1.0.0.min.js"></script>
  <script src="<?= base_url() ?>assets/vendor/jquery.cookie/jquery.cookie.js"> </script>
  <script src="<?= base_url() ?>assets/vendor/chart.js/Chart.min.js"></script>
  <script src="<?= base_url() ?>assets/vendor/jquery-validation/jquery.validate.min.js"></script>
  <script src="<?= base_url() ?>assets/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
  <script src="<?= base_url() ?>assets/js/charts-home.js"></script>
  <!-- Main File-->
  <script src="<?= base_url() ?>assets/js/front.js"></script>
</body>
</html>