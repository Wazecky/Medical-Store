<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
    
</head>
<body>

</body>
</html>
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

// Get sales data from database
$sql = "SELECT * FROM sales";
$result = mysqli_query($conn, $sql);

// Create an HTML table to display sales dat
echo(" SALES REPORT") ;

echo "<table >";
echo "<tr><th>Date</th>
          <th>ID</th>
          <th>Quantity Sold</th>
          <th>Price</th>
          <th>Total </th>
    </tr>";
while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . $row["date_sold"] . "</td>";
    echo "<td>" . $row["medicine_id"] . "</td>";
    echo "<td>" . $row["quantity"] . "</td>";
    echo "<td>" . $row["price"] . "</td>";
    echo "<td>" . $row["total"] . "</td>";
    echo "</tr>";
}
echo "</table>";

// Calculate total sales
$sql = "SELECT SUM(total) as total_sales FROM sales";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$total_sales = $row["total_sales"];

echo "<p>Total Sales: $" . $total_sales . "</p>";



// Close database connection
mysqli_close($conn);
?>


   