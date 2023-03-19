<?php 
require_once('config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

    //Getting the user's data and snitize it
    // $departure_airport = mysqli_real_esc($_POST['depart_airport']);
    // $arrival_airport = $_POST['arrival_airport'];
    // $depart_date = $_POST['depart_date'];
    // $arrival_date = $_POST['arrival_date'];
    // $price = $_POST['price'];

    $departure_airport = mysqli_real_escape_string($db_connection, $_POST['departure_location']);
    $arrival_airport = mysqli_real_escape_string($db_connection, $_POST['arrival_location']);
    $depart_date = mysqli_real_escape_string($db_connection, $_POST['departure_date']);
    $arrival_date = mysqli_real_escape_string($db_connection, $_POST['departure_date']);
    $price = mysqli_real_escape_string($db_connection, $_POST['price']);
    
    // Use prepared statements
    $stmt = $conn->prepare("INSERT INTO tickets (departure_location, arrival_location, departure_date, price) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("sssi", $departure_location, $arrival_location, $departure_date, $price);
    $stmt->execute();


    // Insert the new user data into the database
    $sql = "INSERT INTO users (username, email, password, FirstName, LastName, PhoneNumber)
            VALUES ('$user', '$email', '$password', '$FirstName', '$LastName', '$PhoneNumber')";

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