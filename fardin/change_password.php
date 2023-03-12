<?php

    require_once('config.php');
    // Start the session
    session_start();
    
    // Check if the user is logged in
    if(!isset($_SESSION['username'])) {
        header('Location: login.php');
        exit();
    }
    
    // Check if the form has been submitted
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Retrieve the form data
        $current_password = $_POST['cpwd'];
        $new_password = $_POST['newp'];
        $confirm_password = $_POST['cnewp'];

        //santize and sql injection, and hashing the password.
        $current_password = sanitize($current_password);
        $new_password = sanitize($new_password);
        $confirm_password = sanitize($confirm_password);


        $current_password = sanitize_sql($current_password);
        $new_password = sanitize_sql($new_password);
        $confirm_password = sanitize_sql($confirm_password);




        
        //Check if the input of "current password" is as same as the one in the database;
        //If it doesn't, match, throw an error'
        if(password_verify($current_password, $user['password']) == False){
            $error = "You current password doesnt match the one associated with this account";
        }

        //Check if the new password is same as the confrim pasword;
        //If it doesn't, throw error'
        if (password_verify($new_password, $confirm_password) == False){
            $error = "New passwords do not match";
        }
           
        
        //Check if the old password if not same as the new_password;
        //If it matches then throw an error
        if(password_verify($new_password, $user['password']) == True){
            $error = "Cannot use old password";

        }
        
         else {

            
            // Update password in database
            $username = $_SESSION['username'];
            
            $sql = "UPDATE users SET password='$new_password' WHERE username='$username' AND password='$current_password'";
            
            if (mysqli_query($db_connection, $sql)) {
                // Redirect the user to the login page
                 header("Location: successpw.html");
                 exit;
            } else {
                $error = "Error updating password: " . mysqli_error($db_connection);
            }
            
            mysqli_close($db_connection);
        }
    }
?>