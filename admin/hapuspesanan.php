<?php
include '../config.php';
// Process delete operation after confirmation
if((isset($_GET["idpesanan"])) && (!empty(trim($_GET["idpesanan"])))){
    // Include config file
	$idpesanan = trim($_GET["idpesanan"]);
    
    
    // Prepare a select statement
	$sql = "DELETE FROM pesanan WHERE id_pesanan = '".$idpesanan."'";
    
    if($stmt = mysqli_prepare($link, $sql)){
        mysqli_stmt_execute($stmt);      
    }
	header('location: pesanan.php?status=sukses');
    exit();
    
     
  
    
    // Close connection
    mysqli_close($link);
}
?>