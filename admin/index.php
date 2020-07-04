<?php
include "../config.php";
?>
<!doctype html>
<html class="fixed">
	<head>

		<!-- Basic -->
		<meta charset="UTF-8">

		<title>Admin</title>
		<meta name="keywords" content="HTML5 Admin Template" />
		<meta name="description" content="JSOFT Admin - Responsive HTML5 Template">
		<meta name="author" content="JSOFT.net">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

		<!-- Web Fonts  -->
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.css" type="text/css" />
		<link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.css" type="text/css" />
		<link rel="stylesheet" href="assets/vendor/magnific-popup/magnific-popup.css" type="text/css" />
		<link rel="stylesheet" href="assets/vendor/bootstrap-datepicker/css/datepicker3.css" type="text/css" />

		<!-- Specific Page Vendor CSS -->
		<link rel="stylesheet" href="assets/vendor/jquery-ui/css/ui-lightness/jquery-ui-1.10.4.custom.css" type="text/css" />
		<link rel="stylesheet" href="assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css" type="text/css" />
		<link rel="stylesheet" href="assets/vendor/morris/morris.css" type="text/css" />

		<!-- Theme CSS -->
		<link rel="stylesheet" href="assets/stylesheets/theme.css" type="text/css" />

		<!-- Skin CSS -->
		<link rel="stylesheet" href="assets/stylesheets/skins/default.css" type="text/css" />

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="assets/stylesheets/theme-custom.css" type="text/css">

		<!-- Head Libs -->
		<script src="assets/vendor/modernizr/modernizr.js" type="text/javascript"></script>

	</head>
	<body>
		<section class="body">

			<!-- start: header -->
			<header class="header">
				<div class="logo-container">
					<a href="../" class="logo">
						
					</a>
					<div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
						<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
					</div>
				</div>
			
				<!-- start: search & user box -->
				<div class="header-right">
							
				<span class="separator"></span>
			
					<div id="userbox" class="userbox">
						<a href="#" data-toggle="dropdown">
							<figure class="profile-picture">
								<img src="assets/images/!logged-user.jpg" alt="Joseph Doe" class="img-circle" data-lock-picture="assets/images/!logged-user.jpg" />
							</figure>
							<div class="profile-info" data-lock-name="John Doe" data-lock-email="johndoe@JSOFT.com">
								<span class="name">Admin</span>
								<span class="role">administrator</span>
							</div>
			
							<i class="fa custom-caret"></i>
						</a>
			
						<div class="dropdown-menu">
							<ul class="list-unstyled">
								<li class="divider"></li>
								
								<li>
									<a role="menuitem" tabindex="-1" href=".."><i class="fa fa-power-off"></i> Logout</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- end: search & user box -->
			</header>
			<!-- end: header -->

			<div class="inner-wrapper">
				<!-- start: sidebar -->
				<aside id="sidebar-left" class="sidebar-left">
				
					<div class="sidebar-header">
						<div class="sidebar-title" style="color:white">
							Navigation
						</div>
						
					</div>
				
					<div class="nano">
						<div class="nano-content">
							<nav id="menu" class="nav-main" role="navigation">
								<ul class="nav nav-main">
									<li class="nav-active">
										<a href="index.php">
											<i class="fa fa-home" aria-hidden="true"></i>
											<span>Dashboard</span>
										</a>
									</li>
									<li>
										<a href="pengguna.php">
											
											<i class="fa fa-user" aria-hidden="true"></i>
											<span>Pengguna</span>
										</a>
									</li>
									<li>
										<a href="pesanan.php">
											
											<i class="fa fa-shopping-cart" aria-hidden="true"></i>
											<span>Pesanan</span>
										</a>
									</li>
									<li class="nav-parent">
										<a>
											<i class="fa fa-home" aria-hidden="true"></i>
											<span>Data Kos dan Kontrakan</span>
										</a>
										<ul class="nav nav-children">
											<li>
												<a href="data.php">
													 Semua
												</a>
											</li>
											<li>
												<a href="datakos.php">
													 Kos
												</a>
											</li>
											<li>
												<a href="datakontrakan.php">
													 Kontrakan
												</a>
											</li>
											
										</ul>
									</li>
									
									
									
								</ul>
							</nav>
				
							
				
							
						</div>
				
					</div>
				
				</aside>
				<!-- end: sidebar -->
