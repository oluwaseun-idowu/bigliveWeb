<?php
include('../dbcon.php');
$get_id = $_GET['category_id'];
mysqli_query($con,"DELETE FROM category where category_id = '$get_id'");
header('location:categories.php');
?>
