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



// Get current date
$today = date("Y-m-d");
// Get all medicines from database
$query = "SELECT * FROM medicines";
$result = mysqli_query($conn, $query);

// Close database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Medical Store Management System</title>
    <link rel="stylesheet" href="style.css">
</head>
</head>
<body>
    <h1 align = "center">Manage Drugs</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Medicine Name</th>
            <th>Medicine Type</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Expiry Date</th>
            <th>Action</th>
        </tr>
        

        <?php 
          while ($medicine = mysqli_fetch_assoc($result)) { 
            ?>
            <?php
            
            if ($medicine['expiry_date'] < $today) {
                $to="marthahh@gmail.com";
                $subject= "expiry notificaion";
                $message= "The medicine '" . $medicine['medicine_name'] . "' '" . $medicine['medicine_type'] . "' is going to expire soon. Please take necessary actions.";
                $headers="From:dorcaskioko02@gmail.com\r\nReply-To:dorcaskioko02@gmail.com";
                 mail($to, $subject,$message,$headers );
                     
    } elseif ($medicine['expiry_date'] <= date("Y-m-d", strtotime("+30 days"))) {
        echo "<p>The medicine '" . $medicine['medicine_name'] . "' :'" . $medicine['medicine_type'] . "' is going to expire soon. Please take necessary actions.</p>";
    } elseif ($medicine['quantity'] <= 10) {
        echo "<p>The stock of medicine '" . $medicine['medicine_name'] . "' :'" . $medicine['medicine_type'] . "'is running out. Please order more stock.</p>";
    }
?>
                <tr>
                <td><?php echo $medicine['medicine_id']; ?></td>
                <td><?php echo $medicine['medicine_name']; ?></td>
                <td><?php echo $medicine['medicine_type']; ?></td>
                <td><?php echo $medicine['quantity']; ?></td>
                <td><?php echo $medicine['price']; ?></td>
                <td><?php echo $medicine['expiry_date']; ?></td>
                <td>
                    <a href="edit.php?id=<?php echo $medicine['medicine_id']; ?>">Edit</a>
                    <a href="med.php?delete=<?php echo $medicine['medicine_id']; ?>">Delete</a>
                </td>
            </tr>
    
    <?php 
    
    }
     ?>
    </table>


    <br><br>
    <a href="addmed.php">Add New Medicine</a>
</body>
</html>

