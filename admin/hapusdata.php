<?php
include '../config.php';
// Process delete operation after confirmation
if((isset($_GET["id"])) && (!empty(trim($_GET["id"])))){
    // Include config file
	$id = trim($_GET["id"]);
    
    
    // Prepare a select statement
	$sql = "DELETE FROM item WHERE id = '".$id."'";
	$sqla = "DELETE FROM pesanan WHERE id_item = '".$id."'";
    
    if($stmt = mysqli_prepare($link, $sql)){
        mysqli_stmt_execute($stmt);      
    }
	if($stmta = mysqli_prepare($link, $sqla)){
        mysqli_stmt_execute($stmta);      
    }
	header('location: data.php?status=sukses');
    exit();
    
     
  
    
    // Close connection
    mysqli_close($link);
}
if((isset($_GET["idkos"])) && (!empty(trim($_GET["idkos"])))){
    // Include config file
	$idkos = trim($_GET["idkos"]);
    
    
    // Prepare a select statement
	$sql = "DELETE FROM item WHERE id = '".$idkos."'";
	$sqla = "DELETE FROM pesanan WHERE id_item = '".$idkos."'";
    
    if($stmt = mysqli_prepare($link, $sql)){
        mysqli_stmt_execute($stmt);      
    }
	if($stmta = mysqli_prepare($link, $sqla)){
        mysqli_stmt_execute($stmta);      
    }
	header('location: datakos.php?status=sukses');
    exit();
    
     
  
    
    // Close connection
    mysqli_close($link);
}
if((isset($_GET["idkontrakan"])) && (!empty(trim($_GET["idkontrakan"])))){
    // Include config file
	$id = trim($_GET["idkontrakan"]);
    
    
    // Prepare a select statement
	$sql = "DELETE FROM item WHERE id = '".$idkontrakan."'";
	$sqla = "DELETE FROM pesanan WHERE id_item = '".$idkontrakan."'";
    
    if($stmt = mysqli_prepare($link, $sql)){
        mysqli_stmt_execute($stmt);      
    }
	if($stmta = mysqli_prepare($link, $sqla)){
        mysqli_stmt_execute($stmta);      
    }
	header('location: datakontrakan.php?status=sukses');
    exit();
    
     
  
    
    // Close connection
    mysqli_close($link);
}
?>