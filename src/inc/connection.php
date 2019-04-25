<?php
  require ('page_names.php');


  $table_userinfo = "userinfo";

  function puts($str = "") {
    echo $str."<br>";
  }

  function newline() {
    return "<br>";
  }

  $name = 'dipta';
  $databaseName = 'whatwouldyoudo';
  $conn = mysqli_connect("127.0.0.1", "root", "", $databaseName);

  if (!$conn) {
    die("connection to the database failed!".mysqli_connect_error().newline());
  }


  function insertSignupInfo1($conn, $full_name, $user_name, $email, $password, $image) {
    $mdpass = md5($password);
    $query = "INSERT INTO userinfo (fullname, username, email, password, image) VALUES ('{$full_name}', '{$user_name}', '{$email}', MD5('{$password}'), '{$image}');";
    echo 'query: '.$query.newline();
    $result = mysqli_query($conn, $query);
    if (!$result) {
      echo 'insertion failed!'.newline();
      echo 'error: '.mysqli_error($conn).newline();
    } else {
      echo 'inserted'.newline();
    }
  }

function insertSignupInfo2($conn, $full_name, $user_name, $email, $password) {
  $query = "INSERT INTO userinfo (fullname, username, email, password) VALUES ('{$full_name}', '{$user_name}', '{$email}', MD5('{$password}'));";
  echo 'query: '.$query.newline();
  $result = mysqli_query($conn, $query);
  if (!$result) {
    echo 'insertion failed!'.newline();
    echo 'error: '.mysqli_error($conn).newline();
  } else {
    echo 'inserted' . newline();
  }
}

/*
 * this function check if a given username exists
 * it exists then it return true
 * else returns false
 */

function checkConnectionError ($conn) {
  if (mysqli_error($conn)) {
    echo mysqli_error($conn).newline();
    return true;
  }
}

function checkUsername($conn, $username) {
  $query = "select * from userinfo where username = '{$username}'";
  $result = mysqli_query($conn, $query);
  if (checkConnectionError($conn)) {
    return true;
  }
  if (mysqli_num_rows($result) > 0) {
    return true;
  } else {
    return false;
  }
}

function checkEmail($conn, $email) {
  $query = "select * from userinfo where email = '{$email}'";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) > 0) {
    return true;
  } else {
    return false;
  }
}

function matchEmailPassword($conn, $email, $password) {
  $query = "select password from userinfo where email = '{$email}'";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $mdpass = md5($password);
    if ($row['password'] == $mdpass) {
      return true;
    } else {
      return false;
    }
  } else {
    return false;
  }
}


function matchUsernamePassword($conn, $username, $password) {
  $query = "select password from userinfo where username = '{$username}'";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $mdpass = md5($password);
    if ($row['password'] == $mdpass){
      return true;
    } else {
      return false;
    }
  } else {
    return false;
  }
}

function getAllInfoFromUserName ($conn, $username) {
  $query = "select * from userinfo where username = '{$username}'";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) != 1) {
    puts("the page you're trying to load is not available.");
    puts("You'll be redirected to the home page");
    header( "refresh:2;url=index.php" );
    unsetLoginSession();
    die();
  } else {
    $row = mysqli_fetch_assoc($result);
    return $row;
  }
}











