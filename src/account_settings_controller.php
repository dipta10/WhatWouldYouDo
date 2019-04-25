<?php
session_start();
require ('inc/connection.php');
require ('inc/sessionController.php');
echo 'account settings controller'.newline();

if (!loginSessionIsSet()) {
  puts("the page you're trying to load is not available.");
  puts("You'll be redirected to the home page");
  unsetLoginSession();
  header( "refresh:2;url=index.php" );
} else {
// the redirection has been handled inside the getAllInfoFromUserName()
  $row = getAllInfoFromUserName($conn, $_SESSION['username']);
  print_r($row);
  $_SESSION['userinfo'] = $row;
  header("Location: account_setting.php");
  puts();
}











