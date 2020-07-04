<?php include 'config.php';


// Initialize the session
session_start();
 
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: ../login.php");
  exit;
}

$username = ($_SESSION['username']);

$status = ($_POST['status']);
$nama_pemesan = ($_POST['nama_pemesan']);
$nama_penyedia = ($_POST['nama_penyedia']);
$id_item = ($_POST["id_item"]);
$role = ($_POST['role']);

        // Prepare an insert statement
		
        $sql = "INSERT INTO pesanan (id_item, nama_pemesan, nama_penyedia, status) VALUES (?, ?, ?, ?)";
		
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssss", $id_item, $nama_pemesan, $nama_penyedia, $status);
           
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
			
                header('location: statuspencari.php?user='.$username.'&role='.$role.'');
                exit();
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    
    
    // Close connection
    mysqli_close($link);
  
			

 ?>