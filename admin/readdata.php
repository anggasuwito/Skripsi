<?php
include "../config.php";

if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){

$id = trim($_GET['id']);

$sql = "SELECT * FROM item WHERE id = '".$id."'";
$result = mysqli_query($link, $sql);
if(mysqli_num_rows($result) == 1){
                /* Fetch result row as an associative array. Since the result set
                contains only one row, we don't need to use while loop */
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
				
                
                // Retrieve individual field value
				$photo = $row["photo"];
				$photo2 = $row["photo2"];
				$photo3 = $row["photo3"];
				$photo4 = $row["photo4"];
				$nama = $row["nama"];
				$alamat = $row["alamat"];
				$harga = $row["harga"];
				$satuan = $row["satuan"];
				$deskripsi = $row["deskripsi"];
				$jenis = $row["jenis"];
				$kategori = $row["kategori"];
				$wilayah = $row["wilayah"];
				$fasilitas = $row["fasilitas"];
				$kode = $row["kode"];
				$lat = $row["lat"];
				$lng = $row["lng"];
            }
			 mysqli_close($link);

}

$jeniss = explode(",",$jenis);
if (in_array("11",$jeniss)) { $jenisnya[] = "Kos"; }
if (in_array("12",$jeniss)) { $jenisnya[] = "Kontrakan";}

$kategorii = explode(",",$kategori);

if (in_array("21",$kategorii)) { $kategorinya[] = "Khusus Pria";}
if (in_array("22",$kategorii)) { $kategorinya[] = "Khusus Wanita";}
if (in_array("23",$kategorii)) { $kategorinya[] = "Campuran";}
if (in_array("24",$kategorii)) { $kategorinya[] = "2 Lantai";}
if (in_array("25",$kategorii)) { $kategorinya[] = "3 Lantai";}
if (in_array("26",$kategorii)) { $kategorinya[] = "4 Lantai atau Lebih";}


$wilayahh = explode(",",$wilayah);

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

