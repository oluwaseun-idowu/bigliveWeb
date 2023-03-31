
<?php
if(isset($_POST["export_all"])) {
  $host = "localhost";
  $username = "root";
  $password = "";
  $dbname = "award_db";
  $con = new mysqli($host, $username, $password, $dbname);

  $sql_data = "select * from nominee";
  $result_data = $con->query($sql_data);
  $results = array();
  $fileName = "itemdata-".date('d-m-Y h-m-s').".xls";
// Download file
  header('Content-Type: application/vnd.ms-excel');
  header('Content-Disposition: attachment; filename='.$fileName);

//Set variable to false for heading
  $heading = false;
  $flag = false;
  while ($row = mysqli_fetch_assoc($result_data)) {
    if (!$flag) {
      // display field/column names as first row
      echo implode("\t", array_keys($row)) . "\r\n";
      $flag = true;
    }
    echo implode("\t", array_values($row)) . "\r\n";
  }
}
?>
<?php
include('../dbcon.php');
include('header.php');
?>

<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->

  <!-- /.navbar -->
  <?php include('navbar.php')?>
  <?php include('sidebar.php')?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Nominees</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Nominees</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <!-- /.card -->

            <div class="card">

              <div class="card-header">
                <h3 class="card-title">List of all Nominees</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form action="" method="post">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th></th>
                      <th>Nominee Name</th>
                      <th>Nominee Department</th>
                      <th>Level</th>
                      <th>Nickname</th>
                      <th>Username</th>
                      <th>Category Nominated</th>
                      <th>Action</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $is_deleted="deleted";
                    $user_query = mysqli_query($con,"select * from nominee");
                    //$count_category = mysqli_num_rows($user_query);
                    while ($row = mysqli_fetch_array($user_query)) {
                      $id = $row['nominee_id'];
                      $nominee_name = $row['nominee_name'];
                      $nominee_department = $row['nominee_department'];
                      $nominee_level = $row['nominee_level'];
                      $nominee_nickname = $row['nominee_nickname'];
                      $nominee_cat = $row['nomination_name'];
                      $nominee_username = $row['nominee_username'];
                      ?>
                      <tr>
                        <td style="width:auto;"><input type="checkbox"></td>
                        <td><?php echo $nominee_name?></td>
                        <td><?php echo  $nominee_department?></td>
                        <td><?php echo $nominee_level ?></td>
                        <td><?php echo $nominee_nickname?></td>
                        <td><?php echo $nominee_username?></td>
                        <td><?php echo  $nominee_cat?></td>
                        <td>
                          <a type="button" href="edit-nominee.php<?php echo '?nominee_id='.$id;?>" class="btn btn-primary btn-xs btn-icon-text">
                            <i class="fas fa-edit"></i>
                          </a>
                          <a type="button" href="edit-nominee.php<?php echo '?nominee_id='.$id;?>" class="btn btn-danger btn-xs btn-icon-text">
                            <i class="fas fa-trash"></i>
                          </a>
                        </td>
                      </tr>

                    <?php } ?>
                    </tbody>
                    <tfoot>
                    <tr>
                      <th></th>
                      <th>Nominee Name</th>
                      <th>Nominee Department</th>
                      <th>Level</th>
                      <th>Nickname</th>
                      <th>Username</th>
                      <th>Category Nominated</th>
                      <th>Action</th>

                    </tr>
                    </tfoot>
                  </table>
                </form>
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

  <div class="modal fade" id="modal-default">
    <div class="modal-dialog">
      <div class="modal-content">
        <form class="modal-content" method="post" action="delete-categories.php">
          <div class="modal-header">
            <h4 class="modal-title">Delete Category</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>Are you sure you want to delete this record?</p>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Yes</button>
          </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.1.0-pre
    </div>
    <strong>Copyright &copy; 2014-2020 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>

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
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
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

