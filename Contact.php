<?php
require 'config.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Include Composer's autoloader

$admin_email = 'lopezjvictor09@gmail.com';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $mail = new PHPMailer(true);
    try {
        //Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Set the SMTP server to send through
        $mail->SMTPAuth = true;
        $mail->Username = 'lopezjvictor09@gmail.com'; // SMTP username
        $mail->Password = 'wiml tsdk dxbt kgln'; // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587; // TCP port to connect to

        //Recipients
        $mail->setFrom($email, $name);
        $mail->addAddress($admin_email); // Add a recipient

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'Contact Form Submission: ' . $subject;
        $mail->Body    = 'Name: ' . $name . '<br>Email: ' . $email . '<br>Message: ' . nl2br($message);

        $mail->send();
        header('Location: home.php');
        exit;
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link rel="icon" href="contact-us.png" type="image/png">
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
            border-radius: 12px;
            /* Rounder corners for the container */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            position: relative;
            padding: 20px;
            box-sizing: border-box;
        }

        .contact-info-section {
            flex: 1;
            padding: 20px;
            background-color: #2D3748;
            color: white;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            /* Left align all content */
            justify-content: space-between;
            /* Space between items to push social icons to the bottom */
            position: relative;
        }

        .contact-info-section h2 {
            margin-top: 20px;
            margin-bottom: 10px;
            /* Increase margin-bottom for alignment */
            font-size: 24px;
            font-weight: bold;
        }

        .contact-info-section p:first-of-type {
            margin-top: 0;
            margin-bottom: 20px;
            /* Adjusted margin-bottom to match the h2 margin-bottom */
            font-size: 16px;
            line-height: 1.6;
        }

        .contact-info-section p {
            margin: 15px 0;
            /* Margin for spacing between remaining lines */
            font-size: 16px;
            line-height: 1.6;
            /* Increased line-height for more vertical spacing */
        }

        .contact-info-section .highlight {
            color: #007bff;
            /* Same color as submit button */
        }

        .contact-info-section .contact-details {
            margin-top: 20px;
            margin-bottom: 20px;
            /* Ensure there's space at the bottom for alignment */
            flex: 1;
            /* Allow this section to grow and push social icons to the bottom */
            display: flex;
            flex-direction: column;
            justify-content: center;
            /* Center content vertically */
        }

        .contact-info-section .contact-details p {
            margin: 20px 0;
            /* Increase margin to add more space between lines */
            line-height: 1.8;
            /* Adjust line-height for more vertical spacing within the paragraph */
        }

        .contact-info-section .contact-details i {
            margin-right: 15px;
            /* Add space between icon and text */
        }

        .contact-info-section .social-icons {
            margin-top: 20px;
            /* Space from the contact details */
            margin-bottom: 20px;
            /* Ensure consistent bottom margin */
            display: flex;
            gap: 15px;
            align-items: center;
            justify-content: flex-start;
        }

        .contact-info-section .social-icons a {
            color: white;
            font-size: 20px;
            text-decoration: none;
        }

        .form-section {
            flex: 1.5;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 20px;
            box-sizing: border-box;
        }

        .form-section h2 {
            margin-top: 0;
            margin-bottom: 10px;
            font-size: 24px;
            font-weight: bold;
            color: #333333;
            /* Same color as submit button */
        }

        .form-section .button-group {
            display: flex;
            flex-direction: row;
            /* Align buttons horizontally */
            gap: 20px;
            /* Spacing between buttons */
            margin-bottom: 20px;
        }

        .form-section .button-group button {
            background-color: white;
            color: #2D3748;
            padding: 10px;
            font-size: 16px;
            border: 2px solid #2D3748;
            border-radius: 20px;
            /* More rounded edges */
            cursor: pointer;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .form-section .button-group button.clicked {
            background-color: #2D3748;
            color: white;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            margin-bottom: 15px;
            position: relative;
        }

        .form-group label {
            margin-bottom: 5px;
            font-size: 14px;
            color: #007bff;
            /* Same color as submit button */
        }

        .form-group input,
        .form-group textarea {
            padding: 10px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 4px;
            width: 100%;
            box-sizing: border-box;
        }

        .form-group textarea {
            resize: none;
        }

        .submit-btn {
            width: 50%;
            padding: 10px;
            font-size: 16px;
            border-radius: 20px;
            /* More rounded edges */
            cursor: pointer;
            background-color: #2D3748;
            border: none;
            color: #fff;
            display: block;
            margin: 10px auto;
            /* Center button horizontally */
        }

        .back-button {
            font-size: 14px;
            text-decoration: none;
            color: #007bff;
            display: block;
            margin-bottom: 20px; /* Spacing between button and content */
            font-weight: bold;
        }

        .back-button .arrow {
            font-size: 16px;
            margin-right: 5px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="contact-info-section">
            <h2>Contact Information</h2>
            <p>Let’s talk on something <span class="highlight">great</span> together!</p>
            <div class="contact-details">
                <p><i class="fas fa-phone-alt"></i>(02) 7263 8821</p>
                <p><i class="fas fa-envelope"></i>museonijoserizalfortsantiago@gmail.com</p>
                <p><i class="fas fa-map-marker-alt"></i>Fort Santiago, General Luna St, Intramuros, Manila, 1002 Metro
                    Manila</p>
            </div>
            <div class="social-icons">
                <a href="https://www.facebook.com/mjrfsofficial/?locale=tl_PH"><i class="fab fa-facebook"></i></a>
                <a href="https://www.youtube.com/c/IntramurosAdministration?app=desktop"><i class="fab fa-youtube"></i></a>
                <a href="https://www.instagram.com/intramurosph/?hl=en"><i class="fab fa-instagram"></i></a>
                <a href="https://x.com/Intramuros"><i class="fab fa-twitter"></i></a>
            </div>
        </div>

        <div class="form-section">
            <a href="Home.php" class="back-button"><span class="arrow">&larr;</span> Back to Home</a>
            <h2>Select Subject?</h2>
            <div class="button-group">
                <button type="button" class="subject-button" value="General Inquiry">General Inquiry</button>
                <button type="button" class="subject-button" value="Tech Inquiry">Tech Inquiry</button>
                <button type="button" class="subject-button" value="Others">Others</button>
            </div>

            <form action="" method="post" id="contactForm">
                <input type="hidden" name="subject" id="subject" value=""> <!-- Hidden input for subject -->
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" placeholder="Name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="Email" required>
                </div>
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea id="message" name="message" rows="5" placeholder="Write your message here..." required></textarea>
                </div>
                <button class="submit-btn" type="submit">Send message</button>
            </form>
        </div>

        <script>
            const buttons = document.querySelectorAll('.subject-button');
            const subjectInput = document.getElementById('subject');
            
            buttons.forEach(button => {
                button.addEventListener('click', () => {
                    // Set the subject input value to the button's value
                    subjectInput.value = button.value;
                    // Highlight the clicked button
                    buttons.forEach(btn => btn.classList.remove('clicked'));
                    button.classList.add('clicked');
                });
            });
        </script>
</body>

</html>
