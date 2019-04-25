<?php
session_start();
require ('inc/connection.php');
require ('inc/sessionController.php');
if (!loginSessionIsSet()) {
  header("Location: index.php");
  die();
} else {
  $userinfo = $_SESSION['userinfo'];
  print_r($userinfo);
  puts();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/navbar-fixed.css">
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="shortcut icon" type="image/x-icon" href="img/logo1.png">
  <title></title>
</head>
<body>

<!-- NAVBAR-->
  <nav class="navbar navbar-light navbar-expand-lg py-3 fixed-top">
    <div class="container">
      <a href="index.php" class="navbar-brand">
        <img src="img/logo1.png" class="img-fluid" height="50" width="50" alt="LOGO">
        <h3 class="d-inline align-middle">WhatWouldYouDo</h3>
      </a>
      <button class="navbar-toggler navbar-toggler-right" data-toggle="collapse" data-target="#navbarItems">
        <span class="navbar-toggler-icon"></span>
      </button>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="newsfeed.php">Feed</a>
        </li>
        <li class="nav-item dropdown"  class="nav-item">
          <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" data-target="#hello">
            <img class="img-fluid rounded-circle" style="width: 40px; height: 40px;" src="img/person1.jpg" alt="Dipta Das">
          </a>
          <div class="dropdown-menu" id="hello">
            <a class="dropdown-item" href="#"><i class="fa fa-user"></i> Dipta10</a>
            <a class="dropdown-item" href="#"><i class="fa fa-cog"></i> Account Settings</a>
            <a class="dropdown-item" href="#"><i class="fa fa-sign-out"></i> Log Out</a>
          </div>
        </li>
      </ul>
    </div>
  </nav>

<div style="background-color: #d06c6c; padding-bottom: 5px; padding-top: 5px;">
  <div class="container">
    <div class="row">
      <div class="offset-lg-2 col-lg-8 offset-md-2 col-md-8 col-sm-12">
        <div class="card">
          <div class="card-body text-center">
            <img class="img-fluid rounded-circle w-50 mb-3 " src="img/person1.jpg" alt="Dipta Das">
            <br>
            <form class="" method="post">
              <div class="form-group">
                <label for="exampleFormControlFile1">Change Your Image</label>

                <input type="file" class="form-control-file offset-4" id="exampleFormControlFile1" value="">
              </div>
            </form>

            <div class="card p-3">
              <form action="" method="post">
                <div class="form-group">
                  <label for="fullname">Full Name</label>
                  <input type="text" class="form-control" id="fullname" aria-describedby="emailHelp" placeholder="Enter Full Name" value="<?php echo $userinfo['fullname'] ?>">
                </div>
                <div class="form-group">
                  <label for="username">User Name</label>
                  <input type="text" class="form-control" id="username" aria-describedby="emailHelp" placeholder="Enter User Name"  value="<?php echo $userinfo['username'] ?>">
                </div>
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email"  value="<?php echo $userinfo['email'] ?>">
                  <small id="" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group card p-3">
                  <label for="newPassword1">Password</label>
                  <input type="password" class="form-control mb-1" id="newPassword1" placeholder="New Password">
                  <input type="password" class="form-control" id="newPassword2" placeholder="Confirm New Password">
                </div>
                <button type="submit" class="btn btn-primary"><i class="fa fa-cog"></i> Change</button>
              </form>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/navbar-fixed.js"></script>

</body>
</html>
