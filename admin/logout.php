<?php
session_start();
include('dbcon.php');
session_destroy();
header('location:login.php');

?>
