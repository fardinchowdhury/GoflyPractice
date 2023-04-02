<?php
require_once('config.php');
// Establish database connection
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Send email using SendGrid API
    $sendgrid = new \SendGrid('YOUR_API_KEY');
    $email = new \SendGrid\Mail\Mail(); 
    $email->setFrom("YOUR_EMAIL_ADDRESS", "Your Name");
    $email->setSubject("Contact Form Submission");
    $email->addTo("RECIPIENT_EMAIL_ADDRESS", "Recipient Name");
    $email->addContent("text/plain", "Name: $name\nEmail: $email\nMessage: $message");
    $response = $sendgrid->send($email);

    // Redirect to thank you page
    header('Location: success_submision.html');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="landing.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plaster&family=Poppins:wght@200&display=swap" rel="stylesheet">
    <title>Login</title>
</head>
<body>
    <nav>
        <div class="logo">
            <h4><a href="landing2.html">Gofly</a></h4>
        </div>
        <ul class="nav-links">
            <li><a href="#">Reviews</a></li>
            <li><a href="#">Contact Us</a></li>
            <li><a href="signup.php">Register</a></li>
        </ul>
        <div class="burger">
            <div class="line1"></div>
            <div class="line2"></div>
            <div class="line3"></div>
        </div>
    </nav>

    <div class="container">
        <form action="https://formspree.io/f/mlekpwqw" method="post" class="form color-g">
            <h2>Contact Us</h2>
            
            <input class="box" type="text" name="name" placeholder="Enter Your Name" required>
            <input class="box" type="text" name="email" placeholder="Enter Your Email Address" required>
            <textarea class="box" name="message" rows="4" cols="50" placeholder="Enter text here..."></textarea>
            <input type="submit" value="Submit" id="submit">
        </form>
        <div class="side">
            <img src="photos/bgpic1.png" alt="">
        </div>
    </div>

    <script src="land.js"></script>
    
</body>
</html>

