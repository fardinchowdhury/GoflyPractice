<?php

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Get the user input
    $username = $_POST['uid'];
    $email = $_POST['email'];
    $password = $_POST['pwd'];

    // Validate the user input (e.g. check for empty fields, validate email address, etc.)
    // ...

    // Hash the password for security
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Connect to the database (replace with your own database credentials)
    $servername = "oceanus.cse.buffalo.edu:3306";
    $username = "mamuin";
    $password = "50424784";
    $dbname = "mamuin_db";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert the new user data into the database
    $sql = "INSERT INTO users (username, email, password)
            VALUES ('$username', '$email', '$hashedPassword')";

    if ($conn->query($sql) === TRUE) {
        // Redirect the user to the login page
        header("Location: login.html");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();

}

?>