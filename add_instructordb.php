<?php
include_once('secure.php');
include_once('../host.php');
$ob=new db_config;

    
if(isset($_POST['save'])){
    
    $name = $_POST['inst_name'];
    $cnic = $_POST['cnic'];
    $email = $_POST['inst_email'];
    $phone = $_POST['cell_no'];
    $dept = $_POST['department'];

    $photo = $_FILES['profile_img']['name'];
	$target = "user_image/instructor_image/".basename($photo);
	move_uploaded_file($_FILES['profile_img']['tmp_name'], $target);

	//echo $email;
    
    $sql = "INSERT INTO `instructor`(`inst_name`, `inst_cnic`, `inst_email`, `inst_phone`, `inst_dept`, `inst_photo`) VALUES ('$name', '$cnic', '$email', '$phone', '$dept', '$photo')";

    $result=mysqli_query($ob->config(),$sql);
	if($result){
		header('location:view_instructor_details.php');
	}
	else{
		echo "Error";
	}
}

if(isset($_POST['save_update'])){

    $update = $_POST['update_inst'];
    //echo $update;
    $name = $_POST['inst_name'];
    $cnic = $_POST['cnic'];
    $email = $_POST['inst_email'];
    $phone = $_POST['cell_no'];
    $dept = $_POST['department'];

    $photo = $_FILES['profile_img']['name'];
    $target = "user_image/instructor_image/".basename($photo);
    move_uploaded_file($_FILES['profile_img']['tmp_name'], $target);

    $sql="UPDATE `instructor` SET `inst_name`='$name',`inst_cnic`='$cnic',`inst_email`='$email',`inst_phone`='$phone',`inst_dept`='$dept',`inst_photo`='$photo' WHERE inst_id='$update'";

    $result=mysqli_query($ob->config(),$sql);
    if($result){
        header('location:view_courses.php');
    }
    else{
        echo "<script type='text/javascript'>
                alert('Data is not Verified');
                history.back();
            </script>";
    }

}

if(isset($_POST['delete'])){
    $del = $_POST['delete_inst'];
    //echo $del;
    $sql="DELETE FROM `instructor` WHERE inst_id='$del'";

    $result=mysqli_query($ob->config(),$sql);
    if($result){
        header('location:view_courses.php');
    }
    else{
        echo "<script type='text/javascript'>
                alert('Data is not Verified');
                history.back();
            </script>";
    }
}
?>