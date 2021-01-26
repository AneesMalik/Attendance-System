<?php
session_start();
if(isset($_SESSION['secinst_email']) && isset($_SESSION['secinst_id']) && $_SESSION['check'] == true)
  $_SESSION['loggedin']=date('Y/m/d');
else
  header('location:login.php');
	//echo "error";
?>