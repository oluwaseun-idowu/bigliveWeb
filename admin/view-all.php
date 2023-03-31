<?php
include('../dbcon.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
<title>Biglive Audition</title>
	
	
    <!-- [ FONT-AWESOME ICON ] 
            
    =========================================================================================================================-->
        
    <link rel="stylesheet" type="text/css" href="../library/font-awesome-4.3.0/css/font-awesome.min.css">
    
        
    <!-- [ PLUGIN STYLESHEET ]
            
    =========================================================================================================================-->
        
    <link rel="shortcut icon" type="image/x-icon" href="../images/icon.png">
        
    <link rel="stylesheet" type="text/css" href="../css/animate.css">
        
    <link rel="stylesheet" type="text/css" href="../css/owl.carousel.css">
            
    <link rel="stylesheet" type="text/css" href="../css/owl.theme.css">
        
    <link rel="stylesheet" type="text/css" href="../css/magnific-popup.css">
        
    <!-- [ Boot STYLESHEET ]
            
    =========================================================================================================================-->
        
    <link rel="stylesheet" type="text/css" href="../library/bootstrap/css/bootstrap-theme.min.css">
        
    <link rel="stylesheet" type="text/css" href="../library/bootstrap/css/bootstrap.css">
           
    <!-- [ DEFAULT STYLESHEET ] 
            
    =========================================================================================================================-->
        
    <link rel="stylesheet" type="text/css" href="../css/style.css">
            
    <link rel="stylesheet" type="text/css" href="../css/responsive.css">
        
    <link rel="stylesheet" type="text/css" href="../css/color/rose.css">
    <link rel="stylesheet" media="screen" href="../css/printmain.css" />
<link rel="stylesheet" media="print" href="../css/print.css" />
  <style>
      /* Styles go here */
      .content {
  position: absolute;
  left: 50%;
  top: 50%;
  transform: translate(-50%, -50%);
  -webkit-print-color-adjust: exact;
  background: #222;
  color: white;
}
@media print {
     @page {
        margin-left: 0.5in;
        margin-right: 0.5in;
        margin-top: -70px;
        margin-bottom: 0;
      -webkit-print-color-adjust: exact;
        color: white;
      }
      #printbtn {
        display :  none;
    }
    h3{
      color:white;
    }
}

  </style>
</head>
<body>

  <!-- Navbar -->

  <!-- /.navbar -->


  <!-- Content Wrapper. Contains page content -->
  
                <table>                  
                  
                  <?php
                  $user_query = mysqli_query($con,"select * FROM audition");
                  $count_category = mysqli_num_rows($user_query);
                  while ($row = mysqli_fetch_array($user_query)) {
                  $id = $row['id'];
                  $cat_name = $row['fullname'];
                  ?>
                  <tr>
                   <td>
                   <div class="outer">
                        <div class="content" style="height:700px; width:700px; margin-top:70px;margin-left:200px;"> 
                        <img src="../images/print.png" class="print" style="height:700px; width:700px;position:absolute;margin-top:-90px;margin-left:-200px;" alt="">
                        <div style="position:relative; margin-top:-20px;">
                        <div style="height:350px; height:170px;margin-bottom:95px;border-width:40px;border-color:green" >
                            <img src="../<?php echo $row['photo'];?>" class="img img-responsive" style="margin-left:-110px;margin-top:-100x; border-color:white;border-radius:50px 50px 0px 0px;border-color:white;position:absolute;width:25%;height:60%;">
                        </div>
                            <h3 style="font-size:30px;margin-left:25px;margin-top:50px;position:relative;"><?php echo $row['id'];?></h3>
                            <h3 style="font-size:20px;color:white;margin-left:-160px;margin-top:40px;position:relative;">NAME: <?php echo $row['fullname'];?></h3> 
                            <h3 style="font-size:20px:color:white;margin-left:-80px;margin-top:15px;position:relative;"><?php echo $row['style_genre'];?></h3>        

                        </div> 
                        </div>
                </div>
                   </td>
                  </tr>
                  <?php } ?>
                 
                  
                </table>
            

  <div class="row" id="">
<button class="btn btn-info " type="button" id="printbtn" onclick='window.print()' >
      <i class="fa fa-print"></i>Click here to Download your Artwork!
</button>  
</div>    
</body>

</html>
