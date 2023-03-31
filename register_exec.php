<?php
session_start();
include('dbcon.php');
if($_SERVER["REQUEST_METHOD"] == "POST"){

    $firstname=trim($_POST['firstname']);
    $lastname=trim($_POST['lastname']);    
    $nickname=trim($_POST['nickname']);
    $email=trim($_POST['email']);
    $phonenumber=trim($_POST['phonenumber']);
    $talent=trim($_POST['talent']);
    $style=trim($_POST['style']);
    $location=trim($_POST['location']);
    //$anyfile = isset($_POST['anyfile']);
		$uniqueUser=$firstname.$nickname;
    $fullname = $firstname." ".$lastname;     
    $rd2 = mt_rand(10000, 990000).'_'.time();
    if(preg_match("/^[0]{1}[0-9]{10}$/", $phonenumber)) {
			if(isset($_FILES["anyfile"]) && $_FILES["anyfile"]["error"] == 0){
        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "png" => "image/png");
        $filename = $_FILES["anyfile"]["name"];
        $filetype = $_FILES["anyfile"]["type"];
        $filesize = $_FILES["anyfile"]["size"];
        $newFileName =$rd2."_".$nickname."_".$filename;
        // Validate file extension
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(!array_key_exists($ext, $allowed)){     
        ?>
        <script type="text/javascript">
            alert('Error: Please select a valid file format.');
            window.location.replace('register.php');
        </script>
    
        <?php
       exit();
        } 
    
        // Validate file size - 10MB maximum
        $maxsize = 10 * 1024 * 1024;
        if($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");
    
        // Validate type of the file
        if(in_array($filetype, $allowed)){
            // Check whether file exists before uploading it
            $check_if_already_in_category = mysqli_query($con, "select * from audition where email='$email'");
            $count_check = mysqli_num_rows($check_if_already_in_category);
            if($count_check > 0){
              ?>
              <script type="text/javascript">
                  alert('Duplicate Registration, We have this record');
                  window.location.replace('register.php');
              </script>
          
      <?php
              
              exit();
            }

            $check_if_already_in_category = mysqli_query($con, "select * from audition where phone='$phonenumber'");
            $count_check = mysqli_num_rows($check_if_already_in_category);
            if($count_check > 0){
              ?>
              <script type="text/javascript">
                  alert('Duplicate Registration, We have this record');
                  window.location.replace('register.php');
              </script>
          
      <?php
              
              exit();
            }
      
            $count_num_nominated = mysqli_query($con, "select * from tbl_junction where unique_identity='$uniqueUser'");
            $count = mysqli_num_rows($count_num_nominated);
            if($count > 0){
              ?>
              <script type="text/javascript">
                   alert('Duplicate Registration, We have this record');
                  window.location.replace('register.php');
              </script>
          
      <?php
              
              exit();
              
            }

                if(move_uploaded_file($_FILES["anyfile"]["tmp_name"], "assets/passports/" . $newFileName)){
                  $uploaddir = 'assets/passports/'.$newFileName;

                  $sql=mysqli_query($con, "INSERT INTO audition(fullname, email, phone, photo,nickname, location, talent,style_genre,unique_name) 
                  VALUES ('$fullname','$email','$phonenumber','$uploaddir','$nickname','$location','$talent','$style', '$uniqueUser')");
                 
                  $sql2=mysqli_query($con, "INSERT INTO tbl_junction(unique_identity) VALUES('$uniqueUser')");  
                  if($sql){
                    ?>
                    
                    <!DOCTYPE html>
<html>

<head>
<title>Biglive Audition</title>
	
	
    <!-- [ FONT-AWESOME ICON ] 
            
    =========================================================================================================================-->
        
    <link rel="stylesheet" type="text/css" href="library/font-awesome-4.3.0/css/font-awesome.min.css">
    
        
    <!-- [ PLUGIN STYLESHEET ]
            
    =========================================================================================================================-->
        
    <link rel="shortcut icon" type="image/x-icon" href="images/icon.png">
        
    <link rel="stylesheet" type="text/css" href="css/animate.css">
        
    <link rel="stylesheet" type="text/css" href="css/owl.carousel.css">
            
    <link rel="stylesheet" type="text/css" href="css/owl.theme.css">
        
    <link rel="stylesheet" type="text/css" href="css/magnific-popup.css">
        
    <!-- [ Boot STYLESHEET ]
            
    =========================================================================================================================-->
        
    <link rel="stylesheet" type="text/css" href="library/bootstrap/css/bootstrap-theme.min.css">
        
    <link rel="stylesheet" type="text/css" href="library/bootstrap/css/bootstrap.css">
           
    <!-- [ DEFAULT STYLESHEET ] 
            
    =========================================================================================================================-->
        
    <link rel="stylesheet" type="text/css" href="css/style.css">
            
    <link rel="stylesheet" type="text/css" href="css/responsive.css">
        
    <link rel="stylesheet" type="text/css" href="css/color/rose.css">
    <link rel="stylesheet" media="screen" href="css/printmain.css" />
<link rel="stylesheet" media="print" href="css/print.css" />
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
<?php
$sql_query = "SELECT * FROM audition WHERE phone= '".$phonenumber."'";
$resultset = mysqli_query($con, $sql_query) or die("database error:". mysqli_error($con));
$row = mysqli_fetch_array($resultset);
?>
    <div class="outer">
            <div class="content" style="height:700px; width:700px; margin-top:70px;margin-left:200px;"> 
            <img src="images/print.png" class="print" style="height:700px; width:700px;position:absolute;margin-top:-90px;margin-left:-200px;" alt="">
            <div style="position:relative; margin-top:-20px;">
             <div style="height:350px; height:170px;margin-bottom:95px;border-width:40px;border-color:green" >
                <img src="<?php echo $uploaddir;?>" class="img img-responsive" style="margin-left:-110px;margin-top:-100x; border-color:white;border-radius:50px 50px 0px 0px;border-color:white;position:absolute;width:25%;height:60%;">
              </div>
                <h3 style="font-size:30px;margin-left:25px;margin-top:50px;position:relative;"><?php echo $row['id'];?></h3>
                <h3 style="font-size:20px;color:white;margin-left:-160px;margin-top:40px;position:relative;">NAME: <?php echo $nickname;?></h3> 
                <h3 style="font-size:20px:color:white;margin-left:-80px;margin-top:15px;position:relative;"><?php echo $style;?></h3>        

            </div> 
            </div>
    </div>
  
<div class="row" id="">
<button class="btn btn-info " type="button" id="printbtn" onclick='window.print()' >
      <i class="fa fa-print"></i>Click here to Download your Artwork!
</button>  
</div>    
</body>

</html>
                     <?php
                    }else{
                      ?>
                      <script type="text/javascript">
                          alert('An Error Occured, try again later.');
                          window.location.replace('register.php');
                      </script>
                  
              <?php
                      
                      exit();                   
                     
                    }
                   
                }else{
                  ?>
                  <script type="text/javascript">
                      alert('File is not uploaded');
                      window.location.replace('register.php');
                  </script>
              
          <?php
          exit();
                }
                
          
        } else{
          ?>
                  <script type="text/javascript">
                      alert('Error: There was a problem uploading your file. Please try again.');
                      window.location.replace('register.php');
                  </script>
              
          <?php
          exit();          
        }
    } else{
     
        echo "Error: " . $_FILES["anyfile"]["error"];
    }
  }else{
    ?>
        <script type="text/javascript">
            alert('Invalid Phone Number Supplied.');
            window.location.replace('register.php');
        </script>
    
<?php
       exit(); 
  }   
    
    
		


}
?>



