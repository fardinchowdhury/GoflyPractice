<?php
global $db_connection;

//Connect to the databse using mysqli
$servername = "oceanus.cse.buffalo.edu:3306";
$username = "mamuin";
$password = "50424784";
$dbname = "cse442_2023_spring_team_y_db";

$db_connection = new mysqli($servername, $username, $password, $dbname);

//Check conncection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>