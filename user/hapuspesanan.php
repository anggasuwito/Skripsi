<?php


session_start();
 
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: ../login.php");
  exit;
}

$username = ($_SESSION['username']);

// Process delete operation after confirmation
if((isset($_GET["id"])) && (!empty(trim($_GET["id"])))){
    // Include config file
    require_once 'config.php';
	
	$role = $_GET['role'];
    
    // Prepare a select statement
	$sql = "DELETE FROM pesanan WHERE id_pesanan = ? AND nama_pemesan = '".$username."'";
    
    if($stmt = mysqli_prepare($link, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        
        // Set parameters
        $param_id = trim($_GET["id"]);
        
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            // Records deleted successfully. Redirect to landing page
            header('location: statuspencari.php?user='.$username.'&role='.$role.'');
            exit();
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
     
    // Close statement
    mysqli_stmt_close($stmt);
    
    // Close connection
    mysqli_close($link);
}
?>