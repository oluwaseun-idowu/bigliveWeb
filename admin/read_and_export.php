<?php
if(isset($_POST["export"])) {
//$servername = "localhost";
//$username = "voguhjvk_sugawards";
//$password = "AARdcoL0NK[y";
//$myDB = "voguhjvk_sugawards";
$servername = "localhost";
$username = "root";
$password = "";
$myDB = "biglive";
  //'voguhjvk_sugawards','AARdcoL0NK[y','voguhjvk_sugawards'
try {
  $conn = new PDO("mysql:host=$servername;dbname=$myDB", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 // echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
$sql = "select * from audition";

$result = $conn->query($sql);

//query($query);
$items = array();

//Store table records into an array
while( $row = $result->fetch(PDO::FETCH_ASSOC)) {
  $items[] = $row;
}
//Check the export button is pressed or not

//Define the filename with current date
  $fileName = "itemdata-".date('d-m-Y h-m-s').".xls";

//Set header information to export data in excel format
  header('Content-Type: application/vnd.ms-excel');
  header('Content-Disposition: attachment; filename='.$fileName);

//Set variable to false for heading
  $heading = false;

//Add the MySQL table data to excel file
  if(!empty($items)) {
    foreach($items as $item) {
      if(!$heading) {
        echo implode("\t", array_keys($item)) . "\n";
        $heading = true;
      }
      echo implode("\t", array_values($item)) . "\n";
    }
  }
  exit();
}

?>

<?php

if(isset($_POST["exportsingle"])) {
 // $servername = "localhost";
  //$username = "voguhjvk_sugawards";
  //$password = "AARdcoL0NK[y";
  //$myDB = "voguhjvk_sugawards";
  $servername = "localhost";
$username = "root";
$password = "";
$myDB = "biglive";
  $nom_id = $_POST['id'];
  try {
    $conn = new PDO("mysql:host=$servername;dbname=$myDB", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected successfully";
  } catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }
  $sql = "select * from audition where id = '$nom_id'";

  $result = $conn->query($sql);

//query($query);
  $items = array();

//Store table records into an array
  while( $row = $result->fetch(PDO::FETCH_ASSOC)) {
    $norm_name= $row['id'];
    $items[] = $row;
  }
//Check the export button is pressed or not

//Define the filename with current date
  $fileName = $norm_name."_itemdata-".date('d-m-Y h-m-s').".xls";

//Set header information to export data in excel format
  header('Content-Type: application/vnd.ms-excel');
  header('Content-Disposition: attachment; filename='.$fileName);

//Set variable to false for heading
  $heading = false;

//Add the MySQL table data to excel file
  if(!empty($items)) {
    foreach($items as $item) {
      if(!$heading) {
        echo implode("\t", array_keys($item)) . "\n";
        $heading = true;
      }
      echo implode("\t", array_values($item)) . "\n";
    }
  }
  exit();
}

?>
