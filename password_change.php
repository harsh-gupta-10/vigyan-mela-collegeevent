<?php
$showAlert = false;
$showError = false;

include 'PHP/dbconnect.php';

if(isset($_POST['password_update'])){
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $new_password = mysqli_real_escape_string($conn,$_POST['new_password']);
    $confirm_password = mysqli_real_escape_string($conn,$_POST['confirm_password']);
    $token = mysqli_real_escape_string($conn,$_POST['password_token']);
    if(!empty($token)){
        if(!empty($email) && !empty($new_password) && !empty($confirm_password)){
        	//Cheking token is valid or not 
        	$check_token = "SELECT verify_token FROM users WHERE verify_token = '$token' LIMIT 1";
        	$check_token_run = mysqli_query($conn,$check_token);
        	if (mysqli_num_rows($check_token_run)>0){
            	if($new_password == $confirm_password){
					$hashedPassword = password_hash($new_password, PASSWORD_DEFAULT);
                	$update_password = "UPDATE users SET password = '$hashedPassword' WHERE verify_token = '$token' LIMIT 1";
                	$update_password_run = mysqli_query($conn,$update_password);
                	if($update_password_run){
						$showAlert = 'New password successfully updated.';
                	}
                	else{
                  		$showError='Did not update password, Something went wrong.';
                	}
            	}
            	else{
              		$showError = 'Password and Confirm Password does not match.';
            	}
        	}
        	else{ 
          		$showError = 'Invalid token.';
        	}
        }
        else{
  			$showError = 'All fields are mandatory.';
        }
    }
    else{   
      $showError = 'No token available.';
    }
}
else{

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

		<title>Change Password</title>
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
	               		<h1 class="title">Change your password</h1>
	               		<hr />
	               	</div>
	            </div> 
				<div class="main-login main-center">
					<form class="form-horizontal" method="post" action="password_change.php">
					<input type="hidden" value="<?php if(isset($_GET['token']))echo $_GET['token']; ?>" name="password_token">
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
							<label for="password" class="cols-sm-2 control-label">New Password</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input type="password" class="form-control" name="new_password" id="password"  placeholder="Enter your New Password"/>
								</div>
							</div>
						</div>
                        <div class="form-group">
							<label for="password" class="cols-sm-2 control-label">Confirm Password</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input type="password" class="form-control" name="confirm_password" id="password"  placeholder="Confirm your password"/>
								</div>
							</div>
						</div>

						<div class="form-group ">
							<button id="button1"  name="password_update" type="submit">Change Password</button>
							<br>
						</div>
						<?php
    						if ($showAlert){
   								 echo 
    							'<div class="alert alert-success" role="alert">
  									'.$showAlert.'
								</div>
								<button id="button1"  name="" type="button" onclick = "login()"><h5 align="center">Back to Login</h5></button>';
    						}
   						?>
					</form>
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
		function login(){
			window.location.href = "login.php";
		}
    </script>
	
		<script src="JS/script.js"></script>
</body>
</html>