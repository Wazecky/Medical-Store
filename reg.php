<?php
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
$fname=$_POST['full_name'];
$gender=$_POST['gender'];
$address=$_POST['address'];
$email=$_POST['email'];
$password=md5($_POST['password']);
$query=mysqli_query($conn,"insert into users(fullname,gender,address,email,password) values('$fname','$gender','$address','$email','$password')");
if($query)
{
	echo "<script>alert('Successfully Registered. You can login now');</script>";
	//header('location:user-login.php');
}
}
// Close database connection
mysqli_close($conn);
?>


<!DOCTYPE html>
<html lang="en">

	<head>
		<title>User Registration</title>
		
		<script type="text/javascript">
function valid()
{
 if(document.registration.password.value!= document.registration.password_again.value)
{
alert("Password and Confirm Password Field do not match  !!");
document.registration.password_again.focus();
return false;
}
return true;
}
</script>
		

	</head>

	<body class="login">
		<!-- start: REGISTRATION -->
		<div class="row">
			<div class="main-login col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
				<div class="logo margin-top-30">
				<h2 align="center">Pharmacist Registration</h2></a>
				</div>
				<!-- start: REGISTER BOX -->
				<div class="box-register">
					<form name="registration" id="registration"  method="post" align="center" onSubmit="return valid();">
						
								Sign Up
							
							<p>
								Enter your personal details below:
							</p>
							<div class="form-group">
								<input type="text" class="form-control" name="full_name" placeholder="Full Name" required><br>
							</div>
							<div class="form-group">
								<label class="block">
									Gender
								</label>
								<div class="clip-radio radio-primary">
									<input type="radio" id="rg-female" name="gender" value="female" >
									<label for="rg-female">
										Female
									</label>
									<input type="radio" id="rg-male" name="gender" value="male">
									<label for="rg-male">
										Male
									</label><br>
								</div>
								<div class="form-group">
								<input type="text" class="form-control" name="address" placeholder="Address" required><br>
							</div>
							</div>
							<p>
								Enter your account details below:
							</p>
							<div class="form-group">
									<input type="email" class="form-control" name="email" id="email"   placeholder="Email" required><br>
									
							</div>
							<div class="form-group">
									<input type="password" class="form-control" id="password" name="password" placeholder="Password" required><br>	
							</div>
							<div class="form-group">
									<input type="password" class="form-control"  id="password_again" name="password_again" placeholder="Password"required>
							</div>
							<div class="form-group">
								<div class="checkbox clip-check check-primary">
									<input type="checkbox" id="agree" value="agree" checked="true" readonly=" true">
									<label for="agree">
										I agree
									</label>
								</div>
							</div>
							<div class="form-actions">
								<p>
									Already have an account?
									<a href="user-login.php">
										Log-in
									</a>
								</p>
								<button type="submit" class="btn btn-primary pull-right" id="submit" name="submit">
									Submit <i class="fa fa-arrow-circle-right"></i>
								</button>
							</div>
						
					</form>

		
	</body>
	<!-- end: BODY -->
</html>