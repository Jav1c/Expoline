<?php include('loginserver.php') ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Network Layout Assessment System</title>
    <link rel="icon" type="image/png" sizes="16x16" href="assets\img\added\favi.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="path/to/your/other/styles.css"> <!-- Add your other stylesheets here -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function () {
        $("#toggle-password").click(function () {
            var passwordInput = $("#admin_password");
            var icon = $("#eye-icon");
            var type = passwordInput.attr("type");

            if (type === "password") {
                passwordInput.attr("type", "text");
                icon.removeClass("far fa-eye").addClass("far fa-eye-slash");
            } else {
                passwordInput.attr("type", "password");
                icon.removeClass("far fa-eye-slash").addClass("far fa-eye");
            }
        });
    });

    function clicked() {
        alert("Your email address and password will be saved.");
    }

</script>


<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: sans-serif;
}

section {
    width: 100%;
    height: 100vh;
}

body {
    background: linear-gradient(to bottom, #000000, #5e427c);
}

.main-content {
padding-top: 40px;
padding-bottom: 40px; /* Add padding to the main content for better visibility */
    }

.form-group {
  display: flex;
   align-items: center;
   justify-content: space-between;
   background-color: #FFFFFF;

    }

.form-group-a {
display: flex;
align-items: center;
justify-content: space-between;

    }

.form-group .remember-me {
        margin-right: 10px;
    } 

    

.RuleWithText {
        display: flex;
        align-items: center;
        text-align: center;
    }

.RuleWithText::before,
.RuleWithText::after {
        content: "";
        flex: 1;
        border-bottom: 1px solid #000; 
        margin: 0 10px;
    }

.card-body {
    background: linear-gradient(to right, #D5D3F1, #5BD4DF); 
    border-radius: 15px; 
}

.form-group input,
.form-group button {
    background: transparent;
    border: none;
    border-bottom: 2px solid #595CFF;
    color: #000000;
}

.form-group input::placeholder {
    color: gray;
}

.form-group input:focus,
.form-group button:focus {
    outline: none;
    color: #5E427C;

}

.custom-checkbox .custom-control-label::before {
    background: linear-gradient(to right, #d5d3f1, #d5d3f1);
    border-color: #fff;
}

.btn-primary {
    background: linear-gradient(to right, #5E427C, #595CFF);
    border: none;
}

</style>
    </head>
    
        <body class="bg-dark">
            <div class="main-content">
                    <div class="container">
                        <div class="header-body text-center mb-7">
                                <!-- Add the logo here -->
                                <img src="assets/img/added/logo.png" alt="Your Logo" class="img-fluid" width="100" height="50">
                                <!-- End logo section -->
                                    <h1 class="text-center" style="color: #d5d3f1;">Network Layout Assessment System</h1>
                                        <div class="container">
                                            <div class="row justify-content-center">
                                            <!-- Move the h1 tag inside the col-lg-5 col-md-7 div -->
                                                <div class="col-lg-5 col-md-7"><div>
                                                    <div class="card-body px-lg-5 py-lg-5">                                   
                                    <!-- Form starts here -->
                                    <header><image src="assets/img/added/login00.png" class="img-fluid" width="100" height="50"></header>
                                        <h2 style="text-align: center; color: #5E427C">CUSTOMER PORTAL | LOG IN</h2>
                                            <form method="post" role="form">
                                                <div class="form-group">
                                                    <div class="input-group input-group-alternative">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                                </div>
                                                <input class="form-control" required name="admin_email" placeholder="Email Address"
                                                    type="email">
                                                </div>
                                            </div>
                                        <div class="form-group">
                                            <div class="input-group input-group-alternative">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                                </div>
                                                <input class="form-control" required name="admin_password" placeholder="Password" type="password" id="admin_password">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text" style="cursor: pointer;" id="toggle-password">
                                                            <i class="far fa-eye" id="eye-icon"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        <div class="form-group-a mb-3">
                                    <div class="custom-control custom-checkbox remember-me">
                                        <input type="checkbox" class="custom-control-input" id="rememberMe">
                                        <label class="custom-control-label" onclick="clicked()" for="rememberMe">Remember Me</label>
                                    </div>
                                            <p class="mb-0">
                                                <a href="forgot_password.php">Forgot Password?</a>
                                            </p>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" name="login" class="btn btn-primary btn-block">Sign In</button>
                                        </div>
                                        <div class="mb-3"> 
                                        
                                        <div class="RuleWithText Signup__social-separator mt-xs-3">OR</div>
                                         <div class="text-center">
                                            <p class="mb-0">Don't have an account? <a href="add_user.php">Sign Up</a></p>
                                        </div>
                                    </form>                                 
                                </div>                     
                            </div>                     
                        </div>               
                    </div>
                </div>              
            </div>         
        </div>
        
        <!-- Page content -->
        <div class="container mt--8 pb-5">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-7">

                </div>
            </div>
        </div>
    </div>
</div>

                <?php require_once('partials/_footer.php'); ?>
        </body>

</html>