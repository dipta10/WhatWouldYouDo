<?php

function unsetSignupSession() {
  unset($_SESSION['false_full_name']);
  unset($_SESSION['false_user_name']);
  unset($_SESSION['false_email']);
  unset($_SESSION['false_password']);
  unset($_SESSION['duplicate_email']);
  unset($_SESSION['duplicate_user_name']);
}

function setSignupSession($full_name, $user_name, $email, $password) {
  $_SESSION['false_full_name'] = $full_name;
  $_SESSION['false_user_name'] = $user_name;
  $_SESSION['false_email'] = $email;
  $_SESSION['false_password'] = $password;
}

function signupSessionIsSet() {
  return (
      isset($_SESSION['false_full_name']) &&
      isset($_SESSION['false_user_name']) &&
      isset($_SESSION['false_email']) &&
      isset($_SESSION['false_password'])
  );
}

function setSigninSession($user_name, $password) {
  $_SESSION['false_user_name'] = $user_name;
  $_SESSION['false_password'] = $password;
}

function signinSessionIsSet() {
  return (
      isset($_SESSION['false_user_name']) &&
      isset($_SESSION['false_password'])
  );
}

function unsetSigninSession() {
  unset($_SESSION['false_user_name']);
  unset($_SESSION['false_password']);
}

function setLoginSession($username) {
  $_SESSION['login_status'] = '1111';
  $_SESSION['username'] = $username;
}

function unsetLoginSession() {
  unset($_SESSION['longin_status']);
  unset($_SESSION['username']);
}

function loginSessionIsSet () {
  return (
    isset($_SESSION['login_status']) &&
    isset($_SESSION['username'])
  );
}

function getSessionUsername() {
  return ($_SESSION['username']);
}

















