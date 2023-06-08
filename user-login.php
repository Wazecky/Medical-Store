<?php
// Initialize the session
session_start();
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
 

if(isset($_POST['submit']))
{
$sql="SELECT * FROM users WHERE email='".$_POST['username']."' and password='".($_POST['password'])."'";
$result = mysqli_query($conn, $sql);

if ($result) {
        header('Location: dashboard.php');
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

	   }
// Close database connection
mysqli_close($conn);
?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<title>User-Login</title>
		
		
	</head>
	<body class="login">
		<div class="row">
			<div class="main-login col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
				<div class="logo margin-top-30">
				<h2>  Pharmacist and Supplier Login</h2></a>
				</div>

				<div class="box-login">
					<form class="form-login" method="post">
						<fieldset>
							<legend>
								Sign in to your account
							</legend>
							<p>
								Please enter your name and password to log in.<br />
								<span style="color:red;"><?php echo $_SESSION['errmsg']; ?><?php echo $_SESSION['errmsg']="";?></span>
							</p>
							<div class="form-group">
								<span class="input-icon">
									<input type="text" class="form-control" name="username" placeholder="Username">
									<i class="fa fa-user"></i> </span>
							</div>
							<div class="form-group form-actions">
								<span class="input-icon">
									<input type="password" class="form-control password" name="password" placeholder="Password">
									<i class="fa fa-lock"></i>
									 </span><a href="forgot-password.php">
									Forgot Password ?
								</a>
							</div>
							<div class="form-actions">
								
								<button type="submit" class="btn btn-primary pull-right" name="submit">
									Login <i class="fa fa-arrow-circle-right"></i>
								</button>
							</div>
							<div class="new-account">
								Don't have an account yet?
								<a href="reg.php">
									Create an account
								</a>
							</div>
						</fieldset>
					</form>

					</div>
			
				</div>

			</div>
		
	
	</body>
	<!-- end: BODY -->
</html>