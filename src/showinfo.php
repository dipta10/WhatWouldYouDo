<?php
  require ('inc/connection.php');
  echo 'all these info are coming from the other page'.newline();
  $full_name = $_POST['signup_full_name'];
  $user_name = $_POST['signup_user_name'];
  $email = $_POST['signup_email'];
  $password = $_POST['signup_password'];

  echo $full_name.newline();
  echo $user_name.newline();
  echo $email.newline();
  echo $password.newline();
