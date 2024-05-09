<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Database configuration
    $servername = "localhost";
    $username = "vigyanme_Sahil";
    $password = "Chetana_2023";
    $dbname = "vigyanme_contact";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    // Set the timezone to IST
    date_default_timezone_set('Asia/Kolkata');
    // Get user inputs
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];
    $submission_time = date("Y-m-d H:i:s");
    // Insert data into the database
    $sql = "INSERT INTO messages (name, email, phone, message, submission_time) VALUES ('$name', '$email', '$phone', '$message', '$submission_time')";

    if ($conn->query($sql) === TRUE) {
        echo "Message sent successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
<?php
    session_start();
    if(!isset($_SESSION['loggedin']) && $_SESSION['loggedin']!=true){
    header("location: login.php");
    exit;
    }
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact us</title>
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="CSS/navbar.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/locomotive-scroll@3.5.4/dist/locomotive-scroll.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <style>
        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            
            box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .dropdown-content a {
            color: white;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }
    </style>
</head>
<body>
<header>
        <p class="logo" style="font-family: sans-serif;"><b>VIGYAN MELA 2.0</b></p>

        <!-- Menu Icon -->
        <img src="IMGS2/sidebar.svg" alt="Menu Icon" class="menu-icon" id="menu-toggle">

        <div class="nav" id="nav">
            <ol>
                <li class="nav-home"> <a href="account.php"><b>HOME</b></a></li>
                <li><a href="#"><b>ABOUT US</b></a></li>
                <li><a href="contact_user.php"><b>CONTACT US</b></a></li>
                <li class='dropdown'>
                        <a href='#'><b><?php echo $_SESSION['userInput']; ?></b></a>
                        <div class='dropdown-content'>
                            <a href='tickettest.php'>My ticket</a>
                            <a href='logout.php'>Logout</a>
                        </div>
                    </li>
            </ol>
        </div>
    </header>
    <section class="contact" id="section3">
        <div class="container">
            <h2>Contact Us</h2>
            <div class="content-wrapper">
                <div class="contact-form">
                    <h3>Send us a message</h3>
                    <form action="" method="post">
                        <div class="form-group">
                            <input type="text" name="name" placeholder="Your Name" id="name">
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" placeholder="Your email" id="email">
                        </div>
                        <div class="form-group">
                            <input type="tel" name="phone" placeholder="Your Phone no." id="phone">
                        </div>
                        <div class="form-group">
                            <textarea name="message" id="message" cols="30" rows="10"
                                placeholder="Your Message"></textarea>
                        </div>
                        <button type="submit" onclick="contact()">Send message</button>
                    </form>
                </div>
                <div class="contact-info">
                    <h3>Contact Information</h3>
                    <p><i class="fas fa-phone"></i>+91 93228 71984</p>
                    <p><i class="fas fa-phone"></i>+91 91376 66830</p>
                    <p><i class="fas fa-envelope"></i>chetanabscit@gmail.com</p>
                    <p><i class="fas fa-map-marker-alt"></i>Chetana's Hazarimal Somani College, Bandra(E),
                        Mumbai-400051</p>
                </div>
            </div>
            <h2>Map</h2>
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d942.765644821293!2d72.84808090000001!3d19.060986000000003!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1701609485327!5m2!1sen!2sin"
                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </section>

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