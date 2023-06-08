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

// check if the form has been submitted
if (isset($_POST['submit'])) {

    // retrieve the form data
    $supplier_name = $_POST['supplier_name'];
    $contact_number = $_POST['contact_number'];
    $category_type = $_POST['category_type'];
    $email = $_POST['email'];
    $address = $_POST['address'];

    // insert the data into the database
    
    $sql="INSERT INTO supp ( supplier_name, contact_number, category_type, email, address)VALUES ('$supplier_name', '$contact_number', '$category_type', '$email', '$address')";
    
    $result = mysqli_query($conn, $sql);

    // check if the insertion was successful
    if ($result) {
        header('Location: sup.php');
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}


// Close database connection
mysqli_close($conn);

?>

<!DOCTYPE html>
<html>
<head>
    <title> Medical Store Management System</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>



<!-- add form H -->

<form action="" method="post" align ="center">
    <h1 >Medical Store -Add supplier</h1>
    
        <label for="supplier_name" align= "center">Supplier Name:</label>
    <input type="text" class="form-control" name="supplier_name" placeholder=" enter supplier name" required>
        
    </div><br>
    <div>
        <label for="contact_number">Contact Number:</label>
         <input type="text" class="form-control" name="contact_number" placeholder=" enter contact number" required>
    <div>
        <label for="category_type">Category Type:</label>
        <input type="text" class="form-control" name="category_type" placeholder=" enter medicine type" required>
    </div><br>
    <div>
        <label for="email">Email:</label>
      <input type="email" class="form-control" name="email" placeholder=" enter email" required>
    </div><br>
    <div>
        <label for="address">Address:</label>
         <input type="text" class="form-control" name="address" placeholder=" enter address" required>
    </div><br>
    <div>
        <button type="submit"class="btn btn-default" name="submit"> ADD</button>

    </div>
</form>
</body>
</html>
