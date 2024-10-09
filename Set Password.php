<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Set a New Password</title>
    <link rel="icon" href="set-password.png" type="image/png">
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
            position: relative;
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
            margin-left: auto;
            margin-right: auto;
        }

        .form-group .toggle-password {
            position: absolute;
            top: 65%;
            right: 10px;
            transform: translateY(-50%);
            cursor: pointer;
            font-size: 16px;
            color: #555;
        }

    </style>
</head>

<body>
    <div class="container">
        <div class="image-section">
            <img src="exln-bg.jpg" alt="Logo">
            <div class="logo-overlay"></div>
        </div>
        <div class="form-section">
            <a href="Log In.html" class="back-button"><span class="arrow">&larr;</span> Back to Login</a>
            <h2>Set a New Password</h2>
            <p class="subtitle">Your previous password has been reseted. Please set a new password for your account.</p>
            <div class="form-group">
                <label for="new-password">New Password</label>
                <input type="password" id="new-password" placeholder="Enter new password">
                <i class="fas fa-eye toggle-password" id="toggleNewPassword"></i>
            </div>
            <div class="form-group">
                <label for="confirm-password">Confirm Password</label>
                <input type="password" id="confirm-password" placeholder="Confirm new password">
                <i class="fas fa-eye toggle-password" id="toggleConfirmPassword"></i>
            </div>
            <button class="submit-btn">Submit</button>
        </div>
    </div>

    <script>
        const toggleNewPassword = document.querySelector('#toggleNewPassword');
        const newPassword = document.querySelector('#new-password');
        const toggleConfirmPassword = document.querySelector('#toggleConfirmPassword');
        const confirmPassword = document.querySelector('#confirm-password');

        toggleNewPassword.addEventListener('click', function () {
            const type = newPassword.getAttribute('type') === 'password' ? 'text' : 'password';
            newPassword.setAttribute('type', type);
            this.classList.toggle('fa-eye-slash');
        });

        toggleConfirmPassword.addEventListener('click', function () {
            const type = confirmPassword.getAttribute('type') === 'password' ? 'text' : 'password';
            confirmPassword.setAttribute('type', type);
            this.classList.toggle('fa-eye-slash');
        });
    </script>
</body>

</html>
