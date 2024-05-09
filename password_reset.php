<?php
$showAlert = false;
$showError = false;

include 'PHP/dbconnect.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

function send_password_reset($get_name,$get_email,$token){
    $mail = new PHPMailer(true);

    try {
        //Server settings
        //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'chetanabscit@gmail.com';                     //SMTP username
        $mail->Password   = 'upzz ynyy poxi geof';                               //SMTP password
        $mail->SMTPSecure = "tls";            //Enable implicit TLS encryption
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
        $mail->setFrom('chetanabscit@gmail.com', 'Vigyan Mela 2.0');
        $mail->addAddress($get_email);     //Add a recipient

    
        //Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
    
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Password reset mail';
        $mail->Body    = "
        <head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    </head><h3>Hii $get_name,</h3>
        <p>You are receiving this email because we recieved a password reset request from your account. </p>
        <p>To reset the password, we need to verify your email to check whether it is you only who wants to
            change
            the
            password.</p>
        <p>Click on the button below which will redirect you to the page where you can chaange your password.
        </p>
        <br><br>
        <div class='btn' style = ' display: flex;
        justify-content: center;'>
            <button type='button' style= 'background-color: rgb(39, 39, 39);
            color: white;
            /* block-size: dvw; */
            padding: 7px;
            width: 35%;
            border-top-right-radius: 30px;
            border-bottom-right-radius: 30px;
            border-top-left-radius: 30px;
            border-bottom-left-radius: 30px;'><a href='https://vigyanmela.tech/password_change.php?token=$token&email=$get_email' style='color:white; text-decoration: none;'>Reset Password</a></button>
        </div>
        <br><br>
        Sincerely,<br>
        Vigyan Mela 2.0 Team";
    
        $mail->send();
        $showAlert = 'Message has been sent';
        //header("location: password_reset.php");
    } catch (Exception $e) {
        $showError =  "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

if(isset($_POST['password_reset_link'])){
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $token = md5(rand());

    $check_email = "SELECT * FROM users WHERE email = '$email' LIMIT 1";
    $check_email_run =  mysqli_query($conn,$check_email);
    if(mysqli_num_rows($check_email_run)>0){
        $row = mysqli_fetch_array($check_email_run);
        $get_name = $row['userInput'];
        $get_email  = $row['email'];

        $update_token = "UPDATE users SET verify_token = '$token' WHERE email = '$get_email' ";
        $update_token_run = mysqli_query($conn,$update_token);
        if($update_token_run){
            send_password_reset($get_name,$get_email,$token);
            $showAlert = 'We emailed you a password reset link';
        }
        else{
            $showError = "Some Error Occurred.";
            //header("location: password_reset.php");
        }
    }
    else{
        $showError = "Email already registered.";
        //header("location: password_reset.php");
        exit(0);
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

		<title>Email Verify</title>
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
    if ($showAlert){
    echo 
    '<div class="alert alert-success" role="alert">
  '.$showAlert.'
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
	               		<h1 class="title">Email verification</h1>
	               		<hr />
	               	</div>
	            </div> 
				<div class="main-login main-center">
					<form class="form-horizontal" method="post" action="password_reset.php">
						<div class="form-group">
							<label for="email" class="cols-sm-2 control-label">Your Email</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="email" id="email"  placeholder="Enter your Email" required/>
								</div>
							</div>
						</div>


						<div class="form-group ">
							<button id="button1" name="password_reset_link" type="submit">Send Password Reset Link</button>
						</div>
						<div class="login-register">
				            
				         </div>
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

    </script>
		<script src="JS/script.js"></script>
</body>
</html>