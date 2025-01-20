<?php
// Include Composer autoloader
require 'vendor/autoload.php';

// Include the connection file
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

            // Send the password reset email using PHPMailer
            $mail = new PHPMailer\PHPMailer\PHPMailer();
            try {
                // Server settings
                $mail->isSMTP();
                $mail->Host = 'smtp.mailersend.net';  // Use your SMTP server
                $mail->SMTPAuth = true;
                $mail->Username = 'your_api_key';  // Use your Mailersend API key
                $mail->Password = 'your_api_key';  // Use your Mailersend API key
                $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = 587;

                // Recipients
                $mail->setFrom('your_email@example.com', 'Your Name');
                $mail->addAddress($email);  // Send to the email entered by the user

                // Content
                $mail->isHTML(true);
                $mail->Subject = 'Password Reset Request';
                $mail->Body    = 'Click the link to reset your password: <a href="http://yourdomain.com/reset_password.php?token=' . $token . '">Reset Password</a>';
                $mail->AltBody = 'Click the link to reset your password: http://yourdomain.com/reset_password.php?token=' . $token;

                $mail->send();
                echo 'A password reset link has been sent to your email address.';
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        } else {
            $errors[] = "No account found with that email address.";
        }
    }
}
?>