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
    <title>signup</title>
</head>
<body>
<?php 

if(isset($_POST['submit'])){
   $username = $_POST['username'];
   $email = $_POST['email'];
   $password = $_POST['password'];

   echo $username + ' ' + $email + ' ' + $password;
}
?>
    <nav>
        <div class="logo">
            <h4><a href="landing.html">Gofly</a></h4>
        </div>
        <ul class="nav-links">
            <li><a href="#">Reviews</a></li>
            <li><a href="login.html">Login</a></li>
            <li><a href="signup.html">Register</a></li>
            <li><a href="#">Contact Us</a></li>
        </ul>
        <div class="burger">
            <div class="line1"></div>
            <div class="line2"></div>
            <div class="line3"></div>
        </div>
    </nav>

    <div class="container">
        <form action="signup.php" method="POST" class="form">
            <h2>Register</h2>
            <input class="box" type="text" name="uid" placeholder="Username" id = 'username' name = 'username'required>
            <input class="box" type="email" name="email" placeholder="Email" id = 'email' name = 'email' required>
            <input class="box" type="password" name="pwd" placeholder="password" id = 'password' name = 'password' required>
            <input type="submit" value="Sign Up" id="submit" name = 'submit'>
            <p1 id="p-login">Already a member? <a href="login.html"><u>Login</u></a></p1>
        </form>
        <div class="side">
            <img src="photos/bgpic1.png" alt="">
        </div>
    </div>

    <script src="land.js"></script>
    
</body>
</html>
