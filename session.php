<?php
 session_start(); 
//Check whether the session variable SESS_MEMBER_ID is present or not
if (!isset($_SESSION['phonenumber']) || (trim($_SESSION['phonenumber']) == '')) {
header("location: register.php");
    exit();

}


?>