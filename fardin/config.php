<?php
global $db_connection;

//Connect to the databse using mysqli
$servername = "oceanus.cse.buffalo.edu:3306";
$username = "mamuin";
$password = "50424784";
$dbname = "cse442_2023_spring_team_y_db";

$db_connection = mysqli_connect($servername, $username, $password, $dbname);

//Check conncection
if(mysqli_connect_error()){
    die("Error connecting to the database: " . mysqli_connect_error());
}

// Function to sanitize input to prevent HTML injection
function sanitize($input) {
    return htmlentities($input, ENT_QUOTES, 'UTF-8');
  }
  
  // Function to sanitize input and prevent SQL injection
  function sanitize_sql($input) {
    global $db_connection;
    return mysqli_real_escape_string($db_connection, $input);
  }
  
  // Function to hash a password using bcrypt
  function hash_password($password) {
    $options = array('cost' => 12);
    return password_hash($password, PASSWORD_BCRYPT, $options);
  }


?>