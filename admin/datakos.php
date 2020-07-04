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
						<h2>Kos</h2>
					
						
					</header>

						<div class="row">
						
					</div>

					<!-- start: page -->
					
							<?php if(isset($_GET['status'])){
							if(($_GET['status']) == "sukses"){ echo '<div class="alert alert-info">Data Berhasil Dihapus</div>'; }
							}
							?>
						
					<section class="panel">
											
							<div class="panel-body">
								<div class="table-responsive">
								<table class="table table-bordered table-striped mb-none" id="datatable-default">
									<thead>
										<tr>
										
											<th class="text center">Nama Kos</th>
											<th class="text center">Nama Pemilik</th>
											<th class="text center">Jenis</th>
											<th class="text center">Harga</th>
											<th class="text center">Kategori</th>
											<th class="text center">Wilayah</th>
											<th class="text center">Fasilitas</th>
											<th class="text center">Actions</th>
										</tr>
									</thead>
									<tbody>
									<?php	
					
										$sql= 'SELECT * FROM item WHERE jenis = 11';	
					
										$result = mysqli_query($link, $sql);
									
										if(mysqli_num_rows($result) > 0){
										while($row = mysqli_fetch_array($result)){	
										$kategori = $row['kategori'];
										$wilayah = $row['wilayah'];
										$fasilitas = $row['fasilitas'];
$kategorii = explode(",",$kategori);
$kategorinya = array();
if (in_array("21",$kategorii)) { $kategorinya[] = "Khusus Pria";}
if (in_array("22",$kategorii)) { $kategorinya[] = "Khusus Wanita";}
if (in_array("23",$kategorii)) { $kategorinya[] = "Campuran";}
if (in_array("24",$kategorii)) { $kategorinya[] = "2 Lantai";}
if (in_array("25",$kategorii)) { $kategorinya[] = "3 Lantai";}
if (in_array("26",$kategorii)) { $kategorinya[] = "4 Lantai atau Lebih";}


$wilayahh = explode(",",$wilayah);
$wilayahnya = array();
if (in_array("301",$wilayahh)) { $wilayahnya[] = "Kecamatan Bunaken";}
if (in_array("302",$wilayahh)) { $wilayahnya[] = "Kecamatan Bunaken Kepulauan";}
if (in_array("303",$wilayahh)) { $wilayahnya[] = "Kecamatan Malalayang";}
if (in_array("304",$wilayahh)) { $wilayahnya[] = "Kecamatan Paal Dua";}
if (in_array("305",$wilayahh)) { $wilayahnya[] = "Kecamatan Mapanget";}
if (in_array("306",$wilayahh)) { $wilayahnya[] = "Kecamatan Sario";}
if (in_array("307",$wilayahh)) { $wilayahnya[] = "Kecamatan Singkil";}
if (in_array("308",$wilayahh)) { $wilayahnya[] = "Kecamatan Tikala";}
if (in_array("309",$wilayahh)) { $wilayahnya[] = "Kecamatan Tuminting";}
if (in_array("310",$wilayahh)) { $wilayahnya[] = "Kecamatan Wanea";}
if (in_array("311",$wilayahh)) { $wilayahnya[] = "Kecamatan Wenang";}

$fasilitass = explode(",",$fasilitas);
$fasilitasnya = array();
if (in_array("401",$fasilitass)) { $fasilitasnya[] = "AC";}
if (in_array("402",$fasilitass)) { $fasilitasnya[] = "Kamar Mandi Dalam";}
if (in_array("403",$fasilitass)) { $fasilitasnya[] = "Garasi Mobil";}
if (in_array("404",$fasilitass)) { $fasilitasnya[] = "Garasi Motor";}
if (in_array("405",$fasilitass)) { $fasilitasnya[] = "Meja";}
if (in_array("406",$fasilitass)) { $fasilitasnya[] = "Kursi";}
if (in_array("407",$fasilitass)) { $fasilitasnya[] = "Lemari";}
if (in_array("408",$fasilitass)) { $fasilitasnya[] = "Kipas Angin";}
if (in_array("409",$fasilitass)) { $fasilitasnya[] = "Tempat Tidur";}
if (in_array("410",$fasilitass)) { $fasilitasnya[] = "Air PAM";}
if (in_array("411",$fasilitass)) { $fasilitasnya[] = "Air Sumur";}
if (in_array("412",$fasilitass)) { $fasilitasnya[] = "Listrik Prabayar";}
if (in_array("413",$fasilitass)) { $fasilitasnya[] = "Listrik Pascabayar";}
if (in_array("414",$fasilitass)) { $fasilitasnya[] = "Kolam Renang";}
if (in_array("415",$fasilitass)) { $fasilitasnya[] = "Kolam Ikan";}
if (in_array("416",$fasilitass)) { $fasilitasnya[] = "Ruang Tamu";}

if(empty($kategorinya)){ $kategorinya = ""; }
if(empty($wilayahnya)){ $wilayahnya = ""; }
if(empty($fasilitasnya)){ $fasilitasnya = ""; }
										
										?>
										<tr>
											<td><?php echo $row['nama']; ?></td>
											<td><?php echo $row['kode']; ?></td>
											<td class="text center"><?php $jenis = explode(',',$row['jenis']);
																				if(in_array('11',$jenis)){echo 'Kos<br>';}
																				if(in_array('12',$jenis)){echo 'Kontrakan<br>';}
											?></td>
											<td class="text center">Rp <?php   echo number_format($row['harga'],0,'.','.') ;?> / <?php if($row['satuan'] == 01 ) { echo 'Hari';} 
																							  if($row['satuan'] == 02 ) { echo 'Minggu';}
																							  if($row['satuan'] == 03 ) { echo 'Bulan';}
																							  if($row['satuan'] == 04 ) { echo 'Tahun';}
																	?></td>
											<td><?php if(!empty($kategorinya)){ echo implode(", ",$kategorinya); }  ?></td>
											<td class="text center"><?php if(!empty($wilayahnya)){ echo implode(",",$wilayahnya); }  ?></td>
											
											<td><?php if(!empty($fasilitasnya)){ echo implode(", ",$fasilitasnya); }  ?></td>
											
											
											<td class="actions text center" >	
												<a href="readdata.php?id=<?php echo $row['id'];?>" class="on-default remove-row"><i class="fa fa-search"></i></a>
												<a href="#" class="on-default remove-row" data-toggle="modal" data-target="#hapusdatakos<?php echo $row['id']; ?>"><i class="fa fa-trash-o"></i></a>
											</td>
										</tr>
									<div class="quick-view modal fade in" id="hapusdatakos<?php echo $row['id']; ?>">
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
																				<h2>Apakah Anda Yakin Ingin Menghapus Data Ini ? Seluruh Pesanan yang Terkait Dengan Data Ini Akan Otomatis Ikut Terhapus.</h2>
																			</div>
																			<div class="single-shipping-botton">
																			<button type="button" onclick="location.href='<?php echo "hapusdata.php?idkos="; echo $row['id']; ?>';"> 
																				<a style="color:white">Ya</a>
																			</button>
																			<br>
																			<button type="button" onclick="location.href='<?php echo "data.php";?>';"> 
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