<?php
session_start();
require ('inc/connection.php');
require ('inc/sessionController.php');
echo 'inside signin controller'.newline();
echo "value: {$_POST['sigin_username']}".newline();

if (isset($_POST['signin_username'])) {

  $username = $_POST['signin_username'];
  $password = $_POST['signin_password'];
  echo 'value: '.$username.newline();
  echo 'pass: '.$password.newline(); puts(""); puts("");

  if (checkUsername($conn, $username) || checkEmail($conn, $username)) {
    puts("username/email coreect");
    if (matchEmailPassword($conn, $username, $password)) {
      // @workleft in this case I will have to find out the username
      unsetSigninSession();
      setLoginSession($username);
      echo 'password matached via email'.newline();
      header("Location: newsfeed.php");
    } else if (matchUsernamePassword($conn, $username, $password)) {
      echo 'password matached via username'.newline();
      unsetSigninSession();
      setLoginSession($username);
      header("Location: newsfeed.php");
    } else {
      // invalid password
      setSigninSession($username, $password);
      header("Location: login.php");
    }
  } else {
//    puts("invalid username/email");
    setSigninSession($username, $password);
    header("Location: login.php");
  }

} else {
  echo 'redirect to home';
}


