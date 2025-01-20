<?php 
include 'connection.php';

if(isset($_POST['submit'])){
    // Fetching form data
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $dob = $_POST['dob'];
    $password = $_POST['password'];
    $repeat_password = $_POST['repeat_password'];

    // Check if passwords match
    if($password !== $repeat_password) {
        echo '<script>alert("Passwords do not match.");</script>';
        exit;
    }

    // Hash the password before storing it
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // SQL Insert Query
    $ins = "INSERT INTO `register`(`firstname`, `lastname`, `email`, `dob`, `password`, `repeat_password`)
    VALUES ('$firstname', '$lastname', '$email', '$dob', '$hashed_password', '$hashed_password')";

    // Execute query
    $res = mysqli_query($conn, $ins);

    // Check if insertion was successful
    if($res) {
        echo '<script>alert("Registration successful!");</script>';
        header('Location: login.php');
    } else {
        echo "Failed to insert data";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Portal_balaji</title>

    <!-- Custom fonts and styles -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,800,900" rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="./sign_style.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="card shadow-lg">
            <!-- Layout Wrapper -->
            <div class="row no-gutters">

                <!-- Right Section -->
                <section class="col-lg-6 bg-white p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4" id="sign">Sign In</h1>
                    </div>
                    <form method="post" action="insert.php" enctype="multipart/form-data">
                        <!-- First Name and Last Name -->
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3">

                                <input type="text" class="form-control" id="FirstName" name="firstname"
                                    placeholder="First Name" required>
                            </div>
                            <div class="col-sm-6">

                                <input type="text" class="form-control" id="LastName" name="lastname"
                                    placeholder="Last Name" required>
                            </div>
                        </div>

                        <!-- Email Address -->
                        <div class="form-group">

                            <input type="email" class="form-control" id="email" name="email" placeholder="Email Address"
                                required>
                        </div>

                        <!-- Date of Birth -->
                        <div class="form-group">
                            <label for="dob">Date of Birth</label>
                            <input type="date" class="form-control" id="dob" name="dob" required>
                        </div>

                        <!-- Password and Repeat Password -->
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3">

                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="Password" required>
                            </div>
                            <div class="col-sm-6">

                                <input type="password" class="form-control" id="repeat_password" name="repeat_password"
                                    placeholder="Repeat Password" required>
                            </div>
                        </div>
                        <div id="password-error" style="color: red; display: none;">Passwords do not match.</div>

                        <!-- Submit Button -->
                        <button type="submit" id="submit-button" name="submit" class="btn btn-block"
                            style="background-color: #15284c; color: white;">Sign In</button>
                        <hr>

                        <!-- Register with Google -->
                        <a href="./index.php" class="btn btn-google btn-user btn-block"
                            style="background-color: #c1b460;">
                            <i class="fab fa-google fa-fw"></i> Register with Google
                        </a>

                        <hr>
                        <!-- Additional Links -->
                        <div class="text-center">
                            <a class="small" href="./forgot-password.php">Forgot Password?</a>
                        </div>
                        <div class="text-center">
                            <a class="small" href="./login.php">Already have an account? Login!</a>
                        </div>
                    </form>
                </section>

                <!-- Left Section -->
                <section class="col-lg-6 bg-dark text-white text-center p-5 left-section">
                    <h1>Welcome to Login</h1>

                    <a href="./login.php" class="btn btn-light btn-user log_btn" class="log_btn">Log In</a>

                </section>
            </div>
        </div>
    </div>

    <!-- Bootstrap and Custom Scripts -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/sb-admin-2.min.js"></script>
    <script>
    const password = document.getElementById("password");
    const repeatPassword = document.getElementById("repeat_password");
    const errorMessage = document.getElementById("password-error");
    const submitButton = document.getElementById("submit-button");

    submitButton.addEventListener("click", function(event) {
        if (password.value !== repeatPassword.value) {
            errorMessage.style.display = "block";
            errorMessage.textContent = "Passwords do not match.";
            event.preventDefault();
        } else {
            errorMessage.style.display = "none";
        }
    });
    </script>
</body>

</html>