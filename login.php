<?php 
session_start(); // Start session to manage login state
include ('connection.php'); // Include the database connection

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Query the database to check for user credentials
    $query = "SELECT * FROM register WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        // Fetch user data
        $user = mysqli_fetch_assoc($result);

        // User found, start the session
        $_SESSION['logged_in'] = true;
        $_SESSION['firstname'] = $user['firstname'];
        $_SESSION['lastname'] = $user['lastname'];
        $_SESSION['is_admin'] = $user['is_admin']; // Assuming 'is_admin' column in the database

        // Redirect based on user role
        if ($user['is_admin'] == 1) { // Assuming 1 = Admin, 0 = User
            header("Location: admin/admin_index.php"); // Redirect to admin dashboard
        } else {
            header("Location: user/user_index.php"); // Redirect to user dashboard
            //Send email to dashboard for finding timing field of user
        }
        exit();
    } else {
        $error = "Invalid email or password.";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
    body {
        margin: 0;
        padding: 0;
        font-family: 'Nunito', sans-serif;
        /* background: linear-gradient(to bottom right, #001f3f, #15284c); */
        background-image: url('./img/rm314-adj-05-a.jpg');
        background-repeat: no-repeat;
        background-size: 100% 100%;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        color: white;
    }

    .login-container {
        width: 350px;
        //background-color: rgb(0, 0, 0);
        background: rgba(248, 247, 247, 0.2);
        border-radius: 10px;
        border: solid 1px white;
        box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
        padding: 30px;
        text-align: center;
        position: relative;
    }

    .profile-icon {
        width: 80px;
        height: 80px;
        background: #15284c;
        color: white;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 40px;
        margin: 0 auto -40px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    }

    h2 {
        margin: 60px 0 20px;
        color: #333;
        font-size: 22px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group input {
        width: 100%;
        padding: 10px;
        font-size: 16px;
        border: 1px solid #ddd;
        border-radius: 5px;
        box-shadow: inset 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .remember-me {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
        font-size: 14px;
    }

    .remember-me input {
        margin-right: 5px;
    }

    .btn-login {
        width: 100%;
        padding: 10px;
        font-size: 16px;
        color: white;
        background: #15284c;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        margin-top: 10px;
        border: solid 1px white;
        transition: background 0.3s ease, transform 0.2s ease;
    }

    .btn-login:hover {
        /* background: #001f3f; */
        background: #001f3f;
        /* Change the background color on hover */
        transform: scale(1.05);
        /* Slightly increase the size */
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
    }

    .links {
        margin-top: 15px;
        font-size: 14px;
    }

    .links a {
        text-decoration: none;
        color: white;
    }

    .links a:hover {
        color: #c1b460;
    }

    .img {
        background-repeat: no-repeat;
        background-size: 100% 100%;
        width: 80%;
    }

    .ft_pass {
        color: white;
        text-decoration: none;
    }

    .ft_pass:hover {
        color: #c1b460;

    }
    </style>

</head>

<body>
    <div class="login-container">
        <div class="profile-icon">

            <img src="./img/fav_white.png" alt="" class="img">
        </div>
        <h2 style="color: white;">Welcome Back!</h2>
        <form method="post" action="">
            <div class="form-group">
                <input type="email" name="email" placeholder="Email ID" required>
            </div>
            <div class="form-group">
                <input type="password" name="password" placeholder="Password" required>
            </div>
            <div class="remember-me">
                <label><input type="checkbox" name="remember"> Remember me</label>
                <a href="./forgot-password.php" class="ft_pass">Forgot Password?</a>
            </div>
            <button type="submit" class="btn-login">Login</button>
        </form>
        <div class="links">
            <a href="./register.php">Create an Account!</a>
        </div>
    </div>
</body>

</html>