if(empty($jenisnya)){ $jenisnya = ""; }
if(empty($kategorinya)){ $kategorinya = ""; }
if(empty($wilayahnya)){ $wilayahnya = ""; }
if(empty($fasilitasnya)){ $fasilitasnya = ""; }



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
		<link rel="stylesheet" href="assets/map.css" type="text/css">	
		<link rel="stylesheet" href="assets/vendor/owl-carousel/owl.carousel.css" type="text/css" />
		<link rel="stylesheet" href="assets/vendor/owl-carousel/owl.theme.css" type="text/css" />
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
					
					<div class="row">
							<div class="col-lg-12">
							
								<section class="panel">
								
									
									<div class="panel-body">
									
										<form class="form-horizontal form-bordered" method="get">
											<div class="form-group">
												<div class="col-md-3">

								
							
									<div class="owl-carousel" data-plugin-carousel data-plugin-options='{ "autoPlay": 5000, "items": 1,  "navigation": false, "pagination": true }'>
										
											
											<?php 
															if (!empty($row['photo'])) {echo '<div class="item">'; echo '<img src="../upload/';echo  $row['photo'];echo'" alt="" width="210px" height="210px">';echo '</div>'; } 
															elseif (!empty($row['photo2'])) {echo '<div class="item">'; echo '<img src="../upload/';echo  $row['photo2'];echo'" alt="" width="210px" height="210px">'; echo '</div>'; } 
															elseif (!empty($row['photo3'])) {echo '<div class="item">'; echo '<img src="../upload/';echo  $row['photo3'];echo'" alt="" width="210px" height="210px">'; echo '</div>'; } 
															elseif (!empty($row['photo4'])) {echo '<div class="item">'; echo '<img src="../upload/';echo  $row['photo4'];echo'" alt="" width="210px" height="210px">'; echo '</div>'; } 
															else { echo ''; } ;
															?>
										
										
											
											<?php 
															if (!empty($row['photo2'])) {echo '<div class="item">'; echo '<img src="../upload/';echo  $row['photo2'];echo'" alt="" width="210px" height="210px">'; echo '</div>'; } 
															elseif (!empty($row['photo3']))  {echo '<div class="item">'; echo '<img src="../upload/';echo  $row['photo3'];echo'" alt="" width="210px" height="210px">'; echo '</div>'; } 
															elseif (!empty($row['photo4']))  {echo '<div class="item">'; echo '<img src="../upload/';echo  $row['photo4'];echo'" alt="" width="210px" height="210px">'; echo '</div>'; } 
															else { echo ''; } ;
															?>
										
											
											<?php 
															if (!empty($row['photo3']))  {echo '<div class="item">'; echo '<img src="../upload/';echo  $row['photo3'];echo'" alt="" width="210px" height="210px">'; echo '</div>'; } 
															elseif (!empty($row['photo4'])) {echo '<div class="item">'; echo '<img src="../upload/';echo  $row['photo4'];echo'" alt="" width="210px" height="210px">';echo '</div>'; } 
															else { echo ''; } ;
															?>
										
											
											<?php 
															if (!empty($row['photo4'])) {echo '<div class="item">'; echo '<img src="../upload/';echo  $row['photo4'];echo'" alt="" width="210px" height="210px">';echo '</div>'; } 															
															else { echo ''; } ;
															?>
										
									</div>
								
							
												</div>
												<div class="col-md-9">
												<div id="map" style="width:100%;height:400px;"></div> 
						    <input id="pac-input" class="controls" type="text" placeholder="Masukkan Nama Lokasi....">
												</div>
												</div>
											<div class="form-group">
												<label class="col-md-3 control-label" for="inputDefault">Nama Kos/Kontrakan</label>
												<div class="col-md-6">
													<textarea class="form-control" rows="1" readonly id="textareaAutosize" data-plugin-textarea-autosize><?php if(!empty($jenisnya)){ echo implode(" ",$jenisnya); }  ?> <?php echo $nama; ?></textarea>
												</div>
											</div>
											<div class="form-group">
												<label class="col-md-3 control-label" for="inputDefault">Nama Pemilik</label>
												<div class="col-md-6">
													<textarea class="form-control" rows="1" readonly id="textareaAutosize" data-plugin-textarea-autosize><?php echo $kode; ?></textarea>
												</div>
											</div>
											<div class="form-group">
												<label class="col-md-3 control-label" for="inputDefault">Alamat</label>
												<div class="col-md-6">
													<textarea class="form-control" rows="1" readonly id="textareaAutosize" data-plugin-textarea-autosize><?php echo $alamat; ?></textarea>
												</div>
											</div>
						
											<div class="form-group">
												<label class="col-md-3 control-label" for="inputDisabled">Harga</label>
												<div class="col-md-6">
													<textarea class="form-control" rows="1" readonly id="textareaAutosize" data-plugin-textarea-autosize>Rp <?php   echo number_format($row['harga'],0,'.','.') ;?> / <?php if($row['satuan'] == 01 ) { echo 'Hari';} 
																							  if($row['satuan'] == 02 ) { echo 'Minggu';}
																							  if($row['satuan'] == 03 ) { echo 'Bulan';}
																							  if($row['satuan'] == 04 ) { echo 'Tahun';}
																	?></textarea>
												</div>
											</div>
											<div class="form-group">
												<label class="col-md-3 control-label" for="inputDefault">Jenis</label>
												<div class="col-md-6">
													<textarea class="form-control" rows="1" readonly id="textareaAutosize" data-plugin-textarea-autosize><?php if(!empty($jenisnya)){ echo implode(", ",$jenisnya); }  ?></textarea>
												</div>
											</div>
											<div class="form-group">
												<label class="col-md-3 control-label" for="inputDefault">Kategori</label>
												<div class="col-md-6">
													<textarea class="form-control" rows="1" readonly id="textareaAutosize" data-plugin-textarea-autosize><?php if(!empty($kategorinya)){ echo implode(", ",$kategorinya); }  ?></textarea>
												</div>
											</div>
											<div class="form-group">
												<label class="col-md-3 control-label" for="inputDefault">Wilayah</label>
												<div class="col-md-6">
													<textarea class="form-control" rows="1" readonly id="textareaAutosize" data-plugin-textarea-autosize><?php if(!empty($wilayahnya)){ echo implode(", ",$wilayahnya); }  ?></textarea>
												</div>
											</div>
											<div class="form-group">
												<label class="col-md-3 control-label" for="inputDefault">Fasilitas</label>
												<div class="col-md-6">
													<textarea class="form-control" rows="1" readonly id="textareaAutosize" data-plugin-textarea-autosize><?php if(!empty($fasilitasnya)){ echo implode(", ",$fasilitasnya); }  ?></textarea>
												</div>
											</div>
											<div class="form-group">
												<label class="col-md-3 control-label" for="inputDefault">Deskripsi</label>
												<div class="col-md-6">
													<textarea class="form-control" rows="1" readonly id="textareaAutosize" data-plugin-textarea-autosize><?php echo $deskripsi; ?></textarea>
												</div>
											</div>
											
										</form>
									</div>
								</section>
						
								
								
						
							</div>
						</div>
						
						
					<!-- end: page -->
				</section>
			</div>

			
		</section>
		


		<!-- Vendor -->
		<script>
		var map;
        var marker;
        var markersArray = [];
			
		function initMap() {
		var latlng = new google.maps.LatLng(<?php if(!empty($lat)){ echo $lat; } else { echo "1.474087"; } 	?>, <?php if(!empty($lng)){ echo $lng; } else { echo "124.841948"; } 	?>);
                var mapOptions = {
                zoom: 15,
                center: latlng,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
		 
		map = new google.maps.Map(document.getElementById("map"), mapOptions);
		
		<?php if((!empty($lat)) && (!empty($lng))){echo ' tanda= new google.maps.Marker({ position: latlng, map: map,}) ';} ?>
				
        var input = document.getElementById('pac-input');

        var autocomplete = new google.maps.places.Autocomplete(
            input, {placeIdOnly: true});
        autocomplete.bindTo('bounds', map);

        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

        var infowindow = new google.maps.InfoWindow();
        var infowindowContent = document.getElementById('infowindow-content');
        infowindow.setContent(infowindowContent);
        var geocoder = new google.maps.Geocoder;
        var marker = new google.maps.Marker({
          map: map
        });
        

        autocomplete.addListener('place_changed', function() {
          infowindow.close();
          var place = autocomplete.getPlace();

          if (!place.place_id) {
            return;
          }
          geocoder.geocode({'placeId': place.place_id}, function(results, status) {

            if (status !== 'OK') {
              window.alert('Geocoder failed due to: ' + status);
              return;
            }
            map.setZoom(15);
            map.setCenter(results[0].geometry.location);   
				});
			});
		
		}
		google.maps.event.addDomListener(window, 'load', initMap);
		
	
		</script>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDwJ5Qre6H8qW2P5CgZlVOgImlSRKOeWOc&libraries=places&callback=initMap&sensor=false" async defer></script>
		<script src="assets/vendor/jquery/jquery.js" type="text/javascript"></script>
		<script src="assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js" type="text/javascript"></script>
		<script src="assets/vendor/bootstrap/js/bootstrap.js" type="text/javascript"></script>
		<script src="assets/vendor/nanoscroller/nanoscroller.js" type="text/javascript"></script>
		<script src="assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js" type="text/javascript"></script>
		<script src="assets/vendor/magnific-popup/magnific-popup.js" type="text/javascript"></script>
		<script src="assets/vendor/jquery-placeholder/jquery.placeholder.js" type="text/javascript"></script>
		
		<!-- Specific Page Vendor -->
		<script src="assets/vendor/owl-carousel/owl.carousel.js" type="text/javascript"></script>
		<script src="assets/vendor/jquery-autosize/jquery.autosize.js" type="text/javascript"></script>
		<script src="assets/vendor/bootstrap-fileupload/bootstrap-fileupload.min.js" type="text/javascript"></script>
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