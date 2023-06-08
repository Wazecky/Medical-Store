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
    
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
        <script src="bootstrap/js/jquery.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    

    
</head>
<body>
    <h1 align = "center">Manage Drugs<br> <img src="images/caps.jpg"  height="100px" width="200px" ></h1>
    
    <table>
        
        <tr>
            <th style="width: 1%";>ID</th>
            <th style="width: 10%";>Medicine Name</th>
            <th style="width: 12%">Medicine Type</th>
            <th style="width: 12%">Quantity</th>
            <th style="width: 10%">Price</th>
            <th style="width: 12%">Expiry Date</th>
            <th style="width: 18%">Action</th>
        </tr>
    <?php
    
function sendSMS($to,$message){
        $username=urlencode("Keilah");
        $apikey="74201ddcd637051ac7629b7ae8d1da2ecab32b6a740a7884cdbeec2975f0985f";

        $data = array(
            "username"=>$username,
            "to"=>$to,
            "message"=> $message
        );

        $url="https://api.africastalking.com/version1/messaging";
        $query=http_build_query($data);
        $ch=curl_init($url);

        $headers=array(
        'Accept: application/json',
        'Content-Type: application/x-www-form-urlencoded',
        'apiKey: '.$apikey);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch,CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, count($data));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $query);
    try{
      curl_exec($ch);
    }catch(Exeption $e){
        echo $e->getMessage();
        return false;
    }
        return true;

    }
    ?>
    <?php
  while ($medicine = mysqli_fetch_assoc($result)) { 
     ?>
            <?php
            
            if ($medicine['expiry_date'] < $today) {
                $to = "+254791222350";
                $message =  urlencode("The medicine '" . $medicine['medicine_name'] . "' '" . $medicine['medicine_type'] . "' is expired. Please take necessary actions.");
                              // Send the sms
                if (sendSMS($to, $message)) {
                    echo 'Sms sent successfully';
                } else {
                    echo 'Error sending sms';
                }
            }

            
             elseif ($medicine['expiry_date'] <= date("Y-m-d", strtotime("+30 days"))) {
                $to = "+254791222350";
             $message1 =  urlencode("The medicine '" . $medicine['medicine_name'] . "' :'" . $medicine['medicine_type'] . "' is going to expire soon. Please take necessary actions.");
             if (sendSMS($to, $message1)) {
                    echo 'Sms sent successfully';
                } else {
                    echo 'Error sending sms';
                }
    
    } elseif ($medicine['quantity'] <= 10) {
            $to = "+254791222350";
             $message2 =  urlencode("The stock of medicine '" . $medicine['medicine_name'] . "' :'" . $medicine['medicine_type'] . "'is running out. Please order more stock.");
             if (sendSMS($to, $message2)) {
                    echo 'Sms sent successfully';
                } else {
                    echo 'Error sending sms';
                }
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
                    <a href="edit.php?medicine_id=<?php echo $medicine['medicine_id']; ?>">Edit</a>
                    <a href="delete.php?medicine_id=<?php echo $medicine['medicine_id']; ?>">Delete</a>
                    
                </td>
            </tr>
    
    <?php 
        }
     ?>

    </table>
    <a href="addmed.php">Add  </a>
</body>
</html>

