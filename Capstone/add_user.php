<?php
    include('add_user_server.php') ?>

<!DOCTYPE html>
<html lang="en">
<link rel="icon" type="image/png" sizes="16x16" href="assets\img\added\favi.png">
<title>Register - Network Layout Assessment System</title>
<head>
  

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

<body>
<?php
    $length = 6;
    $alpha= substr(str_shuffle("QWERTYUIOPLKJHGFDSAZXCVBNM"),1,$length);
    $ln = 6;
    $beta = substr(str_shuffle("1234567890"),1,$length);
?>

  <!-- Main content -->
  <body> 
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
                        <div>
                          <div class="card-body px-lg-5 py-lg-5">
                            <form class="" method="POST" enctype="multipart/form-data">
                               <header><image src="assets/img/added/login00.png" class="img-fluid" width="100" height="50"></header>
                                    <h2 style="text-align: center; color: #5E427C">CREATE ACCOUNT</h2>
                                        <div class="form-group mb-3">
                                            <div class="input-group input-group-alternative">
                                                <div class="input-group-prepend">
                                                </div>
                                            </div>
                                        </div>                              
                                   <input type="hidden" name="admin_id" value="<?php echo $alpha; ?>-<?php echo $beta;?>"class="form-control">
                                <div class="mb-3">
                                  <label>Name</label>
                                   <input type="text" name="admin_name" class="form-control" value="">
                                </div>
                                <div class="mb-3">
                                  <label>Email</label>
                                     <input type="email" name="admin_email" class="form-control" value="">
                               </div>
                                 <div class="mb-3">
                                  <label class="form-label">Password</label>
                                     <input type="password" name="admin_password" id="admin_password" class="form-control" value="">
                                 <div id="passwordRequirements"></div>
                              </div>
                                <div class="mb-3">
                                  <label class="form-label">Confirm Password</label>
                                     <input type="password" name="confirm_password" id="confirm_password" class="form-control" value="">
                               </div>
                                  <div class="mb-3">
                                     <label class="form-label">Profile Picture</label>
                                 <input type="file" class="form-control" name="profileImage">
                             </div>
                         <button type="submit" name="adduser" class="btn btn-primary" style="width: 300px;">Sign Up</button>
                     </form>
                 </div>
             </div>
          </div>
       </div>
    </div>
  </div>
</div>
</body>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
$(document).ready(function() {
  $('#admin_password').on('input', function() {
    var password = $(this).val();

    // Clear message if the password is empty
    if (password === '') {
      $('#passwordRequirements').empty();
      return;
    }
    var requirements = [];

    // Check password length
    var hasMinLength = password.length >= 8;
    requirements.push({ text: 'At least 8 characters', fulfilled: hasMinLength });

    // Check for both lowercase and uppercase letters
    var hasLowercase = /[a-z]/.test(password);
    var hasUppercase = /[A-Z]/.test(password);
    requirements.push({ text: 'Contain both lowercase and uppercase letters', fulfilled: hasLowercase && hasUppercase });

    // Check for at least one number or symbol
    var hasNumber = /\d/.test(password);
    var hasSymbol = /[!@#$%^&*(),.?":{}|<>]/.test(password);
    requirements.push({ text: 'Contain at least one number or symbol', fulfilled: hasNumber || hasSymbol });

    // Check if the password contains the email address
    var emailAddress = 'example@example.com'; // Replace with the user's email address
    var doesNotContainEmail = !password.includes(emailAddress);
    requirements.push({ text: 'Not contain your email address', fulfilled: doesNotContainEmail });

    // Check if the password is commonly used (you may use a list of common passwords)
    var commonPasswords = ['password', '123456', 'qwerty', 'abc123'];
    var isNotCommonPassword = !commonPasswords.includes(password.toLowerCase());
    requirements.push({ text: 'Not be commonly used', fulfilled: isNotCommonPassword });

    // Display requirements with checkmarks or crosses
    var requirementsText = '<p>Create a password that:</p>' +
      (requirements.length === 0 ? 'Password meets requirements' : '<ul>' +
        requirements.map(req => '<li>' + (req.fulfilled ? '✅ ' : '❌ ') + req.text + '</li>').join('') +
        '</ul>');
    $('#passwordRequirements').html(requirementsText);

    // Clear the note after 1000 milliseconds (1 second) if all requirements are met
    if (requirements.every(req => req.fulfilled)) {
      setTimeout(function() {
        $('#passwordRequirements').empty();
      }, 1000);
    }
  });
});
</script>

<div id="passwordRequirements"></div>
    <!-- Footer -->
    <?php
    require_once('partials/_footer.php');
    ?>
<!-- Argon Scripts -->
<?php
require_once('partials/_scripts.php');
?>


</html>