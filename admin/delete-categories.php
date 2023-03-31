<?php
include('../dbcon.php');
$get_id = $_GET['category_id'];
mysqli_query($con,"UPDATE `category` SET isDeleted = 'deleted' where category_id = '$get_id'");
header('location:categories.php');
?>
