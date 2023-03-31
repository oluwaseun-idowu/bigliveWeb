
<?php
if(isset($_REQUEST['createzip']) and $_REQUEST['createzip']!=""){
  extract($_REQUEST);
  $filename   =   'all_cat_nominees_'.rand(1000,5000).time().'.zip';
  //$fileId = $_POST['fileId'];
  //$db         =   new mysqli('localhost','voguhjvk_sugawards','AARdcoL0NK[y','voguhjvk_sugawards');
  $db         =   new mysqli('localhost','root','','award_db');
  $fileQry    =   $db->query('SELECT nominee_passport FROM nominee');

  $zip = new ZipArchive;
  if ($zip->open($filename,  ZipArchive::CREATE)){
    while($row  =   $fileQry->fetch_assoc()){
      $nominee_passport = $row['nominee_passport'];
      $subr_nominee_passport = substr($nominee_passport, 17);
      $zip->addFile(getcwd().'/'.'../assets/passports/'.$subr_nominee_passport,$subr_nominee_passport);
    }
    $zip->close();

    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="' . basename($filename).'"');
    header('Content-Transfer-Encoding: binary');
    header('Expires: 0');
    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
    header('Pragma: public');
    header('Content-Length: ' . filesize($filename));
    ob_clean();
    flush();

    readfile($filename);


  }else{
    echo 'Failed!';
  }
}

if(isset($_REQUEST['createzipsingle']) and $_REQUEST['createzipsingle']!=""){
  extract($_REQUEST);
  //$filename   =   'single_cat_nominees_'.rand(1000,5000).time().'.zip';
  $fileId = $_POST['fileId'];
  //$db         =   new mysqli('localhost','voguhjvk_sugawards','AARdcoL0NK[y','voguhjvk_sugawards');
  $db         =   new mysqli('localhost','root','','award_db');
  $fileQry    =   $db->query("SELECT * FROM nominee where nomination_id = '$fileId'");
  $filename_row =   $fileQry->fetch_assoc();
  $filename =$filename_row['nomination_name'] .'_'.rand(1000,5000).time().'.zip';;
  $zip = new ZipArchive;
  if ($zip->open($filename,  ZipArchive::CREATE)){
    while($row  =   $fileQry->fetch_assoc()){
      $nominee_passport = $row['nominee_passport'];
      $subr_nominee_passport = substr($nominee_passport, 17);
      $zip->addFile(getcwd().'/'.'../assets/passports/'.$subr_nominee_passport,$subr_nominee_passport);
    }
    $zip->close();

    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="' . basename($filename).'"');
    header('Content-Transfer-Encoding: binary');
    header('Expires: 0');
    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
    header('Pragma: public');
    header('Content-Length: ' . filesize($filename));
    ob_clean();
    flush();

    readfile($filename);


  }else{
    echo 'Failed!';
  }
}
