<?php
  // include database connection file
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

  // check if form has been submitted
  if(isset($_POST['submit'])){
    // retrieve form data
 $medicine_id = $_POST['medicine_id'];
  $medicine_name = $_POST['medicine_name'];
  $medicine_type = $_POST['medicine_type'];
  $quantity = $_POST['quantity'];
  $price = $_POST['price'];
  $expiry_date = $_POST['expiry_date'];

 // update medicines in database
   $sql = "UPDATE `medicines` SET medicine_id='$medicine_id',medicine_name='$medicine_name',medicine_type='$medicine_type',quantity='$quantity',price='$price',expiry_date='$expiry_date' WHERE medicine_id=$medicine_id";
   
    if(mysqli_query($conn, $sql)){
      // redirect to manage drugs page if update successful
      header('Location: medd.php?medicine_id=' . $medicine_id);
      exit;
    } else {
      echo "Error updating medicines: " . mysqli_error($conn);
    }
  } else {
    // retrieve drugs data from database
$medicine_id = $_GET['medicine_id'];
//$sql="SELECT `medicine_id`, `medicine_name`, `medicine_type`, `quantity`, `price`, `expiry_date` FROM `medicines` WHERE me";
    $sql = "SELECT * FROM `medicines` WHERE medicine_id=$medicine_id";
    $result = mysqli_query($conn, $sql);
    $medicine = mysqli_fetch_assoc($result);
  }
  //Close database connection
mysqli_close($conn);

?>

<!DOCTYPE html>
<html>
  <head>
    <title>Edit Drugs</title>
  </head>
  <body>
    <h1>Edit Drugs</h1>

    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
      <input type="hidden" name="medicine_id" value="<?php echo $medicine['medicine_id']; ?>"><br>           
   <label for="medicine_name" align= "center">Medicine Name:</label><br>
      <input type="text" id="medicine_name" name="medicine_name" value="<?php echo $medicine['medicine_name']; ?>" required><br>
 
  <label for="medicine_type">Medicine Type:</label><br>
        <input type="text" id="medicine_type" name="medicine_type"  value="<?php echo $medicine['medicine_type']; ?>" required><br>

   <label for="quantity">Quantity:</label><br>
        <input type="number" id="quantity" name="quantity" value="<?php echo $medicine['quantity']; ?>" required><br>
  
   <label for="price">Price:</label><br>
        <input type="number" id="price" name="price" step="0.01" min="0" value="<?php echo $medicine['price']; ?>" required><br>

        <label for="expiry_date">Expiry Date:</label><br>
        <input type="date" name="expiry_date" id="expiry_date" value="<?php echo $medicine['expiry_date']; ?>" required><br>
      </div>
      <input type="submit" name="submit" value="Save Changes">
    </form>

  </body>
</html>


