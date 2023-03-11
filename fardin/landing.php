
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plaster&family=Poppins:wght@200&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="landing.css">
    <title>Gofly</title>
</head>
<body>
    <nav>
        <div class="logo">
            <h4><a href="landing.php">Gofly</a></h4>
        </div>
        <ul class="nav-links">
            <li><a href="#">Reviews</a></li>
            <li><a href="#">Contact Us</a></li>
            <li><a href="profile.php">My Profile</a></li>
            <li><a href="logout.php">Logout</a></li>
            <li>
                <a class = "dropdown">
                <?php
                    session_start();

                    if(isset($_SESSION["username"])) {
                        $username = $_SESSION['username'];
                        echo "$username";
                    }
                ?>
                </a>
                <!-- dropdown for the user -->


            </li>
        </ul>
        
        <!-- Create a burger for mobile view -->
        <div class="burger">
            <div class="line1"></div>
            <div class="line2"></div>
            <div class="line3"></div>
        </div>
    </nav>

    <div class="wel"> 
        <?php

        if(isset($_SESSION["username"])) {
            $username = $_SESSION['username'];
            echo "<h1>Welcome, $username!</h1>";
        }
        
        ?>
    </div>

    
    <script src="land.js"></script>
</body>
</html>