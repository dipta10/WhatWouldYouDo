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

  <title>Situations</title>
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


<div style="background-color: #d06c6c; padding-bottom: 50px; padding-top: 4px;">

<div class="container">
  <!--./typical status starts-->
  <div class="row bg-light" style="padding: 5px;">

    <div class="status col-lg-6 col-md-12 col-sm-12">
      <div class="card">
        <div class="card-body">
          <div class="from-group mb-3">
            <div class="input-group input-group-lg">
              <div class="input-group-prepend">
                <a href="">
                  <img class="dp img-fluid rounded-circle" src="img/person1.jpg" alt="Dipta Das">
                </a>
                <div class="d-inline-block">
                  <a href="#" class="text-dark nav-link no-space"><h4 class="mb-0 ml-1">Dipta Das</h4></a>
                  <small class="m-1">Posted on 21st Jan, 2018</small>
                </div>
              </div>
              <div class="align-self-center">
                <button class="ml-3 btn-subscribe btn btn-outline-primary btn-sm"><i class="fa fa-newspaper-o"></i> Full Story</button>
                <button class="ml-3 btn-subscribe btn btn-outline-primary btn-sm"><i class="fa fa-plus"></i> Subscribe</button>
              </div>
            </div>
          </div>
          <hr>
          <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae, id quod! Aliquam architecto consequatur delectus, deleniti est facilis impedit libero maxime quas repellat repudiandae, saepe soluta voluptate? Ab architecto asperiores consectetur, culpa debitis delectus deleniti dignissimos dolorem esse harum ipsam iste non officia porro possimus provident quam sit tempora totam.</p>
          <hr>

          <div class="d-flex flex-row justify-content-center">
            <div class="mr-3"><span class="text-primary">128 </span><a href="#"><i class="fa fa-heart"></i></a></div>
            <div class="mr-3"><span class="text-primary">82 </span><a href="#"><i class="fa fa-share"></i></a></div>
            <div class="mr-3"><span class="text-primary">35 </span><a href="#"><i class="fa fa-comment"></i></a></div>

          </div>
        </div>
      </div>
    </div>

    <!--./test starts-->
    <div class="status col-lg-6 col-md-12 col-sm-12">
      <div class="card">
        <div class="card-body">
          <div class="from-group mb-3">
            <div class="input-group input-group-lg">
              <div class="input-group-prepend">
                <a href="">
                  <img class="dp img-fluid rounded-circle" src="img/person1.jpg" alt="Dipta Das">
                </a>
                <div class="d-inline-block">
                  <a href="#" class="text-dark nav-link no-space"><h4 class="mb-0 ml-1">Dipta Das</h4></a>
                  <small class="m-1">Posted on 21st Jan, 2018</small>
                </div>
              </div>
              <div class="align-self-center">
                <button class="ml-3 btn-subscribe btn btn-outline-primary btn-sm"><i class="fa fa-newspaper-o"></i> Full Story</button>
                <button class="ml-3 btn-subscribe btn btn-outline-primary btn-sm"><i class="fa fa-plus"></i> Subscribe</button>
              </div>
            </div>
          </div>
          <hr>
          <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae, id quod! Aliquam architecto consequatur delectus, deleniti est facilis impedit libero maxime quas repellat repudiandae, saepe soluta voluptate? Ab architecto asperior Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam amet animi aut corporis deserunt distinctio dolor, dolores ea eius minus nulla, obcaecati pariatur placeat provident quisquam sit voluptatem? Ad at atque beatae dignissimos distinctio ea est ipsa ipsum iste labore minima, nulla possimus quibusdam recusandae reiciendis rem sunt voluptatem voluptatum.es consectetur, culpa debitis delectus deleniti dignissimos dolorem esse harum ipsam iste non officia porro possimus provident quam sit tempora totam.</p>
          <hr>

          <div class="d-flex flex-row justify-content-center">
            <div class="mr-3"><span class="text-primary">128 </span><a href="#"><i class="fa fa-heart"></i></a></div>
            <div class="mr-3"><span class="text-primary">82 </span><a href="#"><i class="fa fa-share"></i></a></div>
            <div class="mr-3"><span class="text-primary">35 </span><a href="#"><i class="fa fa-comment"></i></a></div>

          </div>
        </div>
      </div>
    </div>
    <div class="status col-lg-6 col-md-12 col-sm-12">
      <div class="card">
        <div class="card-body">
          <div class="from-group mb-3">
            <div class="input-group input-group-lg">
              <div class="input-group-prepend">
                <a href="">
                  <img class="dp img-fluid rounded-circle" src="img/person1.jpg" alt="Dipta Das">
                </a>
                <div class="d-inline-block">
                  <a href="#" class="text-dark nav-link no-space"><h4 class="mb-0 ml-1">Dipta Das</h4></a>
                  <small class="m-1">Posted on 21st Jan, 2018</small>
                </div>
              </div>
              <div class="align-self-center">
                <button class="ml-3 btn-subscribe btn btn-outline-primary btn-sm"><i class="fa fa-newspaper-o"></i> Full Story</button>
                <button class="ml-3 btn-subscribe btn btn-outline-primary btn-sm"><i class="fa fa-plus"></i> Subscribe</button>
              </div>
            </div>
          </div>
          <hr>
          <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae, id quod! Aliquam architecto consequatur delectus, deleniti est facilis impedit libero maxime harum ipsam iste non officia porro possimus provident quam sit tempora totam.</p>
          <hr>

          <div class="d-flex flex-row justify-content-center">
            <div class="mr-3"><span class="text-primary">128 </span><a href="#"><i class="fa fa-heart"></i></a></div>
            <div class="mr-3"><span class="text-primary">82 </span><a href="#"><i class="fa fa-share"></i></a></div>
            <div class="mr-3"><span class="text-primary">35 </span><a href="#"><i class="fa fa-comment"></i></a></div>

          </div>
        </div>
      </div>
    </div>
    <div class="status col-lg-6 col-md-12 col-sm-12">
      <div class="card">
        <div class="card-body">
          <div class="from-group mb-3">
            <div class="input-group input-group-lg">
              <div class="input-group-prepend">
                <a href="">
                  <img class="dp img-fluid rounded-circle" src="img/person1.jpg" alt="Dipta Das">
                </a>
                <div class="d-inline-block">
                  <a href="#" class="text-dark nav-link no-space"><h4 class="mb-0 ml-1">Dipta Das</h4></a>
                  <small class="m-1">Posted on 21st Jan, 2018</small>
                </div>
              </div>
              <div class="align-self-center">
                <button class="ml-3 btn-subscribe btn btn-outline-primary btn-sm"><i class="fa fa-newspaper-o"></i> Full Story</button>
                <button class="ml-3 btn-subscribe btn btn-outline-primary btn-sm"><i class="fa fa-plus"></i> Subscribe</button>
              </div>
            </div>
          </div>
          <hr>
          <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae, id quod! Aliquam architecto consequatur delectus, deleniti est facilis impedit libero maxime quas repellat repudiandae, saepe soluta voluptate? Ab architecto asperioripsam iste non officia porro possimus provident quam sit tempora totam.</p>
          <hr>

          <div class="d-flex flex-row justify-content-center">
            <div class="mr-3"><span class="text-primary">128 </span><a href="#"><i class="fa fa-heart"></i></a></div>
            <div class="mr-3"><span class="text-primary">82 </span><a href="#"><i class="fa fa-share"></i></a></div>
            <div class="mr-3"><span class="text-primary">35 </span><a href="#"><i class="fa fa-comment"></i></a></div>

          </div>
        </div>
      </div>
    </div>
    <div class="status col-lg-6 col-md-12 col-sm-12">
      <div class="card">
        <div class="card-body">
          <div class="from-group mb-3">
            <div class="input-group input-group-lg">
              <div class="input-group-prepend">
                <a href="">
                  <img class="dp img-fluid rounded-circle" src="img/person1.jpg" alt="Dipta Das">
                </a>
                <div class="d-inline-block">
                  <a href="#" class="text-dark nav-link no-space"><h4 class="mb-0 ml-1">Dipta Das</h4></a>
                  <small class="m-1">Posted on 21st Jan, 2018</small>
                </div>
              </div>
              <div class="align-self-center">
                <button class="ml-3 btn-subscribe btn btn-outline-primary btn-sm"><i class="fa fa-newspaper-o"></i> Full Story</button>
                <button class="ml-3 btn-subscribe btn btn-outline-primary btn-sm"><i class="fa fa-plus"></i> Subscribe</button>
              </div>
            </div>
          </div>
          <hr>
          <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae, id quod! Aliquam architecto consequatur delectus, deleniti est facilis impedit libero maxisam iste non officia porro possimus provident quam sit tempora totam.</p>
          <hr>

          <div class="d-flex flex-row justify-content-center">
            <div class="mr-3"><span class="text-primary">128 </span><a href="#"><i class="fa fa-heart"></i></a></div>
            <div class="mr-3"><span class="text-primary">82 </span><a href="#"><i class="fa fa-share"></i></a></div>
            <div class="mr-3"><span class="text-primary">35 </span><a href="#"><i class="fa fa-comment"></i></a></div>

          </div>
        </div>
      </div>
    </div>
    <div class="status col-lg-6 col-md-12 col-sm-12">
      <div class="card">
        <div class="card-body">
          <div class="from-group mb-3">
            <div class="input-group input-group-lg">
              <div class="input-group-prepend">
                <a href="">
                  <img class="dp img-fluid rounded-circle" src="img/person1.jpg" alt="Dipta Das">
                </a>
                <div class="d-inline-block">
                  <a href="#" class="text-dark nav-link no-space"><h4 class="mb-0 ml-1">Dipta Das</h4></a>
                  <small class="m-1">Posted on 21st Jan, 2018</small>
                </div>
              </div>
              <div class="align-self-center">
                <button class="ml-3 btn-subscribe btn btn-outline-primary btn-sm"><i class="fa fa-newspaper-o"></i> Full Story</button>
                <button class="ml-3 btn-subscribe btn btn-outline-primary btn-sm"><i class="fa fa-plus"></i> Subscribe</button>
              </div>
            </div>
          </div>
          <hr>
          <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae, id quod! Aliquam architecto consequatur delectus, deleniti est facilis impedit libero maxime quas repellat repudiandae, saepe soluta voluptate? Ab architecto asperiores consectetur, culpa debitis delectus deleniti dignissimos dolorem esse harum ipsam iste non officia porro possimus provident quam sit tempora totam.</p>
          <hr>

          <div class="d-flex flex-row justify-content-center">
            <div class="mr-3"><span class="text-primary">128 </span><a href="#"><i class="fa fa-heart"></i></a></div>
            <div class="mr-3"><span class="text-primary">82 </span><a href="#"><i class="fa fa-share"></i></a></div>
            <div class="mr-3"><span class="text-primary">35 </span><a href="#"><i class="fa fa-comment"></i></a></div>

          </div>
        </div>
      </div>
    </div>
    <div class="status col-lg-6 col-md-12 col-sm-12">
      <div class="card">
        <div class="card-body">
          <div class="from-group mb-3">
            <div class="input-group input-group-lg">
              <div class="input-group-prepend">
                <a href="">
                  <img class="dp img-fluid rounded-circle" src="img/person1.jpg" alt="Dipta Das">
                </a>
                <div class="d-inline-block">
                  <a href="#" class="text-dark nav-link no-space"><h4 class="mb-0 ml-1">Dipta Das</h4></a>
                  <small class="m-1">Posted on 21st Jan, 2018</small>
                </div>
              </div>
              <div class="align-self-center">
                <button class="ml-3 btn-subscribe btn btn-outline-primary btn-sm"><i class="fa fa-newspaper-o"></i> Full Story</button>
                <button class="ml-3 btn-subscribe btn btn-outline-primary btn-sm"><i class="fa fa-plus"></i> Subscribe</button>
              </div>
            </div>
          </div>
          <hr>
          <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae, id quod! Aliquam architecto consequatur delectus, deleniti est facilis impedit libero maxime quas repellat repudiandae, saepe soluta voluptate? Ab architecto asperiores consectetur, culpa debitis delectus deleniti dignissimos dolorem esse harum ipsam iste non officia porro possimus provident quam sit tempora totam.</p>
          <hr>

          <div class="d-flex flex-row justify-content-center">
            <div class="mr-3"><span class="text-primary">128 </span><a href="#"><i class="fa fa-heart"></i></a></div>
            <div class="mr-3"><span class="text-primary">82 </span><a href="#"><i class="fa fa-share"></i></a></div>
            <div class="mr-3"><span class="text-primary">35 </span><a href="#"><i class="fa fa-comment"></i></a></div>

          </div>
        </div>
      </div>
    </div>

    <div class="status col-lg-6 col-md-12 col-sm-12">
      <div class="card">
        <div class="card-body">
          <div class="from-group mb-3">
            <div class="input-group input-group-lg">
              <div class="input-group-prepend">
                <a href="">
                  <img class="dp img-fluid rounded-circle" src="img/person1.jpg" alt="Dipta Das">
                </a>
                <div class="d-inline-block">
                  <a href="#" class="text-dark nav-link no-space"><h4 class="mb-0 ml-1">Dipta Das</h4></a>
                  <small class="m-1">Posted on 21st Jan, 2018</small>
                </div>
              </div>
              <div class="align-self-center">
                <button class="ml-3 btn-subscribe btn btn-outline-primary btn-sm"><i class="fa fa-newspaper-o"></i> Full Story</button>
                <button class="ml-3 btn-subscribe btn btn-outline-primary btn-sm"><i class="fa fa-plus"></i> Subscribe</button>
              </div>
            </div>
          </div>
          <hr>
          <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae, id quod! Aliqs consectetur, culpa debitis delectus deleniti dignissimos dolorem esse harum ipsam iste non officia porro possimus provident quam sit tempora totam.</p>
          <hr>

          <div class="d-flex flex-row justify-content-center">
            <div class="mr-3"><span class="text-primary">128 </span><a href="#"><i class="fa fa-heart"></i></a></div>
            <div class="mr-3"><span class="text-primary">82 </span><a href="#"><i class="fa fa-share"></i></a></div>
            <div class="mr-3"><span class="text-primary">35 </span><a href="#"><i class="fa fa-comment"></i></a></div>

          </div>
        </div>
      </div>
    </div>
    <!--./test ends-->




  </div>
</div>


</div>

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
