<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin 2 - Login</title>

  <!-- Custom fonts for this template-->
  <!-- <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css"> -->
  <link rel="stylesheet" href="<?php echo get_template_directory('admin/vendor/fontawesome-free/css/all.min.css') ;?>">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <!-- <link href="css/sb-admin-2.min.css" rel="stylesheet"> -->
  <link rel="stylesheet" href="<?php echo get_template_directory('admin/css/sb-admin-2.min.css') ;?>">

<style>
  .bg-img {
    /* The image used */
    background-image: url('<?php echo get_foto_assets('login.jpg')?>');

    /* Control the height of the image */
    min-height: 380px;

    /* Center and scale the image nicely */
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    position: relative;
  }
  </style>

</head>

<body class="bg-gray-800">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-img"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">LOGIN</h1>
                  </div>
                  <form class="user" action="<?=base_url('login')?>" method="POST">
                    <div class="form-group">
                      <input type="text" name="username_login" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Username" required><br>
                      <font style="font-size: 12px; color: red;"><?php echo form_error('username_login'); ?></font>
                    </div>
                    <div class="form-group">
                      <input type="password" name="password_login" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" required><br>
                      <font style="font-size: 12px; color: red;"><?php echo form_error('password_login'); ?></font>
                    </div>
                    <!--<div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Remember Me</label>
                      </div>
                    </div> -->
                    <button type="submit" class="btn btn-primary btn-user btn-block">Login</button>
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="forgot-password.html">Forgot Password?</a>
                  </div>
                  <div class="text-center">
                    <a class="small" href="register.html">Create an Account!</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <!-- <script src="vendor/jquery/jquery.min.js"></script> -->
  <script src="<?php echo get_template_directory('admin/vendor/jquery/jquery.min.js') ;?>" crossorigin="anonymous"></script>
  <!-- <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script> -->
  <script src="<?php echo get_template_directory('admin/vendor/bootstrap/js/bootstrap.bundle.min.js') ;?>" crossorigin="anonymous"></script>

  <!-- Core plugin JavaScript-->
  <!-- <script src="vendor/jquery-easing/jquery.easing.min.js"></script> -->
  <script src="<?php echo get_template_directory('admin/vendor/jquery-easing/jquery.easing.min.js') ;?>" crossorigin="anonymous"></script>

  <!-- Custom scripts for all pages-->
  <!-- <script src="js/sb-admin-2.min.js"></script> -->
  <script src="<?php echo get_template_directory('admin/js/sb-admin-2.min.js') ;?>" crossorigin="anonymous"></script>

</body>

</html>
