<?php
global $db_connection;

define('SENDGRID_API_KEY', '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');

//Connect to the databse using mysqli
$servername = "oceanus.cse.buffalo.edu:3306";
$username = "mdhyder";
$password = "50313569";
$dbname = "cse442_2023_spring_team_y_db";

$db_connection = new mysqli($servername, $username, $password, $dbname);

//Check conncection
if ($db_connection->connect_error) {
    die("Connection failed: " . $db_connection->connect_error);
}

?>