<?php
include('host.php');
include_once('std_secure.php');
	$ob=new db_config;
	$email=$_POST['email'];
	$pass=$_POST['password'];
	$sql="SELECT * FROM `secure_std` WHERE sec_email='$email' AND sec_password='$pass'";
	//echo $sql;
	$result=mysqli_query($ob->config(),$sql);
	$row=mysqli_fetch_assoc($result);
	if(mysqli_num_rows($result)>0)
	{

		//echo "done";
		header('location:index.php');
		session_start();
			$_SESSION['sec_id']=$row['sec_id'];
			$_SESSION['sec_email']=$email;
			$_SESSION['sec_name']=$row['sec_name'];
			//$_SESSION['admin_pass']=$pass;
			$_SESSION['check']=true;
			echo true;
	}
	else
	{
		echo "not logged-in";
	}

?>