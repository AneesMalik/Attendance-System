<?php
session_start();
if(isset($_SESSION['admin_email']) && isset($_SESSION['admin_id']) && $_SESSION['check'] ==true)
  $_SESSION['loggedin']=date('Y/m/d');
else
  header('location:login.php');
?>