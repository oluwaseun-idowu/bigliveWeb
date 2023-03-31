<?php
include('header.php');
include('../dbcon.php');
$nominee_id = $_GET['nominee_id'];
$user_query = mysqli_query($con,"select * from nominee where nominee_id ='$nominee_id'");
$fetch_user_query = mysqli_fetch_array($user_query);
$num_row_stat= mysqli_num_rows($user_query);
$nominee_name = $fetch_user_query['nominee_name'];
$nominee_department =  $fetch_user_query['nominee_department'];
$nominee_level =  $fetch_user_query['nominee_level'];
$nominee_nickname =  $fetch_user_query['nominee_nickname'];
$category_id = $fetch_user_query['nomination_id'];
$category_name = $fetch_user_query['nomination_name'];
?>

<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <?php include('navbar.php')?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php include('sidebar.php');?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Nominee</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Nominee</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Nominee</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="edit-categories.php" method="POST">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nominee Name</label>
                    <input type="hidden" name="nominee_id" value="<?php echo $nominee_id?>">
                    <input type="text" name="nominee_name" class="form-control" id="exampleInputEmail1" value="<?php echo $nominee_name?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nominee Department</label>
                    <input type="text" name="nominee_department" class="form-control" id="exampleInputEmail1" value="<?php echo $nominee_department?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nominee level</label><br>
                    <select name="nominee_level" class="form-control" id="">
                      <option><?php echo $nominee_level?></option>
                      <option value="">--Select Level--</option>
                      <option value="100">100</option>
                      <option value="200">200</option>
                      <option value="300">300</option>
                      <option value="400">400</option>
                      <option value="500">500</option>
                      <option value="600">600</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nominee Nickname</label>
                    <input type="text" name="nominee_nickname" class="form-control" id="exampleInputEmail1" value="<?php echo $nominee_nickname?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Category Nominated</label><br>
                    <select name="category_nominated" class="form-control">
                      <option><?php echo $category_name?></option>
                      <option>-select Category-</option>
                      <?php
                      $query = mysqli_query($con,"SELECT * FROM category order by category_name ASC");
                      while($row = mysqli_fetch_array($query)){
                        $category_id_two = $row['category_id'];
                        $category_name_two = $row['category_name'];
                        ?>
                        <option value="<?php echo $category_id_two; ?>"><?php echo  $category_name_two; ?> </option>
                      <?php } ?>
                    </select>
                  </div>

                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="submit" class="btn btn-primary"> <i class="fas fa-save"></i>&nbsp;Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
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
<!-- bs-custom-file-input -->
<script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script>
  $(function () {
    bsCustomFileInput.init();
  });
</script>
</body>
</html>
<?php
$category_name = trim($_POST['category_name']);
$category = trim($_POST['category_id']);
if(isset($_POST['submit'])){

    $sql=mysqli_query($con, "UPDATE category SET category_name ='$category_name' WHERE category_id='$category'");

    if($sql){
      ?>
      <script type="text/javascript">
        alert('Category Updated successfully');
        window.location.replace('edit-categories.php<?php echo '?category_id='.$category;?>');
              </script>

              <?php
              exit;
            }


        }


        ?>
