<?php
require 'send_otp.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link rel="icon" href="forgot-password.png" type="image/png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-image: url('https://intramuros.gov.ph/wp-content/uploads/2022/07/0-02-06-6968bc2e52d8bdb29f34018a55e8950ff11d691200d87c3dafc2b49e19dbce57_1c6dac188bb56d.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-color: #f8f9fa;
        }

        .container {
            display: flex;
            flex-direction: row;
            width: 90%;
            max-width: 1200px;
            height: 90%;
            max-height: 700px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            position: relative;
            padding: 20px;
        }

        .image-section {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
        }

        .image-section img {
            width: 100%;
            height: auto;
            object-fit: cover;
        }

        .form-section {
            flex: 1.5;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 20px;
            box-sizing: border-box;
        }

        .back-button {
            font-size: 14px;
            text-decoration: none;
            color: #007bff;
            display: block;
            text-align: left;
            margin-bottom: 20px;
            font-weight: bold;
        }

        .back-button .arrow {
            font-size: 16px;
            margin-right: 5px;
        }

        .form-section h2 {
            margin-top: 0;
            margin-bottom: 10px;
            font-size: 24px;
            font-weight: bold;
            text-align: left;
        }

        .form-section p.subtitle {
            margin: 0 0 20px 0;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            margin-bottom: 15px;
        }

        .form-group label {
            margin-bottom: 5px;
            font-size: 14px;
            color: #333;
        }

        .form-group input {
            padding: 10px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 4px;
            width: 100%;
            box-sizing: border-box;
        }

        .submit-btn {
            width: 50%;
            /* Reduced the width to 50% to make the button narrower */
            padding: 10px;
            font-size: 16px;
            border-radius: 4px;
            cursor: pointer;
            background-color: #007bff;
            border: none;
            color: #fff;
            margin-bottom: 10px;
            margin-top: 10px;
            display: block;
            /* Ensure the button remains a block-level element */
            margin-left: auto;
            /* Center the button horizontally */
            margin-right: auto;
            /* Center the button horizontally */
        }

        .separator {
            display: flex;
            align-items: center;
            text-align: center;
            margin: 10px 0;
        }

        .separator::before,
        .separator::after {
            content: '';
            flex: 1;
            border-bottom: 1px solid #ccc;
        }

        .separator::before {
            margin-right: 10px;
        }

        .separator::after {
            margin-left: 10px;
        }

        .google-btn {
            width: 100%;
            /* Reduced the width to 50% to match the Submit button */
            padding: 10px;
            /* Reduced padding to make the button shorter in height */
            font-size: 16px;
            border-radius: 20px;
            /* Increased the border-radius to make corners rounder */
            cursor: pointer;
            background-color: #2D3748;
            border: 1px solid #ccc;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-left: auto;
            /* Center the button horizontally */
            margin-right: auto;
            /* Center the button horizontally */
            margin-top: 10px;
            /* Add margin-top for spacing */
        }


        .google-btn img {
            width: 20px;
            height: 20px;
            margin-right: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="image-section">
            <img src="exln-bg.jpg" alt="Logo">
            <div class="logo-overlay"></div>
        </div>
        <form action="send_otp.php" method="POST">
            <div class="form-section">
                <a href="Log In.php" class="back-button"><span class="arrow">&larr;</span> Back to Login</a>
                <h2>Forgot your password?</h2>
                <p class="subtitle">Don't worry, it happens to all of us. Enter your email below to recover your password.</p>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="Email" required>
                </div>
                <button class="submit-btn" type="submit">Submit</button>
            </div>
        </form>
    </div>

</body>

</html>