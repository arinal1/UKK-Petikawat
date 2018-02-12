<!DOCTYPE html>
<html>
<head>
	<title>Petikawat</title>
	<link rel="stylesheet" type="text/css" href="<?= base_url()?>assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url()?>assets/css/costume.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/style.css">
	<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300italic,300,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
	<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Flight Ticket Booking  Widget Responsive, Login Form Web Template, Flat Pricing Tables, Flat Drop-Downs, Sign-Up Web Templates, Flat Web Templates, Login Sign-up Responsive Web Template, Smartphone Compatible Web Template, Free Web Designs for Nokia, Samsung, LG, Sony Ericsson, Motorola Web Design" />
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

</head>
<body>
	<nav class="navbar navbar-expand-lg opaque-navbar">
		<div class="container">
			<a class="navbar-brand text-light" href="#">Petikawat</a>
			<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav ml-auto ">
					<li class="nav-item active">
						<a class="nav-link text-light" href="<?= base_url() ?>">Pesan Tiket <span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link text-light" href="#">Link</a>
					</li>
					<?php 
					if ($this->session->userdata('status') != "login"){
						print("<li class='nav-item dropdown'>
							<a class='nav-link dropdown-toggle text-light' href='#' id='navbarDropdown' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
							Login
							</a>
							<div class='dropdown-menu dropdown-menu-right dropdown-lr opaque-navbar' aria-labelledby='navbarDropdown'>
							<div class='col-lg-12'>
							<div class='text-center'><h3 class='text-light'><b>Log In</b></h3></div>
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
							<div class='row'>
							<div class='col-md-6'>
							<a href='#' tabindex='5' class='forgot-password'>Forgot Password?</a>
							</div>
							<div class='col-md-6'>
							<a href='". base_url('login/signup') ."' class='sign-up float-right'>Sign Up</a>
							</div>
							</div>
							<input type='hidden' class='hide' name='token' id='token' value='a465a2791ae0bae853cf4bf485dbe1b6'>
							</div>
							</form>
							</div>
							</div>
							</li>");
					} else{
						print ("<li class='nav-item'>
							<a class='nav-link text-light' href='". base_url('login/logout')."'>Logout</a>
							</li>");
					}
					?>
				</ul>
			</div>
		</div>
	</nav>
	<div class="main-agileinfo">
		<div class="sap_tabs">			
			<div id="horizontalTab">
				<ul class="resp-tabs-list">
					<li class="resp-tab-item"><span>Round Trip</span></li>
					<li class="resp-tab-item"><span>One way</span></li>
					<li class="resp-tab-item"><span>Multi city</span></li>				
				</ul>	
				<div class="clearfix"> </div>	
				<div class="resp-tabs-container">
					<div class="tab-1 resp-tab-content roundtrip">
						<form class="booking" action="<?= base_url()?>home/book_round" method="post" onsubmit="pencarian(event)">
							<div class="from">
								<h3>From</h3>
								<select  class="input-book bandara" name="from" required>
									<option selected disabled>Bandara Asal</option>
								</select>
							</div>
							<div class="to">
								<h3>To</h3>
								<select  class="input-book bandara" name="to" required>
									<option selected disabled>Bandara Tujuan</option>
								</select>
							</div>
							<div class="clear"></div>
							<div class="date">
								<div class="depart">
									<h3>Depart</h3>
									<input  id="datepicker" name="Text" type="text" class="input-book" value="mm/dd/yyyy" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'mm/dd/yyyy';}" required="">
								</div>
								<div class="return">
									<h3>Return</h3>
									<input  id="datepicker1" name="Text" type="text" class="input-book" value="mm/dd/yyyy" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'mm/dd/yyyy';}" required="">
								</div>
								<div class="clear"></div>
							</div>
							<div class="class">
								<h3>Class</h3>
								<select id="w3_country1" name="class" class="frm-field required">
									<option value="null">Economy</option>  
									<option value="null">Premium Economy</option>   
									<option value="null">Business</option>   
									<option value="null">First class</option>   						
								</select>

							</div>
							<div class="clear"></div>
							<div class="numofppl">
								<div class="adults">
									<h3>Adult:(12+ yrs)</h3>
									<div class="quantity"> 
										<div class="quantity-select">                           
											<div class="entry value-minus">&nbsp;</div>
											<div class="entry value"><span>1</span></div>
											<div class="entry value-plus active">&nbsp;</div>
										</div>
									</div>
								</div>
								<div class="child">
									<h3>Child:(2-11 yrs)</h3>
									<div class="quantity"> 
										<div class="quantity-select">                           
											<div class="entry value-minus">&nbsp;</div>
											<div class="entry value"><span>1</span></div>
											<div class="entry value-plus active">&nbsp;</div>
										</div>
									</div>
								</div>
								<div class="clear"></div>
							</div>
							<div class="clear"></div>
							<input class="btn btn-primary search-flight" type="submit" value="Search Flights">
						</form>						
					</div>		
					<div class="tab-1 resp-tab-content oneway">
						<form action="<?= base_url()?>home/book_one" class="booking" method="post" onsubmit="pencarian(event)">
							<div class="from">
								<h3>From</h3>
								<select  class="input-book bandara" name="from" required>
									<option selected disabled>Bandara Asal</option>
								</select>
							</div>
							<div class="to">
								<h3>To</h3>
								<select  class="input-book bandara" name="to" required>
									<option selected disabled>Bandara Tujuan</option>
								</select>
							</div>
							<div class="clear"></div>
							<div class="date">
								<div class="depart">
									<h3>Depart</h3>
									<input class="date input-book" id="datepicker2" name="date" type="text" class="input-book" value="Tanggal" size="10px" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Tanggal';}" required="">
								</div>
							</div>
							<div class="class">
								<h3>Class</h3>
								<select id="w3_country1" name="class" class="frm-field required">
									<option value="null">Economy</option>  
									<option value="null">Premium Economy</option>   
									<option value="null">Business</option>   
									<option value="null">First class</option>   						
								</select>

							</div>
							<div class="clear"></div>
							<div class="numofppl">
								<div class="adults">
									<h3>Adult:(12+ yrs)</h3>
									<div class="quantity"> 
										<div class="quantity-select">                           
											<div class="entry value-minus">&nbsp;</div>
											<div class="entry value"><span>1</span></div>
											<div class="entry value-plus active">&nbsp;</div>
										</div>
									</div>
								</div>
								<div class="child">
									<h3>Child:(2-11 yrs)</h3>
									<div class="quantity"> 
										<div class="quantity-select">                           
											<div class="entry value-minus">&nbsp;</div>
											<div class="entry value"><span>1</span></div>
											<div class="entry value-plus active">&nbsp;</div>
										</div>
									</div>
								</div>
								<div class="clear"></div>
							</div>
							<div class="clear"></div>
							<input type="submit" class="btn btn-primary search-flight" value="Search Flights">
						</form>	

					</div>
					<div class="tab-1 resp-tab-content multicity">
						
						<form action="<?= base_url()?>home/book_multi" class="booking" method="post" onsubmit="pencarian(event)">
							<div class="from">
								<h3>From</h3>
								<select  class="input-book bandara" name="from" required>
									<option selected disabled>Bandara Asal</option>
								</select>
							</div>
							<div class="to">
								<h3>To</h3>
								<select  class="input-book bandara" name="to" required>
									<option selected disabled>Bandara Tujuan</option>
								</select>
							</div>
							<div class="clear"></div>
							<div class="date">
								<div class="depart">
									<h3>Depart</h3>
									<input class="date input-book" id="datepicker3" name="date" type="text" class="input-book" value="mm/dd/yyyy" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'mm/dd/yyyy';}" required="">
								</div>
							</div>
							<div class="class">
								<h3>Class</h3>
								<select id="w3_country1" name="class" class="frm-field required">
									<option value="null">Economy</option>  
									<option value="null">Premium Economy</option>   
									<option value="null">Business</option>   
									<option value="null">First class</option>   						
								</select>
							</div>
							<div class="clear"></div>
							<div id="loadMore">Add City+</div>
							<div id="showLess">Remove</div>
						</form>
						<div class="load_more">	
							<ul id="myList">
								<li>
									<div class="l_g spcl">
										<form action="#" method="post" class="blackbg">
											<div class="from">
												<h3>From</h3>
												<select  class="input-book bandara" name="from" required>
													<option selected disabled>Bandara Asal</option>
												</select>
											</div>
											<div class="to">
												<h3>To</h3>
												<select  class="input-book bandara" name="to" required>
													<option selected disabled>Bandara Tujuan</option>
												</select>
											</div>
											<div class="clear"></div>
											<div class="date">
												<div class="depart">
													<h3>Depart</h3>
													<input class="date" id="datepicker" name="Text" type="text" class="input-book" value="mm/dd/yyyy" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'mm/dd/yyyy';}" required="">
												</div>
											</div>
											<div class="clear"></div>
										</form>

									</div>

								</li>
								<form action="#" class="booking" method="post">
									<div class="numofppl">
										<div class="adults">
											<h3>Adult:(12+ yrs)</h3>
											<div class="quantity"> 
												<div class="quantity-select">                           
													<div class="entry value-minus">&nbsp;</div>
													<div class="entry value"><span>1</span></div>
													<div class="entry value-plus active">&nbsp;</div>
												</div>
											</div>
										</div>
										<div class="child">
											<h3>Child:(2-11 yrs)</h3>
											<div class="quantity"> 
												<div class="quantity-select">                           
													<div class="entry value-minus">&nbsp;</div>
													<div class="entry value"><span>1</span></div>
													<div class="entry value-plus active">&nbsp;</div>
												</div>
											</div>
										</div>
										<div class="clear"></div>
									</div>
									<div class="clear"></div>
									<input type="submit" class="btn btn-primary search-flight" value="Search Flights">
								</form>
							</ul>
						</div>
					</div>

				</div>						
			</div>
		</div>
	</div>
	<div class="footer-w3l">
		<p class="agileinfo"> &copy; 2016 Flight Ticket Booking . All Rights Reserved | Design by <a href="http://w3layouts.com">W3layouts</a></p>
	</div>
	<!--script for portfolio-->
	<script src="<?= base_url() ?>assets/js/jquery.min.js"> </script>
	<script type="text/javascript" src="<?= base_url()?>assets/js/bootstrap.js"></script>
	<script src="<?= base_url() ?>assets/js/easyResponsiveTabs.js" type="text/javascript"></script>
	<script type="text/javascript">
		$(document).ready(function () {
			$('#horizontalTab').easyResponsiveTabs({
					type: 'default', //Types: default, vertical, accordion           
					width: 'auto', //auto or any width like 600px
					fit: true   // 100% fit in a container
				});
		});		
	</script>
	<!--//script for portfolio-->
	<!-- Calendar -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/jquery-ui.css" />
	<script src="<?= base_url() ?>assets/js/jquery-ui.js"></script>
	<script>
		$(function() {
			$( "#datepicker,#datepicker1,#datepicker2,#datepicker3" ).datepicker({
				dateFormat: "yy-mm-dd"
			});
		});
	</script>
	<!-- //Calendar -->
	<!--quantity-->
	<script>
		$('.value-plus').on('click', function(){
			var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)+1;
			divUpd.text(newVal);
		});

		$('.value-minus').on('click', function(){
			var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)-1;
			if(newVal>=1) divUpd.text(newVal);
		});
	</script>
	<!--//quantity-->
	<!--load more-->
	<script>
		$(document).ready(function () {
			size_li = $("#myList li").size();
			x=1;
			$('#myList li:lt('+x+')').show();
			$('#loadMore').click(function () {
				x= (x+1 <= size_li) ? x+1 : size_li;
				$('#myList li:lt('+x+')').show();
			});
			$('#showLess').click(function () {
				x=(x-1<0) ? 1 : x-1;
				$('#myList li').not(':lt('+x+')').hide();
			});
		});
	</script>
	<script type="text/javascript">
		<?php 
		foreach ($bandara as $val) {
			print ("$('.bandara').append('<option value=$val[id]>$val[nama] ($val[kode])</option>');
				");
		}
		?>
	</script>
	<script type="text/javascript">
		function pencarian(e){
			var val = [];
			var tab = $(".resp-tab-active").attr("aria-controls");
			for (i = 0; i < 6; i++) {
				val[i] = $(".bandara").eq(i).val();
			}
			if (tab == 0 && val[0] == val[1]) {
				alert("Pilih bandara asal dan bandara tujuan yang berbeda!")
				e.preventDefault();
			}else if (tab == 1 && val[2] == val[3]) {
				alert("Pilih bandara asal dan bandara tujuan yang berbeda!")
				e.preventDefault();
			} else if (tab == 2 && val[4] == val[5]) {
				alert("Pilih bandara asal dan bandara tujuan yang berbeda!")
				e.preventDefault();
			}
		}
	</script>
</body>
</html>