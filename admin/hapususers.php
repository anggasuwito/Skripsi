<?php
include '../config.php';
// Process delete operation after confirmation
if((isset($_GET["user"])) && (!empty(trim($_GET["user"])))){
    // Include config file
	$user = trim($_GET["user"]);
    
    
    // Prepare a select statement
	$sql = "DELETE FROM users WHERE username = '".$user."'";
	$sqla = "DELETE FROM item WHERE kode = '".$user."'";
	$sqlb = "DELETE FROM pesanan WHERE nama_penyedia = '".$user."'";
	$sqlc = "DELETE FROM pesanan WHERE nama_pemesan = '".$user."'";
    
    if($stmt = mysqli_prepare($link, $sql)){
        mysqli_stmt_execute($stmt);      
    }
	if($stmta = mysqli_prepare($link, $sqla)){
        mysqli_stmt_execute($stmta);      
    }
	if($stmtb = mysqli_prepare($link, $sqlb)){
        mysqli_stmt_execute($stmtb);      
    }
	if($stmtc = mysqli_prepare($link, $sqlc)){
        mysqli_stmt_execute($stmtc);      
    }
	header('location: pengguna.php?status=sukses');
    exit();
    
     
  
    
    // Close connection
    mysqli_close($link);
}
?>