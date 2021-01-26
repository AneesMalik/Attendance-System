<?php
session_start();
if(isset($_SESSION['sec_email']) && isset($_SESSION['sec_id']) && isset($_SESSION['sec_id']) && $_SESSION['check'] == true)
  $_SESSION['loggedin']=date('Y/m/d');
else
  header('location:login.php');
	//echo "error";
?>