<?php
session_start();
require ('inc/connection.php');
require ('inc/sessionController.php');
echo 'inside signup controller'.newline();

if (isset($_POST['signup_full_name'])) {
  $full_name = $_POST['signup_full_name'];
  $user_name = $_POST['signup_user_name'];
  $email = $_POST['signup_email'];
  $password = $_POST['signup_password'];
  $image = addslashes(file_get_contents($_FILES['signup_image_upload']['tmp_name']));
  $imageName = addslashes($_FILES['signup_image_upload']['name']);


  if (checkUsername($conn, $user_name) ) {
    $_SESSION['duplicate_user_name'] = '1';
    setSignupSession($full_name, $user_name, $email, $password);
    header("Location: signup.php");
  }
  else if (checkEmail($conn, $email)) {
    $_SESSION['duplicate_email'] = '1';
    setSignupSession($full_name, $user_name, $email, $password);
    header("Location: signup.php");
  }
  else if (!empty($imageName)) {
    unsetSignupSession();
    setLoginSession($user_name);
    insertSignupInfo1($conn, $full_name, $user_name, $email, $password, $image);
    header("Location: newsfeed.php");
  } else {
    unsetSignupSession();
    setLoginSession($user_name);
    insertSignupInfo2($conn, $full_name, $user_name, $email, $password, $image);
    header("Location: newsfeed.php");
  }


} else {
  header("Location: {$homepage_file_name}");
}


?>
