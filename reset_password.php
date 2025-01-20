<?php
include('./connection.php');

if (isset($_GET['token'])) {
    $token = $_GET['token'];

    // Check if the token is valid and not expired
    $query = "SELECT * FROM password_resets WHERE token = ? AND expiry > ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$token, time()]);
    $reset_request = $stmt->fetch();

    if ($reset_request) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process the password reset
            $new_password = $_POST['new_password'];
            $confirm_password = $_POST['confirm_password'];

            if ($new_password === $confirm_password) {
                // Hash the password and update in the users table
                $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

                // Update the user's password
                $stmt = $pdo->prepare("UPDATE users SET password = ? WHERE email = ?");
                $stmt->execute([$hashed_password, $reset_request['email']]);

                // Delete the reset token from the database
                $stmt = $pdo->prepare("DELETE FROM password_resets WHERE token = ?");
                $stmt->execute([$token]);

                echo "Your password has been updated!";
            } else {
                echo "Passwords do not match.";
            }
        }
    } else {
        echo "Invalid or expired reset token.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Reset Password</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700" rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body style="background-color:#15284c;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-8 col-md-10">
                <div class="card o-hidden shadow-lg my-5">
                    <div class="card-body p-5">
                        <h1 class="h4 text-center text-gray-900 mb-2">Reset Your Password</h1>

                        <form action="reset_password.php?token=<?php echo $_GET['token']; ?>" method="POST">
                            <div class="form-group">
                                <input type="password" class="form-control form-control-user" name="new_password"
                                    placeholder="New Password" required>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control form-control-user" name="confirm_password"
                                    placeholder="Confirm Password" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-user btn-block">Reset Password</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/sb-admin-2.min.js"></script>
</body>

</html>