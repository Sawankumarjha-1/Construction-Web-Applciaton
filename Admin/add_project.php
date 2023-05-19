<?php 
session_start();
include('partials/check.php');
include('partials/conn.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Jhaji Construction | Add Project</title>
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
                <h3 class="card-title">Add Project</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="">Project Category</label>
                    <select name="category" class="form-control">
                      <option value="" selected >Select Category</option>
                      <?php 
                        $categ=mysqli_query($conn,"Select * from project_category");
                        if(mysqli_num_rows($categ)){

                          while($categ_data=mysqli_fetch_assoc($categ)){

                            ?>

                            <option value="<?php echo $categ_data['category_name'];?>"><?php echo $categ_data['category_name'];?></option>
                            <?php
                          }

                        }else{
                          ?>
                            <p>No Category Found!</p>
                          <?php
                        }
                      ?>

                    </select>
                  </div>
                  <div class="form-group">
                    <label for="">Project Name</label>
                    <input type="text" class="form-control" id="" placeholder="Project Name" name="project_name" required>
                  </div>
                  <div class="form-group">
                    <label for="">Images</label>
                    <input type="file" class="form-control" id="" name="image[]" style="border:none;" multiple required>
                  </div>
                  <div class="form-group">
                  <label for="">Description</label>
                  <textarea name="detail" class="form-control"  placeholder="Description" required></textarea>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-danger" name="add_project">Add Project</button>
                </div>
              </form>
              <?php 
                if(isset($_POST['add_project'])){
                  $category=$_POST['category'];
                  $project_name=$_POST['project_name'];
                  $detail=$_POST['detail'];

                  $countImg=count($_FILES['image']['name']);
                  for($i=0;$i<$countImg;$i++){
                    $fileboat=$_FILES['image']['name'][$i];
                    move_uploaded_file($_FILES['image']['tmp_name'][$i],'../projectImg/'.$fileboat);
                    $urlboat=$fileboat;
                    $boat_arr[]=$urlboat;
                  }
                  $boat_img=implode(",",$boat_arr);
                  
                  $ins_pro=mysqli_query($conn,"INSERT INTO `projects`(`project_name`, `category`, `image`, `detail`) VALUES ('$project_name','$category','$boat_img','$detail')");
                  
                  if($ins_pro){
                    echo "<script>alert('Add Successfully......');</script>";
                    echo "<script>location.href='add_project.php'</script>";
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
