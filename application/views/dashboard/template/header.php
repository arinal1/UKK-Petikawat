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
						<a href="<?= base_url('dashboard') ?>" class="navbar-brand">
							<div class="brand-text d-none d-md-inline-block">
								<span>Petikawat </span>
								<strong class="text-primary">Dashboard</strong>
							</div>
						</a>
					</div>
					<ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
						<li class="nav-item">
							<a href="<?=base_url()?>" class="nav-link">
								Pesan Tiket
							</a>
						</li>
						<li class="nav-item">
							<a href="<?=base_url('login/logout')?>" class="nav-link logout">
								Logout
								<i class="fas fa-sign-out-alt"></i>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
	</header>