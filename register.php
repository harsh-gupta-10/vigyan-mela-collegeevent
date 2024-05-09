<?php
// Database configuration
include 'PHP/dbconnect.php';
$showAlert = false;
$showError = false;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // Set the timezone to IST

    date_default_timezone_set('Asia/Kolkata');
    // Get user inputs
    $userInput = $_POST['userInput'] ?? "";
    $phone = $_POST['phone'];
    $college = $_POST['college'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $submission_time = date("Y-m-d H:i:s");
    // Using rand()
    $ticket_no = rand(1000, 9999) ?? 0; // Generates a random number between 100 and 999
    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $existsql ="SELECT * FROM `users` WHERE email = '$email'";
    $result = mysqli_query($conn,$existsql);
    $numExistRows = mysqli_num_rows($result);
    if ($numExistRows > 0) {
      // User already exists
	  $showError = "Email already registered.";
  } 
  else {
  
      // User does not exist, proceed with registration
	  if(($password == $cpassword)){
      $sql = "INSERT INTO users (name, phone, college, email, password, ticket_no, submission_time) VALUES ('$userInput','$phone','$college','$email', '$hashedPassword','$ticket_no','$submission_time')";
      // //$ticket_sql = "SELECT Sr_no FROM users WHERE userInput = '$userInput' ";
	  $result = mysqli_query($conn, $sql);
	  if($result){
		$showAlert = true;
	  }
	  }
	  else{
		$showError = "Password do not match.";
	  }
  }
      // Registration successful, redirect or display a success message
      // 
      
      
  
    // Insert user into the database
    // $sql = "INSERT INTO users (userInput, phone, college, email, password, ticket_no, submission_time) VALUES ('$userInput','$phone','$college','$email', '$hashedPassword','$ticket_no','$submission_time')";
    // //$ticket_sql = "SELECT Sr_no FROM users WHERE userInput = '$userInput' ";
    // $conn->query($sql);
    // $conn->query($ticket_sql);
    // if ($conn->query($sql) === TRUE) {
    //     echo "User registered successfully";
    // } else {
    //     echo "Error: " . $sql . "<br>" . $conn->error;
    // }
    // $sql2 = "SELECT * FROM users";
    // $conn->query($sql2);
    $conn->close();
    // $conn->close();
	
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="CSS/register.css" type="text/css">
	<link rel="stylesheet" href="CSS/navbar.css" type="text/css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
	<link href='https://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>

	<title>Register for Ticket</title>
	<style>
		#ticket {
			background-color: rgb(39, 39, 39);
			color: white;
		}

		#ticket:hover {
			transform: scaleY(0);
		}
	</style>
</head>

<body>
	<header>
		<p class="logo" style="font-family: sans-serif;"><b>VIGYAN MELA 2.0</b></p>
		<!-- <input type="checkbox" name="" class="btn" id="menu-toggle"> -->

		<img src="IMGS2/sidebar.svg" alt="Menu Icon" class="menu-icon" id="menu-toggle">

		<div class="nav">
			<ol>
				<li class="nav-home"> <a href="index.html"><b>HOME</b></a></li>
				<li><a href="#"><b>ABOUT US</b></a></li>
				<li><a href="contact.php"><b>CONTACT US</b></a></li>
				<li><a href="register.php" id="Ticket"><b>Get Ticket</b></a></li>
			</ol>
		</div>
	</header>
	<?php
    if ($showAlert){
    echo 
    '<div class="alert alert-success" role="alert">
  	Success your account is now created.
	</div>'; 
	header("location: login.php");
    }
   	?>
	<?php
    if ($showError){
    echo 
    '<div class="alert alert-danger" role="alert">
  	'.$showError.'
	</div>';
    }
?>
	<div class="register1" style="margin-left: 15%; margin-right: 15%; ">
		<div class="row main">
			<div class="panel-heading">
				<div class="panel-title text-center">
					<h1 class="title">Register for Ticket</h1>
					<hr />
				</div>
			</div>
			<div class="main-login main-center">
				<form class="form-horizontal" method="post" action="register.php">

					<div class="form-group">
						<label for="name" class="cols-sm-2 control-label">Your Name</label>
						<div class="cols-sm-10">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
								<input type="text" class="form-control" id="userInput" name="userInput"
									placeholder="Enter your Name" required />
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="name" class="cols-sm-2 control-label">Your Mobile no.</label>
						<div class="cols-sm-10">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
								<input type="text" class="form-control" id="phone" name="phone"
									placeholder="Enter your Phone number" required />
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="email" class="cols-sm-2 control-label">Your Email</label>
						<div class="cols-sm-10">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-envelope fa"
										aria-hidden="true"></i></span>
								<input type="text" class="form-control" name="email" id="email"
									placeholder="Enter your Email" required />
							</div>
						</div>
					</div>

					<div class="form-group">
						<label for="username" class="cols-sm-2 control-label">College Name</label>
						<div class="cols-sm-10">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
								<input type="text" class="form-control" name="college" id="college"
									placeholder="Institution Name (only if any)" />
							</div>
						</div>
					</div>

					<div class="form-group">
						<label for="password" class="cols-sm-2 control-label">Password</label>
						<div class="cols-sm-10">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-lock fa-lg"
										aria-hidden="true"></i></span>
								<input type="password" class="form-control" name="password" id="password"
									placeholder="Create Password" />
							</div>
						</div>
					</div>

					<div class="form-group">
						<label for="confirm" class="cols-sm-2 control-label">Confirm Password</label>
						<div class="cols-sm-10">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-lock fa-lg"
										aria-hidden="true"></i></span>
								<input type="password" class="form-control" name="cpassword" id="cpassword"
									placeholder="Confirm your Password" />
							</div>
						</div>
					</div>

					<div class="form-group ">
						<button id="button1" type="submit">Register</button>
					</div>
					<div class="login-register">

					</div>
				</form>
				<h4 align="center">Already registered? <a href="login.php">Login</a></h4>
			</div>
		</div>
	</div>
	<script>
document.addEventListener('DOMContentLoaded', function () {
    var menuToggle = document.getElementById('menu-toggle');
    var nav = document.getElementById('nav');

    if (menuToggle && nav) {
        menuToggle.addEventListener('click', function () {
            nav.classList.toggle('show');
        });

        document.addEventListener('click', function (event) {
            if (!nav.contains(event.target) && event.target !== menuToggle) {
                nav.classList.remove('show');
            }
        });
    }
});

    </script>
	<script src="JS/script.js"></script>
</body>

</html>