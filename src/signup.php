<?php
session_start();
require ('inc/connection.php');
require ('inc/sessionController.php');
$errorMsg = '';

if (!signupSessionIsSet()) {
  header("Location: index.php");
} else {
  if (isset($_SESSION['duplicate_user_name'])) {
    $errorMsg = 'Duplicate User Name!';
  }
  if (isset($_SESSION['duplicate_email'])) {
    $errorMsg = 'Duplicate Email!';
  }
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

  <title>What Would You Do?</title>

  <script>

    function validateEmail(email) {
      var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
      return re.test(String(email).toLowerCase());
    }

    function _(x) {
      return document.getElementById(x);
    }

    function checkSignIn() {
      var username = $('#signin_username').val();
      var pass = $('#signin_password').val();

      var status = [1, 1];

      if (username.length < 1) {
        $('#signin_error_username').text('Enter your username/email').show();
        status[0] = 0;
      } else {
        $('#signin_error_username').hide();
        status[0] = 1;
      }
      if (pass.length < 1) {
        $('#signin_error_password').text('Enter your password').show();
        status[1] = 0;
      } else {
        $('#signin_error_password').hide();
        status[1] = 1;
      }

      if (status[0] == 1 && status[1] == 1) {
        alert("done! username: " + username + " pass: " + pass + ' len: ' + username.length + ' st: ' + status[0] + ' ' + status[1]);
      }
    }

    function redirectSignupForm() {
      _("signup_form").method = "post";
      _("signup_form").action = "signupController.php";
      _("signup_form").submit();
    }

    function checkSignUp() {
      var status = [1, 1, 1, 1];
      var fullname = $('#signup_full_name').val();
      var username = $('#signup_user_name').val();
      var email = $('#signup_email').val();
      var pass = $('#signup_password').val();

      if (fullname == '') {
        status[0] = 0;
        $('#signup_error_full_name').text('Enter your full name').show();
      } else {
        status[0] = 1;
        $('#signup_error_full_name').hide();
      }

      if (username == '') {
        status[1] = 0;
        $('#signup_error_username').text('Enter your username').show();
      } else {
        status[1] = 1;
        $('#signup_error_username').hide();
      }

      if (email == '') {
        status[2] = 0;
        $('#signup_error_email').text('Enter your email').show();
      } else {
        if (!validateEmail(email)) {
          status[2] = 0;
          $('#signup_error_email').text('Invalid Email Address').show();
        } else {
          status[2] = 1;
          $('#signup_error_email').hide();
        }
      }

      if (pass == '') {
        status[3] = 0;
        $('#signup_error_password').text('Enter your password').show();
      } else {
        status[3] = 1;
        $('#signup_error_password').hide();
      }

      var stat = true;
      for (i = 0; i < 4; i = i+1) {
        if (status[i] == 0) {
          stat = false;
        }
      }

      if (stat) {
        // redirect from there
        redirectSignupForm();
      }
    }

    function clearErrorMsg() {
      $('#signup_error_full_name').hide();
      $('#signup_error_username').hide();
      $('#signup_error_email').hide();
      $('#signup_error_password').hide();
      $('#signin_error_username').hide();
      $('#signin_error_password').hide();
    }
    clearErrorMsg();

    function imageUpload () {
      var tgt = this.target || window.event.srcElement,
        files = tgt.files;

      // FileReader support
      if (FileReader && files && files.length) {
        var fr = new FileReader();
        fr.onload = function () {
          document.getElementById('signup_profile_pic').src = fr.result;
        }
        fr.readAsDataURL(files[0]);
      }
      else {
        document.getElementById('signup_profile_pic').src = "img/logo.png";
      }
    }

  </script>

</head>
<body>
<!-- NAVBAR-->
<nav class="navbar navbar-light navbar-expand-lg py-3 fixed-top">
  <div class="container">
    <a href="#showcase" class="navbar-brand">
      <img src="img/logo1.png" class="img-fluid" height="50" width="50" alt="LOGO">
      <h3 class="d-inline align-middle">WhatWouldYouDo</h3>
    </a>
    <button class="navbar-toggler navbar-toggler-right" data-toggle="collapse" data-target="#navbarItems">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarItems">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Home</a>
        </li>
        <li class="nav-item dropdown"  class="nav-item">
          <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">About</a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="#about"><i class="fa fa-question"></i> Why This website</a>
            <a class="dropdown-item" href="#creators"><i class="fa fa-user"></i> Meet The Creators</a>
            <a class="dropdown-item" href="#contact"><i class="fa fa-envelope"></i> Contact</a>
          </div>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="newsfeed.php">Feed</a>
        </li>

        <li class="nav-item">
          <div class="justify-content-center">
            <a class="nav-link" href="#" data-toggle="modal" data-target="#login-modal" onclick="clearErrorMsg()">
              <i class="fa fa-sign-in"></i>
            </a>
          </div>
        </li>
        <li class="nav-item dropdown"  class="nav-item">
          <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" data-target="#hello">
            <img class="img-fluid rounded-circle" style="width: 40px; height: 40px;" src="img/person1.jpg" alt="Dipta Das">
          </a>
          <div class="dropdown-menu" id="hello">
            <a class="dropdown-item" href="#"><i class="fa fa-user"></i> Dipta10</a>
            <a class="dropdown-item" href="account_setting.html"><i class="fa fa-cog"></i> Account Settings</a>
            <a class="dropdown-item" href="#"><i class="fa fa-sign-out"></i> Log Out</a>
          </div>
        </li>

      </ul>
    </div>
    <!--@PHPCODE: invisible when not logged in.-->


  </div>
</nav>

<div style="background-color: #d06c6c; padding-bottom: 10px; padding-top: 2px;" class="">

  <div class="container card pb-5">
    <div class="col-lg-8 mx-auto" id="">
      <form class="pt-1" id="signup_form" enctype="multipart/form-data" onsubmit="return false">
        <div class="card mb-1">
          <div class="card-body text-center">
            <img class="img-fluid rounded-circle w-50 mb-3" id="signup_profile_pic" src="img/logo1.png" alt="Dipta Das">
          </div>
          <div class="form-group text-center">
            <label for="signup_image_upload" class="text-muted">Choose Your Image (Optional)</label>
            <input type="file" class="offset-3 form-control-file"  id="signup_image_upload" name="signup_image_upload" value="" onchange="imageUpload()" accept="image/*">
          </div>
        </div>

        <div class="text-center" style="color: red;">
          <small><?php echo $errorMsg; ?></small>
        </div>

        <div class="from-group mb-3">
          <div class="input-group input-group-lg">
            <div class="input-group-prepend">
             <span class="input-group-text">
              <i class="fa fa-user"></i>
             </span>
            </div>
            <input style="font-size: 15px" value="<?php echo $_SESSION['false_full_name']; ?>" class="form-control form-control-lg" type="text" name="signup_full_name" id="signup_full_name" placeholder="Full Name">
          </div>
          <small style="display: none"  id="signup_error_full_name" class="error-msg">Enter your full name</small>
        </div>
        <div class="from-group mb-3">
          <div class="input-group input-group-lg">
            <div class="input-group-prepend">
               <span class="input-group-text">
                <i class="fa fa-address-card"></i>
               </span>
            </div>
            <input style="font-size: 15px"  value="<?php echo $_SESSION['false_user_name']; ?>" class="form-control form-control-lg" type="text" id="signup_user_name" name="signup_user_name" placeholder="User Name">
          </div>
          <small style="display: none" id="signup_error_username" class="error-msg">Enter your username</small>
        </div>

        <div class="from-group mb-3">
          <div class="input-group input-group-lg">
            <div class="input-group-prepend">
               <span class="input-group-text">
                <i class="fa fa-envelope"></i>
               </span>
            </div>
            <input style="font-size: 15px" value="<?php echo $_SESSION['false_email']; ?>" class="form-control form-control-lg" type="text" id="signup_email" name="signup_email" placeholder="Email">
          </div>
          <small style="display: none" id="signup_error_email" class="error-msg">Enter your email</small>
        </div>

        <div class="from-group mb-3">
          <div class="input-group input-group-lg ">
            <div class="input-group-prepend">
              <span class="input-group-text">
                <i class="fa fa-keyboard-o"></i>
              </span>
            </div>
            <input  style="font-size: 15px" value="<?php echo $_SESSION['false_password']; ?>" type="password" placeholder="password" id="signup_password" name="signup_password" class="form-control form-control-lg">
          </div>
          <small style="display: none" id="signup_error_password" class="error-msg">Enter your email</small>
        </div>
        <hr>
        <div>
          <button style="font-size: 15px"  class="d-inline offset-1 col-md-4 mt-0 btn btn-outline-primary btn-lg btn-block" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
          <button style="font-size: 15px"  class="d-inline offset-2 col-md-4 mt-0 btn btn-outline-primary btn-lg btn-block" onclick="checkSignUp()" name="btn_signup" id="btn_signup" ><i class="fa fa-user"></i> Sign Up</button>
        </div>
      </form>
    </div>
  </div>
</div>



<!-- FOOTER -->
<footer id="footer-main" class="py-5 text-center" style="background-color: #363636">
  <div class="container text-light">
    <div class="row">
      <div class="col-12">
        <p class="lead">Copyright &copy; 2018 WhatWouldYouDo</p>
        <span  class="lead">Created By: <a class="text-light" href="http://youtube.com/c/loveextendscode" target="__blank">Dipta</a> & Tonmoy</span>
      </div>
    </div>
  </div>
</footer>



<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/navbar-fixed.js"></script>

</body>
</html>
