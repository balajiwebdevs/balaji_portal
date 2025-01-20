<?php
include('./connection.php');

$errors = [];
$email = "";

if (isset($_POST['check-email'])) {
    $email = $_POST['email'];

    // Validate the email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }

    // Check if the email exists in the database
    if (empty($errors)) {
        $query = "SELECT * FROM register WHERE email = ?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if ($user) {
            // Generate a reset token and expiry time
            $token = bin2hex(random_bytes(16)); // Generate random token
            $expiry_time = time() + 3600; // Token expiry time (1 hour)

            // Store the reset token and expiry in the password_resets table
            $stmt = $pdo->prepare("INSERT INTO password_resets (email, token, expiry) VALUES (?, ?, ?)");
            $stmt->execute([$email, $token, $expiry_time]);

            // Send the password reset email
            $reset_link = "http://yourdomain.com/reset_password.php?token=" . $token;
            mail($email, "Password Reset Request", "Click the link to reset your password: $reset_link");

            echo "A password reset link has been sent to your email address.";
        } else {
            $errors[] = "No account found with that email address.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Forgot Password</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700" rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body style="background-color:#15284c;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden shadow-lg my-5" style="border:solid 4px #c1b460">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-password-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-2">Forgot Your Password?</h1>
                                        <p class="mb-4">We get it, stuff happens. Just enter your email address below
                                            and we'll send you a link to reset your password!</p>
                                    </div>
                                    <form class="user" method="POST" action="./send_reset_link.php">

                                        <div class="form-group">
                                            <?php if (count($errors) > 0): ?>
                                            <div class="alert alert-danger text-center">
                                                <?php foreach ($errors as $error): ?>
                                                <p><?php echo $error; ?></p>
                                                <?php endforeach; ?>
                                            </div>
                                            <?php endif; ?>
                                            <input type="email" name="email" required value="<?php echo $email; ?>"
                                                class="form-control form-control-user" id="exampleInputEmail"
                                                aria-describedby="emailHelp" placeholder="Enter Email Address...">
                                        </div>
                                        <input type="submit" class="btn btn-user btn-block" name="check-email"
                                            value="Continue" style="background-color:#15284c ; color:white;">
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="./register.php">Create an Account!</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="./login.php">Already have an account? Login!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
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