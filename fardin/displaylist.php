
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="search.scss">
    <link href="https://fonts.googleapis.com/css2?family=Plaster&family=Poppins:wght@200&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="display.css">
    <title>Listings</title>
</head>
<body>
    <nav>
        <div class="logo">
            <h4><a href="landing.php">Gofly</a></h4>
        </div>
        <ul class="nav-links">
            <li><a href="displaylist.php">Listings</a></li>
            <li><a href="#">Reviews</a></li>
            <li><a href="#">Contact Us</a></li>
            <li>
                <div class="dropdown">
                    <a href="#">
                    <i class="fa-solid fa-user"></i>
                    <?php
                        session_start();

                        if(isset($_SESSION["username"])) {
                            $username = $_SESSION['username'];
                            echo "$username";
                        }
                    ?>
                    </a>
                <!-- dropdown for the user -->
                    <div class="dropdown-content">
                        <a href="profile.php">My Profile</a>
                        <a class="fpwd" href="change_pass.php">Change Password</a>
                        <a href="logout.php">Logout</a>
                    </div>
                </div>
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
            echo "<h1>Welcome, Boss!</h1>";
        }
        
        ?>
    </div>
    <!-- Creating Lufthansa Listing -->
    <div class="listing-container">
    <div class="box">
        <ul class="left">
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>

        <ul class="right">
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
        <div class="ticket">
            <span class="airline">Lufthansa</span>
            <span class="airline airlineslip">Price</span>
            <div class="content">
                <span class="logo-1"><img src="photos/lufthansa.svg"></span>
                <span class="jfk">JFK</span>
                <span class="plane">
                    <?xml version="1.0" ?>
                    <svg
                        clip-rule="evenodd"
                        fill-rule="evenodd"
                        height="60"
                        width="60"
                        image-rendering="optimizeQuality"
                        shape-rendering="geometricPrecision"
                        text-rendering="geometricPrecision"
                        viewBox="0 0 500 500"
                        xmlns="http://www.w3.org/2000/svg">
                        <g stroke="#222">
                            <line
                                fill="none"
                                stroke-linecap="round"
                                stroke-width="30"
                                x1="300"
                                x2="55"
                                y1="390"
                                y2="390"/>
                            <path
                                d="M98 325c-9 10 10 16 25 6l311-156c24-17 35-25 42-50 2-15-46-11-78-7-15 1-34 10-42 16l-56 35 1-1-169-31c-14-3-24-5-37-1-10 5-18 10-27 18l122 72c4 3 5 7 1 9l-44 27-75-15c-10-2-18-4-28 0-8 4-14 9-20 15l74 63z"
                                fill="#222"
                                stroke-linejoin="round"
                                stroke-width="10"/>
                        </g>
                    </svg>
                </span>
                <span class="sfo">SFO</span>

                <span style="align-items: center;" class="plane price">
                    <h1 >$ 1200</h1>
                </span>

                <div class="sub-content">
                    <span class="watermark">Lufthansa</span>
                    <span class="name">BOARDING TIME
                        <br>
                        <span>8:25PM 3/18/23</span>
                    </span>
                        

                    <span class="gate">FLIGHT N&deg;<br>
                        <span>X3-65C3</span>
                    </span>

                </div>
            </div>
        </div>
    </div>


    <div class="box">
        <ul class="left">
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>

        <ul class="right">
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
        <div class="ticket">
            <span class="airline">Lufthansa</span>
            <span class="airline airlineslip">Price</span>
            <div class="content">
                <span class="logo-1"><img src="photos/lufthansa.svg"></span>
                <span class="jfk">JFK</span>
                <span class="plane">
                    <?xml version="1.0" ?>
                    <svg
                        clip-rule="evenodd"
                        fill-rule="evenodd"
                        height="60"
                        width="60"
                        image-rendering="optimizeQuality"
                        shape-rendering="geometricPrecision"
                        text-rendering="geometricPrecision"
                        viewBox="0 0 500 500"
                        xmlns="http://www.w3.org/2000/svg">
                        <g stroke="#222">
                            <line
                                fill="none"
                                stroke-linecap="round"
                                stroke-width="30"
                                x1="300"
                                x2="55"
                                y1="390"
                                y2="390"/>
                            <path
                                d="M98 325c-9 10 10 16 25 6l311-156c24-17 35-25 42-50 2-15-46-11-78-7-15 1-34 10-42 16l-56 35 1-1-169-31c-14-3-24-5-37-1-10 5-18 10-27 18l122 72c4 3 5 7 1 9l-44 27-75-15c-10-2-18-4-28 0-8 4-14 9-20 15l74 63z"
                                fill="#222"
                                stroke-linejoin="round"
                                stroke-width="10"/>
                        </g>
                    </svg>
                </span>
                <span class="sfo">SFO</span>

                <span style="align-items: center;" class="plane price">
                    <h1 >USD 1200</h1>
                </span>

                <div class="sub-content">
                    <span class="watermark">Lufthansa</span>
                    <span class="name">BOARDING TIME
                        <br>
                        <span>8:25PM 3/18/23</span>
                    </span>
                        

                    <span class="gate">FLIGHT N&deg;<br>
                        <span>X3-65C3</span>
                    </span>

                    <a href=""class="btn-1  name nameslip">Book</a>

                </div>
            </div>
        </div>
    </div>

    
        <div class="listing-item">
            <h2>Listing item 3</h2>
            <p>Description of listing item 3</p>
        </div>
    </div>


    



        

    <script src="https://kit.fontawesome.com/fe66f9ddbe.js" crossorigin="anonymous"></script>
    <script src="land.js"></script>
</body>
</html>