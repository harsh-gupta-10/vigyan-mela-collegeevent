<?php
 $login = false;
 $showError = false;
if($_SERVER["REQUEST_METHOD"]=="POST"){
 
  include 'PHP/dbconnect.php';
  $email = $_POST['email'];
  $password = $_POST['password'];
  
    // $sql = "Select * from users2 where email='$email' AND password = '$password'";
    $sql = "Select * from users where email='$email'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if($num == 1){
      while ($row = mysqli_fetch_assoc($result)) {
        if(password_verify($password,$row['password'])){
          $login = true; 
		  $userInput = $row['userInput'];
		  $ticket_no = $row['ticket_no'];
          session_start();
          $_SESSION['loggedin'] = true;
          $_SESSION['email'] = $email;
		  $_SESSION['userInput'] = $userInput;
          $_SESSION['ticket_no'] = $ticket_no;
          header("location: account.php");
        }
        else{
          $showError = "Invalid Ceredentials";
        }
      
      }
    }

  else{
    $showError = "Invalid Ceredentials";
  }

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

		<title>Login for Ticket</title>
		<style>
			#ticket{
				background-color: rgb(39,39,39);
				color: white;
			}
			#ticket:hover{
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
			        <li class="nav-home"> <a href="index.php"><b>HOME</b></a></li>
			        <li><a href="#"><b>ABOUT US</b></a></li>
			        <li><a href="contact.php"><b>CONTACT US</b></a></li>
			        <li><a href="register.php" id="Ticket"><b>Get Ticket</b></a></li>
			    </ol>
			</div>
		      </header>
			  <?php
    if ($login){
    echo 
    '<div class="alert alert-success" role="alert">
  You are logged in.
</div>';
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
	               		<h1 class="title">Login to view ticket</h1>
	               		<hr />
	               	</div>
	            </div> 
				<div class="main-login main-center">
					<form class="form-horizontal" method="post" action="login.php">
						<div class="form-group">
							<label for="email" class="cols-sm-2 control-label">Your Email</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="email" id="email"  placeholder="Enter your Email" required/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="password" class="cols-sm-2 control-label">Password</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input type="password" class="form-control" name="password" id="password"  placeholder="Enter your Password"/>
								</div>
							</div>
						</div>

						<div class="form-group ">
							<button id="button1" type="submit">Login</button>		
						</div>
							
						<p><a href="password_reset.php">Forget Password?</a></p>
						<div class="login-register">
				            
				         </div>
					</form>
					<h5 align="center">Didn't have an account? <a href="register.php">Register</a></h5>
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