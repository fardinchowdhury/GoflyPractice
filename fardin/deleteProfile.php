<?php

    // start the session
    session_start();

    $servername = "oceanus.cse.buffalo.edu:3306";
    $user = "mamuin";
    $password = "50424784";
    $dbname = "mamuin_db";
    
    
    // Get the user ID
    $user_id = $_SESSION['username'];
    

    $conn = new mysqli($servername, $user, $password, $dbname);
    

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    // Get the password entered by the user
    $password = $_POST['password'];
    
    // Query the database for the user's password
    $sql = "SELECT password FROM users WHERE username = '$user_id'";
    $result = $conn->query($sql);
    
    // Check if the query was successful
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $stored_password = $row['password'];
    
        // Check if the entered password matches the stored password
        if (password_verify($password, $stored_password)) {
            // Delete the user's profile
            $sql = "DELETE FROM users WHERE 'username' = '$user_id'";
            if ($conn->query($sql) === TRUE) {
                // Logout the user
                session_destroy();
                header("Location: signup.php");         // redirect to the signup page
                exit;
            }
        } else {
            // profile deletion failed because the password was incorrect
            echo "Invalid password.";
        }
    }
    
    // Close the database connection
    $conn->close();

    ?>
    
