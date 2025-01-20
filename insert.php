<?php 
include 'connection.php';

if (isset($_POST['submit'])) {
    // Fetching form data
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $dob = $_POST['dob'];
    $password = $_POST['password'];
    $repeat_password = $_POST['repeat_password'];

    // Check if the user is already registered
    $checkQuery = "SELECT * FROM `register` WHERE `email` = '$email'";
    $checkResult = mysqli_query($conn, $checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
        // User already registered
        echo '<script>alert("You are already registered!")</script>';
    } else {
        // SQL Insert Query for registration
        $ins = "INSERT INTO `register`(`firstname`, `lastname`, `email`, `dob`, `password`, `repeat_password`) 
        VALUES ('$firstname','$lastname','$email','$dob','$password','$repeat_password')";

        // Execute query
        $res = mysqli_query($conn, $ins);

        if ($res) {
            // After successful registration, create a table
            $createTable = "CREATE TABLE `$firstname` (
                `Id` INT(10) NOT NULL AUTO_INCREMENT,
                `Date` DATE NOT NULL,
                `Start time` TIME NOT NULL,
                `End Time` TIME NOT NULL,
                `total time` TIME NOT NULL,
                PRIMARY KEY (`Id`)
            )";

            $tableResult = mysqli_query($conn, $createTable);

            if ($tableResult) {
                echo '<script>alert("Welcome!!")</script>';
                header('location:login.php'); // Redirect to login page
            } else {
                echo '<script>alert("Registration successful, but table creation failed.")</script>';
            }
        } else {
            echo "Failed to register user";
        }
    }
}
?>