<?php 
$kos = "SELECT * FROM item WHERE jenis =11 ";
$resultkos = mysqli_query($link, $kos);
$jumlahkos =  mysqli_num_rows($resultkos);

$kontrakan = "SELECT * FROM item WHERE jenis =12 ";
$resultkontrakan = mysqli_query($link, $kontrakan);
$jumlahkontrakan =  mysqli_num_rows($resultkontrakan);

$pengguna = "SELECT * FROM users ";
$resultpengguna = mysqli_query($link, $pengguna);
$jumlahpengguna =  mysqli_num_rows($resultpengguna);

$pesanan = "SELECT * FROM pesanan ";
$resultpesanan = mysqli_query($link, $pesanan);
$jumlahpesanan =  mysqli_num_rows($resultpesanan);




?>
				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Dashboard</h2>
					
						
					</header>

						<div class="row">
						
					</div>

					<!-- start: page -->
					<div class="row">
						
						<div class="col-md-6 col-lg-12 col-xl-6">
							<div class="row">
								<div class="col-md-12 col-lg-6 col-xl-6">
									<section class="panel panel-featured-left panel-featured-primary">
										<div class="panel-body">
											<div class="widget-summary">
												<div class="widget-summary-col widget-summary-col-icon">
													<div class="summary-icon bg-primary">
														<i class="fa fa-user"></i>
													</div>
												</div>
												<div class="widget-summary-col">
													<div class="summary">
														<h4 class="title">Pengguna</h4>
														<div class="info">
															<strong class="amount"><?php echo $jumlahpengguna; ?></strong>
															
														</div>
													</div>
													<div class="summary-footer">
													
													</div>
												</div>
											</div>
										</div>
									</section>
								</div>
								<div class="col-md-12 col-lg-6 col-xl-6">
									<section class="panel panel-featured-left panel-featured-secondary">
										<div class="panel-body">
											<div class="widget-summary">
												<div class="widget-summary-col widget-summary-col-icon">
													<div class="summary-icon bg-secondary">
														<i class="fa fa-home"></i>
													</div>
												</div>
												<div class="widget-summary-col">
													<div class="summary">
														<h4 class="title">Kos</h4>
														<div class="info">
															<strong class="amount"><?php echo $jumlahkos; ?></strong>
														</div>
													</div>
													<div class="summary-footer">
														
													</div>
												</div>
											</div>
										</div>
									</section>
								</div>
								<div class="col-md-12 col-lg-6 col-xl-6">
									<section class="panel panel-featured-left panel-featured-tertiary">
										<div class="panel-body">
											<div class="widget-summary">
												<div class="widget-summary-col widget-summary-col-icon">
													<div class="summary-icon bg-tertiary">
														<i class="fa fa-home"></i>
													</div>
												</div>
												<div class="widget-summary-col">
													<div class="summary">
														<h4 class="title">Kontrakan</h4>
														<div class="info">
															<strong class="amount"><?php echo $jumlahkontrakan; ?></strong>
														</div>
													</div>
													<div class="summary-footer">
													
													</div>
												</div>
											</div>
										</div>
									</section>
								</div>
								<div class="col-md-12 col-lg-6 col-xl-6">
									<section class="panel panel-featured-left panel-featured-quartenary">
										<div class="panel-body">
											<div class="widget-summary">
												<div class="widget-summary-col widget-summary-col-icon">
													<div class="summary-icon bg-quartenary">
														<i class="fa fa-shopping-cart"></i>
													</div>
												</div>
												<div class="widget-summary-col">
													<div class="summary">
														<h4 class="title">Pesanan</h4>
														<div class="info">
															<strong class="amount"><?php echo $jumlahpesanan; ?></strong>
														</div>
													</div>
													<div class="summary-footer">
													
													</div>
												</div>
											</div>
										</div>
									</section>
								</div>
							</div>
						</div>
					</div>

					

					
					
					<!-- end: page -->
				</section>
			</div>

			
		</section>

		<!-- Vendor -->
		<script src="assets/vendor/jquery/jquery.js" type="text/javascript"></script>
		<script src="assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js" type="text/javascript"></script>
		<script src="assets/vendor/bootstrap/js/bootstrap.js" type="text/javascript"></script>
		<script src="assets/vendor/nanoscroller/nanoscroller.js" type="text/javascript"></script>
		<script src="assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js" type="text/javascript"></script>
		<script src="assets/vendor/magnific-popup/magnific-popup.js" type="text/javascript"></script>
		<script src="assets/vendor/jquery-placeholder/jquery.placeholder.js" type="text/javascript"></script>
		
		<!-- Specific Page Vendor -->
		<script src="assets/vendor/jquery-ui/js/jquery-ui-1.10.4.custom.js" type="text/javascript"></script>
		<script src="assets/vendor/jquery-ui-touch-punch/jquery.ui.touch-punch.js" type="text/javascript"></script>
		<script src="assets/vendor/jquery-appear/jquery.appear.js" type="text/javascript"></script>
		<script src="assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js" type="text/javascript"></script>
		<script src="assets/vendor/jquery-easypiechart/jquery.easypiechart.js" type="text/javascript"></script>
		<script src="assets/vendor/flot/jquery.flot.js" type="text/javascript"></script>
		<script src="assets/vendor/flot-tooltip/jquery.flot.tooltip.js" type="text/javascript"></script>
		<script src="assets/vendor/flot/jquery.flot.pie.js" type="text/javascript"></script>
		<script src="assets/vendor/flot/jquery.flot.categories.js" type="text/javascript"></script>
		<script src="assets/vendor/flot/jquery.flot.resize.js" type="text/javascript"></script>
		<script src="assets/vendor/jquery-sparkline/jquery.sparkline.js" type="text/javascript"></script>
		<script src="assets/vendor/raphael/raphael.js" type="text/javascript"></script>
		<script src="assets/vendor/morris/morris.js" type="text/javascript"></script>
		<script src="assets/vendor/gauge/gauge.js" type="text/javascript"></script>
		<script src="assets/vendor/snap-svg/snap.svg.js" type="text/javascript"></script>
		<script src="assets/vendor/liquid-meter/liquid.meter.js" type="text/javascript"></script>
		<script src="assets/vendor/jqvmap/jquery.vmap.js" type="text/javascript"></script>
		<script src="assets/vendor/jqvmap/data/jquery.vmap.sampledata.js" type="text/javascript"></script>
		<script src="assets/vendor/jqvmap/maps/jquery.vmap.world.js" type="text/javascript"></script>
		<script src="assets/vendor/jqvmap/maps/continents/jquery.vmap.africa.js" type="text/javascript"></script>
		<script src="assets/vendor/jqvmap/maps/continents/jquery.vmap.asia.js" type="text/javascript"></script>
		<script src="assets/vendor/jqvmap/maps/continents/jquery.vmap.australia.js" type="text/javascript"></script>
		<script src="assets/vendor/jqvmap/maps/continents/jquery.vmap.europe.js" type="text/javascript"></script>
		<script src="assets/vendor/jqvmap/maps/continents/jquery.vmap.north-america.js" type="text/javascript"></script>
		<script src="assets/vendor/jqvmap/maps/continents/jquery.vmap.south-america.js" type="text/javascript"></script>
		
		<!-- Theme Base, Components and Settings -->
		<script src="assets/javascripts/theme.js" type="text/javascript"></script>
		
		<!-- Theme Custom -->
		<script src="assets/javascripts/theme.custom.js" type="text/javascript"></script>
		
		<!-- Theme Initialization Files -->
		<script src="assets/javascripts/theme.init.js" type="text/javascript"></script>


		<!-- Examples -->
		<script src="assets/javascripts/dashboard/examples.dashboard.js" type="text/javascript"></script>
	</body>
</html>