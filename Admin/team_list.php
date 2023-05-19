<?php 
session_start();
include('partials/check.php');
include('partials/conn.php');
if(isset($_GET['deleteId']))
{
    $delId=$_GET['deleteId'];
    $del_project=mysqli_query($conn,"DELETE FROM `team` WHERE id=$delId");
    if($del_project){
        echo "<script>alert('Remove Successfully......');</script>";
        echo "<script>location.href='team_list.php';</script>";
        
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Jhaji Construction | Team Member List</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Favicon -->
  <link rel="shortcut icon" href="../logo.png" type="image/x-icon">
  <!-- Changes Css -->
  <link rel="stylesheet" href="changes.css?<?php echo time();?>">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
    <?php include('partials/navbar.php');?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper my-2 py-2" >

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Team Member Lists <a href="add_team.php" class="btn btn-danger"><i class="fa fa-plus-circle" aria-hidden="true"></i></a></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Designation</th>
                    <th>Images</th>
                    <th>Short Detail</th>
                    <th>Description</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php 
                    $project_res=mysqli_query($conn,"SELECT * FROM `team`");
                    if(mysqli_num_rows($project_res)){
                        while($project_data=mysqli_fetch_assoc($project_res)){
                           
                            ?>
                            <tr>
                                <td><?php echo $project_data['id'];?></td>
                                <td><?php echo $project_data['name'];?></td>
                                <td><?php echo $project_data['designation'];?></td>
                                <td>
                                <img src="../teamImg/<?php echo $project_data['image'];?>" alt="<?php echo $project_data['image'];?>" style="width:50px; height:50px; margin:2px;"></td>
                                <td><?php echo $project_data['less_details'];?></td>
                                <td style="width:30%;"><?php echo $project_data['details'];?></td>
                                <td style="width:15%;">
                                    <a href="team_list.php?deleteId=<?php echo $project_data['id'];?>" onclick="return confirm('Do you want to delete ?');"class="btn btn-danger" title="Delete"><i class="fa fa-trash" aria-hidden="true" style="color:#ffffff; margin:2px;"></i></a>
                                    <a href="edit_team.php?editId=<?php echo $project_data['id'];?>" class="btn btn-primary" title="Update"><i class="fa fa-edit" aria-hidden="true" style="color:#ffffff;  margin:2px;"></i></a>
                                </td>
                                
                              </tr>
                            <?php
                        }
                    }else{
                        ?>
                        <h2>Data Not Found!</h2>
                        <?php
                    }
                  ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Designation</th>
                    <th>Images</th>
                    <th>Short Detail</th>
                    <th>Description</th>
                    <th>Action</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
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
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>
