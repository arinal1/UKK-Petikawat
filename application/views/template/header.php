<!DOCTYPE html>
<html>
<head>
	<title>Petikawat - Pesan Tiket Pesawat</title>
	<link rel="stylesheet" type="text/css" href="<?= base_url()?>assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url()?>assets/css/costume.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/vendor/font-awesome/css/fontawesome-all.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/jquery-ui.css" />
	<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300italic,300,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
	<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Flight Ticket Booking  Widget Responsive, Login Form Web Template, Flat Pricing Tables, Flat Drop-Downs, Sign-Up Web Templates, Flat Web Templates, Login Sign-up Responsive Web Template, Smartphone Compatible Web Template, Free Web Designs for Nokia, Samsung, LG, Sony Ericsson, Motorola Web Design" />
	<link rel="shortcut icon" href="<?= base_url() ?>assets/img/ico.png">
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<script src="<?= base_url() ?>assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="<?= base_url()?>assets/js/bootstrap.js"></script>
	<script src="<?= base_url() ?>assets/js/jquery-ui.js"></script>

</head>
<body>
	<nav class="navbar navbar-expand-lg opaque-navbar">
		<div class="container">
			<a class="navbar-brand text-primary" href="<?=base_url()?>">Petikawat</a>
			<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="fas fa-bars color-white"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav ml-auto ">
					<li class="nav-item active">
						<a class="nav-link text-light" href="<?= base_url() ?>">Pesan Tiket <span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link text-light" href="<?= base_url('home/cek_pemesanan') ?>">Cek Pemesanan</a>
					</li>
					<?php 
					if ($this->session->userdata('status') != "login"){
						print("<li class='nav-item dropdown'>
							<a class='nav-link text-light' href='#' id='navbarDropdown' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
							Login
							<i class='fas fa-sign-in-alt'></i>
							</a>
							<div class='dropdown-menu dropdown-menu-right dropdown-lr opaque-navbar' aria-labelledby='navbarDropdown'>
							<div class='col-lg-12'>
							<div class='text-center'><h3 class='text-dark'><b>Log In</b></h3></div>
							<form id='ajax-login-form' action='". base_url('login/aksi_login') ."' method='post' role='form' autocomplete='off'>
							<div class='form-group'>
							<input type='text' name='username' id='username' tabindex='1' class='form-control' placeholder='Username' value='' autocomplete='off'>
							</div>
							<div class='form-group'>
							<input type='password' name='password' id='password' tabindex='2' class='form-control' placeholder='Password' autocomplete='off'>
							</div>
							<div class='form-group'>
							<input type='submit' name='login-submit' id='login-submit' class='form-control btn btn-success' value='Log In'>
							</div>
							<div class='form-group'>
							</div>
							</form>
							</div>
							</div>
							</li>");
					} else{
						$img = $this->session->userdata('foto');
						(($img == '')?$foto = 'admin.png':$foto='users/'.$img);
						print ("
							<li class='nav-item'>
							<a class='nav-link text-light' href='". base_url('dashboard')."'>Dashboard <i class='fas fa-columns'></i></a>
							</li>");
					}
					?>
				</ul>
			</div>
		</div>
	</nav>