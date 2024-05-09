<?php
// Database configuration
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
   <title>Your Ticket</title>
   <link rel="stylesheet" href="CSS/ticketstyle.css">
   <script src="https://rawgit.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.js"></script>
</head>

<body>
   <!-- partial:index.partial.html -->
   <!-- INSPO:  https://www.behance.net/gallery/69583099/Mobile-Flights-App-Concept -->
   <main class="ticket-system">
      <div class="top">
         <br>
         <div class="printer">
         </div>
         <div class="receipts-wrapper" id="the-content">
            <div class="receipts">
               <div class="receipt">
                  <div class="image">
                     <svg viewBox="0 0 403 94">
                     <img src="IMGS2/VigyanMelalogo.png" style="height:40%; width:85%; margin-left: 20px;"  alt="Vigyan Mela" align="center"/>
                     </svg>
                  </div>
                  <div class="route">
                     <h2><b>Why Buy When</b></h2>
                     <img src="IMGS2/robot.gif" alt="Robot" class="robot">
                     <h2 align="center"><b>You Can DIY</b></h2>
                  </div>
                  <div class="details">
                     <div class="item">
                        <span>Name</span>
                        <h3><?php echo $_SESSION['userInput']; ?></h3>
                     </div>
                     <div class="item">
                        <span>Ticket No.</span>
                        <h3><?php echo $_SESSION['ticket_no']; ?></h3>
                     </div>
                     <div class="item">
                        <span>Date & Time</span>
                        <h3>19/12/2023 ,09:00</h3>
                     </div>
                     <div class="item">
                        <span>Venue</span>
                        <h3>7th Floor, Chetana College</h3>
                     </div>

                  </div>
               </div>
               <div class="receipt qr-code">
                  <div class="qr">
                     <img src="IMGS2/spiderman qrcode.jpg" alt="qr-code">
                  </div>
                  <div class="description">
                     <h2>Invite Your Friends and Family</h2>
                     <p>Show QR-code to them </p>
                  </div>
               </div>
            </div>            
         </div>
         
         <div id="countdown-message" style="text-align: center;">Wait for X seconds before redirecting...</div>
   </main>
   <!-- partial -->

   <script>
      // Function to redirect to a new page after a specified delay
      function redirectToPage(url, waitTime) {
        setTimeout(function () {
          window.location.href = url;
        }, waitTime * 1000);
      }
    
      // Function to display countdown messages in the HTML
      function countdownTimer(waitTime) {
        const countdownMessage = document.getElementById('countdown-message');
        countdownMessage.textContent = `Wait for ${waitTime} seconds before redirecting...`;
    
        for (let i = waitTime; i > 0; i--) {
          setTimeout(function () {
            countdownMessage.textContent = `Downloading in ${i} seconds...`;
          }, (waitTime - i) * 1000);
        }
      }
    
      // Set the target URL and wait time (in seconds)
      const targetUrl = 'https://vigyanmela.tech/ticketdownload.php';
      const waitTime = 5; // Change this to the desired wait time
    
      // Call the countdown timer function
      countdownTimer(waitTime);
    
      // Call the redirect function with the specified URL and wait time
      redirectToPage(targetUrl, waitTime);
    </script>




</body>

</html>