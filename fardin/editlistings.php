<?php
       session_start();
       require_once ("config.php");

       
    //    // Retrieve user data
    //    $username = $_SESSION['username'];
    //    $query = "SELECT * FROM users WHERE username = '$username'";
    //    $result = mysqli_query($db_connection, $query);
    //    $row = mysqli_fetch_assoc($result);

       if($_SERVER["REQUEST_METHOD"] == "POST") {
        $airline = mysqli_real_escape_string($db_connection, $_POST['airline']);
        $flight_number = mysqli_real_escape_string($db_connection, $_POST['flightnumber']);
        $departure = mysqli_real_escape_string($db_connection, $_POST['departure']);
        $arrival = mysqli_real_escape_string($db_connection, $_POST['arrival']);
        $date = mysqli_real_escape_string($db_connection, $_POST['date']);
        $time = mysqli_real_escape_string($db_connection, $_POST['time']);
        $duration = mysqli_real_escape_string($db_connection, $_POST['duration']);
        $price = mysqli_real_escape_string($db_connection, $_POST['price']);
        $seats = mysqli_real_escape_string($db_connection, $_POST['seats']);
        $class = mysqli_real_escape_string($db_connection, $_POST['fclass']);


        // Check if the Flight Number is in the database
        $sql = "SELECT * From flight_listings where flight_number = '$flight_number'";
        
        $result = $db_connection -> query($sql);
        if($result -> num_rows == 0){
            header("Location: editlistings.php");
            $_SESSION['status'] = "The Flight does not exist";
            exit();
        }
        
        $query = "UPDATE  flight_listings SET 
        airline = '$airline', 
        departure = '$departure', 
        arrival = '$arrival' , 
        departure_date = '$date', 
        departure_time ='$time', 
        duration = '$duration', 
        price = '$price', 
        seats = '$seats', 
        class = '$class' WHERE flight_number = '$flight_number'";
        
        if($db_connection->query($query) === TRUE){
            //Redirect to the display listing page
            header("Location: displaylist.php");
            exit();
        }
        else {
            echo "Error: " . $sql . "<br>" . mysqli_error($db_connection);
        }
        $db_connection->close();
        
        
    }
    
       ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="post.css">
    <link rel="stylesheet" href="landing.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plaster&family=Poppins:wght@200&display=swap" rel="stylesheet">
    <title>Edit Listings</title>
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
        <div class="burger">
            <div class="line1"></div>
            <div class="line2"></div>
            <div class="line3"></div>
        </div>
    </nav>

    <div class="container">
        <form autocomplete="off" method="post" class="form" action = 'editlistings.php'>
            <h2>Edit Flight Listing</h2> 
            <p class="sucess">
                <?php
                    if(isset($_SESSION['status'])){
                        echo $_SESSION['status'];
                        unset($_SESSION['status']);
                    }
                ?>
            </p>
            

            <section class="child">
                <p>Airline Name</p>
                <input list="air-name-lists" class="box" type="text" name="airline" placeholder="Ex.. Emirates"required>
                <datalist id="air-name-lists">
                    <option>Emirates</option>
                    <option>Delta</option>
                    <option>Jet Blue</option>
                    <option>American Airlines</option>
                    <option>Qatar</option>
                </datalist>
                
                <p>Flight Number</p>
                <input class="box" type="text" name="flightnumber" Placeholder="Ex..Sk54E" required>

                <p><label for="departure">Departure Airport:</label></p>
                <input list="airports" class="box" type="text" id="departure" name="departure" Placeholder="Ex..JFK" maxlength="3"  required><br>

                <datalist id="airports">
                    <option>JFK</option>
                    <option>BUF</option>
                    <option>SAF</option>
                    <option>LAG</option>
                    <option>DAC</option>
                </datalist>

                <p><label for="arrival">Arrival Airport:</label></p>
                <input list="airports" class= "box" type="text" id="arrival" name="arrival" Placeholder="Ex..Buf"maxlength="3" required><br>

                <datalist id="airports">
                    <option>JFK</option>
                    <option>BUF</option>
                    <option>SAF</option>
                    <option>LAG</option>
                    <option>DAC</option>
                </datalist>

                <p><label for="date">Departure Date:</label></p>
                <input class= "box" type="date" id="date" name="date" required><br>



            </section>
            <section class="child">
                <p><label for="price">Price:</label></p>
                <input class ="box" type="number" id="price" name="price" Placeholder="Ex..654" required><br>

                <p><label for="seats">Available Seats:</label></p>
                <input class ="box" type="number" id="seats" name="seats" Placeholder="Ex..5"required><br>


                <p><label for="seats">Flight Class:</label></p>
                <select class= "box" id="seats" name="fclass">
                    <option value="Economy">Economy</option>
                    <option value="Economy Premium">Economy Premium</option>
                    <option value="Business Class">Busines Class</option>
                    <option value="First Class">First Class</option>
                </select>

                    


                
                
                <p><label for="time">Departure Time:</label></p>
                <input class ="box" type="time" id="time" name="time" required><br>

                <p><label for="duration">Duration In Hours:</label></p>
                <input class ="box" type="text" id="duration" name="duration" Placeholder="Ex..2" required><br>
            </section>
            

            

            
            <input type="submit" value="Edit Listing" id="submit">
        </form>
    </div>



    <script src="https://kit.fontawesome.com/fe66f9ddbe.js" crossorigin="anonymous"></script>
    <script src="land.js"></script>
    
</body>
</html>
