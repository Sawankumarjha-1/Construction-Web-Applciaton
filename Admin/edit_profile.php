<?php 
session_start();
include('partials/check.php');
include('partials/conn.php');
include('partials/conn.php');
$adminRes=mysqli_query($conn,"Select * from admin_login where id=1");
$adminData=mysqli_fetch_assoc($adminRes);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Jhaji Construction | Edit Profile</title>
  <?php include('partials/head.php');?>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navigation And Preloader -->
  <?php include('partials/navbar.php');?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          
         
        </div>
      </div><!-- /.container-fluid -->
    </section>
        <!-- Main content -->
        <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Profile</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" enctype="multipart/form-data">
                <div class="card-body">
                
                  <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" class="form-control" id="" placeholder="Name" name="name" value="<?php echo $adminData['name'];?>" required>
                  </div>
                  <div class="form-group">
                    <label for="">Email</label>
                    <input type="text" class="form-control" id="" placeholder="Email" name="email" value="<?php echo $adminData['email'];?>" required>
                  </div>
                  <div class="form-group">
                    <label for="">Username</label>
                    <input type="text" class="form-control" id="" placeholder="Username" name="username" value="<?php echo $adminData['username'];?>" required>
                  </div>
                  <div class="form-group">
                    <label for="">Password</label>
                    <input type="text" class="form-control" id="" placeholder="Password" name="password" value="<?php echo $adminData['password'];?>" required>
                  </div>
                 
                  
                  <div class="form-group">
                    <label for="">Phone</label>
                    <input type="text" class="form-control" id="" placeholder="Phone No." name="phone" value="<?php echo $adminData['phone'];?>" required>
                  </div>
                  <div class="form-group">
                    <label for="">Address</label>
                    <input type="text" class="form-control" id="" placeholder="Address" name="address" value="<?php echo $adminData['address'];?>" required>
                  </div>
                  <div class="form-group">
                    <label for="">Images ( <?php echo $adminData['image'];?> )</label>
                    <input type="file" class="form-control" id="" name="image" style="border:none;" >
                  </div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-danger" name="update_team">Update Profile</button>
                </div>
              </form>
              <?php 
                if(isset($_POST['update_team'])){
                  $name=$_POST['name'];
                  $email=$_POST['email'];
                  $password=$_POST['password'];
                  $username=$_POST['username'];
                  $phone=$_POST['phone'];
                  $address=$_POST['address'];
                  $image=$_FILES['image']['name'];
                  echo $image;
                  if($image!=''){
                    $temp_name=$_FILES['image']["tmp_name"];
                      $path="../".$image;
                      echo $path;
                      move_uploaded_file($temp_name,$path);
                      $ins_pro=mysqli_query($conn,"UPDATE `admin_login` SET`name`='$name',`username`='$username',`password`='$password',`email`='$email',`address`='$address',`phone`='$phone',`image`='$image' WHERE id=1");
                  }else{
                    $ins_pro=mysqli_query($conn,"UPDATE `admin_login` SET`name`='$name',`username`='$username',`password`='$password',`email`='$email',`address`='$address',`phone`='$phone' WHERE id=1");
                  }
                  
                  
                  if($ins_pro){
                    echo "<script>alert('Profile Update Successfully......');</script>";
                    echo "<script>location.href='profile.php'</script>";
                  }else{
                  echo "<script>alert('Something Wrong......');</script>";
                  }
                }
              ?>
            </div>
            <!-- /.card -->

          
          </div>
          
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!-- Footer -->
    <?php include('partials/footer.php');?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>

</body>
</html>
