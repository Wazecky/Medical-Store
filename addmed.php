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
    $medicine_name = $_POST['medicine_name'];
    $medicine_type = $_POST['medicine_type'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $expiry_date = $_POST['expiry_date'];

    // insert the data into the database
    
    $sql="INSERT INTO medicines ( medicine_name, medicine_type, quantity, price, expiry_date)VALUES ('$medicine_name', '$medicine_type',  '$quantity', '$price', '$expiry_date')";
    
    $result = mysqli_query($conn, $sql);

    // check if the insertion was successful
    if ($result) {
        header('Location: medd.php');
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
    <h1 >Medical Store -Add Medicine</h1>
    <div class="main-login col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
        <label for="medicine_name" align= "center">Medicine Name:</label>
        <input type="text" class="form-control" name="medicine_name" placeholder="please enter medicine name" required>
    </div><br>
    <div>
        <label for="medicine_type">Medicine Type:</label>
        <input type="text" class="form-control" name="medicine_type" placeholder="please enter medicine type" required>
    </div><br>
    
    <div>
        <label for="quantity">Quantity:</label>
        <input type="text" class="form-control" name="quantity" placeholder="please enter quantity" required>
    </div><br>
    <div>
        <label for="price">Price:</label>
       <input type="text" class="form-control" name="price" placeholder="please enter price" required>
    </div><br>
    <div>
        <label for="expiry_date">Expiry Date:</label>
        <input type="date" class="form-control" name="expiry_date" placeholder="please input expiry date" required>
    </div><br>
    <div>
       
        <button type="submit"class="btn btn-default" name="submit"> ADD </button>

    </div>
</form>
</body>
</html>
