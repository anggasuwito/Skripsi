<?php 
include 'config.php';

// Initialize the session
session_start();
 
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: ../login.php");
  exit;
}

$username = ($_SESSION['username']);

					if (!isset($_GET['cari'])) {
					$cari = "";
					} else {
					$cari = $_GET['cari'];
					}
								
					if (!isset($_GET['urut'])) {
					$urut =  "" ;
					} else {
					$urut = $_GET['urut'];
					}
													
					if (!isset($_GET['jenis'])) {
					$jenis =  [] ;
					} else {
					$jenis = $_GET['jenis'];
					}
															
					if (!isset($_GET['kategori'])) {
					$kategori =  [] ;
					} else {
					$kategori = $_GET['kategori'];
					}
																	
					if (!isset($_GET['wilayah'])) {
					$wilayah =  [];
					} else {
					$wilayah = $_GET['wilayah'];
					}

					if (!isset($_GET['fasilitas'])) {
					$fasilitas =  [];
					} else {
					$fasilitas = $_GET['fasilitas'];
					}

					if($urut == 0){ $urutkan = "id DESC"; };
					if($urut == 1){ $urutkan = "harga ASC"; };
					if($urut == 2){ $urutkan = "harga DESC"; };
					
					if(empty($jenis[0])){
					$jenis[0] = "";}
					if(empty($jenis[1])){
					$jenis[1] = "A";}
					
					if(empty($kategori[0])){
					$kategori[0] = "";}
					if(empty($kategori[1])){
					$kategori[1] = "A";}
					if(empty($kategori[2])){
					$kategori[2] = "A";}
					if(empty($kategori[3])){
					$kategori[3] = "A";}
					if(empty($kategori[4])){
					$kategori[4] = "A";}
					if(empty($kategori[5])){
					$kategori[5] = "A";}

					if(empty($wilayah[0])){
					$wilayah[0] = "";}
					if(empty($wilayah[1])){
					$wilayah[1] = "A";}
					if(empty($wilayah[2])){
					$wilayah[2] = "A";}
					if(empty($wilayah[3])){
					$wilayah[3] = "A";}
					if(empty($wilayah[4])){
					$wilayah[4] = "A";}
					if(empty($wilayah[5])){
					$wilayah[5] = "A";}
					if(empty($wilayah[6])){
					$wilayah[6] = "A";}
					if(empty($wilayah[7])){
					$wilayah[7] = "A";}
					if(empty($wilayah[8])){
					$wilayah[8] = "A";}
					if(empty($wilayah[9])){
					$wilayah[9] = "A";}
					if(empty($wilayah[10])){
					$wilayah[10] = "A";}
					
					if(empty($fasilitas[0])){
					$fasilitas[0] = "";}
					if(empty($fasilitas[1])){
					$fasilitas[1] = "";}
					if(empty($fasilitas[2])){
					$fasilitas[2] = "";}
					if(empty($fasilitas[3])){
					$fasilitas[3] = "";}
					if(empty($fasilitas[4])){
					$fasilitas[4] = "";}
					if(empty($fasilitas[5])){
					$fasilitas[5] = "";}
					if(empty($fasilitas[6])){
					$fasilitas[6] = "";}
					if(empty($fasilitas[7])){
					$fasilitas[7] = "";}
					if(empty($fasilitas[8])){
					$fasilitas[8] = "";}
					if(empty($fasilitas[9])){
					$fasilitas[9] = "";}
					if(empty($fasilitas[10])){
					$fasilitas[10] = "";}
					if(empty($fasilitas[11])){
					$fasilitas[11] = "";}
					if(empty($fasilitas[12])){
					$fasilitas[12] = "";}
					if(empty($fasilitas[13])){
					$fasilitas[13] = "";}
					if(empty($fasilitas[14])){
					$fasilitas[14] = "";}
					if(empty($fasilitas[15])){
					$fasilitas[15] = "";}
					
