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

$nama = $alamat = $harga = $satuan_harga = $deskripsi = $jenisnya = $jenis[] = $kategorinya = $kategori[] = $wilayahnya = $wilayah[] = $fasilitasnya= $fasilitas[] = $photo[] = $new_filename[] = "";
$nama_err = $alamat_err = $harga_err = $jenis_err = $photo_errors = $lat = $lng = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

	if(empty($_POST['role'])){
		$role_err = "Pilih salah satu";
	} else {
		$role = $_POST['role'];
	}

	// Validate Photo
	define( 'MAX_ALLOWED_FILE_SIZE', 32 * 1024 * 1024 ); // 5Mo
    define( 'UPLOAD_PATH', '../upload' );

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

    if( !empty( $_FILES['photo'] ) ){
        foreach ($_FILES['photo']['name'] as $key => $filename ) {
            if( $_FILES['photo']['error'][$key] == UPLOAD_ERR_OK ){

                if( $file_ext = is_allowed_file_ext( $filename ) ){
                    $new_filename[$key] = sprintf( '%d-%s.%s', round(microtime(true)), uniqid(), $file_ext );
                    if( $_FILES['photo']['size'][$key] <= MAX_ALLOWED_FILE_SIZE ){
                        // Everything is okay now, save the file
                        $dest_path[$key] = sprintf( '%s/%s', rtrim(UPLOAD_PATH,'/'), $new_filename[$key] );
                        move_uploaded_file( $_FILES['photo']['tmp_name'][$key], $dest_path[$key] );
						
                    }
                }else{
                    $photo_errors = $filename . ' Bukan Format yang Benar(jpg,jpeg,gif,png).';
                }
            }
        }

	if(empty($new_filename[0])){
	if(!empty($new_filename[1]))
		{ $new_filename[0] = $new_filename[1] ;
		  $new_filename[1] = "";}
	elseif(!empty($new_filename[2]))
		{ $new_filename[0] = $new_filename[2] ;
		  $new_filename[2] = "";}
	elseif(!empty($new_filename[3]))
		{ $new_filename[0] = $new_filename[3] ;
		  $new_filename[3] = "";}
	else{
	$new_filename[0] = "";
	}
	} 
	
	if(empty($new_filename[1])){
	if(!empty($new_filename[2]))
		{ $new_filename[1] = $new_filename[2] ;
		  $new_filename[2] = "";}
	elseif(!empty($new_filename[3]))
		{ $new_filename[1] = $new_filename[3] ;
		  $new_filename[3] = "";}
	else{
	$new_filename[1] = "";
	}
	}
	
	if(empty($new_filename[2])){
	if(!empty($new_filename[3]))
		{ $new_filename[2] = $new_filename[3] ;
		  $new_filename[3] = "";}
	else{
	$new_filename[2] = "";
	}
	}
	
	if(empty($new_filename[3])){
	$new_filename[3] = "";
	}	
	
    if($_FILES['photo']['size'][$key] > MAX_ALLOWED_FILE_SIZE) 
		{ $photo_errors = "Ukuran File Terlalu Besar.";
		}		
		} else {
		
	
	}
	$lat = trim($_POST["lat"]);
	$lng = trim($_POST["lng"]);
	
    // Validate nama
    $input_nama = trim($_POST["nama"]);
    if(empty($input_nama)){
        $nama_err = "Masukkan Nama Kos/Kontrakan.";
    } else{
        $nama = $input_nama;
    }
    
	
    // Validate alamat
    $input_alamat = trim($_POST["alamat"]);
    if(empty($input_alamat)){
        $alamat_err = 'Masukkan Alamat Lengkap.';     
    } else{
        $alamat = $input_alamat;
    }
    
    // Validate harga
    $input_harga = trim($_POST["harga"]);
    if(empty($input_harga)){
        $harga_err = "Masukkan Harga Per Hari,Minggu,Bulan, atau Tahun.";     
    } elseif(!ctype_digit($input_harga)){
        $harga_err = 'Masukkan Format yang Tepat, Hanya Angka.';
    } else{
        $harga = $input_harga;
    }
	
	// Validate satuan_harga
    $input_satuan_harga = trim($_POST["satuan_harga"]);
	$satuan_harga = $input_satuan_harga;
	
	// Validate deskripsi
    $input_deskripsi = trim($_POST["deskripsi"]);
	$deskripsi = $input_deskripsi;
	
	// Validate jenis
	if (!isset($_POST['jenis'])) {
	$jenisnya =  [];
	} else {
	$jenisnya = $_POST['jenis'];
	}
	$jenis = implode(",", $jenisnya);
	if(empty($jenis)){
        $jenis_err = "Centang Salah Satu Jenis.";
    }
	
	// Validate kategori
	if (!isset($_POST['kategori'])) {
	$kategorinya =  [];
	} else {
	$kategorinya = $_POST['kategori'];
	}
	$kategori = implode(",", $kategorinya);
	
	// Validate wilayah
	if (!isset($_POST['wilayah'])) {
	$wilayahnya =  [];
	} else {
	$wilayahnya = $_POST['wilayah'];
	}
	$wilayah = implode(",", $wilayahnya);

	// Validate jenis
	if (!isset($_POST['fasilitas'])) {
	$fasilitasnya =  [];
	} else {
	$fasilitasnya = $_POST['fasilitas'];
	}
	$fasilitas = implode(",", $fasilitasnya);
	
    $kode = ($_SESSION['username']) ;    
    // Check input errors before inserting in database
    if(empty($nama_err) && empty($alamat_err) && empty($harga_err) && empty($jenis_err) && empty($photo_errors)){
        // Prepare an insert statement
		
        $sql = "INSERT INTO item (nama, alamat, harga, satuan, deskripsi, jenis, kategori, wilayah, fasilitas, photo, photo2, photo3, photo4, kode, lat, lng) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
		
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssssssssssssss", $param_nama, $param_alamat, $param_harga, $param_satuan_harga, $deskripsi, $jenis, $kategori, $wilayah, $fasilitas, $new_filename[0], $new_filename[1], $new_filename[2], $new_filename[3], $kode, $lat, $lng);
            
            // Set parameters
            $param_nama = $nama;
            $param_alamat = $alamat;
            $param_harga = $harga;
			$param_satuan_harga = $satuan_harga;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
				
                header('location: status.php?user='.$username.'');
                exit();
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
			                    <a href="<?php echo "statuspenyedia.php?user="; echo $username; echo "&role="; echo $role; ?>">
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
                                               <li><a href="<?php echo "statuspenyedia.php?user="; echo $username; echo "&role="; echo $role; ?>"><i class="pe-7s-info"></i> Lihat Status</a></li>
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
                    <h2 class="breadcrumb-title">Tambah Data</h2>
                  
                </div>
		    </div>
		</div>
		
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data" method="post" id="tambah">
		<div class="shop-page-area ptb-100">
		    <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="blog-sidebar">
							<div class="single-sidebar blog-search-deff">
                                <h3>Kriteria</h3>
								<span class="required"><b><?php echo $jenis_err; ?></b> </span>
                            </div>
							<input type="hidden" name="role" value="<?php echo $role; ?>">
                            <div class="single-sidebar">
                                <h3 class="sidebar-title">Jenis</h3>
                                <div class="sidebar-list">
                                    <ul><?php if(empty($jenisnya)){ $jenisnya = []; } ?>
                                        <li><input type="checkbox"  name="jenis[]" value="11" <?php if(in_array('11',$jenisnya)){echo 'checked';}?> > <a> Kos </a> </li>
										<li><input type="checkbox"  name="jenis[]" value="12" <?php if(in_array('12',$jenisnya)){echo 'checked';}?> > <a> Kontrakan </a> </li>
										
									</ul>
                                </div>
                            </div>
                            <div class="single-sidebar">
                                <h3 class="sidebar-title">Kategori</h3>
                                <div class="sidebar-list">
                                    <ul><?php if(empty($kategorinya)){ $kategorinya = []; } ?>
										<li><input type="checkbox"  name="kategori[]" value="21" <?php if(in_array('21',$kategorinya)){echo 'checked';}?> > <a> Khusus Pria  </a> </li>
										<li><input type="checkbox"  name="kategori[]" value="22" <?php if(in_array('22',$kategorinya)){echo 'checked';}?> > <a> Khusus Wanita </a> </li>
										<li><input type="checkbox"  name="kategori[]" value="23" <?php if(in_array('23',$kategorinya)){echo 'checked';}?> > <a> Campuran </a> </li>
										<li><input type="checkbox"  name="kategori[]" value="24" <?php if(in_array('24',$kategorinya)){echo 'checked';}?> > <a> 2 Lantai </a> </li>
                                        <li><input type="checkbox"  name="kategori[]" value="25" <?php if(in_array('25',$kategorinya)){echo 'checked';}?> > <a> 3 Lantai </a> </li>
										<li><input type="checkbox"  name="kategori[]" value="26" <?php if(in_array('26',$kategorinya)){echo 'checked';}?> > <a> 4 Lantai atau Lebih </a> </li>
					                </ul>
                                </div>
                            </div>
                            <div class="single-sidebar">
                                <h3 class="sidebar-title">Wilayah</h3>
                                <div class="sidebar-list">
                                    <ul><?php if(empty($wilayahnya)){ $wilayahnya = []; } ?>
										<li><input type="checkbox"  name="wilayah[]" value="301" <?php if(in_array('301',$wilayahnya)){echo 'checked';}?> > <a> Kecamatan Bunaken </a> </li>
										<li><input type="checkbox"  name="wilayah[]" value="302" <?php if(in_array('302',$wilayahnya)){echo 'checked';}?>> <a> Kecamatan Bunaken Kepulauan </a> </li>
										<li><input type="checkbox"  name="wilayah[]" value="303" <?php if(in_array('303',$wilayahnya)){echo 'checked';}?> > <a> Kecamatan Malalayang </a> </li>
										<li><input type="checkbox"  name="wilayah[]" value="304" <?php if(in_array('304',$wilayahnya)){echo 'checked';}?> > <a> Kecamatan Paal Dua </a> </li>
										<li><input type="checkbox"  name="wilayah[]" value="305" <?php if(in_array('305',$wilayahnya)){echo 'checked';}?> > <a> Kecamatan Mapanget </a> </li>
										<li><input type="checkbox"  name="wilayah[]" value="306" <?php if(in_array('306',$wilayahnya)){echo 'checked';}?>> <a> Kecamatan Sario </a> </li>
										<li><input type="checkbox"  name="wilayah[]" value="307" <?php if(in_array('307',$wilayahnya)){echo 'checked';}?> > <a> Kecamatan Singkil </a> </li>
										<li><input type="checkbox"  name="wilayah[]" value="308" <?php if(in_array('308',$wilayahnya)){echo 'checked';}?> > <a> Kecamatan Tikala </a> </li>
										<li><input type="checkbox"  name="wilayah[]" value="309" <?php if(in_array('309',$wilayahnya)){echo 'checked';}?> > <a> Kecamatan Tuminting </a> </li>
										<li><input type="checkbox"  name="wilayah[]" value="310" <?php if(in_array('310',$wilayahnya)){echo 'checked';}?> > <a> Kecamatan Wanea </a> </li>
										<li><input type="checkbox"  name="wilayah[]" value="311" <?php if(in_array('311',$wilayahnya)){echo 'checked';}?> > <a> Kecamatan Wenang </a> </li>
                                    </ul>
                                </div>
                            </div>
							 <div class="single-sidebar">
                                <h3 class="sidebar-title">Fasilitas</h3>
                                <div class="sidebar-list">
                                    <ul><?php if(empty($fasilitasnya)){ $fasilitasnya = []; } ?>
                                        <li><input type="checkbox"  name="fasilitas[]" value="401" <?php if(in_array('401',$fasilitasnya)){echo 'checked';}?> > <a> AC </a> </li>
										<li><input type="checkbox"  name="fasilitas[]" value="402" <?php if(in_array('402',$fasilitasnya)){echo 'checked';}?> > <a> Kamar Mandi Dalam </a> </li>
										<li><input type="checkbox"  name="fasilitas[]" value="403" <?php if(in_array('403',$fasilitasnya)){echo 'checked';}?> > <a> Garasi Mobil </a> </li>
										<li><input type="checkbox"  name="fasilitas[]" value="404" <?php if(in_array('404',$fasilitasnya)){echo 'checked';}?> > <a> Garasi Motor </a> </li>
										<li><input type="checkbox"  name="fasilitas[]" value="405" <?php if(in_array('405',$fasilitasnya)){echo 'checked';}?> > <a> Meja </a> </li>
										<li><input type="checkbox"  name="fasilitas[]" value="406" <?php if(in_array('406',$fasilitasnya)){echo 'checked';}?> > <a> Kursi </a> </li>
										<li><input type="checkbox"  name="fasilitas[]" value="407" <?php if(in_array('407',$fasilitasnya)){echo 'checked';}?> > <a> Lemari </a> </li>
										<li><input type="checkbox"  name="fasilitas[]" value="408" <?php if(in_array('408',$fasilitasnya)){echo 'checked';}?> > <a> Kipas Angin </a> </li>
										<li><input type="checkbox"  name="fasilitas[]" value="409" <?php if(in_array('409',$fasilitasnya)){echo 'checked';}?> > <a> Tempat Tidur </a> </li>
										<li><input type="checkbox"  name="fasilitas[]" value="410" <?php if(in_array('410',$fasilitasnya)){echo 'checked';}?> > <a> Air PAM </a> </li>
										<li><input type="checkbox"  name="fasilitas[]" value="411" <?php if(in_array('411',$fasilitasnya)){echo 'checked';}?> > <a> Air Sumur </a> </li>
										<li><input type="checkbox"  name="fasilitas[]" value="412" <?php if(in_array('412',$fasilitasnya)){echo 'checked';}?> > <a> Listrik Prabayar </a> </li>
										<li><input type="checkbox"  name="fasilitas[]" value="413" <?php if(in_array('413',$fasilitasnya)){echo 'checked';}?> > <a> Listrik Pascabayar </a> </li>
										<li><input type="checkbox"  name="fasilitas[]" value="414" <?php if(in_array('414',$fasilitasnya)){echo 'checked';}?> > <a> Kolam Renang </a> </li>
										<li><input type="checkbox"  name="fasilitas[]" value="415" <?php if(in_array('415',$fasilitasnya)){echo 'checked';}?> > <a> Kolam Ikan </a> </li>
										<li><input type="checkbox"  name="fasilitas[]" value="416" <?php if(in_array('416',$fasilitasnya)){echo 'checked';}?> > <a> Ruang Tamu </a> </li>
                                    </ul>
                                </div>
                            </div>
                        
                       
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="billing-details-area">
		                    <h2>Form Pengisian Data</h2>
		                   
		                        <div class="row">
		                            <div class="col-md-12">
		                                <div class="billing-input">
		                                    <label>
                                                Nama Kos/Kontrakan
                                                <span class="required">*<b><?php echo $nama_err;?></b></span>
                                            </label>
                                            <input placeholder="" name="nama" type="text" value="<?php echo $nama; ?>">
		                                </div>
		                            </div>
		                            <div class="col-md-9">
                                        <div class="billing-input">
                                            <label>
                                                Harga
                                                <span class="required">*<b><?php echo $harga_err;?></b></span>
                                            </label>
                                            <input placeholder="" name="harga" type="text" value="<?php echo $harga; ?>">
                                        </div>
                                    </div>
									
									<div class="col-md-3">
                                        <div class="billing-input">
                                            <label>
                                               
                                                <span class="required"><br></span>
                                            </label>
                                            <select name="satuan_harga">
                                                <option value="01" <?php if($satuan_harga == 01){ echo "selected";}?>>/ Hari</option>
                                                <option value="02" <?php if($satuan_harga == 02){ echo "selected";}?>>/ Minggu</option>
                                                <option value="03" <?php if($satuan_harga == 03){ echo "selected";}?>>/ Bulan</option>
                                                <option value="04" <?php if($satuan_harga == 04){ echo "selected";}?>>/ Tahun</option>
                                          
                                            </select>
                                        </div>
                                    </div>
									<div class="col-md-12">
                                        <div class="billing-input">
                                            <label>
                                                Alamat
                                                <span class="required">*<b><?php echo $alamat_err;?></b></span>
                                            </label>
                                            <textarea id="checkout-mess" name="alamat" placeholder="Masukkan Alamat."><?php echo $alamat; ?></textarea>
                                        </div>
										<div class="billing-input">
                                         
                                          <div class="single-shipping-botton">
										  <input id="pac-input" class="controls" type="text" placeholder="Masukkan Nama Lokasi....">
										  <div id="map" style="width:100%;height:500px;"></div>
																					
										  </div>  
                                       </div>
									   <div class="billing-input">
		                                    <label>
                                                Latitude (Akan Terisi Sendiri Setelah Menandai Lokasi Pada Map)
                                            </label>
                                            <input placeholder="" name="lat" id="lat" type="text" readonly value="<?php echo $lat; ?>">
		                                </div>
										<div class="billing-input">
		                                    <label>
                                                Longitude (Akan Terisi Sendiri Setelah Menandai Lokasi Pada Map)
                                            </label>
                                            <input placeholder="" name="lng" id="lng" type="text" readonly value="<?php echo $lng; ?>">
		                                </div>
                                    </div>
									<div class="col-md-12">
                                        <div>
                                         <br>
                                                <span class="required"><b><?php echo $photo_errors; ?></b></span>
                                            
                                
										</div>
										
                                    </div>
									<div class="col-md-12">
                                        <div>
                                            <label>
                                                <br>Gambar 1
                                                <span class="required">*</span>
                                            </label>
											<br>
											<img id="output1" alt="Gambar 1..." height="150px" width="200px">
                                            <input placeholder="" onchange="loadFile1(event)" type="file" name="photo[]" multiple="multiple">
											<script>
											var loadFile1 = function(event) {
											var output1 = document.getElementById('output1');
											output1.src = URL.createObjectURL(event.target.files[0]);
											};
											</script>
										</div>
										
                                    </div>
									<div class="col-md-12">
                                        <div>
                                            <label>
                                                <br>Gambar 2
                                                <span class="required"></span>
                                            </label>
											<br>
											<img id="output2" alt="Gambar 2..." height="150px" width="200px">
                                            <input placeholder="" onchange="loadFile2(event)" type="file" name="photo[]" multiple="multiple">
											<script>
											var loadFile2 = function(event) {
											var output2 = document.getElementById('output2');
											output2.src = URL.createObjectURL(event.target.files[0]);
											};
											</script>
										</div>
										
                                    </div>
									<div class="col-md-12">
                                        <div>
                                            <label>
                                                <br>Gambar 3
                                                <span class="required"></span>
                                            </label>
											<br>
											<img id="output3" alt="Gambar 3..." height="150px" width="200px">
                                            <input placeholder="" onchange="loadFile3(event)" type="file" name="photo[]" multiple="multiple">
											<script>
											var loadFile3 = function(event) {
											var output3 = document.getElementById('output3');
											output3.src = URL.createObjectURL(event.target.files[0]);
											};
											</script>
										</div>
										
                                    </div>
									<div class="col-md-12">
                                        <div>
                                            <label>
                                                <br>Gambar 4
                                                <span class="required"></span>
                                            </label>
											<br>
											<img id="output4" alt="Gambar 4..." height="150px" width="200px">
                                            <input placeholder="" onchange="loadFile4(event)" type="file" name="photo[]" multiple="multiple">
											<script>
											var loadFile4 = function(event) {
											var output4 = document.getElementById('output4');
											output4.src = URL.createObjectURL(event.target.files[0]);
											};
											</script>
										</div>
										
                                    </div>
									
		                            <div class="col-md-12">
                                        <div class="billing-input">
                                            <label>
                                               <br> Deskripsi
                                               
                                            </label>
                                            <textarea id="checkout-mess" name="deskripsi" placeholder="Masukkan Deskripsi."><?php echo $deskripsi; ?></textarea>
                                        </div>
                                    </div>
									
                                </div>
								
		                    
		                </div>
                    </div>
                </div>
				
										<div class="single-shipping-botton">
                                            <br><button type="submit">
                                                <span>Simpan</span>
                                            </button>
											<br><button type="button" onclick="location.href='statuspenyedia.php?user=<?php echo $username; echo "&role="; echo $role;  ?>';">
                                                <a style="color:white">Kembali</a>
                                            </button>
										</div>
									
                               
                    
			</div>
			               
		</div>
		</form>
				
					
					
				
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
		
		google.maps.event.addListener(map, 'click', function(event) {
				
		if (marker) {
		marker.setMap(null);//code          
		}
		
		<?php if((!empty($lat)) && (!empty($lng))){echo ' if (tanda){ tanda.setMap(null);	} ';} ?>
		
		//adding marker
		document.getElementById('lat').value=event.latLng.lat();
		document.getElementById('lng').value=event.latLng.lng();
		marker= new google.maps.Marker({
		position: event.latLng,
		map: map,
		});
		map.panTo(event.latLng); 
		});
		

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
    mysqli_close($link); ?>