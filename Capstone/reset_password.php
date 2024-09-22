<?php session_start() ;

include('config/config.php');
?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="icon" type="image/png" sizes="16x16" href="assets\img\added\favi.png">

<!------ Include the above in your HEAD tag ---------->
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password </title>

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
padding-bottom: 40px; 
    }


.card-body {
    background: linear-gradient(to right, #D5D3F1, #5BD4DF); 
    border-radius: 15px; 
}

.btn-primary {
    background: linear-gradient(to right, #5E427C, #595CFF);
    border: none;
}
        
</style>

</head>


<div class="main-content">
  <div class="container">
         <div class="header-body text-center mb-7">
               <!-- Add the logo here -->
                 <img src="assets/img/added/logo.png" alt="Your Logo" class="img-fluid" width="100" height="50">
                    <!-- End logo section -->
                    <h1 class="text-center" style="color: #d5d3f1;">Network Layout Assessment System</h1>
                       <br><br><br>
                          <div class="container">
                              <div class="row justify-content-center">
                                  <!-- Move the h1 tag inside the col-lg-5 col-md-7 div -->
                                     <div class="col-lg-5 col-md-7">
                                       <div class="card-body px-lg-5 py-lg-5">
                           
                                <!-- Top navbar -->
                                <body>
                                   <form action="#" method="POST" name="login">
                                      <h2 style="text-align: center; color: #5E427C">Reset Password</h2>
                                        <label>Enter New Password:</label>
                                          <input placeholder="New Password" type="password" id="admin_password" class="form-control" name="admin_password" required autofocus/>
                                         <br>
                                    <input type="submit" value="Change Password" name="reset" class="btn btn-primary" style="width: 300px;">
                                    </form>
                                </div>
                             </body>
                         </html>
<?php
    if(isset($_POST["reset"])){
        include('config/config.php');
        $psw = $_POST["admin_password"];
        $Email = isset($_SESSION['admin_email']) ? $_SESSION['admin_email'] : '';

        $token = $_SESSION['token'];

        $hash = password_hash( $psw , PASSWORD_DEFAULT );

        $sql = mysqli_query($connect, "SELECT * FROM admin WHERE admin_email='$Email'");
        $query = mysqli_num_rows($sql);
  	    $fetch = mysqli_fetch_assoc($sql);

        if($Email){
            $new_pass = $hash;
            mysqli_query($connect, "UPDATE admin SET admin_password='$new_pass' WHERE admin_email='$Email'");
            ?>
            <script>
                window.location.replace("login.php");
                alert("<?php echo "Your password has been successfully updated."?>");
            </script>
            <?php
        }else{
            ?>
            <script>
                alert("<?php echo "Please try again"?>");
            </script>
            <?php
        }
    }

?>
<script>
    const toggle = document.getElementById('togglePassword');
    const password = document.getElementById('password');

    toggle.addEventListener('click', function(){
        if(password.type === "password"){
            password.type = 'text';
        }else{
            password.type = 'password';
        }
        this.classList.toggle('bi-eye');
    });
</script>