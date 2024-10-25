<?php
require 'config.php';
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function generateOtp($length = 6) {
    return rand(pow(10, $length-1), pow(10, $length)-1);
}

function sendEmail($email, $otp) {
    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // SMTP server
        $mail->SMTPAuth = true;
        $mail->Username = 'lopezjvictor09@gmail.com'; // Your email
        $mail->Password = 'wiml tsdk dxbt kgln'; // Your password
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom('lopezjvictor09@gmail.com', 'James Lopez');
        $mail->addAddress($email);

        $mail->isHTML(true);
        $mail->Subject = 'Your OTP Code';
        $mail->Body = "Your OTP code is: $otp. Please use this code to reset your password.";

        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format";
        exit;
    }

    $otp = generateOtp();

    // Update OTP in database
    $stmt = $conn->prepare("UPDATE user SET code = ? WHERE email = ?");
    $stmt->bind_param("is", $otp, $email);
    $stmt->execute();

    if ($stmt->affected_rows == 1) {
        if (sendEmail($email, $otp)) {
            // Redirect to verification page
            header("Location: Verify Code.php");
            exit; // Ensure no further code is executed after the redirect
        } else {
            echo "Failed to send OTP. Please try again.";
        }
    } else {
        // If no rows were affected, it means the email does not exist in the database
        echo "Email not found in database. Please register first.";
    }
} else 
//{
//    echo "Invalid request.";
//}
?>