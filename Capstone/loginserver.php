<?php
session_start();
include('config/config.php');
include('config/checklogin.php');

//login 
if (isset($_POST['login'])) {
  $admin_email = $_POST['admin_email'];
  $admin_password = $_POST['admin_password'];

  // Fetch the hashed password from the database
  $stmt = $mysqli->prepare("SELECT admin_id, admin_password, status FROM admin WHERE admin_email = ? AND status = 1");
  $stmt->bind_param('s', $admin_email);
  $stmt->execute();
  $stmt->bind_result($admin_id, $hashed_password, $status);
  $rs = $stmt->fetch();

  if ($rs) {
    // Verify the entered password against the stored hashed password
    if (password_verify($admin_password, $hashed_password) || $admin_password === $hashed_password) {
      // Password is correct

      $_SESSION['admin_id'] = $admin_id;
      header("location:generateplantestt.php");
    } else {
      // Password is incorrect
      $err = "Incorrect Authentication Credentials or Not Verified";
    }
  } else {
    // User not found
    $err = "Incorrect Authentication Credentials or Not Verified";
  }
}


require_once('partials/_head.php');
?>