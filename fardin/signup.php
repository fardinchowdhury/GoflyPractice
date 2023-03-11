<?php
require_once('config.php');


// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

//   // Connect to the database (replace with your own database credentials)
//     $servername = "oceanus.cse.buffalo.edu:3306";
//     $username = "mamuin";
//     $password = "50424784";
//     $dbname = " cse442_2023_spring_team_y_db";

//     $conn = new mysqli($servername, $username, $password, $dbname);


     // Get the user input
     $user = $_POST['uid'];
     $email = $_POST['email'];
     $password = $_POST['pwd'];
     $FirstName = $_POST['fname'];
     $LastName = $_POST['lname'];
     $PhoneNumber = $_POST['num'];
 
     // Validate the user input (e.g. check for empty fields, validate email address, etc.)
     // ...
 
    //  // Hash the password for security
    //  $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // if ($conn->connect_error) {
    //     die("Connection failed: " . $conn->connect_error);
    // }

    // Insert the new user data into the database
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (username, email, password, FirstName, LastName, PhoneNumber)
            VALUES ('$user', '$email', '$hashed_password', '$FirstName', '$LastName', '$PhoneNumber')";

    if (mysqli_query($db_connection, $sql)) {
        // Redirect the user to the login page
        header("Location: login.html");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($db_connection);
    }

    mysqli_close($db_connection);

}

?>