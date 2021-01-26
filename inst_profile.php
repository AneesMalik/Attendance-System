<?php 
include_once('host.php');
$ob=new db_config(); 


	if(isset($_POST['cnic'])){

		$cnic = $_POST['cnic'];

		$sql = "SELECT * FROM `instructor` WHERE inst_cnic = '$cnic'";

		$found=mysqli_query($ob->config(),$sql);
		if (mysqli_num_rows($found)>0) {
			echo "CNIC Verified";
		}
		else{
			echo "CNIC not Verified";
		}
	}

	if(isset($_POST['cell'])){

		$phone = $_POST['cell'];

		$sqli = "SELECT * FROM `instructor` WHERE inst_phone = '$phone'";
		// echo $sqli;
		$found=mysqli_query($ob->config(),$sqli);
		if (mysqli_num_rows($found)>0) {
			echo "Verified";
		}
		else{
			echo "Not Verified";
		}
	}


	if(isset($_POST['submit'])){
    
    $name = $_POST['username'];
    $cnic = $_POST['cnic'];
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $phone = $_POST['cell_no'];

    $photo = $_FILES['profile_img']['name'];
	$target = "inst_profilephoto/".basename($photo);
	move_uploaded_file($_FILES['profile_img']['tmp_name'], $target);

	//echo $email;

	$sqli = "SELECT * FROM `instructor` WHERE inst_phone = '$phone' AND inst_cnic = '$cnic'";
	$found=mysqli_query($ob->config(),$sqli);

	if (mysqli_num_rows($found)>0) {
    
    	$sql = "INSERT INTO `inst_profile`(`prof_name`, `prof_cnic`, `prof_phone`, `prof_email`, `prof_pass`, `prof_pic`) VALUES ('$name', '$cnic', '$phone', '$email', '$pass', '$photo')";

	    $result=mysqli_query($ob->config(),$sql);
		if($result){
			header('location:login.php');
		}
		else{
			echo "Error";
		}
	}
	else{
		echo "<script type='text/javascript'>
				alert('Data is not Verified');
				history.back();
			</script>";
	}
}
?>