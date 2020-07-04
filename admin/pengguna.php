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
		<meta name="description" content="Porto Admin - Responsive HTML5 Template">
		<meta name="author" content="okler.net">

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
		<link rel="stylesheet" href="assets/vendor/select2/select2.css" type="text/css" />
		<link rel="stylesheet" href="assets/vendor/jquery-datatables-bs3/assets/css/datatables.css" type="text/css" />

		<!-- Theme CSS -->
		<link rel="stylesheet" href="assets/stylesheets/theme.css" type="text/css" />

		<!-- Skin CSS -->
		<link rel="stylesheet" href="assets/stylesheets/skins/default.css" type="text/css" />

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="assets/stylesheets/theme-custom.css" type="text/css">
		<link rel="stylesheet" href="assets/style.css" type="text/css">

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

				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Pengguna</h2>
					
						
					</header>

						<div class="row">
						
					</div>

					<!-- start: page -->
					
							<?php if(isset($_GET['status'])){
							if(($_GET['status']) == "sukses"){ echo '<div class="alert alert-info">User Berhasil Dihapus</div>'; }
							}
							?>
						
					<section class="panel">
											
							<div class="panel-body">
								<div class="table-responsive">
								<table class="table table-bordered table-striped mb-none" id="datatable-default">
									<thead>
										<tr>
										
											<th class="text center">Username</th>
											<th class="text center">Nama Lengkap</th>
											<th class="text center">No Telepon</th>
											<th class="text center">Kos/Kontrakan</th>
											<th class="text center">Pesanan Masuk</th>
											<th class="text center">Pesanan Keluar</th>
											<th class="text center">Actions</th>
										</tr>
									</thead>
									<tbody>
									<?php	
					
										$sql= 'SELECT * FROM users';	
					
										$result = mysqli_query($link, $sql);
									
										if(mysqli_num_rows($result) > 0){
										while($row = mysqli_fetch_array($result)){
$username = $row['username'];
$data = "SELECT * FROM item WHERE kode = '$username' ";
$resultdata = mysqli_query($link, $data);
$jumlahdata =  mysqli_num_rows($resultdata);
$masuk = "SELECT * FROM pesanan WHERE nama_penyedia = '$username' ";
$resultmasuk = mysqli_query($link, $masuk);
$pesananmasuk =  mysqli_num_rows($resultmasuk);
$keluar = "SELECT * FROM pesanan WHERE nama_pemesan = '$username' ";
$resultkeluar = mysqli_query($link, $keluar);
$pesanankeluar =  mysqli_num_rows($resultkeluar);

										
										
										
										?>
										<tr>
											<td><?php echo $row['username']; ?></td>
											<td><?php echo $row['name']; ?></td>
											<td><?php echo $row['tlp']; ?></td>
											<td class="text center"><?php echo $jumlahdata; ?></td>
											<td class="text center"><?php echo $pesananmasuk; ?></td>
											<td class="text center"><?php echo $pesanankeluar; ?></td>
											
											<td class="actions text center" >																							
												<a href="#" class="on-default remove-row" data-toggle="modal" data-target="#hapususers<?php echo $row['id']; ?>"><i class="fa fa-trash-o"></i></a>
											</td>
										</tr>
									<div class="quick-view modal fade in" id="hapususers<?php echo $row['id']; ?>">
											<div class="container">
												<div class="row">
													<div id="view-gallery">
														<div class="col-xs-12">
															<div class="d-table">
																<div class="d-tablecell">
																	<div class="modal-dialog">
																		<div class="main-view modal-content">
																			<div class="modal-footer" data-dismiss="modal">
																				<span>x</span>
																			</div>
																			
																			<div class="section-title text-center mb-70">
																				<h2>Apakah Anda Yakin Ingin Menghapus User Ini ? Data Kos, Kontrakan, dan Pesanan yang Terkait Dengan User Ini Akan Otomatis Ikut Terhapus</h2>
																			</div>
																			<div class="single-shipping-botton">
																			<button type="button" onclick="location.href='<?php echo "hapususers.php?user="; echo $row['username']; ?>';"> 
																				<a style="color:white">Ya</a>
																			</button>
																			<br>
																			<button type="button" onclick="location.href='<?php echo "pengguna.php";?>';"> 
																				<a style="color:white">Tidak</a>
																			</button>
																			</div>
																			
																		
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<?php                                                                                    										
												}
												}  ?>	
                                    </tbody>
								</table>
								</div>
							</div>
						</section>

					
					
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
		<script src="assets/vendor/select2/select2.js" type="text/javascript"></script>
		<script src="assets/vendor/jquery-datatables/media/js/jquery.dataTables.js" type="text/javascript"></script>
		<script src="assets/vendor/jquery-datatables/extras/TableTools/js/dataTables.tableTools.min.js" type="text/javascript"></script>
		<script src="assets/vendor/jquery-datatables-bs3/assets/js/datatables.js" type="text/javascript"></script>
		
		<!-- Theme Base, Components and Settings -->
		<script src="assets/javascripts/theme.js" type="text/javascript"></script>
		
		<!-- Theme Custom -->
		<script src="assets/javascripts/theme.custom.js" type="text/javascript"></script>
		
		<!-- Theme Initialization Files -->
		<script src="assets/javascripts/theme.init.js" type="text/javascript"></script>


		<!-- Examples -->
		<script src="assets/javascripts/tables/examples.datatables.default.js" type="text/javascript"></script>
		<script src="assets/javascripts/tables/examples.datatables.row.with.details.js" type="text/javascript"></script>
		<script src="assets/javascripts/tables/examples.datatables.tabletools.js" type="text/javascript"></script>
	</body>
</html>