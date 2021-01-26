<?php
include_once('secure.php');
include_once('../host.php');
$ob=new db_config;

    if(isset($_POST['program'])){

        $program = $_POST['program'];
        // echo $lecture;

        $sqli = "SELECT class_name FROM `class` WHERE class_name = '$program'";
        // echo $sqli;
        $found=mysqli_query($ob->config(),$sqli);
        if (mysqli_num_rows($found)>0) {
            echo '<i class="fas fa-check" style="color:green;"></i>'." Instructor Verified";
        }
        else{
            echo '<i class="fas fa-exclamation-triangle" style="color:red;"></i>'." Instructor not verified";
        }
    }

    if(isset($_POST['program2'])){

        $program = $_POST['program2'];
        //$instructor = $_POST['instructor3'];
        // echo $code;
        //echo $lecture;

        $sqli = "SELECT * FROM `class` WHERE class_name = '$program'";
        // echo $sqli;
        $found=mysqli_query($ob->config(),$sqli);
        while($row = mysqli_fetch_array($found))  
            {  
                echo '<option value="'.$row["session"].'">'.$row["session"].'</option>';  
            } 
            //echo $output;
    }

    
if(isset($_POST['save'])){
    
    $roll = $_POST['roll_no'];
    $reg = $_POST['reg_no'];
    $name = $_POST['std_name'];
    $cnic = $_POST['cnic'];
    $father = $_POST['f_name'];
    $dob = $_POST['birth_date'];
    $email = $_POST['std_email'];
    $phone = $_POST['cell_no'];
    $address = $_POST['address'];
    $program = $_POST['program'];
    $class = $_POST['class'];
    $dept = $_POST['department'];
    $session = $_POST['session'];
    $photo = $_FILES['profile_img']['name'];
	$target = "user_image/student_image/".basename($photo);
	move_uploaded_file($_FILES['profile_img']['tmp_name'], $target);

	//echo $email;
    
    $sql = "INSERT INTO `student`(`roll_no`, `reg_no`, `std_name`, `std_cnic`, `std_fname`, `std_dob`, `std_email`, `std_phone_no`, `std_address`, `std_program`, `std_class`, `std_dept`, `session`, `std_photo`) VALUES ('$roll', '$reg', '$name', '$cnic', '$father', '$dob', '$email', '$phone', '$address', '$program', '$class', '$dept', '$session', '$photo')";

    $result=mysqli_query($ob->config(),$sql);
	if($result){
		header('location:view_std_details.php');
	}
	else{
		echo "Error";
	}
}

if(isset($_POST['save_update'])){

    $update = $_POST['update_course'];
    //echo $update;
    $roll = $_POST['roll_no'];
    $reg = $_POST['reg_no'];
    $name = $_POST['std_name'];
    $cnic = $_POST['cnic'];
    $father = $_POST['f_name'];
    $dob = $_POST['birth_date'];
    $email = $_POST['std_email'];
    $phone = $_POST['cell_no'];
    $address = $_POST['address'];
    $program = $_POST['program'];
    $class = $_POST['class'];
    $dept = $_POST['department'];
    $session_start = $_POST['session'];

    $photo = $_FILES['profile_img']['name'];
    $target = "user_image/student_image/".basename($photo);
    move_uploaded_file($_FILES['profile_img']['tmp_name'], $target);

    $sql="UPDATE `student` SET `roll_no`='$roll',`reg_no`='$reg',`std_name`='name',`std_cnic`='cnic',`std_fname`='$father',`std_dob`='$dob',`std_email`='$email',`std_phone_no`='$phone',`std_address`='$address',`std_program`='program',`std_class`='$class',`std_dept`='$dept',`session`='$session',`std_photo`='$photo' WHERE std_id='$update'";

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
    $del = $_POST['delete_std'];
    //echo $del;
    $sql="DELETE FROM `student` WHERE std_id='$del'";

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