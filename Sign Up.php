<?php
require 'config.php';

if (isset($_POST["submit"])) {
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirmPassword"];
    $dob = $_POST["dob"];

    // Validate input data
    if (empty($firstName)) {
        echo "<script>alert('Please enter a First Name')</script>";
    } elseif (empty($lastName)) {
        echo "<script>alert('Please enter a Last Name')</script>";
    } elseif (empty($email)) {
        echo "<script>alert('Please enter an Email')</script>";
    } elseif (empty($password)) {
        echo "<script>alert('Please enter a password')</script>";
    } elseif (empty($confirmPassword)) {
        echo "<script>alert('Please enter a confirm password')</script>";
    } elseif (empty($dob)) {
        echo "<script>alert('Please enter a date of birth')</script>";
    } elseif ($password != $confirmPassword) {
        echo "<script>alert('Password doesn\'t match')</script>";
    } elseif (strlen($password) < 8 || strlen($password) > 10) {
        echo "<script>alert('Password must be between 8 and 10 characters long')</script>";
    } else {
        // Check if email already exists
        $stmt = $conn->prepare("SELECT * FROM user WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            echo "<script>alert('Username or Email has already taken')</script>";
        } else {
            // Hash password
            $hash = password_hash($password, PASSWORD_DEFAULT);

            // Insert data into database
            $stmt = $conn->prepare("INSERT INTO user (firstName, lasName, email, password, dob) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("sssss", $firstName, $lastName, $email, $hash, $dob);
            $stmt->execute();
            echo "<script>alert('Registration Successful')</script>";
            header("Location:Log In.php");
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="icon" href="sign-up.png" type="image/png">
    <link rel="stylesheet" href="css/register.css">
    
</head>

<body>
    <div class="container">
        <div class="image-section">
            <img src="exln-bg.jpg" alt="Logo">
        </div>
        <div class="form-container">
            <div class="form-section">
                <h2>Create account</h2>
                <p class="subtitle">Fill in your details to get started.</p>  
                <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post">
                    <div class="form-group">
                        <div class="form-group-row">

                            <div class="input-container">
                                <label for="first-name">First name</label>
                                <input type="text" name= "firstName" id="firstName" placeholder="First name">
                            </div>
                            <div class="input-container">
                                <label for="last-name">Last name</label>
                                <input type="text" name= "lastName" id="lastName" placeholder="Last name">
                            </div>
                        </div>
                        <div class="form-group-row">
                            <div class="input-container">
                                <label for="email">Email</label>
                                <input type="email" name = "email"id="email" placeholder="Email">
                            </div>
                            <div class="input-container">
                                <label for="dob">Date of birth</label>
                                <input type="date" name = "dob" id="dob" placeholder="Date of birth">
                            </div>
                        </div>
                        <div class="form-group-row">
                            <div class="input-container">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" placeholder="Password">
                            </div>
                            <div class="input-container">
                                <label for="confirmPassword">Confirm password</label>
                                <input type="password" name="confirmPassword" id="confirmPassword" placeholder="Confirm password">
                            
                            </div>
                        </div>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" id="terms">
                        <label for="terms">I agree to all the <a href="#">Terms and Privacy policy</a></label>
                    </div>
                    <div class="form-actions">
                        <a href="#" class="forgot-password">Forgot password?</a>
                    </div>
                    <div class="buttons-container">
                        <button class="submit-btn" type="submit" name="submit">Create Account</button>
                    </div>
                    <div class="login-link">
                        <p>Don't have an account? <a href="#">Log In</a></p>
                    </div>
                    <div class="separator">
                        <span>or</span>
                    </div>
                    <div class="guest-option">
                        <p><a href="https://app.cloudpano.com/tours/M6RolrHzU">Continue as Guest</a></p>
                    </div>
                </form>

            </div>
        </div>
    </div>

</body>
</html>

