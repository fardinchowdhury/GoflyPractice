<?php

    session_start();            // start the session

    // check if the user is logged in
    if(!isset($_SESSION['username'])) {
        header('Location: login.php');
        exit();
    }

    // Connect to MySQL database
    $servername = "oceanus.cse.buffalo.edu:3306";
    $username = "mamuin";
    $password = "50424784";
    $dbname = "mamuin_db";


    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $conn = new mysqli($servername, $username, $password, $dbname);

        // get user id
        $user = $_POST['uid'];

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
        // Delete user from database
        $sql = "DELETE FROM users WHERE id = $user";

        if ($conn->query($sql) === TRUE) {
            echo "User account deleted successfully";
            header("Location: login.html");
            exit;
        } else {
            echo "Error deleting user account: " . $conn->error;
        }

        // close database connection
        $conn->close();
}
?>
