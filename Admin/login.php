<?php 
session_start();
include('partials/conn.php');
if(!isset($_SESSION['construction_admin_login'])){
  ?>
  <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Jhaji Construction | Sign In</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link rel="shortcut icon" href="../logo.png" type="image/x-icon">
  <style>
    .login-page, .register-page {
   
    background-color: #f5f5f5;
   
}
.login-card-body, .register-card-body {
    background-color: #000000;
    
}
.login-box-msg, .register-box-msg {
    color:#ffffff;
}
.login-card-body .input-group .input-group-text, .register-card-body .input-group .input-group-text {

    color: #b3181b;

}
.login-box, .register-box {
    width: 360px;
    background-color:#b3181b;
    
}
.login-logo a, .register-logo a {
    color: #ffffff;
}
.btn-primary ,.btn-primary:hover{
    color: #ffffff;
    background-color: #b3181b;
    border-color: #b3181b;
    box-shadow: none;
}
    </style>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="index.php"><b>Jhaji</b>Construction</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="#" method="POST">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Username" name="username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block" name="login">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <?php 
      
        if(isset($_POST['login'])){
          
          $username=$_POST['username'];
          $password=$_POST['password'];
          $login_res=mysqli_query($conn,"Select * from admin_login where username='$username' AND password='$password'");
          if(mysqli_num_rows($login_res)){
            $login_data=mysqli_fetch_array($login_res);
            $_SESSION['construction_admin_login']=$login_data['name'];
            echo "<script>location.href='index.php';</script>";
          }else{
            echo "<script>alert('Invalid Username and Password......');</script>";
          }
        }
      
      ?>
     
      <!-- /.social-auth-links -->

      
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>

  <?php
}else{
  echo "<script>location.href='index.php';</script>";
}

?>

