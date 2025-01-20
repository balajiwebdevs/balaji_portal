<?php
include 'connection.php';

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Get POST data
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $repeat_password = $_POST['repeat_password'];
    $id = $_POST['id']; // Ensure ID is passed via the form as a hidden field

    // SQL query to update user data
    $ins = "UPDATE `register` SET `firstname`='$firstname', `lastname`='$lastname', `email`='$email',
     `password`='$password', `repeat_password`='$repeat_password' WHERE id='$id'";

    // Execute query
    $res = mysqli_query($conn, $ins);

    // Check if update was successful
    if ($res) {
        echo "Updated successfully!";
        // Optionally redirect to another page
        header('Location: display.php');
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}
 else {
    echo "Form not submitted!";
}
?>