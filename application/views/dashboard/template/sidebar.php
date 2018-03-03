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
	<link rel="stylesheet" href="<?= base_url() ?>assets/vendor/font-awesome/css/fontawesome-all.min.css">
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
	<link rel="stylesheet" type="text/css" href="<?= base_url()?>assets/css/costume.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/jquery-ui.css" />
	<link rel="stylesheet" type="text/css" href="<?= base_url()?>assets/css/jquery-ui-timepicker-addon.css">
	<!-- Favicon-->
	<link rel="shortcut icon" href="<?= base_url() ?>assets/img/ico.png">
	<script src="<?= base_url() ?>assets/vendor/jquery/jquery.min.js"></script>
	<script src="<?= base_url() ?>assets/js/jquery-ui.js"></script>
	<script src="<?= base_url() ?>assets/js/jquery-ui-timepicker-addon.js"></script>
	<script type="text/javascript" src="<?= base_url()?>assets/vendor/bootstrap/js/bootstrap.js"></script>
<!-- Tweaks for older IEs--><!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
<body>
	<nav class="side-navbar">
		<div class="side-navbar-wrapper">
			<!-- Sidebar Header    -->
			<div class="sidenav-header d-flex align-items-center justify-content-center">
				<!-- User Info-->
				<div class="sidenav-header-inner text-center">
					<?php
					$img = $this->session->userdata('foto');
					(($img == '')?$foto = 'admin.png':$foto='users/'.$img)
					?>
					<img src="<?= base_url("assets/img/".$foto)?>" alt="person" class="img-fluid rounded-circle">
					<h2 class="h5"><?=$this->session->userdata('nama')?></h2>
					<?php (($this->session->userdata('level') == 0)?$level = 'Admin':$level='Head Admin')?>
					<span><?=$level?></span>
				</div>
				<!-- Small Brand information, appears on minimized sidebar-->
				<div class="sidenav-header-logo"><a href="<?= base_url() ?>dashboard" class="brand-small text-center"> <strong>B</strong><strong class="text-primary">D</strong></a></div>
			</div>
			<!-- Sidebar Navigation Menus-->
			<div class="main-menu">
				<ul id="side-main-menu" class="side-menu list-unstyled">                  
					<li id='menu-1'>
						<a href="<?= base_url("dashboard") ?>"> 
							<i class="fa fa-home"></i>
							Home
						</a>
					</li>
					<li id='menu-2'>
						<a href="<?= base_url("dashboard/users")?>"> 
							<i class="fa fa-user"></i>
							User
						</a>
					</li>
					<li id='menu-3'>
						<a href="<?= base_url("dashboard/pemesanan")?>"> 
							<i class="fas fa-clipboard-list"></i>
							Pemesanan
						</a>
					</li>
					<li id='menu-4'>
						<a href="<?= base_url("dashboard/rute")?>"> 
							<i class="fa fa-road "></i>
							Rute
						</a>
					</li>
					<li id='menu-5'>
						<a href="<?= base_url("dashboard/bandara")?>"> 
							<i class="fa fa-warehouse"></i>
							Bandara
						</a>
					</li>					
					<li id='menu-6'>
						<a href="<?= base_url("dashboard/pesawat")?>"> 
							<i class="fa fa-plane"></i>
							Pesawat
						</a>
					</li>
					<script>
						var id = '#menu-'+<?=$id?>;
						$(id).addClass('bg-primary');
					</script>
				</ul>
			</div>
		</div>
	</nav>