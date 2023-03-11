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
    die("Error connecting to teh database: " . mysqli_connect_error());
}

?>