<?php
require_once('config.php');


// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

     // Get the user input and sanitize the user inputs
     $user = sanitize($_POST['uid']);
     $email = sanitize($_POST['email']);
     $password = sanitize($_POST['pwd']);
     $FirstName = sanitize($_POST['fname']);
     $LastName = sanitize($_POST['lname']);
     $PhoneNumber = sanitize($_POST['num']);

    $user = sanitize_sql($user);
    $email = sanitize_sql($email);
    $password = sanitize_sql($password);
    $FirstName = sanitize_sql($FirstName);
    $LastName = sanitize_sql($LastName);
    $PhoneNumber = sanitize_sql($PhoneNumber);
 


    $hashed_password = hash_password($password);
    
    // Insert the new user data into the database
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