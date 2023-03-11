<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check if the user is logged in
    if (!isset($_SESSION['user_id'])) {
        echo 'You are not logged in.';
        exit;
    }

    // Get the user ID from the session
    $user_id = $_SESSION['user_id'];

    // Connect to the database
    $host = 'your_database_host';
    $username = 'your_database_username';
    $password = 'your_database_password';
    $dbname = 'your_database_name';

    $conn = new mysqli($host, $username, $password, $dbname);

    // Check if the connection was successful
    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    }

    // Delete the user account from the database
    $sql = "DELETE FROM users WHERE id = $user_id";

    if ($conn->query($sql) === TRUE) {
        // Destroy the session and redirect the user to the homepage
        session_destroy();
        header('Location: index.php');
        exit;
    } else {
        echo 'Error deleting account: ' . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>