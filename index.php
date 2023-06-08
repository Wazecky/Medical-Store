<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Medical Store Management System</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Welcome to Medical Store  Management System</h1>
        <div class ="navbar">
            
            <li><a href="med.php">Manage Drugs</a></li>
            <li><a href="sup.php">Manage Suppliers</a></li>
            <li><a href="report.php">View Reports</a></li>
            <li><a href="logout.php">Logout</a></li>
        </div>
    </div>
</body>
