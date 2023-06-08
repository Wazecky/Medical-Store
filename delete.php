<?php
// Check if medicineis set and is a number
if(isset($_GET['medicine_id']) && is_numeric($_GET['medicine_id'])) {
// Include database connection
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
    // Prepare SQL statement to delete row with specified ID
    $stmt = $conn->prepare('DELETE FROM `medicines` WHERE medicine_id=?');
    $stmt->bind_param('i', $_GET['medicine_id']);
    $stmt->execute();

    // Check if any rows were affected by the delete query
    if($stmt->affected_rows > 0) {
        // Redirect back to the manage drugs page
        header('Location: medd.php');
        exit();
    } else {
        echo 'Error deleting row';
    }
} else {
    // If ID is not set or is not a number, redirect back to the manage drugs page
    header('Location: medd.php');
    
    exit();
}
mysqli_close($conn);
?>

