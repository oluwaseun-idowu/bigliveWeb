<?php
//Add script to read MySQL data and export to excel
include("read_and_export.php");

?>

<!DOCTYPE html>
<html>
<head>
  <title>Admin | Export</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link rel="stylesheet"
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet"
        href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
  <script
    src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script
    src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>

<body>

<div class="container">
  <div class="card">
    <div class="card-header"><i class="fa fa-fw fa-download"></i> <strong>Export Participants to Excel</strong></div>
    <div class="card-body">

      <div class="col-sm-4 ml-auto mr-auto border p-3">
        <form method="post" action="#">
          <div class="form-group">
            <label><strong>Select participant</strong></label>
            <select name="id" class="form-control">
              <option value="">--Select participant--</option>
              <?php
              //$db         =   new mysqli('localhost','voguhjvk_sugawards','AARdcoL0NK[y','voguhjvk_sugawards');
              $db         =   new mysqli('localhost','root','','biglive');
              $fileQry    =   $db->query('SELECT id, nickname FROM audition');
              if($fileQry->num_rows>0){
                while($row  =   $fileQry->fetch_assoc()){
                  $nomination_id = $row['id'];
                  $nomination_name = $row['nickname'];
                  ?>

                  <option value="<?php echo $row['id'];?>"><?php echo $row['nickname']. ' ('. $row['id'] . ')';?></option>
                  <?php
                }
              }?>
            </select>

          </div>


          <div class="form-group">
            <button type="submit" name="exportsingle" id="exportsingle" value="exportsingle" class="btn btn-primary"><i class="fa fa-download"></i> Export</button>
            <button type="submit" id="export" name="export"
                    value="Export to excel" class="btn btn-primary"><i class="btn-file"></i>Export All To Excel</button>
          </div>
        </form>
      </div>


    </div>
  </div>
</div>

</body>
</html>
