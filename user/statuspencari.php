<?php include 'config.php';

// Initialize the session
session_start();
 
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: ../login.php");
  exit;
}

$username = ($_SESSION['username']);

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
                                    <img src="assets/img/logo/rumah.png" height="40px" alt="">
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
	
		<!-- shop area start -->
		
		<div class="breadcrumbs-area breadcrumb-bg ptb-100">
		    <div class="container">
		        <div class="breadcrumbs text-center">
                    <h2 class="breadcrumb-title">Status Pesanan</h2>
                  
                </div>
		    </div>
		</div>
		<!-- breadcrumbs area end -->
		<!-- shopping-cart-area start -->
        <div class="cart-area ptb-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <form action="#">
                            <div class="table-content table-responsive">
                                <table>
                                    <thead>
                                        <tr>
											<th class="product-price">No</th>
                                            <th class="product-price">Gambar</th>
                                            <th class="product-name">Nama Kos / Kontrakan</th>
                                            <th class="product-price">Harga</th>
											<th class="product-name">Jenis</th>
											<th class="product-name">Profil Penyedia</th>
											<th class="product-name">Keterangan</th>
                                            <th class="product-name">Hapus</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php	
					
										$sql= 'SELECT item.photo, item.nama, item.jenis, item.harga, item.satuan, pesanan.id_pesanan, pesanan.nama_penyedia, pesanan.status, pesanan.id_item FROM pesanan INNER JOIN item ON pesanan.id_item = item.id WHERE pesanan.nama_pemesan = "'.$username.'" ';	
					
										$result = mysqli_query($link, $sql);
										$no = 0 ;
										if(mysqli_num_rows($result) > 0){
										while($row = mysqli_fetch_array($result)){	
										?>
                                        <tr>
											<td class="product-price"><a><span class="amount"><?php $no++; echo $no; ?></span></a></td>
                                            <td class="product-thumbnail">
                                                <a href="<?php echo "lihatpesanan.php?user="; echo $username; echo "&role="; echo $role; echo "&id="; echo $row['id_item'];?>"><img src="../upload/<?php
															if (!empty($row['photo'])) { echo  $row['photo']; } 
															elseif (!empty($row['photo2'])) { echo  $row['photo2']; } 
															elseif (!empty($row['photo3'])) { echo  $row['photo3']; } 
															elseif (!empty($row['photo4'])) { echo  $row['photo4']; } 
															else { echo "rumah-default.jpg"; } ;
															?>" width="100px" height="100px" alt="" /></a>
                                            </td>
                                            <td class="product-name" title="<?php   echo  $row['nama'] ;?>"><a href="<?php echo "lihatpesanan.php?user="; echo $username; echo "&role="; echo $role; echo "&id="; echo $row['id_item'];?>"><?php   echo  $row['nama'] ;?></a></td>
                                            <td class="product-subtotal">Rp<?php   echo number_format($row['harga'],0,'.','.') ;?> / <?php if($row['satuan'] == 01 ) { echo 'Hari';} 
																							  if($row['satuan'] == 02 ) { echo 'Minggu';}
																							  if($row['satuan'] == 03 ) { echo 'Bulan';}
																							  if($row['satuan'] == 04 ) { echo 'Tahun';}
																	?></td>
                                            <td class="product-subtotal"><?php $jenis = explode(',',$row['jenis']);
																				if(in_array('11',$jenis)){echo 'Kos<br>';}
																				if(in_array('12',$jenis)){echo 'Kontrakan<br>';}
											?></td>
											<td class="product-name"><a href="<?php echo "lihatprofilpenyedia.php?user="; echo $username; echo "&role="; echo $role; echo "&profil="; echo $row['nama_penyedia'];?>"><?php   echo  $row['nama_penyedia'] ;?></a></td>
											<td class="product-subtotal"><?php  $status = ($row['status']);
																				if  ($status == 1 ){ echo 'Menunggu Konfirmasi'; }
																				if  ($status == 2 ){ echo 'Pesanan Ditolak'; }
																				if  ($status == 3 ){ echo 'Pesanan Diterima'; }
											
											?></td>
											<td class="product-remove" title="Hapus"><a href="#" data-toggle="modal" data-target="#hapuspesanan<?php echo $row['id_pesanan'];?>"><i class="fa fa-trash"></i></a></td>
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
																			<button type="button" onclick="location.href='<?php echo "statuspencari.php?user="; echo $username; echo "&role="; echo $role;?>';"> 
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
                                        </tr>
                                              	<?php                                                                                    										
												}
												mysqli_free_result($result); } else {echo '<tr><td class="product-subtotal" colspan="11">Tidak Ada Data</td></tr>';} ?>	
                                    </tbody>
                                </table>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
		
		<!-- shop area end -->
		
		<!-- shop area start -->
				
		<!-- shop area end -->
		<!-- blog area start -->
		
		<!-- blog area end -->
		<!-- subscribe area start -->
	
		<!-- subscribe area end -->
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
