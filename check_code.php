<?php 
require 'config.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //$email = $_POST['email']; // Correct variable for email
    $otp = $_POST['code']; // Correct variable for OTP

    // Check if the OTP exists in the database
    $stmt = $conn->prepare("SELECT * FROM user WHERE code = ?");
    $stmt->bind_param("s", $otp); // Bind one string variable for the OTP
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        header("Location: Set Password.php");
        exit; 
        // Optionally, delete the OTP from the database after successful verification
    } else {
        echo "Invalid OTP. Please try again.";
    }
}
?>