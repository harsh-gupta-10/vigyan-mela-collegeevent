<?php
// Database configuration
$servername = "localhost";
$username = "vigyanme_Sahil";
$password = "Chetana_2023";
$dbname = "vigyanme_register";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // Set the timezone to IST

    date_default_timezone_set('Asia/Kolkata');
    // Get user inputs
    $userInput = $_POST['userInput'] ?? "";
    $phone = $_POST['phone'];
    $college = $_POST['college'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $submission_time = date("Y-m-d H:i:s");
    // Using rand()
    $ticket_no = rand(1000, 9999) ?? 0; // Generates a random number between 100 and 999
    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $checkuserquery = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($checkuserquery);
    if ($result->num_rows > 0) {
      // User already exists, display a pop-up alert
      echo "<script>
      alert('Email already registered. Please choose a different username.');
      window.location.href = 'test.html';
      </script>";
      
      exit;
  } 
      // User does not exist, proceed with registration
      $sql = "INSERT INTO users (userInput, phone, college, email, password, ticket_no, submission_time) VALUES ('$userInput','$phone','$college','$email', '$hashedPassword','$ticket_no','$submission_time')";
      // //$ticket_sql = "SELECT Sr_no FROM users WHERE userInput = '$userInput' ";
      $conn->query($sql);

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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Ticket</title>
    <link rel="stylesheet" href="styles.css">
    <style>
      body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    margin: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background-color: #f5f5f5;
}

.container {
    text-align: center;
}

#login-container, #ticket-container {
    background-color: #ffffff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    margin-bottom: 20px;
}

#login-form {
    display: flex;
    flex-direction: column;
    align-items: center;
}

label {
    margin: 10px 0;
}

input {
    padding: 10px;
    width: 100%;
    box-sizing: border-box;
    margin-bottom: 15px;
}

button {
    background-color: #4caf50;
    color: #ffffff;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
}

button:hover {
    background-color: #45a049;
}

#ticket-container {
    color: #333;
}

#ticket-content {
    margin-top: 20px;
}

button.download {
    background-color: #3498db;
    color: #ffffff;
    padding: 10px 15px;
    font-size: 14px;
    cursor: pointer;
    border: none;
    border-radius: 4px;
}

button.download:hover {
    background-color: #2980b9;
}

            .container {
      width: 600px;
      margin: 0 auto;
      padding: 20px;
      border: 1px solid #ccc;
      border-radius: 10px;
    }

    .ticket {
      width: 250px;
      height: 400px;
      background-color: #fff;
      border: 1px solid #000;
      border-radius: 10px;
      margin: 20px 0;
      text-align: center;
    }

    .ticket h2 {
      font-size: 24px;
      font-weight: bold;
      color: #333;
      margin-bottom: 20px;
    }

    .ticket p {
      font-size: 16px;
      color: #666;
      margin-bottom: 5px;
    }

    .qrCode {
      width: 100px;
      height: 100px;
      margin: 0 auto;
    
    }
    </style>
</head>
<body>
  
    <div class="container">
        <h1>Ticket for Vigyaan Mela</h1>
      <div class="contentToPrint">

        <div id="ticket">
          <div style="background-color: #007bff; color: #fff; padding: 10px 20px; border-radius: 10px;">
            <h2>Vigyaan Mela</h2>
          </div>
          <!-- <script>
            // Retrieve the user input from the URL parameters
            const urlParams = new URLSearchParams(window.location.search);
            const userInput = urlParams.get('userInput');
    
            // Display the user input on the second page
            document.write(`<p>Name: ${userInput}</p>`);
        </script> -->

           <p>Name: <span style = "font-weight: bold"><?php echo $userInput; ?></span></p>
           <p>Ticket No: <span style = "font-weight: bold"><?php echo $ticket_no; ?></span></p>
          <p>Event Date: <span style="font-weight: bold;">2023-12-23</span></p>
          <p>Event Time: <span style="font-weight: bold;">10:00 AM</span></p>
          <p>Event Location: <span style="font-weight: bold;">Chetana College, Bandra East</span></p>
    
          <div class="qrCode">
            <img src="IMGS2/qrcode.png" class="qrCode" alt="QR Code">
          </div>
        </div>
        <script>
          
  
          // Function to generate and download PDF
          function generatePDF() {
              const pdf = new jsPDF();
              pdf.text(`User Input: ${userInput}`, 10, 10);
              pdf.save(
                'Vigyan_Mela.pdf');
          }
      </script>
  
      <!-- Add a button to trigger PDF generation -->
      <button onclick="printToPDF()">Download PDF</button>
        </div>
    </div>
  </div>
  <script>
    function printToPDF() {
        // Get the element to be printed
        const element = document.getElementById('contentToPrint');

        // Define the options for html2pdf
        const options = {
            margin: 10,
            filename: 'output.pdf',
            image: { type: 'jpeg', quality: 0.98 },
            html2canvas: { scale: 2 },
            jsPDF: { unit: 'mm', format: 'a4', orientation: 'portrait' }
        };

        // Use html2pdf to generate the PDF
        html2pdf(element, options);
    }
</script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>
    <script src="script.js"></script>
</body>
</html>
