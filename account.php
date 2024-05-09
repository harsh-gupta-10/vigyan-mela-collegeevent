<!-- 
    // session_start();
    // if(!isset($_SESSION['loggedin']) && $_SESSION['loggedin']!=true){
    // header("location: login.php");
    // exit;
    // }
--> 

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vigyan Mela</title>
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="CSS/navbar.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/locomotive-scroll@3.5.4/dist/locomotive-scroll.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
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
    <!-- <header>
    <p class="logo">Navbar</p>
        <input type="checkbox" name="" class="btn">
    <div class="nav">
        <ol>
        <h3><a href="#"></a>HOME</h3>
        <h3><a href="#"><b>ABOUT US</b></a></h3>
        <h3><a href="#"><b>CONTACT US</b></a></h3>
        <button>LOGIN</button>
    </ol>
    </div>
</header> -->
    <header>
        <p class="logo" style="font-family: sans-serif;"><b>VIGYAN MELA 2.0</b></p>
        <!-- <input type="checkbox" name="" class="btn" id="menu-toggle"> -->
        
            <img src="IMGS2/sidebar.svg" alt="Menu Icon" class="menu-icon" id="menu-toggle">
        
        <div class="nav">
            <ol>
                <li> <a href="account.php"><b>HOME</b></a></li>
                <li><a href="#"><b>ABOUT US</b></a></li>
                <li><a href="contact_user.php"><b>CONTACT US</b></a></li>
                <?php
            session_start();
            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                echo "<li class='dropdown'>
                        <a href=''><b>" . $_SESSION['userInput'] . "</b></a>
                        <div class='dropdown-content'>
                            <a href='tickettest.php'>My ticket</a>
                            <a href='logout.php'>Logout</a>
                        </div>
                    </li>";
            } else {
                echo "<li><a href='register.php'><b>Get Free Ticket</b></a></li>";
            }
            ?>
            </ol>
        </div>
    </header>
    <div id="main">
        <div id="page">
            <div id="loop">
                <h1><b>VIGYAN </b> MELA IS THE <b><i>BIGGEST</i></b> <span>EVENT</span> IN THE <span><i>CHETANA
                            COLLEGE.</i></span></h1>
                <h1><b>VIGYAN </b> MELA IS THE <b><i>BIGGEST</i></b> <span>EVENT</span> IN THE <span><i>CHETANA
                            COLLEGE.</i></span></h1>
                <h1><b>VIGYAN </b> MELA IS THE <b><i>BIGGEST</i></b> <span>EVENT</span> IN THE <span><i>CHETANA
                            COLLEGE.</i></span></h1>

            </div>
            <h3>WHY BUY<br>WHEN YOU CAN DIY</h3>
            <h4>...SCROLL TO READ</h4>
            <canvas></canvas>
        </div>
        <div id="page1">
            <div id="right-text">
                <h1>AMAZING
                    <br>
                    IOT
                    <br>
                    PROJECTS
                </h1>
            </div>
            <div id="left-text">
                <h1>THAT WILL
                    <br>
                    MAKE YOU
                    <br>
                    SHOCK
                </h1>
                <h3></h3>
            </div>
        </div>
        <div id="page2">
            <div id="text1">

                <h1>BIGGEST
                    <br>
                    ELECTRONICS
                    <br>
                    PROJECT
                    <br>
                    EXHIBITION
                </h1>
            </div>
            <div id="text2">
                <p>SPARK THE CIRCUITS OF CURIOSITY <br>AND WITNESS THE VOLTAGE OF INNOVATION<br> – WELCOME TO VIGYAN
                    MELA, <br> WHERE ELECTROICS COME ALIVE!</p>
            </div>
        </div>
        <div id="page3">
            <div id="text3">

                <h1>

                    VOLTAGE MEETS
                    <br>
                    VISION AT
                    <br>
                    VIGYAN MELA
                </h1>

            </div>
        </div>
        <div id="page4">
            <div id="about">
                <div id="text3">

                    <h1>

                        ABOUT US
                    </h1>
                    <br><br>
                    <p>Welcome to Vigyaan Mela <br>where technology and science converge to shape our future!<br>
                        We're a passionate team dedicated to fostering <br>
                        innovation and exploration in the realms of
                        technology and science</p>
                </div>
                <br>
                <div id="text4">
                    <p>
                        At Vigyaan Mela, we believe in the power of knowledge and creativity to drive progress. <br>
                        Our mission is to showcase cutting-edge advancements, <br>
                        inspire curiosity, and ignite a passion for discovery <br>
                        among visitors of all ages.
                    </p>

                </div>

                <br>



            </div>
        </div>

        <!-- about -->

        <!-- <div class="person">
            <div class="container">
              <div class="container-inner">
                <img
                  class="circle"
                  
                />
              </div>
            </div>
            <div class="divider"></div>
            <div class="name">Vishnu</div>
            <div class="title">Event Head</div> 
          </div> -->
        <br>
        <!-- contact -->
        <div id="page5"></div>
        <section class="contact">
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
                            <button type="submit" onclick="contact()" >Send message</button>
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
        <div class="footer">
            <div class="footer-content">
                <div class="footer-section">
                    <h2>Nothing here</h2>
                    
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
        <script src="https://cdn.jsdelivr.net/npm/locomotive-scroll@3.5.4/dist/locomotive-scroll.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.5/gsap.min.js"
            integrity="sha512-cOH8ndwGgPo+K7pTvMrqYbmI8u8k6Sho3js0gOqVWTmQMlLIi6TbqGWRTpf1ga8ci9H3iPsvDLr4X7xwhC/+DQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.5/ScrollTrigger.min.js"
            integrity="sha512-AMl4wfwAmDM1lsQvVBBRHYENn1FR8cfOTpt8QVbb/P55mYOdahHD4LmHM1W55pNe3j/3od8ELzPf/8eNkkjISQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="JS/script.js"></script>
</body>

</html>