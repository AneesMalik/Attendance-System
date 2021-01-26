<?php

session_start();
unset($_SESSION['sec_id']);
unset($_SESSION['sec_email']);
unset($_SESSION['sec_password']);
session_destroy();
header('location:index.php');

?>