if(empty($_GET['role'])){ $role = '' ;} else { $role = $_GET['role']; }

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
			                    <a href="<?php echo "index.php?user="; echo $username; echo "&role="; echo $role; ?>">
                                    <img src="assets/img/logo/rumah.png" height="50px" alt="">
                                </a>
			                </div>
			            </div>
			            <div class="col-md-8 col-sm-9 col-xs-6">
			                <div class="cart-menu">
                                
                                <div class="user user-style-3 f-right">
						            <a>
									
                                       <?php echo "Hi, ";echo $username; echo " anda masuk sebagai "; echo $role; 
									   $sqlz = 'SELECT * FROM users WHERE username LIKE "'.$username.'"';
									   $resultz = mysqli_query($link, $sqlz);
									   $rowz = mysqli_fetch_array($resultz);
									   ?> 
									   
									   <img src="../uploadfotoprofil/<?php if(empty($rowz['fotoprofil'])) { echo "default.jpg";} else { echo $rowz['fotoprofil']; }?>" height="40px" width="40px" alt="">
									   
                                    </a>
                                    <div class="currence-user-page">
                                        <div class="user-page">
                                            <ul>
                                               <li><a href="<?php echo "profil.php?user="; echo $username; echo "&role="; echo $role; ?>"><i class="pe-7s-user"></i> Profil</a></li>
                                               <li><a href="<?php echo "statuspencari.php?user="; echo $username; echo "&role="; echo $role; ?>"><i class="pe-7s-info"></i> Lihat Status</a></li>
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
		<!-- mobile-menu-area start -->
        
        <!-- mobile-menu-area end -->
		<!-- slider start -->
		<section class="slider-area">
			<div class="bend niceties preview-2">
				<div id="ensign-nivoslider" class="slides">	
					<img src="assets/img/slider/background.jpg" alt="" title="#slider-direction-1"  />
				</div>
				<!-- direction 1 -->
				<div id="slider-direction-1" class="t-cn slider-direction">
				    <div class="container">
				        <div class="slider-content t-lfl s-tb slider-1">
                            <div class="title-container s-tb-c title-compress">
                                <h1 class="title1">Selamat datang</h1>
                                <h3 class="title2">Website ini bertujuan untuk <br>mempermudah bagi kalian yang <br>ingin mencari tempat kos <br> atau rumah kontrakan <br>yang ada di manado</h3>
                             
                            </div>
                        </div>
				    </div>
				</div>
				<!-- direction 2 -->
			</div>
		</section>
		<!-- slider end -->
		<!-- service area start  -->
		
		<!-- service area end -->
		<!-- banner style 2 start -->
		
		<!-- banner style 2 end -->
		<!-- shop area start -->
		<form id="filter" >
		<input type ="hidden" name="role" value="<?php echo $role; ?>">
		<div class="shop-page-area ptb-100" >
		    <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="blog-sidebar">
							<div class="single-sidebar blog-search-deff">
                                <h3 class="sidebar-title">Cari</h3>
								<div class="sidebar-list">
                               <ul>
                                        <li><input value="<?php echo $cari; ?>" placeholder="Cari" type="text" name="cari"><button onclick="carii()" class="fa fa-search"></button><a> </a> </li>
                                    
                                    </ul>
							   </div>
                            </div>
							
                            <div class="single-sidebar">
                                <h3 class="sidebar-title">Jenis</h3>
                                <div class="sidebar-list">
                                    <ul>
                                        <li><input type="checkbox" onclick="jeniss();" name="jenis[]" value="11" <?php if (in_array("11",$jenis))  { echo "checked"; } ?> > <a> Kos </a> </li>
										<li><input type="checkbox" onclick="jeniss();" name="jenis[]" value="12" <?php if (in_array("12",$jenis))  { echo "checked"; } ?> > <a> Kontrakan </a> </li>
										
									</ul>
                                </div>
                            </div>
                            <div class="single-sidebar">
                                <h3 class="sidebar-title">Kategori</h3>
                                <div class="sidebar-list">
                                    <ul>
										<li><input type="checkbox" onclick="kategorii();" name="kategori[]" value="21" <?php if (in_array("21",$kategori))  { echo "checked"; } ?> > <a> Khusus Pria  </a> </li>
										<li><input type="checkbox" onclick="kategorii();" name="kategori[]" value="22" <?php if (in_array("22",$kategori))  { echo "checked"; } ?> > <a> Khusus Wanita </a> </li>
										<li><input type="checkbox" onclick="kategorii();" name="kategori[]" value="23" <?php if (in_array("23",$kategori))  { echo "checked"; } ?> > <a> Campuran </a> </li>
										<li><input type="checkbox" onclick="kategorii();" name="kategori[]" value="24" <?php if (in_array("24",$kategori))  { echo "checked"; } ?> > <a> 2 Lantai </a> </li>
                                        <li><input type="checkbox" onclick="kategorii();" name="kategori[]" value="25" <?php if (in_array("25",$kategori))  { echo "checked"; } ?> > <a> 3 Lantai </a> </li>
										<li><input type="checkbox" onclick="kategorii();" name="kategori[]" value="26" <?php if (in_array("26",$kategori))  { echo "checked"; } ?> > <a> 4 Lantai atau Lebih </a> </li>
					                </ul>
                                </div>
                            </div>
                            <div class="single-sidebar">
                                <h3 class="sidebar-title">Wilayah</h3>
                                <div class="sidebar-list">
                                    <ul>
										<li><input type="checkbox" onclick="wilayahh();" name="wilayah[]" value="301" <?php if (in_array("301",$wilayah))  { echo "checked"; } ?> > <a> Kecamatan Bunaken </a> </li>
										<li><input type="checkbox" onclick="wilayahh();" name="wilayah[]" value="302" <?php if (in_array("302",$wilayah))  { echo "checked"; } ?> > <a> Kecamatan Bunaken Kepulauan </a> </li>
										<li><input type="checkbox" onclick="wilayahh();" name="wilayah[]" value="303" <?php if (in_array("303",$wilayah))  { echo "checked"; } ?> > <a> Kecamatan Malalayang </a> </li>
										<li><input type="checkbox" onclick="wilayahh();" name="wilayah[]" value="304" <?php if (in_array("304",$wilayah))  { echo "checked"; } ?> > <a> Kecamatan Paal Dua </a> </li>
										<li><input type="checkbox" onclick="wilayahh();" name="wilayah[]" value="305" <?php if (in_array("305",$wilayah))  { echo "checked"; } ?> > <a> Kecamatan Mapanget </a> </li>
										<li><input type="checkbox" onclick="wilayahh();" name="wilayah[]" value="306" <?php if (in_array("306",$wilayah))  { echo "checked"; } ?> > <a> Kecamatan Sario </a> </li>
										<li><input type="checkbox" onclick="wilayahh();" name="wilayah[]" value="307" <?php if (in_array("307",$wilayah))  { echo "checked"; } ?> > <a> Kecamatan Singkil </a> </li>
										<li><input type="checkbox" onclick="wilayahh();" name="wilayah[]" value="308" <?php if (in_array("308",$wilayah))  { echo "checked"; } ?> > <a> Kecamatan Tikala </a> </li>
										<li><input type="checkbox" onclick="wilayahh();" name="wilayah[]" value="309" <?php if (in_array("309",$wilayah))  { echo "checked"; } ?> > <a> Kecamatan Tuminting </a> </li>
										<li><input type="checkbox" onclick="wilayahh();" name="wilayah[]" value="310" <?php if (in_array("310",$wilayah))  { echo "checked"; } ?> > <a> Kecamatan Wanea </a> </li>
										<li><input type="checkbox" onclick="wilayahh();" name="wilayah[]" value="311" <?php if (in_array("311",$wilayah))  { echo "checked"; } ?> > <a> Kecamatan Wenang </a> </li>
                                    </ul>
                                </div>
                            </div>
							 <div class="single-sidebar">
                                <h3 class="sidebar-title">Fasilitas</h3>
                                <div class="sidebar-list">
                                    <ul>
                                        <li><input type="checkbox" onclick="fasilitass();" name="fasilitas[]" value="401" <?php if (in_array("401",$fasilitas))  { echo "checked"; } ?> > <a> AC </a> </li>
										<li><input type="checkbox" onclick="fasilitass();" name="fasilitas[]" value="402" <?php if (in_array("402",$fasilitas))  { echo "checked"; } ?> > <a> Kamar Mandi Dalam </a> </li>
										<li><input type="checkbox" onclick="fasilitass();" name="fasilitas[]" value="403" <?php if (in_array("403",$fasilitas))  { echo "checked"; } ?> > <a> Garasi Mobil </a> </li>
										<li><input type="checkbox" onclick="fasilitass();" name="fasilitas[]" value="404" <?php if (in_array("404",$fasilitas))  { echo "checked"; } ?> > <a> Garasi Motor </a> </li>
										<li><input type="checkbox" onclick="fasilitass();" name="fasilitas[]" value="405" <?php if (in_array("405",$fasilitas))  { echo "checked"; } ?> > <a> Meja </a> </li>
										<li><input type="checkbox" onclick="fasilitass();" name="fasilitas[]" value="406" <?php if (in_array("406",$fasilitas))  { echo "checked"; } ?> > <a> Kursi </a> </li>
										<li><input type="checkbox" onclick="fasilitass();" name="fasilitas[]" value="407" <?php if (in_array("407",$fasilitas))  { echo "checked"; } ?> > <a> Lemari </a> </li>
										<li><input type="checkbox" onclick="fasilitass();" name="fasilitas[]" value="408" <?php if (in_array("408",$fasilitas))  { echo "checked"; } ?> > <a> Kipas Angin </a> </li>
										<li><input type="checkbox" onclick="fasilitass();" name="fasilitas[]" value="409" <?php if (in_array("409",$fasilitas))  { echo "checked"; } ?> > <a> Tempat Tidur </a> </li>
										<li><input type="checkbox" onclick="fasilitass();" name="fasilitas[]" value="410" <?php if (in_array("410",$fasilitas))  { echo "checked"; } ?> > <a> Air PAM </a> </li>
										<li><input type="checkbox" onclick="fasilitass();" name="fasilitas[]" value="411" <?php if (in_array("411",$fasilitas))  { echo "checked"; } ?> > <a> Air Sumur </a> </li>
										<li><input type="checkbox" onclick="fasilitass();" name="fasilitas[]" value="412" <?php if (in_array("412",$fasilitas))  { echo "checked"; } ?> > <a> Listrik Prabayar </a> </li>
										<li><input type="checkbox" onclick="fasilitass();" name="fasilitas[]" value="413" <?php if (in_array("413",$fasilitas))  { echo "checked"; } ?> > <a> Listrik Pascabayar </a> </li>
										<li><input type="checkbox" onclick="fasilitass();" name="fasilitas[]" value="414" <?php if (in_array("414",$fasilitas))  { echo "checked"; } ?> > <a> Kolam Renang </a> </li>
										<li><input type="checkbox" onclick="fasilitass();" name="fasilitas[]" value="415" <?php if (in_array("415",$fasilitas))  { echo "checked"; } ?> > <a> Kolam Ikan </a> </li>
										<li><input type="checkbox" onclick="fasilitass();" name="fasilitas[]" value="416" <?php if (in_array("416",$fasilitas))  { echo "checked"; } ?> > <a> Ruang Tamu </a> </li>
                                    </ul>
                                </div>
                            </div>
                        
                       
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="blog-wrapper shop-page-mrg">
					   
                            <div class="tab-menu-product">
							
                                <div class="tab-menu-sort">
                                    
									<div class="tab-sort">
                                        <label>Urut Berdasarkan : </label>
                                        <select name="urut" onchange="urutt()">
											<option style="display:none;" value="0" name="urut" <?php if ($urut == 0)  { echo "selected"; } ?> >------Pilih Disini------</option>
                                            <option value="1" name="urut" <?php if ($urut == 1)  { echo "selected"; } ?>>Harga Terendah</option>
                                            <option value="2" name="urut" <?php if ($urut == 2)  { echo "selected"; } ?>>Harga Tertinggi</option>
                                          
                                        </select>
                                    </div>
                                  
                                </div>
								
                                <div class="tab-product" id="txtHint">
								
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="grid"> 
                                            <div class="row">
											
											<!-- PHP ITEM -->
											<?php  // Attempt select query execution                                                  
											
					
					
					if (!isset($_GET['page'])) {
					$page = 1;
					} else {
					$page = $_GET['page'];
					}
					
					if(isset($_REQUEST))
                    {
                    unset($_REQUEST['page']);
                    $querystring = http_build_query($_REQUEST);
                    }
										
					$results_per_page = 15;
                    $sql = 'SELECT * FROM item ';
					$result = mysqli_query($link, $sql);
					$number_of_results = mysqli_num_rows($result);
					$number_of_pages = ceil($number_of_results/$results_per_page);
					$first_page = ($number_of_results/$number_of_results);
					$last_page = $number_of_pages;
					$this_page_first_result = ($page-1)*$results_per_page;		
					$previous = ($page-1);
					$next = ($page+1);
					
					$sql= 'SELECT * FROM item WHERE nama LIKE "'.$cari.'%" AND (jenis LIKE "%'.$jenis[0].'%" OR jenis LIKE "%'.$jenis[1].'%") AND (kategori LIKE "%'.$kategori[0].'%" OR kategori LIKE "%'.$kategori[1].'%" OR kategori LIKE "%'.$kategori[2].'%" OR kategori LIKE "%'.$kategori[3].'%" OR kategori LIKE "%'.$kategori[4].'%" OR kategori LIKE "%'.$kategori[5].'%") AND (wilayah LIKE "%'.$wilayah[0].'%" OR wilayah LIKE "%'.$wilayah[1].'%" OR wilayah LIKE "%'.$wilayah[2].'%" OR wilayah LIKE "%'.$wilayah[3].'%" OR wilayah LIKE "%'.$wilayah[4].'%" OR wilayah LIKE "%'.$wilayah[5].'%" OR wilayah LIKE "%'.$wilayah[6].'%" OR wilayah LIKE "%'.$wilayah[7].'%" OR wilayah LIKE "%'.$wilayah[8].'%" OR wilayah LIKE "%'.$wilayah[9].'%" OR wilayah LIKE "%'.$wilayah[10].'%") AND (fasilitas LIKE "%'.$fasilitas[0].'%" AND fasilitas LIKE "%'.$fasilitas[1].'%" AND fasilitas LIKE "%'.$fasilitas[2].'%" AND fasilitas LIKE "%'.$fasilitas[3].'%" AND fasilitas LIKE "%'.$fasilitas[4].'%" AND fasilitas LIKE "%'.$fasilitas[5].'%" AND fasilitas LIKE "%'.$fasilitas[6].'%" AND fasilitas LIKE "%'.$fasilitas[7].'%" AND fasilitas LIKE "%'.$fasilitas[8].'%" AND fasilitas LIKE "%'.$fasilitas[9].'%" AND fasilitas LIKE "%'.$fasilitas[10].'%" AND fasilitas LIKE "%'.$fasilitas[11].'%" AND fasilitas LIKE "%'.$fasilitas[12].'%" AND fasilitas LIKE "%'.$fasilitas[13].'%" AND fasilitas LIKE "%'.$fasilitas[14].'%" AND fasilitas LIKE "%'.$fasilitas[15].'%") ORDER BY '.$urutkan.' LIMIT '.$this_page_first_result.','.$results_per_page;	
					
                    $result = mysqli_query($link, $sql);
                    if(mysqli_num_rows($result) > 0){
					while($row = mysqli_fetch_array($result)){
					$row['id'];
					
											?>
                                                <div class="col-md-6 col-lg-4 col-sm-6">
                                                    <div class="single-shop mb-40">
                                                        <div class="shop-img">
                                                            <a href="<?php echo "readpencari.php?user="; echo $username; echo "&role="; echo $role; echo "&id="; echo $row['id']; ?>"><img src="../upload/<?php
															if (!empty($row['photo'])) { echo  $row['photo']; } 
															elseif (!empty($row['photo2'])) { echo  $row['photo2']; } 
															elseif (!empty($row['photo3'])) { echo  $row['photo3']; } 
															elseif (!empty($row['photo4'])) { echo  $row['photo4']; } 
															else { echo "rumah-default.jpg"; } ;
															?>" width="100px" height="200px" alt="" /></a>

                                                            
                                                        </div>
                                                        <div class="shop-text-all">
                                                            <div class="title-color fix" style="white-space: nowrap">
                                                                <div class="shop-title" title="<?php if($row['jenis'] == 11 ) { echo 'Kos';} 
																							  if($row['jenis'] == 12 ) { echo 'Kontrakan';}
																								?> <?php   echo  $row['nama'] ;?>">
                                                                    <h3><a href="<?php echo "readpencari.php?user="; echo $username; echo "&role="; echo $role;  echo "&id="; echo $row['id']; ?>"><?php if($row['jenis'] == 11 ) { echo 'Kos';} 
																							  if($row['jenis'] == 12 ) { echo 'Kontrakan';}
																								?> <?php   echo  $row['nama'] ;?></a></h3>
                                                                </div>
                                                                
                                                            </div>
                                                            <div class="price-ratting fix">
                                                                <span class="price f-left">
                                                                    <span class="new">Rp <?php   echo number_format($row['harga'],0,'.','.') ;?></span>
                                                            
                                                                </span>
                                                                <span class="price f-right">
                                                                    <span class="new">/ <?php if($row['satuan'] == 01 ) { echo 'Hari';} 
																							  if($row['satuan'] == 02 ) { echo 'Minggu';}
																							  if($row['satuan'] == 03 ) { echo 'Bulan';}
																							  if($row['satuan'] == 04 ) { echo 'Tahun';}
																	?></span>
                                                            
                                                                </span>
                                                            </div>
                                                        </div>									
                                                    </div >
                                                </div >
												<!--END PHP ITEM-->
												<?php                                                                                    										
												}
												mysqli_free_result($result);
												} else {echo '<div class="col-md-6 col-lg-4 col-sm-6">Tidak Ada Data</div>';}
												?>										                                    
                                            </div>
                                        </div>
								        <div class="page-pagination text-center" name="page">
                                            <ul>
												<li><?php if($page == $first_page){ echo '';	} else { echo '<a href="index.php?'.$querystring.'&page=' . $previous . '"><i class="fa fa-angle-left"></i></a> '; }; ?></li>
												<li><?php if($page == $first_page){ echo '';	} else { echo '<a href="index.php?'.$querystring.'&page=' . $first_page . '">'.($first_page).'</a> '; }; ?>	</li>
												<li><?php if(($page-2)>$first_page){ echo '<a href="index.php?'.$querystring.'&page=' . ($page-2) . '">'. ($page-2) .'</a> '; } ?></li>
                                                <li><?php if(($page-1)>$first_page){ echo '<a href="index.php?'.$querystring.'&page=' . ($page-1) . '">'. ($page-1) .'</a> '; } ?></li>
												<li><?php if($page){ if($page<($page-1)) { echo '<a class="active" href="index.php?'.$querystring.'&page=' . ($page) . '">'. ($page) .'</a> ';	} if($page<($page+1)){ echo '<a class="active" href="index.php?page=' . ($page) . '">'. ($page) .'</a> ';} } ?>	</li>
                                                <li><?php if(($page+1)<$last_page){ echo '<a href="index.php?'.$querystring.'&page=' . ($page+1) . '">'. ($page+1) .'</a> '; } ?></li>
                                                <li><?php if(($page+2)<$last_page){ echo '<a href="index.php?'.$querystring.'&page=' . ($page+2) . '">'. ($page+2) .'</a> '; } ?>	</li>
                                              	<li><?php if($page == $last_page){ echo '';	} else { echo '<a href="index.php?'.$querystring.'&page=' . $last_page . '">'.($last_page).'</a> '; }; ?>	</li>	</li>
												<li><?php if($page == $last_page){ echo '';	} else { echo '<a href="index.php?'.$querystring.'&page=' . $next . '"><i class="fa fa-angle-right"></i></a> '; }; ?></li>
                                                
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
		    </div>
		</div>
		</form>
		<!-- shop area end -->
		
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
			function jeniss(){
			document.getElementById('filter').submit();	
			}
			function kategorii(){
			document.getElementById('filter').submit();	
			}
			function wilayahh(){
			document.getElementById('filter').submit();	
			}
			function urutt(){
			document.getElementById('filter').submit();	
			}
			function carii(){
			document.getElementById('filter').submit();	
			}
			function fasilitass(){
			document.getElementById('filter').submit();	
			}
		</script>
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

<?php mysqli_close($link);?>
