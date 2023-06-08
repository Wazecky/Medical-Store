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


// Check if form is submitted
if(isset($_POST['submit'])) {
  // Get input values from the form
   $date_sold=$_POST['date_sold'];
  $medicine_id = $_POST['medicine_id'];
  $quantity = $_POST['quantity'];
  $price = $_POST['price'];
  $total = $quantity * $price;

  // Check if the selected medicine is available in stock
  $check_stock = mysqli_query($conn, "SELECT * FROM medicines WHERE medicine_id = $medicine_id");
  $row = mysqli_fetch_assoc($check_stock);
  $current_stock = $row['quantity'];
  $new_stock = $current_stock - $quantity;
  if($new_stock < 0) {
    // If selected quantity is more than the available stock, show error message
    echo "Error: Selected quantity is more than the available stock.";
  } else {
    // Update the stock quantity in the database
    mysqli_query($conn, "UPDATE medicines SET quantity = $new_stock WHERE medicine_id = $medicine_id");

    // Insert the sales details into the sales table
    mysqli_query($conn, "INSERT INTO sales (date_sold,medicine_id,  quantity, price, total) VALUES ($date_sold, $medicine_id, $quantity, $price, $total)");

    // Show success message
        echo "Medicine sold successfully.";
    }
    // check if the insertion was successful
    if ($conn) {
        header('Location: medd.php');
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
  
}
// Close database connection
//mysqli_close($conn);

?>

<!DOCTYPE html>
<html>
<head>
  <title>Medical Store Management System - Sell Medicine</title>
</head>
<body>
  <h1>Sell Medicine</h1>
  <form method="post">
    <label for="date_sold">Date:</label>
    <input type="date" name="date_sold" id="date_sold" required><br><br>
    <label for="medicine_id">Medicine Name:</label>
    <select name="medicine_id" id="medicine_id">
      <?php
     // $medicine_id = $_GET['medicine_id'];
      // Fetch medicine list from the database

      $result = mysqli_query($conn, "SELECT * FROM medicines");
      while($row = mysqli_fetch_assoc($result)) {
        echo "<option value='" . $row['medicine_id'] . "'>" . $row['medicine_name'] . "</option>";
      }
      ?>
      
    </select><br><br>
    <label for="quantity">Quantity:</label>
    <input type="number" name="quantity" id="quantity" required><br><br>
    <label for="price">Price:</label>
    <select name="price" id="price">
      <?php
     // $medicine_id = $_GET['medicine_id'];
      // Fetch medicine list from the database

      $result = mysqli_query($conn, "SELECT * FROM medicines");
      while($row = mysqli_fetch_assoc($result)) {
        echo "<option value='" . $row['price'] . "'>" . $row['medicine_name'] . "</option>";
      }
      ?>
     </select><br><br>

    <input type="submit" name="submit" value="Sell">
  </form>
</body>
</html>
