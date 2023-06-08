<?php
//database configuration
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

// Get all supplierss from database
$query = "SELECT * FROM supp";
$result = mysqli_query($conn, $query);

// Close database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Medical Store Management System</title>
     <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="bootstrap/js/jquery.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="shortcut icon" href="images/icon.svg" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
</head>
<body>

    <h1 align = "center">Manage Suppliers</h1>
    <table>
        <tr>
            <tr>
            <th>Supplier ID</th>
            <th>Supplier Name</th>
            <th>Contact Number</th>
            <th>Category  Type</th>
            <th>Email</th>
            <th>Address</th>
            <th>Actions</th>
        </tr>
        
        

        <?php 
        while ($supplier= mysqli_fetch_assoc($result)) { 
              ?>
            <tr>
                <td><?php echo $supplier['supplier_id']; ?></td>
                <td><?php echo $supplier['supplier_name']; ?></td>
                <td><?php echo $supplier['contact_number']; ?></td>
                <td><?php echo $supplier['category_type']; ?></td>
                <td><?php echo $supplier['email']; ?></td>
                <td><?php echo $supplier['address']; ?></td>
                <td>
                    <a href="editsup.php?supplier_id=<?php echo $supplier['supplier_id']; ?>">Edit</a>
                    <a href="deletesup.php?supplier_id=<?php echo $supplier['supplier_id']; ?>">Delete</a>
                    <a href="addsup.php">Add </a> 
                </td>
            </tr>

    <?php 
    }
     ?>
    </table>
    
</body>
</html> 