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
    $supplier_id = $_POST['supplier_id'];
    $supplier_name = $_POST['supplier_name'];
    $contact_number = $_POST['contact_number'];
    $category_type = $_POST['category_type'];
    $email = $_POST['email'];
    $address = $_POST['address'];

 // update supplier in database
    
   $sql = "UPDATE `supp` SET supplier_id='$supplier_id',supplier_name='$supplier_name',contact_number='$contact_number',category_type='$category_type',email='$email',address='$address' WHERE supplier_id=$supplier_id";
  
    if(mysqli_query($conn, $sql)){
      // redirect to manage drugs page if update successful
      header('Location: sup.php?supplier_id=' . $supplier_id);
      exit;
    } else {
      echo "Error updating suppliers: " . mysqli_error($conn);
    }
  } else {
    // retrieve suppliers data from database
$supplier_id = $_GET['supplier_id'];

    $sql = "SELECT * FROM `supp` WHERE supplier_id=$supplier_id";
    $result = mysqli_query($conn, $sql);
    $supplier = mysqli_fetch_assoc($result);
  }
  //Close database connection
mysqli_close($conn);

?>

<!DOCTYPE html>
<html>
  <head>
    <title>Edit Supplier</title>
  </head>
  <body>
    <h1>Edit Supplier</h1>

    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
     <input type="hidden" name="supplier_id" value="<?php echo $supplier['supplier_id']; ?>"><br>  
<div>
   <label for="supplier_name" align= "center">Supplier Name:</label><br>
      <input type="text" id="supplier_name" name="supplier_name" value="<?php echo $supplier['supplier_name']; ?>" required><br>
    </div><div>
 <label for="contact_number">Contact Number:</label><br>
         <input type="text" id="contact_number" name="contact_number" value="<?php echo $supplier['contact_number']; ?>" required><br>
       </div><div>
<label for="category_type">Category_Type:</label><br>
        <input type="text" id="category_type" name="category_type" value="<?php echo $supplier['category_type']; ?>" required><br>
      </div><div>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" value="<?php echo $supplier['email']; ?>" required><br>
    </div><br>
    <div>
        <label for="address">Address:</label><br>
        <input type="text" id="address" name="address" value="<?php echo $supplier['address']; ?>" required><br>     
      </div>
   
  
      <input type="submit" name="submit" value="Save Changes">
    </form>

  </body>
</html>



