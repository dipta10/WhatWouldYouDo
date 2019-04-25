<?php
session_start();
require ('inc/connection.php');
require ('inc/sessionController.php');
if (signupSessionIsSet()) {
  unsetSignupSession();
}
if (signinSessionIsSet()) {
  unsetSigninSession();
}
if (loginSessionIsSet()) {
} else {
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

    function hello() {
//      alert('working');
//      var data = {
//        fn: "filename",
//        str: "this_is_a_dummy_test_string"
//      };
//
//      $.post("test.php", data);
//      var x;
      window.location = "signout.php";
    }

   function redirectSignupForm() {
      _("signup_form").method = "post";
      _("signup_form").action = "signupController.php";
      _("signup_form").submit();
    }

    function redirectSigninForm() {
      _("signin_form").method = "post";
      _("signin_form").action = "signinController.php";
      _("signin_form").submit();
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
        redirectSigninForm();
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


          <?php if(!loginSessionIsSet()) {?>
          <li class="nav-item">
            <div class="justify-content-center">
              <a class="nav-link" href="#" data-toggle="modal" data-target="#login-modal" onclick="clearErrorMsg()">
                <i class="fa fa-sign-in"></i> Sign In/Sign Up </a>
            </div>
          </li>
          <?php } else { ?>

          <li class="nav-item dropdown"  class="nav-item">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" data-target="#hello">
              <img class="img-fluid rounded-circle" style="width: 40px; height: 40px;" src="img/person1.jpg" alt="Dipta Das">
            </a>

            <div class="dropdown-menu" id="hello">
              <a class="dropdown-item" href="#"><i class="fa fa-user"></i> <?php echo getSessionUsername(); ?></a>
              <a class="dropdown-item" href="account_settings_controller.php"><i class="fa fa-cog"></i> Account Settings</a>
              <a name="btn_logout" onclick="return hello()" class="dropdown-item" href="#"><i class="fa fa-sign-out"></i> Log Out</a>
            </div>
          </li>

          <?php } ?>

        </ul>
      </div>
        <!--@PHPCODE: invisible when not logged in.-->


      </div>
  </nav>

  <!-- MODAL -->
  <div class="modal" id="login-modal" data-backdrop="static">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body">
          <div class="col-md-12">

            <ul class="nav nav-tabs">
              <li class="nav-item active">
                <a href="#signin" class="nav-link active text-dark" role="tab" data-toggle="tab">Sign In</a>
              </li>
              <li class="nav-item">
                <a href="#signup" class="nav-link text-dark" onclick="" role="tab" data-toggle="tab">Sign Up</a>
              </li>
            </ul>

            <div class="tab-content">

              <div role="tabpanel" class="tab-pane active" id="signin">

                <form id="signin_form" class="pt-1" enctype="multipart/form-data" onsubmit="return false">
                  <div class="card mb-1">
                    <div class="card-body text-center">
                      <img class="img-fluid rounded-circle w-50" src="img/poster1.png" alt="Dipta Das">
                    </div>
                  </div>
                  <div class="from-group mb-3">
                    <div class="input-group input-group-lg">
                      <div class="input-group-prepend">
                       <span class="input-group-text">
                        <i class="fa fa-user"></i>
                       </span>
                      </div>
                      <input style="font-size: 15px;" id="signin_username" name="signin_username" class="form-control form-control-lg" type="text" placeholder="username/email">
                    </div>
                    <small id="signin_error_username" class="error-msg">Enter your username</small>
                  </div>

                  <div class="from-group ">
                    <div class="input-group input-group-lg">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="fa fa-keyboard-o"></i>
                        </span>
                      </div>
                      <input style="font-size: 15px"  type="password" placeholder="password" id="signin_password" name="signin_password"  class="d-block form-control form-control-lg">
                    </div>
                    <small id="signin_error_password" class="error-msg">Enter your password</small>
                  </div>
                  <hr>
                  <div>
                    <button style="font-size: 15px"  class="d-inline offset-md-1 offset-sm-2 col-md-4 col-sm-4 mt-0 btn btn-outline-primary btn-lg btn-block" data-dismiss="modal" type="submit"><i class="fa fa-close"></i> Close</button>
                    <button style="font-size: 15px" class="d-inline offset-md-2 col-md-4 col-sm-4 mt-0 btn btn-outline-primary btn-lg btn-block" id="btn_signin" onclick="checkSignIn()" ><i class="fa fa-user"></i> Sign In</button>
                  </div>
                </form>
              </div>

              <div role="tabpanel" class="tab-pane" id="signup">
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

                  <div class="from-group mb-3">
                    <div class="input-group input-group-lg">
                      <div class="input-group-prepend">
                       <span class="input-group-text">
                        <i class="fa fa-user"></i>
                       </span>
                      </div>
                      <input style="font-size: 15px" class="form-control form-control-lg" type="text" name="signup_full_name" id="signup_full_name" placeholder="Full Name">
                    </div>
                    <small id="signup_error_full_name" class="error-msg">Enter your full name</small>
                  </div>
                  <div class="from-group mb-3">
                    <div class="input-group input-group-lg">
                      <div class="input-group-prepend">
                       <span class="input-group-text">
                        <i class="fa fa-address-card"></i>
                       </span>
                      </div>
                      <input style="font-size: 15px"  class="form-control form-control-lg" type="text" id="signup_user_name" name="signup_user_name" placeholder="User Name">
                    </div>
                    <small id="signup_error_username" class="error-msg">Enter your username</small>
                  </div>

                  <div class="from-group mb-3">
                    <div class="input-group input-group-lg">
                      <div class="input-group-prepend">
                       <span class="input-group-text">
                        <i class="fa fa-envelope"></i>
                       </span>
                      </div>
                      <input style="font-size: 15px"  class="form-control form-control-lg" type="text" id="signup_email" name="signup_email" placeholder="Email">
                    </div>
                    <small id="signup_error_email" class="error-msg">Enter your email</small>
                  </div>

                  <div class="from-group mb-3">
                    <div class="input-group input-group-lg ">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="fa fa-keyboard-o"></i>
                        </span>
                      </div>
                      <input  style="font-size: 15px"  type="password" placeholder="password" id="signup_password" name="signup_password" class="form-control form-control-lg">
                    </div>
                    <small id="signup_error_password" class="error-msg">Enter your email</small>
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
        </div>
      </div>
    </div>
  </div>


  <!-- SHOWCASE -->
  <section id="showcase" class="py-5 text-center text-light">
    <div class="primary-overlay">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 col-md-12">
            <h1 class="display-2 mt-5 pt-5">What Would You Do if......</h1>
            <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum, eius.</p>
            <a class="btn btn-outline-light btn-lg font-weight-bold" href="#"><i class="fa fa-arrow-right"> Read More</i></a>
          </div>
          <div class="col-lg-6">
            <img src="img/poster1.png" class="img-fluid d-none d-lg-block" alt="Poster">
          </div>
        </div>
      </div>
    </div>
  </section>

  <!--<div class="container">-->
    <!--<div class=" mt-5 container-fluid d-none d-lg-block">-->
      <!--<iframe width="100%" height="500" src="showcase_newsfeed.html" allowfullscreen></iframe>-->
    <!--</div>-->
  <!--</div>-->


  <!-- ABOUT -->
  <section id="about" class="bg-light py-5 text-center">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="info-book">
            <h2 class="display-4 text-primary">Why This Title?</h2>
            <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus, quasi!</p>
          </div>
          <!-- ACCORDION -->
          <div id="accordion" class="pt-3" role="tablist">
            <div class="card">
              <div class="card-header" role="tab">
                <h5 class="mb-0">
                  <div data-toggle="collapse" href="#collapse1">
                    <i class="fa fa-arrow-circle-down"></i> Get Inspired
                  </div>
                </h5>
              </div>
              <div id="collapse1" class="collapse show" data-parent="#accordion">
                <div class="card-body">
                  <p class="">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam cupiditate dolorem esse fugiat harum, hic itaque maxime perspiciatis placeat quam quidem quis quod saepe, tempora tempore temporibus totam ullam voluptatem?</p>
                </div>
              </div>
            </div>

            <div class="card" role="tablist">
            <div class="card-header">
              <h5 class="mb-0">
                <div data-toggle="collapse" href="#collapse2">
                  <i class="fa fa-arrow-circle-down"></i> Gain The Knowledge
                </div>
              </h5>
            </div>
            <div id="collapse2" class="collapse" data-parent="#accordion">
              <div class="card-body">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium adipisci aliquam dolorem praesentium quod ratione, reprehenderit voluptate. Quia, repellendus similique.</p>
              </div>
            </div>
          </div>

            <div class="card" role="tablist">
              <div class="card-header">
                <h5 class="mb-0">
                  <div data-toggle="collapse" href="#collapse3">
                    <i class="fa fa-arrow-circle-down"></i> Open Your Mind
                  </div>
                </h5>
              </div>
              <div id="collapse3" class="collapse" data-parent="#accordion">
                <div class="card-body">
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium adipisci aliquam dolorem praesentium quod ratione, reprehenderit voluptate. Quia, repellendus similique.</p>
                </div>
              </div>
            </div>

          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- CREATORS -->
  <section id="creators" class="text-center py-5">
      <!--@creator1-->
    <div class="container">

      <div class="row">
        <div class="col-12">
          <div class="info-creators mb-5">
            <h2 class="display-4">Meet The Authors</h2>
            <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus, quasi!</p>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-12">
          <div class="card">
            <div class="card-body">
              <img class="img-fluid rounded-circle w-50 mb-3" src="img/dipta.jpg" alt="Dipta Das">
              <h3>Dipta Das</h3>
              <h5>Lead Writer</h5>
              <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut commodi error eveniet fugit inventore labore.</p>
              <div class="d-flex flex-row justify-content-center">
                <div class="p-3"><a href=""><i class="fa fa-facebook"></i></a></div>
                <div class="p-3"><a href="#"><i class="fa fa-youtube"></i></a></div>
                <div class="p-3"><a href="#"><i class="fa fa-github"></i></a></div>
                <div class="p-3"><a href="#"><i class="fa fa-linkedin"></i></a></div>
              </div>
            </div>
          </div>
        </div>

        <!--@creator2-->
        <div class="col-lg-3 col-md-6 col-sm-12">
          <div class="card">
            <div class="card-body">
              <img class="img-fluid rounded-circle w-50 mb-3" src="img/person1.jpg" alt="Dipta Das">
              <h3>Tonmoy Debnath</h3>
              <h5>Lead Writer</h5>
              <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut commodi error eveniet fugit inventore labore.</p>
              <div class="d-flex flex-row justify-content-center">
                <div class="p-3"><a href=""><i class="fa fa-facebook"></i></a></div>
                <div class="p-3"><a href="#"><i class="fa fa-youtube"></i></a></div>
                <div class="p-3"><a href="#"><i class="fa fa-github"></i></a></div>
                <div class="p-3"><a href="#"><i class="fa fa-linkedin"></i></a></div>
              </div>
            </div>
          </div>
        </div>

        <!--@creator3-->
        <div class="col-lg-3 col-md-6 col-sm-12">
          <div class="card">
            <div class="card-body">
              <img class="img-fluid rounded-circle w-50 mb-3" src="img/person1.jpg" alt="Dipta Das">
              <h3>Nabil</h3>
              <h5>Lead Writer</h5>
              <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut commodi error eveniet fugit inventore labore.</p>
              <div class="d-flex flex-row justify-content-center">
                <div class="p-3"><a href=""><i class="fa fa-facebook"></i></a></div>
                <div class="p-3"><a href="#"><i class="fa fa-youtube"></i></a></div>
                <div class="p-3"><a href="#"><i class="fa fa-github"></i></a></div>
                <div class="p-3"><a href="#"><i class="fa fa-linkedin"></i></a></div>
              </div>
            </div>
          </div>
        </div>

        <!--@creator4-->
        <div class="col-lg-3 col-md-6 col-sm-12">
          <div class="card">
            <div class="card-body">
              <img class="img-fluid rounded-circle w-50 mb-3" src="img/person1.jpg" alt="Dipta Das">
              <h3>Arnob</h3>
              <h5>Artist</h5>
              <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut commodi error eveniet fugit inventore labore.</p>
              <div class="d-flex flex-row justify-content-center">
                <div class="p-3"><a href=""><i class="fa fa-facebook"></i></a></div>
                <div class="p-3"><a href="#"><i class="fa fa-youtube"></i></a></div>
                <div class="p-3"><a href="#"><i class="fa fa-github"></i></a></div>
                <div class="p-3"><a href="#"><i class="fa fa-linkedin"></i></a></div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- CONTACT -->
  <section id="contact" class="py-5 bg-light">
    <div class="container">
     <div class="row">
      <div class="col-lg-9">
        <div class="info-contact">
          <h2 class="display-4">Get In Touch</h2>
          <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero, voluptatibus.</p>
        </div>

        <form action="" method="post">
          <div class="from-group mb-3">
            <div class="input-group input-group-lg">
              <div class="input-group-prepend">
               <span class="input-group-text">
                <i class="fa fa-user"></i>
               </span>
              </div>
             <input class="form-control form-control-lg" type="text" placeholder="name">
            </div>
          </div>

          <?php
          if (!loginSessionIsSet()) { ?>
          <div class="input-group input-group-lg mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text">
                <i class="fa fa-envelope"></i>
              </span>
            </div>
            <input type="email" placeholder="Email" class="form-control form-control-lg">
          </div>
          <?php } ?>

          <div class="input-group input-group-lg mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text">
                <i class="fa fa-pencil"></i>
              </span>
            </div>
            <textarea class="form-control form-control-lg" name="message" id="" rows="5" placeholder="Write Your Message Here"></textarea>
          </div>
          <input class="btn btn-primary btn-lg btn-block"  value="Send">
        </form>

      </div>
       <div class="col align-self-center">
        <img class="img-fluid d-none d-lg-block" src="img/logo1.png" alt="WhatWouldYouDo">
       </div>
    </div>
    </div>
  </section>

  <!-- FOOTER -->
  <footer id="footer-main" class="py-5 text-center" style="background-color: #212121">
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


<!--
<script>
    $(document).ready(function(){

      // prevent from reloading the page on submit
      $("#signup_form").submit(function(e){
        e.preventDefault();
      });

      // prevent from reloading the page on submit
      $("#signin_form").submit(function (e) {
        e.preventDefault();
      });

      // redirect on submit
//      var redirect = function (url, method) {
//        var form = document.createElement('form');
//        form.method = method;
//        form.action = url;
//        form.submit();
//      };

//      var redirectPost = function (url, data) {
//        var form = document.createElement('form');
//        document.body.appendChild(form);
//        form.method = 'post';
//        form.action = url;
//      }

      $('#btn_signup').click(function(){

        var fullname = $('#signup_full_name').val();
        if (fullname == '') {
//          redirect('false.php', 'post');
//          window.location= "false.php";
//          $full_name = $_POST['signup_full_name'];
//          $user_name = $_POST['signup_user_name'];
//          $email = $_POST['signup_email'];
//          $password = $_POST['signup_password'];
//          insertSignupInfo($conn, $full_name, $user_name, $email, $password);

        }


        });
    });
</script>

-->
