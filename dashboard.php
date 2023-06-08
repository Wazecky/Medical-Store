<?php
    // Start session
    //session_start();
    
    // Check if user is logged in
    //if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        //header("location: user-login.php");
        //exit;
    //}
    
    ////database configuration
$host ="localhost";
$username = "root";
$password = "";
$dbname = "medstore";
//create database connection

$conn = mysqli_connect($host,$username,$password,$dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

    
    // Get total number of medicines in stock
    $sql = "SELECT COUNT(*) FROM medicines";
    $result = mysqli_query($conn, $sql);
    $total_medicines = mysqli_fetch_array($result)[0];
    
    // Get total number of expired medicines
    $today = date('Y-m-d');
    $sql = "SELECT COUNT(*) FROM medicines WHERE expiry_date < '$today'";
    $result = mysqli_query($conn, $sql);
    $total_expired = mysqli_fetch_array($result)[0];
    
    // Get total number of low stock medicines
    $sql = "SELECT COUNT(*) FROM medicines WHERE quantity <= 5";
    $result = mysqli_query($conn, $sql);
    $total_low_stock = mysqli_fetch_array($result)[0];
    
    // Get total number of suppliers
    $sql = "SELECT COUNT(*) FROM supp";
    $result = mysqli_query($conn, $sql);
    $total_suppliers = mysqli_fetch_array($result)[0];
    
    // Close connection
    mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Medical Store Management System - Dashboard</title>
    
     <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
     <script src="bootstrap/js/jquery.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        
        <link rel="stylesheet" href="css/home.css">
</head>
<body>

        <h1 align="center">Dashboard-Home</h1><br>
    <div class="container-fluid">
      <div class="container">
        <div class="row col col-xs-8 col-sm-8 col-md-8 col-lg-8" >
         
        <div class="card">
        <a href="addmed.php" class="btn">Add New Medicine</a>
        </div><br>
        <div class="card">
        <a href="medd.php" class="btn">View Medicines</a>
        </div><br>
        <div class="card">
        <a href="sup.php" class="btn">View Suppliers</a>
        </div><br>
        <div class="card">
        <a href="sales.php" class="btn">Sell medicines</a>
        </div><br>
        <div class="card">
        <a href="salesreport.php" class="btn">Sales Reports</a>
        </div><br>
        <div class="card">
        <a href="logout.php" class="btn">Logout</a>
        </div><br>
       
            <div class="row">
          <div class="row col col-xs-8 col-sm-8 col-md-8 col-lg-8">

               <div class="card">
                <h3 >Total Medicines</h3>
                <p align="center" ><?php echo $total_medicines; ?></p>
            </div><br><br>
            <div class="card">
                <h3 >Expired Medicines</h3>
                <p align="center" ><?php echo $total_expired; ?></p>
            </div><br>
            <div class="card">
                <h3 >Low Stock Medicines</h3>
                <p align="center"><?php echo $total_low_stock; ?></p>
            </div><br>
            <div class="card">
                <h3 >Total Suppliers</h3>
                <p align="center"><?php echo $total_suppliers; ?></p>
            </div><br>
        </div>
        <br>
        
    </div>
</body>
</html>

